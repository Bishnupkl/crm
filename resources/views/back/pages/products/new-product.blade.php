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
                        <a href="{{URL::to('/dashboard')}}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Products</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>New Products</span>
                    </li>
                </ul>
            </div><br>
            <!-- END PAGE BAR -->
            <!-- END PAGE HEADER-->
            <div class="row form-outer-part">
                    <div class="col-md-12 form-inner-part">
                      <form class="" action="{{route('products.store')}}" method="post">
                          {{csrf_field()}}
                          <div class="">
                              <h2>Products Basic Detail:</h2>
                          </div><br><br>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Course Name</label>
                                      <select class="form-control select2me" name="course_name" id="courseName">
                                          <option value=" ">Select Course Name</option>
                                          @if(count($courses)>0)
                                              @foreach($courses as $key=>$course)
                                                  <option value="{{$course->id}}" {{($course->id === old('course_name')) ? 'selected' : ''}}>{{$course->name}}</option>
                                              @endforeach
                                          @endif
                                      </select>
                                      @if ($errors->has('course_name'))
                                          <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('course_name') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Partner Name</label>
                                      <select class="form-control " name="partner_name" id="partnerName">
                                          <option value="">Select Partner Name</option>
                                      </select>
                                      @if ($errors->has('partner_name'))
                                          <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('partner_name') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                          </div><br><br>

                          <hr class="customHr">

                          <div class="">
                              <h2>Product Fee Details:</h2>
                          </div><br><br>
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Fee Type</label>
                                      <input type="text" class="form-control" value="{{old('fee_type')}}" name="fee_type" placeholder="Fee Type">
                                      @if ($errors->has('fee_type'))
                                          <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('fee_type') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Fee Amount</label>
                                      <input type="text" class="form-control" value="{{old('fee_amount')}}" name="fee_amount" placeholder="Fee Amount">
                                      @if ($errors->has('fee_amount'))
                                          <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('fee_amount') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Fee Term</label>
                                      <select class="form-control" name="fee_term" id="feeTerm">
                                          <option value="">Select Fee Term</option>
                                          <option value="Full Fee" {{(old('fee_term') === 'Full Fee') ? 'selected' : ''}}> Full Fee </option>
                                          <option value="Per Year" {{(old('fee_term') === 'Per Year') ? 'selected' : ''}}> Per Year </option>
                                          <option value="Per Month" {{(old('fee_term') === 'Per Month') ? 'selected' : ''}}> Per Month </option>
                                          <option value="Per Term" {{(old('fee_term') === 'Per Term') ? 'selected' : ''}}> Per Term </option>
                                          <option value="Per Trimester" {{(old('fee_term') === 'Per Trimester') ? 'selected' : ''}}> Per Trimester </option>
                                          <option value="Per Semester" {{(old('fee_term') === 'Per Semester') ? 'selected' : ''}}> Per Semester</option>
                                          <option value="Per Week" {{(old('fee_term') === 'Per Week') ? 'selected' : ''}}> Per Week </option>
                                      </select>
                                      @if ($errors->has('fee_term'))
                                          <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('fee_term') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                          </div><br><br>

                          <hr class="customHr">

                          <div class="">
                              <h2>Product Information:</h2>
                          </div><br><br>
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Product Duration</label>
                                      <input type="number" class="form-control" value="{{old('duration')}}" name="duration" placeholder="Duration">
                                      @if ($errors->has('duration'))
                                          <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('duration') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label>Intake</label>
                                      <select class="form-control" name="intake">
                                          <option value="">Select Intake</option>
                                          @if(count($intakes)>0)
                                              @foreach($intakes as $key=>$intake)
                                                  <option value="{{$intake->id}}" {{($intake->id === old('intake')) ? 'selected' : ''}}>{{$intake->name}}</option>
                                              @endforeach
                                          @endif
                                      </select>
                                      @if ($errors->has('intake'))
                                          <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('intake') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <label>Product Details</label>
                                      <textarea id="description" name="description" placeholder="Description">{{old('description')}}</textarea>
                                      @if ($errors->has('description'))
                                          <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                          </span>
                                      @endif
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <button class="btn btn-primary btn-md pull-right">Save</button>
                                  </div>
                              </div>
                          </div>
                      </form>
                    </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <script>
        CKEDITOR.replace( 'description' );
    </script>
    <script>
        //showing partners name according to the course selected
        $(document).ready(function () {
            $('#courseName').change(function () {
                if($(this).val() !="")
                {
                    var csrf="{{csrf_token()}}";
                    $.ajax({
                        type: 'post',
                        url: '/select-course',
                        data: {
                            courseId:$(this).val(),
                            _token:csrf
                        },
                        success:function(data){
                            console.log(data);
                            $('#partnerName').html(data);
                        }
                    })
                }else{
                    $('#partnerName').html('<option value="">Please choose a partner</option>');
                }
            });
        });
    </script>
@endsection
