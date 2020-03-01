
<!-- END HEAD -->
@extends('front.layouts.master')
@section('content')
    <div class="banner"><img src="{{url('images/banner/cover.png')}}" class="" alt=""></div>
    <div class="container" id="app">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption" >
                   <h2><b>REGISTER FOR THE EVENT</b></h2>
                </div>
            </div>
            <div class="portlet-body">
                <div class="portlet-body">
                    <form action="{{route('event.register')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('name')? 'has-error':''}}">
                                    <label for="name">Name
                                        <span class="required"> * </span>
                                    </label>
                                    <input type="text" name="name" value="{{old('name')}}" data-required="1" class="form-control" required/>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group{{$errors->has('email')? 'has-error':''}}">
                                    <label for="email">Email
                                        <span class="required"> * </span>
                                    </label>
                                    <input type="email" id="email" value="{{old('email')}}"  name="email" class="form-control" placeholder="Email" required>
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
                                    <label for="name">Mobile
                                        <span class="required"> * </span>
                                    </label>
                                    <input type="number" id="mobile" value="{{old('mobile')}}" name="mobile" class="form-control" placeholder="Mobile" required>
                                    @if ($errors->has('mobile'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('address')? 'has-error':''}}">
                                    <label for="address">Temporary Address
                                        <span class="required"> * </span>
                                    </label>
                                    <input type="text" id="address" value="{{old('address')}}"  name="address" class="form-control" placeholder="Temporary Address" required>
                                    @if ($errors->has('address'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- LATEST QUALIFICATION -->
                        <h2>Latest Qualification : </h2><hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group {{$errors->has('qualification')? 'has-error':''}}">
                                    <label for="qualification">Latest Qualification
                                        <span class="required"> * </span>
                                    </label>
                                    <select id="qualification" name="qualification" class="form-control" required>
                                        <option>Select Qualification</option>
                                        <option value="SEE/SLC" {{(old('qualification')=='SEE/SLC') ? 'selected' : ''}}>SEE/SLC</option>
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
                            <div class="col-md-3">
                                <div class="form-group {{$errors->has('faculty')? 'has-error':''}}">
                                    <label for="faculty">Stream/Faculty
                                        <span class="required"> * </span>
                                    </label>
                                    <input type="text" id="faculty" value="{{old('faculty')}}" name="faculty" class="form-control" placeholder="Stream/Faculty" required>
                                    @if ($errors->has('faculty'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('faculty') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{$errors->has('percentage')? 'has-error':''}}">
                                    <label for="percentage">Percentage or CGPA
                                        <span class="required"> * </span>
                                    </label>
                                    <input type="number" id="percentage" value="{{old('percentage')}}"  name="percentage" class="form-control" placeholder="Percentage or CGPA" required>
                                    @if ($errors->has('percentage'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('percentage') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group {{$errors->has('passed_year')? 'has-error':''}}">
                                    <label for="passed_year">Passed Year
                                        <span class="required"> * </span>
                                    </label>
                                    <input type="number" id="passed_year" value="{{old('passed_year')}}"  aria-required="true" name="passed_year" class="form-control" placeholder="Passed Year" required>
                                    @if ($errors->has('passed_year'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('passed_year') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- ENDING LATEST QUALIFICATION -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{$errors->has('course')? 'has-error':''}}">
                                    <label for="course">Interested Course
                                        <span class="required"> * </span>
                                    </label>
                                    <input type="text" id="course" value="{{old('course')}}"  aria-required="true" name="course" class="form-control" placeholder="Interested Course" required>
                                    @if ($errors->has('course'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('course') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- English Proficiency -->
                        <h2>English Proficiency : </h2><hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('test_taken')? 'has-error':''}}">
                                    <label>Have you ever Taken a test?
                                        <span class="required"> * </span>
                                    </label>
                                    <label onclick="testShow();">
                                        <input type="radio" name="test_taken" {{(old('test_taken')=='Yes') ? 'checked' : ''}} value="Yes" required/> Yes </label>
                                    <label onclick="testHide();">
                                        <input type="radio" name="test_taken" {{(old('test_taken')=='No') ? 'checked' : ''}} value="No" required/> No </label>

                                    @if ($errors->has('test_taken'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('test_taken') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row" id="english_test" @if($errors->has('test') || $errors->has('score')) style="display: block" @else style="display: none" @endif>
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('test')? 'has-error':''}}">
                                    <label for="test">Test</label>
                                    <select id="test" name="test" class="form-control">
                                        <option value="">Select Test</option>
                                        <option value="IELTS" {{(old('test')=='IELTS') ? 'selected' : ''}}>IELTS</option>
                                        <option value="TOFEL" {{(old('test')=='TOFEL') ? 'selected' : ''}}>TOFEL</option>
                                        <option value="SAT" {{(old('test')=='SAT') ? 'selected' : ''}}>SAT</option>
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
                                    <label for="score">Score</label>
                                    <input type="number" aria-required="true" value="{{old('score')}}"  id="score" name="score" class="form-control" placeholder="Score">
                                    @if ($errors->has('score'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('score') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- End English Proficiency -->
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('rejected')? 'has-error':''}}">
                                    <label>Have you ever rejected before?
                                        <span class="required"> * </span>
                                    </label>
                                    <label onclick="rejectedShow()">
                                        <input type="radio" name="rejected" {{(old('rejected')=='Yes') ? 'checked' : ''}} value="Yes" required/> Yes </label>
                                    <label onclick="rejectedHide()">
                                        <input type="radio" name="rejected" {{(old('rejected')=='No') ? 'checked' : ''}} value="No" required/> No </label>

                                    @if ($errors->has('rejected'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('rejected') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6" id="rejection_reasons" @if($errors->has('reasons')) style="display: block" @else style="display: none" @endif>
                                <div class="form-group {{$errors->has('reasons')? 'has-error':''}}">
                                    <label for="reasons">Reason for rejection</label>
                                    <input type="text" aria-required="true" value="{{old('reasons')}}"  id="reasons" name="reasons" class="form-control" placeholder="Reasons for rejection">
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
                                    <button type="submit" class="btn btn-success">Submit For Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for success message -->
    <div id="success" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <p><b>{{session('eventMessage')}}</b></p>
                    <p><b>Token : {{session('token')}}</b></p>
                    <p>Note : Please take this token secure for future use.</p>
                    <h4>Click <a href="{{route('admission','token='.session('token'))}}"><b>here</b></a> for Admission</h4><hr>
                    <a href="{{url('/')}}" class="btn btn-default">Go to Home</a>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal for success message-->
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
@endsection
<!-- BEGIN CORE PLUGINS -->
