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
            </div><br>
            <!-- END PAGE BAR -->
            <!-- END PAGE HEADER-->
            <!-- PAGE CONTENT STARTED -->
            <div class="row form-outer-part">
                <div class="col-md-12 form-inner-part">
                    <form action="{{route('inquiry.store')}}" method="post">
                    {{csrf_field()}}
                    <!-- One "tab" for each step in the form: -->
                        <div class="tab">
                              <div class="col-md-12">
                                <h2>Personal Information: </h2>
                              </div>
                            <div class="col-md-12 customContainer">
                            <div class="">
                            <input type="hidden" name="type" value="back">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{$errors->has('name')? "has-error":""}}">
                                        <label>Name</label>
                                        <input type="text" placeholder="Full Name..." name="name" value="{{old('name')}}" class="form-control">
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
                                        <input type="email" placeholder="Email" name="email" value="{{old('email')}}" class="form-control">
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
                                            <option value="Male" {{(old('gender')==='Male') ? 'selected' : ''}}>Male</option>
                                            <option value="Female" {{(old('gender')==='Female') ? 'selected' : ''}}>Female</option>
                                            <option value="Other" {{(old('gender')==='Other') ? 'selected' : ''}}>Other</option>
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
                                   <input type='text' name="dob" class="form-control" id='datepicker' style='width: 100%;' placeholder="mm/dd/yyyy" value="{{old('dob')}}">
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
                                        <input type="text" placeholder="Contact (Landline)" name="landline" value="{{old('landline')}}" class="form-control">
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
                                        <input type="text" placeholder="Contact (Mobile)" name="mobile" value="{{old('mobile')}}" class="form-control">
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
                                        <input type="text" placeholder="Temporary Address" name="temporary_address" value="{{old('temporary_address')}}" class="form-control">
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
                                        <input type="text" placeholder="Permanent Address" name="permanent_address" value="{{old('permanent_address')}}" class="form-control">
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
                                            <option value="A+ve" {{(old('bloodgroup')==='A+ve') ? 'selected' : ''}}>A+ve</option>
                                            <option value="A-ve" {{(old('bloodgroup')==='A-ve') ? 'selected' : ''}}>A-ve</option>
                                            <option value="B+ve" {{(old('bloodgroup')==='B+ve') ? 'selected' : ''}}>B+ve</option>
                                            <option value="B-ve" {{(old('bloodgroup')==='B-ve') ? 'selected' : ''}}>B-ve</option>
                                            <option value="AB+ve" {{(old('bloodgroup')==='AB+ve') ? 'selected' : ''}}>AB+ve</option>
                                            <option value="AB-ve" {{(old('bloodgroup')==='AB-ve') ? 'selected' : ''}}>AB-ve</option>
                                            <option value="O+ve" {{(old('bloodgroup')==='O+ve') ? 'selected' : ''}}>O+ve</option>
                                            <option value="O-ve" {{(old('bloodgroup')==='O-ve') ? 'selected' : ''}}>O-ve</option>
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
                                            <option value="Nepali" {{(old('nationality')==='Nepali') ? 'selected' : ''}}>Nepali</option>
                                            <option value="Other" {{(old('nationality')==='Other') ? 'selected' : ''}}>Other</option>
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
                                            <option value="Single" {{(old('marital_status')==='Single') ? 'selected' : ''}}>Single</option>
                                            <option value="Married" {{(old('marital_status')==='Married') ? 'selected' : ''}}>Married</option>
                                        </select>
                                        @if ($errors->has('marital_status'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('marital_status') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 marriageDate" @if(old('marital_status')=='Married') style="display: block" @else style="display: none" @endif>
                                    <div class="form-group {{$errors->has('marriage_date')? "has-error":""}}">
                                        <label>Marriage Date</label>
                                        <input type="date" name="marriage_date" value="{{old('marriage_date')}}" class="form-control">
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
                            <div class="row customContainer">
                              <div class="col-md-6">
                                  <div class="form-group {{$errors->has('contact_name')? "has-error":""}}">
                                      <label>Contact Name</label>
                                      <input type="text" placeholder="Contact Name" name="contact_name" value="{{old('contact_name')}}" class="form-control">
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
                                      <input type="text" placeholder="Contact Relation"  name="contact_relation" value="{{old('contact_relation')}}" class="form-control">
                                      @if ($errors->has('contact_relation'))
                                          <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('contact_relation') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                            </div>
                            <!--  -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group {{$errors->has('contact_number')? "has-error":""}}">
                                        <label>Contact Number</label>
                                        <input type="text" placeholder="Contact Number" name="contact_number" value="{{old('contact_number')}}" class="form-control">
                                        @if ($errors->has('contact_number'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('contact_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button class="btn btn-default btn-md">Save</button>
                                    <button type="button" class="btn btn-default btn-md" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" class="btn btn-default btn-md" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>
                          </div>
                        </div><!--  -->
                        </div>
                        <br>
                        <div class="tab">
                          <div class="row">
                            <div class="col-md-6 col-sm-12">
                              <h2>Academic History: </h2>
                            </div>

                            <div class="col-md-6 col-sm-12">
                                <div class="form-group pull-right">
                                <!-- <div class="form-group"> -->
                                    <button class="btn btn-default" id="add-more">
                                        <i class="fa fa-plus"></i>
                                        <span class="caption-subject add-color uppercase">Add New Qualification</span>
                                    </button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                          </div>
                            <!-- <div class="col-md-12">

                            </div> -->
                            <div class="row">
                              <div class="col-md-12 " id="academic">
                                <div class="">
                                  <!-- FOR EACH NEW FORM GENERATED, PUT A 'hr' ON ITS BEGINNING ##yet to be implemented##-->
                                  <?php if(old('name_of_qualification') != null) $totalAcademic = count(old('name_of_qualification')); ?>
                                  @if(isset($totalAcademic) && $totalAcademic>0)
                                      @for($i=0;$i<$totalAcademic;$i++)
                                          <div class="academic" id="academic{{$i}}">
                                              @if($i>0)
                                                  <div class="col-md-12">
                                                      <div class="actions pull-right">
                                                         <button class="btn btn-circle btn-danger btn_remove" id="{{$i}}">
                                                                <i class="fa fa-times"></i>
                                                         </button>
                                                      </div>
                                                  </div>
                                              @endif
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group {{$errors->has('name_of_qualification.'.$i)? "has-error":""}}">
                                                          <label>Name of Qualification</label>
                                                          <select id="qualification" name="name_of_qualification[]" class="form-control">
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
                                                  <div class="col-md-6">
                                                      <div class="form-group {{$errors->has('name_of_institution.'.$i)? "has-error":""}}">
                                                          <label>Name of Institution</label>
                                                          <input type="text" value="{{old('name_of_institution.'.$i)}}" class="form-control" name="name_of_institution[]" placeholder="Name of Institution">
                                                          @if ($errors->has('name_of_institution.'.$i))
                                                              <span class="help-block">
                                                              <strong>{{ $errors->first('name_of_institution.'.$i) }}</strong>
                                                          </span>
                                                          @endif
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-4">
                                                      <div class="form-group {{$errors->has('academic_start_date.'.$i)?'has-error':''}}">
                                                          <label class="box">From (Year)</label>
                                                          <input type="number" class="form-control" name="academic_start_date[]" placeholder="From" value="{{old('academic_start_date.'.$i)}}">
                                                          @if ($errors->has('academic_start_date.'.$i))
                                                              <span class="help-block">
                                                              <strong>{{ $errors->first('academic_start_date.'.$i) }}</strong>
                                                          </span>
                                                          @endif
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="form-group {{$errors->has('academic_end_date.'.$i)? "has-error":""}} ">
                                                          <label class="box">To (Year)</label>
                                                          <input type="number" class="form-control" name="academic_end_date[]" value="{{old('academic_end_date.'.$i)}}" placeholder="To">
                                                          @if ($errors->has('academic_end_date.'.$i))
                                                              <span class="help-block">
                                                              <strong>{{ $errors->first('academic_end_date.'.$i) }}</strong>
                                                          </span>
                                                          @endif
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="form-group {{$errors->has('academic_percentage.'.$i)? "has-error":""}} ">
                                                          <label class="box">Academic Percentage</label>
                                                          <input type="text" placeholder="Academic Percentage" value="{{old('academic_percentage.'.$i)}}" class="form-control" name="academic_percentage[]">
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
                                          <div class="academic" id="academic1">
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Name of Qualification</label>
                                                          <select id="qualification" name="name_of_qualification[]" class="form-control">
                                                              <option value="">Select Qualification</option>
                                                              <option value="SEE/SLC">SEE/SLC</option>
                                                              <option value="A-LEVELS">A-Levels</option>
                                                              <option value="10+2/PCL">10+2/PCL</option>
                                                              <option value="Bachelor (3 years)">Bachelor's(3 years)</option>
                                                              <option value="Bachelor (4 years)">Bachelor's (4 years)</option>
                                                              <option value="MASTER/ABOVE">Master and Above</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Name of Institution</label>
                                                          <input type="text" class="form-control" name="name_of_institution[]" placeholder="Name of Institution">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-4">
                                                      <div class="form-group">
                                                          <label class="box">From (Year)</label>
                                                          <input type="number" class="form-control" name="academic_start_date[]" placeholder="From">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="form-group">
                                                          <label class="box">To (Year)</label>
                                                          <input type="number" class="form-control" name="academic_end_date[]" placeholder="To">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-4">
                                                      <div class="form-group">
                                                          <label class="box">Academic Percentage</label>
                                                          <input type="text" placeholder="Academic Percentage" class="form-control" name="academic_percentage[]">
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      @endif
                                    </div>
                              </div>
                            </div>

                            <hr class="customHr">
                            <div class="row">
                              <div class="col-md-6 col-sm-12">
                                <h2>Experiences: </h2>
                              </div>
                              <div class="col-md-6 col-sm-12">
                                  <div class="col-md-12">
                                      <div class="form-group pull-right">
                                          <button class="btn btn-default" id="add-experience">
                                              <i class="fa fa-plus"></i>
                                              <span class="caption-subject add-color uppercase">Add New Experience</span>
                                          </button>
                                      </div>
                                      <div class="clearfix"></div>
                                  </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12 " id="experiences">
                                <div class="">
                                  <?php if(old('name_of_employer') != null) $totalAcademic = count(old('name_of_employer')); ?>
                                  @if(isset($totalAcademic) && $totalAcademic>0)
                                      @for($i=0;$i<$totalAcademic;$i++)
                                      <div class="academic" id="experiences{{$i}}">
                                          @if($i>0)
                                              <div class="col-md-12">
                                                  <div class="actions pull-right">
                                                      <button class="btn btn-circle btn-danger remove_experiences" id="{{$i}}">
                                                          <i class="fa fa-times"></i>
                                                      </button>
                                                  </div>
                                              </div>
                                          @endif
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group {{$errors->has('name_of_employer.'.$i)? "has-error":""}}">
                                                      <label>Name of Institution</label>
                                                      <input type="text" name="name_of_employer[]" value="{{old('name_of_employer.'.$i)}}"  class="form-control" placeholder="Name of Employer">
                                                      @if ($errors->has('name_of_employer.'.$i))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('name_of_employer.'.$i) }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group {{$errors->has('duties.'.$i)? "has-error":""}}">
                                                      <label>Duties</label>
                                                      <input type="text" value="{{old('duties.'.$i)}}" class="form-control" name="duties[]" placeholder="Name of Duties">
                                                      @if ($errors->has('duties.'.$i))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('duties.'.$i) }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group {{$errors->has('start_year.'.$i)?'has-error':''}}">
                                                      <label class="box">From (Year)</label>
                                                      <input type="number" class="form-control" name="start_year[]" placeholder="From" value="{{old('start_year.'.$i)}}">
                                                      @if ($errors->has('start_year.'.$i))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('start_year.'.$i) }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>
                                              <div class="col-md-6">
                                                  <div class="form-group {{$errors->has('end_year.'.$i)? "has-error":""}} ">
                                                      <label class="box">To (Year)</label>
                                                      <input type="number" class="form-control" name="end_year[]" value="{{old('end_year.'.$i)}}" placeholder="To">
                                                      @if ($errors->has('end_year.'.$i))
                                                          <span class="help-block">
                                                              <strong>{{ $errors->first('end_year.'.$i) }}</strong>
                                                          </span>
                                                      @endif
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      @endfor
                                      @else
                                          <div class="academic" id="experiences1">
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Name of Institution</label>
                                                          <input type="text" name="name_of_employer[]" class="form-control" placeholder="Name of Employer">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label>Duties</label>
                                                          <input type="text" class="form-control" name="duties[]" placeholder="Name of Duties">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label class="box">From (Year)</label>
                                                          <input type="number" class="form-control" name="start_year[]" placeholder="From">
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="form-group">
                                                          <label class="box">To (Year)</label>
                                                          <input type="number" class="form-control" name="end_year[]" placeholder="To">
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      @endif
                                    </div>
                              </div>
                            </div>

                            <hr class="customHr">
                            <!-- ENGLISH PROFICIENCY TESTS STARTED -->
                            <div class="row">
                              <div class="col-md-12">
                                <h2>English Proficiency Tests</h2>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12 ">
                                  <div class="">
                                  <div class="form-group {{$errors->has('is_taken')? "has-error":""}}">
                                      <p><label> Have you ever Taken a test? </label>
                                      <label class="radio-inline"><input id="testTaken" {{(old('is_taken')=='Yes') ? 'checked' : ''}} type="radio" value="Yes" name="is_taken">Yes</label>
                                      <label class="radio-inline"><input id="testTaken" {{(old('is_taken')=='No') ? 'checked' : ''}} type="radio" value="No" name="is_taken">No</label>
                                      </p>
                                      @if ($errors->has('is_taken'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('is_taken') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                                </div>

                                  <div class="testDetail" id="testDetail" @if(old('test_taken')==='Yes') style="display: block" @else style="display: none;" @endif>
                                      <div class="row">
                                          <div class="col-md-6">
                                              <div class="form-group  {{$errors->has('test_type')? "has-error":""}}">
                                                  <label>Test Type</label>
                                                  <select name="test_type" class="form-control">
                                                      <option value="">Select test type</option>
                                                      <option value="IELTS" {{(old('test_type')==='IELTS') ? 'selected' : ''}}>IELTS</option>
                                                      <option value="GMAT" {{(old('test_type')==='GMAT') ? 'selected' : ''}}>GMAT</option>
                                                      <option value="SAT" {{(old('test_type')==='SAT') ? 'selected' : ''}}>SAT</option>
                                                      <option value="TOEFL" {{(old('test_type')==='TOEFL') ? 'selected' : ''}}>TOEFL</option>
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
                                                  <input placeholder="DD/MM/YYYY" value ="{{old('test_date')}}" class="form-control" name="test_date">
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
                                                  <input placeholder="Listening Score" value ="{{old('listening')}}" class="form-control" name="listening">
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
                                                  <input placeholder="Writing Score" value ="{{old('writing')}}" class="form-control" name="writing">
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
                                                  <input placeholder="Speaking Score" value ="{{old('speaking')}}" class="form-control" name="speaking">
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
                                                  <input placeholder="Reading Score" value ="{{old('reading')}}" class="form-control" name="reading">
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
                                                  <input placeholder="Overall Score" value ="{{old('overall')}}" class="form-control" name="overall">
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
                                                  <input type="text" placeholder="Test attain" class="form-control" name="other_test_attain">
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
                                                      <label class="radio-inline"><input type="radio" {{(old('preparation_classes')=='Yes') ? 'checked' : ''}} value="Yes" id="classes" name="preparation_classes">Yes</label>
                                                      <label class="radio-inline"><input type="radio" {{(old('preparation_classes')=='No') ? 'checked' : ''}} value="No" id="classes" name="preparation_classes">No</label>
                                                  </p>
                                                  @if ($errors->has('preparation_classes'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('preparation_classes') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>
                                          <div class="col-md-6 studyCenter" @if(old('preparation_classes')=='Yes') style="display: block" @else style="display: none" @endif>
                                              <div class="form-group {{$errors->has('study_center')? "has-error":""}}">
                                                  <label>Study Center</label>
                                                  <input type="text" placeholder="Name of the Study Center" value="{{old('study_center')}}" class="form-control" name="study_center">
                                                  @if ($errors->has('study_center'))
                                                      <span class="help-block">
                                                          <strong>{{ $errors->first('study_center') }}</strong>
                                                      </span>
                                                  @endif
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </div>
                            </div>

                            <div class="row">
                              <div class="col-md-12">
                                <div style="overflow:auto;">
                                  <div style="float:right;">
                                    <button type="button" class="btn btn-default btn-md" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" class="btn btn-default btn-md" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <!--  end form decoration-->

                        <div class="tab">
                          <div class="row">
                            <div class="col-md-12">
                              <h2>Interests:</h2>
                            </div>
                          </div>

                          <div class="row customContainer">
                            <div class="col-md-12 ">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group {{$errors->has('interested_country')? "has-error":""}}">
                                      <label>Interested Country</label>
                                      <select name="interested_country" id="country" class="form-control">
                                        <option value="">Select interested country</option>
                                        @if(count($countries))
                                        @foreach($countries as $key=>$country)
                                        <option value="{{$country->id}}">{{$country->name}}</option>
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
                                        <option value="">Select Intake</option>
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
                                        <option value="">Select University</option>
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
                                        <option value="">Select Course</option>
                                      </select>
                                      @if ($errors->has('interested_course'))
                                      <span class="help-block">
                                        <strong>{{ $errors->first('interested_course') }}</strong>
                                      </span>
                                      @endif
                                    </div>
                                  </div>
                                </div>

                            </div>
                          </div>

                          <hr class="customHr">
                            <div class="row">
                                  <div class="col-md-12">
                                    <h2>History:</h2>
                                  </div>
                                </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{$errors->has('rejected_before')? "has-error":""}}">
                                        <p><label>Have you been rejected before?</label>
                                        <label class="radio-inline"><input type="radio" id="rejectionBefore" {{(old('rejected_before')=='Yes') ? 'checked' : ''}} value="Yes" name="rejected_before">Yes</label>
                                        <label class="radio-inline"><input type="radio" id="rejectionBefore" {{(old('rejected_before')=='No') ? 'checked' : ''}} value="No" name="rejected_before">No</label>
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
                                        <input type="text" name="rejection_reason" class="form-control">
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
                                            <label class="radio-inline"><input type="radio" {{(old('how_did_you_hear_about_us')==='Friend') ? 'checked' : ''}} value="Friend" name="how_did_you_hear_about_us">Friend</label>
                                            <label class="radio-inline"><input type="radio" {{(old('how_did_you_hear_about_us')==='Facebook') ? 'checked' : ''}} value="Facebook" name="how_did_you_hear_about_us">Facebook</label>
                                            <label class="radio-inline"><input type="radio" {{(old('how_did_you_hear_about_us')==='Website') ? 'checked' : ''}} value="Website" name="how_did_you_hear_about_us">Website</label>
                                        </p>
                                        @if ($errors->has('how_did_you_hear_about_us'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('how_did_you_hear_about_us') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                            <div style="overflow:auto;">
                                <div style="float:right;">
                                    <button type="button" class="btn btn-default btn-md" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button class="btn btn-default btn-md">Submit</button>
                                    </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- Circles which indicates the steps of the form: -->
                        <div style="text-align:center;margin-top:40px;">
                            <span class="step"></span>
                            <span class="step"></span>
                            <span class="step"></span>
                        </div>
                    </form>
                </div>
            </div>
            <!-- PAGE CONTENT ENDED -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    <script type="text/javascript" src="{{URL::to('js/add-inquiry.js')}}"></script>
@endsection
