
<!-- END HEAD -->
@extends('front.layouts.master')
@section('content')
    <!--<div class="banner"><img src="{{url('images/banner/cover.png')}}" class="" alt=""></div>-->
    <div class="container" id="app">
        <div class="portlet light bordered" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption" >
                <!-- <a href="#"><img src="{{url('images/logo/Grace-Logo.png')}}" class="logo" alt=""></a> -->
                    <h2><b>INQUIRY FORM</b></h2>
                </div>
                <!-- <div class="actions">
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-cloud-upload"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-wrench"></i>
                    </a>
                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                        <i class="icon-trash"></i>
                    </a>
                </div> -->
            </div>
            <div class="portlet-body form">
                <div class="portlet-body form">
                    <form action="{{route('inquiry.update',$detail->id  )}}" class="form-horizontal" id="submit_form" method="POST" name="inquiryform">
                        {{csrf_field()}}
                        {{method_field('PUT')}}
                        <div class="form-wizard">
                            <div class="form-body">
                                <ul class="nav nav-pills nav-justified steps">
                                    <li class="active">
                                        <a href="#tab1" data-toggle="tab" class="step" aria-expanded="true">
                                            <span class="number"> 1 </span><br>
                                            <span class="desc">
                                        <i class="fa fa-check"></i> Personal Information </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab" class="step active">
                                            <span class="number"> 2 </span><br>
                                            <span class="desc">
                                        <i class="fa fa-check"></i> Education/Experience </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab3" data-toggle="tab" class="step">
                                            <span class="number"> 3 </span><br>
                                            <span class="desc">
                                        <i class="fa fa-check"></i> English test </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab4" data-toggle="tab" class="step">
                                            <span class="number"> 4 </span><br>
                                            <span class="desc">
                                        <i class="fa fa-check"></i> Interests </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab5" data-toggle="tab" class="step">
                                            <span class="number"> 5 </span><br>
                                            <span class="desc">
                                        <i class="fa fa-check"></i> History </span>
                                        </a>
                                    </li>
                                </ul>
                                <div id="bar" class="progress progress-striped" role="progressbar">
                                    <div class="progress-bar progress-bar-success" style="width: 25%;"> </div>
                                </div>
                                <div class="tab-content">
                                    @foreach($errors->all() as $error)
                                        {{$error}}
                                    @endforeach
                                    <div class="alert alert-danger display-none" style="display: none;">
                                        <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below.
                                    </div>
                                    <div class="alert alert-success display-none" style="display: none;">
                                        <button class="close" data-dismiss="alert"></button> Your form validation is successful!
                                    </div>
                                    <div class="tab-pane active" id="tab1">
                                        <h3 class="block">Provide Your Personal Details</h3>
                                        <div class="col-md-12">
                                        </div>
                                        <div class="row">
                                            <div class="ml-1"></div>
                                            <div class="personal-detail col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-11 {{$errors->has('name')? "has-error":""}}">
                                                        <label class="control-label">Fullname
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="text" value="{{$detail->name}}" class="form-control" name="name" required>

                                                        @if($errors->has('name'))
                                                            <span class="text-danger">{{$errors->first('name')}}</span><br>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('dob')? "has-error":""}}  col-md-11">
                                                        <label class="control-label">Date of Birth
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="date" value="{{$detail->dob}}" placeholder="DD/MM/YYYY" maxlength="10" class="form-control" name="dob" required>
                                                        @if($errors->has('dob'))

                                                            <span class="text-danger">{{$errors->first('dob')}}</span><br>

                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-11">
                                                        <label class="control-label">Nationality
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="text" value="{{$detail->nationality}}" class="form-control" data-required="1" name="nationality" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-11">
                                                        <label class="control-label">Blood Group
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="text" class="form-control" value="{{$detail->bloodgroup}}" data-required="1" name="bloodgroup" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('permanent_address')? "has-error":""}}  col-md-11">
                                                        <label class="control-label">Permanent Address
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="text" value="{{$detail->permanent_address}}" class="form-control" name="permanent_address" required>
                                                        @if($errors->has('permanent_address'))
                                                            <span class="text-danger">{{$errors->first('permanent_address')}}</span><br>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('temporary_address')? "has-error":""}}  col-md-11">
                                                        <label class="control-label">Temporary Address
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="text" value="{{$detail->temporary_address}}" class="form-control" name="temporary_address" required>
                                                        @if($errors->has('temporary_address'))
                                                            <span class="text-danger">{{$errors->first('temporary_address')}}</span><br>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('landline')? "has-error":""}}  col-md-11">
                                                        <label class="control-label">Landline

                                                        </label>
                                                        <input type="number" value="{{$detail->landline}}" class="form-control" name="landline" required>
                                                        @if($errors->has('landline'))
                                                            <span class="text-danger">{{$errors->first('landline')}}</span><br>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('mobile')? "has-error":""}}  col-md-11">
                                                        <label class="control-label">Mobile Number
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="number" value="{{$detail->mobile}}" class="form-control" name="mobile" required>
                                                        @if($errors->has('mobile'))
                                                            <span class="text-danger">{{$errors->first('mobile')}}</span><br>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('email')? "has-error":""}}  col-md-11 ">
                                                        <label class="control-label">Email
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="text" value="{{$detail->email}}" class="form-control" name="email" aria-required="true" aria-describedby="email-error" required>
                                                        @if($errors->has('email'))
                                                            <span class="text-danger">{{$errors->first('email')}}</span><br>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-11">
                                                        <label class="control-label">Upload Image
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label><br>
                                                        <span class="btn green btn-block fileinput-button" onclick="Upload();">
                                                           <i class="fa fa-plus"></i>
                                                           <span> Add files... </span>
                                                           <input type="file" name="files[]" multiple="" style="display: none;">
                                                        </span><br><br>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('gender')? "has-error":""}}  col-md-11">
                                                        <label class="control-label">Gender
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline">
                                                                <input type="radio" name="gender" value="Male" data-title="Married" @if($detail->gender == 'Male') checked @endif>Male </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="gender" value="Female" @if($detail->gender == 'Female') checked @endif data-title="Single">Female </label>
                                                            <label class="radio-inline">
                                                                <input type="radio" name="gender" value="Other" @if($detail->gender == 'Other') checked @endif data-title="Single">Other </label>
                                                            @if($errors->has('gender'))
                                                                <span class="text-danger">{{$errors->first('gender')}}</span><br>
                                                            @endif
                                                            <div id="form_gender_error"> </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group {{$errors->has('marital_status')? "has-error":""}}  col-md-11">
                                                        <label class="control-label">Marital Status
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <div class="radio-list">
                                                            <label class="radio-inline" onclick="Show();">
                                                                <input type="radio" name="marital_status" value="married" data-title="Married" @if($detail->marital_status == 'married') checked @endif>Married </label>
                                                            <label class="radio-inline" onclick="Hide();">
                                                                <input type="radio" name="marital_status" value="single" @if($detail->marital_status == 'single') checked @endif data-title="Single">Single </label>
                                                            @if($errors->has('marital_status'))
                                                                <span class="text-danger">{{$errors->first('marital_status')}}</span><br>
                                                            @endif
                                                            <div id="form_gender_error"> </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 married" style="display: none;">
                                                    <div class="form-group {{$errors->has('marriage_date')? "has-error":""}}   col-md-11" >

                                                        <label class="control-label">Married Date
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="date" placeholder="MM/DD/YYYY" maxlength="10" class="form-control" name="marriage_date" required>
                                                        @if($errors->has('marriage_date'))
                                                            <span class="text-danger">{{$errors->first('marriage_date')}}</span><br>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div><br><hr>
                                            <div class="Emergency Contact col-md-12">
                                                <h3 class="block">Emergency Contact</h3>
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-11 {{$errors->has('contact_name')? "has-error":""}}">
                                                        <label class="control-label">Contact Name
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="text" value="@if(isset($detail->emergencyContact->name)){{$detail->emergencyContact->name}} @endif" class="form-control" name="contact_name" required>

                                                        @if($errors->has('contact_name'))
                                                            <span class="text-danger">{{$errors->first('contact_name')}}</span><br>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-11 {{$errors->has('contact_contact')? "has-error":""}}">
                                                        <label class="control-label">Contact Number
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="number" value="@if(isset($detail->emergencyContact->contact)){{$detail->emergencyContact->contact}} @endif" class="form-control" name="contact_contact" required>
                                                        @if($errors->has('contact_contact'))
                                                            <span class="text-danger">{{$errors->first('contact_contact')}}</span><br>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group col-md-11 {{$errors->has('contact_relation')? "has-error":""}} ">
                                                        <label class="control-label">Relation
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <input type="text" value="@if(isset($detail->emergencyContact->relation)){{$detail->emergencyContact->relation}} @endif" class="form-control" name="contact_relation" required>
                                                        @if($errors->has('contact_relation'))
                                                            <span class="text-danger">{{$errors->first('contact_relation')}}</span><br>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div><br><hr>

                                        </div>
                                        <script>
                                            function Show(){
                                                var married = document.getElementsByClassName("married");
                                                console.log(married);
                                                married[0].style.display ="block";
                                            }
                                            function Hide(){
                                                var married = document.getElementsByClassName("married");
                                                married[0].style.display ="none";
                                            }
                                            var input = document.querySelectorAll('input[type=file]');
                                            function Upload(){
                                                input[0].click();
                                            }
                                        </script>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                        <h3 class="block">Academic History</h3>
                                        <div id="edu">
                                            @if(count($detail->academicDetail)>0)
                                                @foreach($detail->academicDetail as $key=>$academic)
                                                    <div class="col-md-12 academic">
                                                        <input type="hidden" name="academic_id[]" value="{{$academic->id}}">
                                                        <!-- BEGIN PORTLET-->
                                                        <div class="portlet light form-fit bordered">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-university"></i>
                                                                    <span class="caption-subject font-green bold uppercase">Add Qualification</span>
                                                                </div>
                                                                <div class="actions">
                                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="removeFunction()">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="appendFunction()">
                                                                        <i class="fa fa-plus"></i>
                                                                    </a>
                                                                    <!-- <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                        <i class="icon-trash"></i>
                                                                    </a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div class="form-group {{$errors->has('name_of_qualification')? "has-error":""}} ">
                                                                <label class="control-label col-md-3">Name of Qualification
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" value="{{$academic->name_of_qualification}}" class="form-control" name="name_of_qualification[]"required>
                                                                    @if($errors->has('name_of_qualification'))
                                                                        <span class="text-danger">{{$errors->first('name_of_qualification')}}</span><br>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group {{$errors->has('name_of_institution')? "has-error":""}}">
                                                                <label class="control-label col-md-3">Name of Institution
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" value="{{$academic->name_of_institution}}" class="form-control" name="name_of_institution[]"required>
                                                                    @if($errors->has('name_of_institution'))
                                                                        <span class="text-danger">{{$errors->first('name_of_institution')}}</span><br>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group {{$errors->has('academic_start_date')?'has-error':''}}">
                                                                <label class="control-label col-md-3">From
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="date" class="form-control" name="academic_start_date[]" value="{{$academic->start_date}}" required>
                                                                    @if($errors->has('academic_start_date'))
                                                                        <span class="text-danger">{{$errors->first('academic_start_date')}}</span><br>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group {{$errors->has('academic_end_date')? "has-error":""}} ">
                                                                <label class="control-label col-md-3">To
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-4">

                                                                    <input type="date" class="form-control" name="academic_end_date[]" value="{{$academic->end_date}}" required>

                                                                    @if($errors->has('academic_end_date'))
                                                                        <span class="text-danger">{{$errors->first('academic_end_date')}}</span><br>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group {{$errors->has('academic_percentage')? "has-error":""}} ">
                                                                <label class="control-label col-md-3">Academic Percentage
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-4">

                                                                    <input type="number" value="{{$academic->percentage}}" class="form-control" name="academic_percentage[]" required>

                                                                    @if($errors->has('academic_percentage'))
                                                                        <span class="text-danger">{{$errors->first('academic_percentage')}}</span><br>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @else
                                                <div class="col-md-12 academic">
                                                    <!-- BEGIN PORTLET-->
                                                    <div class="portlet light form-fit bordered">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-university"></i>
                                                                <span class="caption-subject font-green bold uppercase">Add Qualification</span>
                                                            </div>
                                                            <div class="actions">
                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="removeFunction()">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="appendFunction()">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                                <!-- <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                    <i class="icon-trash"></i>
                                                                </a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body form">
                                                        <div class="form-group {{$errors->has('name_of_qualification')? "has-error":""}} ">
                                                            <label class="control-label col-md-3">Name of Qualification
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" value="" class="form-control" name="name_of_qualification[]"required>
                                                                @if($errors->has('name_of_qualification'))
                                                                    <span class="text-danger">{{$errors->first('name_of_qualification')}}</span><br>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{$errors->has('name_of_institution')? "has-error":""}}">
                                                            <label class="control-label col-md-3">Name of Institution
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" value="" class="form-control" name="name_of_institution[]"required>
                                                                @if($errors->has('name_of_institution'))
                                                                    <span class="text-danger">{{$errors->first('name_of_institution')}}</span><br>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{$errors->has('academic_start_date')?'has-error':''}}">
                                                            <label class="control-label col-md-3">From
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="date" class="form-control" name="academic_start_date[]" value="" required>
                                                                @if($errors->has('academic_start_date'))
                                                                    <span class="text-danger">{{$errors->first('academic_start_date')}}</span><br>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{$errors->has('academic_end_date')? "has-error":""}} ">
                                                            <label class="control-label col-md-3">To
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-4">

                                                                <input type="date" class="form-control" name="academic_end_date[]" value="" required>

                                                                @if($errors->has('academic_end_date'))
                                                                    <span class="text-danger">{{$errors->first('academic_end_date')}}</span><br>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{$errors->has('academic_percentage')? "has-error":""}} ">
                                                            <label class="control-label col-md-3">Academic Percentage
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-4">

                                                                <input type="number" value="" class="form-control" name="academic_percentage[]" required>

                                                                @if($errors->has('academic_percentage'))
                                                                    <span class="text-danger">{{$errors->first('academic_percentage')}}</span><br>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <h3 class="block">Experience and Training</h3>
                                        <div id="exe">
                                            @if(count($detail->experiences)>0)
                                                @foreach($detail->experiences as $key=>$experience)
                                                    <input type="hidden" name="experience_id[]" value="{{$experience->id}}">
                                                    <div class="col-md-12 experience">
                                                        <!-- BEGIN PORTLET-->
                                                        <div class="portlet light form-fit bordered">
                                                            <div class="portlet-title">
                                                                <div class="caption">
                                                                    <i class="fa fa-university"></i>
                                                                    <span class="caption-subject font-green bold uppercase">Add Experience</span>
                                                                </div>
                                                                <div class="actions">
                                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="removeFunc()">
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                    <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="appendFunc()">
                                                                        <i class="fa fa-plus"></i>
                                                                    </a>
                                                                    <!-- <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                        <i class="icon-trash"></i>
                                                                    </a> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body form">
                                                            <div class="form-group {{$errors->has('name_of_employer')? "has-error":""}} ">
                                                                <label class="control-label col-md-3">Name of Employer/Institute
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" value="{{$experience->name_of_employer}}" class="form-control" name="name_of_employer[]" required>
                                                                    @if($errors->has('name_of_employer'))
                                                                        <span class="text-danger">{{$errors->first('name_of_employer')}}</span><br>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group {{$errors->has('duties')? "has-error":""}} ">
                                                                <label class="control-label col-md-3">Duties
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" value="{{$experience->duties}}" class="form-control" name="duties[]" required>
                                                                    @if($errors->has('duties'))
                                                                        <span class="text-danger">{{$errors->first('duties')}}</span><br>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group {{$errors->has('start_date')? "has-error":""}} ">
                                                                <label class="control-label col-md-3">From
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="date" value="{{$experience->start_date}}" class="form-control" name="start_date[]" required>
                                                                    @if($errors->has('start_date'))
                                                                        <span class="text-danger">{{$errors->first('start_date')}}</span><br>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="form-group {{$errors->has('end_date')? "has-error":""}} ">
                                                                <label class="control-label col-md-3">To
                                                                    <span class="required" aria-required="true"> * </span>
                                                                </label>
                                                                <div class="col-md-4">
                                                                    <input type="date" value="{{$experience->end_date}}" class="form-control" name="end_date[]" required>
                                                                    @if($errors->has('end_date'))
                                                                        <span class="text-danger">{{$errors->first('end_date')}}</span><br>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @else
                                                <div class="col-md-12 experience">
                                                    <!-- BEGIN PORTLET-->
                                                    <div class="portlet light form-fit bordered">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class="fa fa-university"></i>
                                                                <span class="caption-subject font-green bold uppercase">Add Experience</span>
                                                            </div>
                                                            <div class="actions">
                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="removeFunc()">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="appendFunc()">
                                                                    <i class="fa fa-plus"></i>
                                                                </a>
                                                                <!-- <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                    <i class="icon-trash"></i>
                                                                </a> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body form">
                                                        <div class="form-group {{$errors->has('name_of_employer')? "has-error":""}} ">
                                                            <label class="control-label col-md-3">Name of Employer/Institute
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" value="" class="form-control" name="name_of_employer[]" required>
                                                                @if($errors->has('name_of_employer'))
                                                                    <span class="text-danger">{{$errors->first('name_of_employer')}}</span><br>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{$errors->has('duties')? "has-error":""}} ">
                                                            <label class="control-label col-md-3">Duties
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="text" value="" class="form-control" name="duties[]" required>
                                                                @if($errors->has('duties'))
                                                                    <span class="text-danger">{{$errors->first('duties')}}</span><br>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{$errors->has('start_date')? "has-error":""}} ">
                                                            <label class="control-label col-md-3">From
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="date" value="" class="form-control" name="start_date[]" required>
                                                                @if($errors->has('start_date'))
                                                                    <span class="text-danger">{{$errors->first('start_date')}}</span><br>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="form-group {{$errors->has('end_date')? "has-error":""}} ">
                                                            <label class="control-label col-md-3">To
                                                                <span class="required" aria-required="true"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <input type="date" value="" class="form-control" name="end_date[]" required>
                                                                @if($errors->has('end_date'))
                                                                    <span class="text-danger">{{$errors->first('end_date')}}</span><br>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <script>
                                        var edu = document.getElementById('edu');
                                        var sn = document.getElementsByClassName("academic");
                                        var elmnt = document.getElementsByClassName("academic")[0];
                                        console.log(sn);
                                        function appendFunction() {
                                            var cln = elmnt.cloneNode(true);
                                            edu.appendChild(cln);
                                        }
                                        function removeFunction() {
                                            // var cln = elmnt.cloneNode(true);
                                            edu.removeChild(sn[1]);
                                        }
                                        var exe = document.getElementById('exe');
                                        var ex = document.getElementsByClassName("experience");
                                        var experience = document.getElementsByClassName("experience")[0];
                                        function appendFunc() {
                                            var clone = experience.cloneNode(true);
                                            exe.appendChild(clone);
                                        }
                                        function removeFunc() {
                                            // var cln = elmnt.cloneNode(true);
                                            exe.removeChild(ex[1]);
                                        }
                                    </script>
                                    <div class="tab-pane" id="tab3">
                                        <h3 class="block">English Test</h3>
                                        <div class="form-group {{$errors->has('test_type')? "has-error":""}} ">
                                            <label class="control-label col-md-3">Exam Type</label>
                                            <div class="col-md-4">
                                                <select class="bs-select form-control bs-select-hidden" name="test_type">
                                                    <option value="IELTS" {{((isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->test_type)=='IELTS') ? 'selected' : '' }}>IELTS</option>
                                                    <option value="GMAT" {{((isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->test_type)=='GMAT') ? 'selected' : '' }}>GMAT</option>
                                                    <option value="SAT" {{((isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->test_type)=='SAT') ? 'selected' : ''}}>SAT</option>
                                                    <option value="TOEFL" {{((isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->test_type)=='TOEFL') ? 'selected' : ''}}>TOEFL</option>
                                                </select>
                                                <div>
                                                    @if($errors->has('test_type'))
                                                        <span class="text-danger">{{$errors->first('test_type')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group {{$errors->has('is_taken')? "has-error":""}} ">
                                            <label class="control-label col-md-3">Have you ever Taken a test?
                                                <span class="required" aria-required="true"> * </span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="radio-list">
                                                    <label class="radio-inline" onclick="ShowScore();">
                                                        <input type="radio" name="is_taken" value="yes" {{((isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='Yes') ? 'checked' : ''}} data-title="Yes">Yes</label>
                                                    <label class="radio-inline" onclick="HideScore();">
                                                        <input type="radio" name="is_taken" value="no" data-title="No" {{((isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='No') ? 'checked' : ''}}>No</label>
                                                </div>
                                                <div id="form_gender_error"> </div>
                                            </div>
                                            @if($errors->has('is_taken'))
                                                <span class="text-danger">{{$errors->first('is_taken')}}</span><br>
                                            @endif
                                        </div>
                                        <div class="container score" style="display:none;">
                                            <h4>Column Sizing</h4>
                                            <div class="row">
                                                <div class="col-md-5 {{$errors->has('test_date')? "has-error":""}}  ">
                                                    <label>Test Taken Date</label>
                                                    <input type="date" placeholder="DD/MM/YYYY" maxlength="10" class="form-control" name="test_date" value="@if(isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='Yes'){{$detail->englishProficiencyTest->test_date}} @endif" required>
                                                    @if($errors->has('test_date'))
                                                        <span class="text-danger">{{$errors->first('test_date')}}</span><br>
                                                    @endif
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-5 {{$errors->has('writing')? "has-error":""}} ">
                                                    <label>Writing</label>
                                                    <input type="text" value="@if(isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='Yes'){{$detail->englishProficiencyTest->writing}} @endif" class="form-control" placeholder="Writing" name="writing" required>
                                                    @if($errors->has('writing'))
                                                        <span class="text-danger">{{$errors->first('writing')}}</span><br>
                                                    @endif
                                                </div>
                                                <div class="col-md-5 {{$errors->has('listening')? "has-error":""}} ">
                                                    <label>Listening</label>
                                                    <input type="text" value="@if(isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='Yes') {{$detail->englishProficiencyTest->listening}} @endif" class="form-control" placeholder="Listening" name="listening" required>
                                                    @if($errors->has('listening'))
                                                        <span class="text-danger">{{$errors->first('listening')}}</span><br>
                                                    @endif
                                                </div><div class="col-md-1"></div>
                                                <div class="col-md-5 {{$errors->has('reading')? "has-error":""}} ">
                                                    <label>Reading</label>
                                                    <input type="text" value="@if(isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='Yes') {{$detail->englishProficiencyTest->reading}} @endif" class="form-control" placeholder="Reading" name="reading" required>
                                                    @if($errors->has('reading'))
                                                        <span class="text-danger">{{$errors->first('reading')}}</span><br>
                                                    @endif
                                                </div>
                                                <div class="col-md-5 {{$errors->has('speaking')? "has-error":""}} ">
                                                    <label>Speaking</label>
                                                    <input type="text" value="@if(isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='Yes') {{$detail->englishProficiencyTest->speaking}} @endif" class="form-control" placeholder="Speaking" name="speaking" required>
                                                    @if($errors->has('speaking'))
                                                        <span class="text-danger">{{$errors->first('speaking')}}</span><br>
                                                    @endif
                                                </div><div class="col-md-1"></div>
                                                <div class="col-md-5 {{$errors->has('overall')? "has-error":""}} ">
                                                    <label>Overall</label>
                                                    <input type="text" value="@if(isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='Yes') {{$detail->englishProficiencyTest->overall}} @endif" class="form-control" placeholder="Overall" name="overall" required>
                                                    @if($errors->has('overall'))
                                                        <span class="text-danger">{{$errors->first('overall')}}</span><br>
                                                    @endif
                                                </div>
                                                <div class="col-md-5 {{$errors->has('scores')? "has-error":""}} ">
                                                    <label>Scores</label>
                                                    <input type="text" value="@if(isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='Yes') {{$detail->englishProficiencyTest->scores}} @endif" class="form-control" placeholder="Scores" name="scores" required>
                                                    @if($errors->has('scores'))
                                                        <span class="text-danger">{{$errors->first('scores')}}</span><br>
                                                    @endif
                                                </div><div class="col-md-1"></div>
                                                <div class="col-md-5 {{$errors->has('other_test_attain')? "has-error":""}} ">
                                                    <label>Test Attain</label>
                                                    <input type="text" value="@if(isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='Yes') {{$detail->englishProficiencyTest->other_test_attain}} @endif" class="form-control" placeholder="Test Attain" name="other_test_attain" required>
                                                    @if($errors->has('other_test_attain'))
                                                        <span class="text-danger">{{$errors->first('other_test_attain')}}</span><br>
                                                    @endif
                                                </div>
                                                <div class="col-md-5 {{$errors->has('test-attain')? "has-error":""}} ">
                                                    <label>Any Previous Preparation on Class</label>
                                                    <div class="radio-list">
                                                        <label class="radio-inline" onclick="ShowCenter();">
                                                            <input type="radio" name="previous_class" value="yes" {{(isset($detail->englishProficiencyTest->is_any_previous_preparation_class) && ($detail->englishProficiencyTest->is_any_previous_preparation_class=='Yes')) ? 'checked' : ''}} data-title="Yes">Yes</label>
                                                        <label class="radio-inline" onclick="HideCenter();">
                                                            <input type="radio" name="previous_class" value="no" {{(isset($detail->englishProficiencyTest->is_any_previous_preparation_class) && ($detail->englishProficiencyTest->is_any_previous_preparation_class=='No')) ? 'checked' : ''}} data-title="No">No</label>
                                                    </div>
                                                    @if($errors->has('previous_class'))
                                                        <span class="text-danger">{{$errors->first('previous_class')}}</span><br>
                                                    @endif
                                                    <div class="col-md-2"></div>
                                                </div><div class="col-md-1"></div>
                                                <div class="col-md-5 {{$errors->has('study_centre')? "has-error":""}}  center" style="display: none;">
                                                    <label>Study Center</label>
                                                    <input type="text" value="@if(isset($detail->englishProficiencyTest)) && ($detail->englishProficiencyTest->is_taken)=='Yes') {{$detail->englishProficiencyTest->study_centre}} @endif" class="form-control" placeholder="Study Center" name="study_centre" required>
                                                    <div>
                                                        @if($errors->has('study_centre'))
                                                            <span class="text-danger">{{$errors->first('study_centre')}}</span><br>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="tab-pane" id="tab4">
                                        <h3 class="block">Interests</h3>
                                        <div class="col-md-12 experience">
                                            <!-- BEGIN PORTLET-->
                                            <div class="portlet light form-fit bordered">

                                            </div>
                                            <div class="portlet-body form">
                                                <div class="form-group {{$errors->has('interest_country')? "has-error":""}}">
                                                    <label class="control-label col-md-3">Country
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <select id="country" name="interest_country" class = "form-control" class="form-control " required>

                                                            @foreach($countries as $key=>$country)
                                                                <option value="{{$country->id}}" {{(isset($detail->interest) && ($detail->interest->country_id==$country->id)) ? 'selected' : ''}}>{{$country->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <!-- <input type="text" class="form-control" name="interest_country" data-required="1" required> -->
                                                        @if($errors->has('interest_country'))
                                                            @foreach($errors->get('interest_country') as $error)
                                                                <span class="text-danger">{{$error}}</span><br>
                                                            @endforeach
                                                        @endif
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-md-3 {{$errors->has('interest_intake')? "has-error":""}}">Intake
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <select id="intake" name="interest_intake" class = "form-control" class="form-control " required>
                                                            <option value="{{(isset($detail->interest->intake_id)) ? $detail->interest->intake_id : ''}}" selected > {{(isset($detail->interest->intake_id)) ? $detail->interest->intake->intake_type : 'Select Intake'}}</option>
                                                        </select>
                                                        <!-- <input type="text" class="form-control" name="interest_intake" data-required="1" required> -->
                                                        @if($errors->has('interest_intake'))
                                                            @foreach($errors->get('interest_intake') as $error)
                                                                <span class="text-danger">{{$error}}</span><br>
                                                            @endforeach
                                                        @endif
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>
                                                <div class="form-group {{$errors->has('interest_university')? "has-error":""}}">
                                                    <label class="control-label col-md-3">University
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <select id="university" name="interest_university" class="form-control " required>
                                                            <option value="{{(isset($detail->interest->university_id)) ? $detail->interest->university_id : ''}}" selected> {{(isset($detail->interest->university_id)) ? $detail->interest->university->name : 'Partner'}}</option>
                                                        </select>
                                                        <!-- <input type="text" class="form-control" name="interest_university" data-required="1" required> -->
                                                        @if($errors->has('interest_university'))
                                                            @foreach($errors->get('interest_university') as $error)
                                                                <span class="text-danger">{{$error}}</span><br>
                                                            @endforeach
                                                        @endif
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>
                                                <div class="form-group {{$errors->has('interest_university')? "has-error":""}}">
                                                    <label class="control-label col-md-3">Course
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <select id="course" name="interest_course" class="form-control " required>
                                                            <option value="{{(isset($detail->interest->course_id)) ? $detail->interest->course_id : ''}}" selected> {{(isset($detail->interest)) ? $detail->interest->course->course_name : 'Select Course'}}</option>
                                                        </select>
                                                        <!-- <input type="text" class="form-control" name="interest_course" data-required="1" required> -->
                                                        @if($errors->has('interest_course'))
                                                            @foreach($errors->get('interest_course') as $error)
                                                                <span class="text-danger">{{$error}}</span><br>
                                                            @endforeach
                                                        @endif
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab5">
                                        <h3 class="block">History</h3>
                                        <div class="col-md-12">
                                            <!-- BEGIN PORTLET-->
                                            <div class="portlet light form-fit bordered">

                                            </div>
                                            <div class="portlet-body form">
                                                <div class="form-group {{$errors->has('rejected_before')? "has-error":""}}">
                                                    <label class="control-label col-md-3">Rejected Before?
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <div class="radio-list">
                                                            <label class="radio-inline" onclick="rejected();">
                                                                <input type="radio" name="rejected_before" value="yes" {{(isset($detail->history->rejected_before) && ($detail->history->rejected_before=='yes')) ? 'checked' : ''}} data-title="Married" data-required="1" required>Yes </label>
                                                            <label class="radio-inline" onclick="notrejected();">
                                                                <input type="radio" name="rejected_before" value="no" {{(isset($detail->history->rejected_before) && ($detail->history->rejected_before=='no')) ? 'checked' : ''}} data-title="Single" data-required="1" required>No </label>

                                                        </div>

                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>
                                                <div class="form-group reject" style="display:none;">
                                                    <label class="control-label col-md-3">Reasons
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" value="{{(isset($detail->history->reasons)) ? $detail->history->reasons : ''}}" class="form-control" name="reasons" data-required="1" required>
                                                        <span class="help-block"> </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                                <div class="form-group col-md-12 {{$errors->has('heard')? "has-error":""}}">
                                                    <label class="control-label col-md-3">How You Heard About Us?
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-6">
                                                        <div class="radio-list">
                                                            <label class="radio-inline col-md-1" onclick="Friend();">
                                                                <input type="radio" {{($detail->how_did_you_know_about_us == 'friend') ? 'checked' : ''}} name="heard" value="friend" data-title="Friend" required>Friend</label>
                                                            <label class="radio-inline col-md-2" onclick="FriendHide();">
                                                                <input type="radio" name="heard" value="facebook" data-title="Facebook" {{($detail->how_did_you_know_about_us == 'facebook') ? 'checked' : ''}} required>Facebook</label>
                                                            <label class="radio-inline col-md-2" onclick="FriendHide();">
                                                                <input type="radio" name="heard" value="website" data-title="Website" {{($detail->how_did_you_know_about_us == 'website') ? 'checked' : '' }} required>Website</label>
                                                            <label class="radio-inline col-md-2" onclick="FriendHide();">
                                                                <input type="radio" name="heard" value="newspaper" data-title="Newspaper" {{($detail->how_did_you_know_about_us == 'newspaper') ? 'checked' : '' }} required>Newspaper</label>
                                                            <label class="radio-inline col-md-2" onclick="FriendHide();">
                                                                <input type="radio" name="heard" value="others" data-title="Others" {{($detail->how_did_you_know_about_us == 'other') ? 'checked' :''}} required>Others</label>
                                                        </div>
                                                    </div>
                                                    @if($errors->has('heard'))
                                                        <span class="text-danger">{{$errors->first('heard')}}</span><br>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-11 friend {{$errors->has('friend')? "has-error":""}}  friend col-md-11" style="display: none;">
                                                    <label class="control-label col-md-3">Friend's Name
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="text" value=" " class="form-control" name="friend" placeholder="Friend's Name" required>
                                                        {{--@if($errors->has('friend'))
                                                                @foreach($errors->get('friend') as $error)
                                                                    <span class="text-danger">{{$error}}</span><br>
                                                                @endforeach
                                                            @endif--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function ShowScore(){
                                    var score = document.getElementsByClassName("score");
                                    score[0].style.display ="block";
                                }
                                function HideScore(){
                                    var score = document.getElementsByClassName("score");
                                    score[0].style.display ="none";
                                }
                                function ShowCenter(){
                                    var score = document.getElementsByClassName("center");
                                    score[0].style.display ="block";
                                }
                                function HideCenter(){
                                    var score = document.getElementsByClassName("center");
                                    score[0].style.display ="none";
                                }
                                function rejected(){
                                    var reject = document.getElementsByClassName("reject");
                                    reject[0].style.display ="block";
                                }
                                function notrejected(){
                                    var reject = document.getElementsByClassName("reject");
                                    reject[0].style.display ="none";
                                }
                                function Friend(){
                                    var friend = document.getElementsByClassName("friend");
                                    friend[0].style.display ="block";
                                }
                                function FriendHide(){
                                    var friend = document.getElementsByClassName("friend");
                                    friend[0].style.display ="none";
                                }
                            </script>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-;-3 col-md-9">
                                        <a href="javascript:;" class="btn default button-previous disabled" style="display: none;">
                                            <i class="fa fa-angle-left"></i> Back </a>
                                        <a href="javascript:;" id="btn1" class="btn btn-outline green button-next"> Continue
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                        <button class="btn green button-submit" style="display: none;"> Submit
                                            <i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('change','#country', function () {
            var country = $(this).val();
            var div = $(this).parents();

            var intake = " ";
            var university = "";
            $.ajax({
                type:'get',
                url:'{{route("get.intake")}}',
                data:{'country':country},
                success:function (data) {
                    console.log(data);
                    intake+='<option value="0" selected disabled>Select Intake</option>';
                    for(var i=0;i<data[0].intake.length; i++){
                        console.log(data[0].intake[i]);
                        intake+='<option value="'+data[0].intake[i].intake.id+'">'+data[0].intake[i].intake.intake_type+'</option>';
                    }
                    div.find('#intake').html(" ");
                    div.find('#intake').append(intake);

                    university+='<option value="0" selected disabled>Select Partner</option>';
                    for(var i=0;i<data[0].university.length; i++){
                        console.log(data[0].university[i]);
                        university+='<option value="'+data[0].university[i].id+'">'+data[0].university[i].name+'</option>';
                    }
                    div.find('#university').html(" ");
                    div.find('#university').append(university);
                },
                error:function () {
                }
            });
        });
        $(document).on('change','#university', function () {
            var university = $(this).val();
            var div = $(this).parents();

            var course = " ";
            $.ajax({
                type:'get',
                url:'{{route("get.course")}}',
                data:{'university':university},
                success:function (data) {
                    console.log(data);
                    course+='<option value="" selected disabled>Select Course</option>';
                    for(var i=0;i<data.length; i++){
                        console.log(data[i].course);
                        course+='<option value="'+data[i].course.id+'">'+data[i].course.course_name+'</option>';
                    }
                    div.find('#course').html(" ");
                    div.find('#course').append(course);
                },
                error:function () {
                }
            });
        });
    </script>
@endsection
<!-- BEGIN CORE PLUGINS -->
