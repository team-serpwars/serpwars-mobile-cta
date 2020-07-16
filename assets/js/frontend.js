(function($){
	$("body").css({"margin-bottom":(jQuery(".serp-mobile-elements-section").height()/2)+"px"})

	$.get(my_ajax_object.ajax_url,{action:"load_mobile_ctas",id:my_ajax_object.id},function(response){
		$(".mcta-spinner-wrap").fadeOut()
		$("#mobile-cta-ajax-style").html(response.data.style)
		$(".serp-mobile-elements-section").fadeIn()
	})
})(jQuery)