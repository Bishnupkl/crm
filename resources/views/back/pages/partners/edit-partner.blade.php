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
                        <span>Universities</span>
                    </li>
                </ul>

            </div>
            <br><br><br>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->

            <center>
                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </center>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="portlet box grace-blue form-outer-part">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i> Edit Partner
                    </div>
                </div>
                <div class="portlet-body form form-inner-part">
                    <form action="{{route('partners.update',$partner->id)}}" method="post" id="addPartner">
                        {{method_field('PUT')}}
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Partner Name</label>
                                        <input type="text" class="form-control" value="{{$partner->name}}" name="name" placeholder="Partner Name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Partners Category</label>
                                        <select class="form-control" name="category">
                                            @if(isset($partner->category))
                                                <option value="Institution" @if($partner->category == 'Institution') selected='selected' @endif>Institution</option>
                                                <option value="University" @if($partner->category == 'University') selected='selected' @endif>University</option>
                                                <option value="College" @if($partner->category == 'College') selected='selected' @endif>College</option>
                                                @else
                                            <option value="">Select partners Category</option>
                                            <option value="Institution" @if($partner->category == 'Institution') selected='selected' @endif>Institution</option>
                                            <option value="University" @if($partner->category == 'University') selected='selected' @endif>University</option>
                                            <option value="College" @if($partner->category == 'College') selected='selected' @endif>College</option>
                                                @endif
                                        </select>
                                        @if ($errors->has('category'))
                                            <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('category') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3><b>Address</b></h3>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Street</label>
                                        <input type="text" name="street" class="form-control" value="{{$partner->street}}" placeholder="Street">
                                        @if ($errors->has('street'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('street') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" value="{{$partner->city}}" placeholder="City">
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('city') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" value="{{$partner->state}}" placeholder="State">
                                        @if ($errors->has('state'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('state') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Country Name</label>
                                        <select name="country_id" class="form-control ">
                                            @foreach($countries as $country)
                                                @if(isset($partner->country_id))
                                                    <option value ="{{$country->id}}" @if($partner->country_id == $country->id) selected='selected' @endif>{{$country->name}}</option>
                                                    @else
                                                <option value="" selected> Select Country</option>
                                                <option value ="{{$country->id}}" {{(old('country')===$country->id) ? 'selected' : ''}}>{{$country->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('country') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3><b>Contact Details</b></h3>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{$partner->phone}}" placeholder="Phone Number">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{$partner->email}}" placeholder="Email">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>fax</label>
                                        <input type="text" name="fax" class="form-control" value="{{$partner->fax}}" placeholder="Fax Number">
                                        @if ($errors->has('fax'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('fax') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" placeholder="http://example.com" value="{{$partner->website}}">
                                        @if ($errors->has('website'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div><hr>
                            <div align="center">
                                <input type="submit" class="btn blue" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection