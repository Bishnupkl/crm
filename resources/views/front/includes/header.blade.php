@section('header')
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- START DATA TABLE PLUGINS -->
    <link href="{{URL::to('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
    <!--END DATA TABLE PLUGINS-->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{URL::to('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{URL::to('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{URL::to('assets/layouts/layout3/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/layouts/layout3/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{URL::to('assets/layouts/layout3/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('css.style.css')}}" rel="stylesheet" type="text/css">
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{URL::to('css/style.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/front-inquiry.css')}}">
    <!-- <link rel="stylesheet" type="text/css" href="{{URL::to('css/navbar.css')}}"> -->

    <script src="{{URL::to('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
    <style>
        .error {
            color:red;
        }
    </style>

</head>
<body>
<div class="header">
    <!--<ul style="color: #fafafa;">-->
    <!--    <li>Want To Contact Us?</li>-->
    <!--    <li><i class="fa fa-phone" aria-hidden="true"></i>+977-1-4256121/+977-1-4212374</li>-->
    <!--    <li><i class="fa fa-envelope" aria-hidden="true"></i>info@grace.edu.np</li>-->
    <!--</ul>-->
    <!-- <ul style="color: #fafafa; font-size: 14px;">
        <li>Want To Contact Us?</li>
        <li><img src="{{URL::to('event/images/phone.png')}}" width="20px" />+977-1-4256121</li>
        <li><img src="{{URL::to('event/images/phone.png')}}" width="20px" />+977-9851140125</li>
        <li><img src="{{URL::to('event/images/email.png')}}" width="20px" />info@grace.edu.np</li>
    </ul> -->
</div>
<center>
    @if(session('error'))
        <div class="alert alert-success">{{session('error')}} </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}} </div>
    @endif
</center>

<!-- navBar Start -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="{{url('images/logos/graceintllogo.png')}}" class="logo-default" style="object-fit: cover;" width="110px"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Login</a></li>
        <li><a href="#">Register</a></li>
        <li><a href="#">Contact us</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- mavBar end -->



<!-- <div id="mySidenav" class="sidenav">
      <button class="closebtn" onclick="closeNav()">&times;</button>
      <a href="#">Login</a>
      <a href="#">Register</a>
      <a href="#">Contact</a>
    </div> -->
<!-- <div id="navbar" class="nav" > -->
    <!-- <a href="#"> -->
    <!-- <div class="nav-logo"><img src="{{url('images/logo/Grace-Logo.png')}}" class="navlogo" alt=""></div> -->
    <!-- </a> -->
    <!-- <a class="active" href="#">Login</a>
    <a href="#">Register</a>
    <a href="javascript:void(0)">Contact</a>
    <span style="font-size:30px;cursor:pointer; float: right;" onclick="openNav()">&#9776;</span>
</div> -->


@endsection
