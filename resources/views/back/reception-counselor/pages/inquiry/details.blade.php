@extends('back.layouts.master')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
        {{--@include('back.partials.theme-panel')--}}
        <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{url('/dashboard')}}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Inquiry</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Add Inquiry</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- END PAGE HEADER-->
            <!-- PAGE CONTENT STARTED -->

            <div class="row">
                <div class="col-xs-12 col-md-12">
                <div class="form-group detail-nav">
                    <ul class="nav nav-pills">
                        <li class="active"><a data-toggle="pill" href="#personalInformation">Personal Information</a></li>
                        <li><a data-toggle="pill" href="#educationExperience">Education and Experience</a></li>
                        <li><a data-toggle="pill" href="#interestHistory">Interests and History</a></li>
                        <li><a data-toggle="pill" href="#followUps">Follow-ups</a></li>
                        <li><a data-toggle="pill" href="#assignCounselor">Assign Counselor</a></li>
                        <li class="pull-right">
                            <div class="btn-group">
                                <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;"> Print </a>
                                    </li>
                                    <li>
                                        <a href="{{route('export.inquiry',$detail->token)}}">Export as PDF</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Make Application </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                </div>
            </div>

            <center>
                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}} </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}} </div>
                @endif
            </center>
            <div class="form-outer-part">
                <div class="tab-content form-inner-part">
                    <div class="row tab-pane fade in active" id="personalInformation">
                        <div class="col-md-12">
                            <form action="{{route('inquiry.update',$detail->token)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <!-- One "tab" for each step in the form: -->
                                <input type="hidden" name="type" value="back">
                                <input type="hidden" name="step" value="P3r5oN81in7r3A4Ion">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('name')? "has-error":""}}">
                                            <label>Name</label>
                                            <input type="text" placeholder="Full Name..." name="name" value="{{(! empty($detail->name)) ? $detail->name : old('name')}}" class="form-control">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('email')? "has-error":""}}">
                                            <label>Email</label>
                                            <input type="email" placeholder="Email" name="email" value="{{(! empty($detail->email)) ? $detail->email : old('email')}}" class="form-control">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('gender')? "has-error":""}}">
                                            <label>Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="">Select your Gender</option>
                                                <option value="Male" {{($detail->gender==='Male') ? 'selected' : ''}}>Male</option>
                                                <option value="Female" {{($detail->gender==='Female') ? 'selected' : ''}}>Female</option>
                                                <option value="Other" {{($detail->gender==='Other') ? 'selected' : ''}}>Other</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('gender') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- DATE PICKER bootstrap-->
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('dob')? "has-error":""}}" style='margin-top:00px;'>
                                            <label>Date of Birth</label>
                                            <input type='text' name="dob" class="form-control" id='datepicker' style='width: 100%;' placeholder="mm/dd/yyyy" value="{{(! empty($detail->dob)) ? $detail->dob : old('dob')}}">
                                            @if ($errors->has('dob'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('dob') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Script -->
                                    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#datepicker').datepicker();
                                        });
                                    </script>
                                    <!-- DATE PICKER Bootstrap END -->
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('landline')? "has-error":""}}">
                                            <label>Landline Number</label>
                                            <input type="text" placeholder="Contact (Landline)" name="landline" value="{{(! empty($detail->landline)) ? $detail->landline : old('landline')}}" class="form-control">
                                            @if ($errors->has('landline'))
                                                <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('landline') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('mobile')? "has-error":""}}">
                                            <label>Mobile Number</label>
                                            <input type="text" placeholder="Contact (Mobile)" name="mobile" value="{{(! empty($detail->mobile)) ? $detail->mobile : old('mobile')}}" class="form-control">
                                            @if ($errors->has('mobile'))
                                                <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('mobile') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('temporary_address')? "has-error":""}}">
                                            <label>Temporary Address</label>
                                            <input type="text" placeholder="Temporary Address" name="temporary_address" value="{{(! empty($detail->temporary_address)) ? $detail->temporary_address : old('temporary_address')}}" class="form-control">
                                            @if ($errors->has('temporary_address'))
                                                <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('temporary_address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('permanent_address')? "has-error":""}}">
                                            <label>Permanent Address</label>
                                            <input type="text" placeholder="Permanent Address" name="permanent_address" value="{{(! empty($detail->permanent_address)) ? $detail->permanent_address : old('permanent_address')}}" class="form-control">
                                            @if ($errors->has('permanent_address'))
                                                <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('permanent_address') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('bloodgroup')? "has-error":""}}">
                                            <label>Blood Group</label>
                                            <select name="bloodgroup" class="form-control">
                                                <option value="">Select your blood group</option>
                                                <option value="A+ve" {{($detail->bloodgroup==='A+ve') ? 'selected' : ''}}>A+ve</option>
                                                <option value="A-ve" {{($detail->bloodgroup==='A-ve') ? 'selected' : ''}}>A-ve</option>
                                                <option value="B+ve" {{($detail->bloodgroup==='B+ve') ? 'selected' : ''}}>B+ve</option>
                                                <option value="B-ve" {{($detail->bloodgroup==='B-ve') ? 'selected' : ''}}>B-ve</option>
                                                <option value="AB+ve" {{($detail->bloodgroup==='AB+ve') ? 'selected' : ''}}>AB+ve</option>
                                                <option value="AB-ve" {{($detail->bloodgroup==='AB-ve') ? 'selected' : ''}}>AB-ve</option>
                                                <option value="O+ve" {{($detail->bloodgroup==='O+ve') ? 'selected' : ''}}>O+ve</option>
                                                <option value="O-ve" {{($detail->bloodgroup==='O-ve') ? 'selected' : ''}}>O-ve</option>
                                            </select>
                                            @if ($errors->has('bloodgroup'))
                                                <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('bloodgroup') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('nationality')? "has-error":""}}">
                                            <label>Nationality</label>
                                            <select name="nationality" class="form-control">
                                                <option value="">Select your Nationality</option>
                                                <option value="Nepali" {{($detail->nationality==='Nepali') ? 'selected' : ''}}>Nepali</option>
                                                <option value="Other" {{($detail->nationality==='Other') ? 'selected' : ''}}>Other</option>
                                            </select>
                                            @if ($errors->has('nationality'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('nationality') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('status')? "has-error":""}}">
                                            <label>Marital Status</label>
                                            <select name="marital_status" id="maritalStatus" class="form-control">
                                                <option value="">Select Marital Status</option>
                                                <option value="Single" {{($detail->marital_status==='Single') ? 'selected' : ''}}>Single</option>
                                                <option value="Married" {{($detail->marital_status==='Married') ? 'selected' : ''}}>Married</option>
                                            </select>
                                            @if ($errors->has('marital_status'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('marital_status') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 marriageDate" @if($detail->marital_status==='Married' || old('marital_status')=='Married') style="display: block" @else style="display: none" @endif>
                                        <div class="form-group {{$errors->has('marriage_date')? "has-error":""}}">
                                            <label>Marriage Date</label>
                                            <input type="date" name="marriage_date" value="{{(! empty($detail->marriage_date)) ? $detail->marriage_date : old('marriage_date')}}" class="form-control">
                                            @if ($errors->has('marriage_date'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('marriage_date') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <hr class="customHr">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2>Emergency Contact:</h2>
                                    </div>
                                </div>
                                <div class="customContainer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{$errors->has('contact_name')? "has-error":""}}">
                                                <label>Contact Name</label>
                                                <input type="text" placeholder="Contact Name" name="contact_name" value="{{(! empty($detail->emergencyContact->name)) ? $detail->emergencyContact->name : old('contact_name')}}" class="form-control">
                                                @if ($errors->has('contact_name'))
                                                    <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('contact_name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{$errors->has('contact_relation')? "has-error":""}}">
                                                <label>Contact Relation</label>
                                                <input type="text" placeholder="Contact Relation"  name="contact_relation" value="{{(! empty($detail->emergencyContact->relation)) ? $detail->emergencyContact->relation : old('contact_relation')}}" class="form-control">
                                                @if ($errors->has('contact_relation'))
                                                    <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('contact_relation') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{$errors->has('contact_number')? "has-error":""}}">
                                                <label>Contact Number</label>
                                                <input type="text" placeholder="Contact Number" name="contact_number" value="{{(! empty($detail->emergencyContact->number)) ? $detail->emergencyContact->number : old('contact_number')}}" class="form-control">
                                                @if ($errors->has('contact_number'))
                                                    <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('contact_number') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  -->
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button class="btn btn-primary btn-md">SAVE CHANGES</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="row tab-pane fade" id="educationExperience">
                        <div class="col-md-12">
                            <h2>Academic History: </h2>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group pull-right">
                                            <!-- Trigger the modal with a button -->
                                            <button class="btn btn-default" id="add-more" data-toggle="modal" data-target="#addNewQualificationModal">
                                                <i class="fa fa-plus"></i>
                                                <span class="caption-subject add-color uppercase">Add New Qualification</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <!-- Add qualification Modal -->
                                <div id="addNewQualificationModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="portlet box grace-blue form-outer-part">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-plus"></i> <b>Add new Qualification</b> </div>
                                            </div>
                                            <div class="portlet-body form-inner-part">
                                                <!-- Modal body -->
                                                <!-- form starts here -->
                                                <form id="addNewQualification" method="post">
                                                    <input type="hidden" id="inquiryToken" name="inquiry_token" value="{{$detail->token}}">
                                                    <div class="academic">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Name of Qualification</label>
                                                                    <select id="nameOfQualification" name="name_of_qualification" class="form-control">
                                                                        <option value="">Select Qualification</option>
                                                                        <option value="SEE/SLC">SEE/SLC</option>
                                                                        <option value="A-LEVELS">A-Levels</option>
                                                                        <option value="10+2/PCL">10+2/PCL</option>
                                                                        <option value="Bachelor (3 years)">Bachelor's(3 years)</option>
                                                                        <option value="Bachelor (4 years)">Bachelor's (4 years)</option>
                                                                        <option value="MASTER/ABOVE">Master and Above</option>
                                                                    </select>
                                                                    <span class="text-danger" id="errorNameOfQualification"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Name of Institution</label>
                                                                    <input type="text" class="form-control" id="nameOfInstitution" name="name_of_institution" value="" placeholder="Name of Institution">
                                                                    <span class="text-danger" id="errorNameOfInstitution"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="box">From (Year)</label>
                                                                    <input type="number" class="form-control" id="academicStartDate"  name="academic_start_date" value="" placeholder="From">
                                                                    <span class="text-danger" id="errorAcademicStartDate"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="box">To (Year)</label>
                                                                    <input type="number" class="form-control" id="academicEndDate" name="academic_end_date" value="" placeholder="To">
                                                                    <span class="text-danger" id="errorAcademicEndDate"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="box">Academic Percentage</label>
                                                                    <input type="text" placeholder="Academic Percentage" value="" id="academicPercentage" class="form-control" name="academic_percentage">
                                                                    <span class="text-danger" id="errorAcademicPercentage"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="transparentRow"></div>
                                                        <div style="overflow:auto;">
                                                            <div style="float:right;">
                                                                <button class="btn btn-primary btn-md" id="addNewAcademic">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- form ends here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add model end -->
                                <!-- Edit Modal -->
                                <div id="editQualificationModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="portlet box grace-blue form-outer-part">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-plus"></i> <b>Edit Qualification</b> </div>
                                            </div>
                                            <div class="portlet-body form-inner-part">
                                                <!-- Modal body -->
                                                <!-- form starts here -->
                                                <form id="editQualificationForm" method="post">

                                                </form>
                                                <!-- form ends here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add model end -->
                                <!-- table inserted here!! -->
                                <div class="table-responsive">
                                    <table class="table table-hover" border='1'>
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name of Institution</th>
                                            <th>Name of Qualification</th>
                                            <th>From (year)</th>
                                            <th>To (year)</th>
                                            <th>Academic Percentage</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($detail->academicDetails as $key=>$academic)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$academic->name_of_institution}}</td>
                                                <td>{{$academic->name_of_qualification}}</td>
                                                <td>{{$academic->start_date}}</td>
                                                <td>{{$academic->end_date}}</td>
                                                <td>{{$academic->percentage}}</td>
                                                <td><button href="#" value="{{$academic}}" id="editAcademicDetail" title="Edit" data-toggle="modal" data-target="#editQualificationModal"><i class="far fa-edit"></i></button></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- inserted table ends here!! -->
                                <hr>
                                <h2>Experiences: </h2>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group pull-right">
                                                <button class="btn btn-default btn-md" id="add-experience" data-toggle="modal" data-target="#addNewExperienceModal">
                                                    <i class="fa fa-plus"></i>
                                                    <span class="caption-subject add-color uppercase">Add New Experience</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <!--Add Modal -->
                                <div id="addNewExperienceModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="portlet box grace-blue form-outer-part">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-plus"></i> <b>Add new Experience</b>
                                                </div>
                                            </div>
                                            <div class="portlet-body form-inner-part">
                                                <!-- modal body -->
                                                <!-- form goes here -->
                                                <form id="addNewExperience" method="post">
                                                    <div id="experience">
                                                        <div class="academic" id="experiences1">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Name of Institution</label>
                                                                        <input type="text" id="eNameOfInstitution" name="name_of_employer" value="" class="form-control" placeholder="Name of Employer">
                                                                        <span class="text-danger" id="errorENameOfInstitution"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Duties</label>
                                                                        <input type="text" class="form-control" id="duties" name="duties" value="" placeholder="Name of Duties">
                                                                        <span class="text-danger" id="errorDuties"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="box">From (Year)</label>
                                                                        <input type="number" class="form-control" id="experienceStartDate" name="start_year" value="" placeholder="From">
                                                                        <span class="text-danger" id="errorExperienceStartDate"></span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="box">To (Year)</label>
                                                                        <input type="number" class="form-control" id="experienceEndDate" name="end_year" value="" placeholder="To">
                                                                        <span class="text-danger" id="errorExperienceEndDate"></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="transparentRow"></div>
                                                            <div style="overflow:auto;">
                                                                <div style="float:right;">
                                                                    <button class="btn btn-primary btn-md">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add model end -->
                                <!-- edit Model -->
                                <div id="editExperienceModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="portlet box grace-blue form-outer-part">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-plus"></i> <b>Edit your experience</b>
                                                </div>
                                            </div>
                                            <div class="portlet-body form-inner-part">
                                                <!-- modal body -->
                                                <!-- form goes here -->
                                                <form id="editExperienceForm" method="post">

                                                </form>
                                                <!-- form ends here -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- edit Model end -->
                                <!-- table inserted here!! -->
                                <div class="table-responsive">
                                    <table class="table table-hover" border="1">
                                        <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name of Institution</th>
                                            <th>Duties</th>
                                            <th>From (year)</th>
                                            <th>To (year)</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($detail->experience as $key=>$experience)
                                            <tr>
                                                <td>{{++$key}}</td>
                                                <td>{{$experience->name_of_employer}}</td>
                                                <td>{{$experience->duties}}</td>
                                                <td>{{$experience->start_date}}</td>
                                                <td>{{$experience->end_date}}</td>
                                                <td><button href="#" value="{{$experience}}" id="editExperience" title="Edit" data-toggle="modal" data-target="#editExperienceModal"><i class="far fa-edit"></i></button></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- inserted table ends here!! -->
                                <hr>
                                <!-- ENGLISH PROFICIENCY TESTS STARTED -->
                                <div class="row portlet light form-inner-part">
                                    <h2>English Proficiency Tests</h2>
                                    <form action="{{route('inquiry.update',$detail->token)}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
                                    <!-- One "tab" for each step in the form: -->
                                        <input type="hidden" name="type" value="back">
                                        <input type="hidden" name="step" value="3N671SH9R02ICI3NCY">
                                        <div class="col-md-12">
                                            <div class="form-group {{$errors->has('is_taken')? "has-error":""}}">
                                                <p><label> Have you ever Taken a test? </label>
                                                    <label class="radio-inline"><input id="testTaken" {{($detail->englishTest->is_taken === 'Yes' || old('is_taken')=='Yes') ? 'checked' : ''}} type="radio" value="Yes" name="is_taken">Yes</label>
                                                    <label class="radio-inline"><input id="testTaken" {{($detail->englishTest->is_taken === 'No' || old('is_taken')=='No') ? 'checked' : ''}} type="radio" value="No" name="is_taken">No</label>
                                                </p>
                                                @if ($errors->has('is_taken'))
                                                    <span class="help-block">
                                                <strong>{{ $errors->first('is_taken') }}</strong>
                                            </span>
                                                @endif
                                            </div>
                                            <div class="testDetail" id="testDetail" @if($detail->englishTest->is_taken==='Yes' || old('test_taken')==='Yes') style="display: block" @else style="display: none;" @endif>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group  {{$errors->has('test_type')? "has-error":""}}">
                                                            <label>Test Type</label>
                                                            <select name="test_type" class="form-control">
                                                                <option value="">Select test type</option>
                                                                <option value="IELTS" {{($detail->englishTest->test_type === 'IELTS' || old('test_type')==='IELTS') ? 'selected' : ''}}>IELTS</option>
                                                                <option value="GMAT" {{($detail->englishTest->test_type === 'GMAT' || old('test_type')==='GMAT') ? 'selected' : ''}}>GMAT</option>
                                                                <option value="SAT" {{($detail->englishTest->test_type === 'SAT' || old('test_type')==='SAT') ? 'selected' : ''}}>SAT</option>
                                                                <option value="TOEFL" {{($detail->englishTest->test_type === 'TOEFL' || old('test_type')==='TOEFL') ? 'selected' : ''}}>TOEFL</option>
                                                            </select>
                                                            @if ($errors->has('test_type'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('test_type') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group  {{$errors->has('test_date')? "has-error":""}}">
                                                            <label>Test Date</label>
                                                            <input placeholder="DD/MM/YYYY" value ="{{(! empty($detail->englishTest->test_date)) ? $detail->englishTest->test_date : old('test_date')}}" class="form-control" name="test_date">
                                                            @if ($errors->has('test_date'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('test_date') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group  {{$errors->has('listening')? "has-error":""}}">
                                                            <label>Listening</label>
                                                            <input placeholder="Listening Score" value ="{{(! empty($detail->englishTest->listening)) ? $detail->englishTest->listening : old('listening')}}" class="form-control" name="listening">
                                                            @if ($errors->has('listening'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('listening') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group  {{$errors->has('writing')? "has-error":""}}">
                                                            <label>Writing</label>
                                                            <input placeholder="Writing Score" value ="{{(! empty($detail->englishTest->writing)) ? $detail->englishTest->writing : old('writing')}}" class="form-control" name="writing">
                                                            @if ($errors->has('writing'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('writing') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group  {{$errors->has('speaking')? "has-error":""}}">
                                                            <label>Speaking</label>
                                                            <input placeholder="Speaking Score" value ="{{(! empty($detail->englishTest->speaking)) ? $detail->englishTest->speaking : old('speaking')}}" class="form-control" name="speaking">
                                                            @if ($errors->has('speaking'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('speaking') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group  {{$errors->has('reading')? "has-error":""}}">
                                                            <label>Reading</label>
                                                            <input placeholder="Reading Score" value ="{{(! empty($detail->englishTest->reading)) ? $detail->englishTest->reading : old('reading')}}" class="form-control" name="reading">
                                                            @if ($errors->has('reading'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('reading') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group  {{$errors->has('overall')? "has-error":""}}">
                                                            <label>Overall</label>
                                                            <input placeholder="Overall Score" value ="{{(! empty($detail->englishTest->overall)) ? $detail->englishTest->overall : old('overall')}}" class="form-control" name="overall">
                                                            @if ($errors->has('overall'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('overall') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group  {{$errors->has('other_test_attain')? "has-error":""}}">
                                                            <label>Other test attain?</label>
                                                            <input type="text" placeholder="Test attain" class="form-control" value="{{(! empty($detail->englishTest->other_test_attain)) ? $detail->englishTest->other_test_attain : old('other_test_attain')}}" name="other_test_attain">
                                                            @if ($errors->has('other_test_attain'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('other_test_attain') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group {{$errors->has('preparation_classes')? "has-error":""}}">
                                                            <p><label>Any Previous Preparation Classes ?</label>
                                                                <label class="radio-inline"><input type="radio" {{($detail->englishTest->preparation_classes==='Yes' || old('preparation_classes')=='Yes') ? 'checked' : ''}} value="Yes" id="classes" name="preparation_classes">Yes</label>
                                                                <label class="radio-inline"><input type="radio" {{($detail->englishTest->preparation_classes==='No' || old('preparation_classes')=='No') ? 'checked' : ''}} value="No" id="classes" name="preparation_classes">No</label>
                                                            </p>
                                                            @if ($errors->has('preparation_classes'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('preparation_classes') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 studyCenter" @if($detail->englishTest->preparation_classes==='Yes' || old('preparation_classes')=='Yes') style="display: block" @else style="display: none" @endif>
                                                        <div class="form-group {{$errors->has('study_center')? "has-error":""}}">
                                                            <label>Study Center</label>
                                                            <input type="text" placeholder="Name of the Study Center" value="{{($detail->englishTest->study_center) ? $detail->englishTest->study_center : old('study_center')}}" class="form-control" name="study_center">
                                                            @if ($errors->has('study_center'))
                                                                <span class="help-block">
                                                            <strong>{{ $errors->first('study_center') }}</strong>
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="overflow:auto;">
                                                <div style="float:right;">
                                                    <button class="btn btn-primary btn-md">SAVE CHANGES</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row tab-pane fade" id="interestHistory">
                        <div class="col-md-12">
                            <form action="{{route('inquiry.update',$detail->token)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <!-- One "tab" for each step in the form: -->
                                <input type="hidden" name="type" value="back">
                                <input type="hidden" name="step" value="1N73RE573Dhi57OrY">
                                <h2>Interests:</h2>
                                <div class="customContainer">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{$errors->has('interested_country')? "has-error":""}}">
                                                <label>Interested Country</label>
                                                <select name="interested_country" id="country" class="form-control">
                                                    <option value="">Select interested country</option>
                                                    @if(count($countries))
                                                        @foreach($countries as $key=>$country)
                                                            <option value="{{$country->id}}" {{($detail->interest->country_id === $country->id) ? 'selected' : ''}}>{{$country->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if ($errors->has('interested_country'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('interested_country') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{$errors->has('Interested_intake')? "has-error":""}}">
                                                <label>Interested Intake</label>
                                                <select name="Interested_intake" id="intake" class="form-control">
                                                    <option value="{{(isset($detail->interest->intake_id)) ? $detail->interest->intake_id : ''}}">{{(isset($detail->interest->intake_id)) ? $detail->interest->intake->name : 'Select Intake'}}</option>
                                                </select>
                                                @if ($errors->has('Interested_intake'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('Interested_intake') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{$errors->has('interested_university')? "has-error":""}}">
                                                <label>Interested University</label>
                                                <select name="interested_university" id="university" class="form-control">
                                                    <option value="{{(isset($detail->interest->partner_id)) ? $detail->interest->partner_id : ''}}">{{(isset($detail->interest->partner_id)) ? $detail->interest->partner->name : 'Select University'}}</option>
                                                </select>
                                                @if ($errors->has('interested_university'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('interested_university') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{$errors->has('interested_course')? "has-error":""}}">
                                                <label>Interested Course</label>
                                                <select name="interested_course" id="course" class="form-control">
                                                    <option value="{{(isset($detail->interest->course_id)) ? $detail->interest->course_id : ''}}">{{(isset($detail->interest->course_id)) ? $detail->interest->course->name : 'Select Course'}}</option>
                                                </select>
                                                @if ($errors->has('interested_course'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('interested_course') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>     <!-- added div -->
                                <hr class="customHr">
                                <h2>History:</h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{$errors->has('rejected_before')? "has-error":""}}">
                                            <p><label>Have you been rejected before?</label>
                                                <label class="radio-inline"><input type="radio" id="rejectionBefore" {{($detail->history->rejected_before === 'Yes' || old('rejected_before')=='Yes') ? 'checked' : ''}} value="Yes" name="rejected_before">Yes</label>
                                                <label class="radio-inline"><input type="radio" id="rejectionBefore" {{($detail->history->rejected_before === 'No' || old('rejected_before')=='No') ? 'checked' : ''}} value="No" name="rejected_before">No</label>
                                            </p>
                                            @if ($errors->has('rejected_before'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('rejected_before') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 rejectionReason" style="display: none">
                                        <div class="form-group {{$errors->has('rejection_reason')? "has-error":""}}">
                                            <label>Rejection Reason</label>
                                            <input type="text" name="rejection_reason" value="{{(! empty($detail->history->rejection_reason)) ? $detail->history->rejection_reason : old('rejection_reason')}}" class="form-control">
                                            @if ($errors->has('rejection_reason'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('rejection_reason') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {{$errors->has('how_did_you_hear_about_us')? "has-error":""}}">
                                            <p><label>How did you hear about us?</label>
                                                <label class="radio-inline"><input type="radio" {{($detail->how_did_you_know_about_us === 'Friend' || old('how_did_you_hear_about_us')==='Friend') ? 'checked' : ''}} value="Friend" name="how_did_you_hear_about_us">Friend</label>
                                                <label class="radio-inline"><input type="radio" {{($detail->how_did_you_know_about_us === 'Facebook' || old('how_did_you_hear_about_us')==='Facebook') ? 'checked' : ''}} value="Facebook" name="how_did_you_hear_about_us">Facebook</label>
                                                <label class="radio-inline"><input type="radio" {{($detail->how_did_you_know_about_us === 'Website' || old('how_did_you_hear_about_us')==='Website') ? 'checked' : ''}} value="Website" name="how_did_you_hear_about_us">Website</label>
                                            </p>
                                            @if ($errors->has('how_did_you_hear_about_us'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('how_did_you_hear_about_us') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div style="overflow:auto;">
                                    <div style="float:right;">
                                        <button class="btn btn-primary btn-md">SAVE CHANGES</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row tab-pane fade" id="followUps">
                        <form action="{{route('add.followup')}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <input type="hidden" name="inquiry_token" value="{{$detail->token}}">
                                <!-- DATE PICKER bootstrap-->
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group {{$errors->has('date')? "has-error":""}}" style='margin-top:00px;'>
                                        <label><b>Enter follow up date</b></label>
                                        <input type='text' name="date" class="form-control" id='datepicker1' style='width: 100%;' placeholder="mm/dd/yyyy" value="{{old('date')}}" required>
                                        @if ($errors->has('date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <!-- Script -->
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#datepicker1').datepicker();
                                    });
                                </script>
                                <!-- DATE PICKER Bootstrap END -->
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group {{$errors->has('reasons')? "has-error":""}}">
                                        <label><b>Visit Reasons</b></label>
                                        <textarea class="form-control" rows="3" name="reasons" id="reasons" placeholder="Visit Reasons">{{old('reasons')}}</textarea>
                                        @if ($errors->has('reasons'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('reasons') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-primary btn-md">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="assignCounselor">
                        <div class="row">
                            <div class="col-md-8">
                              <div class="form-outer-part">
                                <div class="portlet light profile-sidebar-portlet form-inner-part">
                                        <div class="modal-body">
                                            <form action="{{route('office.check.in')}}" method="post">
                                                {{csrf_field()}}
                                            <input type="hidden" name="application" id="application" value="{{$detail->token}}" required>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group {{$errors->has('reasons')? "has-error":""}}">
                                                        <label><b>Followup Reasons</b></label>
                                                        <textarea class="form-control" rows="3" name="reasons" id="reasons" placeholder="Visit Reasons">{{old('reasons')}}</textarea>
                                                        @if ($errors->has('reasons'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('reasons') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group {{$errors->has('assignee')? "has-error":""}}">
                                                        <label><b>Select Assignee</b></label>
                                                        <select class="form-control" name="assignee" required>
                                                            <option value="">Select...</option>
                                                            @if(count($counselors)>0)
                                                                @foreach($counselors as $key=>$counselor)
                                                                    <option value="{{$counselor->id}}">{{$counselor->name}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        @if ($errors->has('assignee'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('assignee') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                            </form>
                                            <br>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <form method="post" action="{{route('change.assignee')}}">
                                                    {{csrf_field()}}
                                                    <fieldset>
                                                    <input type="hidden" value="{{$detail->token}}" name="token">
                                                <div class="form-group {{$errors->has('assignee')? "has-error":""}}">
                                                    <label><b>Change Assignee</b></label>
                                                    <select class="form-control" name="changeAssignee" id="changeAssignee">
                                                        <option value="">Select...</option>
                                                        @if(count($counselors)>0)
                                                            @foreach($counselors as $key=>$counselor)
                                                                <option value="{{$counselor->id}}">{{$counselor->name}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('assignee'))
                                                        <span class="help-block">
                                                                <strong>{{ $errors->first('assignee') }}</strong>
                                                            </span>
                                                    @endif
                                                </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Change</button>
                                                    </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                          </div>
                            <div class="col-md-4">
                                <div class="row portlet light profile-sidebar-portlet form-outer-part">
                                    <div class="col-md-12">
                                        <h4><b>Current Assignee :</b></h4>
                                    </div>
                                    @if(count($detail->officeCheckIn)>0)
                                    <!-- SIDEBAR USERPIC -->
                                    {{--@foreach($detail->officeCheckIn as $assignee)--}}
                                    <div class="profile-userpic">
                                        {{--<img src="{{($assignee->user->thumbnail) ? URL::to('images/users/'.$assignee->user->thumbnail) : URL::to('images/users/male.png')}}" class="img-responsive" alt=""> </div>--}}
                                        {{--<img src="" alt="">--}}
                                        <img src="{{($counselorDetail->thumbnail) ? URL::to('images/users/'.$counselorDetail->thumbnail) : URL::to('images/users/male.png')}}" class="img-responsive" alt=""> </div>
                                    <!-- END SIDEBAR USERPIC -->
                                    <!-- SIDEBAR USER TITLE -->
                                    <div class="profile-usertitle">
                                        {{--<div class="profile-usertitle-name"> {{$assignee->user->name}} </div>--}}
                                        {{--<div class="profile-usertitle-job"> {{$assignee->user->position}} </div>--}}
                                        <div class="profile-usertitle-name"> {{isset($counselorDetail)?$counselorDetail->name:''}} </div>
                                        <div class="profile-usertitle-job"> {{isset($counselorDetail)?$counselorDetail->position:''}} </div>
                                    </div><br>
                                    {{--@endforeach--}}
                                    <!-- END SIDEBAR USER TITLE -->
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </div>
            </div><!-- closing div for <div class="form-outer-part">  -->
            <!-- PAGE CONTENT ENDED -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <script type="text/javascript" src="{{URL::to('js/update-inquiry.js')}}"></script>
        <script>
@endsection
