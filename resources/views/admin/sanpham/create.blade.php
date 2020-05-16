@extends('layouts.admin.master')

@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/angularjs/angular.min.js') }}"></script>
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection


@section('content')

<style>
        .error {color: orange;}
        .valid {color: green;}
</style>


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
                    <h4 class="card-title">SẢN PHẨM</h4>
                    <p class="card-category">Tạo mới </p>
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
                <div ng-app="validationApp" ng-controller="mainController">
                    <form name="userForm" ng-submit="submitForm()" novalidate method="post" 
                    action="{{ route('danhsachsanpham.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sp_ten" class="bmd-label-floating">Tên sản phẩm</label>
                                    <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten') }}"
                                    ng-model="sp_ten" ng-minlength="5" ng-maxlength="30" ng-required=true>
                                    <span class="error" ng-show="userForm.sp_ten.$error.required">Vui lòng nhập tên sản phẩm</span>
                                    <span class="error" ng-show="userForm.sp_ten.$error.minlength">Tên phải có it nhất 5 ký tự</span>
                                    <span class="error" ng-show="userForm.sp_ten.$error.maxlength">Chỉ cho phép tên nhiều nhất 30 ký tự</span>
                                    <span class="valid" ng-show="userForm.sp_ten.$valid">Hợp lệ</span>
                                </div>
                            </div>     
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lsp_id" class="bmd-label-floating">Loại sản phẩm</label>
                                    <select name="lsp_id" class="form-control">
                                    @foreach($danhsachloai as $loai)
                                        @if(old('lsp_id') == $loai->lsp_id)
                                        <option value="{{ $loai->lsp_id }}" selected>{{ $loai->lsp_ten }}</option>
                                        @else
                                        <option value="{{ $loai->lsp_id }}">{{ $loai->lsp_ten }}</option>
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
                                    <label for="sp_giagoc" class="bmd-label-floating">Giá gốc</label>
                                    <input type="number" class="form-control" id="sp_giagoc" name="sp_giagoc" value="{{ old('sp_giagoc') }}"
                                    ng-model="sp_giagoc" ng-minlength="5" ng-maxlength="5" ng-required=true min="50000" max="30000000">
                                    <span class="error" ng-show="userForm.sp_giagoc.$error.required">Vui lòng nhập giá gốc</span>
                                    <span class="error" ng-show="userForm.sp_giagoc.$error.min">Giá gốc phải > 50,000 đ</span>
                                    <span class="error" ng-show="userForm.sp_giagoc.$error.max">Giá gốc phải < 30,000,000 đ</span>
                                    <span class="valid" ng-show="userForm.sp_giagoc.$valid">Hợp lệ</span>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sp_giaban" class="bmd-label-floating">Giá bán</label>
                                    <input type="number" class="form-control" id="sp_giaban" name="sp_giaban" value="{{ old('sp_giaban') }}"
                                    ng-model="sp_giaban" ng-minlength="5" ng-maxlength="5" ng-required=true min="50000" max="30000000">
                                    <span class="error" ng-show="userForm.sp_giaban.$error.required">Vui lòng nhập giá bán</span>
                                    <span class="error" ng-show="userForm.sp_giaban.$error.min">Giá bán phải > 50,000 đ</span>
                                    <span class="error" ng-show="userForm.sp_giaban.$error.max">Giá bán phải < 30,000,000 đ</span>
                                    <span class="valid" ng-show="userForm.sp_giaban.$valid">Hợp lệ</span>
                                </div>
                            </div>     
                        </div>
                        <!-- endrow -->
                        <!-- dvt,chatlieu -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cl_id" class="bmd-label-floating">Chất liệu</label>
                                    <select name="cl_id" class="form-control">
                                        @foreach($danhsachchatlieu as $cl)
                                            @if(old('cl_id') == $cl->cl_id)
                                            <option value="{{ $cl->cl_id }}" selected>{{ $cl->cl_ten }}</option>
                                            @else
                                            <option value="{{  $cl->cl_id }}">{{ $cl->cl_ten }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="dvt_id" class="bmd-label-floating">Đơn vị</label>
                                    <select name="dvt_id" class="form-control">
                                        @foreach($danhsachdonvi as $dv)
                                            @if(old('dvt_id') == $dv->dvt_id)
                                            <option value="{{ $dv->dvt_id }}" selected>{{ $dv->dvt_ten }}</option>
                                            @else
                                            <option value="{{  $dv->dvt_id }}">{{ $dv->dvt_ten }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>     
                        </div>
                        <!-- endrow -->
                         <!-- Hình -->
                                <div class="form-group">
                                    <div class="file-loading">
                                        <label>Hình đại diện</label>
                                        <input id="sp_hinh" type="file" class="file" name="sp_hinh" ng-model="sp_hinh" ng-required=true>
                                    <!-- <span class="error" ng-show="userForm.sp_hinh.$error.required">Vui lòng chọn hình đại diện</span> -->
                                 </div>
                                </div>
                                <div class="form-group">
                                    <div class="file-loading">
                                        <label>Hình liên quan</label>
                                        <input id="sp_hinhanhlienquan" class="file" type="file" name="sp_hinhanhlienquan[]" multiple>
                                    </div>
                                </div>
                        <!-- endrow -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sp_thongtin" class="bmd-label-floating">Thông tin sản phẩm</label>
                                    <input type="text" class="form-control" id="sp_thongtin" name="sp_thongtin"
                                    ng-model="sp_thongtin" ng-maxlength="100">
                                    <span class="error" ng-show="userForm.sp_thongtin.$error.maxlength">Thông tin sản phẩm không vượt quá 100 ký tự</span>
                                </div>
                            </div>    
                            <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="sp_trangthai" class="bmd-label-floating">Trạng thái</label>
                                    <select id="sp_trangthai" name="sp_trangthai" class="form-control">
                                        <option value="1" {{ old('sp_trangthai') == 1 ? "selected" : "" }}>Khóa</option>
                                        <option value="2" {{ old('sp_trangthai') == 2 ? "selected" : "" }}>Khả dụng</option>
                                    </select>
                                    </div>
                                </div>

                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success float-right" type="submit">Update</button>
                        </div>
                    </form>
                    
<script>
  // tạo angular app
  var validationApp = angular.module('validationApp', []);
  // tạo Controller
  validationApp.controller('mainController', function ($scope) {
      // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
      $scope.submitForm = function () {
          // kiểm tra các ràng buộc là hợp lệ
          if ($scope.userForm.$valid) {
              alert('Hợp lệ, dữ liệu đã được gởi đăng ký.');
          }
      };
  });
</script>
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
            autoOrientImage: false,
            browseClass: "btn btn-primary btn-sm",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
            
        });

        $("#sp_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            autoOrientImage: false,
            browseClass: "btn btn-primary btn-sm",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"],
            
        });
    });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script>
@endsection

