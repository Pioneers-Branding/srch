
// Clear localStorage after one hour.
var hours = 1; // to clear the localStorage after 1 hour
var now = new Date().getTime();
var setupTime = localStorage.getItem('setupTime');
if (setupTime == null) {
    localStorage.setItem('setupTime', now)
} else {
    if((now - setupTime) > hours*60*60*1000) {
        localStorage.clear()
        localStorage.setItem('setupTime', now);
    }
}

getLocation();

function getLocation() {
    if (window.localStorage.getItem("city")){
        generateLocationModel(
            window.localStorage.getItem('selected_city_id'),
            JSON.parse(window.localStorage.getItem("city"))
        )
        return
    }
    $.ajax({
        url: "/get-all-city",
        headers: {
            "X-CSRFToken": csrftoken
        },
        type: "GET",
        success: function(response) {
            window.localStorage.setItem('city', JSON.stringify(response.data));
            window.localStorage.setItem('selected_city_id', response.selected_city_id);
            generateLocationModel(response.selected_city_id, response.data)
        }
    })
}

function generateLocationModel(selected_city_id, data){
    var opt = "";

    for (const value of data) {
        value.city_id == selected_city_id ? ($("#selected_location_data").val(value.city_name),
        $("#select-location").html('<i class="bi bi-geo-alt mr-1"></i> ' + value.city_name),
        $("#lblCityName").html('<i class="ec ec-map-pointer mr-1"></i> ' + value.city_name),

        opt += '<li class="text-danger" onclick="selectMyLocation(' + value.city_id + ')"  style="cursor:pointer">' + value.city_name + "</li>") : opt += '<li onclick="selectMyLocation(' + value.city_id + ')"  style="cursor:pointer">' + value.city_name + "</li>"
    }
    $(".store-list").empty().append(opt);
}

function selectMyLocation(id) {
    $.ajax({
        headers: {
            "X-CSRFToken": csrftoken
        },
        url: "/select-mylocation",
        type: "POST",
        data: "city_id=" + id,
        success: function(response) {
            window.localStorage.setItem('selected_city_id', id);
            location.reload()
        }
    })
}