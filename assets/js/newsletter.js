$('#newsletter').submit(function (event) {
    event.preventDefault();

    var email = $('#newsletter__email').val();
    var dataString = 'email=' + email + '&token=' + token;

    var xhttp = $.ajax({
        url: '/assets/php/newsletter/addSubscriber.php',
        type: 'post',
        data: dataString
    });

    xhttp.done(function (response, textStatus, jqXHR) {
        response = response.split(';');
        token = response[1];
        console.log(response);
    });
});