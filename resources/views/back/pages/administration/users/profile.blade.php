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
                        <span>All Users</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Profile</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Profile
                {{--<small>blank page layout</small>--}}
            </h3>
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                @if(empty($generalInfo->thumbnail))
                                <img src="{{URL::to('images/profile-images/male.png')}}" class="img-responsive" alt="">
                                @else
                                    <img src="{{URL::to('images/profile-images/'.$generalInfo->thumbnail)}}" class="img-responsive" alt="">
                                @endif
                            </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> {{$generalInfo->name}} </div>
                                <div class="profile-usertitle-job"> {{$generalInfo->position}} </div>
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li class="active">
                                        <a href="#">
                                            <i class="icon-home"></i> Overview </a>
                                    </li>
                                    @if($generalInfo->id === Auth::id())
                                    <li>
                                        <a href="#">
                                            <i class="icon-settings"></i> Account Settings </a>
                                    </li>
                                    @endif
                                    <li>
                                        <a href="#">
                                            <i class="icon-info"></i> Help </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->
                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PORTLET -->
                                <div class="portlet light ">
                                    <div class="portlet-title">
                                        <div class="caption caption-md">
                                            <i class="icon-bar-chart theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">General Information</span>
                                            <span class="caption-helper hide">weekly stats...</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-scrollable table-scrollable-bordered">
                                            <table class="table table-hover table-light">
                                                <thead>
                                                <tr class="uppercase">
                                                    <th colspan="1"> Name </th>
                                                    <td> {{$generalInfo->name}} </td>
                                                </tr>
                                                <tr class="uppercase">
                                                    <th colspan="1"> Email </th>
                                                    <td> {{$generalInfo->email}} </td>
                                                </tr>
                                                <tr class="uppercase">
                                                    <th colspan="1"> Phone </th>
                                                    <td>{{$generalInfo->phone}}</td>
                                                </tr>
                                                <tr class="uppercase">
                                                    <th colspan="1">Branch</th>
                                                    <td>{{$generalInfo->branch}}</td>
                                                </tr>
                                                <tr class="uppercase">
                                                    <th colspan="1">Position</th>
                                                    <td>{{$generalInfo->position}}</td>
                                                </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PORTLET -->
                            </div>
                        </div>
                        <hr>
                        @if($generalInfo->id === Auth::id())
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN PORTLET -->
                                <div class="portlet light ">
                                    <div class="portlet-title">
                                        <div class="caption caption-md">
                                            <i class="icon-bar-chart theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Your Activity</span>
                                            <span class="caption-helper hide">weekly stats...</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm active">
                                                    <input type="radio" name="options" class="toggle" id="option1">Today</label>
                                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Week</label>
                                                <label class="btn btn-transparent grey-salsa btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Month</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row number-stats margin-bottom-30">
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="stat-left">
                                                    <div class="stat-chart">
                                                        <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                        <div id="sparkline_bar"></div>
                                                    </div>
                                                    <div class="stat-number">
                                                        <div class="title"> Total </div>
                                                        <div class="number"> 0 </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                <div class="stat-right">
                                                    <div class="stat-chart">
                                                        <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                                        <div id="sparkline_bar2"></div>
                                                    </div>
                                                    <div class="stat-number">
                                                        <div class="title"> New </div>
                                                        <div class="number"> 0 </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-scrollable table-scrollable-borderless">
                                            <table class="table table-hover table-light">
                                                <thead>
                                                <tr class="uppercase">
                                                    <th> MEMBER </th>
                                                    <th> Earnings </th>

                                                </tr>
                                                </thead>
                                                <tr>
                                                    <td>
                                                        <a href="javascript:;" class="primary-link">Brain</a>
                                                    </td>
                                                    <td> $345 </td>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PORTLET -->
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

@endsection
