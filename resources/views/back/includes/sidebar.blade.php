@section('sidebar')
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <li class="sidebar-toggler-wrapper hide">
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <div class="sidebar-toggler"> </div>
                        <!-- END SIDEBAR TOGGLER BUTTON -->
                    </li>
                    <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                    <li class="nav-item start ">
                        <a href="{{URL::to('/dashboard')}}" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title"> Dashboard</span>
                        </a>
                    </li>
                    <li class="heading">
                        <h3 class="uppercase">Features</h3>
                    </li>
                    {{--<li class="nav-item">--}}
                        {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                            {{--<i class="icon-settings"></i>--}}
                            {{--<span class="title"> Configurations</span>--}}
                            {{--<span class="arrow "></span>--}}
                        {{--</a>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="{{route('env.show')}}" class="nav-link ">--}}
                                    {{--<span class="title"> View Env File</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="{{route('pusher.config')}}" class="nav-link ">--}}
                                    {{--<span class="title"> Pusher Setup</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="{{route('mail.config')}}" class="nav-link ">--}}
                                    {{--<span class="title"> Mail Setup</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item start ">--}}
                        {{--<a href="javascript:;" class="nav-link nav-toggle">--}}
                            {{--<i class="fa fa-object-group"></i>--}}
                            {{--<span class="title"> Input Control</span>--}}
                            {{--<span class="arrow"></span>--}}
                        {{--</a>--}}
                        {{--<ul class="sub-menu">--}}
                            {{--<li class="nav-item">--}}
                                {{--<a href="{{route('country.create')}}" class="nav-link ">--}}
                                    {{--<span class="title"> Country</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item  ">--}}
                                {{--<a href="{{route('intake.create')}}" class="nav-link ">--}}
                                    {{--<span class="title"> Intake</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="nav-item  ">--}}
                                {{--<a href="{{route('course.create')}}" class="nav-link ">--}}
                                    {{--<span class="title"> Course</span>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <li class="nav-item start ">
                        <a href="{{route('office.check.in')}}" class="nav-link ">
                            <i class="fa fa-bicycle"></i>
                            <span class="title"> Office Check In</span>

                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{route('followup')}}" class="nav-link ">
                            <i class="fa fa-building"></i>
                            <span class="title"> Follow Up</span>

                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('inquiry.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-question-circle"></i>
                            <span class="title"> Inquiry</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('inquiry.index')}}" class="nav-link nav-toggle">
                            <i class="icon-anchor"></i>
                            <span class="title"> Application</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{route('partners.create')}}" class="nav-link nav-toggle">
                            <i class="fa fa-object-group"></i>
                            <span class="title"> Partners</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-money"></i>
                            <span class="title"> Accounts</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="{{route('invoice')}}" class="nav-link ">
                                    {{--<i class="fa fa-building"></i>--}}
                                    <span class="title"> Invoices</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('payment')}}" class="nav-link ">
                                    {{--<i class="icon-user"></i>--}}
                                    <span class="title"> Payments</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-users"></i>
                            <span class="title"> Teams</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="{{route('offices.index')}}" class="nav-link ">
                                    {{--<i class="fa fa-building"></i>--}}
                                    <span class="title"> Offices</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link ">
                                    {{--<i class="icon-user"></i>--}}
                                    <span class="title"> Users</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{route('task.create')}}" class="nav-link nav-toggle">
                            <i class="fa fa-briefcase"></i>
                            <span class="title"> Tasks</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="{{route('products.index')}}" class="nav-link nav-toggle">
                            <i class="fa fa-book"></i>
                            <span class="title"> Products</span>
                        </a>
                    </li>
                    <li class="nav-item start ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="fa fa-file"></i>
                            <span class="title"> Reports</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="{{route('report.inquiry')}}" class="nav-link ">
                                    {{--<i class="fa fa-building"></i>--}}
                                    <span class="title"> Inquiries</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('users.index')}}" class="nav-link ">
                                    {{--<i class="icon-user"></i>--}}
                                    <span class="title"> Partners</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->

@endsection
