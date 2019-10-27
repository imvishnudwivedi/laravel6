<!DOCTYPE html>
<html>
  <head>
  <title>{{env('PROJECT_NAME','vidyaaarambha')}} | Log in</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
<style>
  @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.login-block{
    background: #3c3b6e;  /* fallback for old browsers */
background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to bottom, #3c3b6e, #3c3b6e); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
float:left;
width:100%;
padding : 50px 0;
}
 .banner-sec{background:url()  no-repeat left bottom; background-size:cover;  border-radius: 0 10px 10px 0; padding:0;} 
.container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px #E31E34;}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 50px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #E31E34; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}
  </style>
  
  

</head>
  <body class="login-page">
  
<section class="login-block">
    <div class="container">
	<div class="row">
     
		<div class="col-md-4 login-sec">
    <div class="alert alert-{{Session::get("er_type")}}">{{Session::get('message')}}</div>
        <!-- <h2 class="text-center">Login Now</h2> -->
        <!-- <img src="{{ asset("/vidyaaarambha/pepsi.png")}}" width="150px;" height="100px;"><br> -->
        <form class="login-form" method="POST" action="{{ route('login') }}"><br>
          @csrf
  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <label for="exampleInputEmail1" class="text-uppercase">Username</label>
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
@enderror





  </div>
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="exampleInputPassword1" class="text-uppercase">Password</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
  </div>

    <div class="form-check">
      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
    <button type="submit" class="btn btn-login float-right">LogIn</button>
    <!-- <button type="submit" class="btn btn-login float-right">Submit</button> -->
  </div>
  
</form>
<div class="copy-text">Created with <i class="fa fa-heart"></i>  by <a href="https://dooziesoft.com/">dooziesoft.com</a></div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
                    <!--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="{{ asset("/vidyaaarambha/ssss.jpeg")}}" alt="First slide">
    <div class="carousel-caption d-none d-md-block">
      
      <div class="row">  
        <div class="col-sm-6">
      <div class="">
            <h2>Our Mission - </h2>
            <p>We identify the customers’ pain points, deliver effective technology solutions to solve customer problems using our domain expertise; make customer successful.
</p>
        </div>	
        </div>
        <div class="col-sm-6">
      <div class="">
            <h2>Our Vision - </h2>
            <p>We aspire to be  #1 in the Semiconductor Services and Memory System Test products.</p>
        </div>	
        </div>
        <!-- <div class="col-sm-4">
      <div class="">
            <h2>Our Values</h2>
            <p>We Add Value : Domain Expertise, Proven Methodologies, Intelligence in our Product & Services
Customer Focused Obsession : Do-What-Ever-It-Takes to ensure Customer Satisfaction & Success
Exceptional Practices : Deployment of industry leading processes
People First : We build the company together, it is partnership</p>
        </div>	
        </div> -->
</div>

  </div>
    </div>
  <!--   <div class="carousel-item">-->
  <!--    <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">-->
  <!--    <div class="carousel-caption d-none d-md-block">-->
  <!--      <div class="banner-text">-->
  <!--          <h2>This is Heaven</h2>-->
  <!--          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>-->
  <!--      </div>	-->
  <!--  </div>-->
  <!--  </div>-->
  <!--   <div class="carousel-item">-->
  <!--    <img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">-->
  <!--    <div class="carousel-caption d-none d-md-block">-->
  <!--      <div class="banner-text">-->
  <!--          <h2>This is Heaven</h2>-->
  <!--          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>-->
  <!--      </div>	-->
  <!--  </div>-->
  <!--</div>-->
            </div>	   
		    
		</div>
	</div>
</div>
</section>
<script type="text/javascript">
       $(function(){
         @if(Session::has('message'))
  $.notify("{{Session::get('message')}}",{
    type:'{{Session::get("er_type")}}',
  });
  @endif

        $('body').css('background-color','#3c3b6e');
       });
     </script>
  </body>
</html>