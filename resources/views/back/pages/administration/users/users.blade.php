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
                        <a href="{{URL::to('/dashboard')}}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Administration</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>All Users</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> All Users
                {{--<small>blank page layout</small>--}}
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                            <a href="{{route('users.create')}}" class="btn blue"> Add User
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
                                    <div class="col-xs-6 col-md-4 pull-right">
                                        <form action="{{route('users.search')}}" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search" id="txtSearch" name="search"/>
                                                <div class="input-group-btn">
                                                    <button class="btn btn-default" type="submit">
                                                        Search{{--<span class="glyphicon glyphicon-search"></span>--}}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                            <!-- <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables"> -->
                            <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%">

                               <thead>
                                <tr>
                                    <th> S. No. </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Mobile </th>
                                    <th>Position</th>
                                    <th>Branch</th>
                                    <th> Action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($users)>0)
                                    @forelse($users as $key=>$user)
                                        <tr>
                                            <td> {{++$key}} </td>
                                            <td> {{$user->name}} </td>
                                            <td> {{$user->email}} </td>
                                            <td class="center">{{$user->phone}} </td>
                                            <td>{{$user->position}}</td>
                                            <td>{{$user->branch}}</td>
                                            <td>
                                                <div class="col-md-12 pull-right">
                                                    <div class="col-md-6">
                                                        <a href="{{route('users.show',$user->username)}}" title="Profile" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <form action="{{route('users.destroy',$user->id)}}" method="post">
                                                            {{csrf_field()}}
                                                            {{method_field('DELETE')}}
                                                            <button class="btn btn-default" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                @endif
                                </tbody>
                            </table>
                          </div>
                            @if(isset($hold))
                                <div class="input-group">
                                    {{$users->links()}}
                                </div>
                            @endif
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
