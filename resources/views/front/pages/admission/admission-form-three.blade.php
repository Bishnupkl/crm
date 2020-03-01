
<!-- END HEAD -->
@extends('front.layouts.master')
@section('content')
{{--    <div class="banner"><img src="{{url('images/banner/cover.png')}}" class="" alt=""></div>--}}
    <div class="container" id="app">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption" >
                    <h2><b>ADMISSION FORM - STEP THREE</b></h2>
                </div>
            </div>
            <div class="portlet-body">
                <div class="portlet-body">
                    <form action="{{route('admission.three')}}" method="post">
                        {{csrf_field()}}
                          <input type="hidden" name="token" value="{{$detail->token}}">
                        <div class="form-wizard">
                            <div class="form-body">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <h2><b>Interests</b></h2>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 form-group {{$errors->has('interest_country')? "has-error":""}}">
                                                <label>Country
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <select id="country" name="interest_country" class="form-control " required>
                                                    <option value="" selected> Select Interested Country</option>
                                                    @foreach($countries as $key=>$country)
                                                        <option value="{{$country->id}}" {{($country->name!='Australia') ? 'hidden' : 'selected'}}>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('interest_country'))
                                                    <span class="text-danger">{{$errors->first('interest_country')}}</span><br>
                                                @endif
                                                <span class="help-block"> </span>
                                            </div>
                                            <div class="col-md-6 form-group {{$errors->has('interest_intake')? 'has-error':''}}">
                                                <label>Intake
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>

                                                <select id="intake" name="interest_intake" class="form-control " required>
                                                    <option value="" selected hidden> Select Intake</option>
                                                </select>
                                                @if($errors->has('interest_intake'))
                                                    <span class="text-danger">{{$errors->first('interest_intake')}}</span><br>
                                                @endif
                                                <span class="help-block"> </span>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 form-group {{$errors->has('interest_university')? "has-error":""}}">
                                                <label>University
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <select id="university" name="interest_university" class="form-control " required>
                                                    <option value="" selected hidden> Select University</option>
                                                </select>
                                                @if($errors->has('interest_university'))
                                                    <span class="text-danger">{{$errors->first('interest_university')}}</span><br>
                                                @endif
                                                <span class="help-block"> </span>
                                            </div>
                                            <div class="col-md-6 form-group {{$errors->has('interest_course')? "has-error":""}}">
                                                <label>Course
                                                    <span class="required" aria-required="true"> * </span>
                                                </label>
                                                <select id="course" name="interest_course" class = "form-control" required>
                                                    <option value="" selected> Select Course</option>
                                                </select>
                                                @if($errors->has('interest_course'))
                                                    <span class="text-danger">{{$errors->first('interest_course')}}</span><br>
                                                @endif
                                                <span class="help-block"> </span>
                                            </div>
                                        </div>

                                        <div class="portlet-title">
                                            <div class="caption">
                                                <h2><b>History</b></h2>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="portlet-body form">
                                                <div class="row">
                                                    <div class="col-md-6 form-group {{$errors->has('rejected_before')? "has-error":""}}">
                                                        <label>Are you rejected before?
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                        <label class="radio-inline" onclick="rejected();">
                                                            <input type="radio" name="rejected_before" value="Yes" data-required="1" {{(old('rejected_before')=='Yes') ? 'checked' : ''}} required>Yes </label>
                                                        <label class="radio-inline" onclick="notrejected();">
                                                            <input type="radio" name="rejected_before" value="No" data-required="1" {{(old('rejected_before')=='No') ? 'checked' : ''}} required>No </label>
                                                        <span class="help-block"> </span>
                                                        @if($errors->has('rejected_before'))
                                                            <span class="text-danger">{{$errors->first('rejected_before')}}</span><br>
                                                        @endif
                                                    </div>

                                                    <div class="col-md-6 form-group reject {{$errors->has('reasons')? 'has-error':''}}" @if(old('rejected_before')=='Yes') style="display: block" @else style="display: none;" @endif>
                                                        <label>Reasons
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                            <input type="text" class="form-control" value="{{old('reasons')}}" name="reasons" data-required="1" placeholder="Reasons">
                                                            <span class="help-block"> </span>
                                                        @if($errors->has('reasons'))
                                                            <span class="text-danger">{{$errors->first('reasons')}}</span><br>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-12 {{$errors->has('how_did_you_hear_about_as')? 'has-error':''}}">
                                                        <label>How did you hear about us?
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                            <label class="radio-inline col-md-2" onclick="Friend();">
                                                                <input type="radio" name="how_did_you_hear_about_as" value="Friend" {{old('how_did_you_hear_about_as')=='Friend'?'checked':''}} required>Friend</label>
                                                            <label class="radio-inline col-md-2" onclick="FriendHide();">
                                                                <input type="radio" name="how_did_you_hear_about_as" value="Facebook" {{old('how_did_you_hear_about_as')=='Facebook'?'checked':''}} required>Facebook</label>
                                                            <label class="radio-inline col-md-2" onclick="FriendHide();">
                                                                <input type="radio" name="how_did_you_hear_about_as" value="Website" {{old('how_did_you_hear_about_as')=='Website'?'checked':''}} required>Website</label>
                                                            <label class="radio-inline col-md-2" onclick="FriendHide();">
                                                                <input type="radio" name="how_did_you_hear_about_as" value="Newspaper" {{old('how_did_you_hear_about_as')=='Newspaper'?'checked':''}} required>Newspaper</label>
                                                            <label class="radio-inline col-md-2" onclick="FriendHide();">
                                                                <input type="radio" name="how_did_you_hear_about_as" value="Others" {{old('how_did_you_hear_about_as')=='Others'?'checked':''}} required>Others</label>
                                                            @if($errors->has('how_did_you_hear_about_as'))
                                                                <span class="text-danger">{{$errors->first('how_did_you_hear_about_as')}}</span><br>
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group friend {{$errors->has('friend_name')? 'has-error':''}} col-md-4" @if(old('how_did_you_hear_about_as')=='Friend') style="display: block" @else style="display: none;" @endif>
                                                        <label>Friend's Name
                                                            <span class="required" aria-required="true"> * </span>
                                                        </label>
                                                            <input type="text" value="{{old('friend_name')}}" class="form-control" name="friend_name" placeholder="Friend's Name">
                                                        @if($errors->has('friend_name'))
                                                            <span class="text-danger">{{$errors->first('heard')}}</span><br>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row form-group"><hr>
                                                    <input type="submit" value="NEXT" class="btn btn-primary btn-lg pull-right">
                                                </div>

                                            </div>
                                        </div>
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
