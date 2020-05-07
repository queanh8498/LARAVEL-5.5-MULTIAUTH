<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .flex-container {
            display: flex;
        }
    </style>
</head>
<body>
<div class="bg0 m-t-23 p-b-140">
        <div class="container">
            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        Tất cả
                    </button>

                    @foreach($danhsachloai as $loaisanpham)
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".loaisanpham-{{ $loaisanpham->lsp_id }}">
                        {{ $loaisanpham->lsp_ten }}
                    </button>
                    @endforeach
                </div>

                <!-- Search product -->
                <div class="dis-none panel-search w-full p-t-10 p-b-15">
                    <div class="bor8 dis-flex p-l-15">
                        <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                            <i class="zmdi zmdi-search"></i>
                        </button>                       
                    </div>
                </div>

               <form action="{{ route('frontend.product')}}">
                    <div class="flex-container">
                        <input class="flex-c-m m-r-32 m-tb-5" type="text" name="search-product" placeholder="{{ __('laravelweb.search') }}">
                        <input class="flex-c-m size-104 bg5 bor1 hov-btn1" type="submit" value="OK">
                    </div>
                </form>                                         
            </div>

            <div class="row isotope-grid">
                @foreach($data as $index=>$sp)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item loaisanpham-{{ $sp->lsp_id }}">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" alt="IMG-PRODUCT" style="width: 250px; height: 200px;">

                            <a href="#" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal" data-sp-id="{{ $sp->sp_id }}">
                                {{ __('laravelweb.xemchitiet') }}
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{ $sp->sp_ten }}
                                </a>

                                <span class="stext-105 cl3">
                                    {{ number_format($sp->sp_giaban, 0, ',',',') }} VNĐ
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Modal quick view -->
                    @include('frontend.widgets.product-quick-view', ['sp' => $sp, 'hinhanhlienquan' => $danhsachhinhanhlienquan])
                </div>
                @endforeach
            </div>

            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45">
                <a href="{{ route('frontend.product') }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                {{ __('laravelweb.loadmore') }}
                </a>
            </div>
        </div>
    </div>
</body>
</html>
