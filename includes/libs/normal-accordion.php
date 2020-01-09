  <div id="date-format-modal" class="modal">
    <div class="modal-content">
      <?php require_once("date-format-content.php");?>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-dark-blue btn-flat blue darken-1 white-text">Continue</a>
    </div>
  </div>


<div id="accordion-1">

  <h3>Container Options</h3>
  <div class="accordion-content" style="height:auto!important;"> 
      <div class="row">
        <div class="col m12">
          <label for="container_width">Container Width</label> 
          <p class="range-field">
            <input type="range" name = "text_size"  class="ca_range_slider"  id="container_width" min="0" max="100"  value="100"  />
			<span class="vuevalue" style="display:none">{{container_style.main.width}}</span>
          </p>
        </div>
      </div>
      <div class="row">
    <div class="col m6">
      <label for="top_position">Vertical Position</label> 
          <p class="range-field">
            <input type="range" name = "text_size"  class="ca_range_slider"  id="top_position" min="0" max="100"  value="0" />
			<span class="vuevalue" style="display:none">{{container_style.main.bottom}}</span>
          </p>
    </div>
    <div class="col m6">
      <label for="left_postition">Left & Right Position</label>
          <p class="range-field">
            <input type="range" name = "text_size"  class="ca_range_slider"  id="left_postition" min="-50" max="50" step="1" value="0" />
			<span class="vuevalue" style="display:none">{{container_style.main.left}}</span>
          </p>
    </div>

    </div>
  </div>
  
  <h3>Basics</h3>
  <div class="accordion-content" style="height:auto!important;">
      <div class="row">
        <div class="col m12">
          <input type="text" class="ca-icon-picker" id = "myiconpicker" style="display: block!important" v-model="current_item.icon">
        </div>
      </div>
      <div class="row">
      <div class="col m12">
        <label for="">Text</label>
        <input type="text" class="serp-textfield" name="button_text" v-model="current_item.link_text">
      </div>
      <div class="col m6">
        <label for="">URL</label> 
        <input type="text" class="serp-textfield" name="button_class_url" v-model="current_item.link_path">
      </div>
      <div class="col m6">
        <label for="">CSS Class Name</label>
        <input type="text" class="serp-textfield" name="button_class_name" v-model="current_item.class">
      </div>
      <div class="col m6">   
        <div class="row">
          <div class="col m4">            
            <label for="display_button_icon">
              <input type="checkbox" name="display_button_icon" id="display_button_icon"  v-model="current_item.display_icon">
              <span>Display Icon</span>
            </label>     
          </div>
   
        </div>
      </div>
  </div>


  
  <div class="row">
    <div class="col m6">
      <div class="ca-button-alignment">          
           <label for="">Position</label>  
          <select name="button_position"   v-model="button_position">
             <option v-for="option in [
      { text: 'Left', value: 'left' },
      { text: 'Center', value: 'center' },
      { text: 'Right', value: 'right' }
    ]" v-bind:value="option.value">{{ option.text }}</option>
           </select>
        </div>   
    </div>

     <div class="col m6">    

            <div class="ca-button-type" >          
           <label for="">Type</label>  
          <select name="button_type"   v-model="current_item.type">
             <option v-for="option in [
      { text: '<i class=\'fa fa-cog\'></i>  Custom button', value: 'custom' },
      { text: '<i class=\'fa fa-font\'></i>  Static Text', value: 'static_text' },
      { text: '<i class=\'fa fa-hourglass\'></i>  Count Down Timer', value: 'count_down' },
      { text: '<i class=\'fa fa-bars\'></i> to Show Secondary Panel', value: 'toggle' },
      { text: '<i class=\'fa fa-comment\'></i>  Messenger button', value: 'fb_messenger' },
      { text: '<i class=\'fa fa-facebook\'></i>  Facebook Share button', value: 'fb_share' },
      { text: '<i class=\'fa fa-twitter\'></i>  Twitter Share button', value: 'twitter_share' },
      { text: '<i class=\'fa fa-google-plus\'></i>  Google Share button', value: 'google_share' },
      { text: '<i class=\'fa fa-pinterest\'></i>  Pinterest Share button', value: 'pinterest_share' },
      { text: '<i class=\'fa fa-linkedin\'></i>  LinkedIn Share button', value: 'linkedin_share' },
      { text: '<i class=\'fa fa-digg\'></i>  Digg Share button', value: 'digg_share' },
      { text: '<i class=\'fa fa-tumblr\'></i>  Tumblr Share button', value: 'tumblr_share' },
      { text: '<i class=\'fa fa-reddit\'></i>  Reddit Share button', value: 'reddit_share' },
      { text: '<i class=\'fa fa-yahoo\'></i>  Yahoo Share button', value: 'yahoo_share' },
    ]" v-bind:value="option.value" v-html="option.text" >{{ option.text }}</option>
           </select>
        </div> 
    </div>

    <div class="col m6">      
      <div class="ca-button-alignment">          
           <label for="">Content Position</label>  
          <select name="button_content_position"   v-model="button_content_position">
             <option v-for="option in [
      { text: 'Left', value: 'left' },
      { text: 'Center', value: 'center' },
      { text: 'Right', value: 'right' }
    ]" v-bind:value="option.value">{{ option.text }}</option>
           </select>
        </div> 
    </div>
  </div>
  </div>

    <h3 v-show="current_item.type=='count_down'">Date Properties</h3>
    <div class="accordion-content" style="height:auto!important;" v-show="current_item.type=='count_down'">
          <div id="test-slider"></div>
      <div class="row">         
        <div class="col m6">
          <label for="margin_top_button">Select Date </label>
          <p class="range-field">
            <input type="text"  name = "date" class="datepicker" value = "getDate" v-model="current_item.expiration_date"/>
          </p>
        </div>          
        <div class="col m6">
          <label for="margin_left_button">Timer Format <a href="#" class = "modal-trigger"  data-target="date-format-modal" title="Click for more info"><i class="fa fa-question-circle"></i></a></label>
          <p class="range-field">
            <input type="text"  name = "countdown_format" v-model="current_item.date_format"/>
          </p>
        </div>        
      </div>
    </div>

    <h3>Basic Stylings</h3>
  <div class="accordion-content" style="height:auto!important;">
    
    <div class="row">
<!--       <div class="col m8">
        <label for="">Font Family</label>

        <select name="font_family">
            <option>Arial, Helvetica, sans-serif</option>
            <option>Verdana, Geneva, sans-serif</option>
            <option>Georgia, "Times New Roman", Times, serif</option>
            <option>"Courier New", Courier, monospace</option>
            <option>Tahoma, Geneva, sans-serif</option>
            <option>"Trebuchet MS", Arial, Helvetica, sans-serif</option>
            <option>"Arial Black", Gadget, sans-serif</option>
            <option>"Times New Roman", Times, serif</option>
            <option>"Palatino Linotype", "Book Antiqua", Palatino, serif</option>
            <option>"Lucida Sans Unicode", "Lucida Grande", sans-serif</option>
            <option>"MS Serif", "New York", serif</option>
            <option>"Lucida Console", Monaco, monospace</option>
        </select><br>
        <label for="">Button Style</label>
         <select name="button_style">
           <option value="" disabled selected>Choose your option</option>
           <option value="1">Option 1</option>
           <option value="2">Option 2</option>
           <option value="3">Option 3</option>
         </select>
         <label for="">Button Style</label>    
      </div> -->

       <div class="col m8">
        <div class="row">         
        <div class="col m6">
          <label for="font_size" class="cicon-size need-it-b-existed-code"></label>
		  <span class='clabel'>Icon Size</span><input type="number" v-model="current_item.style.normal.icon.font_size" class="dynaval"/>
          <p class="range-field">
            <input type="range" name = "icon_size"  class="ca_range_slider"  id="font_size" min="0" max="60" value="12" v-model="current_item.style.normal.icon.font_size"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.icon.font_size}}</span>
		  </p>
        </div>
        <div class="col m6">
          <label for="font_size" class="ctext-size need-it-b-existed-code"></label>
		  <span class='clabel'>Text Size</span><input type="number" v-model="current_item.style.normal.text.font_size" class="dynaval"/>
          <p class="range-field">
            <input type="range" name = "text_size"  class="ca_range_slider"  id="font_size" min="0" max="60" value="12" v-model="current_item.style.normal.text.font_size"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.text.font_size}}</span>
		  </p>
        </div>
        
       </div>
        <div class="row">
          <div class="col m6">
          <label for="button_height" class="need-it-b-existed-code"> </label>
		  <span class='clabel'>Height</span><input type="number" v-model="current_item.style.normal.height" class="dynaval" />
          <p class="range-field">
            <input type="range" name = "button_height"  class="ca_range_slider"  id="button_height" min="0" max="100" value="65" v-model="current_item.style.normal.height"/>
            <span class="vuevalue" style="display:none">{{current_item.style.normal.height}}</span>
		  </p>
          <p>

          <div class="row">
            <p class="pad-l-10" style="margin: 0px 0px 10px;color: #c2c0c2;font-size: 13px;">Text Decoration</p>
            <div class="col m6">
              <label for="button_text_is_bold">
                <input type="checkbox" name="button_text_is_bold" id="button_text_is_bold"   v-model="current_item.style.normal.text.isBold">
                
                <span>Bold</span>
              </label>
            </div>
            <div class="col m6">
              <label for="button_text_is_italic">
                <input type="checkbox" name="button_text_is_italic" id="button_text_is_italic"   v-model="current_item.style.normal.text.isItalic">
                <span>Italic</span>
              </label>
            </div>
          </div>        
        </p>
        </div>
        <div class="col m6">
          <label for="button_size" class="need-it-b-existed-code"> </label>
		  <span class='clabel'>Width</span><input type="number" v-model="current_item.style.normal.width" class="dynaval"/>
          <p class="range-field">
            <input type="range" name = "button_size"  class="ca_range_slider"  id="button_size" min="0" max="100" value="50" v-model="current_item.style.normal.width"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.width}}</span>
		  </p>

         

        </div>
        </div>
       </div>
     <div class="input-field  col m4">
     

        <div class="color-picker">          
          <label for="">Background 
          </label>           
            <input type="text" class="minicolors" name="btn_normal_background_color" data-opacity="1" v-model="current_item.style.normal.main.background">

        </div>
        <div class="color-picker">          
          <label for="">Color
          </label>           
            <input type="text" class="minicolors" name="btn_normal_text_color" data-opacity="1" v-model="current_item.style.normal.text.color">
        </div>
        <div class="color-picker">          
          <label for="">Icon Color
          </label>           
            <input type="text" class="minicolors" name="btn_normal_icon_color" data-opacity="1" v-model="current_item.style.normal.icon.color">
        </div>
        <div class="color-picker">          
          <label for="">Border Color
          </label>           
            <input type="text" class="minicolors" name="btn_normal_border_color" data-opacity="1" v-model="current_item.style.normal.border.color">
        </div>
      </div>
      
    </div>
    <div class="row">
        <!--   <div class="input-field  col m8">
         <select name="color_style">
           <option value="" disabled selected>Choose your option</option>
           <option value="1">Option 1</option>
           <option value="2">Option 2</option>
           <option value="3">Option 3</option>
         </select>
         <label for="">Color Style</label> 
        
      </div> -->
      <div class="col m4">        
        
      </div>
  
    </div>
    
  </div>
  <h3>Margin</h3>
    <div class="accordion-content" style="height:auto!important;">
          <div id="test-slider"></div>
      <div class="row">         
        <div class="col m3">
          <label for="margin_top_button" class="need-it-b-existed-code"> </label>
		  <span class='clabel'>Top </span><input type="number" v-model="current_item.style.normal.margin.top" class="dynaval"/>
          <p class="range-field">
            <input type="range"  name = "margin_top_button" class="ca_range_slider"  id="margin_top_button" min="0" max="100" value="10" v-model="current_item.style.normal.margin.top"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.margin.top}}</span>
		  </p>
        </div>          
        <div class="col m3">
          <label for="margin_left_button" class="need-it-b-existed-code"> </label>
		  <span class='clabel'>Left </span><input type="number" v-model="current_item.style.normal.margin.left" class="dynaval"/>
          <p class="range-field">
            <input type="range"  name = "margin_left_button"  class="ca_range_slider" id="margin_left_button" min="0" max="100"  value="10" v-model="current_item.style.normal.margin.left"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.margin.left}}</span>
		  </p>
        </div> 
        <div class="col m3">
          <label for="margin_bottom_button" class="need-it-b-existed-code"> </label>
		  <span class='clabel'>Bottom </span><input type="number" v-model="current_item.style.normal.margin.bottom" class="dynaval"/>
          <p class="range-field">
            <input type="range"  name = "margin_bottom_button" class="ca_range_slider"  id="margin_bottom_button" min="0" max="100" value="10" v-model="current_item.style.normal.margin.bottom"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.margin.bottom}}</span>
		  </p>
        </div>          
        <div class="col m3">
          <label for="margin_right_button" class="need-it-b-existed-code"> </label>
		  <span class='clabel'>Right </span><input type="number" v-model="current_item.style.normal.margin.right" class="dynaval"/>
          <p class="range-field">
            <input type="range"  name = "margin_right_button"  class="ca_range_slider" id="margin_right_button" min="0" max="100"  value="10" v-model="current_item.style.normal.margin.right"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.margin.right}}</span>
		  </p>
        </div>        
      </div>
    </div>
  <h3>Padding</h3>
    <div class="accordion-content" style="height:auto!important;">
          <div id="test-slider"></div>
      <div class="row">         
        <div class="col m6">
          <label for="padding_left_right" class="need-it-b-existed-code"> </label>
		  <span class='clabel'>Left/Right</span><input type="number" v-model="current_item.style.normal.padding.left_right" class="dynaval"/>
          <p class="range-field">
            <input type="range"  name = "padding_left_right" class="ca_range_slider"  id="padding_left_right" min="0" max="100" value="10" v-model="current_item.style.normal.padding.left_right"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.padding.left_right}}</span>
		  </p>
        </div>          
        <div class="col m6">
          <label for="padding_top_button" class="need-it-b-existed-code"> </label>
		  <span class='clabel'>Top/Button</span><input type="number" v-model="current_item.style.normal.padding.top_bottom" class="dynaval"/>
          <p class="range-field">
            <input type="range"  name = "padding_top_button"  class="ca_range_slider" id="padding_top_button" min="0" max="100"  value="10" v-model="current_item.style.normal.padding.top_bottom"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.padding.top_bottom}}</span>
		  </p>
        </div>         
      </div>
    </div>
  <h3>Border &amp; Sizing</h3>
     <div class="accordion-content" style="height:auto!important;">
      <div class="row">
            <div class="col m12">
      <label for="button_size" class="need-it-b-existed-code"></label>
	  <span class='clabel'>Button Size</span><input type="number" v-model="current_item.style.normal.main.scale" class="dynaval"/>
          <p class="range-field">
            <input type="range" name = "button_scale"  class="ca_range_slider"  id="button_scale" min="50" max="150" step = "1" value="1"  v-model="current_item.style.normal.main.scale"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.main.scale}}</span>
		  </p>
    </div>
      </div>
       <p>Border Radius</p>

       <!--
         top_left_border_radius_enabled:true,
                        top_right_border_radius_enabled:true,
                        bottom_left_border_radius_enabled:true,
                        bottom_right_border_radius_enabled:true,
       -->
       <div class="row">         
          <div class="col m3">         
             <label for="border_top_left">
                <input type="checkbox" name="border_top_left" id="border_top_left" v-model="current_item.style.normal.border.top_left_border_radius_enabled">
                <span>Top Left</span>
             </label>
          </div>
          <div class="col m3">          
            <label for="border_top_right">
              <input type="checkbox" name="border_top_right" id="border_top_right" v-model="current_item.style.normal.border.top_right_border_radius_enabled">
              <span>Top Right</span>
            </label>
          </div>
          <div class="col m3">          
            <label for="border_bottom_left">
              <input type="checkbox" name="border_bottom_left" id="border_bottom_left" v-model="current_item.style.normal.border.bottom_left_border_radius_enabled">
              <span>Bottom Left</span>
            </label>
          </div>
          <div class="col m3">          
            <label for="border_bottom_right">
              <input type="checkbox" name="border_bottom_right" id="border_bottom_right" v-model="current_item.style.normal.border.bottom_right_border_radius_enabled">
              <span>Bottom Right</span>
            </label>
          </div>
       </div>
       <div class="row">         
        <div class="col m6">
          <label for="border_size" class="need-it-b-existed-code"></label>
		  <span class='clabel'>Border Size</span><input type="number" v-model="current_item.style.normal.border.width" class="dynaval"/>
          <p class="range-field">
            <input type="range" name = "border_size"  class="ca_range_slider"  id="border_size" min="0" max="12" value="1" v-model="current_item.style.normal.border.width" />
			<span class="vuevalue" style="display:none">{{current_item.style.normal.border.width}}</span>
		  </p>
        </div>
        <div class="col m6">
          <label for="border_radius" class="need-it-b-existed-code"></label>
		  <span class='clabel'>Border Radius</span><input type="number" v-model="current_item.style.normal.border.radius" class="dynaval"/>
          <p class="range-field">
            <input type="range" name = "border_radius" class="ca_range_slider" id="border_radius" min="0" max="50" value="37" v-model="current_item.style.normal.border.radius"/>
			<span class="vuevalue" style="display:none">{{current_item.style.normal.border.radius}}</span>
		  </p>
        </div>
        <div class="col m6">
          <label for="h_Text_alignment" class="need-it-b-existed-code"></label>
		  <span class='clabel'>Horizontal Text Alignment</span><input type="number" v-model="current_item.style.normal.main.line_height" class="dynaval"/>
          <p class="range-field">
            <input type="range" name = "h_Text_alignment" class="ca_range_slider" id="h_Text_alignment" min="0" max="100"  value="50" v-model="current_item.style.normal.main.line_height" />
			 <span class="vuevalue" style="display:none">{{current_item.style.normal.main.line_height}}</span>
          </p>
        </div>
       </div>
       
       <div class="row">         
        
       </div>

  </div>
  <h3 v-show='current_item.button_type!="toggle"'>Location</h3>
  <div class="accordion-content" style="height:auto!important;" v-show='current_item.button_type!="toggle"'>
   <div class="row">
            <div class="col m6">
              <label for="button_text_is_secondary">
                <input type="checkbox" name="button_text_is_secondary" id="button_text_is_secondary"   v-model="current_item.atSecondaryPanel">
                <span>Secondary Panel</span>
              </label>
            </div>
          </div> 
  </div>
</div>