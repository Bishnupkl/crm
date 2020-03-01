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
            <h3 class="page-title"> All Inquiry
                {{--<small>blank page layout</small>--}}
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <a href="{{route('inquiry.create')}}" class="btn green"> Add New
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group">
                                        <a href="{{route('send.sms')}}" class="btn green"> Send SMS
                                            <i class="fa fa-inbox"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="btn-group pull-right">
                                        <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="javascript:;"> Print </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> Save as PDF </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;"> Export to Excel </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                    <thead>
                                    <tr>
                                        <th> S. No. </th>
                                        <th> Token </th>
                                        <th> Full Name </th>
                                        <th> Mobile </th>
                                        <th> Location </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($inquires)>0)
                                        @forelse($inquires as $key=>$inquiry)
                                            <tr>
                                                <td> {{++$key}} </td>
                                                <td> {{$inquiry->token}} </td>
                                                <td> {{$inquiry->name}} </td>
                                                <td class="center">{{$inquiry->mobile}} </td>
                                                <td>{{$inquiry->location}}</td>
                                                <td>
                                                    @if($inquiry->followed_status == 1)
                                                        New <form action="{{route('change.followed')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="hidden" value="{{$inquiry->token}}" name="token">
                                                            <button class="btn btn-default" title="Change to Followed">Change to Follow</button>
                                                        </form>
                                                    @elseif($inquiry->followed_status == 2)
                                                        Followed
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('inquiry.show',$inquiry->token)}}" class="btn btn-default"><i class="fa fa-eye"></i></a>

                                                    <a href="{{route('inquiry.edit',$inquiry->token)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>

                                                    {{--<div class="col-md-2">
                                                        <form action="{{route('inquiry.destroy',$inquiry->id)}}" method="post">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button class="btn btn-default" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div> --}}
                                                </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

@endsection
