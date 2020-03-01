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
                        <span>Products</span>
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
                    <a href="{{route('products.create')}}" class="btn blue">Add Product</a>
                </div>
                <div class="col-xs-6 col-md-4 pull-right">
                    <form action="{{route('products.search')}}" method="get">
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
                            <th>S.N</th>
                            <th> Fee type</th>
                            <th> Duration </th>
                            <th> Fee amount</th>
                            <th> Fee term</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $key=>$product)
                            <tr>
                                <td align="center">
                                   {{++$key}}
                                </td>
                                <td>
                                    {{$product->productFee[0]->fee_type}}
                                </td>
                                <td>{{$product->duration}}</td>
                                <td>{{$product->productFee[0]->fee_amount}}</td>
                                <td>{{$product->productFee[0]->fee_term}}</td>
                                <td>
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{route('products.destroy',$product->id)}}" method="post">
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
                            {{$products->links()}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection