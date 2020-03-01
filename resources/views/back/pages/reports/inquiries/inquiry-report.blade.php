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
                        <a href="{{url('reception')}}">Home</a>
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
            <div class="row" style="margin-top: 20px">
                <div class="col-xs-2 col-md-2">
                    <div class="form-group">
                        <a href="{{route('export.pdf')}}" class="btn blue">Export as PDF</a>
                    </div>
                </div>
                <div class="col-xs-2 col-md-2">
                    <div class="form-group" style="margin-left: -50px">
                        <a href="{{route('export.xlsx')}}" class="btn blue">Export as Excel</a>
                    </div>
                </div>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">All Inquiry
            </h3>
            <hr>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- PAGE CONTENT STARTED -->
            <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
                <thead>
                <tr>
                    <th>Token</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Gender</th>
                </tr>
                </thead>
                <tbody>
                @if(count($inquiries)>0)
                    @forelse($inquiries as $key=>$inquiry)
                        <tr class="odd gradeX">
                            <td>{{$inquiry->token}}</td>
                            <td>{{$inquiry->name}}</td>
                            <td class="center">{{$inquiry->email}}</td>
                            <td class="center">{{$inquiry->mobile}}</td>
                            <td class="center">&nbsp;{{$inquiry->temporary_address}}</td>
                            <td class="center">{{$inquiry->gender}}</td>
                        </tr>
                    @empty
                    @endforelse
                @endif
                </tbody>
            </table>
            <div class="input-group">

            </div>
            <!-- PAGE CONTENT ENDED -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

@endsection