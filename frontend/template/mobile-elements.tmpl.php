<div class="serp-mobile-elements-wrap">
	<div class="serp-mobile-elements">
		<div class="serp-button-collections-wrap" id="button-wrapper">
			<div class="<?php echo $static_class; ?> serp-button-collections">
				<ul class="<?php echo $container->layout;?>">
				<div>	
				<?php 
					global $post;
					$post_ID = $post->ID;
					$loaded_data = FrontendHelper::filterElements($loaded_data,$post_ID);
					foreach($loaded_data as $i => $el){ ?>		
					<li class="ca-share-button item waves-effect ca-el-<?php echo $el->type;?> <?php echo $el->visible_content;?>" >						
						<a href="<?php echo $el->link_path;?>" onclick = "gtag('event','<?php echo $el->type."_button"; ?>', {event_category: '<?php echo $el->gtm->category; ?>', event_label: '<?php echo $el->gtm->label; ?>',value: '<?php echo $el->gtm->value; ?>'});" >
							<div class="ca_button_content">
								<span class="ca_icon <?php echo $el->icon;?>"></span>
								<span class="ca_btn_text"><?php echo $el->link_text;?></span>
							</div>
						</a>					
					</li>
				<?php } ?>
				</div>
			</ul>
		</div>
	</div>

	</div>
</div>
<!-- <script src ="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" defer></script> -->
<script>
	var h = document.getElementById("button-wrapper").offsetHeight
	document.getElementsByTagName("body")[0].style.marginBottom=h+"px";
</script>