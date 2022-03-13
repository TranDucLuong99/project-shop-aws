
<?php
?>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tohoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 21cm;
        overflow:hidden;
        min-height:297mm;
        padding: 2.5cm;
        margin-left:auto;
        margin-right:auto;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 237mm;
        outline: 2cm #FFEAEA solid;
    }
    @page {
        size: A4;
        margin: 0;
    }
    button {
        width:100px;
        height: 24px;
    }
    .header {
        overflow:hidden;
    }
    .logo {
        background-color:#FFFFFF;
        text-align:left;
        float:left;
    }
    .company {
        padding-top:24px;
        text-transform:uppercase;
        background-color:#FFFFFF;
        text-align:right;
        float:right;
        font-size:16px;
    }
    .title {
        text-align:center;
        position:relative;
        color:#0000FF;
        font-size: 24px;
        top:1px;
    }
    .footer-left {
        text-align:center;
        text-transform:uppercase;
        padding-top:24px;
        position:relative;
        height: 150px;
        width:50%;
        color:#000;
        float:left;
        font-size: 12px;
        bottom:1px;
    }
    .footer-right {
        text-align:center;
        text-transform:uppercase;
        padding-top:24px;
        position:relative;
        height: 150px;
        width:50%;
        color:#000;
        font-size: 12px;
        float:right;
        bottom:1px;
    }
    .TableData {
        background:#ffffff;
        font: 11px;
        width:100%;
        border-collapse:collapse;
        font-family:Verdana, Arial, Helvetica, sans-serif;
        font-size:12px;
        border:thin solid #d3d3d3;
    }
    .TableData TH {
        background: rgba(0,0,255,0.1);
        text-align: center;
        font-weight: bold;
        color: #000;
        border: solid 1px #ccc;
        height: 24px;
    }
    .TableData TR {
        height: 24px;
        border:thin solid #d3d3d3;
    }
    .TableData TR TD {
        padding-right: 2px;
        padding-left: 2px;
        border:thin solid #d3d3d3;
    }
    .TableData TR:hover {
        background: rgba(0,0,0,0.05);
    }
    .TableData .cotSTT {
        text-align:center;
        width: 10%;
    }
    .TableData .cotTenSanPham {
        text-align:left;
        width: 40%;
    }
    .TableData .cotHangSanXuat {
        text-align:left;
        width: 20%;
    }
    .TableData .cotGia {
        text-align:right;
        width: 120px;
    }
    .TableData .cotSoLuong {
        text-align: center;
        width: 50px;
    }
    .TableData .cotSo {
        text-align: right;
        width: 120px;
    }
    .TableData .tong {
        text-align: right;
        font-weight:bold;
        text-transform:uppercase;
        padding-right: 4px;
    }
    .TableData .cotSoLuong input {
        text-align: center;
    }
    @media print {
        @page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
<body onload="window.print();">
<div id="page" class="page">
    <div class="header">
        <div class="logo"><img width="30%" src="https://logoart.vn/blog/wp-content/uploads/2012/01/thiet-ke-logo-dep-mat10-400x300.jpg"/></div>
        <div class="company">LeoLeo Shop</div>
    </div>
    <br/>
    <div class="title">
        HÓA ĐƠN THANH TOÁN
        <br/>
        -------oOo-------
    </div>
    <br/>
    <br/>
    <table class="TableData" style="margin-bottom: 32px; text-align: center">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Tên khách hàng</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ giao hàng</th>
            <th>Ghi chú</th>
        </tr>
        <tr>
            <td><?php echo $orders->id ?></td>
            <td><?php echo $orders->fullname ?></td>
            <td><?php echo $orders->phone ?></td>
            <td><?php echo $orders->address ?></td>
            <td><?php echo $orders->note ?></td>
        </tr>
    </table>
    <table class="TableData" cellpadding="8px">
        <tr>
            <th>STT</th>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
        </tr>
        <?php $total = 0; ?>
        <?php foreach ($orders->product as $id => $values): ?>
        <tr style="text-align: center">
            <td><?php echo $id + 1 ?></td>
            <td><?php echo "LLSSP".$values->id ?></td>
            <td><?php echo $values->name ?></td>
            <td><?php echo $values->new_price ?></td>
            <td><?php echo $values->pivot->quantity ?></td>
            <td>
                <?php
                $price_total = $values->new_price * $values->pivot->quantity;
                $total += $price_total;
                ?>
                <?php echo number_format($price_total, 0, '.', '.') ?> vnđ
            </td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td colspan="3">Giao hàng tiêu chuẩn</td>
            <td style="text-align: center">35,000 vnđ</td>
            <td colspan="2" style="text-align: right">Thanh toán khi nhận hàng</td>
        </tr>
        <tr>
            <td colspan="5" class="tong" style="text-align: left">Tổng cộng</td>
            <td style="text-align: right; font-weight: bold"> <?php echo number_format($total + 35000, 0, '.', '.') ?> vnđ</td>
        </tr>
    </table>
    <div class="footer-left"><br/>
        Khách hàng <br> <?php echo $orders->fullname ?> </div>
    <div class="footer-right"> Hà Nội, Ngày {{now()->format('d')}} Tháng {{now()->format('m')}} Năm {{now()->format('Y')}}<br/>
        Nhân viên <br>
    {{ Auth::user()->name }}</div>
</div>
</body>
