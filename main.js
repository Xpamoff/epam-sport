var settings = {
    "url": "https://www.strava.com/oauth/token?client_id=66900&client_secret=214f3cd4e0e56b8da5a25b23a2bb6786881b02e7&code=" + $('.code').text() + "&grant_type=authorization_code",
    "method": "POST",
    "timeout": 0,
};

var id;

$.ajax(settings).done(function (response) {
    id = response.athlete.id;
    createCookie("id", id, "1");

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
        document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    }
    location.href = "create-base.php";
});


