@extends('layouts.admin.master')

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
                    <p class="card-category">Tạo mới</p>
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
                    action="{{ route('danhsachloai.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lsp_id" class="bmd-label-floating">ID</label>
                                    <input type="text" class="form-control" id="lsp_id" name="lsp_id" value="{{ old('lsp_id') }}"
                                    ng-model="lsp_id" ng-minlength="5" ng-maxlength="5" ng-pattern="/^L/" ng-required=true>
                                    <span class="error" ng-show="userForm.lsp_id.$error.required">Vui lòng nhập ID</span>
                                    <span class="error" ng-show="userForm.lsp_id.$error.pattern">ID phải bắt đầu bằng L</span>
                                    <span class="error" ng-show="userForm.lsp_id.$error.minlength">ID phải có 5 ký tự</span>
                                    <span class="error" ng-show="userForm.lsp_id.$error.maxlength">ID phải có 5 ký tự</span>
                                    <span class="valid" ng-show="userForm.lsp_id.$valid">Hợp lệ</span>
                                </div>
                            </div>     
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lsp_ngaytaomoi" class="bmd-label-floating">Ngày tạo mới</label>
                                    <input type="date" class="form-control" id="lsp_ngaytaomoi" name="lsp_ngaytaomoi"
                                    ng-model="lsp_ngaytaomoi" ng-required=true>
                                    <span class="error" ng-show="userForm.lsp_ten.$error.required">Vui lòng chọn ngày tạo mới</span>

                                </div>
                            </div>       

                        </div>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lsp_ten" class="bmd-label-floating">Tên loại sản phẩm</label>
                                    <input type="text" class="form-control" placeholder="Loại sản phẩm" id="lsp_ten" name="lsp_ten"
                                    ng-model="lsp_ten" ng-minlength="5" ng-maxlength="30" ng-required=true>
                                    <span class="error" ng-show="userForm.lsp_ten.$error.required">Vui lòng nhập tên Loại</span>
                                    <span class="error" ng-show="userForm.lsp_ten.$error.minlength">Tên phải có it nhất 5 ký tự</span>
                                    <span class="error" ng-show="userForm.lsp_ten.$error.maxlength">Chỉ cho phép tên nhiều nhất 30 ký tự</span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lsp_trangthai" class="bmd-label-floating">Thiết lập trạng thái</label>
                                    <select id="lsp_trangthai" name="lsp_trangthai" class="form-control">
                                        <option value="1" {{ old('lsp_trangthai') == 1 ? "selected" : "" }}>Khóa</option>
                                        <option value="2" {{ old('lsp_trangthai') == 2 ? "selected" : "" }}>Khả dụng</option>
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