{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Liên hệ Shop Trái Cây - Ngon Ngon
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('{{ asset('img/slider/two.jpg') }}');">
    <h2 class="ltext-105 cl0 txt-center">
        {{ __('laravelweb.contact') }}
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116" ng-controller="contactController">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form name="contactForm" ng-submit="submitContactForm()" novalidate>
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        {{ __('laravelweb.guiloinhan') }}
                    </h4>

                    <!-- Div Thông báo lỗi 
            Chỉ hiển thị khi các validate trong form `contactForm` không hợp lệ => contactForm.$invalid = true
            Sử dụng tiền chỉ lệnh ng-show="contactForm.$invalid"
            -->
                    <div class="alert alert-danger" ng-show="contactForm.$invalid">
                        <ul>
                            <!-- Thông báo lỗi email -->
                            <li><span class="error" ng-show="contactForm.email.$error.required">{{ __('laravelweb.loiemail') }}</span></li>
                            <li><span class="error" ng-show="!contactForm.email.$error.required && contactForm.email.$error.pattern">{{ __('laravelweb.loigmail') }}</span></li>
                            
                            <!-- Thông báo lỗi dienthoai -->
                            <li><span class="error" ng-show="contactForm.dienthoai.$error.required">{{ __('laravelweb.loisdt') }}</span></li>
                            <!-- <li><span class="error" ng-show="!contactForm.dienthoai.$error.required && contactForm.dienthoai.$invalid">{{ __('laravelweb.loidinhdangsdt') }}</span></li> -->
                            <li><span class="error" ng-show="contactForm.dienthoai.$error.minlength">{{ __('laravelweb.loikitusdt') }}</span></li>
                            

                            <!-- Thông báo lỗi message -->
                            <li><span class="error" ng-show="contactForm.message.$error.required">{{ __('laravelweb.loiloinhan') }}</span></li>
                            <li><span class="error" ng-show="contactForm.message.$error.minlength">{{ __('laravelweb.minloinhan') }}</span></li>
                            <li><span class="error" ng-show="contactForm.message.$error.maxlength">{{ __('laravelweb.maxloinhan') }}</span> </li> </li> </div> <!-- Div Thông báo validate hợp lệ Chỉ hiển thị khi các validate trong form `contactForm` không hợp lệ=> contactForm.$valid = true
                                        Sử dụng tiền chỉ lệnh ng-show="contactForm.$valid"
                                        -->
                                        <div class="alert alert-success" ng-show="contactForm.$valid">
                                            Thông tin hợp lệ, vui lòng bấm nút <b>"Gởi lời nhắn"</b> để gởi mail đến Quản trị trang web<br />
                                            Xin chân thành cám ơn các đóng góp, ý kiến, thắc mắc của Quý Khách hàng.
                                        </div>

                                        <!-- Validate email -->
                                        <div class="bor8 m-b-20 how-pos4-parent">
                                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="{{ __('laravelweb.your_email') }}" ng-model="email" ng-pattern="/^.+@gmail.com$/" ng-required=true>
                                            <span class="valid" ng-show="userInfo.email.$valid">Hợp lệ</span>
                                            <img class="how-pos4 pointer-none" src="{{ asset('themes/cozastore/images/icons/icon-email.png') }}" alt="ICON">
                                        </div>

                                        <!-- Validate số điện thoại -->
                                        <div class="bor8 m-b-20 how-pos4-parent">
                                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="dienthoai" placeholder="{{ __('laravelweb.your_phonenumber') }}" ng-model="dienthoai" ng-minlength="9" ng-required=true>
                                            <span class="valid" ng-show="userInfo.dienthoai.$valid">Hợp lệ</span>
                                            <img class="how-pos4 pointer-none" src="{{ asset('themes/cozastore/images/icons/icon-email.png') }}" alt="ICON">
                                        </div>

                                        <!-- Validate lời nhắm -->
                                        <div class="bor8 m-b-30">
                                            <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="message" placeholder="{{ __('laravelweb.your_problem') }}" ng-model="message" ng-minlength="6" ng-maxlength="250" ng-required=true></textarea>
                                        </div>

                                        <!-- Nút submit form -->
                                        <button type="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" ng-disabled="contactForm.$invalid">
                                            {{ __('laravelweb.send_message') }}
                                        </button>
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            {{ __('laravelweb.diachi') }}
                        </span>

                        <p class="stext-115 cl6 size-213 p-t-18">
                            {{ __('laravelweb.diachicuthe') }}
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            {{ __('laravelweb.duongdaynong') }}
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            0915-659-223
                        </p>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            {{ __('laravelweb.email_hotro') }}
                        </span>

                        <p class="stext-115 cl1 size-213 p-t-18">
                            queanhst98@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bản đồ Địa chỉ công ty -->
        <div class="row mt-4">
            <div class="col-md-12 text-center mb-4">
                <h2>{{ __('laravelweb.diachi_lienhe') }}</h2>
            </div>
            <div class="col-md-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.723612696626!2d105.78061631534743!3d10.03965089282403!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a062a768a8090b%3A0x4756d383949cafbb!2zMTMwIFjDtCBWaeG6v3QgTmdo4buHIFTEqW5oLCBBbiBI4buZaSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1544352305719" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
    // Khai báo controller `contactController`
    app.controller('contactController', function($scope, $http) {
        // hàm submit form sau khi đã kiểm tra các ràng buộc (validate)
        $scope.submitContactForm = function() {
            // kiểm tra các ràng buộc là hợp lệ, gởi AJAX đến action 
            if ($scope.contactForm.$valid) {
                // lấy data của Form
                var dataInputContactForm = {
                    "dienthoai": $scope.contactForm.dienthoai.$viewValue,
                    "email": $scope.contactForm.email.$viewValue,
                    "message": $scope.contactForm.message.$viewValue,
                    "_token": "{{ csrf_token() }}",
                };

                // sử dụng service $http của AngularJS để gởi request POST đến route `frontend.contact.sendMailContactForm`
                $http({
                    url: "{{ route('frontend.contact.sendMailContactForm') }}",
                    method: "POST",
                    data: JSON.stringify(dataInputContactForm)
                }).then(function successCallback(response) {
                    // Gởi mail thành công, thông báo cho khách hàng biết
                    swal('Gởi mail thành công!', 'Chúng tôi sẽ trả lời Quý khách trong thời gian sớm nhất. Xin cám ơn!', 'success');
                }, function errorCallback(response) {
                    // Gởi mail không thành công, thông báo lỗi cho khách hàng biết
                    swal('Có lỗi trong quá trình gởi mail!', 'Vui lòng thử lại sau vài phút.', 'error');
                    console.log(response);
                });

            }
        };
    });
</script>
@endsection