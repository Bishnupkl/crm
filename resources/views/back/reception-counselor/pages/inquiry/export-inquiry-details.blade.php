
            <!DOCTYPE html>
    <html>
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <style>

            body {
                /* font-family: 'GFS Didot', serif; */
                /*font-weight: 600;*/
            }


            .form-group {
                margin-bottom: 15px;
            }

            input, select, textarea, .select2 {
                border-radius: 7px !important;
            }

            .modal-dialog>.portlet-body>.panel-body{
                padding:15px;
                margin:0px;

            }

            .modal-dialog>.portlet-body{
                border-radius: 7px !important;
                border:1px solid rgba(247, 247, 247, 0.5);
            }

            .panel-body>h4{
                text-align: center;
            }

            td, th{
                text-align: center;
            }

            .panel-body, .form-outer-part {
                margin:0px;
            }
            .left_interest{
                /*font-size: 0.8rem;*/
                width: 45%;
                margin-right: 600px;
            }
            .radiobotton{
                margin-top: 5px;
            }
            .right_interest{
                text-decoration: none;
                /*font-size: 0.8rem;*/
                width: 45%;
                float: right;

                /*margin-left: 600px;*/
                margin-top: -100px;
            }
            .left_emergency{
                width: 45%;
            }
            .right_emergency{
                width: 45%;
                float: right;
            }
            .test_left{

                text-decoration: none;
                /*font-size: 0.8rem;*/
                width: 45%;
                margin-right: 600px;
            }
            .test_right{
                text-decoration: none;
                /*font-size: 0.8rem;*/
                width: 45%;
                float: right;

                /*margin-left: 600px;*/
                margin-top: -900px;
            }

            .left{
                width: 45%;
                margin-right: 600px;
            }
            .right{
                width: 45%;
                float: right;
                /*margin-left: 600px;*/
                margin-top: -820px;
            }
            .bottom{
                width: 45%;
                float: left;

            }
            input[type=text], select, textarea{
                width: 100%;
                /*padding: 12px;*/
                /*padding-top: 12px;*/
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                resize: vertical;
            }

            .customHr{
                border:4px;
                height:2px;
                color:#2c3e50;
                /*background-image: linear-gradient(*/
                        /*to right, rgba(0,0,0,0),rgba(0,0,0,0.1), rgba(0,0,0,.1), rgba(0,0,0,0.1),rgba(0,0,0,0));*/
            }

            h3{
                color:#2c3e50;
            }
            h2{
                color:#2c3e50;
            }

            .customContainer{
                /*padding-top: 20px;*/
            }
            .emergency{
                margin-top: 10cm;
            }
            hr{
                /*border:10px;*/
                /*height:2px;*/
                margin-top: -10px;
            }

            .pull-right{
                margin-top: 15px;
            }

            .table-hover{
                width: 100%;

                /*height: 50%;*/
                /*border: white;*/
                border-collapse: collapse;
            }

            /*th,td{*/
                /*padding: 5px;*/

            /*}*/

            .transparentRow{
                height: 14px;
            }

            .page-content-wrapper>.page-content{
                overflow: auto; /*allows the page-content to adjust its height according to the content in it*/
            }

            .low{
                float: bottom;
                /*width: 50%;*/
            }

        </style>

    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    <!-- BEGIN HEADER -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Personal Information:</h2>
                <hr>

            </div>

        <div class="col-md-12">
            <form action="{{route('inquiry.update',$detail->token)}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <!-- One "tab" for each step in the form: -->
                <input type="hidden" name="type" value="back">
                <input type="hidden" name="step" value="P3r5oN81in7r3A4Ion">

                        <div class="left">
                            <div class="form-group {{$errors->has('name')? "has-error":""}}">
                                <label>Name</label><br>
                                <input type="text" placeholder="Full Name..." name="name" value="{{(! empty($detail->name)) ? $detail->name : old('name')}}" class="form-control">
                            </div>
                            <div class="form-group {{$errors->has('gender')? "has-error":""}}">
                                <label for="gender">Gender</label><br>
                                <input type="text" placeholder="Full Name..." name="name" value="{{(! empty($detail->gender)) ? $detail->gender : old('name')}}" class="form-control">
                            </div>
                            <div class="form-group {{$errors->has('landline')? "has-error":""}}">
                                <label>Landline Number</label><br>
                                <input type="text" placeholder="Contact (Landline)" name="landline" value="{{(! empty($detail->landline)) ? $detail->landline : old('landline')}}" class="form-control">
                            </div>
                            <div class="form-group {{$errors->has('temporary_address')? "has-error":""}}">
                                <label>Temporary Address</label><br>
                                <input type="text" placeholder="Temporary Address" name="temporary_address" value="{{(! empty($detail->temporary_address)) ? $detail->temporary_address : old('temporary_address')}}" class="form-control">
                            </div>
                            <div class="form-group {{$errors->has('bloodgroup')? "has-error":""}}">
                                <label>Blood Group</label><br>
                                <input type="text" placeholder="Permanent Address" name="permanent_address" value="{{(! empty($detail->bloodgroup)) ? $detail->bloodgroup : old('permanent_address')}}" class="form-control">
                            </div>
                            <div class="form-group {{$errors->has('status')? "has-error":""}}">
                                <label>Marital Status</label><br>
                                <input type="text" placeholder="Permanent Address" name="permanent_address" value="{{(! empty($detail->marital_status)) ? $detail->marital_status : old('permanent_address')}}" class="form-control">
                            </div>
                            </div>
                            <div class="right" >
                                <div class="form-group {{$errors->has('email')? "has-error":""}}">
                                    <label>Email</label><br>
                                    <input type="text" placeholder="Email" name="email" value="{{(! empty($detail->email)) ? $detail->email : old('email')}}" class="form-control">
                                </div>
                                <div class="form-group {{$errors->has('dob')? "has-error":""}}" style='margin-top:00px;'>
                                    <label>Date of Birth</label><br>
                                    <input type='text' name="dob" class="form-control" id='datepicker'  placeholder="mm/dd/yyyy" value="{{(! empty($detail->dob)) ? $detail->dob : old('dob')}}">
                                </div>
                                <div class="form-group {{$errors->has('mobile')? "has-error":""}}">
                                    <label>Mobile Number</label><br>
                                    <input type="text" placeholder="Contact (Mobile)" name="mobile" value="{{(! empty($detail->mobile)) ? $detail->mobile : old('mobile')}}" class="form-control">
                                </div>
                                <div class="form-group {{$errors->has('permanent_address')? "has-error":""}}">
                                    <label>Permanent Address</label><br>
                                    <input type="text" placeholder="Permanent Address" name="permanent_address" value="{{(! empty($detail->permanent_address)) ? $detail->permanent_address : old('permanent_address')}}" class="form-control">
                                </div>
                                <div class="form-group {{$errors->has('nationality')? "has-error":""}}">
                                    <label>Nationality</label><br>
                                    <input type="text" placeholder="Permanent Address" name="permanent_address" value="{{(! empty($detail->nationality)) ? $detail->nationality : old('permanent_address')}}" class="form-control">
                                </div>
                                <div class="marriageDate" @if($detail->marital_status==='Married' || old('marital_status')=='Married') style="display: block" @else style="display: none" @endif>
                                    <div class="form-group {{$errors->has('marriage_date')? "has-error":""}}">
                                        <label>Marriage Date</label><br>
                                        <input type="text" name="marriage_date" value="{{(! empty($detail->marital_status)) ? $detail->marital_status : old('marital_status')}}" class="form-control">
                                    </div>
                                </div>
                             </div>
            </form>
        </div>
        </div>

    </div>


        <div class="emergency">

            <h3>Emergency Contact:</h3>
            <hr>
            <div class="left_emergency">
                <div class="col-md-6" >
                    <div class="form-group {{$errors->has('contact_name')? "has-error":""}}">
                        <label>Contact Name</label> <br>
                        <input type="text" placeholder="Contact Name" name="contact_name" value="{{(! empty($detail->emergencyContact->name)) ? $detail->emergencyContact->name : old('contact_name')}}" class="form-control">

                    </div>
                </div>
                <div class="col-md-6"  >
                    <div class="form-group {{$errors->has('contact_number')? "has-error":""}}">
                        <label>Contact Number</label> <br>
                        <input type="text"  name="contact_number" value="{{(! empty($detail->emergencyContact->number)) ? $detail->emergencyContact->number : old('contact_number')}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="right_emergency">
                <div class="col-md-6" style="margin-top: -130px">
                    <div class="form-group {{$errors->has('contact_relation')? "has-error":""}}" >
                        <label>Contact Relation</label><br>
                        <input type="text" placeholder="Contact Relation"  name="contact_relation" value="{{(! empty($detail->emergencyContact->relation)) ? $detail->emergencyContact->relation : old('contact_relation')}}" class="form-control">

                    </div>
                </div>
            </div>

        </div>


    <p style="page-break-after:always;"/>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Education and Experience:</h2>
                <hr>
            </div>
        </div>
        <br>
        <div class="col-md-12" style="margin-top: -20px">
            <h3>Academic History</h3>

            <div class="table-responsive">
                <table class="table table-hover" border='1' cellpadding="2">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name of Qualification</th>
                        <th>Name of Institution</th>
                        <th>From (year)</th>
                        <th>To (year)</th>
                        <th>Academic Percentage</th>
                        {{--<th>Edit</th>--}}
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
                            {{--<td><a href="#" title="Edit" data-toggle="modal" data-target="#editQualificationModal"><i class="far fa-edit"></i></a></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <br>
            <h3>Experience</h3>

            <div class="table-responsive">
                <table class="table table-hover" border="1">
                    <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name of Institution</th>
                        <th>Duties</th>
                        <th>From (year)</th>
                        <th>To (year)</th>
                        {{--<th>Edit</th>--}}
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
                            {{--<td><a href="#" title="Edit" data-toggle="modal" data-target="#editExperienceModal"><i class="far fa-edit"></i></a></td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row portlet light form-outer-part">

                <h3>English Proficiency Tests</h3>
                <form >
                <!-- One "tab" for each step in the form: -->

                    <div class="col-md-12">
                        <div class="{{$errors->has('is_taken')? "has-error":""}}">
                            <p><label> Have you ever Taken a test? </label>
                                <input id="testTaken" class="radiobotton" {{($detail->englishTest->is_taken === 'Yes' || old('is_taken')=='Yes') ? 'checked' : ''}} type="radio" value="Yes" name="is_taken">Yes
                                <input id="testTaken" class="radiobotton" {{($detail->englishTest->is_taken === 'No' || old('is_taken')=='No') ? 'checked' : ''}} type="radio" value="No" name="is_taken">No
                            </p>
                        </div>
                        <div  @if($detail->englishTest->is_taken==='Yes' || old('test_taken')==='Yes') style="display: block" @else style="display: none;" @endif>
                            <div class="test_left">
                                <div class="testDetail">
                                    <label for="Test type">Test Type : </label>
                                    <input style="border:none; padding-top: -2px;" type="text" value="{{$detail->englishTest->test_type}}">
                                </div>
                                <div class="listening">
                                    <label for="listening">Listening : </label>
                                    <input style="border:none; padding-top: -2px;" type="text" value="{{$detail->englishTest->listening}}">
                                </div>
                                <div class="speaking">
                                    <label for="speaking">Speaking : </label>
                                    <input style="border:none; padding-top: -2px;" type="text" value="{{$detail->englishTest->speaking}}">
                                </div>
                                <div class="oveerall">
                                    <label for="overall">Over all : </label>
                                    <input style="border:none; padding-top: -2px;" type="text" value="{{$detail->englishTest->overall}}">
                                </div>
                                <div class="otherClassees">
                                    <label for="otherClasses">Previous Classes : </label>
                                    <input style="border:none; padding-top: -2px;" type="text" value="{{$detail->englishTest->other_test_attain}}">

                                </div>


                            </div>
                            <div class="test_right">
                                <div class="testDate">
                                    <label>Test Date : </label>
                                    <input style="border:none; padding-top: -2px;" type="text" value="{{$detail->englishTest->test_date}}">
                                </div>
                                <div class="writing">
                                    <label for="Writing">Writing : </label>
                                    <input style="border:none; padding-top: -2px;" type="text" value="{{$detail->englishTest->writing}}">
                                </div>
                                <div class="reading">
                                    <label for="reading">Reading : </label>
                                    <input style="border:none; padding-top: -2px;" type="text" value="{{$detail->englishTest->reading}}">
                                </div>
                                <div class="other_test">
                                    <label for="otherTest">Other Test : </label>
                                    <input style="border:none; padding-top: -2px;" type="text" value="{{$detail->englishTest->other_test_attain}}">
                                </div>
                                <div class="studyCenter" @if($detail->englishTest->preparation_classes==='Yes' || old('preparation_classes')=='Yes') style="display: block" @else style="display: none" @endif>
                                    <label for="studyCenter">Study Center : </label>
                                    <input style="border:none; padding-top: -2px;" type="text" value="{{$detail->englishTest->study_center}}">

                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <p style="page-break-after:always;"/>

    <div>
    <h3>Interests and History</h3>
        <hr>
        <form>
            <h3>Interests:</h3>

            <div class="customContainer">
                <div class="row">
                    <div class="left_interest">
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('interested_country')? "has-error":""}}">
                                <label>Interested Country</label> <br>
                                <select name="interested_country" id="country" class="form-control">
                                    <option value="">Select interested country</option>
                                    @if(count($countries))
                                        @foreach($countries as $key=>$country)
                                            <option value="{{$country->id}}" {{($detail->interest->country_id === $country->id) ? 'selected' : ''}} style="border: none;">{{$country->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('interested_university')? "has-error":""}}">
                                <label>Interested University</label> <br>
                                <select name="interested_university" id="university" class="form-control">
                                    <option value="{{(isset($detail->interest->partner_id)) ? $detail->interest->partner_id : ''}}">{{(isset($detail->interest->partner_id)) ? $detail->interest->partner->name : 'Select University'}}</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="right_interest">
                        <div class="col-md-6">
                            <div class="form-group {{$errors->has('Interested_intake')? "has-error":""}}">
                                <label>Interested Intake</label> <br>
                                <select name="Interested_intake" id="intake" class="form-control">
                                    <option value="{{(isset($detail->interest->intake_id)) ? $detail->interest->intake_id : ''}}">{{(isset($detail->interest->intake_id)) ? $detail->interest->intake->name : 'Select Intake'}}</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6" style="margin-top: 40px">
                            <div class="form-group {{$errors->has('interested_course')? "has-error":""}}">
                                <label>Interested Course</label><br>
                                <select name="interested_course" id="course" class="form-control">
                                    <option value="{{(isset($detail->interest->course_id)) ? $detail->interest->course_id : ''}}">{{(isset($detail->interest->course_id)) ? $detail->interest->course->name : 'Select Course'}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <!-- added div -->
            <div style="margin-top: 3cm">

            <h3>History:</h3>
                <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{$errors->has('rejected_before')? "has-error":""}}">
                        <p><label>Have you been rejected before?</label>
                            <label class="radio-inline"><input type="radio" class="radiobotton" id="rejectionBefore" {{($detail->history->rejected_before === 'Yes' || old('rejected_before')=='Yes') ? 'checked' : ''}} value="Yes" name="rejected_before">Yes</label>
                            <label class="radio-inline"><input type="radio" class="radiobotton" id="rejectionBefore" {{($detail->history->rejected_before === 'No' || old('rejected_before')=='No') ? 'checked' : ''}} value="No" name="rejected_before">No</label>
                        </p>

                    </div>
                </div>
                <div class="col-md-6 rejectionReason" style="display: none">
                    <div class="form-group {{$errors->has('rejection_reason')? "has-error":""}}">
                        <label>Rejection Reason</label>
                        <input type="text" name="rejection_reason" value="{{(! empty($detail->history->rejection_reason)) ? $detail->history->rejection_reason : old('rejection_reason')}}" class="form-control">

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group {{$errors->has('how_did_you_hear_about_us')? "has-error":""}}">
                        <p><label>How did you hear about us?</label>
                            <label class="radio-inline"><input type="radio" class="radiobotton" {{($detail->how_did_you_know_about_us === 'Friend' || old('how_did_you_hear_about_us')==='Friend') ? 'checked' : ''}} value="Friend" name="how_did_you_hear_about_us">Friend</label>
                            <label class="radio-inline"><input type="radio" class="radiobotton" {{($detail->how_did_you_know_about_us === 'Facebook' || old('how_did_you_hear_about_us')==='Facebook') ? 'checked' : ''}} value="Facebook" name="how_did_you_hear_about_us">Facebook</label>
                            <label class="radio-inline"><input type="radio" class="radiobotton" {{($detail->how_did_you_know_about_us === 'Website' || old('how_did_you_hear_about_us')==='Website') ? 'checked' : ''}} value="Website" name="how_did_you_hear_about_us">Website</label>
                        </p>

                    </div>
                </div>
            </div>

            </div>
        </form>

    </div>


    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
        </body>
        </html>
