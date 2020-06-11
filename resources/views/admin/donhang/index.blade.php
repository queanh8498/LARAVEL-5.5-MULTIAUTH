@extends('layouts.admin.master')

@section('custom-css')
    <style>
        .badge a{
            color: white;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')

	<body class="">
    <div class="wrapper">
       @include('layouts.admin.sidenav')
        <div class="main-panel">
            <div class="content">
               
                <div class="container-fluid">
                <div class="flash-message">
                  @foreach(['danger','warning','success','info'] as $msg)
                      @if(Session::has('alert-' . $msg))
                          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          </p>
                      @endif
                  @endforeach
              </div>
                    <div class="card ">
                        <div class="card-header card-header-dark text-white bg-dark text-center">
                            <h4 class="card-title ">ORDER TABLE</h4>
                            <p class="card-category">-- Bảng Đơn Đặt Hàng --</p>

                            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                        </div>
                        <a class="btn btn-light"></a>

                        <div class="card-body table-responsive">
                            <table class="table" id="order-listing">
                            <a href="{{ route('danhsachdonhang.print') }}" class="btn btn-light">Review PDF</a>

                                <thead class=" text-dark"> 
                                <!-- <th>STT</th> -->
                                <th>ID</th>
                                <th>Email KH</th>
                                <th>Địa chỉ</th>
                                <th>Số điện thoại</th>
                                <th>Ngày lập</th>
                                <th>Chi phí vận chuyển</th>
                                <th>Tổng thành tiền</th>
                                <th>Trạng thái thanh toán</th>
                                <th>Hành động</th>
                                
                                </thead>
                                <tbody>

                                <?php $stt=1; ?>

                            @foreach($danhsachdonhang  as $dh)
                            <tr>
                                    <!-- <td>{{ $loop->index+1 }}</td> -->
                                    <td>{{ $dh->dh_id }}</td>
                                    <td>{{ $dh->kh_email }}</td>
                                    <td>{{ $dh->dh_diachi }}</td>
                                    <td>{{ $dh->dh_dienthoai }}</td>
                                    <td>{{ $dh->dh_ngaytaomoi }}</td>
                                    <td>{{ number_format($dh->vc_chiphi, 0, ',' , ',') }}</td>                                    
                                    <td>{{ number_format($dh->TongThanhTien, 0, ',' , ',') }} VNĐ</td>                                    
                                    <td> 
                                    @if (($dh->dh_dathanhtoan) == 1)
                                        <div class="badge badge-info">
                                            {{ 'Đã xử lý' }}
                                        </div>
                                    @else 
                                        <div class="badge badge-danger">
                                            <a href="{{ route('danhsachdonhang.active', ['id' => $dh->dh_id]) }}">{{ 'Chưa xử lý' }}</a>
                                        </div>
                                    @endif
                                </td>
                                <td>                                    
                                    <a href="{{ route('danhsachdonhang.printdetail', ['id' => $dh->dh_id]) }}" class="btn btn-outline-primary pull-left"><b>In đơn này</b></a>                        
                                </td>

                                    
                            </tr>
                        <?php $stt++; ?>

                        @endforeach
                           </tbody>
                            </table>
                            {{ $danhsachdonhang->links() }}

                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.admin.footer')
        </div>
    </div>
</body>
@endsection

