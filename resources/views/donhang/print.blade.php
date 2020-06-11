@extends('print.layout.paper')

@section('title')
Biểu mẫu Phiếu in danh sách Đon hàng
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-paper-css')
@endsection

@section('content')
<style>
table {
  border-collapse: collapse;
}

table {
  border: 1px solid black;
}
</style>
<section class="sheet padding-10mm">
    <article>
        <div align="center">
                    <b>H O U Z I E<br />
                    <b>
                        <br>
                    <img src="{{ asset('storage/photos/home_logo.jpg') }}"  width="150" height="110"/>
        </div>
        
       <br>
        <?php 
        $tongSoTrang = ceil(count($danhsachdonhang)/5);
            ?>
        <table border=1 align="center" cellpadding="3">
            <caption><h3>DANH SÁCH ĐƠN HÀNG</h3></caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Email Khách hàng</th>
                <th>Thời gian đặt hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
            </tr>
            @foreach ($danhsachdonhang as $dh)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>

                @foreach ($danhsachkhachhang as $kh)
                @if ($dh->kh_id == $kh->kh_id)
                <td align="center">{{ $kh->kh_email }}</td>
                @endif
                @endforeach
                
                <td align="center">{{ $dh->dh_thoigiandathang }}</td>
                <td align="center">{{ $dh->dh_diachi }}</td>
                <td align="center">{{ $dh->dh_dienthoai }}</td>

                @if (($dh->dh_dathanhtoan) == 1)
                <td align="center">Đã thanh toán</td>
                @else 
                <td align="center">Chưa thanh toán</td>
                @endif
               
            </tr>
            @if (($loop->index + 1) % 5 == 0)
        </table>
        
        <div class="page-break"></div>
        
        <table border="1" align="center" cellpadding="3" width="700px">
            <tr>
                <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Email Khách hàng</th>
                <th>Thời gian đặt hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Trạng thái</th>
            </tr>
            @endif
            @endforeach
        </table>

    </article>
</section>
@endsection