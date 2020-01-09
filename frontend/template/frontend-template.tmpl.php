<?php
	$element_data = $this->component_data->list1;

?>

<style id="styler2">
.serp-button-collections {
    position: fixed;
    top: unset;
    bottom: 0;
    z-index: 999;
    width: 100%;
}
	.serp-button-collections>ul {
    	position: relative;
    	width: inherit;
	}
	.serp-button-collections li {
    text-align: center;
	}
	.serp-button-collections .serpwars-secondary-panel {
    	position: absolute;
    	width: 100%;
    	bottom: 0;
    	right: -100%;
    	transition: 0.25s right;
	}
	.serp-button-collections .serpwars-secondary-panel.active {
    	right: 0%;
	}
	
	ul.serpwars-secondary-panel li {
    	width: 100%;
	}

	ul.serpwars-secondary-panel a {
    text-align: left;
    width: 100%!important;
	}

	<?php 
	
	/*
		
	*/
	echo  ".serp-button-collections {";
    	echo  "text-align: ".$this->component_data->button_position.";";
    	echo  "width: ".$this->component_data->container_style->main->width."%;\n";
       	echo  "bottom: ".$this->component_data->container_style->main->bottom."%;\n";
       	echo  "left: ".$this->component_data->container_style->main->left."%;\n";
       	echo  "right: ".$this->component_data->container_style->main->right."%;\n";

    echo  "}\n";

    echo  ".serp-button-collections li {";
    echo  "text-align: ".$this->component_data->button_content_position.";";
    echo  "}\n";
	
	foreach($element_data as $item){
		$el_normal = $item->style->normal;
		$el_id = $item->id;
		

		 echo "#".$el_id ."{";

            echo "background-color:".$el_normal->main->background.";\n";
            echo "width:".$el_normal->width."%;\n";
            echo "transform:scale(".($el_normal->main->scale/100).");";
            echo "margin-top : ". $el_normal->margin->top."px;\n";
            echo "margin-right : ". $el_normal->margin->right."px;\n";
            echo "margin-bottom : ". $el_normal->margin->bottom."px;\n";
            echo "margin-left : ". $el_normal->margin->left."px;\n";

            if(json_decode($el_normal->border->top_left_border_radius_enabled)){
                echo "border-top-left-radius : ". $el_normal->border->radius."px;\n";
            }
            if(json_decode($el_normal->border->top_right_border_radius_enabled)){
                echo "border-top-right-radius : ". $el_normal->border->radius."px;\n";
            }
            if(json_decode($el_normal->border->bottom_left_border_radius_enabled)){
                echo "border-bottom-left-radius : ". $el_normal->border->radius."px;\n";
            }
            if(json_decode($el_normal->border->bottom_right_border_radius_enabled)){
                echo "border-bottom-right-radius : ". $el_normal->border->radius."px;\n";
            }


            echo "border:".$el_normal->border->width."px solid ".$el_normal->border->color.";\n";                


            echo "}\n";

            echo "#".$el_id ." .fa{\n";
            echo "color:".$el_normal->icon->color.";\n";
            echo "vertical-align: middle;\n";            
            echo "}\n";
            echo "#".$el_id ." .fa:before{";

            echo "line-height:0px\n;";
            echo "font-size:".$el_normal->icon->font_size."px;\n";
            echo "}\n";
            echo "#".$el_id ." a,";
            echo "#".$el_id ." >span{";
            echo "padding:".$el_normal->padding->top_bottom."px ".$el_normal->padding->left_right."px;\n";
            echo "height:".$el_normal->height."px;\n";
            
            echo "}\n";
            echo "#".$el_id ." .ca_button_content{\n";
            echo "line-height:".$el_normal->main->line_height."px;\n";

            echo "}\n";
            echo "#".$el_id ." .ca_btn_text{\n";
            echo "color:".$el_normal->text->color.";\n";
            echo "font-size:".$el_normal->text->font_size."px;\n";

            if(json_decode($el_normal->text->isBold)){
                echo "font-weight:bold;\n";                
            }
            if(json_decode($el_normal->text->isItalic)){
                echo "font-style: italic;\n";                
            }

            echo "}\n";
		
	} ?>


	@media screen and (min-width:1100px){
		#spb-information-bar-<?php echo $this->id;?>{
			display: none;
		}
	}

/*	span.fa.ca_right {
    	display: inline-block!important;
	}*/


</style>
<div class="serp-mobile-elements" id="spb-information-bar-<?php echo $this->id;?>">
	<div class="serp-button-collections">
		<ul>
		<?php foreach($element_data as $item){ ?>
			<?php if(!json_decode($item->atSecondaryPanel)){ ?>
			<li  class="ca-share-button item waves-effect" style="padding:0" id="<?php echo $item->id; ?>">
				<?php $this->renderContent($item);?>
			</li>
			<?php } ?>
		<?php } ?>
			
			<ul class="serpwars-secondary-panel">
				<?php foreach($element_data as $item){ ?>
					<?php if(json_decode($item->atSecondaryPanel)){ ?>
						<li  class="ca-share-button item waves-effect" style="padding:0" id="<?php echo $item->id; ?>">
							<?php $this->renderContent($item);?>
						</li>
					<?php } ?>
				<?php } ?> 
			</ul>
		</ul>
	</div>
</div>

<script>
	(function($){
		$("body").on("click",function(){
					$(".serpwars-secondary-panel").removeClass("active")    				
    			})
    	$("body").on("click","select,.minicolors,.ui-accordion-header",function(e){
			e.preventDefault();
			e.stopPropagation(); 				
    	}).on("click",".serp-secondary-toggle",function(e){
			e.preventDefault();
			e.stopPropagation();
			$(".serpwars-secondary-panel").addClass("active")
		});


		
	})(jQuery)
</script>