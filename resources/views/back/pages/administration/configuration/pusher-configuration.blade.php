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
                        <span>Pusher Configuration</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Pusher Configuration
                {{--<small>blank page layout</small>--}}
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form action="{{route('pusher.config')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" value="{{old('BROADCAST_DRIVER')}}" name="BROADCAST_DRIVER" id="form_control_1" >
                                        <label for="form_control_1">BROADCAST DRIVER</label>
                                    </div>
                                    @if ($errors->has('BROADCAST_DRIVER'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('BROADCAST_DRIVER') }}</strong>
                                            </span>
                                    @endif

                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('PUSHER_APP_ID')}}" name="PUSHER_APP_ID" id="form_control_1">
                                        <label for="form_control_1">PUSHER_APP_ID</label>
                                    </div>
                                    @if ($errors->has('PUSHER_APP_ID'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('PUSHER_APP_ID') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="" name="PUSHER_APP_KEY" id="form_control_1">
                                        <label for="form_control_1">PUSHER_APP_KEY</label>
                                    </div>
                                    @if ($errors->has('PUSHER_APP_KEY'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('PUSHER_APP_KEY') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('PUSHER_APP_SECRET')}}" name="PUSHER_APP_SECRET" id="form_control_1">
                                        <label for="form_control_1">PUSHER_APP_SECRET</label>
                                    </div>
                                    @if ($errors->has('PUSHER_APP_SECRET'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('PUSHER_APP_SECRET') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('PUSHER_APP_CLUSTER')}}" name="PUSHER_APP_CLUSTER" id="form_control_1">
                                        <label for="form_control_1">PUSHER_APP_CLUSTER</label>
                                    </div>
                                    @if ($errors->has('PUSHER_APP_CLUSTER'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('PUSHER_APP_CLUSTER') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-actions">
                                    <button class="btn blue">Update Pusher Configuration</button>
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