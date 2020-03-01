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
                        <span>New Followup</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">New Followup</h3>
            <center>
                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </center>
            <hr>
            <div class="panel panel-body panel-default form-group">
                <div class="custom-inner-pannel-body">
                    <form action="{{route('add.followup')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group {{$errors->has('inquiry_token')? "has-error":""}}">
                                    <div style="color: red" id="errorNameOFStatus"></div>
                                    <label id="Application"><b>Search Application</b></label>
                                    <label id="Application"><b>Search Application</b></label>
                                    <select class="form-control select2me" name="inquiry_token">
                                        <option value="">Select Application</option>
                                        @if(count($applications)>0)
                                            @foreach($applications as $key=>$application)
                                                <option value="{{$application->token}}" {{(old('inquiry_token')) ? 'selected' : ''}}>{{$application->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span style="color: red" id="errorNameOfApplication"></span>
                                    @if ($errors->has('inquiry_token'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('inquiry_token') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <!-- DATE PICKER bootstrap-->
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group {{$errors->has('date')? "has-error":""}}" style='margin-top:00px;'>
                                    <label><b>Enter follow up date</b></label>
                                    <input type='text' name="date" class="form-control" id='datepicker' style='width: 100%;' placeholder="mm/dd/yyyy" value="{{old('date')}}">
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
                                    <label><b>Followup Reasons</b></label>
                                    <textarea class="form-control" rows="3" name="reasons" id="reasons" placeholder="Visit Reasons">{{old('reasons')}}</textarea>
                                    @if ($errors->has('reasons'))
                                        <span class="help-block">
                                    <strong>{{ $errors->first('reasons') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-10 col-md-offset-1">
                                <button type="submit" class="btn btn-primary btn-md" id="addFollowup">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    {{--<script>--}}
        {{--$(document).on('change','#Application',function () {--}}
            {{--var Application=$('#Application').val();--}}
            {{--var csrf = '{{csrf_token()}}';--}}

            {{--$.ajax({--}}
                {{--type:'POST',--}}
                {{--url:'check-followup-status',--}}
                {{--data:{Application, _token: csrf},--}}
                {{----}}
                {{--success:function (data) {--}}
                    {{--console.log(data);--}}

                {{--}--}}
            {{--})--}}
        {{--});--}}
    {{--</script>--}}
@endsection
