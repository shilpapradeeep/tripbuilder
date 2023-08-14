
  $(document).ready(function()
  {
    $('.select2').select2({
        minimumResultsForSearch: ''
    });
    $('.airline-filter').change(function() {
        filterCall();
        
    });
    $('#sort_by').change(function() {
        var sort = this.value;
        filterCall(sort);
    });

    $('#nearbyairport').click(function(){
         filterCall();
    });
    function filterCall(sort='',nearby='',lat='',log='')
    {
        var airline_codes = new Array();
        $(".airline-filter:checked").each(function() {
            airline_codes.push($(this).val());
        });
        var d1 = $('#d1').val();
        var r1 = $('#r1').val();
        var tripType = $('#tripType').val();

        var lat = '';
        var log = '';
        if($("#nearbyairport").prop("checked") == true) {
            var nearby = "1";
            var lat = $("#tr_to").find(':selected').attr('data-lat');
            var log = $("#tr_to").find(':selected').attr('data-log');
        }
        
        filter(d1,r1,tripType,airline_codes,1,sort,nearby,lat,log);
    }

    

    function filter(d1,r1,tripType,airline_codes=[],buttonid='',sort='',nearby='',lat='',log='')
    {
        $('#f-div'+buttonid).html('');
        $("#spin"+buttonid).show();

        $.ajax({
            type:'POST',
            // url:"/filter-flights",
            url:"/filter-flights?d1="+d1+"&r1="+r1+"&tripType="+tripType+"&airline="+airline_codes+"&sort_by="+sort+"&nearByAirport="+nearby+"&latitude="+lat+"&longitude="+log,
            data:{
                "_token" : $('#csrf_token').val(),
                airline_codes : airline_codes,
                d1 : d1 ,
                r1 : r1 ,
                tripType : tripType,
                sort : sort,
                nearby : nearby,
                lat : lat,
                log : log
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