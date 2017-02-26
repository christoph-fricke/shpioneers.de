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

var didscroll = false;
$(document).scroll(function(){
didscroll = true;
});
var sections = $('section');
var dt;
setInterval(function(){ // triggerind reached event
	if(didscroll){
		sections.each(function(){
            	dt = $(window).scrollTop() + 70;// - $(this).position().top;
            	if( dt > $(this).position().top  && dt < $(this).position().top + $(this).height()) $(this).trigger('reached');
	didscroll = false;
}
);
}},50);
