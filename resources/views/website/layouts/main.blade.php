  <!DOCTYPE html>
<html dir="ltr" lang="en">


<head>


  <!--] Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VIDYA AARAMBHA PLAYWAY SCHOOL</title>
    <meta name="description" content="">
    <meta name="keywords" content="business, care, childcare, children, clean, corporate, happykids, homeschool, kids, kindergarten, playground, responsive, school, learning">
   
	











	<link rel="shortcut icon" href="{{asset("/website/images/favicon.ico")}}">
	<link rel="apple-touch-icon" href="{{asset("/website/images/apple-touch-icon.png")}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset("/website/images/apple-touch-icon-72x72.png")}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset("/website/images/apple-touch-icon-114x114.png")}}">
	
	<!-- ==============================================
	CSS VENDOR
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="{{asset("/website/css/vendor/bootstrap.min.css")}}" />
	<link rel="stylesheet" type="text/css" href="{{asset("/website/css/vendor/font-awesome.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("/website/css/vendor/owl.carousel.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("/website/css/vendor/owl.theme.default.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("/website/css/vendor/magnific-popup.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("/website/css/vendor/animate.min.css")}}">
	
	<!-- ==============================================
	Custom Stylesheet
	=============================================== -->
	<link rel="stylesheet" type="text/css" href="{{asset("/website/css/style.css")}}" />
	
    <script src="{{asset("/website/js/vendor/modernizr.min.js")}}"></script>









</head>
    	<div id="page"> 
<!--     <div class="col-md-12">
 -->    @include('website.layouts.header')

    <!-- End Header -->

    @yield('content')

    <!-- End content -->


    <!-- footer 
      ================================================== -->
    @include('website.layouts.footer')

    <!-- End footer -->
     


       
 </div>


@section('script')



<!-- JS VENDOR -->
	<script src="{{asset("/website/js/vendor/jquery.min.js")}}"></script>
	<script src="{{asset("/website/js/vendor/bootstrap.min.js")}}"></script>
	<script src="{{asset("/website/js/vendor/owl.carousel.js")}}"></script>
	<script src="{{asset("/website/js/vendor/jquery.magnific-popup.min.js")}}"></script>

	<!-- SENDMAIL -->
	<script src="{{asset("/website/js/vendor/validator.min.js")}}"></script>
	<script src="{{asset("/website/js/vendor/form-scripts.js")}}"></script>

	<script src="{{asset("/website/js/script.js")}}"></script>
	<script src="{{asset("/website/js/custom.js")}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-140833503-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-140833503-1');
</script>
      @show 
     
</body>
</html>