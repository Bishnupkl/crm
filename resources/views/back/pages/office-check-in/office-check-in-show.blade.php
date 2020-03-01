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
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <center>
                @if(session('error'))
                    <div class="alert alert-success">{{session('error')}} </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}} </div>
                @endif
            </center>
            <br><br>
            <div class="panel panel-default" style="padding: 1.5rem">
                <form action="{{route('check.in.update',$checkIns->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label><b>Counseling Feedback</b></label>
                        <textarea id="comment" name="comment" placeholder="Feedback">{{old('comment')}}</textarea>
                        @if ($errors->has('comment'))
                            <span class="help-block">
                                <strong class="text-danger">{{ $errors->first('comment') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="row detail-nav">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><b>Transfer to another branch</b></label>
                                <select name="branch_id" class="form-control">
                                    <option value="">Select Branch</option>
                                    @foreach($branches as $branch)
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><b>Change Assignee</b></label>
                                <select name="assignee_id" class="form-control">
                                    <option value="">Select Assignee</option>
                                    @foreach($counselors as $counselor)
                                        <option value="{{$counselor->id}}" {{($counselor->id===$checkIns->user_id) ? 'selected' : ''}}>{{$counselor->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label><b>Change Status</b></label>
                                <select name="status" class="form-control">
                                    <option value="">Select Status</option>
                                    <option value="Waiting" {{$checkIns->status==="Waiting"?'selected':''}}>Waiting</option>
                                    <option value="In Progress" {{$checkIns->status==="In Progress"?'selected':''}}>In Progress</option>
                                    <option value="Completed" {{$checkIns->status==="In Progress"?'selected':''}}>Completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><b>Change Priority</b></label>
                                <select name="priority" class="form-control">
                                    <option value="">Select Priority</option>
                                    <option value="Low" {{$checkIns->priority==='Low'?'selected':''}}>Low</option>
                                    <option value="Medium" {{$checkIns->priority==='Medium'?'selected':''}}>Medium</option>
                                    <option value="High" {{$checkIns->priority==='High'?'selected':''}}>High</option>
                                </select>
                            </div>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <button class="btn btn-primary pull-right"><i class="fa fa-check"></i> SAVE</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="portlet box grace-blue form-outer-part">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i> Related Data </div>
                </div>
                <div class="portlet-body form-inner-part">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Date</td>
                                <td>{{$checkIns->date}}</td>
                            </tr>
                            <tr>
                                <td>Contact Name</td>
                                <td><a href="{{route('inquiry.show',$checkIns->inquiry->token)}}">{{$checkIns->inquiry->name}}</a></td>
                            </tr>
                            <tr>
                                <td>Assignee</td>
                                <td><a href="{{route('profile',$checkIns->user->username)}}">{{$checkIns->user->name}}</a></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>{{$checkIns->status}}</td>
                            </tr>
                            <tr>
                                <td>Priority</td>
                                <td>{{$checkIns->priority}}</td>
                            </tr>
                            <tr>
                                <td>Visit Purpose</td>
                                <td>{!! $checkIns->reasons !!}</td>
                            </tr>
                        </thead>
                    </table>
                    <div class="blog-comments">
                        <h4 class="sbold blog-comments-title">Counseling Feedback({{count($checkIns->comment)}})</h4>
                        <div class="c-comment-list">
                            @foreach($checkIns->comment as $comment)
                            <div class="media">
                                <div class="media-left">
                                    <a href="{{route('profile',$comment->user->username)}}">
                                        <img class="media-object" alt="" src="{{URL::to('images/users/male.png')}}" height="40px"> </a>
                                </div>
                                <div class="media-body">
                                    <h5 class="media-heading">
                                        <a href="{{route('profile',$comment->user->username)}}">{{$comment->user->name}}</a> on
                                        <span class="c-date">{{$comment->created_at->format('d M Y, h:ia')}}</span>
                                    </h5> {!! $comment->comment !!}</div>
                            </div><hr>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <script>
        CKEDITOR.replace('comment');
    </script>
    <script>
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
    </script>
@endsection
