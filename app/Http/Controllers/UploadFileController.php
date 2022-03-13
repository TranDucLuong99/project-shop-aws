<?php

namespace App\Http\Controllers;

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
    public function uploadFileEncrypt(Request $request)
    {
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
        $filepath = public_path('uploads/');

        $extension = explode('.', $fileName);
        $extension = strtolower(end($extension));

        $key = md5(uniqid());
        $tmp_file_name = "{$key}.{$extension}";
        $tmp_file_path = $filepath . $tmp_file_name;

        $file->move($filepath, $tmp_file_name);

        $contentType = mime_content_type(public_path() . '/uploads/' . $tmp_file_name);

        $result = $encryptionClient->putObject([
            '@MaterialsProvider' => $materialsProvider,
            '@CipherOptions' => $cipherOptions,
            '@KmsEncryptionContext' => ['context-key' => 'context-value'],
            'Bucket' => $bucket,
            'Key' => "uploads/{$tmp_file_name}",
            'Body' => fopen(public_path() . '/uploads/' . $tmp_file_name, 'rb'),
            'Content-Type' => $contentType
        ]);

        unlink(public_path() . '/uploads/' . $tmp_file_name);
        dd($result);
    }

    public function decryptFile(Request $request)
    {
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
                'Key' => 'uploads/15486f0f5df9ef758536c1620e7d7a19.pptx',
                'SaveAs' => public_path('downloads/15486f0f5df9ef758536c1620e7d7a19.pptx')
            ]);
        } catch (AwsException $e) {
            dd($e->getMessage());
        }
        dd($result);
    }
}
