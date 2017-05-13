$(document).ready(checkUser);

/**
 * Checks wether or not the use already has a session running
 */
function checkUser() {
    $.ajax({
        url: "/assets/php/checkUser.php",
        type: "post",
        success: function (data, a, b) {
            if (data == 'true') {
                $('#info-banner').addClass('active');
            }
        }
    });
}

$('#info-close').click(function() {
    $('#info-banner').removeClass('active');
});