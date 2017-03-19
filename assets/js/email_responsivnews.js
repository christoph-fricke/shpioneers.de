// Calls the server to recieve a token
var token; // gloabal because we will need it later
$(function() {
    var tokenRequest;

    tokenRequest = $.ajax({
        url: '/assets/php/tokenCreator.php',
        type: 'post',
        success: function(result) {
            token = result;
        }
    });

});

// Interrupts the submit event of the contact form and handles the data-serving with ajax
$('#contact').submit(function(event) {
    event.preventDefault();
    var dataString, sendMail;

    dataString = 'name=' + $('#contact [name=name]').val() +
        "&email=" + $('#contact [name=email]').val() +
        "&message=" + $('#contact [name=message]').val() +
        "&token=" + token; // Maybe the token should gets checked wether or not it is checked be for it gets send. Otherwise it gets checked on the server anyway.

    sendMail = $.ajax({
        url: '/assets/php/mail.php',
        type: 'post',
        data: dataString
    });

    sendMail.done(function(response, textStatus, jqXHR) {
        response = response.split(';');
        token = response[1];

        if (1 == response[0]) {
            console.log('Email has been send.');
            $('#contact [name=name]').val("");
            $('#contact [name=email]').val("");
            $('#contact [name=message]').val("");
            $('#emailsent').addClass('active');
            setInterval(function() { $('#emailsent').removeClass('active') }, 5000);
        } else {
            console.log('Email could not been send');
            $('#nemailsent').addClass('active');
            setInterval(function() { $('#nemailsent').removeClass('active') }, 5000);

        }
    });
});
// interactive news area
$('.news-lower a.btn-small.maximise').click( // expanding the news-card
    function(event) {
        event.preventDefault();
        var card = $(this).parent().parent();
        //card.parent().prepend(card);
        card.parent().children().each(function() {
            $(this).removeClass('selected');
            $(this).addClass('minor');
            $(this).removeClass('transition');
        });
        card.removeClass('minor');
        card.addClass('selected');
    }
);
$('.news-lower a.btn-small.minimise').click( // minimising it again
    function(event) {
        event.preventDefault();
        var card = $(this).parent().parent();
        //card.parent().prepend(card);
        card.parent().children().each(function() {
            $(this).removeClass('selected');
            $(this).removeClass('minor');
        });
    });
