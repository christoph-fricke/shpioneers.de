$(".delete").click(function (e) {
    $.ajax({
        url: "remove.php",
        type: "GET",
        data: {
            index: $(this).index(".delete"),
            token: token
        }
    });
});

$(".edit").click(function (e) {
    e.preventDefault();
	 index = $(this).index(".edit") - 1;
	$.ajax({
        url: "change.php",
        type: "GET",
        data: {
            index: index 
        },
	success: function(data,a,b){
		var result = JSON.parse(data);
		parent.getchanges(result,index);
	}
    })
});
$('.change_order').click(function(e){
if($(this).index('.up') != -1){
	var movement = 1
}
else{
	var movement = -1;
}
if(movement == 1){
	var index2 = $(this).index('.up');
}
else{
	var index2 = $(this).index('.down');
}
$.ajax({
	url: 'move.php',
	type: 'GET',
	data: {
		index: index2,
		shift: movement,
		token: token
	}
});
});
