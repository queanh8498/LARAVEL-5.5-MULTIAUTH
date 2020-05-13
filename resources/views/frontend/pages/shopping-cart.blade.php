@extends('frontend.layouts.master')

@section('title')
HOUZIE | Cart
@endsection

@section('custom-css')
@endsection

@section('main-content')
<style>
        .error {color: red;}
        .valid {color: green;}
</style>

<!-- Hiển thị giỏ hàng -->
<ngcart-cart template-url="{{ asset('vendor/ngCart/template/ngCart/cart.html') }}"></ngcart-cart>

<!-- Thông tin khách hàng -->
<div class="container" ng-controller="orderController">
    <form name="orderForm" ng-submit="submitOrderForm()" novalidate>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <h2>Thông tin khách hàng</h2>
               @guest
                <!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
                 <div> 
                  
                 </div> 

               
                <div class="form-group">
                    <label for="kh_hoten">Họ tên:</label>
                    <input type="text" class="form-control" id="kh_hoten" name="kh_hoten" ng-model="kh_hoten" ng-minlength="6" ng-maxlength="100" ng-required=true>
                    <li><span class="error" ng-show="orderForm.kh_hoten.$error.required">Vui lòng nhập Họ tên</span></li>
                    <li><span class="error" ng-show="orderForm.kh_hoten.$error.minlength">Họ tên phải > 6 ký tự</span></li>
                    <li><span class="error" ng-show="orderForm.kh_hoten.$error.maxlength">Họ tên phải <= 100 ký tự</span> </li>
                    <li><span class="valid" ng-show="orderForm.kh_hoten.$valid">Hợp lệ</span></li>

                </div>
                <div class="form-group">
                    <label for="kh_gioitinh">Giới tính:</label>
                    <select name="kh_gioitinh" id="kh_gioitinh" class="form-control" ng-model="kh_gioitinh" ng-required=true>
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                        <option value="2">Khác</option>
                    </select>
                    <li><span class="error" ng-show="orderForm.kh_gioitinh.$error.required">Vui lòng chọn giới tính</span></li>
                    <li><span class="valid" ng-show="orderForm.kh_gioitinh.$valid">Hợp lệ</span></li>

                </div>
                <div class="form-group">
                    <label for="kh_email">Email:</label>
                    <input type="email" class="form-control" id="kh_email" name="kh_email" ng-model="kh_email" ng-pattern="/^.+@gmail.com$/" ng-required=true>
                    <li><span class="error" ng-show="orderForm.kh_email.$error.required">Vui lòng nhập email</span></li>
                    <li><span class="error" ng-show="!orderForm.kh_email.$error.required && orderForm.kh_email.$error.pattern">Chỉ chấp nhập GMAIL, vui lòng kiểm tra lại</span></li>
                    <li><span class="valid" ng-show="orderForm.kh_email.$valid">Hợp lệ</span></li>
                </div>
            
                <div class="form-group">
                    <label for="kh_diachi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="kh_diachi" name="kh_diachi" ng-model="kh_diachi" ng-minlength="6" ng-maxlength="250">
                    <li><span class="error" ng-show="orderForm.kh_diachi.$error.minlength">Địa chỉ phải > 6 ký tự</span></li>
                    <li><span class="error" ng-show="orderForm.kh_diachi.$error.maxlength">Địa chỉ phải <= 250 ký tự</span> </li>

                </div>
                <div class="form-group">
                    <label for="kh_dienthoai">Điện thoại:</label>
                    <input type="text" class="form-control" id="kh_dienthoai" name="kh_dienthoai" ng-model="kh_dienthoai" ng-minlength="6" ng-maxlength="11">
                    <li><span class="error" ng-show="orderForm.kh_dienthoai.$error.minlength">Điện thoại phải > 6 ký tự</span></li>
                    <li><span class="error" ng-show="orderForm.kh_dienthoai.$error.maxlength">Điện thoại phải <= 11 ký tự</span> </li>
                
                </div>
        </div>
            
            <div class="col-lg-6 col-md-6">
                <h2>Thông tin Đặt hàng</h2>
                <!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
                
                <div class="form-group">
                    <label for="dh_diachi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="dh_diachi" name="dh_diachi" ng-model="dh_diachi" ng-minlength="6" ng-maxlength="250" ng-required=true>
                    <li><span class="error" ng-show="orderForm.dh_diachi.$error.required">Vui lòng nhập Địa chỉ</span></li>
                    <li><span class="error" ng-show="orderForm.dh_diachi.$error.minlength">Địa chỉ phải > 6 ký tự</span></li>
                    <li><span class="error" ng-show="orderForm.dh_diachi.$error.maxlength">Địa chỉ phải <= 250 ký tự</span> </li> 
                </div>
                <div class="form-group">
                    <label for="dh_dienthoai">Điện thoại:</label>
                    <input type="text" class="form-control" id="dh_dienthoai" name="dh_dienthoai" ng-model="dh_dienthoai" ng-minlength="6" ng-maxlength="11" ng-required=true>
                    <li><span class="error" ng-show="orderForm.dh_dienthoai.$error.required">Vui lòng nhập Điện thoại</span></li>
                    <li><span class="error" ng-show="orderForm.dh_dienthoai.$error.minlength">Điện thoại phải > 6 ký tự</span></li>
                    <li><span class="error" ng-show="orderForm.dh_dienthoai.$error.maxlength">Điện thoại phải <= 11 ký tự</span> </li>          
                </div>
               
                <div class="form-group">
                    <label for="vc_id">Hình thức vận chuyển:</label>
                    <select name="vc_id" id="vc_id" class="form-control" ng-model="vc_id" ng-required=true>
                        @foreach($danhsachvanchuyen as $vc)
                        <option value="{{ $vc->vc_id }}">{{ $vc->vc_ten }} ({{ $vc->vc_chiphi }} đ)</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tt_id">Phương thức thanh toán:</label>
                    <select name="tt_id" id="tt_id" class="form-control" ng-model="tt_id" ng-required=true>
                        @foreach($danhsachphuongthucthanhtoan as $tt)
                        <option value="{{ $tt->tt_id }}">{{ $tt->tt_ten }}</option>
                        @endforeach
                    </select>
                    <li><span class="error" ng-show="orderForm.tt_id.$error.required">Vui lòng chọn Phương thức thanh toán</span></li>
                </div>
            </div>

            @else
<!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
                <div>
                    <ul>
                        <!-- Thông báo lỗi kh_email -->
                        <li><span class="error" ng-show="orderForm.kh_email.$error.required">Vui lòng nhập email</span></li>
                        <li><span class="error" ng-show="!orderForm.kh_email.$error.required && orderForm.kh_email.$error.pattern">Chỉ chấp nhập GMAIL, vui lòng kiểm tra lại</span></li>

                        <!-- Thông báo lỗi kh_diaChi -->
                        <li><span class="error" ng-show="orderForm.kh_diachi.$error.minlength">Địa chỉ phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.kh_diachi.$error.maxlength">Địa chỉ phải <= 250 ký tự</span> </li>
                        <li><span class="error" ng-show="orderForm.kh_dienthoai.$error.minlength">Điện thoại phải > 6 ký tự</span></li>
                        <li><span class="error" ng-show="orderForm.kh_dienthoai.$error.maxlength">Điện thoại phải <= 11 ký tự</span> </li> </li> </div> <div class="form-group">
                        
                </div>

              
                <div class="form-group">
                    <label for="kh_hoten">Họ tên:</label>
                    <input type="text" class="form-control" id="kh_hoten" name="kh_hoten" ng-model="kh_hoten" ng-required=true ng-init="kh_hoten='{{ Auth::user()->username }}'">
                    <li><span class="valid" ng-show="orderForm.kh_hoten.$valid">Hợp lệ</span></li>
                </div>
                <div class="form-group">
                    <label for="kh_email">Email:</label>
                    <input type="email" class="form-control" id="kh_email" name="kh_email" ng-model="kh_email" ng-required=true ng-init="kh_email='{{ Auth::user()->email }}'">
                    <li><span class="error" ng-show="orderForm.kh_email.$error.required">Vui lòng nhập email</span></li>
                    <li><span class="error" ng-show="!orderForm.kh_email.$error.required && orderForm.kh_email.$error.pattern">Chỉ chấp nhập GMAIL, vui lòng kiểm tra lại</span></li>
                    <li><span class="valid" ng-show="orderForm.kh_email.$valid">Hợp lệ</span></li>
                </div>
                <div class="form-group">
                    <label for="kh_gioitinh">Giới tính:</label>
                    <select name="kh_gioitinh" id="kh_gioitinh" class="form-control" ng-model="kh_gioitinh" ng-required=true>
                        <option value="0">Nữ</option>
                        <option value="1">Nam</option>
                        <option value="2">Khác</option>
                    </select>
                    <li><span class="error" ng-show="orderForm.kh_gioitinh.$error.required">Vui lòng chọn giới tính</span></li>
                    <li><span class="valid" ng-show="orderForm.kh_gioitinh.$valid">Hợp lệ</span></li>

                </div>
                
            
                <div class="form-group">
                    <label for="kh_diachi">Địa chỉ:</label>
                    <input type="text" class="form-control" id="kh_diachi" name="kh_diachi" ng-model="kh_diachi" ng-minlength="6" ng-maxlength="250">
                    <li><span class="error" ng-show="orderForm.kh_diachi.$error.minlength">Địa chỉ phải > 6 ký tự</span></li>
                    <li><span class="error" ng-show="orderForm.kh_diachi.$error.maxlength">Địa chỉ phải <= 250 ký tự</span> </li>

                </div>
                <div class="form-group">
                    <label for="kh_dienthoai">Điện thoại:</label>
                    <input type="text" class="form-control" id="kh_dienthoai" name="kh_dienthoai" ng-model="kh_dienthoai" ng-minlength="6" ng-maxlength="11">
                    <li><span class="error" ng-show="orderForm.kh_dienthoai.$error.minlength">Điện thoại phải > 6 ký tự</span></li>
                    <li><span class="error" ng-show="orderForm.kh_dienthoai.$error.maxlength">Điện thoại phải <= 11 ký tự</span> </li>
                
                </div>
        </div>
            
            <div class="col-lg-6 col-md-6">
                <h2>Thông tin Đặt hàng</h2>
                <!-- Div Thông báo lỗi 
                Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$invalid = true
                Sử dụng tiền chỉ lệnh ng-show="orderForm.$invalid"
                -->
                 <div >
                    
                </div>
                
               
                <div class="form-group">
                    <label for="dh_diachi">Địa chỉ muốn nhận hàng:</label>
                    <input type="text" class="form-control" id="dh_diachi" name="dh_diachi" ng-model="dh_diachi" ng-minlength="6" ng-maxlength="250" ng-required=true>
                    <li><span class="error" ng-show="orderForm.dh_diachi.$error.required">Vui lòng nhập Địa chỉ</span></li>
                    <li><span class="error" ng-show="orderForm.dh_diachi.$error.minlength">Địa chỉ phải > 6 ký tự</span></li>
                    <li><span class="error" ng-show="orderForm.dh_diachi.$error.maxlength">Địa chỉ phải <= 250 ký tự</span> </li> 
                </div>
                <div class="form-group">
                    <label for="dh_dienthoai">Điện thoại liên hệ nhận hàng:</label>
                    <input type="text" class="form-control" id="dh_dienthoai" name="dh_dienthoai" ng-model="dh_dienthoai" ng-minlength="6" ng-maxlength="11" ng-required=true>
                    <li><span class="error" ng-show="orderForm.dh_dienthoai.$error.required">Vui lòng nhập Điện thoại</span></li>
                    <li><span class="error" ng-show="orderForm.dh_dienthoai.$error.minlength">Điện thoại phải > 6 ký tự</span></li>
                    <li><span class="error" ng-show="orderForm.dh_dienthoai.$error.maxlength">Điện thoại phải <= 11 ký tự</span> </li> 
                       
                </div>
               
                <div class="form-group">
                    <label for="vc_id">Hình thức vận chuyển:</label>
                    <select name="vc_id" id="vc_id" class="form-control" ng-model="vc_id" ng-required=true>
                        @foreach($danhsachvanchuyen as $vc)
                        <option value="{{ $vc->vc_id }}">{{ $vc->vc_ten }} ({{ $vc->vc_chiphi }} đ)</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tt_id">Phương thức thanh toán:</label>
                    <select name="tt_id" id="tt_id" class="form-control" ng-model="tt_id" ng-required=true>
                        @foreach($danhsachphuongthucthanhtoan as $tt)
                        <option value="{{ $tt->tt_id }}">{{ $tt->tt_ten }}</option>
                        @endforeach
                    </select>
                    <li><span class="error" ng-show="orderForm.tt_id.$error.required">Vui lòng chọn Phương thức thanh toán</span></li>
                </div>
            </div>
            @endguest
            
        </div>

        <!-- Div Thông báo validate hợp lệ 
        Chỉ hiển thị khi các validate trong form `orderForm` không hợp lệ => orderForm.$valid = true
        Sử dụng tiền chỉ lệnh ng-show="orderForm.$valid"
        -->
        <div class="alert alert-success" ng-show="orderForm.$valid">
            Thông tin hợp lệ, vui lòng bấm nút <b>"Thanh toán"</b> để hoàn tất ĐƠN HÀNG<br />
            Chúng tôi sẽ gởi mail đển quý khách. Xin chân thành cám ơn Quý Khách hàng đã tin tưởng sản phẩm của chúng tôi.
        </div>
        <!-- Nút submit form -->
        <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-4" ng-disabled="orderForm.$invalid && ngCart.getTotalItems() === 0">
            Thanh toán
        </button>
    </form>
</div>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
    // Khai báo controller `orderController`
    app.controller('orderController', function($scope, $http, ngCart) {
        $scope.ngCart = ngCart;

        // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
        $scope.submitOrderForm = function() {
            debugger;
            // kiểm tra các ràng buộc là hợp lệ, gởi AJAX đến action 
            if ($scope.orderForm.$valid) {
                // lấy data của Form
                var dataInputOrderForm_KhachHang = {
                    //"kh_taikhoan": $scope.orderForm.kh_taikhoan.$viewValue,
                    "kh_hoten": $scope.orderForm.kh_hoten.$viewValue,
                    "kh_gioitinh": $scope.orderForm.kh_gioitinh.$viewValue,
                    "kh_email": $scope.orderForm.kh_email.$viewValue,
                    "kh_diachi": $scope.orderForm.kh_diachi.$viewValue,
                    "kh_dienthoai": $scope.orderForm.kh_dienthoai.$viewValue,
                };

                var dataInputOrderForm_DatHang = {
                    "dh_diachi": $scope.orderForm.dh_diachi.$viewValue,
                    "dh_dienthoai": $scope.orderForm.dh_dienthoai.$viewValue,
                    "vc_id": $scope.orderForm.vc_id.$viewValue,
                    "tt_id": $scope.orderForm.tt_id.$viewValue,
                };

                var dataCart = ngCart.getCart();

                var dataInputOrderForm = {
                    "khachhang": dataInputOrderForm_KhachHang,
                    "donhang": dataInputOrderForm_DatHang,
                    "giohang": dataCart,
                    "_token": "{{ csrf_token() }}",
                };

                // sử dụng service $http của AngularJS để gởi request POST đến route `frontend.order`
                $http({
                    url: "{{ route('frontend.order') }}",
                    method: "POST",
                    data: JSON.stringify(dataInputOrderForm)
                }).then(function successCallback(response) {
                    // Clear giỏ hàng ngCart
                    $scope.ngCart.empty(true);

                    // Gởi mail thành công, thông báo cho khách hàng biết
                    swal('Đơn hàng hoàn tất!', 'Xin cám ơn Quý khách!', 'success');

                    // Chuyển sang trang Hoàn tất đặt hàng
                    if (response.data.redirectUrl) {
                        location.href = response.data.redirectUrl;
                    }
                }, function errorCallback(response) {
                    // Gởi mail không thành công, thông báo lỗi cho khách hàng biết
                    swal('Có lỗi trong quá trình thực hiện Đơn hàng!', 'Vui lòng thử lại sau vài phút.', 'error');
                    console.log(response);
                });
            }
        };
    });
</script>
@endsection