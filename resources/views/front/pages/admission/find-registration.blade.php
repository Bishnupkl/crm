
<!-- END HEAD -->
@extends('front.layouts.master')
@section('content')
    <br><br>
    <div class="container" id="app">
        <div class="portlet light bordered" id="form_wizard_1">
            <div class="portlet-title">
                <div class="caption" >
                <!-- <a href="#"><img src="{{url('images/logo/Grace-Logo.png')}}" class="logo" alt=""></a> -->
                    <h2><b>FIND MY REGISTRATION</b></h2>
                </div>
            </div>
            <div class="portlet-body form">
                <div class="portlet-body form">
                    <form action="{{route('find.registration')}}" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group {{$errors->has('token')? 'has-error':''}}">
                                    <label for="name">Token
                                        <span class="required"> * </span>
                                    </label>
                                    <input type="text" name="token" value="{{old('token')}}" data-required="1" class="form-control" required/>
                                    @if ($errors->has('token'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('token') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Find Registration</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for success message -->
    <div id="success" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <p><b>{{session('eventMessage')}}</b></p>
                    <h4>Click <a href="{{route('admission','token='.session('token'))}}"><b>here</b></a> for Admission</h4><hr>
                    <a href="{{url('/')}}" class="btn btn-default">Go to Home</a>
                </div>
            </div>

        </div>
    </div>
    <!-- End Modal for success message-->
    <script>
        function testShow(){
            var x = document.getElementById("english_test");
            x.style.display = "block";
            console.log(x.style.display);
        }
        function testHide(){
            var x = document.getElementById("english_test");
            x.style.display = "none";
            console.log(x.style.display);
        }
        function rejectedShow(){
            var x = document.getElementById("rejection_reasons");
            x.style.display = "block";
            console.log(x.style.display);
        }
        function rejectedHide(){
            var x = document.getElementById("rejection_reasons");
            x.style.display = "none";
            console.log(x.style.display);
        }

    </script>
@endsection
<!-- BEGIN CORE PLUGINS -->
