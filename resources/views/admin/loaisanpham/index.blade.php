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

                    <div class="card">
                        <div class="card-header card-header-dark text-white bg-dark text-center">
                            <h4 class="card-title ">CATEGORY TABLE</h4>
                            <p class="card-category">-- Bảng Loại Sản Phẩm --</p>
                        </div>
                        
                        <a href="{{ route('danhsachloai.create') }}" class="btn btn-light pull-left"><b>Create new category</b></a>

                        <div class="card-body table-responsive">
                            <table class="table" id="order-listing">
                                <thead class=" text-dark"> 
                               <th>STT</th> 
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Ngày tạo mới</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                                </thead>
                                <tbody>

                                <?php $stt=1; ?>
                                @foreach($danhsachloai as $l)
                                <tr>

                                    <td> {{ $loop->index + 1 }}</td>
                                    <td> {{ $l->lsp_id }} </td>
                                    <td> {{ $l->lsp_ten }}</td>
                                    <td> {{ $l->lsp_ngaytaomoi }} </td>

                                    @if($l->lsp_trangthai == 1)
                                        <td><span class="badge badge-danger">Khóa</span></td>
                                    @else
                                        <td><span class="badge badge-secondary">Khả dụng</span></td>
                                    @endif

                                    <td >
                                    <a href="{{ route('danhsachloai.edit', ['id' => $l->lsp_id]) }}" class="btn btn-outline-primary pull-left"><i class="fa fa-edit fa-lg" aria-hidden="true"></i></a>
    
                                    <form method="post" action="{{ route('danhsachloai.destroy', ['id' => $l->lsp_id]) }}" class="pull-left">
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
                            {{ $danhsachloai->links() }}
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.admin.footer')
        </div>
    </div>
</body>
@endsection

