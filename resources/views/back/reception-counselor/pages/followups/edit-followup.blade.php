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
                        <span>Followup</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Edit Followup</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">Edit Followup
            </h3>
            <hr>
            <div class="panel panel-body panel-default form-group">
                <div class="custom-inner-pannel-body">
                    <form action="{{route('edit.followup',$user->id)}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group {{$errors->has('application')? "has-error":""}}">
                                    <label><b>User Name</b></label>
                                    <input type="text" class="form-control" value="{{$user->inquiry->name}}" disabled>
                                    @if ($errors->has('application'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('application') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <!-- DATE PICKER bootstrap-->
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group {{$errors->has('date')? "has-error":""}}" style='margin-top:00px;'>
                                    <label><b>Enter follow up date</b></label>
                                    <input type='text' name="date" class="form-control" id='datepicker' style='width: 100%;' placeholder="mm/dd/yyyy" value="{{$user->date}}">
                                    @if ($errors->has('date'))
                                        <span class="help-block">
                               <strong>{{ $errors->first('date') }}</strong>
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
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group {{$errors->has('reasons')? "has-error":""}}">
                                    <label><b>Reason</b></label>
                                    <textarea class="form-control" rows="3" name="reasons" id="reasons" placeholder="Visit Reasons">{{$user->reasons}}</textarea>
                                    @if ($errors->has('reasons'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('reasons') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-primary btn-md">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
@endsection
