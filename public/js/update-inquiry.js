$(document).ready(function () {
    $(document).on('change','#maritalStatus',function () {
        var value = $(this).val();
        console.log($(this).val);
        var testDetail = (document).getElementsByClassName('marriageDate');
        if (value==='Married'){
            testDetail[0].style.display = 'block';
        } else {
            testDetail[0].style.display = 'none';
        }
    });
    $(document).on('click','#testTaken',function () {
        var value = $(this).val();
        var testDetail = (document).getElementsByClassName('testDetail');
        if (value==='Yes'){
            testDetail[0].style.display = 'block';
        } else {
            testDetail[0].style.display = 'none';
        }
    });
    $(document).on('click','#classes',function () {
        var value = $(this).val();
        var classes = (document).getElementsByClassName('studyCenter');
        console.log(classes[0]);
        if (value==='Yes'){
            classes[0].style.display = 'block';
        } else {
            classes[0].style.display = 'none';
        }
    });
    $(document).on('click','#rejectionBefore',function () {
        var value = $(this).val();
        var reason = (document).getElementsByClassName('rejectionReason');
        console.log(reason[0]);
        if (value==='Yes'){
            reason[0].style.display = 'block';
        } else {
            reason[0].style.display = 'none';
        }
    });

    $(document).on('change','#country', function () {
        var country = $(this).val();
        var div = $(this).parents();

        var intake = " ";
        var university = "";
        $.ajax({
            type:'get',
            url:'/api/get-intake',
            data:{'country':country},
            success:function (data) {
                console.log(data);
                intake+='<option value="" selected disabled>Select Intake</option>';
                if ($.trim(data)) {
                    for (var i = 0; i < data[0].intake.length; i++) {
                        console.log(data[0].intake[i]);
                        intake += '<option value="' + data[0].intake[i].intake.id + '">' + data[0].intake[i].intake.intake_type + '</option>';
                    }
                    div.find('#intake').html(" ");
                    div.find('#intake').append(intake);

                    university += '<option value="" selected disabled>Select Partner</option>';
                    for (var i = 0; i < data[0].university.length; i++) {
                        console.log(data[0].university[i]);
                        university += '<option value="' + data[0].university[i].id + '">' + data[0].university[i].name + '</option>';
                    }
                    div.find('#university').html(" ");
                    div.find('#university').append(university);
                }
            },
            error:function () {
            }
        });
    });
    $(document).on('change','#university', function (e) {
        e.preventDefault();
        var university = $(this).val();
        var div = $(this).parents();

        var course = " ";
        $.ajax({
            type:'get',
            url:'{{route("get.course")}}',
            data:{'university':university},
            success:function (data) {
                console.log(data);
                course+='<option value="" selected disabled>Select Course</option>';
                if ($.trim(data)) {
                    for (var i = 0; i < data.length; i++) {
                        console.log(data[i].course);
                        course += '<option value="' + data[i].course.id + '">' + data[i].course.course_name + '</option>';
                    }
                    div.find('#course').html(" ");
                    div.find('#course').append(course);
                }
            },
            error:function () {
            }
        });
    });
});
$(document).ready(function(){
var i = 1;
$('#add-more').click(function(e){
    e.preventDefault();
  });
});

$(document).ready(function(){
var i = 1;
$('#add-experience').click(function(e){
    e.preventDefault();
  });
});
$(document).ready(function () {
    $('#addNewQualification').submit(function (e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('name_of_qualification',$('#nameOfQualification').val());
        formData.append('name_of_institution', $('#nameOfInstitution').val());
        formData.append('start_date', $('#academicStartDate').val());
        formData.append('end_date', $('#academicEndDate').val());
        formData.append('percentage', $('#academicPercentage').val());
        formData.append('inquiry_token', $('#inquiryToken').val());
        $.ajax({
            type:'POST',
            url:'/api/add-new-academic',
            data: formData,
            processData : false,
            contentType : false,
            success:function (data) {
                window.location.reload();
                window.location.href ="/inquiry/"+data.token+"#educationExperience";
            },
            error:function (error) {
                if (error.status === 413){
                    console.log('unknown error');
                } else if (error.status === 422){
                    var invalid = JSON.parse(error.responseText);
                    console.log(invalid);
                    if (invalid.name_of_qualification !== 'undefined'){
                        $('#errorNameOfQualification').empty();
                        $('#errorNameOfQualification').append(invalid.errors.name_of_qualification);
                    }
                    if (invalid.name_of_institution !== 'undefined'){
                        $('#errorNameOfInstitution').empty();
                        $('#errorNameOfInstitution').append(invalid.errors.name_of_institution);
                    }
                    if (invalid.start_date !== 'undefined'){
                        $('#errorAcademicStartDate').empty();
                        $('#errorAcademicStartDate').append(invalid.errors.start_date);
                    }
                    if (invalid.end_date !== 'undefined'){
                        $('#errorAcademicEndDate').empty();
                        $('#errorAcademicEndDate').append(invalid.errors.end_date);
                    }
                    if (invalid.percentage !== 'undefined'){
                        $('#errorAcademicPercentage').empty();
                        $('#errorAcademicPercentage').append(invalid.errors.percentage);
                    }
                }
            }
        });
    });
});

$(document).on('click','#editAcademicDetail',function () {
   var data = JSON.parse($(this).val());
   $('#editQualificationForm').empty();
   $('#editQualificationForm').append(
       '<input type="hidden" id="id" name="id" value="'+data['id']+'">\n' +
       '    <div class="academic">\n' +
       '        <div class="row">\n' +
       '            <div class="col-md-6">\n' +
       '                <div class="form-group">\n' +
       '                    <label>Name of Qualification</label>\n' +
       '                        <select id="editNameOfQualification" name="name_of_qualification" class="form-control">\n' +
       '                            <option value="">Select Qualification</option>\n' +
       '                            <option value="SEE/SLC"'+(data["name_of_qualification"]==="SEE/SLC" ? "selected" : "")+'>SEE/SLC</option>\n' +
       '                            <option value="A-LEVELS"'+(data["name_of_qualification"]==="A-LEVELS" ? "selected" : "")+'>A-Levels</option>\n' +
       '                            <option value="10+2/PCL"'+(data["name_of_qualification"]==="10+2/PCL" ? "selected" : "")+'>10+2/PCL</option>\n' +
       '                            <option value="Bachelor (3 years)"'+(data["name_of_qualification"]==="Bachelor (3 years)" ? "selected" : "")+'>Bachelor\'s(3 years)</option>\n' +
       '                            <option value="Bachelor (4 years)"'+(data["name_of_qualification"]==="Bachelor (4 years)" ? "selected" : "")+'>Bachelor\'s (4 years)</option>\n' +
       '                            <option value="MASTER/ABOVE" '+(data["name_of_qualification"]==="MASTER/ABOVE" ? "selected" : "")+'>Master and Above</option>\n' +
       '                        </select>\n' +
       '                        <span class="text-danger" id="editErrorNameOfQualification"></span>\n' +
       '                </div>\n' +
       '            </div>\n' +
       '            <div class="col-md-6">\n' +
       '                <div class="form-group">\n' +
       '                    <label>Name of Institution</label>\n' +
       '                    <input type="text" class="form-control" id="editNameOfInstitution" name="name_of_institution" value="'+data['name_of_institution']+'" placeholder="Name of Institution">\n' +
       '                    <span class="text-danger" id="editErrorNameOfInstitution"></span>\n' +
       '                </div>\n' +
       '            </div>\n' +
       '        </div>\n' +
       '        <div class="row">\n' +
       '            <div class="col-md-4">\n' +
       '                <div class="form-group">\n' +
       '                    <label class="box">From (Year)</label>\n' +
       '                    <input type="number" class="form-control" id="editAcademicStartDate"  name="academic_start_date" value="'+data['start_date']+'" placeholder="From">\n' +
       '                    <span class="text-danger" id="editErrorAcademicStartDate"></span>\n' +
       '                </div>\n' +
       '            </div>\n' +
       '            <div class="col-md-4">\n' +
       '                <div class="form-group">\n' +
       '                    <label class="box">To (Year)</label>\n' +
       '                    <input type="number" class="form-control" id="editAcademicEndDate" name="academic_end_date" value="'+data['end_date']+'" placeholder="To">\n' +
       '                    <span class="text-danger" id="editErrorAcademicEndDate"></span>\n' +
       '                </div>\n' +
       '            </div>\n' +
       '            <div class="col-md-4">\n' +
       '                <div class="form-group">\n' +
       '                    <label class="box">Academic Percentage</label>\n' +
       '                    <input type="text" placeholder="Academic Percentage" value="'+data['percentage']+'" id="editAcademicPercentage" class="form-control" name="academic_percentage">\n' +
       '                    <span class="text-danger" id="editErrorAcademicPercentage"></span>\n' +
       '                </div>\n' +
       '            </div>\n' +
       '        </div>\n' +
       '        <div class="transparentRow"></div>\n' +
       '            <div style="overflow:auto;">\n' +
       '                <div style="float:right;">\n' +
       '                    <button class="btn btn-primary btn-md" id="addNewAcademic">Submit</button>\n' +
       '                </div>\n' +
       '            </div>\n' +
       '        </div>'
   );

});

$(document).ready(function () {
    $('#editQualificationForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('name_of_qualification',$('#editNameOfQualification').val());
        formData.append('name_of_institution', $('#editNameOfInstitution').val());
        formData.append('start_date', $('#editAcademicStartDate').val());
        formData.append('end_date', $('#editAcademicEndDate').val());
        formData.append('percentage', $('#editAcademicPercentage').val());
        formData.append('id', $('#id').val());
        $.ajax({
            type:'POST',
            url:'/api/add-new-academic',
            data: formData,
            processData : false,
            contentType : false,
            success:function (data) {
                window.location.reload();
                window.location.href ="/inquiry/"+data.token+"#educationExperience";
            },
            error:function (error) {
                if (error.status === 413){
                    console.log('unknown error');
                } else if (error.status === 422){
                    var invalid = JSON.parse(error.responseText);
                    console.log(invalid);
                    if (invalid.name_of_qualification !== 'undefined'){
                        $('#editErrorNameOfQualification').empty();
                        $('#editErrorNameOfQualification').append(invalid.errors.name_of_qualification);
                    }
                    if (invalid.name_of_institution !== 'undefined'){
                        $('#editErrorNameOfInstitution').empty();
                        $('#editErrorNameOfInstitution').append(invalid.errors.name_of_institution);
                    }
                    if (invalid.start_date !== 'undefined'){
                        $('#editErrorAcademicStartDate').empty();
                        $('#editErrorAcademicStartDate').append(invalid.errors.start_date);
                    }
                    if (invalid.end_date !== 'undefined'){
                        $('#editErrorAcademicEndDate').empty();
                        $('#editErrorAcademicEndDate').append(invalid.errors.end_date);
                    }
                    if (invalid.percentage !== 'undefined'){
                        $('#editErrorAcademicPercentage').empty();
                        $('#editErrorAcademicPercentage').append(invalid.errors.percentage);
                    }
                }
            }
        });
    });
});

$(document).ready(function () {
    $('#addNewExperience').submit(function (e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('name_of_employer', $('#eNameOfInstitution').val());
        formData.append('duties',$('#duties').val());
        formData.append('start_date', $('#experienceStartDate').val());
        formData.append('end_date', $('#experienceEndDate').val());
        formData.append('inquiry_token', $('#inquiryToken').val());
        $.ajax({
            type:'POST',
            url:'/api/add-new-experience',
            data: formData,
            processData : false,
            contentType : false,
            success:function (data) {
                console.log(data);
                window.location.reload();
                window.location.href ="/inquiry/"+data.token+"#educationExperience";
            },
            error:function (error) {
                if (error.status === 413){
                    console.log('unknown error');
                } else if (error.status === 422){
                    var invalid = JSON.parse(error.responseText);
                    console.log(invalid);
                    if (invalid.name_of_employer !== 'undefined'){
                        $('#errorENameOfInstitution').empty();
                        $('#errorENameOfInstitution').append(invalid.errors.name_of_employer);
                    }
                    if (invalid.duties !== 'undefined'){
                        $('#errorDuties').empty();
                        $('#errorDuties').append(invalid.errors.duties);
                    }
                    if (invalid.start_date !== 'undefined'){
                        $('#errorExperienceStartDate').empty();
                        $('#errorExperienceStartDate').append(invalid.errors.start_date);
                    }
                    if (invalid.end_date !== 'undefined'){
                        $('#errorExperienceEndDate').empty();
                        $('#errorExperienceEndDate').append(invalid.errors.end_date);
                    }
                }
            }
        });
    });
});
$(document).on('click','#editExperience',function () {
    var data = JSON.parse($(this).val());
    $('#editExperienceForm').empty();
    $('#editExperienceForm').append(
        '<input type="hidden" id="experienceId" name="experience_id" value="'+data['id']+'">\n' +
        '<div id="experience">\n' +
        '    <div class="academic" id="experiences1">\n' +
        '        <div class="row">\n' +
        '            <div class="col-md-6">\n' +
        '                <div class="form-group">\n' +
        '                    <label>Name of Institution</label>\n' +
        '                    <input type="text" id="editENameOfInstitution" name="name_of_employer" value="'+data['name_of_employer']+'" class="form-control" placeholder="Name of Employer">\n' +
        '                    <span class="text-danger" id="errorENameOfInstitution"></span>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <div class="col-md-6">\n' +
        '                <div class="form-group">\n' +
        '                    <label>Duties</label>\n' +
        '                    <input type="text" class="form-control" id="editDuties" name="duties" value="'+data['duties']+'" placeholder="Name of Duties">\n' +
        '                    <span class="text-danger" id="errorDuties"></span>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="row">\n' +
        '            <div class="col-md-6">\n' +
        '                <div class="form-group">\n' +
        '                    <label class="box">From (Year)</label>\n' +
        '                    <input type="number" class="form-control" id="editExperienceStartDate" name="start_year" value="'+data['start_date']+'" placeholder="From">\n' +
        '                    <span class="text-danger" id="errorExperienceStartDate"></span>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <div class="col-md-6">\n' +
        '                <div class="form-group">\n' +
        '                    <label class="box">To (Year)</label>\n' +
        '                    <input type="number" class="form-control" id="editExperienceEndDate" name="end_year" value="'+data['end_date']+'" placeholder="To">\n' +
        '                    <span class="text-danger" id="errorExperienceEndDate"></span>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="transparentRow"></div>\n' +
        '        <div style="overflow:auto;">\n' +
        '            <div style="float:right;">\n' +
        '                <button class="btn btn-primary btn-md">Submit</button>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '    </div>\n' +
        '</div>'
    );
});

$(document).ready(function () {
    $('#editExperienceForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('name_of_employer', $('#editENameOfInstitution').val());
        formData.append('duties',$('#editDuties').val());
        formData.append('start_date', $('#editExperienceStartDate').val());
        formData.append('end_date', $('#editExperienceEndDate').val());
        formData.append('id', $('#experienceId').val());
        $.ajax({
            type:'POST',
            url:'/api/add-new-experience',
            data: formData,
            processData : false,
            contentType : false,
            success:function (data) {
                console.log(data);
                window.location.reload();
                window.location.href ="/inquiry/"+data.token+"#educationExperience";
            },
            error:function (error) {
                if (error.status === 413){
                    console.log('unknown error');
                } else if (error.status === 422){
                    var invalid = JSON.parse(error.responseText);
                    console.log(invalid);
                    if (invalid.name_of_employer !== 'undefined'){
                        $('#editErrorENameOfInstitution').empty();
                        $('#editErrorENameOfInstitution').append(invalid.errors.name_of_employer);
                    }
                    if (invalid.duties !== 'undefined'){
                        $('#editErrorDuties').empty();
                        $('#editErrorDuties').append(invalid.errors.duties);
                    }
                    if (invalid.start_date !== 'undefined'){
                        $('#editErrorExperienceStartDate').empty();
                        $('#editErrorExperienceStartDate').append(invalid.errors.start_date);
                    }
                    if (invalid.end_date !== 'undefined'){
                        $('#editErrorExperienceEndDate').empty();
                        $('#editErrorExperienceEndDate').append(invalid.errors.end_date);
                    }
                }
            }
        });
    });
});

/***********Adding dynamic field for academic details***********************/
/*$(document).ready(function(){
    var i = 1;
    $('#add-more').click(function(e){
        e.preventDefault();
        i++;
        $('#academic').append('' +
            '<div class="academic" id="academic'+i+'">\n' +
            '    <div class="col-md-12">\n' +
            '        <div class="actions pull-right">\n' +
            '           <button class="btn btn-circle btn-danger btn_remove" id="'+i+'">\n' +
            '              <i class="fa fa-times"></i>\n' +
            '           </button>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '    <hr>\n' +
            '    <div class="row">\n' +
            '        <div class="col-md-6">\n' +
            '            <div class="form-group">\n' +
            '                <label>Name of Qualification</label>\n' +
            '                <select id="qualification" name="name_of_qualification[]" class="form-control">\n' +
            '                    <option value="">Select Qualification</option>\n' +
            '                    <option value="SEE/SLC">SEE/SLC</option>\n' +
            '                    <option value="A-LEVELS">A-Levels</option>\n' +
            '                    <option value="10+2/PCL">10+2/PCL</option>\n' +
            '                    <option value="Bachelor (3 years)">Bachelor\'s(3 years)</option>\n' +
            '                    <option value="Bachelor (4 years)">Bachelor\'s (4 years)</option>\n' +
            '                    <option value="MASTER/ABOVE">Master and Above</option>\n' +
            '               </select>\n' +
            '           </div>\n' +
            '       </div>\n' +
            '       <div class="col-md-6">\n' +
            '          <div class="form-group">\n' +
            '               <label>Name of Institution</label>\n' +
            '               <input type="text" class="form-control" name="name_of_institution[]" placeholder="Name of Institution">\n' +
            '          </div>\n' +
            '       </div>\n' +
            '     </div>\n' +
            '     <div class="row">\n' +
            '         <div class="col-md-4">\n' +
            '             <div class="form-group">\n' +
            '                 <label class="box">From</label>\n' +
            '                 <input type="number" class="form-control" name="academic_start_date[]" placeholder="From">\n' +
            '             </div>\n' +
            '         </div>\n' +
            '         <div class="col-md-4">\n' +
            '             <div class="form-group">\n' +
            '                 <label class="box">To</label>\n' +
            '                 <input type="number" class="form-control" name="academic_end_date[]" placeholder="To">\n' +
            '             </div>\n' +
            '         </div>\n' +
            '         <div class="col-md-4">\n' +
            '            <div class="form-group">\n' +
            '               <label class="box">Academic Percentage</label>\n' +
            '               <input type="text" placeholder="Academic Percentage" class="form-control" name="academic_percentage[]">\n' +
            '           </div>\n' +
            '       </div>\n' +
            '   </div>\n' +
            '</div>'
        );
    });

    $(document).on('click','.btn_remove', function(e){
        e.preventDefault();
        var button_id = $(this).attr("id");
        $("#academic"+button_id+"").remove();
    });
});

$(document).ready(function(){
    var i = 1;
    $('#add-experience').click(function(e){
        e.preventDefault();
        i++;
        $('#experiences').append('' +
            '<div class="academic" id="experiences'+i+'">\n' +
            '    <div class="col-md-12">\n' +
            '        <div class="actions pull-right">\n' +
            '           <button class="btn btn-circle btn-danger remove_experiences" id="'+i+'">\n' +
            '              <i class="fa fa-times"></i>\n' +
            '           </button>\n' +
            '        </div>\n' +
            '    </div>\n' +
            '    <hr>\n' +
            '    <div class="row">\n' +
            '        <div class="col-md-6">\n' +
            '            <div class="form-group">\n' +
            '                <label>Name of Institution</label>\n' +
            '                <input type="text" name="name_of_employer[]" class="form-control" placeholder="Name of Institution">\n' +
            '           </div>\n' +
            '       </div>\n' +
            '       <div class="col-md-6">\n' +
            '          <div class="form-group">\n' +
            '               <label>Duties</label>\n' +
            '               <input type="text" class="form-control" name="duties[]" placeholder="Duties">\n' +
            '          </div>\n' +
            '       </div>\n' +
            '     </div>\n' +
            '     <div class="row">\n' +
            '         <div class="col-md-6">\n' +
            '             <div class="form-group">\n' +
            '                 <label class="box">From</label>\n' +
            '                 <input type="number" class="form-control" name="start_date[]" placeholder="From">\n' +
            '             </div>\n' +
            '         </div>\n' +
            '         <div class="col-md-6">\n' +
            '             <div class="form-group">\n' +
            '                 <label class="box">To(Year)</label>\n' +
            '                 <input type="number" class="form-control" name="end_date[]" placeholder="To">\n' +
            '             </div>\n' +
            '         </div>\n' +
            '   </div>\n' +
            '</div>'
        );
    });

    $(document).on('click','.remove_experiences', function(e){
        e.preventDefault();
        var button_id = $(this).attr("id");
        $("#experiences"+button_id+"").remove();
    });
});*/
