
<style id="asdsadasd">
	<?php 

	?>
	#spb-information-bar-<?php echo $this->item->id;?>{
		/*background-color: <?php echo $this->component_data->appearance->background; ?>;*/
		background: transparent;
		color: <?php echo $this->component_data->appearance->text_color; ?>;
		/*height: <?php echo $this->component_data->appearance->bar_height; ?>px;*/
		
		opacity: <?php echo $this->component_data->appearance->opacity; ?>;
		height:auto;
		bottom: 0;
		top: auto;
		padding: 0px;
		opacity: 0;
		transition:<?php echo ($this->component_data->visible_on_scroll_speed!="") ? ($this->component_data->visible_on_scroll_speed/1000) : "0.5";?>s opacity;

	}



	#spb-information-bar-<?php echo $this->item->id;?>.show-bar{
		opacity: 1;
	}

	#spb-information-bar-<?php echo $this->item->id;?> .btn{
		background-color: <?php echo $this->component_data->appearance->button_background; ?>;
		color: <?php echo $this->component_data->appearance->button_text_color; ?>;
	}

	#spb-information-bar-<?php echo $this->item->id;?> div#ca-button-container li .fa{
		color: #fff;
		display: block;
		padding: 15px 10px;
		font-size: <?php echo $this->component_data->appearance->font_size; ?>px;
	}

	#spb-information-bar-<?php echo $this->item->id;?> div#ca-button-container li a{
		display: block;
		/*background: green;*/
	}
	#spb-information-bar-<?php echo $this->item->id;?> div#ca-button-container li a>span{
		font-size: 28px;
    	color: #fff;
    	padding: 10px;
    	border-radius: 200px;
	}
/*	#spb-information-bar-<?php echo $this->item->id;?> div#ca-button-container li a>span{
		 position: relative;
  		top: 10%;
  		transform: translateY(-10%);
	}*/
	#spb-information-bar-<?php echo $this->item->id;?> div#ca-button-container li{
		width: 100%;
		text-align: center;
    	display: inline-block;
    	padding: 0;
    	margin: 0px -1px!important;
	}

	#spb-information-bar-<?php echo $this->item->id;?> div#ca-button-container .ca-link-text {
    font-size: 18px;
    text-align: center;
    vertical-align: text-top;
    display: inline;
    width: 100%;
    color: #fff;
    line-height: 10px;
}

span.ca-link-text.ca_bottom {
    display: block!important;
    width: 100%;

}

#ca-button-container ul{
	margin: 0;
	padding: 0;
}

div#ca-button-container {
    text-align: center;
    background: #fff;
}

.ca_display_timer {
    width: 80%;
    margin: 0 auto;
}
<?php foreach($this->component_data->list1 as $index=>$item){ 

		
	?>
/*<?php print_r($item);?>*/
		#spb-information-bar-<?php echo $this->item->id;?> div#ca-button-container li:nth-child(<?php echo ($index+1); ?>) {
			width: <?php echo ($item->width!="") ? $item->width."%" : "auto";?>;
		}

		#spb-information-bar-<?php echo $this->item->id;?> div#ca-button-container li:nth-child(<?php echo ($index+1); ?>) .ca_btn_wrapper{
			background: <?php echo $item->style->main->background;?>;
			height: <?php echo ($item->height!="") ? $item->height."px" : "auto";?>;
			border-radius: <?php echo ($item->style->border->radius!="") ? $item->style->border->radius."px" : "0";?>;
			line-height:2;
			/*line-height:<?php echo ($item->style->line_height!="") ? $item->style->line_height : "2";?>;*/
			border-style:<?php echo ($item->style->border->style!="") ? $item->style->border->style : "none"?>;
			border-width:<?php echo ($item->style->border->style!="") ? $item->style->border->width."px" : "0px"?>;
			border-color:<?php echo ($item->style->border->color!="") ? $item->style->border->color : "transparent"?>;
		}
<?php } ?>


	@media screen and (min-width:1100px){
		#spb-information-bar-<?php echo $this->item->id;?>{
			display: none;
		}
	}

	span.fa.ca_right {
    	display: inline-block!important;
	}
</style>
<?php



	global $post;
?>


 <div id="spb-information-bar-<?php echo $this->item->id;?>" class = "ca_mobile_buttons-<?php echo $this->item->id; ?>" data-scroll-value="<?php echo $this->component_data->visible_on_scroll_value;?>">
 	<div id="ca-button-container">


	<?php
		$module_settings = json_decode($this->component[0]->settings);

	?>
	
 	<?php if(isset($module_settings->display_message) && $module_settings->display_message==1){ ?>
		<div class="ca_message_wrapper"><?php print_r($this->component[0]->message);?></div>
 	<?php } ?>

 	<?php if(isset($module_settings->display_timer) && $module_settings->display_timer==1){ ?>
		<div class="ca_display_timer"></div>
 	<?php } ?>



                <ul>
					<?php
						global $post;


						$this->component_title = isset($this->component[0]->title) ? $this->component[0]->title : "Untitled Component";
						if(!empty($this->component_data->list1)){
							foreach($this->component_data->list1 as $item){ ?>
								<?php
								$this->component_item = isset($item->icon) ? str_replace('fa-','',$item->icon) : "Unnamed Button";

								?>
								<?php $link_text_position = (isset($item->text_position) || $item->text_position=="") ? "ca_right" : "ca_bottom"; ?>
								<?php if($item->type=="custom"){ ?>
								<li>
									<div class="ca_btn_wrapper">							 			
										<a href="<?php echo $item->link_path;?>"  class="<?php echo str_replace('fa-','',$item->icon);?>" onclick = "_gaq.push(['_trackEvent', $this->component_title, 'Click', $this->component_item );"> 
											<div class="ca_button_content">	
												<span class="fa <?php echo $item->icon;?> <?php echo $link_text_position;?>"></span>
												<?php if(!empty($item->link_text)){ ?>
												<span class="ca-link-text <?php echo $link_text_position;?>" ><?php echo $item->link_text;?></span>
												<?php } ?>
											</div>
										</a>
									</div>
								</li>
								<?php }else { ?>									
								<?php 
									 $loaded_item = $this->get_social_media_share_link($item->type);

								?>
								<?php $link_text_position = (isset($item->text_position) || $item->text_position=="") ? "ca_right" : "ca_bottom"; ?>
								<li>
									<div class="ca_btn_wrapper">	
										<a href="<?php echo $loaded_item->url;?>"  class="<?php echo str_replace('fa-','',$item->icon);?>" onclick = "_gaq.push(['_trackEvent', $this->component_title, 'Click', $this->component_item );">
											<div class="ca_button_content">												
												<span class="fa <?php echo $item->icon;?> <?php echo $link_text_position;?>"></span>
												<?php if(!empty($item->link_text)){ ?>
													<span class="ca-link-text <?php echo $link_text_position;?>"><?php echo $item->link_text;?></span>
												<?php } ?>
											</div>											
										</a>
									</div>
								</li>
							<?php }
						}
					}

					?>

					<?php //require_once("proto-social-media.php");?>
				</ul>
    </div>
 </div>

 <script>
 	(function($){
	// var waypoints = $('#spb-information-bar-<?php echo $this->item->id;?>').waypoint(function(direction) {
	//   // notify(this.element.id + ' hit 25% from top of window') 
	//   console.log(this);
	//   $(this.element).addClass("showbar");
	// }, {
	//   offset: '25%'
	// })

	var scroll_value = $("#spb-information-bar-<?php echo $this->item->id;?>").data("scroll-value");
	

	$(window).on('scroll',function($el){
		if($(this).scrollTop()>parseInt(scroll_value)){
			$('#spb-information-bar-<?php echo $this->item->id;?>').addClass("show-bar");
		}else{
			$('#spb-information-bar-<?php echo $this->item->id;?>').removeClass("show-bar");
		}
	})

	if($("body").width()<1100){
		$("body").css({"margin-bottom":$("#spb-information-bar-<?php echo $this->item->id;?>").height()+"px"});		
	}


})(jQuery)
 </script>