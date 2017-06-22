$('#newsletter').submit(function (event) {
    event.preventDefault();
    var email = $('#newsletter__email').val();
    var lang = $('#newsletter select').val();
    if (lang !== null && email != "" && validateEmail(email)) {
        var dataString = 'email=' + email + '&lang=' + '&token=' + token;
        var xhttp = $.ajax({
            url: '/assets/php/newsletter/addPending.php',
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            type: 'post',
            data: dataString
        });


        xhttp.done(function (response, textStatus, jqXHR) {
            response = response.split(';');
            token = response[1];
            if (1 == response[0]) {
                console.log('Subscribes successfully');
              
                $('#newsletter [name=email]').val("");
              
                $('#nlSuccess').addClass('active');
                setTimeout(function () {
                    $('#nlSuccess').removeClass('active')
                }, 5000);
            } else {
                console.log('Subscribition failed');
                $('#nlFailed').addClass('active');
                setTimeout(function () {
                    $('#nlFailed').removeClass('active')
                }, 5000);

            }
        });
    }
});

function validateEmail(email) {
    var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return pattern.test(email);
}
