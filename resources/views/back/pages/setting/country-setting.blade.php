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
                        <span>Countries</span>
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
                <h3 class="block">Countries</h3>
                <div class="table col-md-12">
                    <div class="col-md-8">
                        <table class="table table-striped table-hover table-bordered" id="dataTables">
                            <thead>
                            <tr>
                                <th> S. No. </th>
                                <th> Country Name </th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($countries as $key=>$country)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$country->name}}</td>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="col-md-2">

                                                <button type="button" class="passingValue btn btn-default" data-toggle="modal" data-target="#country" data-id="{{$country->name}}"><i class="fa fa-edit"></i></button>
                                            </div>
                                            <div class="col-md-2">
                                                <form action="{{route('country.destroy',$country->id)}}" method="post">
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
                    <script>
                        $(function () {
                            $(".passingValue").click(function () {
                                var my_id = $(this).data('id');
                                $(".modal-body #hiddenValue").val(my_id);
                            })
                        });

                    </script>

                    {{--Country Modal Start--}}
                    <div id="country" class="modal fade" role="basic" aria-hidden="true" tabindex="-1">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h3 class="modal-title"><b>Edit Country</b></h3>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="{{route('country.update','hiddenValue')}}" method="POST">
                                                {{method_field('PUT')}}
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" id="hiddenValue">
                                            <div class="form-group">
                                                <label>Country Name</label>
                                                <input type="text" class="form-control" value="{{old('name')}}" name="name" id="hiddenValue" placeholder="Partner Name">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn blue">Update</button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Country Modal End--}}

                    <div class="col-md-4">
                        <div class="panel panel-body panel-default">
                            <b>New Country</b><hr>
                            <div class="form-group">
                                <form action="{{route('country.store')}}" method="POST">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label>Country Name:</label>
                                        <input type="text" class="form-control" name="name" placeholder="Country Name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                        <span class="help-block"> </span>
                                        <input type="submit" class="btn blue button-submit" value="Add">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

