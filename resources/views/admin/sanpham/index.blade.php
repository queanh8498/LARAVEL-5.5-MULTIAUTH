@extends('layouts.admin.master')

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
                            <h4 class="card-title ">PRODUCT TABLE</h4>
                            <p class="card-category">-- Bảng Sản Phẩm --</p>

                            <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                        </div>
                        <a href="{{ route('danhsachsanpham.create') }}" class="btn btn-light"><b>Create new product</b></a>

                        <div class="card-body table-responsive">
                            <table class="table" id="order-listing">
                            <a href="{{ route('danhsachsanpham.print') }}" class="btn btn-light">Review PDF</a>

                                <thead class=" text-dark"> 
                                <!-- <th>STT</th> -->
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Hình</th>
                                <th>Gía gốc</th>
                                <th>Gía bán</th>
                                <th>Đơn vị</th>
                                <th>Chất liệu</th>
                                <th>Trạng thái</th>
                                
                                <th>Hành động</th>
                                </thead>
                                <tbody>

                                <?php $stt=1; ?>

                            @foreach($danhsachsanpham as $sp)
                            <tr>
                                    <!-- <td>{{ $loop->index+1 }}</td> -->
                                    <td>{{ $sp->sp_id }}</td>
                                    <td>{{ $sp->sp_ten }}</td>
                                    <td><img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" class="img-list" style="width: 200px; height: 150px;" /></td>
                                    <td>{{ $sp->sp_giagoc }}</td>
                                    <td>{{ $sp->sp_giaban }}</td>
                                    <td>{{ $sp->donvitinh->dvt_ten }}</td>
                                    <td>{{ $sp->chatlieu->cl_ten }}</td>

                                    @if($sp->sp_trangthai==1)
                                        <td><span class="badge badge-danger">Khóa</span></td>
                                    @else
                                        <td><h5><span class="badge badge-secondary">Khả dụng</span></h5></td>
                                    @endif
                                    
                                    <td >
                                <a href="{{ route('danhsachsanpham.edit', ['id' => $sp->sp_id]) }}" class="btn btn-outline-primary pull-left"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>

                                <form method="post" action="{{ route('danhsachsanpham.destroy', ['id' => $sp->sp_id]) }}" class="pull-left">
                                    <!-- Khi gởi Request Xóa dữ liệu, Laravel Framework mặc định chỉ chấp nhận thực thi nếu có gởi kèm field `_method=DELETE` -->
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <!-- Khi gởi bất kỳ Request POST, Laravel Framework mặc định cần có token để chống lỗi bảo mật CSRF 
                                    - Bạn có thể tắt đi, nhưng lời khuyên là không nên tắt chế độ bảo mật CSRF đi.
                                    - Thay vào đó, sử dụng hàm `csrf_field()` để tự sinh ra 1 input có token dành riêng cho CSRF
                                    -->
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash fa-lg" aria-hidden="true"></i> </button>
                                </form> 
                                </td>       
                            </tr>
                        <?php $stt++; ?>

                        @endforeach
                           </tbody>
                            </table>
                            {{ $danhsachsanpham->links() }}

                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.admin.footer')
        </div>
    </div>
</body>
@endsection

