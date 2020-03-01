
<!-- END HEAD -->
@extends('front.layouts.master')
@section('content')
{{--    <div class="banner"><img src="{{url('images/banner/cover.png')}}" class="" alt=""></div>--}}
    <div class="container" id="app" style="padding-top: 30px;">
        <div class="portlet light bordered" style="border:1px solid #ccc;border-radius:8px;padding: 20px;margin-top:10px;">
            <div class="portlet-title">
                <div class="caption" >
                    <h2 style="color: #fff;"><b>ADMISSION FORM - STEP ONE</b></h2>
                </div>
            </div>
            <div class="portlet-body">
                <div class="portlet-body">
                    <form action="{{route('admission')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="token" value="{{$detail->token}}">
                        <div class="form-wizard">
                            <div class="form-body">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <h2>Personal Info</h2><hr>
                                    </div>
                                </div>
                                
                                <div class="alert alert-danger display-none" style="display: none;">
                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below.
                                </div>
                                <div class="alert alert-success display-none" style="display: none;">
                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful!
                                </div>
                                <div class="row">
                                    <div class="ml-1"></div>
                                    <div class="personal-detail col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('name')? "has-error":""}}">
                                                    <label class="control-label">Full Name
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="text" value="{{$detail->name}}" class="form-control" readonly>
                                                    @if($errors->has('name'))
                                                        <span class="text-danger">{{$errors->first('name')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('dob')? 'has-error':''}}">
                                                    <label class="control-label">Date of Birth
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="date" value="{{old('dob')}}" placeholder="DD/MM/YYYY" maxlength="10" class="form-control" name="dob" required>
                                                    @if($errors->has('dob'))
                                                        <span class="text-danger">{{$errors->first('dob')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('nationality')? 'has-error':''}}">
                                                    <label class="control-label">Nationality
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="text" value="{{old('nationality')}}" class="form-control" data-required="1" name="nationality" required>
                                                    @if($errors->has('nationality'))
                                                        <span class="text-danger">{{$errors->first('nationality')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('bloodgroup')? 'has-error':''}}">
                                                    <label class="control-label">Blood Group
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <select class="form-control" name="bloodgroup" required>
                                                        <option value="">Select Blood Group</option>
                                                        <option value="A+" {{(old('bloodgroup')=='A+') ? 'selected' : ''}}>A+</option>
                                                        <option value="A-" {{(old('bloodgroup')=='A-') ? 'selected' : ''}}>A-</option>
                                                        <option value="B+" {{(old('bloodgroup')=='B+') ? 'selected' : ''}}>B+</option>
                                                        <option value="B-" {{(old('bloodgroup')=='B-') ? 'selected' : ''}}>B-</option>
                                                        <option value="AB+" {{(old('bloodgroup')=='AB+') ? 'selected' : ''}}>AB+</option>
                                                        <option value="AB-" {{(old('bloodgroup')=='AB-') ? 'selected' : ''}}>AB-</option>
                                                        <option value="O+" {{(old('bloodgroup')=='O+') ? 'selected' : ''}}>O+</option>
                                                        <option value="O-" {{(old('bloodgroup')=='O-') ? 'selected' : ''}}>O-</option>
                                                    </select>
                                                    @if($errors->has('bloodgroup'))
                                                        <span class="text-danger">{{$errors->first('bloodgroup')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('permanent_address')? 'has-error':''}}">
                                                    <label class="control-label">Permanent Address
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="text" value="{{old('permanent_address')}}" class="form-control" name="permanent_address" required>
                                                    @if($errors->has('permanent_address'))
                                                        <span class="text-danger">{{$errors->first('permanent_address')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('temporary_address')? 'has-error':''}}">
                                                    <label class="control-label">Temporary Address
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="text" value="{{$detail->temporary_address}}" class="form-control" readonly>
                                                    @if($errors->has('temporary_address'))
                                                        <span class="text-danger">{{$errors->first('temporary_address')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('landline')? 'has-error':''}}">
                                                    <label class="control-label">Landline

                                                    </label>
                                                    <input type="number" value="{{old('landline')}}" class="form-control" name="landline">
                                                    @if($errors->has('landline'))
                                                        <span class="text-danger">{{$errors->first('landline')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('mobile')? 'has-error':''}}">
                                                    <label class="control-label">Mobile Number
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="number" value="{{$detail->mobile}}" class="form-control" readonly>
                                                    @if($errors->has('mobile'))
                                                        <span class="text-danger">{{$errors->first('mobile')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('email')? 'has-error':''}}">
                                                    <label class="control-label">Email
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="text" value="{{$detail->email}}" class="form-control" readonly>
                                                    @if($errors->has('email'))
                                                        <span class="text-danger">{{$errors->first('email')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('thumbnail')? 'has-error':''}}">
                                                    <label class="control-label">Upload Image
                                                        <span class="required" aria-required="true"> (Optional) </span>
                                                    </label><br>
                                                    <span class="btn green btn-block fileinput-button" onclick="Upload(0);">
                                                    <i class="fa fa-plus"></i>
                                                    <span> Add files... </span>
                                                    <input type="file" name="thumbnail" onchange="readURL(this);" id="imgInp" class="blah" multiple="" style="display: none;">
                                                    </span>
                                                    <div class="image">
                                                        <img id="blah" class="1" style="display:none;" src="#" width="auto" height="100px" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('gender')? 'has-error':''}}">
                                                    <label class="control-label">Gender
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <select class="form-control" name="gender" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male" {{(old('gender')=='Male') ? 'selected' : ''}}>Male</option>
                                                        <option value="Female" {{(old('gender')=='Female') ? 'selected' : ''}}>Female</option>
                                                        <option value="Other" {{(old('gender')=='Other') ? 'selected' : ''}}>Other</option>
                                                    </select>
                                                    @if($errors->has('gender'))
                                                        <span class="text-danger">{{$errors->first('gender')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('marital_status')? 'has-error':''}}">
                                                    <label>Marital Status
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <label onclick="Show();">
                                                        <input type="radio" name="marital_status" {{(old('marital_status')=='Married') ? 'checked' : ''}} value="Married" required/> Married </label>
                                                    <label onclick="Hide();">
                                                        <input type="radio" name="marital_status" {{(old('marital_status')=='Single') ? 'checked' : ''}} value="Single" required/> Single </label>

                                                    @if ($errors->has('marital_status'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('marital_status') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div id="married_date" class="col-md-6" @if(old('marital_status') == 'Married') style="display: block;" @else style="display: none;" @endif>
                                                <div class="form-group col-md-11 {{$errors->has('marriage_date')? 'has-error':''}}" >
                                                    <label class="control-label">Married Date
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="date" placeholder="MM/DD/YYYY" maxlength="10" class="form-control" name="marriage_date">
                                                    @if($errors->has('marriage_date'))
                                                        <span class="text-danger">{{$errors->first('marriage_date')}}</span><br>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div><br><hr>
                                    <div class="Emergency Contact col-md-12">
                                        <h2 class="block">Emergency Contact</h2><hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('contact_name')? 'has-error':''}}">
                                                    <label class="control-label">Contact Name
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="text" value="{{old('contact_name')}}" class="form-control" name="contact_name" required>

                                                    @if($errors->has('contact_name'))
                                                        <span class="text-danger">{{$errors->first('contact_name')}}</span><br>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('contact_contact')? 'has-error':''}}">
                                                    <label class="control-label">Contact Number
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="number" value="{{old('contact_contact')}}" class="form-control" name="contact_contact" required>
                                                    @if($errors->has('contact_contact'))
                                                        <span class="text-danger">{{$errors->first('contact_contact')}}</span><br>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group col-md-11 {{$errors->has('contact_relation')? 'has-error':''}} ">
                                                    <label class="control-label">Relation
                                                        <span class="required" aria-required="true"> * </span>
                                                    </label>
                                                    <input type="text" value="{{old('contact_relation')}}" class="form-control" name="contact_relation" required>
                                                    @if($errors->has('contact_relation'))
                                                        <span class="text-danger">{{$errors->first('contact_relation')}}</span><br>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-md-12">
                                            <button class="btn green submit btn-lg pull-right"><i class="fa fa-check"></i> Next</button>
                                        </div>
                                    </div><br><hr>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function Show(){
            var x = document.getElementById("married_date");
            x.style.display = "block";
            console.log(x.style.display);
        }
        function Hide(){
            var x = document.getElementById("married_date");
            x.style.display = "none";
            console.log(x.style.display);
        }
    </script>
    <script>
        var input = document.querySelectorAll('input[type=file]');
        function Upload(num){
            input[num].click();
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                a=input.className;
                b = document.getElementById(a);
                reader.onload = function(e) {
                    b.style.display = 'block';
                    $('#'+a).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
<!-- BEGIN CORE PLUGINS -->
