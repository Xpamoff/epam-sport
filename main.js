var settings = {
    "url": "https://www.strava.com/oauth/token?client_id=66900&client_secret=214f3cd4e0e56b8da5a25b23a2bb6786881b02e7&code=" + $('.code').text() + "&grant_type=authorization_code",
    "method": "POST",
    "timeout": 0,
};

var id;
var token;
var ride_total;
var swim_total;
var run_total;
var name;


$.ajax(settings).done(function (response) {
    id = response.athlete.id;
    token = response.access_token;

    var settings1 = {
        "url": "https://www.strava.com/api/v3/athletes/"+id+"/stats",
        "method": "GET",
        "timeout": 0,
        "headers": {
            "Authorization": "Bearer "+token+" "
        },
    };
    name = response.athlete.firstname + ' ' + response.athlete.lastname;
    $.ajax(settings1).done(function (response1) {

        ride_total = response1.all_ride_totals.distance;
        run_total = response1.all_run_totals.distance;
        swim_total = response1.all_swim_totals.distance;

        createCookie("id", id, "1");
        createCookie("name", name, "1");
        createCookie("ride_total", ride_total, "1");
        createCookie("run_total", run_total, "1");
        createCookie("swim_total", swim_total, "1");

        function createCookie(name, value, days) {
            var expires;
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            }
            else {
                expires = "";
            }
            document.cookie = escape(name) + "=" + escape(encodeURIComponent(value)) + expires + "; path=/";
        }
        location.href = "create-base.php";
    });


});


