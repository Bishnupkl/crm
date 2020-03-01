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
                        <a href="{{URL::to('admin')}}">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Task</span>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>All Task</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> All Task
                {{--<small>blank page layout</small>--}}
            </h3>
            <!-- END PAGE TITLE-->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light portlet-fit bordered">
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    {{--<div class="col-md-6">--}}

                                    {{--</div>--}}
                                    <div class="col-xs-6 col-md-4">
                                        <div class="input-group btn-group">
                                            <button class="btn btn-primary " data-toggle="modal" data-target="#createTask">
                                                New Task
                                                <!-- <i class="fa fa-plus"></i> -->
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-md-4 pull-right">
                                        <form action="{{route('task.index')}}" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search"
                                                   id="txtSearch"/>
                                            <div class="input-group-btn">
                                                <button class="btn btn-default" type="submit">
                                                    <span class="fa fa-search"></span>
                                                </button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="col-xs-6 col-md-4 pull-right">
                                      <div class="input-group btn-group pull-right">
                                        <a href="{{route('inquiry.create')}}" class="btn btn-default"> Assigned To Me
                                        </a>
                                      </div>
                                    </div>
                                </div>
                            </div>

                            {{--Create Task Modal Start--}}
                            <div id="createTask" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <!-- Modal content-->
                                    <div class="portlet box grace-blue form-outer-part">
                                        <div class="portlet-title">
                                            <div class="caption">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <i class="fa fa-plus"></i>
                                              <b>Create New Task</b>
                                            </div>
                                        </div>
                                        <div class="portlet-body form-inner-part">
                                          <form action="{{route('task.store')}}" method="POST" id="addPartner" enctype="multipart/form-data">
                                              {{csrf_field()}}
                                              <div class="modal-body">
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                          <div class="form-group">
                                                              <label><b>Title</b></label>
                                                              <input type="text" class="form-control"
                                                                     value="{{old('title')}}" name="title" required>
                                                              @if ($errors->has('title'))
                                                                  <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('title') }}</strong>
                                          </span>
                                                              @endif
                                                          </div>
                                                      </div>
                                                      <div class="col-md-12">
                                                          <div class="form-group">
                                                              <label><b>Description</b></label>
                                                              <textarea class="form-control" rows="3" name="description" required>
                                                                  {{old('description')}}
                                                              </textarea>
                                                              @if ($errors->has('description'))
                                                                  <span class="help-block">
                                              <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                          </span>
                                                              @endif
                                                          </div>
                                                      </div>

                                                      <div class="row">
                                                          <div class="col-md-12">
                                                          <div class="col-md-6 col-sm-12">
                                                              <div class="form-group">
                                                                  <label><b>Related To</b></label><br>

                                                                      <span class="radio-span"><input type="radio" class="radio-inline" name="related_to" id="related_to" value="Client">Client</span>
                                                                      <span class="radio-span"><input type="radio" class="radio-inline" id="related_to" name="related_to" value="Partner">Partner</span>
                                                                      <span class="radio-span"><input type="radio" class="radio-inline" id="related_to" name="related_to" value="Internal">Internal</span>

                                                              </div>
                                                          </div>


                                                     <div class="col-md-6">
                                                      <div class="form-group partner" style="display: none;" {{ $errors->has('discount_rate') ? ' has-error' : '' }}>
                                                          <label><b>Partner Name</b></label><br>
                                                          <select name="partner_id" class="form-control">
                                                              <option disabled="" selected>Select Partner</option>
                                                              @foreach($partner as $partners)
                                                                  <option value="{{$partners->id}}" {{(old('partner_id')=== $partners->id) ? 'selected' : ''}}>{{$partners->name}}</option>
                                                              @endforeach

                                                          </select>
                                                          @if ($errors->has('discount_rate'))
                                                              <span class="help-block">
                                                  <strong>{{ $errors->first('discount_rate') }}</strong>
                                              </span>
                                                          @endif
                                                      </div>
                                                     </div>
                                                          </div>
                                                  </div>

                                                 {{--Script to change the related to radio--}}
                                                  <script>
                                                      $(document).on('change','#related_to',function(){
                                                          var value = $(this).val();
                                                          console.log(value);
                                                          var testDetail = (document).getElementsByClassName('partner');
                                                          var testDetail1 = (document).getElementsByClassName('client');
                                                          var testDetail2 = (document).getElementsByClassName('internal');
                                                          if(value==='Partner'){
                                                              testDetail[0].style.display = 'block';
                                                              testDetail1[0].style.display = 'none';
                                                              testDetail2[0].style.display = 'none';
                                                          }else if(value==='Client') {
                                                              testDetail[0].style.display = 'none';
                                                              testDetail1[0].style.display = 'block';
                                                              testDetail2[0].style.display = 'none';
                                                          }else{
                                                              testDetail[0].style.display = 'none';
                                                              testDetail1[0].style.display = 'none';
                                                              testDetail2[0].style.display = 'block';
                                                          }
                                                      });
                                                  </script>

                                                  {{--Script End--}}

                                                      <div class="col-md-6">
                                                          <div class="form-group">
                                                              <label><b>Assignee</b></label>
                                                              <select class="form-control" name="assignee">
                                                                  <option value="">Select partners Category</option>
                                                                  @foreach($user as $users)
                                                                      <option
                                                                          value="{{$users->id}}" {{(old('assignee')=== $users->id) ? 'selected' : ''}}>{{$users->name}}</option>
                                                                  @endforeach
                                                              </select>
                                                              @if ($errors->has('assignee'))
                                                                  <span class="help-block">
                                      <strong class="text-danger">{{ $errors->first('assignee') }}</strong>
                                  </span>
                                                              @endif
                                                          </div>
                                                      </div>

                                                      <!-- <div class="col-md-6">
                                                          <div class="form-group">
                                                              <label><b>Due Date</b></label>
                                                              <div class="input-group input-medium date date-picker"
                                                                   data-date-format="dd-mm-yyyy"
                                                                   data-date-start-date="+0d">
                                                                  <input type="date" name="due_date" class="form-control">
                                                                  <span class="input-group-btn">
                                                              <button class="btn default" type="button">
                                                                  <i class="fa fa-calendar"></i>
                                                              </button>
                                                          </span>
                                                              </div>
                                                          </div>
                                                      </div> -->

                                                      <!-- DATE PICKER bootstrap-->
                                                      <div class="col-md-6">
                                                       <div class="form-group {{$errors->has('dob')? "has-error":""}}" style='margin-top:00px;'>
                                                         <label>Date of Birth</label>
                                                         <input type='text' name="dob" class="form-control" id='datepicker' style='width: 100%;' placeholder="mm/dd/yyyy" value="{{old('dob')}}">
                                                         @if ($errors->has('dob'))
                                                             <span class="help-block">
                                                             <strong class="text-danger">{{ $errors->first('dob') }}</strong>
                                                         </span>
                                                         @endif
                                                       </div>
                                                      </div>

                                                       <!-- Script -->
                                                       <script type="text/javascript">
                                                       $(document).ready(function(){
                                                        $('#datepicker').datepicker();
                                                       });
                                                       </script>

                                                      <!-- DATE PICKER Bootstrap END -->

                                                      <div class="col-md-12">
                                                          <label><b>Add Attachment</b></label>
                                                          <input type="file" name="files" class="custom-sm-spacing">
                                                      </div>
                                                  </div>
                                                  <hr>
                                                  <div align="center">
                                                      <input type="submit" class="btn blue button-submit"
                                                             value="Save">
                                                      <button type="button" class="btn btn-default"
                                                              data-dismiss="modal">Close
                                                      </button>
                                                  </div>
                                              </div>
                                          </form>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{--Task Modal End--}}

                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                        <thead>
                        <tr>
                            <th> S. No.</th>
                            <th> Subject</th>
                            <th> Status</th>
                            <th> Client Name</th>
                            <th> Partner</th>
                            <th> Created By</th>
                            <th> Assignee</th>
                            <th> Updated At</th>
                            <th> In Queue</th>
                            <th> Due Date</th>
                            <th> Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($task)>0)
                            @forelse($task as $key=>$tasks)
                                <tr>
                                    <td> {{++$key}} </td>
                                    <td> {{$tasks->title}} </td>
                                    <td>
                                        @if($tasks->is_completed == 0)
                                            To Do
                                        @else
                                            <span class="label red">Completed</span>
                                        @endif
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>{{$tasks->createdBy->name}}</td>
                                    <td>{{$tasks->assigneeBy->name}}</td>
                                    <td>{{$tasks->updated_at}}</td>
                                    <td></td>
                                    <td><span class="label label-danger">{{$tasks->due_date}}</span> </td>
                                    <td>
                                        <a href="{{route('task.edit',$tasks->id)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                        {{--<a href="{{route('inquiry.show',$inquiry->token)}}" class="btn btn-default"><i class="fa fa-eye"></i></a>--}}

                                        {{--<a href="{{route('inquiry.edit',$tasks->token)}}" class="btn btn-default"><i--}}
                                                {{--class="fa fa-dustbin"></i></a>--}}
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                        @endif
                        </tbody>
                    </table>
                    @if(isset($hold))
                    <div class="input-group">
                        {{$task->links()}}
                    </div>
                    @endif
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>

    <!-- END CONTENT BODY -->

    <!-- END CONTENT -->

@endsection
