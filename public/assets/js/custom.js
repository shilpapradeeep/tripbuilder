
  $(document).ready(function()
  {
    $('.select2').select2({
        minimumResultsForSearch: ''
    });
    $('.arlne').change(function() {
        var airline_codes = new Array();
        $(".arlne:checked").each(function() {
            airline_codes.push($(this).val());
        });
        var d1 = $('#d1').val();
        var r1 = $('#r1').val();
        var tripType = $('#tripType').val();

        
        filter(d1,r1,tripType,airline_codes,1);
        
    });
    $('#sort_by').change(function() {
        var airline_codes = new Array();
        $(".arlne:checked").each(function() {
            airline_codes.push($(this).val());
        });
        var d1 = $('#d1').val();
        var r1 = $('#r1').val();
        var tripType = $('#tripType').val();
        var sort = this.value;
        filter(d1,r1,tripType,airline_codes,1,sort);
    });

    jQuery("#cost_form").submit(function(e){
        e.preventDefault();
        $('#cspin').show();
    
        var airline_codes = new Array();
            $(".arlne:checked").each(function() {
                airline_codes.push($(this).val());
            });
        var d1 = $('#d1').val();
        var r1 = $('#r1').val();
        var tripType = $('#tripType').val();
        var sort = this.value;
        var min_cost = $('#min_cost').val();
        var max_cost = $('#max_cost').val();
    
        filter(d1,r1,tripType,airline_codes,1,sort,min_cost,max_cost,'cost_search');
    
    });

    function filter(d1,r1,tripType,airline_codes=[],buttonid='',sort='', min_cost='', max_cost='',type='')
    {
        $('#f-div'+buttonid).html('');
        $("#spin"+buttonid).show();

        $.ajax({
            type:'POST',
            // url:"/filter-flights",
            url:"/filter-flights?d1="+d1+"&r1="+r1+"&tripType="+tripType+"&airline="+airline_codes+"&sort_by="+sort,
            data:{
                "_token" : $('#csrf_token').val(),
                airline_codes : airline_codes,
                d1 : d1 ,
                r1 : r1 ,
                tripType : tripType,
                sort : sort,
                min_cost : min_cost,
                max_cost : max_cost,
                type : type
            },
            dataType:'JSON',
            success:function(data){
                console.log(data);
                $("#spin"+buttonid).hide();
                $('#f-div'+buttonid).html(data.html);
            },
            error:function(data) {
                $('#spin'+buttonid).hide();
                var response = JSON.parse(data.responseText);
                $('.error').html('');
                $.each(response.errors, function (key, value) {
                    $('#'+key+'_error').html(value);
                });
            }
        });
    }
  });
jQuery("#contact_form").submit(function(e){
    e.preventDefault();
    $('#spin').show();

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