		<div class="ca_test_block">
					<!-- <div id="ca_protoApp"> -->
		  <div class="drag">
            <draggable class="dragArea" :list="list1" :options="{group:'people'}" @change="log">
                <div v-for="(element, index) in list1"  >
                    <div class="ca_nav_item_panel" v-bind:style="{ background: element.style.main.background}">
                          <a href="#" v-on:click="showPanel">
    						<span class = "fa" v-bind:class="element.icon"  v-bind:style="{ color: element.style.icon.color}"></span>
    					</a>
					</div>
                </div>
             </draggable>

              <div class="mca_mobile_button_panels">
<div class="row content_panel tab-content " id="tab-1" >	
    <!-- <textarea type="text" name="fa_field_icon_x" id="fa_field_icon-x" v-model="current_item.name" class="fw-step-title"> </textarea> -->

	
    <div class="row">
    	<div class="fa-field-metabox icon-wrapper col m6">
			<div class="fa-field-current-icon">
				<div class="icon">
					<i class="fa" v-bind:class="current_item.icon"></i>
				</div> 
				<div class="delete ">
					<a href="#" v-on:click="clearIcon(current_item_index)" class="button-secondary" title="Clear Icon">Clear Icon</a>
				</div>
			</div> 

			<input type="hidden" name="fa_field_icon" id="fa_field_icon" v-model="current_item.icon" class="fw-step-title"> 
			<!-- <button class="button-primary add-fa-icon">Set Icon</button> -->
			<button class="waves-effect waves-blue button-primary modal-trigger" href="#modal1">Set Icon</button>

			<small><a href="#" class="ca_remove_item"  v-on:click="removeCurrentItem(current_item_index)" ><i class="fa fa-remove"></i> Remove Item </a></small>


		</div>
    </div>
    <div class="row">
    	<div class="input form-field">
			<label for="fw-headline-undefined" class="active">
				<b>Button Name</b>
				<i aria-hidden="true" title="Set the button name" class="fa fa-info-circle"></i>
			</label>
			<!-- <input type="text" value="" class="ca_link_text_name" v-model="element.name"> -->
			<input type="text" value="" class="browser-default ca_link_text_name" v-model="current_item.name">
		</div>
    </div>

    <div class="row">
    	<div class="input form-field">
			<label for="fw-headline-undefined" class="active">
				<b>Link Text</b>
				<i aria-hidden="true" title="Set Link Text" class="fa fa-info-circle"></i>
			</label>
			<input type="text" value="http://rocket.com" class="browser-default ca_link_text_field" v-model="current_item.link_text">
		</div>
	</div>
    <div class="row">
		<div class="input form-field ca_link_path_wrap">
			<label for="fw-copy-text-undefined" class="active">
				<b>Link URL</b>
				<i aria-hidden="true" title="Link URL" class="fa fa-info-circle"></i>
			</label>
			<input type="text" value="#" class="browser-default ca_link_path_field" v-model="current_item.link_path">
		</div>
	</div>


</div>
<div class="row colorizer_panel tab-content"  id="tab-2">
	<div class="ca_accordion_panel_wrap">

	<div class="col m12">
		<div class="ca_accordion_panel_title">
			Text Orientation
		</div>
		<div class="ca_accordion_panel_content">
			<label for="fw-set-width" class="active"><b>Text Position</b></label>
			<select v-model="current_item.text_position" class="browser-default">
  				<!-- inline object literal -->
  				<option value='right'>Right</option>
  				<option value='bottom'>Bottom</option>
			</select>

<!-- 
			<label for="fw-set-width"><b>Line Height</b></label>
			<input type="text" value="#" class="ca_line_height" v-model="current_item.line_height"> -->


		</div>
	</div>
	<div class="col m12">
		<div class="ca_accordion_panel_title">
			Border
		</div>
		<div class="ca_accordion_panel_content">
			<div class="row">				
				<label for="fw-copy-text-undefined" class="active">
					<b>Border Width</b>
					<i aria-hidden="true" title="Link URL" class="fa fa-info-circle"></i>
				</label>
				<input type="range" v-model="list1[current_item_index].style.border.width"  min="0" max="5" step="1">
			</div>
			<div class="row">
				<label for="fw-set-border-style" class="active"><b>Border Style</b></label>
				<select v-model="list1[current_item_index].style.border.style" class="browser-default">
  					<!-- inline object literal -->
  					 <option value = "none">none</option>
  					 <option value = "hidden">hidden</option>
  					 <option value = "dotted">dotted</option>
  					 <option value = "dashed">dashed</option>
  					 <option value = "solid">solid</option>
  					 <option value = "double">double</option>
  					 <option value = "groove">groove</option>
  					 <option value = "ridge">ridge</option>
  					 <option value = "inset">inset</option>
  					 <option value = "outset">outset</option>
				</select>			
			</div>
			<div class="row">
				<div class="col m12 ca_colorizer_wrap">
				<p><b>Border Color</b></p>
				<div class="ca_field_wrap input-field">
					<input id="ca_button_border" type="text"  class="jscolor ca_color-field ca_button_border"  v-model="list1[current_item_index].style.border.color">							
				</div>
				</div>
			</div>
			<div class="row">
				<div class="input form-field ca_link_path_wrap">
					<label for="fw-copy-text-undefined" class="active">
						<b>Border Radius</b>
					</label>
					<!-- <input type="text" value="#" class="ca_border_radius" v-model="list1[current_item_index].style.border.radius"> -->
					<input type="range"  class="ca_border_radius" v-model="list1[current_item_index].style.border.radius" min="0" max="200" step="1">
				</div>
			</div>
		</div>
	</div>

	<div class="col m12">
		<div class="ca_accordion_panel_title">
			Colors
		</div>

	<!-- <input id="ca-main-bg-color" type="text"  class=""  v-model="current_item.style.main"> -->
		<div class="ca_accordion_panel_content">
 			<div class="col m12 ca_colorizer_wrap">
				<p><b>Background</b></p>
				<div class="ca_field_wrap input-field">
					<input id="ca-main-bg-color" type="text"  class="jscolor ca_color-field ca_button_main_bg"  v-model="list1[current_item_index].style.main.background">							
				</div>
			</div>
			<div class="col m12 ca_colorizer_wrap">
				<p><b>Icon</b></p>
				<div class="ca_field_wrap input-field">
					<input id="ca-icon-fg-color" type="text" class="jscolor ca_color-field ca_button_icon_fg"  v-model="list1[current_item_index].style.icon.text">
				</div>
			</div>
			<div class="col m12 ca_colorizer_wrap">
				<p><b>Text</b></p>
				<div class="ca_field_wrap input-field">
					<input id="ca-text-fg-color" type="text" class="jscolor ca_color-field ca_button_icon_text_fg"  v-model="list1[current_item_index].style.text.color">
				</div>
			</div> 
		</div> 
	</div>

	<div class="col m12">
		<div class="ca_accordion_panel_title">
			Dimensions
		</div>
		<div class="ca_accordion_panel_content">
			<div class="input form-field col m12 m12">
				<label for="fw-set-width" class="active"><b>Set Width (%)</b> <i aria-hidden="true" title="Leave Blank to set width to auto" class="fa fa-info-circle"></i></label>
				<!-- <input type="text" value="" id = "fw-set-width" class="ca_link_width" v-model="list1[current_item_index].width"> -->
				<input type="range" value="" id = "fw-set-width" class="ca_link_width" v-model="list1[current_item_index].width" min="10" max="100" step="1">
			</div>
			<div class="input form-field col m12 s12">
				<label for="fw-set-height" class="active"><b>Set Height (px)</b> <i aria-hidden="true" title="Leave Blank to set height to auto" class="fa fa-info-circle"></i></label>
				<!-- <input type="text" value="" id = "fw-set-height"  class="ca_link_width" v-model="list1[current_item_index].height"> -->
				<input type="range" value="" id = "fw-set-height"  class="ca_link_width" v-model="list1[current_item_index].height" min="5" max="600" step="1">
			</div>

	<!-- 		<div class="col m12">
				<label for="fw-set-height" class="active"><b>Set Margin (px)</b> <i aria-hidden="true" title="Leave Blank to set height to auto" class="fa fa-info-circle"></i></label>
				<div class="row">
					<div class="col m3"><input type="number" placeholder="top"></div>
					<div class="col m3"><input type="number" placeholder="right"></div>
					<div class="col m3"><input type="number" placeholder="bottom"></div>
					<div class="col m3"><input type="number" placeholder="left"></div>
				</div>
			</div>

			<div class="col m12">
				<label for="fw-set-height" class="active"><b>Set Padding (px)</b> <i aria-hidden="true" title="Leave Blank to set height to auto" class="fa fa-info-circle"></i></label>
				<div class="row">
					<div class="col m3"><input type="number" placeholder="top"></div>
					<div class="col m3"><input type="number" placeholder="right"></div>
					<div class="col m3"><input type="number" placeholder="bottom"></div>
					<div class="col m3"><input type="number" placeholder="left"></div>
				</div>
			</div> -->
				
		</div>
	</div>

	</div>
</div>

<div class="row advance_panel tab-content"  id="tab-3">
	<div class="row">
		<div class="input form-field col m12 m12">
		<label for="fw-set-css-id" class="active"><b>CSS ID</b> <i aria-hidden="true" title="ID is used in Google Analytics" class="fa fa-info-circle"></i></label>

		<input type="text" value="" id = "fw-set-css-id" class="ca_link_width" v-model="list1[current_item_index].style.id">
	</div>
	<div class="input form-field col m12 s12">
		<label for="fw-set-css-class" class="active"><b>CSS Class</b> </label>
		<input type="text" value="" id = "fw-set-css-class"  class="ca_link_width" v-model="list1[current_item_index].style.class">
	</div>
	</div>
</div>

							<!--TEMPLATE ISSUE 1 This would be more awesome in a template-->
<div v-for="(element, index) in list1" class="mca_mobile_button_panel" style="display: none;">
<div class="fw-step">
	<div class="form-wrap">
		<div class="row content_panel tab-content current " id="tab-1" >
			<div class=""><p style="padding: 10px ;"><b>Settings</b></p>
			<div class="fw-step-controls">
						<i class="fa fa-remove fw-remove-step remove_btn" title="Remove Item" aria-hidden="true"></i>
					</div>
			<div class="col m8 icon-wrapper">
				<div class="fa-field-metabox">
					<div class="fa-field-current-icon">
						<div class="icon">
							<i class="fa" v-bind:class="element.icon"></i>
						</div> 

						<div class="delete ">×</div>
					</div> 

					<input type="hidden" name="fa_field_icon" id="fa_field_icon" v-model="element.icon" class="fw-step-title"> 
					<button class="button-primary add-fa-icon">Set Icon</button>

					</div>
				</div>

			<div class="col m12 ">

				<div class="input form-field">
					<label for="fw-headline-undefined" class="active">
						<b>Button Name</b>
						<i aria-hidden="true" title="Set the button name" class="fa fa-info-circle"></i>
					</label>
					<!-- <input type="text" value="" class="ca_link_text_name" v-model="element.name"> -->
					<input type="text" value="" class="ca_link_text_name" v-model="current_item.name" placeholder="Set the button name">
				</div>

				<div class="input form-field">
					<label for="fw-headline-undefined" class="active">
						<b>Link Text</b>
						<i aria-hidden="true" title="Set Link Text" class="fa fa-info-circle"></i>
					</label>
					<input type="text" value="http://rocket.com" class="ca_link_text_field" v-model="element.link_text" placeholder="Set the Link Text">
				</div>

				<div class="input form-field ca_link_path_wrap" v-bind:class="element.type">
					<label for="fw-copy-text-undefined" class="active">
						<b>Link URL</b>
						<i aria-hidden="true" title="Link URL" class="fa fa-info-circle"></i>
					</label>
					<input type="text" value="#" class="ca_link_path_field" v-model="element.link_path" placeholder="Set Link path">
				</div>

				<div class="row">
				<div class="col m12">					
					<p><b>Dimensions</b></p>
				</div>
				<div class="input form-field col m6 s6">
					<label for="fw-set-width" class="active"><b>Set Width (%)</b> <i aria-hidden="true" title="Leave Blank to set width to auto" class="fa fa-info-circle"></i></label>
					<input type="text" value="" id = "fw-set-width" class="ca_link_width" v-model="element.width">
				</div>
				<div class="input form-field col m6 s6">
					<label for="fw-set-height" class="active"><b>Set Height (px)</b> <i aria-hidden="true" title="Leave Blank to set height to auto" class="fa fa-info-circle"></i></label>
					<input type="text" value="" id = "fw-set-height"  class="ca_link_width" v-model="element.height">
				</div>

			
				</div>

	</div>
</div>
</div>

<div class="row colorizer_panel tab-content"  id="tab-2">
	

</div>

<div class="fw-clearfix"></div>
<div class="form-wrap-style">
<div class="row"></div>
</div>
</div>
</div>
</div>
<!--This would be more awesome if it would be separated using templates-->
                	
         </div>
         </div>
<!-- 	</div>
 -->
</div>