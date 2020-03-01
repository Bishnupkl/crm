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
                        <span>Follow Up</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Follow-up
            </h3>
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet light portlet-fit bordered">
                <div class="portlet-body">
                    <div class="table-toolbar">
                        <div class="row">
                            {{--<div class="col-md-6">--}}
                                {{--<div class="btn-group">--}}
                                    {{--<a href="{{route('inquiry.create')}}" class="btn green"> Add New--}}
                                        {{--<i class="fa fa-plus"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="col-md-6 pull-right">
                                <div class="btn-group pull-right">
                                    <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:"> Print </a>
                                        </li>
                                        <li>
                                            <a href="javascript:"> Save as PDF </a>
                                        </li>
                                        <li>
                                            <a href="javascript:"> Export to Excel </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <th> S. No. </th>
                            <th> Token </th>
                            <th> Counsellor Name </th>
                            <th> Date </th>
                            <th> Type </th>
                            {{--<th>Reasons</th>--}}
                            <th> Re-follow</th>
                            <th>Results </th>
                            <th>View </th>
                            <th> Delete </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($followups)>0)
                            @forelse($followups as $key=>$followup)
                                <tr>
                                    <td> {{++$key}} </td>
                                    <td> <a href="{{route('inquiry.show',$followup->inquiry->token)}}">{{$followup->inquiry->token}}</a> </td>
                                    <td>
                                        @foreach($followup->inquiry->inquiryCounsellor as $user)
                                            @if($user->counsellor_status === 1)
                                                <a href="{{route('users.show',$user->counsellor->username)}}">
                                                    {{$user->counsellor->name}}
                                                </a>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="center">{{$followup->date}} </td>
                                    <td class="center">{{$followup->follow_type}} </td>
                                    {{-- <td>{!! $followup->reasons !!}</td>--}}

                                    <td>
                                        <a href="{{route('re.followup',$followup->inquiry_id)}}"> Re-follow</a>
                                    </td>
                                    <td>
                                        @if(empty($followup->result))
                                            <button value="{{$followup->id}}" id="result" data-toggle="modal" data-target="#resultModal">Add Result</button>
                                        @endif
                                    </td>
                                    <td><!-- Trigger the modal with a button -->
                                        <button value="{{$followup->id}}" id="view" data-toggle="modal" data-target="#viewModal">View</button>
                                    </td>
                                    <td>
                                        <form action="{{route('followup.destroy',$followup->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    <!-- Modal -->
    <div id="viewModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Follow up Details</h4>
                </div>
                <div class="modal-body" id="detail">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <!-- Modal -->
    <div id="resultModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="portlet box grace-blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-edit"></i> Followup Result </div>
                </div>
                <div class="portlet-body">
                    <form action="{{route('add.result')}}" method="post">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div id="followup_id">

                            </div>
                            <div class="col-md-12 form-group">
                                <div class="form-group">
                                    <textarea name="result" class="wysihtml5 form-control" rows="6" required></textarea>
                                    @if($errors->has('result'))
                                        <span class="text-danger">{{$errors->first('result')}}</span><br>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-default" value="Add Result">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--Re-followup started--}}
    <!-- Modal -->
    <div id="reFollowModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <form action="{{route('add.result')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div id="followup_id">

                        </div>
                        <div class="col-md-12 form-group">
                            <div class="form-group">
                                <textarea name="result" class="wysihtml5 form-control" rows="6" required></textarea>
                                @if($errors->has('result'))
                                    <span class="text-danger">{{$errors->first('result')}}</span><br>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-default" value="Add Result">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--Re-followup ended--}}
@endsection
