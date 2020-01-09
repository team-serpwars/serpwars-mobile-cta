
	<div class="nb-container ">
		<br>
		<div class="row"><!-- <li class="tab-link" data-tab="tab-2">Style</li> -->
			<div class="col m12">
				 <a class='dropdown-button btn blue-grey darken-2' href='#' data-activates='dropdown1'>
				 	<i class="fa fa-plus"></i>
				 Create Button</a>
                  	<!-- Dropdown Structure -->
					<ul id='dropdown1' class='dropdown-content' style="width:320px;">
					  <li><a href="#!" data-item-type="custom">Custom</a></li>
					  <li><a href="#!" data-item-type="facebook"><i class = "fa fa-facebook"></i> Facebook</a></li>
					  <li><a href="#!" data-item-type="twitter"><i class = "fa fa-twitter"></i> Twitter</a></li>
					  <li><a href="#!" data-item-type="google_plus"><i class = "fa fa-google-plus"></i> Google+</a></li>
					  <li><a href="#!" data-item-type="pinterest"><i class = "fa fa-pinterest"></i> Pinterest</a></li>
					  <li><a href="#!" data-item-type="linked_in"><i class = "fa fa-linkedin"></i> Linked In</a></li>
					  <li><a href="#!" data-item-type="digg"><i class = "fa fa-digg"></i> Digg</a></li>
					  <li><a href="#!" data-item-type="tumblr"><i class = "fa fa-tumblr"></i> Tumblr</a></li>
					  <li><a href="#!" data-item-type="reddit"><i class = "fa fa-reddit"></i> Reddit</a></li>
					  <li><a href="#!" data-item-type="yahoo"><i class = "fa fa-yahoo"></i> Yahoo</a></li>
					</ul>
			</div>
		</div>


	<ul class="tabs">
		<li class="tab-link current" data-tab="tab-1">Content</li>
		<li class="tab-link" data-tab="tab-2">Style</li>
		<li class="tab-link" data-tab="tab-3">Advance</li>
		<!-- <li class="tab-link" data-tab="tab-3">	  <a class="waves-effect waves-light modal-trigger" href="#modal1"> Display Rules</a></li> -->
	
	</ul>

	<div id="tab-1a" class="tab-contenta currenta">
		
		<div class="row">
			<div class="col s12 m12" style="padding:0;">

					<form action="">
						
						
					<div class="card-content">
						<div class="ca-field-wrap">
						<!-- <span class="card-title">Customized Text and Button</span> -->

					<!-- 	<label for="ca_item_title">Title</label>
						<input type = "text" name="ca_item_title" class ="ca_item_title" value = "<?php echo (isset($item->title)) ? $item->title : ''; ?>" <?php echo (isset($item->title)) ? "readonly" : ""; ?> > -->
						</div>

							<div class="ca_social_button_style">
 							<label>Style Button</label>
 							<select v-model="social_button_style" name="ca_t_button_style" class="browser-default">
  								<option value='ca_radio_default'>Default</option>
  								<!-- <option value='ca_rounded_square'>Rounded Square</option> -->
  								<option value='ca_rounded_rectangle'>Show Text</option>
  								<!-- <option value='ca_circle'>Circle</option> -->
  								<!-- <option value='ca_oval'>Oval With Text</option> -->
							</select>
            			</div> 

						<div class="ca-field-wrap ca-hide">
							<label for="">Your Message</label>
							<textarea name="wp_editor_custom" id="wp_editor_custom" v-model="message"  cols="30" rows="10"></textarea>
						</div>
						<div class="ca-field-wrap ca-hide">
							<div class="row">
								<div class="col m6"><label for="#ca_btn-text">Button Text</label><input type = "text" v-model="button_text" id = "ca_btn-text" name = "" class= "input-field"></div>
								<div class="col m6"><label for ="#ca_coupon-code">Coupon Code (Optional)</label><input type = "text" id = "ca_coupon-code" name = "" class= "input-field"></div>
							</div>
						</div>
						<div class="ca-field-wrap ca-hide">
								<label for ="#ca_coupon-code">Link to URL</label><input type = "text" id = "ca_coupon-code" v-model="link" name = "">
								 <p>
      								<input name="group1" type="radio" id="test4" />
      								<label for="test4">Open Link in new Tab</label>
    							</p>
						</div>
					</div>
					</form>

			</div>
			
	

			<div class="card-content ca-hide">

							<p>&nbsp;</p>
						   <input type="checkbox" id="checkbox" v-model="ok">
						   <label for="checkbox" v-if="ok" >Countdown Enabled</label>
						   <label for="checkbox" v-else >Countdown Disabled</label>
							<p>&nbsp;</p>
						   <div v-show="ok">
							
						   		<div class="col m12">
						   		<label for="ca_expire_date">Expire Date</label>
						   		<input type="text" class="datepicker" id="ca_expire_date" placeholder="Select Date" required>
						   		</div>
						   		<div class="col m12">
						   		<label for="ca_expire_time">Expire Time</label>
						   		<input type="text" class="timepicker" id="ca_expire_time" placeholder="Select Time" required>
						   		</div>				  				  
					</div>


			<div class="col s12 m12">
				<div class="row">
					<div class="col m12">


					<div class="card-content ca-social-sharing-button-menu">

					<div id="ca-app-wrapper">
						

            			



            <div  id="primary-content">
             <!--    <div class="ca_meta-box-sortables">
                	<div class="ca_icon_nav_panel" v-for="item in custom_buttons">
                		
                	</div>
                </div> -->
                <!-- <div class="meta-box-sortables"></div> -->
                <div class="mca_mobile_button_panels"></div>

                <div class="ca_mobile_button_panels">

                	<div class="mca_mobile_button_panel" v-for="item in custom_buttons">
                		<div class="postbox">
							<div class="fw-step-controls">
								<i title="Remove Button" aria-hidden="true" class="fa fa-remove fw-remove-step"></i>
							</div>
							<div class="fw-clearfix"></div>



                			
                		</div>
                	</div>

                </div>
                <!-- the container that gets populated with the rendered templates -->
            </div>
            </div>


					</div>

				</div>

				
					<div class="col m12">
						
					
				

					


						

					<div class="card-content ca-social-sharing-button-menu">
						<!-- <span class="card-title">Social Sharing Buttons</span>
						<div class="row">
							<div class="col m3"><label for="ca_icon_facebook"><i class="fa fa-facebook"></i></label><input type="checkbox" id = "ca_icon_facebook" name="ca_social_sharing_btn" value="facebook"></div>
							<div class="col m3"><label for="ca_icon_google_plus"><i class="fa fa-google-plus"></i></label><input type="checkbox" id = "ca_icon_google_plus" name="ca_social_sharing_btn" value="google-plus"></div>
							<div class="col m3"><label for="ca_icon_twitter"><i class="fa fa-twitter"></i></label><input type="checkbox" id = "ca_icon_twitter" name="ca_social_sharing_btn" value="twitter"></div>
							<div class="col m3"><label for="ca_icon_pinterest"><i class="fa fa-pinterest"></i></label><input type="checkbox" id = "ca_icon_pinterest" name="ca_social_sharing_btn" value="pinterest"></div>
						</div>
						<div class="row">
							<div class="col m3"><label for="ca_icon_linkedin"><i class="fa fa-linkedin"></i></label><input type="checkbox" id = "ca_icon_linkedin" name="ca_social_sharing_btn" value="linkedin"></div>
							<div class="col m3"><label for="ca_icon_reddit"><i class="fa fa-reddit"></i></label><input type="checkbox" id = "ca_icon_reddit" name="ca_social_sharing_btn" value="reddit"></div>
							<div class="col m3"><label for="ca_icon_tumblr"><i class="fa fa-tumblr"></i></label><input type="checkbox" id = "ca_icon_tumblr" name="ca_social_sharing_btn" value="tumblr"></div>
						</div> -->
						<div class="row ca-hide">
								<div class="col m12"><label for="ca_share_page_url">Share Page (Optional)</label><input type = "text" id = "ca_share_page_url" name = "share_page" class= "input-field"></div>
								<div class="col m12"><label for="ca_success_message">Success Message</label><input type = "text" v-model="success_message" id = "ca_success_message" name = "ca_success_message" class= "input-field"></div>
						</div>
					</div>


					</div>
				</div>


			</div>
		</div>						
	</div>

	<div class="row">
			<?php require_once("basic-settings.tmpl.php");?>
		</div>
	<div id="tab-2a" class="tab-contenta" style="display: none;">
		<div class="row">
			<div class="col m12">

					<div class="card-content">
						<span class="card-title">Bar Settings</span>
						<p class="range-field">
							<label for="ca_bar_height">Bar Height</label>
      						<input type="range" id="ca_bar_height" min="12" max="300" v-model="appearance.bar_height" />
    					</p>
    					<p class="range-field">
    						<label for="ca_font_size">Font Size</label>
      						<input type="range" id="ca_font_size" min="0" max="32" v-model="appearance.font_size" />
    					</p>
						<p class="range-field">
							<label for="ca_opacity">Opacity</label>
      						<input type="range" id="ca_opacity" min="0" max="1" step = "0.1" v-model="appearance.opacity" />
    					</p>
    					<p class="range-field">
							<label for="ca_visibility">Visibility Options</label>

      						<select v-model="visibility_options" class="browser-default">
  								<!-- inline object literal -->
  								<option value='always_visible'>Always Visible</option>
  								<option value='visible_on_scroll'>Show On Scroll</option>
							</select>
							<label for="ca_on_scroll_value" v-show="visibility_options=='visible_on_scroll'">Scroll Value</label>
      						<input type="text" id="ca_on_scroll_value" v-show="visibility_options=='visible_on_scroll'" v-model="visible_on_scroll_value" />

      						<label for="ca_on_scroll_value" v-show="visibility_options=='visible_on_scroll'">Scroll Display Delay (in miliseconds)</label>
      						<input type="text" id="ca_on_scroll_value" v-show="visibility_options=='visible_on_scroll'" v-model="visible_on_scroll_speed" />

    					</p>
					</div>

			</div>
			<div class="col m12">

					<div class="card-content">
						<span class="card-title">Choose your style</span>
						<div class="row">
							<div class="col m6">
								<label for="ca_background">Background</label>
								<input type='text' id="ca_background" v-model="appearance.background" />
							</div>
							<div class="col m6">
								<label for="ca_buttom_bg" >Button</label>
								<input type='text' id="ca_buttom_bg" v-model="appearance.button_background" />
							</div>
						</div>

						<div class="row">
							<div class="col m6">
								<label for="ca_text_color">Text Color</label>
								<input type='text' id="ca_text_color" v-model="appearance.text_color" />
							</div>
							<div class="col m6">
								<label for="ca_button_text_color" >Button Text Color</label>
								<input type='text' id="ca_button_text_color" v-model="appearance.button_text_color"/>
							</div>
						</div>
					</div>

			</div>
		</div>
	</div>
	<div id="tab-3a" class="tab-contenta"  style="display: none;">
		Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
	</div>
	</div>
	</div>