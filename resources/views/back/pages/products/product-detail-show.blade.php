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
                        <span>Product Details</span>
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
            <div class="portlet box blue form-outer-part">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i> Related Data </div>
                </div>
                <div class="portlet-body form-inner-part">
                    <table class="table">
                        <thead>
                        <tr>
                            <td>Course name</td>
                            {{--<td> @foreach($products->course as $course)--}}
                                    {{--{{$course->id}}--}}
                                {{--@endforeach--}}
                            {{--</td>--}}
                            <td>{{$products->course->name}}</td>
                        </tr>
                        <tr>
                            <td>Fee type</td>
                            <td> @foreach($products->productFee as $productFees)
                                    {{$productFees->fee_type}}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Duration</td>
                            <td>{{$products->duration}}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{!!$products->description!!}</td>
                        </tr>
                        <tr>
                            <td>Fee amount</td>
                            <td> @foreach($products->productFee as $productFees)
                                    {{$productFees->fee_amount}}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Fee term</td>
                            <td> @foreach($products->productFee as $productFees)
                                    {{$productFees->fee_term}}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td>Partner</td>
                            <td>{{$products->partner->name}}</td>
                        </tr>
                        <tr>
                            <td>Intake</td>
                            <td>{{$products->intake->name}}</td>
                        </tr>
                        </thead>
                    </table>
                    {{--<div class="blog-comments">--}}
                        {{--<h4 class="sbold blog-comments-title">Counseling Feedback({{count($checkIns->comment)}})</h4>--}}
                        {{--<div class="c-comment-list">--}}
                            {{--@foreach($checkIns->comment as $comment)--}}
                                {{--<div class="media">--}}
                                    {{--<div class="media-left">--}}
                                        {{--<a href="{{route('profile',$comment->user->username)}}">--}}
                                            {{--<img class="media-object" alt="" src="{{URL::to('images/users/male.png')}}" height="40px"> </a>--}}
                                    {{--</div>--}}
                                    {{--<div class="media-body">--}}
                                        {{--<h5 class="media-heading">--}}
                                            {{--<a href="{{route('profile',$comment->user->username)}}">{{$comment->user->name}}</a> on--}}
                                            {{--<span class="c-date">{{$comment->created_at->format('d M Y, h:ia')}}</span>--}}
                                        {{--</h5> {!! $comment->comment !!}</div>--}}
                                {{--</div><hr>--}}
                            {{--@endforeach--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <script>
        CKEDITOR.replace( 'description' );
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
