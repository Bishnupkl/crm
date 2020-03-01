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
                        <span>Office Check in</span>
                        {{--hidden buttons that click <li> of nav nav-pills when condition is satisfied --}}
                        <button style="display: none" type="button" id="completedBtn" data-toggle="pill" href="#completed">click</button>
                        <button style="display: none" type="button" id="waitingBtn" data-toggle="pill" href="#waiting">click</button>
                        <button style="display: none" type="button" id="allBtn" data-toggle="pill" href="#all">click</button>
                        {{--hidden button ENDED--}}
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <div class="row">
                <div class="form-group detail-nav">
                    <ul class="nav nav-pills">
                        <li class="{{!isset($searchName)||$searchName=='waiting'?'active':''}}"><a data-toggle="pill" href="#waiting">Waiting</a></li>
                        <li class="{{isset($searchName)&&$searchName=='completed'?'active':''}}"><a data-toggle="pill" href="#completed">Completed</a></li>
                        <li class="{{isset($searchName)&&$searchName=='all'?'active':''}}"><a data-toggle="pill" href="#all">All</a></li>
                    </ul>
                </div>
            </div>
            <center>
                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}} </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}} </div>
                @endif


            </center>
            <hr>
            <div class="row">

                    <div class="col-xs-6 col-md-4">
                        <div class="form-group">
                            <button class="btn btn-default btn-info" data-toggle="modal" data-target="#checkIn"> New Check-in <i class="fa fa-plus"></i></button>
                        </div>

                    </div>
            </div>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- PAGE CONTENT STARTED -->
            <div class="tab-content">
                <div class="col-md-12 tab-pane fade in active" id="waiting">
                    <div class="col-xs-6 col-md-4 pull-right" style="margin-top: -30px;">
                        <form action="{{route('office.check.in.search')}}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" id="txtSearch" name="w"/>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Date </th>
                            <th> Contact Name </th>
                            <th> Visit Purpose </th>
                            <th> Assignee </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($checkIns)>0)
                            @forelse($checkIns as $key=>$checkIn)
                                @if($checkIn->status === 'Waiting')
                                <tr>
                                    <td align="center">
                                        <a href="{{route('officeCheckIn.show',$checkIn->id)}}">#{{$checkIn->id}}</a>
                                        {{--<a href="#" data-id="{{$checkIn->id}}"  data-backdrop="static" data-keyboard="false" id="checkInID" data-toggle="modal" data-target="#checkInDetail"><b>#{{$checkIn->id}}</b><br></a>--}}
                                    </td>
                                    <td class="center">{{date('M jS Y',strtotime($checkIn->date))}} </td>
                                    <td class="center"><a href="{{route('inquiry.show',$checkIn->inquiry->token)}}">{{$checkIn->inquiry->name}}</a> <br> {{$checkIn->inquiry->email}} </td>
                                    <td>{!! $checkIn->reasons !!}</td>
                                    <td><a href="{{route('profile',$checkIn->user->username)}}">{{$checkIn->user->name}}</a> <br> {{$checkIn->user->email}} </td>
                                    <td>{{$checkIn->status}}</td>
                                    <td><button class="btn btn-danger" value="{{$checkIn->id}}" id="deleteOfficeCheck" data-toggle="modal" data-target="#deleteOfficeCheckin" title="Delete-OfficecheckIn"><i class="fa fa-trash"></i></button>
                                    </td>

                                </tr>
                                @endif
                            @empty
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                    @if(isset($hold))
                        <div class="input-group">
                            {{$checkIns->links()}}
                        </div>
                    @endif
                </div>
                <div class="col-md-12 tab-pane fade in" id="completed">
                    <div class="col-xs-6 col-md-4 pull-right" style="margin-top: -30px;">
                        <form action="{{route('office.check.in.search')}}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" id="txtSearch" name="c"/>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Start </th>
                            <th> Contact Name </th>
                            <th> Visit Purpose </th>
                            <th> Assignee </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($checkIns)>0)
                            @forelse($checkIns as $key=>$checkIn)
                                @if($checkIn->status === 'Completed')
                                    <tr>
                                        <td align="center">
                                            <a href="{{route('officeCheckIn.show',$checkIn->id)}}">#{{$checkIn->id}}</a>
                                            {{--<a href="#" data-id="{{$checkIn->id}}"  data-backdrop="static" data-keyboard="false" id="checkInID" data-toggle="modal" data-target="#checkInDetail"><b>#{{$checkIn->id}}</b><br></a>--}}
                                        </td>
                                        <td class="center">{{date('M jS Y',strtotime($checkIn->date))}} </td>
                                        <td class="center"><a href="{{route('inquiry.show',$checkIn->inquiry->token)}}">{{$checkIn->inquiry->name}}</a> <br> {{$checkIn->inquiry->email}} </td>
                                        <td>{!! $checkIn->reasons !!}</td>
                                        <td><a href="{{route('profile',$checkIn->user->username)}}">{{$checkIn->user->name}}</a> <br> {{$checkIn->user->email}} </td>
                                        <td>{{$checkIn->status}}</td>
                                        <td><button class="btn btn-danger" value="{{$checkIn->id.'c'}}" id="deleteOfficeCheck" data-toggle="modal" data-target="#deleteOfficeCheckin" title="Delete-OfficecheckIn"><i class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endif
                            @empty
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                    @if(isset($hold))
                        <div class="input-group">
                            {{$checkIns->links()}}
                        </div>
                    @endif
                </div>
                <div class="col-md-12 tab-pane fade in" id="all">
                    <div class="col-xs-6 col-md-4 pull-right" style="margin-top: -30px;">
                        <form action="{{route('office.check.in.search')}}" method="get">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" id="txtSearch" name="a"/>
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
                        <thead>
                        <tr>
                            <th> ID </th>
                            <th> Start </th>
                            <th> Contact Name </th>
                            <th> Visit Purpose </th>
                            <th> Assignee </th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($checkIns)>0)
                            @forelse($checkIns as $key=>$checkIn)
                                <tr>
                                    <td align="center">
                                        <a href="{{route('officeCheckIn.show',$checkIn->id)}}">#{{$checkIn->id}}</a>
                                        {{--<a href="#" data-id="{{$checkIn->id}}"  data-backdrop="static" data-keyboard="false" id="checkInID" data-toggle="modal" data-target="#checkInDetail"><b>#{{$checkIn->id}}</b><br></a>--}}
                                    </td>
                                    <td class="center">{{date('M jS Y',strtotime($checkIn->date))}} </td>
                                    <td class="center"><a href="{{route('inquiry.show',$checkIn->inquiry->token)}}">{{$checkIn->inquiry->name}}</a> <br> {{$checkIn->inquiry->email}} </td>
                                    <td>{!! $checkIn->reasons !!}</td>
                                    <td><a href="{{route('profile',$checkIn->user->username)}}">{{$checkIn->user->name}}</a> <br> {{$checkIn->user->email}} </td>
                                    <td>{{$checkIn->status}}</td>
                                    <td><button class="btn btn-danger" value="{{$checkIn->id.'a'}}" id="deleteOfficeCheck" data-toggle="modal" data-target="#deleteOfficeCheckin" title="Delete-OfficecheckIn"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                    @if(isset($hold))
                        <div class="input-group">
                            {{$checkIns->links()}}
                        </div>
                    @endif
                </div>
            </div>
            <!-- PAGE CONTENT ENDED -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    <!-- Modal -->
    <div id="checkIn" class="modal fade">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="portlet box grace-blue form-outer-part">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> <b>Create Office Check-In</b> </div>
                </div>
                <div class="portlet-body form-inner-part">
                    <form method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{$errors->has('application')? "has-error":""}}">
                                        <div class="pull-left" style="color: red;margin-top: -30px;" id="errorNameOfStatus"></div><a style="display: none;text-decoration: none;margin-top: -30px;margin-left:8cm;" class="pull-left" id="redirectCheckIns" href="">Go here</a>
                                        <br><label><b>Search Application</b></label>
                                        <select class="form-control" id="application" name="application">
                                            <option value="">Select Application</option>
                                            @if(count($applications)>0)
                                                @foreach($applications as $key=>$application)
                                                    <option value="{{$application->token}}" {{(old('inquiry_token')) ? 'selected' : ''}}>{{$application->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                            <span style="color: red;" id="errorNameOfApplication"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{$errors->has('reasons')? "has-error":""}}">
                                        <label><b>Followup Reasons</b></label>
                                        <textarea class="form-control" rows="3" name="reasons" id="reasons" placeholder="Visit Reasons">{{old('reasons')}}</textarea>
                                        <span style="color: red;" id="errorNameOfReasons"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{$errors->has('assignee')? "has-error":""}}">
                                        <label><b>Select Assignee</b></label>
                                        <select class="form-control" name="assignee" id="assignee">
                                            <option value="">Select...</option>
                                            @if(count($counselors)>0)
                                                @foreach($counselors as $key=>$counselor)
                                                    <option value="{{$counselor->id}}">{{$counselor->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <span style="color: red;" id="errorNameOfAssignee"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" id="addCheckIn">Save</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Re-followup--}}
    <!-- Modal -->
    <div id="checkInDetail" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="portlet box grace-blue form-outer-part">
                <div class="portlet-title">
                    <div class="caption col-md-12">
                        <button type="button" id="detailModal" class=" btn btn-default pull-right" data-dismiss="modal">X</button>
                        <i class="fa fa-open-eyes"></i><b>Office Check in Details</b>
                    </div>
                </div>
                <div class="portlet-body form-inner-part">
                    <label class="text-warning" id="status"></label>
                    <button class="btn btn-success pull-right" style="display: none" id="makeCompleted">Make Status Completed</button>
                    <hr>
                    <div class="form-group">
                        <label><b>Contact</b></label>
                        <div id="contactDetail">

                        </div>
                    </div><hr>
                    <input type="hidden" name="id" id="check_in_id">
                    <form action="" method="post" id="followupForm">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{$errors->has('reasons')? "has-error":""}}">
                                    <label><b>Visit Purpose</b></label>
                                    <div id="textArea"></div>
                                    @if ($errors->has('reasons'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('reasons') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="form-group">
                        <label><b>Assignee</b></label>
                        <div class="row">
                            <div class="col-md-8" id="assigneeDetail">

                            </div>
                            <div id="errorDiv"></div>
                        </div>
                    </div><hr>
                    <form action="" method="post" id="followupForm">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{$errors->has('comment')? "has-error":""}}">
                                    <label><b>Follow-up feedback</b></label>
                                    <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>

                                    @if ($errors->has('comment'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('comment') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <strong>All Comments:</strong>
                    <div class="form-group" id="commentList">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="deleteOfficeCheckin" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="portlet box grace-blue form-outer-part">
                <div class="portlet-body form-inner-part">
                    <form action="" method="post" id="deleteOfficeCheckinForm">
                        {{csrf_field()}}
                        {{--<input type="hidden" name="delete_id" id="deleteConfirmId">--}}
                        {{--<input type="hidden" name="re_follow_up" value="re-follow-up">--}}
                        <label for="delete">Do You really want to delete ? </label>
                        <div class="form-group" align="center">

                            <button class="btn btn-primary">Delete</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--script that automatically trigger click event when condition is satisfied -- STARTED--}}
    @if(isset($searchName))
        @if($searchName=='completed')
            <script>
                $(function () {
                    $( "#completedBtn" ).trigger( "click" );

                });
            </script>
        @endif
        @if($searchName=='waiting')
            <script>
                $(function () {
                    $( "#waitingdBtn" ).trigger( "click" );

                });
            </script>
        @endif
        @if($searchName=='all')
            <script>
                $(function () {
                    $( "#allBtn" ).trigger( "click" );

                });
            </script>
        @endif
    @endif
    {{--script that automatically trigger click event when condition is satisfied ENDED--}}

    {{--Re-followup--}}
    <script>

        $(document).on('click','#followResult', function () {
            var id = $(this).val();
            $('#followup_id').append('<input type="hidden" name="id" value="'+id+'">');
        });
        $(document).on('click','#reFollowup', function () {
            var token = $(this).val();
            var url = "{{route('add.followup',':token')}}";
            url = url.replace(':token',token);
            $('#followupForm').attr('action',url);
        });
        $(document).on('click','#checkInID',function () {
            var id = $(this).attr('data-id');
            $.ajax({
                url:'api/get-check-in-detail/'+id,
                type: 'get',
                success:function (data) {
                    console.log(data);
                    $('#check_in_id').attr('value',data.id); //append('<input type="hidden" id="check_in_id" value="'+data.id+'">');
                    $('#status').append('<b><i class="fa fa-circle"></i> '+data.status+'</b>');
                    if (data.status === 'Waiting'){
                        $('#makeCompleted').css('display','block');
                    }
                    $('#textArea').append('<textarea name="reasons" id="reasonsUpdate" class="form-control" rows="3">'+(data.reasons !==null ? data.reasons : '') +'</textarea>');
                    $('#contactDetail').append('<a href="/inquiry/'+data.inquiry.token+'"><div><b>'+data.inquiry.name+'</b></div><small>'+data.inquiry.email+'</small></a>');
                    $('#assigneeDetail').append('<a href="/u/'+data.user.username+'"><div><b>'+data.user.name+'</b></div><small>'+data.user.email+'</small></a>');
                    for(var n in data.comment) {
                        console.log(comment);
                        $('#commentList').append('<p><strong>' + data.comment[n].user.name + '</strong> has commented ' + data.comment[n].comment + '</p><hr>');
                    }
                }
            });
        });
        $(document).on('click','#detailModal',function () {
            $('#status').empty();$('#textArea').empty(); $('#contactDetail').empty(); $('#assigneeDetail').empty(); $('#checkInDate').empty();
            $('#commentList').empty();
        });

        $(document).on('click','#makeCompleted', function () {
            var id = $('#check_in_id').val();

            $.ajax({
                url:'api/check-in-completed/'+id,
                type: 'get',
                data:{completed:1},
                success:function (data) {
                    $('#status').empty();
                    $('#status').append('<b><i class="fa fa-circle"></i> '+data.status+'</b>');
                    $('#makeCompleted').css('display','none');
                }
            });
        });
        $(document).on('click','#sessionEnd', function () {
            var id = $('#check_in_id').val();

            $.ajax({
                url:'api/check-in-session/'+id,
                type: 'get',
                data:{end:1},
                success:function (data) {
                    $('#status').empty();
                    $('#status').append('<b><i class="fa fa-circle"></i> '+data.status+'</b>');
                    $('#session').empty();
                    $('#sessionEnd').append('<b>'+data.ended_at+'</b>');
                }
            });
        });

        $(document).on('change','#reasonsUpdate',function () {
            var reasons = $(this).val();
            var id = $('#check_in_id').val();
            console.log(id);
            $.ajax({
                url:'api/get-check-in-update/'+id,
                type: 'get',
                data:{reasons:reasons},
                success:function (data) {
                    console.log(data);
                }
            });
        });
        $(document).on('submit','#followupForm', function (e) {
            e.preventDefault();
            var comment = $('#comment').val();
            var userID = '{{Auth::id()}}';
            var id = $('#check_in_id').val();
            console.log(id+comment);
            $.ajax({
                url:'api/new-comment/'+id,
                type: 'get',
                data:{comment:comment,user_id:userID},
                success:function (data) {
                    $('#comment').val('');
                    console.log(data);
                    $('#commentList').append('<p><strong>'+data.user.name+'</strong> has commented '+data.comment+'</p><hr>');
                }
            });
        });

        $(document).on('click','#deleteOfficeCheck',function () {
           var id=$(this).val();
            var url = '{{route('officeCheckIn.delete',':id')}}';
            url = url.replace(':id',id);
            $('#deleteOfficeCheckinForm').attr('action',url);
        });

        // submit button is clicked
        $(document).on('click','#addCheckIn',function (event) {
            event.preventDefault();
            var application = $('#application').val();
            var reasons = $('#reasons').val();
            var assignee = $('#assignee').val();

            var csrf = '{{csrf_token()}}';
            $.ajax({
                type: 'POST',
                url:'/office-check-in',
                data:{application,reasons,assignee,_token:csrf},
                success:function (data) {
                    console.log(data);
                    window.location.reload();
                },
                error:function (error) {

                    if (error.status === 413){
                        console.log('unknown error');
                    } else if (error.status === 422){
                        var invalid = JSON.parse(error.responseText);
                        console.log(invalid);
                        if (invalid.application !== 'undefined'){
                            $('#errorNameOfApplication').empty();
                            $('#errorNameOfApplication').append(invalid.errors.application);
                        }
                        if (invalid.reasons !== 'undefined'){
                            $('#errorNameOfReasons').empty();
                            $('#errorNameOfReasons').append(invalid.errors.reasons);
                        }
                        if (invalid.assignee !== 'undefined'){
                            $('#errorNameOfAssignee').empty();
                            $('#errorNameOfAssignee').append(invalid.errors.assignee);
                        }
                    }
                }


            });


        });

        // new script
        // when search application fields changes
        $(document).on('change', '#application', function () {
            var application = $('#application').val();
            var csrf = '{{csrf_token()}}';

            $.ajax({
                type: 'POST',
                url:'/check-applicant-status',
                data:{application,_token:csrf},
                success:function (data) {
                    console.log(data);
                    if (data.status=='Waiting'){
                        $('#errorNameOfStatus').html("This applicant has previous office check ins !");
                        var redirect = "office-check-in/"+data.id;
                        $('#redirectCheckIns').css('display', '');
                        $('#redirectCheckIns').attr("href", redirect);
                        $('#addCheckIn').attr("disabled", "disabled");
                    }else {
                        $('#addCheckIn').removeAttr("disabled");
                        $('#errorNameOfStatus').empty();
                        $('#redirectCheckIns').css('display', 'none');
                    }
                },
                error:function (error) {

                    if (error.status === 413){
                        console.log('unknown error');
                    } else if (error.status === 422){
                        var invalid = JSON.parse(error.responseText);
                        console.log(invalid);
                        if (invalid.application !== 'undefined'){
                            $('#errorNameOfApplication').empty();
                            $('#errorNameOfApplication').append(invalid.errors.application);
                        }
                        if (invalid.reasons !== 'undefined'){
                            $('#errorNameOfReasons').empty();
                            $('#errorNameOfReasons').append(invalid.errors.reasons);
                        }
                        if (invalid.assignee !== 'undefined'){
                            $('#errorNameOfAssignee').empty();
                            $('#errorNameOfAssignee').append(invalid.errors.assignee);
                        }
                    }
                }


            });
        });

    </script>
@endsection
