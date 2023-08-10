jQuery("#contact_form").submit(function(e){
    e.preventDefault();
    $('#spin').show();

    var flight_type = $('input[name="flight_type"]:checked').val();
    var tr_from = $('#tr_from').find(":selected").val();
    var tr_to = $('#tr_to').find(":selected").val();
   

    $.ajax({
        type:'POST',
        url:"/submit-flight",
        data:$('#contact_form').serialize(),
        dataType:'JSON',
        success:function(data){
           $('#spin').hide();
           setTimeout(function() {
            location.href = data.redirect;
           }, 1000);

        },
        error:function(data) {
            $('#spin').hide();
            var response = JSON.parse(data.responseText);
            $('.error').html('');
            $.each(response.errors, function (key, value) {
                $('#'+key+'_error').html(value);
            });
        }
    });

});
