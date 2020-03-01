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
                        <span>Offices</span>
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
                <div class="col-md-12 form-group">
                    <br>
                    <button type="button" class="btn blue" data-toggle="modal" data-target="#partners">Add Office</button>
                </div>
                <div class="col-xs-6 col-md-4 pull-right">
                    <form action="{{route('offices.index')}}" method="get">
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
                <div class="col-md-12">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th> Email</th>
                            <th> Phone</th>
                            <th> Street</th>
                            <th> City</th>
                            <th> State</th>
                            <th> Country</th>
                            <th> Website</th>
                            <th> Fax</th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offices as $key=>$office)
                            <tr>
                                <td>{{$office->name}}</td>
                                <td>{{$office->email}}</td>
                                <td>{{$office->phone}}</td>
                                <td>{{$office->street}}</td>
                                <td>{{$office->city}}</td>
                                <td>{{$office->state}}</td>
                                {{--<td> {{$office->country->name}} </td>--}}
                                <td> </td>
                                <td>{{$office->website}}</td>
                                <td>{{$office->fax}}</td>
                                <td>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <a href="{{route('offices.edit',$office->id)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{route('offices.destroy',$office->id)}}" method="post">
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
                    @if(isset($hold))
                    <div class="input-group">
                        {{$offices->links()}}
                    </div>
                        @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="partners" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="portlet box grace-blue form-outer-part">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i> Add New Office </div>
                </div>
                <div class="portlet-body form-inner-part">
                    <form action="{{route('offices.store')}}" method="POST" id="addPartner">
                        {{csrf_field()}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Office Name</label>
                                        <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Partner Name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3><b>Address</b></h3>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Street</label>
                                        <input type="text" name="street" class="form-control" value="{{old('street')}}" placeholder="Street">
                                        @if ($errors->has('street'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('street') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" name="city" class="form-control" value="{{old('city')}}" placeholder="City">
                                        @if ($errors->has('city'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('city') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" name="state" class="form-control" value="{{old('state')}}" placeholder="State">
                                        @if ($errors->has('state'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('state') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Country Name</label>
                                        <select name="country_id" class="form-control ">
                                            @foreach($countries as $country)
                                                <option value="" selected> Select Country</option>
                                                <option value ="{{$country->id}}" {{(old('country')===$country->id) ? 'selected' : ''}}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3><b>Contact Details</b></h3>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="Phone Number">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>fax</label>
                                        <input type="text" name="fax" class="form-control" value="{{old('fax')}}" placeholder="Fax Number">
                                        @if ($errors->has('fax'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('fax') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" placeholder="http://example.com" value="{{old('website')}}">
                                        @if ($errors->has('website'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('website') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div><hr>
                            <div align="center">
                                <input type="submit" class="btn blue" value="Save">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
