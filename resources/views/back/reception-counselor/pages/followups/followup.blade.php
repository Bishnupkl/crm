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
                        <span>Followup</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            @if(session('error'))
                <div class="alert alert-success">{{session('error')}} </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{session('success')}} </div>
            @endif
            <hr>
            {{--BEGIN TABS--}}
            <div class="row">

                    <div class="form-group detail-nav" style="margin-top: -35px">
                        <ul class="nav nav-pills">
                            <li class="active"><a data-toggle="pill" href="#notVisited">Not Visited</a></li>
                            <li><a  data-toggle="pill" href="#notComing">Not Coming</a></li>
                            <li><a data-toggle="pill" href="#visited">Visited</a></li>
                            <li><a data-toggle="pill" href="#all">All</a></li>
                        </ul>
                    </div>

            </div>

            <div class="row">
                <div class="col-xs-2 col-md-2">
                    <div class="form-group">
                        <a href="{{route('add.followup')}}" class="btn blue">New Followup</a>
                    </div>
                </div>
                <div class="col-xs-6 col-md-4 pull-right">
                    <form action="{{route('follow.up.search')}}" method="get">
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

            <div class="tab-content">
                <div class="col-md-12 tab-pane fade in active" id="notVisited">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
                        <thead>
                        <tr>
                            {{--<th> S. No. </th>--}}
                            <th> Inquiry </th>
                            <th> Date </th>
                            <th>Reasons</th>
                            <th>Results</th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($notVisitedFollowups)>0)
                            @forelse($notVisitedFollowups as $key=>$followup)
                                <tr>
                                    {{--<td> {{++$key}} </td>--}}
                                    <td>
                                        <a href="{{route('inquiry.show',$followup->inquiry->token)}}"><b>{{$followup->inquiry->name}}</b><br></a>Token : <a href="{{route('inquiry.show',$followup->inquiry->token)}}">{{$followup->inquiry->token}}</a>
                                    </td>
                                    <td class="center">{{date('M jS Y',strtotime($followup->date))}} </td>
                                    <td>{!! $followup->reasons !!}</td>

                                    <td>{!! $followup->results !!}</td>
                                    <td>
                                        <button class="btn btn-default" value="{{$followup->id}}" id="reFollowup" data-toggle="modal" data-target="#reFollowupModal" title="Re-followup"><i class="fa fa-bullhorn"></i></button>
                                        <button class="btn btn-danger" value="{{$followup->id.'n'}}" id="deleteFollowup" data-toggle="modal" data-target="#deleteReFollowup" title="Delete-OfficecheckIn"><i class="fa fa-trash"></i></button>

                                        {{--<button onclick="window.location.href='{{route('followup.delete',$followup->id)}}'" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>--}}
                                        <a href="{{route('edit.followup',$followup->id)}}" class="btn btn-default"><i class="fa fa-edit"></i> </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12 tab-pane fade in" id="notComing">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
                        <thead>
                        <tr>
                            {{--<th> S. No. </th>--}}
                            <th> Inquiry </th>
                            <th> Date </th>
                            <th>Reasons</th>
                            <th>Results</th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($notComingFollowups)>0)
                            @forelse($notComingFollowups as $key=>$followup)
                                <tr>
                                    {{--<td> {{++$key}} </td>--}}
                                    <td>
                                        <a href="{{route('inquiry.show',$followup->id)}}"><b>{{$followup->inquiry->name}}</b><br></a>Token : <a href="{{route('inquiry.show',$followup->inquiry->token)}}">{{$followup->inquiry->token}}</a>
                                    </td>
                                    <td class="center">{{date('M jS Y',strtotime($followup->date))}} </td>
                                    <td>{!! $followup->reasons !!}</td>

                                    <td>{!! $followup->results !!}</td>
                                    <td>

                                        <button class="btn btn-default" value="{{$followup->id}}" id="reFollowup" data-toggle="modal" data-target="#reFollowupModal" title="Re-followup"><i class="fa fa-bullhorn"></i></button>

                                        <button class="btn btn-danger" value="{{$followup->id.'c'}}" id="deleteFollowup" data-toggle="modal" data-target="#deleteReFollowup" title="Delete-OfficecheckIn"><i class="fa fa-trash"></i></button>
                                        {{--<a href="{{route('edit.followup',$followup->id)}}" class="btn btn-default"><i class="fa fa-edit"></i> </a>--}}
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        @endif
                        </tbody>
                    </table>

                </div>

            <div class="col-md-12 tab-pane fade in" id="visited">
                <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
                    <thead>
                    <tr>
                        {{--<th> S. No. </th>--}}
                        <th> Inquiry </th>
                        <th> Date </th>
                        <th>Reasons</th>
                        <th>Results</th>
                        <th> Action </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($visitedFollowups)>0 )
                        @forelse($visitedFollowups as $key=>$followup)
                            <tr>
                                {{--<td> {{++$key}} </td>--}}
                                <td>
                                    <a href="{{route('inquiry.show',$followup->inquiry->token)}}"><b>{{$followup->inquiry->name}}</b><br></a>Token : <a href="{{route('inquiry.show',$followup->inquiry->token)}}">{{$followup->inquiry->token}}</a>
                                </td>
                                <td class="center">{{date('M jS Y',strtotime($followup->date))}} </td>
                                <td>{!! $followup->reasons !!}</td>
                                <td>{!! $followup->results !!}</td>
                                <td>
                                    <button class="btn btn-default" value="{{$followup->inquiry->token}}" id="reFollowup" data-toggle="modal" data-target="#reFollowupModal" title="Re-followup"><i class="fa fa-bullhorn"></i></button>
                                    <button class="btn btn-danger" value="{{$followup->id.'v'}}" id="deleteFollowup" data-toggle="modal" data-target="#deleteReFollowup" title="Delete-OfficecheckIn"><i class="fa fa-trash"></i></button>
                                    {{--<a href="{{route('edit.followup',$followup->id)}}" class="btn btn-default"><i class="fa fa-edit"></i> </a>--}}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    @endif
                    </tbody>
                </table>
            </div>
                <div class="col-md-12 tab-pane fade in" id="all">
                    <table class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline" role="grid" aria-labelledby="dataTables-example_info" width="100%" id="dataTables">
                        <thead>
                        <tr>
                            {{--<th> S. No. </th>--}}
                            <th> Inquiry </th>
                            <th> Date </th>
                            <th>Reasons</th>
                            <th>Results</th>
                            <th>Status</th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($followups)>0)
                            @forelse($followups as $key=>$followup)
                                <tr>
                                    {{--<td> {{++$key}} </td>--}}
                                    <td>
                                        <a href="{{route('inquiry.show',$followup->id)}}"><b>{{$followup->inquiry->name}}</b><br></a><small>Token : <a href="{{route('inquiry.show',$followup->inquiry->token)}}">{{$followup->inquiry->token}}</a></small>
                                    </td>
                                    <td class="center">{{date('M jS Y',strtotime($followup->date))}} </td>
                                    <td>{!! $followup->reasons !!}</td>
                                    <td>{!! $followup->results !!}</td>
                                    <td>
                                        @if($followup->status=='Not visited' && $followup->date<date('m/d/Y'))
                                            {{'Not Coming'}}
                                        @else
                                            {!! $followup->status !!}
                                        @endif
                                    </td>
                                    <td style="width: 160px">
                                        <button class="btn btn-default" value="{{$followup->id}}" id="reFollowup" data-toggle="modal" data-target="#reFollowupModal" title="Re-followup"><i class="fa fa-bullhorn"></i></button>
                                        <button class="btn btn-danger" value="{{$followup->id.'a'}}" id="deleteFollowup" data-toggle="modal" data-target="#deleteReFollowup" title="Delete-Followup"><i class="fa fa-trash"></i></button>
                                        <a href="{{route('edit.followup',$followup->id)}}" class="btn btn-default"><i class="fa fa-edit"></i> </a>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                    @if(!isset($hold))
                    <div class="input-group">
                        {{$followups->links()}}
                    </div>
                    @endif
                    @if(isset($hold))
                        <div class="input-group">
                            {{$followups->links()}}
                        </div>
                    @endif
                </div>
            </div>
            </div>
            <!-- PAGE CONTENT ENDED -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

    <!-- Modal -->
    <div id="resultModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="portlet box grace-blue form-outer-part">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i>Add Followup Result </div>
                </div>
                <div class="portlet-body form-inner-part">
                    <div class="row">
                        <form action="{{route('followup.result')}}" method="post">
                            {{csrf_field()}}
                            <div id="followup_id">

                            </div>
                            <div class="col-md-12 form-group">
                                <div class="form-group">
                                    <label><b>Followup Results</b></label>
                                    <textarea class="form-control" name="results" rows="3" required></textarea>
                                    @if($errors->has('results'))
                                        <span class="text-danger">{{$errors->first('results')}}</span><br>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 pull-right">
                                <button type="submit" class="btn btn-primary">Add Result</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Re-followup--}}
    <!-- Modal -->
    <div id="reFollowupModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="portlet box grace-blue form-outer-part">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-plus"></i>Create re-follow-up</div>
                </div>
                <div class="portlet-body form-inner-part">
                    <form  method="post" id="followupForm">
                        {{csrf_field()}}
                        <input type="hidden" name="followup_id" id="reFollowToken">
                        <div class="form-group {{$errors->has('previous_results')? "has-error":""}}">
                            <label><b>Previous Followup Results</b></label>
                            <textarea name="previous_results" id="previous_results" class="form-control" rows="6">{{old('previous_results')}}</textarea>
                            @if ($errors->has('previous_results'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('previous_results') }}</strong>
                                </span>
                            @endif
                            <span style="color: red;" id="errorNameOfPrevious_result"></span>
                        </div>
                        <div class="form-group">
                            <label><b>Enter follow up date</b></label>
                            <div class="form-group {{$errors->has('date')? "has-error":""}}">
                                <input type="date" name="date"  id="date" value="{{old('date')}}" class="form-control">
                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                                <span style="color: red;" id="errorNameOfFollowup_date"></span>
                            </div>
                        </div>
                        {{--<div class="form-group {{$errors->has('follow_type')? "has-error":""}}">--}}
                            {{--<label><b>Follow up Type</b></label>--}}
                            {{--<select class="form-group form-control" name="follow_type">--}}
                                {{--<option value="" selected>Select follow up type</option>--}}
                                {{--<option value="SMS" {{(old('follow_type')==='SMS') ? 'selected' : ''}}>SMS</option>--}}
                                {{--<option value="Phone" {{(old('follow_type')==='Phone') ? 'selected' : ''}}>Phone</option>--}}
                            {{--</select>--}}
                            {{--@if ($errors->has('follow_type'))--}}
                                {{--<span class="help-block">--}}
                                    {{--<strong>{{ $errors->first('follow_type') }}</strong>--}}
                                {{--</span>--}}
                            {{--@endif--}}
                        {{--</div>--}}

                        <div class="form-group {{$errors->has('reasons')? "has-error":""}}">
                            <label><b>Reasons</b></label>
                            <textarea name="reasons" id="reasons" class="form-control" rows="6">{{old('reasons')}}</textarea>
                            @if ($errors->has('reasons'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reasons') }}</strong>
                                </span>
                            @endif
                            <span style="color: red;" id="errorNameOfReasons"></span>
                        </div>

                        <div class="form-group" align="center">
                            <button class="btn btn-primary" id="reFollowButton">Submit</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--Re-followup--}}

    {{--modal--}}
    <div id="deleteReFollowup" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
            <!-- Modal content-->
            <div class="portlet box grace-blue form-outer-part">
                <div class="portlet-body form-inner-part">
                    <form action="" method="post" id="deleteFollowForm">
                        {{csrf_field()}}
                        {{--<input type="hidden" name="delete_id" id="deleteConfirmId">--}}
                        {{--<input type="hidden" name="re_follow_up" value="re-follow-up">--}}
                        <label for="delete">Do You really want to delete ? </label>
                        <div class="form-group" align="center">

                            <button class="btn btn-primary">Delete</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--DeleteFollowup--}}

    <script>
        $(document).on('click','#followResult', function () {
           var id = $(this).val();
           $('#followup_id').append('<input type="hidden" name="id" value="'+id+'">');
        });
        $(document).on('click','#reFollowup', function () {
            var id = $(this).val();
            {{-- var url = "{{route('add.followup',':token')}}";--}}
            //  url = url.replace(':token',token);
            $('#reFollowToken').attr('value',id);
        });

        $(document).on('click','#deleteFollowup',function(){
           var id=$(this).val();
           var url='{{route('followup.delete',':id')}}';
           url=url.replace(':id',id);
           $('#deleteFollowForm').attr('action',url);
        });

        $(document).on('click','#reFollowButton',function (event) {
                event.preventDefault();

                var previous_results=$('#previous_results').val();
                var date=$('#date').val();
                var reasons=$('#reasons').val();
                var followup_id =$('#reFollowToken').val();

                var  csrf='{{csrf_token()}}';

              $.ajax({
                  type:'POST',
                  url:'re-followups',
                  data:{
                      previous_results,
                      date,
                      reasons,
                      followup_id,
                      _token:csrf,
                  },

                  success:function (data) {
                      window.location.reload();

                  },
                  error:function (error) {
                      if(error.status===413){
                          console.log('Unknown Error');
                      }
                      else if(error.status===422){
                          var invalid=JSON.parse(error.responseText);
                          console.log(invalid);

                          if(invalid.previous_results!=='undefined'){
                              $('#errorNameOfPrevious_result').empty();
                              $('#errorNameOfPrevious_result').append(invalid.errors.previous_results);
                          }
                          if(invalid.date!=='undefined'){
                              $('#errorNameOfFollowup_date').empty();
                              $('#errorNameOfFollowup_date').append(invalid.errors.date);
                          }
                          if(invalid.reasons!=='undefined'){
                              $('#errorNameOfReasons').empty();
                              $('#errorNameOfReasons').append(invalid.errors.reasons);

                          }
                      }

                  }


              });
            });
    </script>
@endsection
