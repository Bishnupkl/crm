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
                        <a href="index.html">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Follow Up</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>New Follow Up</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Add Follow Up
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form action="{{route('add.followup')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="inquiry_id" value="{{$id}}">
                        <div class="col-md-12 form-group">
                            <label>Enter follow up date</label>
                            <div class="form-group">
                                <input type="date" name="date" class="form-control">
                                @if($errors->has('date'))
                                    <span class="text-danger">{{$errors->first('date')}}</span><br>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Follow up Type</label>
                            <select class="form-group form-control" name="follow_type">
                                <option value="" selected>Select follow up type</option>
                                <option value="SMS" >SMS</option>
                                <option value="Phone" >Phone</option>
                            </select>
                            @if($errors->has('follow_type'))
                                <span class="text-danger">{{$errors->first('follow_type')}}</span><br>
                            @endif
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Reasons</label>
                            <div class="form-group">
                                <textarea name="reasons" class="wysihtml5 form-control" rows="6"></textarea>
                                @if($errors->has('reasons'))
                                    <span class="text-danger">{{$errors->first('reasons')}}</span><br>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 form-group">
                                <button class="btn btn-success">Add Follow Up</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

@endsection
