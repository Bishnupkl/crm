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
                        <span>Edit Task</span>
                    </li>
                </ul>
            </div>
            <!-- END PAGE BAR -->
            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title">
                {{--<small>blank page layout</small>--}}
            </h3>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="portlet box blue ">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-edit"></i> Edit Task
                            </div>
                        </div>
                        <div class="portlet-body">
                            <form action="{{route('task.update',$task->id)}}" method="POST" id="addPartner"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label><b>Title</b></label>
                                        <input type="text" class="form-control"
                                               value="{{$task->title}}" name="title" required>
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
                                                                {{$task->description}}
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
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><b>Related To</b></label><br>

                                                <input type="radio" class="radio-inline" name="related_to"
                                                       id="related_to" value="Client" @if($task->related_to == 'Client') checked @endif>Client
                                                <input type="radio" class="radio-inline" id="related_to"
                                                       name="related_to" value="Partner" @if($task->related_to == 'Partner') checked @endif>Partner
                                                <input type="radio" class="radio-inline" id="related_to"
                                                       name="related_to" value="Internal" @if($task->related_to == 'Internal') checked @endif>Internal

                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <div class="form-group partner"
                                                 style="display: none;" {{ $errors->has('partner_id') ? ' has-error' : '' }}>
                                                <label><b>Partner Name</b></label><br>
                                                <select name="partner_id" class="form-control">
                                                    <option disabled="" selected>Select Partner</option>
                                                    @foreach($partner as $partners)
                                                        <option
                                                            value="{{$partners->id}}" {{(old('partner_id')=== $partners->id) ? 'selected' : ''}}>{{$partners->name}}</option>
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
                                    $(document).on('change', '#related_to', function () {
                                        var value = $(this).val();
                                        console.log(value);
                                        var testDetail = (document).getElementsByClassName('partner');
                                        var testDetail1 = (document).getElementsByClassName('client');
                                        var testDetail2 = (document).getElementsByClassName('internal');
                                        if (value === 'Partner') {
                                            testDetail[0].style.display = 'block';
                                            testDetail1[0].style.display = 'none';
                                            testDetail2[0].style.display = 'none';
                                        } else if (value === 'Client') {
                                            testDetail[0].style.display = 'none';
                                            testDetail1[0].style.display = 'block';
                                            testDetail2[0].style.display = 'none';
                                        } else {
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

                                            @foreach($user as $users)

                                                @if(isset($task->assignee))
                                                    <option value ="{{$users->id}}" @if($task->assignee == $users->id) selected='selected' @endif>{{$users->name}}</option>
                                                @else
                                                    <option value="">Select partners Category</option>
                                                    <option value ="{{$users->id}}" {{(old('country')===$users->id) ? 'selected' : ''}}>{{$users->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('assignee'))
                                            <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('assignee') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><b>Due Date</b></label>
                                        <div class="input-group input-medium date date-picker"
                                             data-date-format="dd-mm-yyyy"
                                             data-date-start-date="+0d">
                                            <input type="date" name="due_date" class="form-control" value="{{$task->due_date}}">
                                            <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label><b>Add Attachment</b></label>
                                    <input type="file" name="files" class="form-control">
                                    </div>
                                </div>


                                <hr>
                                <div align="center">
                                    <input type="submit" class="btn blue button-submit"
                                           value="Update">
                                    <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
