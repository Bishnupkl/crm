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
                        <span>Edit Product</span>
                    </li>
                </ul>
            </div><br><br><br><br>
            <!-- END PAGE BAR -->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="panel panel-body panel-primary col-md-10 col-md-offset-1">
                    <div align="center">
                        <h4><b>Edit Product</b></h4>
                    </div>
                    <form action="{{url('products')}}/{{$products->id}}" method="post">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="ribbon">
                            <b>Product Detail</b>
                        </div><br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Course Name</label>
                                    <select class="form-control select2me" id="courseName" name="course_name">
                                        <option>Select Course Name</option>
                                        @if(count($courses)>0)
                                            @foreach($courses as $key=>$course)
                                                <option value="{{$course->id}}" {{($course->id === old('course_name') || $course->id===$products->course_id) ? 'selected' : ''}}>{{$course->name}}</option>
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
                                    <select class="form-control" name="partner_name" id="partnerName">
                                        <option>Select Partner Name</option>
                                        @if(count($partners)>0)
                                            @foreach($partners as $key=>$partner)
                                                @if(isset($partner->coursePartner) && in_array($products->course_id,array_column($partner->coursePartner->toArray(),'course_id')))
                                                    <option value="{{$partner->id}}" {{($partner->id === old('course_name') || $partner->id === $products->partner_id) ? 'selected' : ''}}>{{$partner->name}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    @if ($errors->has('partner_name'))
                                        <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('partner_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div><br><br>
                        <div class="ribbon">
                            <b>Product Fee Details</b>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="form-group pull-right">
                                        <!-- Trigger the modal with a button -->
                                        <button class="btn btn-default" id="add-more" data-toggle="modal" data-target="#addNewProductFeeModal">
                                            <i class="fa fa-plus"></i>
                                            <span class="caption-subject font-green uppercase">Add New Product Fee Detail</span>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-hover" border='1'>
                                    <thead>
                                    <tr>
                                        <th>S.N.</th>
                                        <th>Fee Type</th>
                                        <th>Fee Amount</th>
                                        <th>Fee Term</th>
                                        <th>Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products->productFee as $key=>$productFees)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$productFees->fee_type}}</td>
                                            <td>{{$productFees->fee_amount}}</td>
                                            <td>{{$productFees->fee_term}}</td>
                                            <td><button href="#" value="{{$productFees}}" class="editProudctFee" id="editProudctFee" title="Edit" data-toggle="modal" data-target="#editProductFeeModal"><i class="far fa-edit"></i></button></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div><br><br>
                        <div class="ribbon">
                            <b>Product Information</b>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product Duration</label>
                                    <input type="number" class="form-control" value="{{$products->duration}}" name="duration" placeholder="Duration">
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
                                                <option value="{{$intake->id}}" {{($products->intake->id===$intake->id) ? 'selected' : ''}}>{{$intake->name}}</option>
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
                                    <label>Product Description</label>
                                    <textarea id="description" name="description" placeholder="Description">{{$products->description}}</textarea>
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
                                    <button class="btn btn-primary btn-lg">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Add ProductFee Modal -->
                <div id="addNewProductFeeModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="portlet box blue form-outer-part">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-plus"></i> <b>Add new Product Fee Detail</b> </div>
                            </div>
                            <div class="portlet-body form-inner-part">
                                <!-- Modal body -->
                                <!-- form starts here -->
                                <form id="addNewProductFeeDetail" method="post">
                                    <input type="hidden" id="productId" name="product_id" value="{{$products->id}}">
                                    <div class="academic">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fee Type</label>
                                                    <input type="text" id="nameOfFeeType" class="form-control" name="fee_type" placeholder="Fee Type">
                                                    <span class="text-danger" id="errorNameOfFeeType"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fee Amount</label>
                                                    <input type="text" class="form-control" id="nameOfFeeAmount" name="fee_amount" value="" placeholder="Fee Amount">
                                                    <span class="text-danger" id="errorNameOfFeeAmount"></span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Fee Term</label>
                                                    <select class="form-control" id="nameOfFeeTerm" name="fee_term">
                                                        <option value="">Select Fee Term</option>
                                                        <option value="Full Fee" {{(in_array('Full Fee',array_column($products->productFee->toArray(),'fee_term'))) ? 'selected' : ''}}> Full Fee
                                                        </option>

                                                        <option value="Per Year"  {{(in_array('Per Year',array_column($products->productFee->toArray(),'fee_term'))) ? 'selected' : ''}}> Per Year
                                                        </option>

                                                        <option value="Per Month"  {{(in_array('Per Month',array_column($products->productFee->toArray(),'fee_term'))) ? 'selected' : ''}}> Per Month </option>

                                                        <option value="Per Term"  {{(in_array('Per Term',array_column($products->productFee->toArray(),'fee_term'))) ? 'selected' : ''}}> Per Term </option>

                                                        <option value="Per Trimester"  {{(in_array('Per Trimester',array_column($products->productFee->toArray(),'fee_term'))) ? 'selected' : ''}}> Per Trimester </option>

                                                        <option value="Per Semester" {{(in_array('Per Semester',array_column($products->productFee->toArray(),'fee_term'))) ? 'selected' : ''}}> Per Semester</option>

                                                        <option value="Per Week" {{(in_array('Per Week',array_column($products->productFee->toArray(),'fee_term'))) ? 'selected' : ''}}> Per Week </option>
                                                    </select>
                                                    <span class="text-danger" id="errorNameOfFeeTerm"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="transparentRow"></div>
                                        <div style="overflow:auto;">
                                            <div style="float:right;">
                                                <button class="btn btn-primary btn-md" id="addNewProductFee">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- form ends here -->
                            </div>
                        </div>
                    </div>
                </div>
                {{--Add proudct fee detail model ends here--}}



            <!-- Edit product fee detail -->
                <div id="editProductFeeModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="portlet box blue form-outer-part">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-plus"></i> <b>Edit Product Fee Detail</b> </div>
                            </div>
                            <div class="portlet-body form-inner-part">
                                <!-- Modal body -->
                                <!-- form starts here -->
                                <form id="editProductFeeForm" method="post">

                                </form>
                                <!-- form ends here -->
                            </div>
                        </div>
                    </div>
                </div>
                {{--Edit product fee detail end--}}
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
    <script type="text/javascript" src="{{URL::to('js/update-product.js')}}"></script>
@endsection