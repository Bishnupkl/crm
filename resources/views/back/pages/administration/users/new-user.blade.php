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
                        <span>Administration</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>New Users</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> New User
                {{--<small>blank page layout</small>--}}
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form action="{{route('users.store')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" value="{{old('name')}}" name="name" id="form_control_1" >
                                        <label for="form_control_1">Name</label>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                    @endif

                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('email')}}" name="email" id="form_control_1">
                                        <label for="form_control_1">Email</label>
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="" name="password" id="form_control_1">
                                        <label for="form_control_1">Password</label>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="number" class="form-control" value="{{old('phone')}}" name="phone" id="form_control_1">
                                        <label for="form_control_1">Phone No</label>
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('position')}}" name="position" id="form_control_1">
                                        <label for="form_control_1">Position</label>
                                    </div>
                                    @if ($errors->has('position'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('position') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('branch')}}" name="branch" id="form_control_1">
                                        <label for="form_control_1">Branch</label>
                                    </div>
                                    @if ($errors->has('branch'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('branch') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <select class="form-control edited" name="role" id="form_control_1">
                                            <option value="" selected>Select User Type</option>
                                            @foreach($roles as $key=>$role)
                                                @if($role->slug != 'super-admin')
                                                    @if($role->slug != 'admin')
                                                        <option value="{{$role->id}}" {{($role->id==old('role')) ? 'selected' : ''}}>{{$role->name}}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="form_control_1">Select User Type</label>
                                    </div>
                                    @if ($errors->has('role'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('role') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-actions">
                                    <button class="btn blue">Create User</button>
                                </div>
                            </form>
                        </div>
                    <!-- END SAMPLE FORM PORTLET-->
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

@endsection