document.addEventListener("touchstart", function(){}, true);
$(document).ready(function() {
    $("a[href*=\\#]").click(function(event) { // scrolling effect for anchors
        event.preventDefault();
        $('html,body').animate({ scrollTop: $(this.hash).offset().top - 70 }, 500); // 70 is the offset for the nav bar
    });
});

var oldid = '';
$('section').on('reached', function() { // switching active element based on position
	var id = $(this).attr('id');
	headerobject = $('.desktop a[href=\\#' + id + ']');
	
	if(oldid != id  && id  !== undefined ){
		removeactive();
		headerobject.addClass('active');
		leftpos = headerobject.parent().position().left;
		width = headerobject.parent().width();
		$('#magic-line').stop(true,false).animate({left: leftpos, width: width});
		oldid = id; 
	}
	else if($(this).attr('id') === undefined){
		removeactive();
		$('#magic-line').stop(true,false).animate({width: 0, left: 0});
		oldid = undefined;
	}
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
            	dt = $(window).scrollTop() + 71;// - $(this).position().top;
            	if( dt > $(this).position().top  && dt < $(this).position().top + $(this).height()) $(this).trigger('reached');
	didscroll = false;
}
);
}},50);
// interactive news area
	$('.news-lower a.btn-small').click(
		function(event){
			event.preventDefault();
			var card = $(this).parent().parent();
			//card.parent().prepend(card);
			card.parent().children().each(function(){
				$(this).removeClass('selected');
				$(this).addClass('minor');
			});
			card.removeClass('minor');
			card.addClass('selected');
		}
	);
