<html dir="ltr" lang="en-US">


<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>



    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="SemiColonWeb" />
    <link rel="shortcut icon" href="images/fav-icon.png">

    <link href="https://fonts.googleapis.com/css?family=Oxygen:300,400,700" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Exo+2:200,300,400" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::to('event/css/bootstrap.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{URL::to('event/css/style-technorio.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{URL::to('event/css/dark.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{URL::to('event/css/font-icons.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{URL::to('event/css/magnific-popup.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{URL::to('event/css/swiper.css')}}" type="text/css" />

    <link href="{{URL::to('event/css/font-awesome.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::to('event/css/flexslider.css')}}">

    <link href="{{URL::to('event/css/animate.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{URL::to('event/css/responsive.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{URL::to('event/css/custom.css')}}" type="text/css" />

    <!-- Owl Carousel Assets -->
    <link href="{{URL::to('event/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{URL::to('event/css/owl.theme.css')}}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:image" content="http://fair.graceintlgroup.com/event/images/web_banner.jpg" />
    <meta property = "og:description" content="Register Today for Grace Australia Edu. Fair 2018 happening in four major cities of Nepal viz Butwal, Pokhara, Chitwan, Kathmandu.">
    <title>Grace Australia Edu Fair 2018 </title>
    <style>
        .form-group{
            margin-bottom:0;
        }
        h2,h3,h4,h5{
            color:#f1f1f1;
        }
        .portlet{
            background-color: #0176c0;
        }
        label{
            color:#fafafa;
            font-size: 13px;
            font-weight:bold;
        }
        .col-md-12{
            margin:0;
        }
        .new{
            margin:11px;
            /*height:390px;*/
            background-color: #0176c0;
            vertical-align: center;
            border-radius:8px;
            color: #fafafa;
        }
        .Form{
            background-color: #e2e2e2;
        }
        .welcome{
            padding: 2rem;
        }
        .welcome-font{
            color:#f1f1f1 !important
        }
        .parties {
            border: 1px solid black;
            padding : 0.3rem;
            /*border-radius: 1rem;*/
            margin: 0.2rem;
        }
    </style>
</head>
<body class="stretched">

<div id="wrapper">
    <header id="header" class="header">
        <div id="header-wrap">
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-sm-12">
                            <div class="top-header-item contact-item">
                                <ul>
                                    <li>Want To Contact Us?</li>
                                    <li><img src="{{URL::to('event/images/phone.png')}}" width="20px" /> <a href="tel:+977 1 4256121">
                                            +977-1-4256121</a></li>
                                    <li><img src="{{URL::to('event/images/phone.png')}}" width="20px" /> <a href="tel:+977 9851140125">+977-9851140125</a></li>
                                    <li><img src="{{URL::to('event/images/email.png')}}" width="20px" /> <a href="mailto:info@grace.edu.np">info@grace.edu.np</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container clearfix">
                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <div id="logo" style="width:140px;">
                            <a href="#"><img src="{{URL::to('event/images/Grace-Logo.png')}}"></a>
                        </div><!-- #logo end -->
                    </div>
                    <div class="col-md-9 col-sm-9">
                        <nav id="primary-menu">
                            <ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1500">
                                <li><a href="#" data-href="#section-register"><div>Home</div></a></li>
                                <li><a href="#" data-href="#section-welcome"><div>Welcome</div></a></li>
                                <li><a href="#" data-href="#section-testimonial"><div>Testimonial</div></a></li>
                                <li><a href="#" data-href="#section-we-represent"><div>We Represent</div></a></li>
                                <li><a href="#" data-href="#section-event"><div>Event Attractions</div></a></li>
                                <li><a href="#" data-href="#section-venue"><div>Venue</div></a></li>
                            </ul>
                        </nav><!-- #primary-menu end -->
                    </div>
                </div>
            </div>
        </div>
    </header><!-- #header end -->
    <center>
        @if(session('error'))
            <div class="alert alert-danger">{{session('error')}} </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}} </div>
        @endif
    </center>
    <center>
        @if(isset($errors) && count($errors)>0)
            <div class="alert alert-danger">There may be some error in form data. Try Again... </div>
        @endif
    </center>
    <section id="content">
        <div class="content">
            <section id="section-home">
                <div class="banner-bg">
                    <!--<div class="flexslider">-->
                    <!--    <ul class="slides">-->
                <!--        <li><img src="{{URL::to('event/img/portal-slider.png')}}">-->
                    <!--        </li>-->
                    <!--    </ul>-->
                    <!--</div>-->
                </div>
            </section>
            <section class="Form" id="section-register">
                <div class="welcome">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="new">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img src="{{URL::to('event/images/web_banner.jpg')}}" class="img img-responsive">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" onchange="Help(this)">
                            <div class="portlet light bordered" style="border:1px solid #ccc;border-radius:8px;padding: 20px;margin-top:10px;">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h2 style="margin:0 0 10px 0;"><b>REGISTER FOR THE EVENT</b></h2>
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="portlet-body">
                                        <form action="{{route('event.register')}}" method="post">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                                                        <input type="text" name="name" value="{{old('name')}}" data-required="1" class="form-control" placeholder="Name" required="">
                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('email')? 'has-error':''}}">
                                                        <input type="email" id="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Email" required="">
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('mobile')? 'has-error':''}}">
                                                        <input type="text" id="mobile" data-inputmask="mask: 999-999-9999" value="{{old('mobile')}}" name="mobile" class="form-control" placeholder="Mobile" required="">
                                                        @if ($errors->has('mobile'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('mobile') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('address')? 'has-error':''}}">
                                                        <input type="text" id="address" value="{{old('address')}}" name="address" class="form-control" placeholder="Temporary Address" required="">
                                                        @if ($errors->has('address'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('address') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- LATEST QUALIFICATION -->
                                            <h4 style="margin:0">Latest Qualification : </h4>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('qualification')? 'has-error':''}}">
                                                        <select id="qualification" onchange="Select(this);" name="qualification" class="form-control" required="">
                                                            <option value="">Select Qualification</option>
                                                            <option value="SLC/SEE" {{(old('qualification')=='SLC/SEE') ? 'selected' : ''}}>SEE/SLC</option>
                                                            <option value="A-LEVELS" {{(old('qualification')=='A-LEVELS') ? 'selected' : ''}}>A-Levels</option>
                                                            <option value="10+2/PCL" {{(old('qualification')=='10+2/PCL') ? 'selected' : ''}}>10+2/PCL</option>
                                                            <option value="Bachelor (3 years)" {{(old('qualification')=='Bachelor (3 years)') ? 'selected' : ''}}>Bachelor's(3 years)</option>
                                                            <option value="Bachelor (4 years)" {{(old('qualification')=='Bachelor (4 years)') ? 'selected' : ''}}>Bachelor's (4 years)</option>
                                                            <option value="MASTER/ABOVE" {{(old('qualification')=='MASTER/ABOVE') ? 'selected' : ''}}>Master and Above</option>
                                                        </select>
                                                        @if ($errors->has('qualification'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('qualification') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div id="qualify" @if($errors->has('faculty') || $errors->has('percentage') || $errors->has('passed_year') || ! empty(old('qualification'))) style="display: block" @else style="display: none" @endif>
                                                    <div class="col-md-6" id="faculty" @if(old('qualification')== 'SLC/SEE') style="display:none" @endif>
                                                        <div class="form-group {{$errors->has('faculty')? 'has-error':''}}">
                                                            <input type="text" id="faculty" value="{{old('faculty')}}" name="faculty" class="form-control" placeholder="Stream/Faculty">
                                                            @if ($errors->has('faculty'))
                                                                <span class="help-block">
                                                                <strong>{{ $errors->first('faculty') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group {{$errors->has('percentage')? 'has-error':''}}">
                                                            <input type="text" id="percentage" value="{{old('percentage')}}" name="percentage" class="form-control" placeholder="Percentage or CGPA">
                                                            @if ($errors->has('percentage'))
                                                                <span class="help-block">
                                                                <strong>{{ $errors->first('percentage') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group {{$errors->has('passed_year')? 'has-error':''}}">
                                                            <input type="number" id="passed_year" value="{{old('passed_year')}}" aria-required="true" name="passed_year" class="form-control" placeholder="Passed Year">
                                                            @if ($errors->has('passed_year'))
                                                                <span class="help-block">
                                                                <strong>{{ $errors->first('passed_year') }}</strong>
                                                            </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('test_taken')? 'has-error':''}}">
                                                        <input type="text" id="course" value="{{old('course')}}" aria-required="true" name="course" class="form-control" placeholder="Interested Course" required="">
                                                        @if ($errors->has('course'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('course') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('location')? 'has-error':''}}">
                                                        <select name="location" class="form-control" required="">
                                                            <option value="">Select Venue Location</option>
                                                            <option value="Butwal" {{(old('location')=='Butwal') ? 'selected' : ''}}>Butwal</option>
                                                            <option value="Chitwan" {{(old('location')=='Chitwan') ? 'selected' : ''}}>Chitwan</option>
                                                            <option value="Pokhara" {{(old('location')=='Pokhara') ? 'selected' : ''}}>Pokhara</option>
                                                            <option value="Kathmandu" {{(old('location')=='Kathmandu') ? 'selected' : ''}}>Kathmandu</option>
                                                        </select>@if ($errors->has('location'))
                                                            <span class="help-block">
                                                            <strong>{{ $errors->first('location') }}</strong>
                                                        </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                function Select(input){
                                                    if (input.value == 'Select Qualification'| input.value == null ){
                                                        document.getElementById('qualify').style.display ="none";
                                                    }else if(input.value == 'SLC/SEE'){
                                                        document.getElementById('faculty').style.display ="none";

                                                        document.getElementById('qualify').style.display ="block";
                                                    }
                                                    else{
                                                        document.getElementById('faculty').style.display ="block";
                                                        document.getElementById('qualify').style.display ="block";
                                                    }
                                                }
                                            </script>
                                            <!-- ENDING LATEST QUALIFICATION -->
                                            <!-- English Proficiency -->
                                            {{--<h4 style="margin:0">English Proficiency : </h4>--}}
                                            <div class="row">
                                                <div class="col-md-12" style="margin-bottom:-20px;">
                                                    <div class="form-group {{$errors->has('test_taken')? 'has-error':''}}">
                                                        <h5>Have you ever Taken a English Proficiency test?
                                                            <label onclick="testShow();">
                                                                <input type="radio" name="test_taken" {{(old('test_taken')=='Yes') ? 'checked' : ''}} value="Yes" required/> Yes </label>
                                                            <label onclick="testHide();">
                                                                <input type="radio" name="test_taken" {{(old('test_taken')=='No') ? 'checked' : ''}} value="No" required/> No </label></h5>
                                                        @if ($errors->has('test_taken'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('test_taken') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="english_test" @if($errors->has('test') || $errors->has('score') || old('test_taken')=='Yes') style="display: block" @else style="display: none" @endif>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('test')? 'has-error':''}}">
                                                        <!-- <label for="test">Test</label> -->
                                                        <select id="test" name="test" class="form-control">
                                                            <option value="">Select Test</option>
                                                            <option value="IELTS" {{(old('test')=='IELTS') ? 'selected' : ''}}>IELTS</option>
                                                            <option value="TOEFL-iBT" {{(old('test')=='TOEFL-iBT') ? 'selected' : ''}}>TOEFL-iBT</option>
                                                            <option value="PTE" {{(old('test')=='PTE') ? 'selected' : ''}}>PTE</option>
                                                        </select>
                                                        @if ($errors->has('test'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('test') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('score')? 'has-error':''}}">
                                                        <input type="number" aria-required="true" value="{{old('score')}}" id="score" name="score" class="form-control" placeholder="Score">
                                                        @if ($errors->has('score'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('score') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End English Proficiency -->
                                            <div class="row">
                                                <div class="col-md-12" style="margin-bottom:-20px;">
                                                    <div class="form-group {{$errors->has('rejected')? 'has-error':''}}">
                                                        <h5>Have you ever rejected before?

                                                            <label onclick="rejectedShow()">
                                                                <input type="radio" name="rejected" {{(old('rejected')=='Yes') ? 'checked' : ''}} value="Yes" required=""> Yes </label>
                                                            <label onclick="rejectedHide()">
                                                                <input type="radio" name="rejected" {{(old('rejected')=='No') ? 'checked' : ''}} value="No" required=""> No </label></h5>
                                                        @if ($errors->has('rejected'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('rejected') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="rejection_reasons" @if($errors->has('reasons') || old('rejected')=='Yes') style="display: block" @else style="display: none" @endif>
                                                    <div class="form-group {{$errors->has('reasons')? 'has-error':''}}">
                                                        <input type="text" aria-required="true" value="{{old('reasons')}}" id="reasons" name="reasons" class="form-control" placeholder="Reasons for rejection">
                                                        @if ($errors->has('reasons'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('reasons') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit For Register</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <script>
                function testShow(){
                    var x = document.getElementById("english_test");
                    x.style.display = "block";
                    console.log(x.style.display);
                }
                function testHide(){
                    var x = document.getElementById("english_test");
                    x.style.display = "none";
                    console.log(x.style.display);
                }
                function rejectedShow(){
                    var x = document.getElementById("rejection_reasons");
                    x.style.display = "block";
                    console.log(x.style.display);
                }
                function rejectedHide(){
                    var x = document.getElementById("rejection_reasons");
                    x.style.display = "none";
                    console.log(x.style.display);
                }

            </script>

            <section class="Welcome" id="section-welcome">
                <div class="container">
                    <div  class="heading-block title-center page-section page-title">
                        <h2>Welcome to Grace Australia Edu. Fair - 2018</h2>
                    </div>
                    <div class="page-cont">
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                <div class="prize-type">
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <div class="center">
                                                <img src="{{URL::to('event/images/20.png')}}" class="wow zoomIn img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="center caption-text">
                                                <p>20+ Australia's Education Provider</p>
                                                <!--<p>Register for the Edu Fair <strong>BEFORE 28 FEB 2018</strong> and get a chance to win <strong>ATTRACTIVE PRIZES</strong> thrice a week</p>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="prize-type">
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <img src="{{URL::to('event/images/200.png')}}" class="wow zoomIn img-responsive">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="center caption-text">
                                                <p>200+ Courses to choose from</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="prize-type">
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <img src="{{URL::to('event/images/career.png')}}" class="wow zoomIn img-responsive">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="center caption-text">
                                                <p>Career Guidance</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="prize-type">
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <img src="{{URL::to('event/images/scholarship.png')}}" class="wow zoomIn img-responsive">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="center caption-text">
                                                <p>Explore about the Scholarship Opportunities</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="col-md-3">
                                <div class="prize-type">
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <img src="{{URL::to('event/images/interaction.png')}}" class="wow zoomIn img-responsive">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="center caption-text">
                                                <p>Interaction session about Opportunities to an International Students in Australia</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="prize-type">
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <img src="{{URL::to('event/images/information.png')}}" class="wow zoomIn img-responsive">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="center caption-text">
                                                <p>Information Session about Life in Australia</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="prize-type">
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <img src="{{URL::to('event/images/public.png')}}" class="wow zoomIn img-responsive">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="center caption-text">
                                                <p>Public Speaking Workshop</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="prize-type">
                                    <div class="row col-md-12">
                                        <div class="col-md-12">
                                            <img src="{{URL::to('event/images/games.png')}}" class="wow zoomIn img-responsive">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="center caption-text">
                                                <p>Games and Refreshments</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="center">
                                <p>& many more...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="history" id="section-testimonial">
                <div class="history-inner">
                    <div class="container">
                        <div  class="heading-block title-center page-section page-title white-heading">
                            <h2>Testimonial of Universities/ Colleges</h2>
                        </div>
                        <div id="owl-demo">
                            <div class="item">
                                <a href="https://www.youtube.com/embed/OqkwJROlmUg" id="link" class="btn btn-info btn-lg" data-toggle="modal" data-target="#videos"><img src="{{URL::to('event/videos/stotts.jpg')}}"></a>
                            </div>
                            <div class="item">
                                <a href="https://www.youtube.com/embed/LdPuWA3Ytu0" id="link" class="btn btn-info btn-lg" data-toggle="modal" data-target="#videos"><img src="{{URL::to('event/videos/MIT.jpg')}}"></a>
                            </div>
                            <div class="item">
                                <a href="https://www.youtube.com/embed/FMVY9ZembAg" id="link" class="btn btn-info btn-lg" data-toggle="modal" data-target="#videos"><img src="{{URL::to('event/videos/holmesglen.jpg')}}"></a>
                            </div>
                            <div class="item">
                                <a href="https://www.youtube.com/embed/CY5H0hMBOdE" id="link" class="btn btn-info btn-lg" data-toggle="modal" data-target="#videos"><img src="{{URL::to('event/videos/torrens.jpg')}}"></a>
                            </div>
                            <div class="item">
                                <a href="https://www.youtube.com/embed/kXK9UakBQFQ" id="link" class="btn btn-info btn-lg" data-toggle="modal" data-target="#videos"><img src="{{URL::to('event/videos/chisholm1.jpg')}}"></a>
                            </div>
                            <div class="item">
                                <a href="https://www.youtube.com/embed/rXdVT9OGkDU" id="link" class="btn btn-info btn-lg" data-toggle="modal" data-target="#videos"><img src="{{URL::to('event/videos/holmes.jpg')}}"></a>
                            </div>
                            <div class="item">
                                <a href="https://www.youtube.com/embed/aXYCCn1HFYI" id="link" class="btn btn-info btn-lg" data-toggle="modal" data-target="#videos"><img src="{{URL::to('event/videos/melbourne.jpg')}}"></a>
                            </div>
                            <div class="item">
                                <a href="https://www.youtube.com/embed/PG7udNRacak" id="link" class="btn btn-info btn-lg" data-toggle="modal" data-target="#videos"><img src="{{URL::to('event/videos/chisholn.jpg')}}"></a>
                            </div>
                            <div class="item">
                                <a href="https://www.youtube.com/embed/NjsiKQOa1B0" id="link" class="btn btn-info btn-lg" data-toggle="modal" data-target="#videos"><img src="{{URL::to('event/videos/scu.jpg')}}"></a>
                            </div>
                            <!--<div class="item">-->
                            <!--    <iframe src="https://www.youtube.com/embed/OqkwJROlmUg" width="1600" height="951" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span></iframe>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <iframe src="https://www.youtube.com/embed/LdPuWA3Ytu0" width="1600" height="951" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span></iframe>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <iframe src="https://www.youtube.com/embed/FMVY9ZembAg" width="1600" height="951" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span></iframe>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <iframe src="https://www.youtube.com/embed/CY5H0hMBOdE" width="1600" height="951" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span></iframe>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <a class="thumbnail fancybox" rel="ligthbox" href="#">-->
                            <!--        <iframe src="https://www.youtube.com/embed/kXK9UakBQFQ" width="1600" height="951" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span></iframe>-->
                            <!--    </a>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <a class="thumbnail fancybox" rel="ligthbox" href="#">-->
                            <!--        <iframe src="https://www.youtube.com/embed/rXdVT9OGkDU" width="1600" height="951" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span></iframe>-->
                            <!--    </a>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <a class="thumbnail fancybox" rel="ligthbox" href="#">-->
                            <!--        <iframe src="https://www.youtube.com/embed/aXYCCn1HFYI" width="1600" height="951" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span></iframe>-->
                            <!--    </a>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <a class="thumbnail fancybox" rel="ligthbox" href="#">-->
                            <!--        <iframe src="https://www.youtube.com/embed/PG7udNRacak" width="1600" height="951" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span></iframe>-->
                            <!--    </a>-->
                            <!--</div>-->
                            <!--<div class="item">-->
                            <!--    <a class="thumbnail fancybox" rel="ligthbox" href="#">-->
                            <!--        <iframe src="https://www.youtube.com/embed/NjsiKQOa1B0" width="1600" height="951" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start">﻿</span></iframe>-->
                            <!--    </a>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </section>
            <section class="uni-a" id="section-we-represent">
                <div class="container">
                    <div class="page-tab">
                        <div class="heading-block title-center page-section page-title event-head">
                            <h2>We Proudly Represent</h2>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="kathmandu">
                                <div class="row">
                                    <img src="{{URL::to('images/university/grace-uni.png')}}" class="img img-responsive">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="events" id="section-event">
                <div class="container">
                    <div class="heading-block title-center page-section page-title event-head">
                        <h2>Event Attractions</h2>
                    </div>
                    <div class="attraction-cont">
                        <div class="row">
                            <div class="col-md-6 col-sm-12" style="padding-bottom:10px;">
                                <img src="{{URL::to('event/images/giveaways.png')}}">
                            </div>

                            <div class="col-md-6 col-sm-12" style="padding-bottom:10px;">
                                <img src="{{URL::to('event/images/gift.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="location" id="section-venue">
                <div  class="heading-block title-center page-section page-title">
                    <h2>Location &amp; Venue</h2>
                </div>
                <!--<div class="main-location">-->
                <div class="container">
                    <!--<div class="location-map">-->
                    <div>
                        <ul class="nav nav-tabs">
                            <li><a data-toggle="tab" href="#one">Butwal</a></li>
                            <li><a data-toggle="tab" href="#two">Chitwan</a></li>
                            <li><a data-toggle="tab" href="#three">Pokhara</a></li>
                            <li class="active"><a data-toggle="tab" href="#four">Kathmandu</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="one" class="tab-pane fade">
                                <div class="col-md-3 location">
                                    <h3 class="caption-text">Butwal</h3>
                                    <p>Siddhartha Cottage,<br/>Milanchowk Butwal, Butwal.</p>
                                </div>
                                <div class="col-md-9">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2824.5605611484757!2d83.46465678984599!3d27.687480708478752!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399686878f6a74db%3A0x557adb81a58dea2d!2sSiddhartha+Cottage+Restaurant!5e0!3m2!1sen!2snp!4v1534759700825" width="600" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div id="two" class="tab-pane fade">
                                <div class="col-md-3 location">
                                    <h3 class="caption-text">Chitwan</h3>
                                    <p>Bharatpur Garden Resort,<br/>Bharatpur, Chitwan.</p>
                                </div>
                                <div class="col-md-9">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10130.655938696891!2d84.4224936891067!3d27.688633591476833!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3994fad7948e7657%3A0x669f969289f2eee6!2sBharatpur+Garden+Resort!5e0!3m2!1sen!2snp!4v1534760010216" width="600" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div id="three" class="tab-pane fade">
                                <div class="col-md-3 location">
                                    <h3 class="caption-text">Pokhara</h3>
                                    <p>Hotel Pokhara Grande,<br/>Pokhara.</p>
                                </div>
                                <div class="col-md-9">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4677.516196334152!2d83.97215000858859!3d28.19168763693504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3995947f46c285f1%3A0xf5d4c9373a90193e!2sHotel+Pokhara+Grande!5e0!3m2!1sen!2snp!4v1534760359356" width="600" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div id="four" class="tab-pane fade in active">
                                <div class="col-md-3 location">
                                    <h3 class="caption-text">Kathmandu</h3>
                                    <p>Hotel de'l Annapurna,<br/>Durbarmarg, Kathmandu.</p>
                                </div>
                                <div class="col-md-9">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4518.231821430149!2d85.31391365285091!3d27.711065439452323!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb190162d2fb35%3A0x98eccd6cf32b17f9!2sHotel+Annapurna!5e0!3m2!1sen!2snp!4v1534760658890" width="600" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <!--</div>-->
                        </div>

                    </div>

                    <!--</div>-->
                </div>
            </section><!-- #content end -->

            <section class="footer">
                <div class="row">
                    <div class="col-md-12">
                        <footer class="page-footer center-on-small-only pt-0">
                            <div class="container">
                                <div class="row" style="padding-bottom: 10px;">
                                    <div class="col-md-4">
                                        <h3 class="col-md-12" style="color:#555; padding: 0;">About</h3>
                                        <p class="text-justify" style="font-size: 14px; line-height: 20px;">Warm Greetings from Grace Int'l Academic, a member of ECAN. We, would like to thank you all for your sound support & hope to receive same in the future. You all helped us to grow; we grew with your support.</p>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="page-logo">
                                            <a href="#">
                                                <img src="{{URL::to('event/images/Grace-Logo.png')}}" class="logos" alt="">
                                            </a>
                                        </div>
                                        <!--<hr class="clearfix d-md-none rgba-white-light" style="margin: 5% 15% 5%;">-->

                                        <div class="col-md-12" style="margin:0;height:50px;">
                                            <div class="footer-socials flex-center" style="margin-bottom:30px;">
                                                <!--Facebook-->
                                                <a class="icons-sm fb-ic" href="https://www.facebook.com/graceintlgroup/"><i class="fa fa-facebook fa-lg white-text mr-md-4"> </i></a>
                                                <!--Twitter-->
                                                <a class="icons-sm tw-ic"  href="https://twitter.com/graceintlgroup/"><i class="fa fa-twitter fa-lg white-text mx-md-4"> </i></a>
                                                <!--Instagram-->
                                                <a class="icons-sm ins-ic" href="https://www.instagram.com/graceintlgroup/"><i class="fa fa-instagram fa-lg white-text mx-md-4"> </i></a>
                                                <!--Youtube-->
                                                <a class="icons-sm pin-ic" href="https://www.youtube.com/channel/UCRQvc31CWMIRKl7CUawBgsg"><i class="fa fa-youtube fa-lg white-text ml-md-4"> </i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="col-md-12" style="color:#555;  padding: 0;">Head Office</h3>
                                        <div class="col-md-12"  style= "padding: 0;">
                                            <a class="icons-sm li-ic"><i class="fa fa-location-arrow fa-lg white-text mx-md-4"></i>Putalisadak, Kathmandu, Nepal</a>
                                        </div>
                                        <div class="col-md-12"  style= "padding: 0;">
                                            <a class="icons-sm li-ic"><i class="fa fa-phone fa-lg white-text mx-md-4"></i>01-4256121/ 4212374</a>
                                        </div>
                                        <div class="col-md-12"  style= "padding: 0;">
                                            <a class="icons-sm li-ic"><i class="fa fa-envelope fa-lg white-text mx-md-4"></i>info@grace.edu.np</a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </footer>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <footer class="partner-footer center-on-small-only pt-0">
                            <div class="container">
                                <div class="row" style="padding: 20px 0 10px 0;">
                                    <div class="col-md-12">
                                        <!--<h4 class="col-md-2 col-sm-12 vertical-text" style="color:#555; padding: 0;">Our Partners</h4>-->
                                        <center><h4 class="col-md-12 col-sm-12" style="color:#555; padding: 0;">Our Partners</h4></center>
                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                            <div class="page-logo">
                                                <center><p>Event Managed By</p></center>
                                                <a href="https://www.facebook.com/agentertainment.com.np/" target="_blank">
                                                    <img src="{{URL::to('event/images/ag.png')}}" class="logos" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                            <div class="page-logo">
                                                <center><p>Official Travel</p></center>
                                                <a href="https://www.facebook.com/goholidaysnepal/" target="_blank">
                                                    <img src="{{URL::to('event/images/goholidays.png')}}" class="logos" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                            <div class="page-logo">
                                                <center><p>Banking Partner</p></center>
                                                <a href="https://www.nepalsbi.com.np/" target="_blank">
                                                    <img src="{{URL::to('event/images/sbi.png')}}" class="logos" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                            <div class="page-logo">
                                                <center><p>Technology Partner</p></center>
                                                <a href="https://technorio.com" target="_blank">
                                                    <img src="{{URL::to('event/images/technorio.png')}}" class="logos" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-6 col-xs-6">
                                            <div class="page-logo">
                                                <center><p>Training Partner</p></center>
                                                <a href="https://leadershipcorner.org/" target="_blank">
                                                    <img src="{{URL::to('event/images/lc.png')}}" class="logos" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-copyright">
                                <div class="container-fluid">
                                    <p style="font-size: 13px; margin: 15px; line-height: 18px;">© Copyright 2018. Grace International. All Rights Reserved. | Developed with ❤ by<a href="https://www.technorio.com"> Technorio </a>
                                    </p>
                                </div>
                            </div>
                        </footer>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <script type="text/javascript" src="{{URL::to('event/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{URL::to('event/js/plugins.js')}}"></script>
    {{--    <script src="{{URL::to('event/js/bootstrap.min.js')}}"></script>--}}
    <script type="text/javascript" src="{{URL::to('event/js/functions.js')}}"></script>
    <script src="{{URL::to('event/js/jquery.flexslider.js')}}"></script>
    <script src="{{URL::to('event/js/wow.min.js')}}"></script>
    <script src="{{URL::to('event/js/owl.carousel.js')}}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120752629-4"></script>
    <script>
         window.dataLayer = window.dataLayer || [];
         function gtag(){dataLayer.push(arguments);}
         gtag('js', new Date());
        
         gtag('config', 'UA-120752629-4');
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5b7c1030f31d0f771d8400fa/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
    <script type="text/javascript">
        $(window).load(function(){
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider){
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
     <!--new sidebar-->
    <script>
        var news = document.getElementsByClassName('new')[0];
        news_height = news.clientHeight;

        function Help(inp){
            height =inp.clientHeight;
            change = (height - news_height)/2;
            news.style.marginTop = change + "px";
        }
    </script>
    <script type="text/javascript">
        $('.maps').click(function () {
            $('.maps iframe').css("pointer-events", "auto");
        });
    </script>

    <!-- owl banner js -->
    <script type="text/javascript">
        new WOW().init();
    </script>
    <script type="text/javascript">
        //Banner
        (function( $ ) {
            //Function to animate slider captions
            function doAnimations( elems ) {
                //Cache the animationend event in a variable
                let animEndEv = 'webkitAnimationEnd animationend';
                elems.each(function () {
                    var $this = $(this),
                        $animationType = $this.data('animation');
                    $this.addClass($animationType).one(animEndEv, function () {
                        $this.removeClass($animationType);
                    });
                });
            }
            //Variables on page load
            let $myCarousel = $('#carousel-example-generic'),
                $firstAnimatingElems = $myCarousel.find('.item:first').find("[data-animation ^= 'animated']");
            //Initialize carousel
            $myCarousel.carousel();
            //Animate captions in first slide on page load
            doAnimations($firstAnimatingElems);
            //Pause carousel
            $myCarousel.carousel('pause');
            //Other slides to be animated on carousel slide event
            $myCarousel.on('slide.bs.carousel', function (e) {
                var $animatingElems = $(e.relatedTarget).find("[data-animation ^= 'animated']");
                doAnimations($animatingElems);
            });
        })(jQuery);
    </script>
    <script>
        $('.img').click(function(e) {
            document.getElementsByClassName("_30ss").style.display = "none";
        });
    </script>
    <script type="text/javascript">
        jQuery("#owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items : 4,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [979,4]
        });
    </script>
    <script>
        $('#section-home').addClass('active');
        $('#primary-menu li a').on('click', function (e) {
            e.preventDefault();
            $('#primary-menu li a.active').removeClass('active');
            $(this).addClass('active');
        });
    </script>
    @if(session('eventMessage'))
        <script>
            $(document).ready(function () {
                console.log('pop up modal');
                $('#success').modal({backdrop: 'static', keyboard: false});
                $('#success').modal('show');
            });
        </script>
    @endif

    <script>
        $(document).on('click','#link',function () {
            let link = $(this).attr('href');
            $('#video_show').empty();
            $('#video_show').append('<iframe src="'+link+'" width="570" height="351" frameborder="0" allowfullscreen="allowfullscreen"><span data-mce-type="bookmark" style="display: inline-block; width: 0px; overflow: hidden; line-height: 0;" class="mce_SELRES_start"></span></iframe>');
            
        });
    </script>
</div>
<!-- Modal for success message -->
<div id="success" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p><b>Your Token Number is  <b> {{session('token')}} </b> . Please Visit Grace Int'l Education Fair -2018 to grab your prize.</b></p>
                {{--<p><b>Token : {{session('token')}}</b></p>--}}
                <p>Note : Please take this token secure for future use.</p>
                <p><b>Click <a href="{{route('admission','token='.session('token'))}}"><b>here</b></a> for Admission</b></p><hr>
                <a href="{{url('/')}}" class="btn btn-default">Go to Home</a>
            </div>
        </div>
    </div>
</div>
<!-- End Modal for success message-->

    <!-- Modal -->
    <div id="videos" class="modal fade" role="dialog" style="margin-top: 100px">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-remove"></i></button>
                </div>
                <div class="modal-body" id="video_show">
                    
                </div>
            </div>

        </div>
    </div>

</body>
</html>