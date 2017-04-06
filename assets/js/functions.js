
var oldid = '';
$('section').on('reached', function() { // switching active element based on position
    var id = $(this).attr('id');
    var headerobject = $('.desktop a[href=\\#' + id + ']');
    if (oldid != id && id !== undefined ) {
        removeactive();
        headerobject.addClass('position');
        leftpos = headerobject.parent().position().left;
        width = headerobject.parent().width();
        $('#magic-line').stop(true, false).animate({ left: leftpos, width: width });
        oldid = id;
    } else if ($(this).attr('id') === undefined) {
        removeactive();
        $('#magic-line').stop(true, false).animate({ width: 0, left: 0 });
        oldid = undefined;
    }
});

function removeactive() {
    $('[class*=position]').each(function() {
        $(this).removeClass('position');
    });
}

var didscroll = true;
$(document).scroll(function() {
    didscroll = true;
});
var sections = $('section');
var dt;
setInterval(function() { // triggerind reached event
    if (didscroll) {
        sections.each(function() {
            dt = $(window).scrollTop() + 71; // - $(this).position().top;
            if (dt > $(this).position().top && dt < $(this).position().top + $(this).height()) $(this).trigger('reached');
            didscroll = false;
        });
    }
}, 50);



