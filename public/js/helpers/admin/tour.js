// var SITE_URL = '{{url("/")}}';
var pageCounter = 0;
var doneCounter = 0;
var totalMembers = $('#totalB').text();
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
function loadTours(x) {
    $.ajax({
            type: 'GET',
            url: TOUR_FOR_EXPENSE_LIST_URL,
            data: {
                'destination_id': x
            },
            dataType: "json"
        })
        .done(function (response) {
            if(response.success){
                $("#tour_id").empty();
                var mySelect = $('#tour_id');
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
function loadPartnerCities(x,y) {
    $.ajax({
            type: 'GET',
            url: CITY_LIST_URL,
            data: {
                'id': x,
                'partner_id': y
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
function loadState(x) {
    // alert(SITE_URL + 'members/ajax/State');
    $.ajax({
            type: 'GET',
            url: SITE_URL + 'members/ajax/State',
            data: {
                'id': x
            },
            dataType: "json"
        })
        .done(function (response) {
            if(response.success){
//                fillDropdown(dropdownID, response.data);
                $("#state_id").empty();
                var mySelect = $('#state_id');
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
function loadState2(x) {
    // alert(SITE_URL + '/site-ajax-saving/State');
    $.ajax({
            type: 'GET',
            url: SITE_URL + '/site-ajax-saving/State',
            data: {
                'id': x
            },
            dataType: "json"
        })
        .done(function (response) {
            if(response.success){
//                fillDropdown(dropdownID, response.data);
                $("#state_id").empty();
                var mySelect = $('#state_id');
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
function selectAllTours(x) {
    $.ajax({
            type: 'GET',
            url: TOUR_FOR_EXPENSE_LIST_URL,
            data: {
                'destination_id': $('#destination_id').val()
            },
            dataType: "json"
        })
        .done(function (response) {
            if(response.success){
                $("#tour_id").empty();
                var mySelect = $('#tour_id');
                $.each(response.data, function(index) {
                    if((x.checked)){
                        mySelect.append(
                            $('<option></option>').val(response.data[index].id).html(response.data[index].value).attr('selected', true)
                        );
                    }
                    else{
                        mySelect.append(
                            $('<option></option>').val(response.data[index].id).html(response.data[index].value)
                        );
                    }
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