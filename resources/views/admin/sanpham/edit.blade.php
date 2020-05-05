@extends('layouts.admin.master')

@section('custom-css')
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsession


@section('content')
<body class="">
<div class="wrapper">
@include('layouts.admin.sidenav')
<div class="main-panel">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
    <div class="container-fluid">
        <div class="navbar-wrapper">
            <span class="navbar-brand">Manage Product Data</span>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form class="navbar-form">
                <div class="input-group no-border">
                    <input type="text" value="" class="form-control" placeholder="Search...">
                    <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                    </button>
                </div>
            </form>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <i class="material-icons">dashboard</i>
                        <p>
                            <span class="d-lg-none d-md-block">Stats</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">notifications</i>
                        <span class="notification">5</span>
                        <p>
                            <span class="d-lg-none d-md-block">Some Actions</span>
                        </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Mike John responded to your email</a>
                        <a class="dropdown-item" href="#">You have 5 new tasks</a>
                        <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                        <a class="dropdown-item" href="#">Another Notification</a>
                        <a class="dropdown-item" href="#">Another One</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#pablo">
                        <i class="material-icons">person</i>
                        <p>
                            <span class="d-lg-none d-md-block">Account</span>
                        </p>
                    </a>
                </li>
            </ul>
        </div>
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
                    <h4 class="card-title">HH</h4>
                    <p class="card-category">HAHA</p>
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
                
                    <form action="{{ route('danhsachsanpham.update',['id'=>$sp->sp_id]) }}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sp_id" class="bmd-label-floating">ID</label>
                                    <input type="text" class="form-control" id="sp_id" name="sp_id" value="{{ $sp->sp_id }}" readonly>
                                </div>
                            </div>                                        
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sp_ten" class="bmd-label-floating">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten',$sp->sp_ten) }}">

                                </div>
                            </div>
                        </div>
                        <!-- endrow -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sp_giagoc" class="bmd-label-floating">Gía gốc</label>
                                    <input type="number" class="form-control" id="sp_giagoc" name="sp_giagoc" value="{{ old('sp_giagoc',$sp->sp_giagoc) }}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sp_giaban" class="bmd-label-floating">Gía bán</label>
                                    <input type="number" class="form-control" id="sp_giaban" name="sp_giaban" value="{{ old('sp_giaban',$sp->sp_giaban) }}">

                                 </div>
                            </div>
                        </div>
                        <!-- endrow -->
                        <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lsp_id" class="bmd-label-floating">Loại</label>
                                        <select name="lsp_id" class="form-control">
                                            @foreach($danhsachloai as $l)
                                                @if($l->lsp_id == $sp->lsp_id)
                                                <option value="{{ $l->lsp_id }}" selected>{{ $l->lsp_ten }}</option>
                                                @else
                                                <option value="{{ $l->lsp_id }}">{{ $l->lsp_ten }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cl_id" class="bmd-label-floating">Chất liệu</label>
                                        <select name="cl_id" class="form-control">
                                            @foreach($danhsachchatlieu as $cl)
                                                @if($cl->cl_id == $sp->cl_id)
                                                <option value="{{ $cl->cl_id }}" selected>{{ $cl->cl_ten }}</option>
                                                @else
                                                <option value="{{ $cl->cl_id }}">{{ $cl->cl_ten }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <!-- endrow -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sp_thongtin" class="bmd-label-floating">Thông tin sản phẩm</label>
                                    <input type="text" class="form-control" id="sp_thongtin" name="sp_thongtin" value="{{ $sp->sp_thongtin }}" >
                                </div>
                            </div>                                        
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sp_trangthai" class="bmd-label-floating">Thiết lập trạng thái</label>
                                    <select id="sp_trangthai" name="sp_trangthai" class="form-control">
                                        <option value="1" {{ old('sp_trangthai',$sp->sp_trangthai) == 1 ? "selected" : "" }}>Khóa</option>
                                        <option value="2" {{ old('sp_trangthai',$sp->sp_trangthai) == 2 ? "selected" : "" }}>Khả dụng</option>
                                    </select>     
                                </div>                                     
                            </div>
                        </div>
                        <!-- endrow -->
                        <div class="form-group">
                            <div class="file-loading">
                                <label>Hình đại diện</label>
                                <input id="sp_hinh" type="file" class="file" name="sp_hinh">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="file-loading">
                                <label>Hình ảnh liên quan sản phẩm</label>
                                <input id="sp_hinhanhlienquan" type="file" class="file" name="sp_hinhanhlienquan[]" multiple>
                            </div>   
                        </div>                                     
                        <!-- endrow -->
                        <!-- update-button -->
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


@section('custom-scripts')
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            append: false,
            showRemove: false,
            autoReplace: true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPreviewShowDelete: false,
            initialPreviewAsData: true,
            initialPreview: [
                "{{ asset('/storage/photos/' . $sp->sp_hinh) }}" //asset mặc định vào thư mục public
            ],
            initialPreviewConfig: [
                {
                    caption: "{{ $sp->sp_hinh }}",
                    size: {{ Storage::exists('public/photos/' . $sp->sp_hinh) ? Storage::size('public/photos/' . $sp->sp_hinh) : 0 }},
                    width: "120px",
                    url: "{$url}",
                    key: 1
                },
            ]
        });
        $("#sp_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-sm",
            fileType: "any",
            append: false,
            showRemove: false,
            autoReplace: true,
            autoOrientImage: false,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt","jpeg"],
            initialPreviewShowDelete: false,
            initialPreviewAsData: true,
            initialPreview: [
                @foreach($sp->hinhanhlienquan()->get() as $hinhanh)
                "{{ asset('/storage/photos/' . $hinhanh->ha_ten) }}",
                @endforeach
            ],
            initialPreviewConfig: [
                @foreach($sp->hinhanhlienquan()->get() as $index=>$hinhanh)
                {
                    caption: "{{ $hinhanh->ha_ten }}",
                    size: {{ Storage::exists('public/photos/' . $hinhanh->ha_ten) ? Storage::size('public/photos/' . $hinhanh->ha_ten) : 0 }},
                    width: "120px",
                    url: "{$url}",
                    key: {{ ($index + 1) }}
                },
                @endforeach
            ]
        });
    });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script>
$(document).ready(function(){

});
</script>
@endsection