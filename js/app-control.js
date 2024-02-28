$("#user_high_school_transcript").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $("#user_high_school_transcript").val('');
        Swal.fire({
            icon: 'error',
            title: 'Please select the correct file type.',
            text: ' "Files allowed to upload" ' + fileExtension.join(', '),
            confirmButtonText: 'OK'
          })
    }
});

$("#user_school").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $("#user_school").val('');
        Swal.fire({
            icon: 'error',
            title: 'Please select the correct file type.',
            text: ' "Files allowed to upload" ' + fileExtension.join(', '),
            confirmButtonText: 'OK'
          })
    }
});

$("#user_bio_data").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $("#user_bio_data").val('');
        Swal.fire({
            icon: 'error',
            title: 'Please select the correct file type.',
            text: ' "Files allowed to upload" ' + fileExtension.join(', '),
            confirmButtonText: 'OK'
          })
    }
});

$("#user_medical_certificate").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $("#user_medical_certificate").val('');
        Swal.fire({
            icon: 'error',
            title: 'Please select the correct file type.',
            text: ' "Files allowed to upload" ' + fileExtension.join(', '),
            confirmButtonText: 'OK'
          })
    }
});

$("#user_official_transcript").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $("#user_official_transcript").val('');
        Swal.fire({
            icon: 'error',
            title: 'Please select the correct file type.',
            text: ' "Files allowed to upload" ' + fileExtension.join(', '),
            confirmButtonText: 'OK'
          })
    }
});

$("#user_letter_of_recommendation").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $("#user_letter_of_recommendation").val('');
        Swal.fire({
            icon: 'error',
            title: 'Please select the correct file type.',
            text: ' "Files allowed to upload" ' + fileExtension.join(', '),
            confirmButtonText: 'OK'
          })
    }
});

$("#user_proof_proficiency").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $("#user_proof_proficiency").val('');
        Swal.fire({
            icon: 'error',
            title: 'Please select the correct file type.',
            text: ' "Files allowed to upload" ' + fileExtension.join(', '),
            confirmButtonText: 'OK'
          })
    }
});

$("#user_health_insurance").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $("#user_health_insurance").val('');
        Swal.fire({
            icon: 'error',
            title: 'Please select the correct file type.',
            text: ' "Files allowed to upload" ' + fileExtension.join(', '),
            confirmButtonText: 'OK'
          })
    }
});

$("#user_application_fee").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp','pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        $("#user_application_fee").val('');
        Swal.fire({
            icon: 'error',
            title: 'Please select the correct file type.',
            text: ' "Files allowed to upload" ' + fileExtension.join(', '),
            confirmButtonText: 'OK'
          })
    }
});
$("#sign").click(function(){
    if ($('#sign').is(':checked')) {
        $('#submit-btns button').prop('disabled', false);
    }else{
        $('#submit-btns button').prop('disabled', true);
    }
})
