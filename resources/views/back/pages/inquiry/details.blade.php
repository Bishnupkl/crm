@extends('back.layouts.master')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->
            <!-- BEGIN THEME PANEL -->
        @include('back.partials.theme-panel')
        <!-- END THEME PANEL -->
            <!-- BEGIN PAGE BAR -->
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <a href="{{URL::to('admin')}}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Inquiry</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Inquiry Details</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">Inquiry Details
            </h3>
            <!-- Error and Success Message -->
            @if(session('success'))
                <div class="alert alert-success"><i class="fa fa-check-square"></i>{{session('success')}} </div>
            @endif
            @if(session('error'))
                <div class="alert alert-success">{{session('error')}} </div>
            @endif
            <!-- Error and Success Message -->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="{{URL::to('images/profile-images/male.png')}}" class="img-responsive" alt=""> </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name">{{$detail->name}} </div>
                                <div class="profile-usertitle-job"> Mobile :  {{$detail->mobile}} </div>
                                @foreach($detail->inquiryCounsellor as $key=> $counsellor)
                                    @if($counsellor->counsellor_status === 1)
                                        <div class="profile-usertitle-job">Active Counsellor :  {{$counsellor->counsellor->name}} </div>
                                    @endif
                                @endforeach
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <script type="text/javascript" charset="utf-8" async defer> console.log(document.querySelectorAll('1'))</script>
                            <div class="col-md">
                                <ul class="ver-inline-menu tabbable margin-bottom-10">
                                    <li class="active" onclick="clicks();">
                                        <a data-toggle="tab" href="#tab_1-1" >
                                            <i class="fa fa-cog"></i> Personal info </a>
                                        <span class="after"> </span>
                                    </li>
                                    <li onclick="clicks();">
                                        <a data-toggle="tab" href="#tab_2-2">
                                            <i class="fa fa-picture-o"></i> Emergency Contacts </a>
                                    </li>
                                    <li onclick="clicks();">
                                        <a data-toggle="tab" href="#tab_3-3">
                                            <i class="fa fa-lock"></i>Academic Details </a>
                                    </li>
                                    <li onclick="clicks();">
                                        <a data-toggle="tab" href="#tab_4-4">
                                            <i class="fa fa-eye"></i>English Proficiency Tests  </a>
                                    </li>
                                    <li onclick="clicks();">
                                        <a data-toggle="tab" href="#tab_5-5">
                                            <i class="fa fa-eye"></i> Experience and Training </a>
                                    </li>
                                    <li onclick="clicks();">
                                        <a data-toggle="tab" href="#tab_6-6">
                                            <i class="fa fa-eye"></i> Interests</a>
                                    </li>
                                    <li onclick="clicks();">
                                        <a data-toggle="tab" href="#documents">
                                            <i class="fa fa-eye"></i> Documents</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        {{--<div class="caption caption-md">--}}
                                            {{--<i class="icon-globe theme-font hide"></i>--}}
                                            {{--<span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>--}}
                                        {{--</div>--}}
                                        <ul class="nav nav-tabs">
                                            <li class="active" >
                                                <a href="#general_info" id="1" data-toggle="tab">General Info</a>
                                            </li>
{{--                                            @if(Auth::user()->morph_type === 'reception')--}}
                                                <li>
                                                    <a href="#assign_counsellor" data-toggle="tab">Assign Counsellor</a>
                                                </li>
                                            {{--@endif--}}
                                            <li>
                                                <a href="#add_counselling_details" data-toggle="tab">Counselling Details</a>
                                            </li>
                                            <li>
                                                <a href="#add_followup" data-toggle="tab">Add Followup</a>
                                            </li>
                                            <li>
                                                <a href="{{route('inquiry.pdf',$detail->token)}}">Export To PDF</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active overflow" id="general_info">
                                                <div class="col-md-9">
                                                    <div class="tab-content">
                                                        <div id="tab_1-1" class="tab-pane active">
                                                            <hr>
                                                            <h2>Personal Information</h2>
                                                            <hr>
                                                            <table class="table table-striped table-hover table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th> Token </th>
                                                                    <td>{{$detail->token}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Full Name </th>
                                                                    <td>{{$detail->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Date of Birth </th>
                                                                    <td>{{$detail->dob}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Email </th>
                                                                    <td>{{$detail->email}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Landline Number </th>
                                                                    <td>{{$detail->landline}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Mobile Number </th>
                                                                    <td>{{$detail->mobile}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Permanent Address </th>
                                                                    <td>{{$detail->permanent_address}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Temporary Address </th>
                                                                    <td>{{$detail->temporary_address}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Marital Status </th>
                                                                    <td>{{$detail->marital_status}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Marital Date </th>
                                                                    <td>{{$detail->married_date}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> How did you know about us ? </th>
                                                                    <td>{{$detail->how_did_you_know_about_us}}</td>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div id="tab_2-2" class="tab-pane active">
                                                            <h2>Emergency Contacts</h2>
                                                            <hr>
                                                            @if(!empty($detail->emergencyContact))
                                                            <table class="table table-striped table-hover table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th> Parent Name </th>
                                                                    <td>{{$detail->emergencyContact->name}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Relations</th>
                                                                    <td>{{$detail->emergencyContact->relation}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Contact Number </th>
                                                                    <td>{{$detail->emergencyContact->contact}}</td>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                            @endif
                                                        </div>
                                                        <div id="tab_3-3" class="tab-pane active">
                                                            <h2>Academic Details</h2>
                                                            <hr>
                                                            <table class="table table-striped table-hover table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th> Academic Qualification </th>
                                                                    <th> Name of Institution </th>
                                                                    <th> Start Date </th>
                                                                    <th> End Date </th>
                                                                    <th> Percentage </th>
                                                                </tr>
                                                                @if(count($detail->academicDetail)>0)
                                                                    @foreach($detail->academicDetail as $key=>$academic)
                                                                        <tr>
                                                                            <td>{{$academic->name_of_qualification}}</td>
                                                                            <td>{{$academic->name_of_institution}}</td>
                                                                            <td>{{$academic->start_date}}</td>
                                                                            <td>{{$academic->end_date}}</td>
                                                                            <td>{{$academic->percentage}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div id="tab_4-4" class="tab-pane active">
                                                            <h2>English Proficiency Tests</h2>
                                                            <hr>
                                                            <table class="table table-striped table-hover table-bordered">
                                                                <thead>
                                                                @if(! empty($detail->englishProficiencyTest))
                                                                    @if($detail->englishProficiencyTest->is_taken == 'yes')
                                                                        <tr>
                                                                            <th> Test Taken Date</th>
                                                                            <td>{{$detail->englishProficiencyTest->test_date}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th> Overall </th>
                                                                            <td>{{$detail->englishProficiencyTest->o}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th> Listening </th>
                                                                            <td>{{$detail->englishProficiencyTest->l}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th> Reading </th>
                                                                            <td>{{$detail->englishProficiencyTest->r}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th> Speaking </th>
                                                                            <td>{{$detail->englishProficiencyTest->s}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th> Writing </th>
                                                                            <td>{{$detail->englishProficiencyTest->w}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th> Other Test Attain </th>
                                                                            <td>{{$detail->englishProficiencyTest->other_test_attain}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th> Scores </th>
                                                                            <td>{{$detail->englishProficiencyTest->scores}}</td>
                                                                        </tr>
                                                                        @if($detail->englishProficiencyTest->is_any_previous_preparation_class == 'yes')
                                                                            <tr>
                                                                                <th> Study Centre </th>
                                                                                <td>{{$detail->englishProficiencyTest->study_centre}}</td>
                                                                            </tr>
                                                                        @endif
                                                                    @endif
                                                                    @endif
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div id="tab_5-5" class="tab-pane active">
                                                            <h2>Experience and Training</h2>
                                                            <hr>
                                                            <table class="table table-striped table-hover table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th> Name of Employer </th>
                                                                    <th> Duties </th>
                                                                    <th> Start Date </th>
                                                                    <th> End Date </th>
                                                                </tr>
                                                                @if(! empty($detail->experiences))
                                                                    @foreach($detail->experiences as $key=>$experiences)
                                                                        <tr>
                                                                            <td>{{$experiences->name_of_employer}}</td>
                                                                            <td>{{$experiences->duties}}</td>
                                                                            <td>{{$experiences->start_date}}</td>
                                                                            <td>{{$experiences->end_date}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div id="tab_6-6" class="tab-pane active">
                                                            <h2>Interests</h2>
                                                            <hr>
                                                            @if(! empty($detail->interest))
                                                            <table class="table table-striped table-hover table-bordered">
                                                                <thead>
                                                                <tr>
                                                                    <th> Country </th>
                                                                    <td>{{(! empty($detail->interest->country)) ? $detail->interest->country->name : ''}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Intake </th>
                                                                    <td>{{(! empty($detail->interest->intake)) ? $detail->interest->intake->intake_type : ''}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> University </th>
                                                                    <td>{{(! empty($detail->interest->university)) ? $detail->interest->university->name : ''}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th> Course </th>
                                                                    <td>{{(! empty($detail->interest->course)) ? $detail->interest->course->course_name : ''}}</td>
                                                                </tr>
                                                                </thead>
                                                            </table>
                                                                @endif
                                                        </div>
                                                        <div id="documents" class="tab-pane active">
                                                            <h2>Academic Documents</h2>
                                                            <hr>
                                                            @if(count($detail->documents)>0)
                                                                <div class="row col-md-12">
                                                                    @foreach($detail->documents as $key=>$document)
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <img src="{{URL::to('images/certificates/'.$document->mark_sheet)}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <img src="{{URL::to('images/certificates/'.$document->character)}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <img src="{{URL::to('images/certificates/'.$document->other)}}">
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                            <h2>Training Certificate</h2>
                                                            @if(count($detail->trainingDocuments)>0)
                                                                <div class="row col-md-12">
                                                                    @foreach($detail->trainingDocuments as $key=>$document)
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <img src="{{URL::to('images/certificates/'.$document->mark_sheet)}}">
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END General INFO TAB -->

                                            <!-- add_counselling_details TAB -->
                                            <div class="tab-pane overflow" id="add_counselling_details">
                                                <h2>Add Counselling Details</h2>
                                                <hr>
                                                @if(Auth::user()->morph_type === 'counsellor')
                                                    <form action="{{route('counsellor.details',$detail->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <div class="col-md-12 form-group">
                                                                <label>Financial Details:</label>
                                                                <textarea name="detail" class="wysihtml5 form-control" rows="6"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12 form-group">
                                                                <label>Feedback:</label>
                                                                <textarea name="feedback" class="wysihtml5 form-control" rows="6"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12 form-group pull-right">
                                                                <button class="btn btn-success">Add Details</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                @endif
                                                <h2>Counselling Details</h2>
                                                @foreach($detail->counsellingDetail as $key=>$value)
                                                    <h3>Financial Details :</h3>
                                                    <p>{!! $value->details !!}</p>
                                                    <h3>Feedback Details :</h3>
                                                    <p>{!! $value->feedback !!}</p>
                                                @endforeach
                                            </div>
                                            <!-- END add_counselling_details TAB -->

                                            <!-- assign_counsellor TAB -->
                                            <div class="tab-pane overflow" id="assign_counsellor">
                                                <hr>
                                                <h2>Add Counsellor</h2>
                                                <hr>
                                                <form action="{{route('assign.counsellor',$detail->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="type" value="assign">
                                                    <div class="form-group">
                                                        <div class="col-md-8">
                                                            <select class="form-control select2me" name="counsellor" required>
                                                                <option value="">Select...</option>
                                                                @if(count($counsellors)>0)
                                                                    @foreach($counsellors as $key=>$counsellor)
                                                                        @if($counsellor->id != Auth::id())
                                                                            <option value="{{$counsellor->id}}">{{$counsellor->name}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-4">
                                                            <button class="btn btn-success">ASSIGN</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br><br>
                                                <h2>Reassign Counsellor</h2>
                                                <hr>
                                                <form action="{{route('assign.counsellor',$detail->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    <div class="form-group">
                                                        <div class="col-md-8">
                                                            <input type="hidden" name="type" value="reassign">
                                                            <select class="form-control select2me" name="counsellor" required>
                                                                <option value="">Select...</option>
                                                                @if(count($counsellors)>0)
                                                                    @foreach($counsellors as $key=>$counsellor)
                                                                        @if($counsellor->id != Auth::id())
                                                                            <option value="{{$counsellor->id}}">{{$counsellor->name}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-4">
                                                            <button class="btn btn-success">ASSIGN</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <br><br>
                                                <h2>All Counsellors</h2>
                                                <table class="table">
                                                    @foreach($detail->inquiryCounsellor as $key=>$counsellor)
                                                       <tr>
                                                           <th>Name :</th>
                                                           <td> {!! $counsellor->counsellor->name !!}</td>
                                                       </tr>
                                                    @endforeach
                                                </table>
                                                <div class="clearfix"></div>
                                            </div>
                                            <!-- END add followup TAB -->
                                            <div class="tab-pane overflow" id="add_followup">
                                                <hr>
                                                <form action="{{route('add.followup')}}" method="post">
                                                    {{csrf_field()}}
                                                    <input type="hidden" name="inquiry_id" value="{{$detail->id}}">
                                                    <div class="col-md-12 form-group">
                                                        <label>Enter follow up date</label>
                                                        <div class="form-group">
                                                            <input type="date" name="date" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label>Follow up Type</label>
                                                        <select class="form-group form-control" name="follow_type">
                                                            <option selected>Select follow up type</option>
                                                            <option value="SMS" >SMS</option>
                                                            <option value="Phone" >Phone</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label>Reasons</label>
                                                        <div class="form-group">
                                                            <textarea name="reasons" class="wysihtml5 form-control" rows="6"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12 form-group">
                                                            <button class="btn btn-success">Add Follow Up</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <h2>Follow up Details</h2>
                                                @foreach($detail->followup as $key=>$value)
                                                    <h3>Reason :</h3>
                                                    <p>{!! $value->reasons !!}</p>
                                                    <h3>Result :</h3>
                                                    <p>{!! $value->results !!}</p>
                                                @endforeach
                                            </div>
                                            <!-- END add followup TAB -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
<script>
    var a = (document.getElementById('1'));
    function clicks(){
        a.click();
    }
</script>
@endsection