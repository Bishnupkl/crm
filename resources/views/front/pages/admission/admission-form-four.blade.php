
<!-- END HEAD -->
@extends('front.layouts.master')
@section('content')
{{--    <div class="banner"><img src="{{url('images/banner/cover.png')}}" class="" alt=""></div>--}}
    <div class="container" id="app">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption" >
                    <h2><b>ADMISSION FORM - STEP FOUR</b></h2>
                </div>
            </div>
            <div class="portlet-body">
                <div class="portlet-body">
                        <div class="form-wizard">
                            <div class="form-body">
                                {{--<form action="{{route('admission.two')}}" id="admission_form_two" method="post" enctype="multipart/form-data">--}}
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <h2><b>Academic History</b></h2>
                                        </div>
                                    </div>
                                <div id="error" style="display:none;">
                                    <!-- Error and Success Message -->
                                    <div class="alert alert-warning"><i class="fa fa-check-square"></i>Selected files are too large. Files must be less then 2 MB </div>
                                    <!-- Error and Success Message -->
                                </div>
                                    <hr>
                                        <div class="academic">
                                            <div id="edu">
                                                <div class="col-md-12 academic">
                                                    <div class="portlet-body form">
                                                        <!-- SLC DOCUMENT STARTS -->
                                                        <div id="slc_message" style="display:none;">
                                                            <!-- Error and Success Message -->
                                                            <div class="alert alert-success"><i class="fa fa-check-square"></i>You have successfully submitted documents of SLC/SEE </div>
                                                        <!-- Error and Success Message -->
                                                        </div>
                                                        
                                                        {{--@if(count($detail->documents()->where('qualification','SLC-SEE')->get())<1)--}}
                                                        
                                                        <div class="row" id="slc_document" @if(count($detail->documents()->where('qualification','SLC-SEE')->get())>0) style="display: none" @endif>
                                                            <h3>SLC/SEE DOCUMENTS</h3>
                                                            <div class="col-md-12 slc">
                                                                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                                                <form id="slcForm" enctype="multipart/form-data" method="post">
                                                                    <input type="hidden" name="token" value="{{$detail->token}}" id="token">
                                                                    <input type="hidden" name="qualification" value="slc" id="qualification">
                                                                    <div class="row">
                                                                        <div class="form-group col-md-12">
                                                                            <input type="hidden" id="character" value="character">
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">Upload Marksheet
                                                                                    <span class="required" aria-required="true"> * </span>
                                                                                </label><br>
                                                                                <span class="btn green btn-block fileinput-button" onclick="Upload(0);">
                                                                                    <i class="fa fa-plus"></i>
                                                                                    <span> Add files... </span>
                                                                                    <input type="file" class="blah2" style="display:none;"  id="slc_mark_sheet" name="slc_mark_sheet" onchange="readURL(this);">
                                                                                </span>
                                                                                <span class="error" id="slc_mark_sheet_error" style="display: none;"></span>
                                                                                <div class="image col-md-12">
                                                                                    <img id="blah2" class="slc_mark_sheet" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">Upload Character Certificate
                                                                                    <span class="required" aria-required="true"> * </span>
                                                                                </label><br>
                                                                                <span class="btn green btn-block fileinput-button" onclick="Upload(1);">
                                                                                    <i class="fa fa-plus"></i>
                                                                                    <span> Add files... </span>
                                                                                    <input type="file" class="blah3" style="display:none;" name="slc_character" onchange="readURL(this);" id="slc_character">
                                                                                </span>
                                                                                <span class="error" id="slc_character_error" style="display: none;">Please Select an Image</span>
                                                                                <div class="image col-md-12">
                                                                                    <img id="blah3" class="slc_character" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label class="control-label">Upload Any Other Certificate
                                                                                    <span class="required" aria-required="true"> * </span>
                                                                                </label><br>
                                                                                <span class="btn green btn-block fileinput-button" onclick="Upload(2);">
                                                                                    <i class="fa fa-plus"></i>
                                                                                    <span> Add files... </span>
                                                                                    <input type="file" class="blah4" style="display:none;" name="slc_other" onchange="readURL(this);" id="slc_other">
                                                                                </span>
                                                                                <span class="error" id="slc_other_error" style="display: none;">Please Select an Image</span>
                                                                                <div class="image col-md-12">
                                                                                    <img id="blah4" class="slc_other" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group col-md-12"><hr>
                                                                            <input type="submit" onclick="upload(0)" id="slc_submit" value="UPLOAD" class="btn btn-success btn-lg">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    
                                                        {{--@else--}}
                                                        <!-- Error and Success Message -->
                                                            <div class="alert alert-success" @if(count($detail->documents()->where('qualification','SLC-SEE')->get())<1) style="display: none" @endif><i class="fa fa-check-square"></i>You have already submitted documents of SLC/SEE</div>
                                                        <!-- Error and Success Message -->
                                                        
                                                        {{--@endif--}}
                                                        <!-- SLC DOCUMENT ENDS -->
                                                        <div id="plus_two_message" style="display:none;">
                                                            <!-- Error and Success Message -->
                                                                <div class="alert alert-success"><i class="fa fa-check-square"></i>You have successfully submitted documents of plus two</div>
                                                        <!-- Error and Success Message -->
                                                        </div>
                                                        {{--@if(count($detail->documents()->where('qualification','+2')->get())<1)--}}
                                                        <div class="row" id="plus_two" @if(count($detail->documents()->where('qualification','+2')->get())>0) style="display: none" @endif>
                                                            <h3>INTERMEDIATE LEVEL DOCUMENTS</h3>
                                                            <form id="plusTwoForm" enctype="multipart/form-data" method="post">
                                                                <input type="hidden" name="token" value="{{$detail->token}}" id="token">
                                                                <input type="hidden" name="qualification" value="+2" id="qualification">
                                                                <div class="col-md-12 +2">
                                                                    <div class="form-group col-md-12">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Upload Marksheet
                                                                                <span class="required" aria-required="true"> * </span>
                                                                            </label><br>
                                                                            <span class="btn green btn-block fileinput-button" onclick="Upload(3);">
                                                                                <i class="fa fa-plus"></i>
                                                                                <span> Add files... </span>
                                                                                <input type="file" class="blah5" name="plus_two_mark_sheet" onchange="readURL(this);" id="plus_two_mark_sheet" style="display: none;">
                                                                            </span>
                                                                            <span class="error" id="plus_two_mark_sheet_error" style="display: none;"></span>
                                                                            <div class="image col-md-12">
                                                                                <img id="blah5" class="plus_two_mark_sheet" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Upload Character Certificate
                                                                                <span class="required" aria-required="true"> * </span>
                                                                            </label><br>
                                                                            <span class="btn green btn-block fileinput-button" onclick="Upload(4);">
                                                                                <i class="fa fa-plus"></i>
                                                                                <span> Add files... </span>
                                                                                <input type="file" class="blah6" name="plus_two_character" onchange="readURL(this);" id="plus_two_character" style="display: none;">
                                                                            </span>
                                                                            <span class="error" id="plus_two_character_error" style="display: none;"></span>
                                                                            <div class="image col-md-12">
                                                                                <img id="blah6" class="plus_two_character" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Upload Any Other Certificate
                                                                                <span class="required" aria-required="true"> * </span>
                                                                            </label><br>
                                                                            <span class="btn green btn-block fileinput-button" onclick="Upload(5);">
                                                                                <i class="fa fa-plus"></i>
                                                                                <span> Add files... </span>
                                                                                <input type="file" class="blah7" name="plus_two_other" onchange="readURL(this);" id="plus_two_other" style="display: none;">
                                                                            </span>
                                                                            <span class="error" id="plus_two_other_error" style="display: none;"></span>
                                                                            <div class="image col-md-12">
                                                                                <img id="blah7" class="plus_two_other" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-12"><hr>
                                                                                <input type="submit" onclick="upload(0)" id="plus_two_submit" value="UPLOAD" class="btn btn-success btn-lg">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        {{--@else--}}
                                                        
                                                        <!-- Error and Success Message -->
                                                            <div class="alert alert-success" @if(count($detail->documents()->where('qualification','+2')->get())<1) style="display: none" @endif><i class="fa fa-check-square"></i>You have already submitted documents of plus two</div>
                                                        <!-- Error and Success Message -->
                                                        
                                                        {{--@endif--}}
                                                        <div id="bachelor_message" style="display:none;">
                                                            <!-- Error and Success Message -->
                                                            <div class="alert alert-success"><i class="fa fa-check-square"></i>You have successfully submitted documents of bachelor degree </div>
                                                            <!-- Error and Success Message -->
                                                        </div>
                                                        {{--@if(count($detail->documents()->where('qualification','bachelor')->get())<1)--}}
                                                        <div class="row" id="bachelorDocument" @if(count($detail->documents()->where('qualification','bachelor')->get())>0) style="display: none" @endif>
                                                            <h3>BACHELOR LEVEL DOCUMENTS</h3>
                                                            <form id="bachelorForm" enctype="multipart/form-data" method="post">
                                                                <div class="col-md-12 bachelor">
                                                                    <div class="form-group col-md-12">
                                                                        <br>
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Upload Marksheet
                                                                                <span class="required" aria-required="true"> * </span>
                                                                            </label><br>
                                                                            <span class="btn green btn-block fileinput-button" onclick="Upload(6);">
                                                                                <i class="fa fa-plus"></i>
                                                                                <span> Add files... </span>
                                                                                <input type="file" class="blah8" name="bachelor_mark_sheet" onchange="readURL(this);" id="bachelor_mark_sheet" style="display: none;">
                                                                            </span>
                                                                            <span class="error" id="bachelor_mark_sheet_error" style="display: none;"></span>
                                                                            <div class="image col-md-12">
                                                                                <img id="blah8" class="bachelor_mark_sheet" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Upload Character Certificate
                                                                                <span class="required" aria-required="true"> * </span>
                                                                            </label><br>
                                                                            <span class="btn green btn-block fileinput-button" onclick="Upload(7);">
                                                                                <i class="fa fa-plus"></i>
                                                                                <span> Add files... </span>
                                                                                <input type="file" class="blah9" name="bachelor_character" onchange="readURL(this);" id="bachelor_character" style="display: none;">
                                                                            </span>
                                                                            <span class="error" id="bachelor_character_error" style="display: none;"></span>
                                                                            <div class="image col-md-12">
                                                                                <img id="blah9" class="bachelor_character" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Upload Any Other Certificate
                                                                                <span class="required" aria-required="true"> * </span>
                                                                            </label><br>
                                                                            <span class="btn green btn-block fileinput-button" onclick="Upload(8);">
                                                                                <i class="fa fa-plus"></i>
                                                                                <span> Add files... </span>
                                                                                <input type="file" class="blah10" name="bachelor_other" onchange="readURL(this);" id="bachelor_other" style="display: none;">
                                                                            </span>
                                                                            <span class="error" id="bachelor_other_error" style="display: none;"></span>
                                                                            <div class="image col-md-12">
                                                                                <img id="blah10" class="bachelor_other" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-12"><hr>
                                                                                <input type="submit" onclick="upload(0)" id="bachelor_submit" value="UPLOAD" class="btn btn-success btn-lg">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        {{--@else--}}
                                                        <!-- Error and Success Message -->
                                                            <div class="alert alert-success" @if(count($detail->documents()->where('qualification','bachelor')->get())<1) style="display: none" @endif><i class="fa fa-check-square"></i>You have already submitted documents of bachelor</div>
                                                        <!-- Error and Success Message -->
                                                        {{--@endif--}}
                                                        <div id="master_message" style="display:none;">
                                                            <!-- Error and Success Message -->
                                                                <div class="alert alert-success"><i class="fa fa-check-square"></i>You have successfully submitted documents of master degree </div>
                                                            <!-- Error and Success Message -->
                                                        </div>
                                                        {{--@if(count($detail->documents()->where('qualification','master')->get())<1)--}}
                                                        <div class="row" id="masterDocument" @if(count($detail->documents()->where('qualification','master')->get())>0) style="display: none" @endif>
                                                            <h3>MASTER LEVEL DOCUMENTS</h3>
                                                            <form id="masterForm" enctype="multipart/form-data" method="post">
                                                                <div class="col-md-12 master">
                                                                    <div class="form-group col-md-12">
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Upload Marksheet
                                                                                <span class="required" aria-required="true"> * </span>
                                                                            </label><br>
                                                                            <span class="btn green btn-block fileinput-button" onclick="Upload(9);">
                                                                                <i class="fa fa-plus"></i>
                                                                                <span> Add files... </span>
                                                                                <input type="file" class="blah11" name="master_mark_sheet" onchange="readURL(this);" id="master_mark_sheet" style="display: none;">
                                                                            </span>
                                                                            <span class="error" id="master_mark_sheet_error" style="display: none;"></span>
                                                                            <div class="image col-md-12">
                                                                                <img id="blah11" class="master_mark_sheet" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Upload Character Certificate
                                                                                <span class="required" aria-required="true"> * </span>
                                                                            </label><br>
                                                                            <span class="btn green btn-block fileinput-button" onclick="Upload(10);">
                                                                                <i class="fa fa-plus"></i>
                                                                                <span> Add files... </span>
                                                                                <input type="file" class="blah12" name="master_character" onchange="readURL(this);" id="master_character" style="display: none;">
                                                                            </span>
                                                                            <span class="error" id="master_character_error" style="display: none;"></span>
                                                                            <div class="image col-md-12">
                                                                                <img id="blah12" class="master_character" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <label class="control-label">Upload Any Other Certificate
                                                                                <span class="required" aria-required="true"> * </span>
                                                                            </label><br>
                                                                            <span class="btn green btn-block fileinput-button" onclick="Upload(11);">
                                                                                <i class="fa fa-plus"></i>
                                                                                <span> Add files... </span>
                                                                                <input type="file" class="blah13" name="master_other" onchange="readURL(this);" id="master_other" style="display: none;">
                                                                            </span>
                                                                            <span class="error" id="master_other_error" style="display: none;"></span>
                                                                            <div class="image col-md-12">
                                                                                <img id="blah13" class="master_other" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="form-group col-md-12"><hr>
                                                                                <input type="submit" onclick="upload(0)" id="bachelor_submit" value="UPLOAD" class="btn btn-success btn-lg">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        {{--@else--}}
                                                        
                                                        <!-- Error and Success Message -->
                                                            <div class="alert alert-success" @if(count($detail->documents()->where('qualification','master')->get())<1) style="display: none" @endif><i class="fa fa-check-square"></i>You have already submitted documents of master degree</div>
                                                        <!-- Error and Success Message -->
                                                        
                                                        {{--@endif--}}
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <h2><b>Experience and Training</b></h2>
                                                </div>
                                            </div>
                                            <div id="te_message" style="display:none;">
                                                <!-- Error and Success Message -->
                                                    <div class="alert alert-success"><i class="fa fa-check-square"></i>You have successfully submitted documents of Training and Experiences</div>
                                                <!-- Error and Success Message -->
                                            </div>
                                            <div id="trainingDocument" >
                                                <div class="col-md-12 experience">
                                                    <div class="portlet-body form">
                                                        <div class="col-md-12">
                                                            <form id="trainingForm" enctype="multipart/form-data" method="post">
                                                                <div class="col-md-4">
                                                                    <div class="form-group col-md-12">
                                                                        <label class="control-label">Upload Images of Experiences
                                                                            <span class="required" aria-required="true"> * </span>
                                                                        </label><br>
                                                                        <span class="btn green btn-block fileinput-button" onclick="Upload(12);">
                                                                            <i class="fa fa-plus"></i>
                                                                            <span> Add files... </span>
                                                                            <input type="file" class="blah14" name="training_cetificate_one" onchange="readURL(this);" id="training_cetificate_one" style="display: none;">
                                                                        </span>
                                                                        <span class="error" id="training_cetificate_one_error" style="display: none;"></span>
                                                                        <div class="image col-md-12">
                                                                            <img id="blah14" class="training_cetificate_one" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                        </div>
                                                                        <br><br>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group col-md-12">
                                                                        <label class="control-label">Upload Images of Experiences
                                                                            <span class="required" aria-required="true">(optional) </span>
                                                                        </label><br>
                                                                        <span class="btn green btn-block fileinput-button" onclick="Upload(13);">
                                                                            <i class="fa fa-plus"></i>
                                                                            <span> Add files... </span>
                                                                            <input type="file" class="blah15" name="training_cetificate_two" onchange="readURL(this);" id="training_cetificate_two" style="display: none;">
                                                                        </span>
                                                                        <span class="error" id="training_cetificate_two_error" style="display: none;"></span>
                                                                        <div class="image col-md-12">
                                                                            <img id="blah15" class="training_cetificate_two" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                        </div>
                                                                        <br><br>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group col-md-12">
                                                                        <label class="control-label">Upload Images of Experiences
                                                                            <span class="required" aria-required="true"> (optional) </span>
                                                                        </label><br>
                                                                        <span class="btn green btn-block fileinput-button" onclick="Upload(14);">
                                                                            <i class="fa fa-plus"></i>
                                                                            <span> Add files... </span>
                                                                            <input type="file" class="blah16" name="training_cetificate_three" onchange="readURL(this);" id="training_cetificate_three" style="display: none;">
                                                                        </span>
                                                                        <span class="error" id="training_cetificate_three_error" style="display: none;"></span>
                                                                        <div class="image col-md-12">
                                                                            <img id="blah16" class="training_cetificate_three" style="display:none;border:#d6d6d6 2px solid; margin-top:5px;" src="#" width="100%"/>
                                                                        </div>
                                                                        <br><br>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-md-12"><hr>
                                                                        <input type="submit" onclick="upload(0)" id="plus_two_submit" value="UPLOAD" class="btn btn-success btn-lg">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <h2><b>Don't you have document or finished uploading document ? Click </b><a href="{{route('admission.final',$detail->token)}}" class="btn green submit"><i class="fa fa-check"></i> FINISH</a></h2>
                                    
                                {{--</form>--}}
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    <script>

        error = document.getElementsByClassName('error');
        function upload(a){
            for(var i=a; i<input.length;i++){
                var isValid = /\.(jpe?g|png|gif|bmp)$/i.test(input[i].value);
                if(input[i].value == '' || input[i].value == null ){
                    error[i].style.display= 'block';
                    return false;
                }else if (!isValid) {
                    error[i].innerText = "Only Jpeg, PNG, GIF and BMP file allowed";
                    error[i].style.display= 'block';
                    return false;
                }
                else if(input[i].value != null){
                    error[i].style.display= 'none';
                }
            }
        }

        var input = document.querySelectorAll('input[type=file]');
        function Upload(num){
            input[num].click();
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                a=input.className;
                c=input.id;

                b = document.getElementById(a);
                reader.onload = function(e) {

                    b.style.display = 'block';
                    $('#'+a).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL2(input) {
            a = input.className;
            b = document.getElementById(a);
            c = document.getElementsByClassName('images')[0];
            for(var i=0; i<input.files.length;i++){
                if (input.files && input.files[i]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementsByClassName('up_exe')[0].style.display = 'block';
                        var img ='<img id="img'+i+'" class="'+i+'" src="'+e.target.result+'" width="auto" height="100px" style="border:solid 2px #d6d6d6;margin-right:5px;margin-bottom:5px;" />';
                        $('.images').append(img);
                    };
                    reader.readAsDataURL(input.files[i]);
                }
            }
        }
    </script>

@endsection
<!-- BEGIN CORE PLUGINS -->
