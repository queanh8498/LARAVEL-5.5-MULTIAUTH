@extends('layouts.admin.master')

@section('content')
<body class="">
    <div class="wrapper">
       @include('layouts.admin.sidenav')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <span class="navbar-brand">Manage Category Data</span>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                 
                </div>
            </nav>
            <!-- End Navbar -->
        <div class="content">
        <script src="{{ asset('vendor/angularjs/angular.min.js') }}"></script>

        <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">LOẠI SẢN PHẨM</h4>
                                <p class="card-category">Chỉnh sửa</p>
                            </div>
                            <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li> 
                                        <!-- <li>Loại sản phẩm đã tồn tại</li> -->
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                                <form name="userForm" action="{{ route('danhsachloai.update',['id'=>$l->lsp_id]) }}" method="post">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lsp_id" class="bmd-label-floating">ID</label>
                                                <input type="text" class="form-control" id="lsp_id" name="lsp_id" value="{{ $l->lsp_id }}" readonly>
                                            </div>
                                        </div>                                        
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lsp_ten" class="bmd-label-floating">Tên loại sản phẩm</label>
                                                <input type="text" class="form-control" id="lsp_ten" name="lsp_ten" value="{{ old('lsp_ten',$l->lsp_ten) }}">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lsp_trangthai" class="bmd-label-floating">Thiết lập trạng thái</label>
                                                <select id="lsp_trangthai" name="lsp_trangthai" class="form-control">
                                                    <option value="1" {{ old('lsp_trangthai',$l->lsp_trangthai) == 1 ? "selected" : "" }}>Khóa</option>
                                                    <option value="2" {{ old('lsp_trangthai',$l->lsp_trangthai) == 2 ? "selected" : "" }}>Khả dụng</option>
                                                </select>     
                                            </div>                                     
                                        </div>

                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-success float-right" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>

        
    </div>
</div>
@include('layouts.admin.footer')
</div>
</div>
</body>
@endsection