
var currentTab = 0;
showTab(currentTab);

function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    if (n === 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n === (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    fixStepIndicator(n)
}

function nextPrev(n) {
    var x = document.getElementsByClassName("tab");
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;
    if (currentTab >= x.length) {
        document.getElementById("regForm").submit();
        return false;
    }
    showTab(currentTab);
}

function fixStepIndicator(n) {
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    x[n].className += " active";
}

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
            url:'{{route("get.intake")}}',
            data:{'country':country},
            success:function (data) {
                console.log(data);
                intake+='<option value="0" selected disabled>Select Intake</option>';
                if ($.trim(data)) {
                    for (var i = 0; i < data[0].intake.length; i++) {
                        console.log(data[0].intake[i]);
                        intake += '<option value="' + data[0].intake[i].intake.id + '">' + data[0].intake[i].intake.intake_type + '</option>';
                    }
                    div.find('#intake').html(" ");
                    div.find('#intake').append(intake);

                    university += '<option value="0" selected disabled>Select Partner</option>';
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

/***********Adding dynamic field for academic details***********************/
$(document).ready(function(){
    var i = 1;
    $('#-maddore').click(function(e){
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
});