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
	 index = $(this).index(".edit");
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
