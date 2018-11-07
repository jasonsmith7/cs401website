$(function() {
	$("#login_form").submit(function(){
		var values = $("#comment").serialize();
		$.ajax({
			type: "POST",
			url: "../handler.php",
			data: values,
			success : function() {
				$("#comments_table tbody").prepend("<tr><td>" + $("#comment").val() +
					"</td><td>Just now!!! !! !!!!!</td></tr>");
			}
		});
		return false;
	});
});