// var SITE_URL = '{{url("/")}}';
function loadCities(x) {
    $.ajax({
            type: 'GET',
            url: CITY_LIST_URL,
            data: {
                'id': x
            },
            dataType: "json"
        })
        .done(function (response) {
            if(response.success){
                $("#city_id").empty();
                var mySelect = $('#city_id');
                $.each(response.data, function(index) {
                    mySelect.append(
                        $('<option></option>').val(response.data[index].id).html(response.data[index].value)
                    );
                });
                loadTypes()
            }
            else{
                console.log(response);
            }
        })
        .fail(function (response) {
            console.log(response);
        });
    return false;
}
function loadTypes() {
    $.ajax({
            type: 'GET',
            url: TYPE_LIST_URL,
            data: {
                'destination_id': $("#destination_id").val(),
                'city_id': $("#city_id").val(),
            },
            dataType: "json"
        })
        .done(function (response) {
            if(response.success){
                $("#type_id").empty();
                var mySelect = $('#type_id');
                $.each(response.data, function(index) {
                    mySelect.append(
                        $('<option></option>').val(response.data[index].id).html(response.data[index].value)
                    );
                });
            }
            else{
                console.log(response);
            }
        })
        .fail(function (response) {
            console.log(response);
        });
    return false;
}
