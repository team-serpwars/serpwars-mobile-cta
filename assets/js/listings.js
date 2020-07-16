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

	$(".select-display-option").on("change",function(){
		var display_options = $(this).val();
		var item_id = $(this).data('item-id');
		$.post(ajaxurl,{
			action:"ca_change_display_option",
			display_options:display_options,
			item_id:item_id
		},function(data){
			console.log(data);
		})
	})
	window.selected_item = -1;
	$(".modal-trigger").on("click",function(e){
		e.preventDefault();
		var id = $(this).data("item-id");
		window.selected_item = id;
		$.post(ajaxurl,{action:"ca_display_options",id:id},function(response){
			$("#post-lists").html("");
			for(var index in response.data.posts){
				console.log(response.data.posts);

				$("#post-lists").append("<optgroup label='"+index.toUpperCase()+"' id='"+index+"'>")
				$("#post-lists").find("#"+index).html();
				for(var post in response.data.posts[index]){
					$("#post-lists").find("#"+index).append(
						$("<option>",{
							value:response.data.posts[index][post].id,
							text:response.data.posts[index][post].title
						})
					)
				}				
			}
			if(typeof response.data.display_options == "string"){
				response.data.display_options = JSON.parse(response.data.display_options);
			}

			if(response.data.display_options.display_on == "all"){
				$("#post-lists option").attr({"selected":"selected"})
				var d = $("#post-lists option").map(function(i,e){
					return $(e).attr("value");
				})
				$("#post-lists").val(d);
			}else {
				if(response.data.display_options.pages.length!=0){
					// console.log(response.data.display_options.pages.length);
				var pages = response.data.display_options.pages;
				pages = JSON.parse(pages.replace(/\\/g,""));
				$("#post-lists").val(pages);
				for(var i in pages){
					$("#post-lists option[value='"+pages[i]+"']").attr({"selected":"selected"});
				}
				}
			}
			$(".post-overlay,.post-modal").addClass("show");
		})
	})
	$(".post-overlay,.btn.btn-cancel").on("click",function(e){
		e.stopPropagation();
		$(".post-overlay,.post-modal").removeClass("show");		
	})

	$(".post-modal .btn-save").on("click",function(e){
		e.preventDefault();
		var pages = JSON.stringify($("#post-lists").val());
		// console.log(display_options);
		var display_on = $(".item-row_"+window.selected_item).find(".select-display-option").val();

		$.post(ajaxurl,{action:"ca_save_display_option",display_on:display_on,id:window.selected_item,pages:pages},function(response){
			console.log(response);
			$(".post-overlay,.post-modal").removeClass("show");	
		})
	})
})(jQuery)