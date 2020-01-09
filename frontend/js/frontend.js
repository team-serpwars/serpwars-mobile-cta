(function($){
	// var waypoints = $('#spb-information-bar').waypoint(function(direction) {
	//   // notify(this.element.id + ' hit 25% from top of window') 
	//   console.log(this);
	//   $(this.element).addClass("showbar");
	// }, {
	//   offset: '25%'
	// })


	 $('.ca_display_timer').countdown(data.item.expiration, function(event) {
      		$(this).html(event.strftime(`<span class="weeks">
                <span class="value">%w</span>
                <span class="unit">Weeks</span>
            </span>
            <span class="days">
                <span class="value">%d</span>
                <span class="unit">Days</span>
            </span>
            <span class="hours">
                <span class="value">%H</span>
                <span class="unit">Hours</span>
            </span>
            <span class="minutes">
                <span class="value">%M</span>
                <span class="unit">Minutes</span>
            </span>
            <span class="seconds">
                <span class="value">%S</span>
                <span class="unit">Seconds</span>
            </span>`));      	
 		 });	
	

	$(window).on('scroll',function($el){
		if($(this).scrollTop()>100){
			$('#spb-information-bar').addClass("show-bar");
		}else{
			$('#spb-information-bar').removeClass("show-bar");
		}
	})



})(jQuery)