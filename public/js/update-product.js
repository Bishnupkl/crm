$(document).ready(function () {
    $('#add-more').click(function (event) {
        event.preventDefault();
    })
});

$(document).ready(function () {
    $('.editProudctFee').click(function (event) {
        event.preventDefault();
    })
});


$(document).ready(function () {
    $('#addNewProductFeeDetail').submit(function (e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('fee_type',$('#nameOfFeeType').val());
        formData.append('fee_amount', $('#nameOfFeeAmount').val());
        formData.append('fee_term', $('#nameOfFeeTerm').val());
        formData.append('product_id', $('#productId').val());
        $.ajax({
            type:'POST',
            url:'/api/add-new-product-fee-detail',
            data: formData,
            processData : false,
            contentType : false,
            success:function (data) {
                console.log(data);
                window.location.reload();

            },
            error:function (error) {

                if (error.status === 413){
                    console.log('unknown error');
                } else if (error.status === 422){
                    var invalid = JSON.parse(error.responseText);
                    console.log(invalid);
                    if (invalid.fee_type !== 'undefined'){
                        $('#errorNameOfFeeType').empty();
                        $('#errorNameOfFeeType').append(invalid.errors.fee_type);
                    }
                    if (invalid.fee_amount !== 'undefined'){
                        $('#errorNameOfFeeAmount').empty();
                        $('#errorNameOfFeeAmount').append(invalid.errors.fee_amount);
                    }
                    if (invalid.fee_term !== 'undefined'){
                        $('#errorNameOfFeeTerm').empty();
                        $('#errorNameOfFeeTerm').append(invalid.errors.fee_term);
                    }
                }
            }
        });
    });
});


$(document).on('click','#editProudctFee',function () {
    var data = JSON.parse($(this).val());
    $('#editProductFeeForm').empty();
    $('#editProductFeeForm').append(
        '<input type="hidden" id="id" name="id" value="'+data['id']+'">\n' +
        '    <div class="product-fee">\n' +
        '        <div class="row">\n' +
        '            <div class="col-md-4">\n' +
        '                <div class="form-group">\n' +
        '                    <label class="box">Fee Type</label>\n' +
        '                    <input type="text" class="form-control" id="feeType"  name="fee_type" value="'+data['fee_type']+'" placeholder="Fee Type">\n' +
        '                    <span class="text-danger" id="editErrorFeeType"></span>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <div class="col-md-4">\n' +
        '                <div class="form-group">\n' +
        '                    <label class="box">Fee Amount</label>\n' +
        '                    <input type="text" class="form-control" id="feeAmount" name="fee_amount" value="'+data['fee_amount']+'" placeholder="Fee Amount">\n' +
        '                    <span class="text-danger" id="editErrorFeeAmount"></span>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '            <div class="col-md-4">\n' +
        '                <div class="form-group">\n' +
        '                    <label class="box">Fee Term</label>\n' +
                                '<select id="feeTerm" class="form-control" name="fee_term">'+
                                    '<option value="">Select Fee Term</option>'+
                                    '<option value="Full Fee" '+(data["fee_term"]==="Full Fee" ? "selected" : "")+'> Full Fee </option> ' +

                                    '<option value="Per Year" '+(data["fee_term"]==="Per Year" ? "selected" : "")+'> Per Year </option>' +

                                    '<option value="Per Month" '+(data["fee_term"]==="Per Month" ? "selected" : "")+' > Per Month </option>' +

                                    '<option value="Per Term" '+(data["fee_term"]==="Per Term" ? "selected" : "")+'> Per Term </option>' +

                                    '<option value="Per Trimester" '+(data["fee_term"]==="Per Trimester" ? "selected" : "")+' > Per Trimester </option>' +

                                    '<option value="Per Semester" '+(data["fee_term"]==="per semester" ? "selected" : "")+'> Per Semester</option>' +

                                    '<option value="Per Week" '+(data["fee_term"]==="Per Week" ? "selected" : "")+'> Per Week </option>' +
                            '</select>' +'<span class="text-danger" id="editErrorFeeTerm"></span>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>\n' +
        '        <div class="transparentRow"></div>\n' +
        '            <div style="overflow:auto;">\n' +
        '                <div style="float:right;">\n' +
        '                    <button class="btn btn-primary btn-md" id="addNewProductFee">Submit</button>\n' +
        '                </div>\n' +
        '            </div>\n' +
        '        </div>'
    );

});


$(document).ready(function () {
    $('#editProductFeeForm').submit(function (e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('fee_type',$('#feeType').val());
        formData.append('fee_amount', $('#feeAmount').val());
        formData.append('fee_term', $('#feeTerm').val());
        formData.append('id', $('#id').val());
        $.ajax({
            type:'POST',
            url:'/api/update-product-fee-detail',
            data: formData,
            processData : false,
            contentType : false,
            success:function (data) {
                 window.location.reload();
            },
            error:function (error) {
                if (error.status === 413){
                    console.log('unknown error');
                } else if (error.status === 422){
                    var invalid = JSON.parse(error.responseText);
                    console.log(invalid);
                    if (invalid.fee_type !== 'undefined'){
                        $('#editErrorFeeType').empty();
                        $('#editErrorFeeType').append(invalid.errors.fee_type);
                    }
                    if (invalid.fee_amount !== 'undefined'){
                        $('#editErrorFeeAmount').empty();
                        $('#editErrorFeeAmount').append(invalid.errors.fee_amount);
                    }
                    if (invalid.fee_term !== 'undefined'){
                        $('#editErrorFeeTerm').empty();
                        $('#editErrorFeeTerm').append(invalid.errors.fee_term);
                    }
                }
            }
        });
    });
});



