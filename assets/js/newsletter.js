$('#newsletter').submit(function (event) {
    event.preventDefault();
    var email = $('#newsletter__email').val();

    if (email != "" && validateEmail(email)) {
        var dataString = 'email=' + email + '&token=' + token;

        var xhttp = $.ajax({
            url: '/assets/php/newsletter/addSubscriber.php',
            type: 'post',
            data: dataString
        });


        xhttp.done(function (response, textStatus, jqXHR) {
            response = response.split(';');
            token = response[1];
            console.log(response[0]);
        });
    }
});

function validateEmail(email) {
    var pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return pattern.test(email);
}