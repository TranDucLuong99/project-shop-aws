<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class OrderController extends Controller
{
    //
    public function index(){
        $orders = Order::with(['product', 'user'])->orderBy('updated_at', 'DESC')->get();
        return $orders->isEmpty() ?
            view('Admin.orders.index', compact('orders', 'info')) :
            view('Admin.orders.index', compact('orders'));
    }

    public function detail(Request $request, $id){
        $orders = Order::with(['product', 'user','product.category'])->findOrFail($id);
        return view('Admin.orders.detail', compact('orders'));
    }

    public function printOrder(Request $request, $id){
        $orders = Order::with(['product', 'user','product.category'])->findOrFail($id);
        return view('Admin.orders.print', compact('orders'));
    }

    public function exportOrder (){
        $payment_status = [
            '1'     => 'Thanh toán khi nhận hàng',
            '2'     => 'Thanh toán trực tuyến',
        ];
        $orders = Order::with(['product', 'user'])->orderBy('updated_at', 'DESC')->get();
        $array = [];
        foreach($orders as $key => $order){
            $arrayDetail[] = [
                'stt'            => $key + 1,
                'created_at'     => date('d-m-Y H:i:s', strtotime($order['created_at'])),
                'id'             => $order['id'],
                'fullname'       => $order['fullname'],
                'phone'          => $order['phone'],
                'email'          => $order['email'],
                'address'        => $order['address'],
                'price_total'    => $order['price_total'],
                'payment_status' => $payment_status[$order['payment_status']],
                'note'           => $order['note'],
            ];
        }
        $arrTile = ['DANH SÁCH ĐƠN HÀNG'];

        $arrTileContent = [
            'STT',
            'NGÀY TẠO ĐƠN',
            'SỐ VẬN ĐƠN',
            'TÊN KHÁCH HÀNG',
            'SỐ ĐIỆN THOẠI',
            'EMAIL',
            'ĐỊA CHỈ',
            'TỔNG TIỀN',
            'HÌNH THỨC THANH TOÁN',
            'GHI CHÚ',
        ];
        $export = new OrderExport($arrTile, $arrTileContent, $arrayDetail);
        return Excel::download($export, 'tong_hop_danh_sach_chi_tiet_don_hang.xlsx');
    }
}
