
var SCD = JSON.parse(serwars_conversion_data);

for(var i=0;i<SCD.list1.length;i+=1){
	
	SCD.list1[i].display_icon = JSON.parse(SCD.list1[i].display_icon);
	SCD.list1[i].display_text = JSON.parse(SCD.list1[i].display_text);
	if(SCD.list1[i].atSecondaryPanel){
		SCD.list1[i].atSecondaryPanel = JSON.parse(SCD.list1[i].atSecondaryPanel);
	}
	SCD.list1[i].style.normal.text.isBold = JSON.parse(SCD.list1[i].style.normal.text.isBold);
	SCD.list1[i].style.normal.text.isItalic = JSON.parse(SCD.list1[i].style.normal.text.isItalic);
	
	SCD.list1[i].style.normal.border.bottom_left_border_radius_enabled = JSON.parse(SCD.list1[i].style.normal.border.bottom_left_border_radius_enabled);
	SCD.list1[i].style.normal.border.bottom_right_border_radius_enabled = JSON.parse(SCD.list1[i].style.normal.border.bottom_right_border_radius_enabled);
	SCD.list1[i].style.normal.border.top_left_border_radius_enabled = JSON.parse(SCD.list1[i].style.normal.border.top_left_border_radius_enabled);
	SCD.list1[i].style.normal.border.top_right_border_radius_enabled = JSON.parse(SCD.list1[i].style.normal.border.top_right_border_radius_enabled);

	if(!SCD.list1[i].style.normal.main.scale){
		SCD.list1[i].style.normal.main.scale = '100'
	}
	if(JSON.parse(SCD.list1[i].style.normal.main.scale) < 50 ){
		SCD.list1[i].style.normal.main.scale = '100'		
	}

	if(!SCD.container_style){
		SCD.container_style={
            main:{
                width:100,
                top:100,
                left:0,
                right:0,
            },
        }
	}
	
}

if(SCD){	
	app._data.button_content_position = SCD.button_content_position;
	app._data.button_position = SCD.button_position;
	app._data.current_item = SCD.list1[0];
	app._data.list1 = SCD.list1;
	app._data.container_style = SCD.container_style;
}



	$("#styler").html(app.renderTemplateStyles())