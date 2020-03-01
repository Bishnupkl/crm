
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title',$title)</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{URL::to('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{URL::to('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{URL::to('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{URL::to('assets/pages/css/lock.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
    <link rel="stylesheet" type="text/css" href="{{URL::to('css/login.css')}}">
<!-- END HEAD -->

<body class="login">
<div class="blurred-background-image"></div>
<div class="page-lock">
<!-- <div class=""> -->
    <div class="page-logo">
        <a class="brand" href="{{url('admin')}}">
            <img src="{{URL::to('images/logos/grace-logo-big.png')}}" alt="Grace International" /> </a>
    </div>
    <center>
        @if(session('error'))
            <div class="alert alert-danger">{{session('error')}} </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}} </div>
        @endif
    </center>
    <div class="page-body">
    <!-- <div class="content"> -->
        <div class="lock-head"> Login </div>

        <div class="content">
          <form action="{{route('login')}}" method="post">
            {{csrf_field()}}
            <div class="login-body">
              <div class="form-group">
                <label for="email"><span>Email: </span></label><br>
                <input type="email" id="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                @if ($errors->has('email'))
                        <span class="help-block">
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        </span>
                @endif
              </div>
              <div class="form-group">
                <label for="password"><span>Password: </span></label><br>
                <input type="password" id="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
              <div class="submit-btn">
                <input type="submit" class="btn red uppercase" name="" value="Submit">
              </div>
            </div>
          </form>
        </div>

        <div class="lock-bottom">
            <a href="">Not Grace Staff?</a>
        </div>
    </div>
    <div class="page-footer-custom"> 2016 &copy; Grace CRM 2018 </div>
</div>
<!--[if lt IE 9]>
<script src="{{URL::to('assets/global/plugins/respond.min.js')}}')}}"></script>
<script src="{{URL::to('assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{URL::to('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{URL::to('assets/global/scripts/app-main.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{URL::to('assets/pages/scripts/lock.min.js')}}" type="text/javascript"></script>
<script src="{{URL::to('js/loginStyle.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>
