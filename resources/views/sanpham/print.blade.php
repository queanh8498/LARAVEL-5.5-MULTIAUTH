@extends('print.layout.paper')

@section('title')
Biểu mẫu Phiếu in danh sách sản phẩm
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
        $tongSoTrang = ceil(count($danhsachsanpham)/5);
            ?>
        <table border=1 align="center" cellpadding="3">
            <caption><h3>DANH SÁCH SẢN PHẨM</h3></caption>
            <tr>
                <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
                <th>STT</th>
                <th>Hình sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá gốc</th>
                <th>Giá bán</th>
                <th>Loại sản phẩm</th>
            </tr>
            @foreach ($danhsachsanpham as $sp)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                <td align="center">
                    <img class="hinhSanPham" src="{{ asset('storage/photos/' . $sp->sp_hinh) }}"  width="150" height="150" />
                </td>
                <td align="center">{{ $sp->sp_ten }}</td>
                <td align="center">{{ $sp->sp_giagoc }}</td>
                <td align="center">{{ $sp->sp_giaban }}</td>
                @foreach ($danhsachloai as $l)
                @if ($sp->lsp_id == $l->lsp_id)
                <td align="center">{{ $l->lsp_ten }}</td>
                @endif
                @endforeach
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
                <th>Hình sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá gốc</th>
                <th>Giá bán</th>
                <th>Loại sản phẩm</th>
            </tr>
            @endif
            @endforeach
        </table>

    </article>
</section>
@endsection