jQuery("#contact_form").submit(function(e){
    e.preventDefault();
    $('#btn-submit').hide();
    $('#spin').show();

    var flight_type = $('input[name="flight_type"]:checked').val();
    var tr_from = $("input[name=tr_from]").val();
    var tr_to = $("input[name=tr_to]").val();
   

    $.ajax({
        type:'POST',
        url:"/submit-flight",
        data:$('#contact_form').serialize(),
        dataType:'JSON',
        success:function(data){
            $('#btn-submit').show();
            $('#spin').hide();
            $('.error').html('');
            $("#contact_form")[0].reset();
            $('.alert-success').show();
            $('.alert-success-message').html(data.msg);
           // alert(data.msg);
        },
        error:function(data) {
            $('#btn-submit').show();
            $('#spin').hide();
            var response = JSON.parse(data.responseText);
            $('.error').html('');
            $.each(response.errors, function (key, value) {
                $('#'+key+'_error').html(value);
            });
        }
    });

});
