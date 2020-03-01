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
                        <span>Inquiry</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>All Inquiry</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> All Inquiry</h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered">
                            <form action="{{route('send.sms')}}" method="post">
                                {{csrf_field()}}
                                <div class="col-md-8 col-md-offset-2">
                                    <div class="row">
                                        <div class="col-md-6 form-group {{$errors->has('from')? "has-error":""}}">
                                            <label for="from">REGISTERED FROM</label>
                                            <input type="date" id="from" name="from" class="form-control" required>
                                            @if ($errors->has('from'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('from') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group {{$errors->has('to')? "has-error":""}}">
                                            <label for="to">REGISTERED TO</label>
                                            <input type="date" id="to" name="to" class="form-control" required>
                                            @if ($errors->has('to'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('to') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row col-md-12 {{$errors->has('messages')? "has-error":""}}">
                                        <div class="form-group">
                                            <label for="message">ENTER MESSAGES</label>
                                            <textarea name="messages" class="form-control" rows="5" required></textarea>
                                            @if ($errors->has('messages'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('messages') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="SEND MESSAGES">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->

@endsection