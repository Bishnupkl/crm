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
                        <span>Mail Configuration</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Mail Configuration
                {{--<small>blank page layout</small>--}}
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-body form">
                            <form action="{{route('mail.config')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-body">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" value="{{old('MAIL_DRIVER')}}" name="MAIL_DRIVER" id="form_control_1" >
                                        <label for="form_control_1">MAIL_DRIVER</label>
                                    </div>
                                    @if ($errors->has('MAIL_DRIVER'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('MAIL_DRIVER') }}</strong>
                                            </span>
                                    @endif

                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('MAIL_HOST')}}" name="MAIL_HOST" id="form_control_1">
                                        <label for="form_control_1">MAIL_HOST</label>
                                    </div>
                                    @if ($errors->has('MAIL_HOST'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('MAIL_HOST') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('MAIL_PORT')}}" name="MAIL_PORT" id="form_control_1">
                                        <label for="form_control_1">MAIL_PORT</label>
                                    </div>
                                    @if ($errors->has('MAIL_PORT'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('MAIL_PORT') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('MAIL_USERNAME')}}" name="MAIL_USERNAME" id="form_control_1">
                                        <label for="form_control_1">MAIL_USERNAME</label>
                                    </div>
                                    @if ($errors->has('MAIL_USERNAME'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('MAIL_USERNAME') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('MAIL_PASSWORD')}}" name="MAIL_PASSWORD" id="form_control_1">
                                        <label for="form_control_1">MAIL_PASSWORD</label>
                                    </div>
                                    @if ($errors->has('MAIL_PASSWORD'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('MAIL_PASSWORD') }}</strong>
                                            </span>
                                    @endif
                                    <div class="form-group form-md-line-input form-md-floating-label has-info">
                                        <input type="text" class="form-control" value="{{old('MAIL_ENCRYPTION')}}" name="MAIL_ENCRYPTION" id="form_control_1">
                                        <label for="form_control_1">MAIL_ENCRYPTION</label>
                                    </div>
                                    @if ($errors->has('MAIL_ENCRYPTION'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('MAIL_ENCRYPTION') }}</strong>
                                            </span>
                                    @endif
                                </div>
                                <div class="form-actions">
                                    <button class="btn blue">Update Mail Setup</button>
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