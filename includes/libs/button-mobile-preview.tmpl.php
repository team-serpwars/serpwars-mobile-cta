<style id="asdsadasd">
	#spb-information-bar{
		height:auto;
		bottom: 0;
		top: auto;
		padding: 0 10px;
	}




	div#ca-button-container li .fa{
		color: #fff;
	}

	div#ca-button-container li{
		width: 18%;
		text-align: center;
    display: inline-block;
	}

	div#ca-button-container .ca-link-text {
    font-size: 12px;
    text-align: center;
    display: block;
    width: 100%;
    color: #fff;
    }

    .ca-admin-preview div#ca-button-container  li.ca-share-button {
       padding: 0;
    }

    .ca_button_content {
        display: inline-block;
        vertical-align: middle;
    }


</style>
 <div id="spb-information-bar" class = "ca-admin-preview" v-bind:style="{ height:appearance.bar_height+'px',fontSize:appearance.font_size+'px',background: appearance.background ,color:appearance.text_color,opacity:appearance.opacity}" style="padding:0;">
   


     <div id="ca-button-container" v-bind:class="social_button_style"> 
        <div v-if="module_settings.display_message">{{message}}</div>
        <div class="ca_countdown" v-show="module_settings.display_timer"></div>


            <ul>
            	
            <li v-for="(element, index) in list1"  class="ca-share-button" v-bind:style="{ width: element.width+'%'}" style="padding:0">
                    <div class="ca_nav_item_panel" v-bind:style="{ 'border-radius':element.style.border.radius+'px',background: element.style.main.background,height:element.height+'px','padding':element.style.line_height,border:element.style.border.width+'px '+element.style.border.style+' '+element.style.border.color }" style="width:100%;">
                          <a href="#" v-on:click="showPanel">
                            <div class="ca_button_content">                                
                                <span class = "fa" v-bind:class="element.icon"  v-bind:style="{ color: element.style.icon.color}" v-if="element.text_position=='right'"></span>

                                <span class = "fa bottom" v-bind:class="element.icon"  v-bind:style="{ color: element.style.icon.color}" v-else-if="element.text_position=='bottom'"></span>


                                <span class = "ca_btn_text" v-if="social_button_style == 'ca_rounded_rectangle'" v-bind:style="{ color:element.style.text.color} ">{{element.link_text}}</span>
                                <span class = "ca_btn_text" v-else-if="social_button_style == 'ca_oval'" v-bind:style="{ color:element.style.text.color} ">{{element.link_text}}</span>
                            </div>

                        </a>
					</div>
                </li>
            </ul>

            </div>
 </div>