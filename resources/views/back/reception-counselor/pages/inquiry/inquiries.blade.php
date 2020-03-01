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
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">All Inquiry
            </h3>

            @if(session('success'))
                <div class=" alert alert-success">
                {{session('success')}}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
            @endif


                {{--<div class=" alert alert-danger" id="successMessage" style="display: none">--}}
                {{--</div>--}}

            <hr>
            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <div class="form-group">
                        <a href="{{route('inquiry.create')}}" class="btn blue">
                            Create Inquiry
                        </a>
                    </div>
                    <div class="input-group">
                        {{$inquiries->links()}}
                    </div>
                </div>
                <div class="col-xs-6 col-md-4 pull-right">
                    <form action="{{route('inquiry.index')}}" method="get">
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
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <!-- PAGE CONTENT STARTED -->
            <div class="col-md-12">
                <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
                    <thead>
                    <tr>
                        <th>Token</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>Action </th>
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
                                <td class="center">
                                    <a class = "btn btn-success" href="{{route('inquiry.show',$inquiry->token.'#personalInformation')}}"><i class="fa fa-eye"></i></a>
                                     &nbsp;<button  class="btn btn-danger" data-token="{{$inquiry->token}}" id="deleteConfirmation" data-toggle="modal" data-target="#deleteConfirmationModal"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="input-group">
                {{$inquiries->links()}}
            </div>
            <!-- PAGE CONTENT ENDED -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    {{--Modal--}}
    <div id="deleteConfirmationModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="portlet box grace-blue form-outer-part">
                 <div class="portlet-body form-inner-part">
                    <form action="" method="post" id="followupForm">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <label for="delete">Do You really want to delete ? </label>
                        <div id="deleteToken"></div>
                        <div class="form-group" align="center">
                            <button class="btn btn-primary">Delete</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).on('click','#deleteConfirmation',function(){
            // $('#deleteConfirmationModal').modal('show');
            var token =$(this).data('token');
            var url = '{{route('inquiry.destroy',':token')}}';
            url = url.replace(':token',token);
            $('#followupForm').attr('action',url);
        });
    </script>
@endsection