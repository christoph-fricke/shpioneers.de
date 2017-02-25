$(document).ready(function() {
    $("a[href*=\\#]").click(function(event) { // scrolling effect for anchors
        event.preventDefault();
        $('html,body').animate({ scrollTop: $(this.hash).offset().top - 70 }, 500); // 70 is the offset for the nav bar
    });
});



$('section').on('reached', function() { // switching active element based on position
    removeactive();
    $('a[href=\\#' + $(this).attr('id') + ']').addClass('active');
});

function removeactive() {
    $('[class*=active]').each(function() {
        $(this).removeClass('active');
    });
}


$(document).scroll(function() { // triggerind reached event
    $('section').each(function() {
        var dt = $(window).scrollTop() - $(this).position().top;
        if (dt >= -70 && dt < 100) $(this).trigger('reached');
        console.log(dt);
    });
});