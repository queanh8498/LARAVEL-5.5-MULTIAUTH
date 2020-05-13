<link rel="stylesheet" href="{{ asset('vendor\bootstrap\css\bootstrap.min.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{ asset('vendor/font-awesome-4.7.0/css/font-awesome.min.css') }}">

<style>
@import url("https://fonts.googleapis.com/css?family=Antic+Didone|Dosis|Stoke|Lora");

.dropdown:hover>.dropdown-menu{
    display:block;
}

.input-search input{
    width: 500px;
    height: 35px;
    border: 1px solid #ccc;
    border-top: none;
    border-left: none;
    border-right: none;
}
.dropdown-menu {
    float: left;
    width: 100%; }

  .carousel-inner img{
    width: 95%;
    height: 630px;
    margin-left:auto;
    margin-right:auto;
    display:block;

    /*3 dong cuối là căn giữa hinh anh. nhớ nhé !!! */
  }

#header-nav>.nav.stroke ul li a {
  position: relative;
}
#header-nav nav.stroke ul li a:after {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  width: 0%;
  content: '.';
  color: transparent;
  background: #aaa;
  height: 1px;
}
#header-nav nav.stroke ul li a:hover:after {
  width: 100%;
}

 #header-nav .nav-item a{
  background-color:white;
  color:black;
  margin-right:0px;
  font-family: Georgia;
  font-size: 15px;
 }

nav.stroke ul li a {
  position: relative;
}
nav.stroke ul li a:after {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  width: 0%;
  content: '.';
  color: transparent;
  background: #aaa;
  height: 1px;
}
nav.stroke ul li a:hover:after {
  width: 100%;
}

  .nav-item a{
    background-color:white;
    color:black;
    margin-right:70px;
    font-family: Georgia;
    font-size: 18px;
  }

.dropdown .dropdown-item:hover {
    display: block;
    background-color:salmon;
}

.thumbnails img{
  margin-left:auto;
  margin-right:auto;
  display:block;

}

.product .sp h1{
  font-family: 'Lora', serif;
}

.product .container{

	font-size: 20px;
	/* text-align:center; */
}
.container ul li{
	display:inline-block; /*de tren cung 1 dong*/
	padding: 5px 5px;
}
.product .container  {
	display:outline-block;
	margin-right: 30px;
}
.product .container .img-fluid {
	-webkit-transform: scale(1.0);
	-moz-transform: scale(1.0);
	-ms-transform: scale(1.0);
	-o-transform: scale(1.0);
	transform: scale(1.0);
}
.product .container .img-fluid:hover{
	-webkit-transform: scale(1.2);
	-moz-transform: scale(1.2);
	-ms-transform: scale(1.2);
	-o-transform: scale(1.2);
	transform: scale(1.2);
}
</style>

  <div class="container" style="margin-bottom:-10px" >
    <div id="header-nav">
    <nav class="navbar navbar-expand-md float-left sticky-top " style="display:inline-block;">
            <nav class="stroke">
            <!-- Links-->
              <ul class="navbar-nav" >

                @guest

                <li class="nav-item">
                  <a class ="nav-link" href="{{ route('login') }}">&nbsp;&nbsp;</i>{{ __('laravelweb.dangnhap') }}</a>
                </li>
                <li class="nav-item">
                      <a class ="nav-link" href="{{ route('register') }}">&nbsp;&nbsp;</i>{{ __('laravelweb.dangky') }}</a>
                </li>
                @else
                <li class="nav-item">
                    <a class ="nav-link" href="{{ route('user.logout') }}">
                    {{ __('laravelweb.dangxuat') }} &nbsp; <i class="fa fa-sign-out fa-lg" aria-hidden="true"></i>

                    </a>
                    <li class="nav-item">
                      <a class ="nav-link">&nbsp;&nbsp;</i>{{ __('laravelweb.xinchao') }} {{ Auth::user()->username }}</a>
                </li>
                </li>
                @endguest

            </nav>
        </nav>
        <nav class="navbar navbar-expand-md float-right sticky-top " style="display:inline-block;">
            <nav class="stroke">
         <!-- Links-->
              <ul class="navbar-nav" >


                <li class="nav-item">
                  <a class ="nav-link" href="{{ route('app.setLocale', ['locale' => 'en']) }}">&nbsp;&nbsp;</i>EN</a>
                </li>
                <li class="nav-item">
                      <a class ="nav-link" href="{{ route('app.setLocale', ['locale' => 'vi']) }}">&nbsp;&nbsp;</i>VI</a>
                </li>
<!--
                <li class="nav-item">
                    <a class ="nav-link" href=""><i class="fa fa-sign-out">&nbsp;&nbsp;</i>Sign Out</a>
                  </li> -->

                    <div class="wrap-icon-header flex-w flex-r-m">
                      <!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="0">
                          <i class="zmdi zmdi-shopping-cart"></i>
                      </div> -->
                      <ngcart-summary class="js-show-cart" template-url="{{ asset('vendor/ngCart/template/ngCart/summary.html') }}"></ngcart-summary>
                    </div>
              </ul>
            </nav>
        </nav>
      </div>
    </div>
    <br><br>
    <!-- close div container -->
<div></div>
    <div class="container text-center" style="margin-bottom: 20px; ">
    <br>
    <h1 style="font-weight:700;line-height: 0;margin-top: 0px; ">H O U Z I E</h1>

      <!-- <div class="container-form-search " >
        <form id="form-search" method="get" action="{{ route('frontend.product')}}" class="ng-pristine ng-valid">
          <div class="input-search center-block">
          <input type="text" data-ng-model="textSearch" value ="" name="search-product" auto-complete placeholder="{{ __('laravelweb.search') }}." id="input-search" class="ng-pristine ng-untouched ng-valid ui-autocomplete-input" autocomplete="off">
          <span class="fa fa-search" style="margin-left:200px"></span>
          </div><!--close input-search-->
        <!-- </form>
      </div>close container-form-search --> 


    </div><!--close "container text-center-->
  </div><!--close container-wrapper-->

<!--THANH LOGO - NEW - BRANDS ... -->

  <nav class="navbar navbar-expand-md sticky-top" style="background-color:white;color:black" >
    <!--Brand-->
    <div class="container justify-content-center">
      <nav class="stroke">
      <!-- Links-->
        <ul class="navbar-nav" >
          <li class="nav-item">
            <a class ="nav-link" href="{{ route('frontend.home') }}">{{ __('laravelweb.home') }}</a>
          </li>

          <li class="nav-item">
            <a class ="nav-link" href="{{ route('frontend.product') }}">{{ __('laravelweb.products') }}</a>
          </li>
          <li class="nav-item">
            <a class ="nav-link" href="#">{{ __('laravelweb.inspiration') }}</a>
          </li>

          <li class="nav-item">
            <a class ="nav-link" href="{{ route('frontend.contact') }}">{{ __('laravelweb.contact') }}</a>
          </li>
      <!--THANH THẢ XUỐNG-->
          <li class="nav-item dropdown">
            <a class ="nav-link dropdown-toggle" href="#" data-toggle="dropdown">ABOUT</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">a</a>
              <a class="dropdown-item" href="#">b</a>
              <a class="dropdown-item" href="#">c</a>
            </div>
          </li>
        </ul>
      </nav>
    </div>
  </nav>
  <div id="demo" class="carousel slide" data-ride="carousel">

</div>


