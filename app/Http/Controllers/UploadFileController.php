<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use App\Models\File;
use Aws\Credentials\Credentials;
use Aws\Crypto\KmsMaterialsProviderV2;
use Aws\Exception\AwsException;
use Aws\Kms\KmsClient;
use Aws\S3\Crypto\S3EncryptionClientV2;
use Aws\S3\S3Client;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    //
    public function index(){
        $files = File::orderBy('updated_at', 'DESC')->get();
        return $files->isEmpty() ?
            view('Admin.files.index', compact('files', 'info')) :
            view('Admin.files.index', compact('files'));
    }

    public function getUpload(Request $request)
    {
        $folders = Bucket::all();
        return view('Admin.files.create', compact('folders'));
    }

    public function uploadFileEncrypt(Request $request)
    {
        $folders = Bucket::find($request->folder_id);
        $folderName = $folders->name;

        $fileData    = new File();
        $credentials = new Credentials(config('aws.s3.key'), config('aws.s3.secret'));
        $encryptionClient = new S3EncryptionClientV2(
            new S3Client([
                'region' => 'ap-southeast-1',
                'version' => 'latest',
                'credentials' => $credentials
            ])
        );

        $kmsKeyArn = config('aws.kms.key');
        $materialsProvider = new KmsMaterialsProviderV2(
            new KmsClient([
                'region' => 'ap-southeast-1',
                'version' => 'latest',
                'credentials' => $credentials
            ]),
            $kmsKeyArn
        );

        $bucket = config('aws.s3.bucket');
        $key = config('aws.s3.key');
        $cipherOptions = [
            'Cipher' => 'gcm',
            'KeySize' => 256,
        ];

        $file = $request->file('file');

        $fileName = $file->getClientOriginalName();

        $tmpName = $file->getPathname();
        $filepath = public_path("{$folderName}/");

        $extension = explode('.', $fileName);
        $extension = strtolower(end($extension));

        $key = md5(uniqid());
        $tmp_file_name = "{$key}.{$extension}";
        $tmp_file_path = $filepath . $tmp_file_name;

        $file->move($filepath, $tmp_file_name);

        $contentType = mime_content_type(public_path() . "/{$folderName}/" . $tmp_file_name);

        $encryptionClient->putObject([
            '@MaterialsProvider' => $materialsProvider,
            '@CipherOptions' => $cipherOptions,
            '@KmsEncryptionContext' => ['context-key' => 'context-value'],
            'Bucket' => $bucket,
            'Key' => "{$folderName}/{$tmp_file_name}",
            'Body' => fopen(public_path() . "/{$folderName}/" . $tmp_file_name, 'rb'),
            'Content-Type' => $contentType
        ]);
        unlink(public_path() . "/{$folderName}/" . $tmp_file_name);
        $fileData->file       = "$tmp_file_name";
        $fileData->name        = $request->name;
        $fileData->folder_name   = $folderName;
        $fileData->save();
        return redirect(route('file.index'))->with('info', 'Upload file thành công với id = ' . $fileData->id);
    }

    public function decryptFile(Request $request, $id)
    {
        $fileData = File::find($id);
        $folderName = $fileData->folder_name;
        $fileType = explode(".", $fileData->file);
        $credentials = new Credentials(config('aws.s3.key'), config('aws.s3.secret'));
        $encryptionClient = new S3EncryptionClientV2(
            new S3Client([
                'region' => 'ap-southeast-1',
                'version' => 'latest',
                'credentials' => $credentials
            ])
        );

        $kmsKeyArn = config('aws.kms.key');
        $materialsProvider = new KmsMaterialsProviderV2(
            new KmsClient([
                'region' => 'ap-southeast-1',
                'version' => 'latest',
                'credentials' => $credentials
            ]),
            $kmsKeyArn
        );
        $bucket = config('aws.s3.bucket');
        $key = config('aws.s3.key');
        $cipherOptions = [
            'Cipher' => 'gcm',
            'KeySize' => 256,
        ];

        try {
            $result = $encryptionClient->getObject([
                '@KmsAllowDecryptWithAnyCmk' => true,
                '@MaterialsProvider' => $materialsProvider,
                '@CipherOptions' => $cipherOptions,
                '@SecurityProfile' => 'V2',
                'Bucket' => $bucket,
                'Key' => "{$folderName}/$fileData->file",
                'SaveAs' => public_path("../../File/$fileData->name.$fileType[1]")
            ]);
        } catch (AwsException $e) {
            dd($e->getMessage());
        }
        return redirect(route('file.index'))->with('info', "Đọc file $fileData->name thành công!");
    }
}
