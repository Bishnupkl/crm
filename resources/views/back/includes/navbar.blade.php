@section('navbar')
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{URL::to('/dashboard')}}">

                    <img src="{{URL::to('images/logos/graceintllogo.png')}}" alt="logo" class="logo-default" width="110px" /> </a>
                <div class="menu-toggler sidebar-toggler"> </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu" id="app">
                <ul class="nav navbar-nav pull-right">

                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default"> {{count(Auth::user()->unreadNotifications)}} </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 250px;"><ul class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283" data-initialized="1">
                                        @if(count(Auth::user()->notifications)>0)
                                        @foreach(Auth::user()->notifications as $notification)
                                            <li>
                                                <a href="{!! $notification->data['url'] !!}">
                                                    <span class="time">{{$notification->created_at->diffForHumans()}}</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-bell"></i>
                                                        </span> {{ $notification->data['data'] }} </span>
                                                </a>
                                            </li>
                                        @endforeach
                                        @endif
                                        <!-- END NOTIFICATION DROPDOWN -->
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="{{URL::to('images/profile-images/male.png')}}" />
                            <span class="username username-hide-on-mobile"> {{Auth::user()->name}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>
                            <li>
                                <a href="{{route('logout')}}">
                                    <i class="icon-key"></i> Log Out </a>

                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROP-DOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "drop-down-dark" class after below "drop-down-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="javascript:;" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->

@endsection
