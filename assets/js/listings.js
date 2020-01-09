(function($){
	$(".ca-clone").on("click",function(e){
		e.preventDefault();
		var id = $(this).data("id");
		$(this).hide();
		$.post(ajaxurl,{action:"ca_clone_item",id:id},function(data){
			location.reload();
		})
	})

	$(".ca-delete").on("click",function(e){
		e.preventDefault();
		var id = $(this).data("id");
		var text = $(this).closest("tr").find("td.title a").text()

		if(confirm("Are you sure to delete \n"+text)){
			$(this).closest("tr").hide();
			$.post(ajaxurl,{action:"ca_removeitem",id:id},function(data){
				console.log(data)
				location.reload();
			})
		}
	})
})(jQuery)