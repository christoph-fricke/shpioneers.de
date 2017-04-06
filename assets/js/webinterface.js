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

$(".edit").click(function(e) {
    $.ajax({
        url:fdgf
    })
});