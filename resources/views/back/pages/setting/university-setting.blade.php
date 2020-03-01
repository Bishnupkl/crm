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
                        <span>Universities</span>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <center>
                @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{session('success')}}</div>
                @endif
            </center>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="containers">
                <h3 class="block">Universities</h3>
                <div class="table col-md-12">
                    <div class="col-md-8">
                        <table class="table table-striped table-hover table-bordered" id="dataTables">
                            <thead>
                            <tr>
                                <th> S. No. </th>
                                <th> University Name </th>
                                <th> Country</th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($universities as $key=>$university)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$university->name}}</td>
                                    <td>{{$university->country->name}}</td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <a href="{{route('university.edit',$university->id)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="{{route('university.destroy',$university->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-default" title="Delete"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-body panel-default">
                            <b>New University</b><hr>
                            <div class="form-group">
                                <form action="{{route('university.store')}}" method="POST">
                                    {{csrf_field()}}
                                        <div class="form-group">
                                            <label>University Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="University Name">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Country Name</label>
                                            <select name="country" class="form-control ">
                                                @foreach($countries as $country)
                                                    <option value="" selected> Select Country</option>
                                                    <option value ="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('country'))
                                                <span class="help-block">
                                                    <strong class="text-danger">{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <input type="submit" class="btn blue button-submit" value="Add">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

