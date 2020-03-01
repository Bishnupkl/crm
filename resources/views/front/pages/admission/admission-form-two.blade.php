@extends('front.layouts.master')
@section('content')
    {{--<div class="banner"><img src="{{url('images/banner/cover.png')}}" class="" alt=""></div>--}}
    <div class="container" id="app">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption" >
                    <h2><b>ADMISSION FORM - STEP TWO</b></h2>
                </div>
            </div>
            <form action="{{route('admission.two')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="{{$detail->token}}" name="token">
                <div class="portlet-body">
                    <!-- ACADEMIC DETAILS STARTS -->
                    <h3 class="block"><b>Academic History</b></h3>
                    <div id="edu">
                        <?php if(old('name_of_qualification') != null) $totalAcademic = count(old('name_of_qualification'));?>
                        @if(isset($totalAcademic) && $totalAcademic>0)
                            @for($i=0;$i<$totalAcademic;$i++)
                            <div class="col-md-12 academic form-box">
                                <div class="col-md-12">
                                    <div class="caption col-md-6">
                                        <i class="fa fa-university"></i>
                                        <span class="caption-subject font-green bold uppercase">Add Qualification</span>
                                    </div>

                                    <div class="actions pull-right">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="removeFunction()">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="appendFunction()">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="form">
                                    <div class="form-group {{$errors->has('name_of_qualification.'.$i)? "has-error":""}} ">
                                        <div class="col-md-6">
                                            <label class="box">Name of Qualification</label>
                                            <select id="qualification" name="name_of_qualification[]" class="form-control" required>
                                                <option value="">Select Qualification</option>
                                                <option value="SEE/SLC" {{(old('name_of_qualification.'.$i)=='SEE/SLC') ? 'selected' : ''}}>SEE/SLC</option>
                                                <option value="A-LEVELS" {{(old('name_of_qualification.'.$i)=='A-LEVELS') ? 'selected' : ''}}>A-Levels</option>
                                                <option value="10+2/PCL" {{(old('name_of_qualification.'.$i)=='10+2/PCL') ? 'selected' : ''}}>10+2/PCL</option>
                                                <option value="Bachelor (3 years)" {{(old('name_of_qualification.'.$i)=='Bachelor (3 years)') ? 'selected' : ''}}>Bachelor's(3 years)</option>
                                                <option value="Bachelor (4 years)" {{(old('name_of_qualification.'.$i)=='Bachelor (4 years)') ? 'selected' : ''}}>Bachelor's (4 years)</option>
                                                <option value="MASTER/ABOVE" {{(old('name_of_qualification.'.$i)=='MASTER/ABOVE') ? 'selected' : ''}}>Master and Above</option>
                                            </select>
                                            @if ($errors->has('name_of_qualification.'.$i))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name_of_qualification.'.$i) }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('name_of_institution.'.$i)? "has-error":""}}">
                                        <div class="col-md-6">
                                            <label class="box">Name of Institution</label>
                                            <input type="text" value="{{old('name_of_institution.'.$i)}}" class="form-control" name="name_of_institution[]" placeholder="Name of Institution" required>
                                            @if ($errors->has('name_of_institution.'.$i))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name_of_institution.'.$i) }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('academic_start_date.'.$i)?'has-error':''}}">
                                        <div class="col-md-4">
                                            <label class="box">From</label>
                                            <input type="date" class="form-control" name="academic_start_date[]" placeholder="From" value="{{old('academic_start_date.'.$i)}}" required>
                                            @if ($errors->has('academic_start_date.'.$i))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('academic_start_date.'.$i) }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('academic_end_date.'.$i)? "has-error":""}} ">
                                        <div class="col-md-4">
                                            <label class="box">To</label>
                                            <input type="date" class="form-control" name="academic_end_date[]" value="{{old('academic_end_date.'.$i)}}" placeholder="To" required>
                                            @if ($errors->has('academic_end_date.'.$i))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('academic_end_date.'.$i) }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group {{$errors->has('academic_percentage.'.$i)? "has-error":""}} ">
                                        <div class="col-md-4">
                                            <label class="box">Academic Percentage</label>
                                            <input type="number" placeholder="Academic Percentage" value="{{old('academic_percentage.'.$i)}}" class="form-control" name="academic_percentage[]" required>
                                            @if ($errors->has('academic_percentage.'.$i))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('academic_percentage.'.$i) }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endfor
                            @else
                                <div class="col-md-12 academic form-box">
                                    <div class="col-md-12">
                                        <div class="caption col-md-6">
                                            <i class="fa fa-university"></i>
                                            <span class="caption-subject font-green bold uppercase">Add Qualification</span>
                                        </div>

                                        <div class="actions pull-right">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="removeFunction()">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="appendFunction()">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form">
                                        <div class="form-group {{$errors->has('name_of_qualification')? "has-error":""}} ">
                                            <div class="col-md-6">
                                                <label class="box">Name of Qualification</label>
                                                <select id="qualification" name="name_of_qualification[]" class="form-control" required>
                                                    <option value="">Select Qualification</option>
                                                    <option value="SEE/SLC" {{(old('name_of_qualification')=='SEE/SLC') ? 'selected' : ''}}>SEE/SLC</option>
                                                    <option value="A-LEVELS" {{(old('name_of_qualification')=='A-LEVELS') ? 'selected' : ''}}>A-Levels</option>
                                                    <option value="10+2/PCL" {{(old('name_of_qualification')=='10+2/PCL') ? 'selected' : ''}}>10+2/PCL</option>
                                                    <option value="Bachelor (3 years)" {{(old('name_of_qualification')=='Bachelor (3 years)') ? 'selected' : ''}}>Bachelor's(3 years)</option>
                                                    <option value="Bachelor (4 years)" {{(old('name_of_qualification')=='Bachelor (4 years)') ? 'selected' : ''}}>Bachelor's (4 years)</option>
                                                    <option value="MASTER/ABOVE" {{(old('name_of_qualification')=='MASTER/ABOVE') ? 'selected' : ''}}>Master and Above</option>
                                                </select>
                                                @if ($errors->has('name_of_qualification'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name_of_qualification') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group {{$errors->has('name_of_institution')? "has-error":""}}">
                                            <div class="col-md-6">
                                                <label class="box">Name of Institution</label>
                                                <input type="text" value="" class="form-control" name="name_of_institution[]" placeholder="Name of Institution" required>
                                                @if ($errors->has('name_of_institution'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name_of_institution') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group {{$errors->has('academic_start_date')?'has-error':''}}">
                                            <div class="col-md-4">
                                                <label class="box">From</label>
                                                <input type="date" class="form-control" name="academic_start_date[]" placeholder="From" value=""required>
                                            </div>
                                        </div>
                                        <div class="form-group {{$errors->has('academic_end_date')? "has-error":""}} ">
                                            <div class="col-md-4">
                                                <label class="box">To</label>
                                                <input type="date" class="form-control" name="academic_end_date[]" value="" placeholder="To" required>
                                            </div>
                                        </div>
                                        <div class="form-group {{$errors->has('academic_percentage')? "has-error":""}} ">
                                            <div class="col-md-4">
                                                <label class="box">Academic Percentage</label>
                                                <input type="number" placeholder="Academic Percentage" value="" class="form-control" name="academic_percentage[]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                    </div>
                    <!-- ACADEMIC DETAILS ENDS -->
                    <h3 class="block"><b>Experience and Training (Optional)</b></h3>
                    <div id="exe">
                        <?php if(old('name_of_employer') != null) $totalExperience = count(old('name_of_employer'));?>
                        @if(isset($totalExperience) && $totalExperience>0)
                            @for($i=0;$i<$totalExperience ;$i++)
                                <div class="col-md-12 experience form-box">
                                    <!-- BEGIN PORTLET-->
                                    <div class="col-md-12">
                                        <div class="caption col-md-6">

                                            <i class="fa fa-briefcase"></i>
                                            <span class="caption-subject font-green bold uppercase">Add Experience</span>
                                        </div>
                                        <div class="actions pull-right">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="removeFunc()">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="appendFunc()">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form">
                                        <div class="form-group {{$errors->has('name_of_employer.'.$i) ? "has-error":""}} ">
                                            <div class="col-md-6">
                                                <label class="box">Name of Employer/Institute</label>
                                                <input type="text" value="{{old('name_of_employer.'.$i)}}" class="form-control" name="name_of_employer[]" placeholder="Name of Employer/Institute">
                                                @if ($errors->has('name_of_employer.'.$i))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name_of_employer.'.$i) }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group {{$errors->has('duties.'.$i) ? "has-error":""}} ">
                                            <div class="col-md-6">
                                                <label class="box">Duties</label>
                                                <input type="text" value="{{old('duties.'.$i)}}" placeholder="Duties" class="form-control" name="duties[]">
                                                @if ($errors->has('duties.'.$i))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('duties.'.$i) }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group {{$errors->has('start_date.'.$i) ? "has-error":""}} ">
                                            <div class="col-md-6">
                                                <label class="box">From</label>
                                                <input type="date" value="{{old('start_date.'.$i)}}" placeholder="From" class="form-control" name="start_date[]">
                                                @if ($errors->has('start_date.'.$i))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('start_date.'.$i) }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group {{$errors->has('end_date.'.$i) ? "has-error":""}} ">
                                            <div class="col-md-6">
                                                <label class="box">To</label>
                                                <input type="date" placeholder="To" value="{{old('end_date.'.$i)}}" class="form-control" name="end_date[]">
                                                @if ($errors->has('end_date.'.$i))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('end_date.'.$i) }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            @else
                                <div class="col-md-12 experience form-box">
                                    <!-- BEGIN PORTLET-->
                                    <div class="col-md-12">
                                        <div class="caption col-md-6">

                                            <i class="fa fa-briefcase"></i>
                                            <span class="caption-subject font-green bold uppercase">Add Experience</span>
                                        </div>
                                        <div class="actions pull-right">
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="removeFunc()">
                                                <i class="fa fa-times"></i>
                                            </a>
                                            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;" onclick="appendFunc()">
                                                <i class="fa fa-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="box">Name of Employer/Institute</label>
                                                <input type="text" value="" class="form-control" name="name_of_employer[]" placeholder="Name of Employer/Institute">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="box">Duties</label>
                                                <input type="text" value="" placeholder="Duties" class="form-control" name="duties[]">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="box">From</label>
                                                <input type="date" value="" placeholder="From" class="form-control" name="start_date[]">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label class="box">To</label>
                                                <input type="date" placeholder="To" value="{{old('end_date[]')}}" class="form-control" name="end_date[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                    </div>
                    <h3 class="block"><b>English Proficiency Tests</b></h3>
                    <div id="test">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{$errors->has('is_taken') ? "has-error":""}}">
                                    <h5>Have you ever Taken a test?
                                    <label onclick="ShowScore();">
                                        <input type="radio" name="is_taken" {{(old('is_taken')=='Yes') ? 'checked' : ''}} value="Yes" required> Yes </label>
                                    <label onclick="HideScore();">
                                        <input type="radio" name="is_taken" {{(old('is_taken')=='No') ? 'checked' : ''}} value="No" required> No </label></h5>
                                    @if ($errors->has('is_taken'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('is_taken') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12 score" @if(old('is_taken')=='Yes') style="display: block;" @else style="display:none;" @endif>
                                <div class="form-group {{$errors->has('test_type') ? "has-error":""}}">
                                    <div class="col-md-6">
                                        <label>Select a Test</label>
                                        <select class="select-margin bs-select form-control bs-select-hidden" name="test_type">
                                            <option value="">Select Test Type</option>
                                            <option value="IELTS" {{(old('test_type')=='IELTS') ? 'selected' : ''}}>IELTS</option>
                                            <option value="GMAT" {{(old('test_type')=='GMAT') ? 'selected' : ''}}>GMAT</option>
                                            <option value="SAT" {{(old('test_type')=='SAT') ? 'selected' : ''}}>SAT</option>
                                            <option value="TOEFL" {{(old('test_type')=='TOEFL') ? 'selected' : ''}}>TOEFL</option>
                                        </select>
                                        @if ($errors->has('test_type'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('test_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{$errors->has('test_date') ? "has-error":""}}">
                                    <div class="col-md-6">
                                        <label for="test_date">Test Taken Date:</label>
                                        <input type="date"  class="form-control" value="{{old('test_date')}}" name="test_date" placeholder="Test Taken date">
                                        @if ($errors->has('test_date'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('test_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{$errors->has('writing') ? "has-error":""}}">
                                    <div class="col-md-6">
                                        <label for="writing">Writing Score:</label>
                                        <input type="number"  class="form-control" value="{{old('writing')}}" name="writing" placeholder="Writing">
                                        @if ($errors->has('writing'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('writing') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{$errors->has('listening') ? "has-error":""}}">
                                    <div class="col-md-6">
                                        <label for="listening">Listening Score:</label>
                                        <input type="number"  class="form-control" value="{{old('listening')}}" name="listening" placeholder="Listening">
                                        @if ($errors->has('listening'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('listening') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{$errors->has('reading') ? "has-error":""}}">
                                    <div class="col-md-6">
                                        <label for="reading">Reading Score:</label>
                                        <input type="number"  class="form-control" value="{{old('reading')}}" name="reading" placeholder="Reading">
                                        @if ($errors->has('reading'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('reading') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{$errors->has('speaking') ? "has-error":""}}">
                                    <div class="col-md-6">
                                        <label for="speaking">Speaking Score:</label>
                                        <input type="number"  class="form-control" value="{{old('speaking')}}" name="speaking" placeholder="Speaking">
                                        @if ($errors->has('speaking'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('speaking') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{$errors->has('overall') ? "has-error":""}}">
                                    <div class="col-md-6">
                                        <label for="overall">Overall Score:</label>
                                        <input type="number"  class="form-control" value="{{old('overall')}}" name="overall" placeholder="Overall">
                                        @if ($errors->has('overall'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('overall') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{$errors->has('scores') ? "has-error":""}}">
                                    <div class="col-md-6">
                                        <label for="scores">Scores:</label>
                                        <input type="number"  class="form-control" value="{{old('scores')}}" name="scores" placeholder="Scores">
                                        @if ($errors->has('scores'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('scores') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{$errors->has('other_test_attain') ? "has-error":""}}">
                                    <div class="col-md-6">
                                        <label for="test_attain">Test Attain:</label>
                                        <input type="text"  class="form-control" value="{{old('other_test_attain')}}" name="other_test_attain" placeholder="Test Attain">
                                        @if ($errors->has('other_test_attain'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('other_test_attain') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{$errors->has('is_any_previous_preparation_class') ? "has-error":""}}">
                                    <div class="col-md-12">
                                        <h5>Any Previous Preparation On Classes?
                                        <label onclick="ShowCenter();">
                                            <input type="radio" name="is_any_previous_preparation_class" value="Yes" {{(old('is_any_previous_preparation_class')=='Yes') ? 'checked' : ''}}> Yes </label>
                                        <label onclick="HideCenter();">
                                            <input type="radio" name="is_any_previous_preparation_class" value="No" {{(old('is_any_previous_preparation_class')=='No') ? 'checked' : ''}}> No </label></h5>
                                        @if ($errors->has('is_any_previous_preparation_class'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('is_any_previous_preparation_class') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{$errors->has('study_center') ? "has-error":""}} center" @if(old('is_any_previous_preparation_class')=='Yes') style="display: block;" @else style="display: none ;margin-bottom:20px;" @endif>
                                    <div class="col-md-6">
                                        <label for="study_center">Name of the Study Center:</label>
                                        <input type="text"  class="form-control" value="{{old('study_center')}}" name="study_center" placeholder="Study Center">
                                        @if ($errors->has('study_center'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('study_center') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-lg pull-right"><i class=""></i>NEXT</button>
                                </div>
                            </div>
                        </div>
                    </div><br>
                </div>
            </form>
        </div>
    </div>

    <script>
        var news = document.getElementsByClassName('new')[0];
        news_height = news.clientHeight;
        var academic_form =document.getElementsByClassName("academic-form")[0];
        news.style.marginTop = (academic_form-news_height)/2 + "px";

        function Help(inp){
            height =inp.clientHeight;
            change = (height - news_height)/2;
            news.style.marginTop = change + "px";
        }
    </script>
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
    </script>
@endsection
<!-- BEGIN CORE PLUGINS -->
