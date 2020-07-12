<?php
add_action('wp_head', 'mobile_cta_get_items_style'); 
add_action('wp_footer', 'mobile_cta_render_structure'); 

class Mobile_CTA_Frontend_Render{
	private static $instance;
	private static $cta_collections;
	private static $cta_sections;
    private function __construct() {
    	$current_post_ID =  get_the_ID();
    	self::$cta_collections = CA_Mobile_Element::get_collection();
    	self::$cta_sections = array();

    	foreach(self::$cta_collections as $item){
			// echo count($item);
			$display_pages = json_decode($item->display_pages);
			// print_r($display_pages );
			if(empty($item->display_pages)){
				array_push(self::$cta_sections,array(
					"ID" => $item->id,
					"content"=>json_decode($item->content)
				));
			}else if($display_pages->display_on == "all"){
				array_push(self::$cta_sections,array(
					"ID" => $item->id,
					"content"=>json_decode($item->content)
				));
			}else if($display_pages->display_on == "except-on"){
				$display_pages->pages = str_replace('\"',"",$display_pages->pages);
				if(!in_array($current_post_ID,json_decode($display_pages->pages))){
					array_push(self::$cta_sections,array(
						"ID" => $item->id,
						"content"=>json_decode($item->content)
					));
				}
			}else if($display_pages->display_on == "only-on"){
				$display_pages->pages = str_replace('\"',"",$display_pages->pages);
				if(in_array($current_post_ID,json_decode($display_pages->pages))){
					array_push(self::$cta_sections,array(
						"ID" => $item->id,
						"content"=>json_decode($item->content)
					));
				}
			}
	
		}

    }
    public static function get_instance() {
        {
            if (! self::$instance)
                self::$instance = new Mobile_CTA_Frontend_Render();
            return self::$instance;
        }
    }

    public function getItems(){
    	return self::$cta_sections;
    }

}

function mobile_cta_get_items_style(){
	foreach(Mobile_CTA_Frontend_Render::get_instance()->getItems() as $item){
		echo "<style id='custom_element_style_".$item['ID']."'>";
		foreach($item['content']->loaded_data as  $index => $loaded){
			mobile_cta_render_style($loaded,$item['ID'],($index+1));
		}
		echo "</style>";
	}
}


function mobile_cta_render_style($el,$parent_index,$index){	
	$border_string = $el->style->border->size."px ".$el->style->border->style." ".$el->style->border->color.";";

	$width = ($el->style->main->adjust_width==true) ? $el->style->main->width->size.$el->style->main->width->unit : "auto";
	$height = ($el->style->main->adjust_height===true) ? $el->style->main->height->size.$el->style->main->height->unit : "auto";
	echo "/** Marking Adjust Width = ".$el->style->main->adjust_width."**/";
	$style = array(
		array(
		"el" => ".serp-button-static.serp-button-collections.serp-button-collections_".$parent_index.">ul>div>li:nth-child(".$index.")",
		"styles" => array(
			'basic' => array(
				array(
					"property"=>"background-color",
					"value"=>$el->style->main->background,
					"unit"=>""
				),
				array(
					"property"=>"width",
					"value"=>$width,
					"unit"=>"",
					'condition' => $el->style->main->adjust_width,
				),
				array(
					"property"=>"height",
					"value"=>$height,
					"unit"=>"",
					'condition' => $el->style->main->adjust_height,
				)
			),
			'border'=>array(
				array(
					"property"=>"border-top",
					"value"=> ($el->style->sides->top) ? $border_string : "none",
					'condition' => $el->style->sides->top,
				),
				array(
					"property"=>"border-right",
					"value"=> ($el->style->sides->right) ? $border_string : "none",
					'condition' => $el->style->sides->right,
				),
				array(
					"property"=>"border-bottom",
					"value"=> ($el->style->sides->bottom) ? $border_string : "none",
					'condition' => $el->style->sides->bottom,
				),
				array(
					"property"=>"border-left",
					"value"=> ($el->style->sides->left) ? $border_string : "none",
					'condition' => $el->style->sides->left,
				)
			),
			'radius'=>array(
				// 'condition' => $el->style->border->enable,
				array(
					"property"=>"border-top-left-radius",
					"value"=> ($el->style->border_radius->top_left)? ($el->style->border_radius->top_left): 0,
					"unit"=>"px"
					// 'condition' => $el->style->sides->top,
				),
				array(
					"property"=>"border-top-right-radius",
					"value"=> ($el->style->border_radius->top_right)? ($el->style->border_radius->top_right): 0,
					"unit"=>"px"
					// 'condition' => $el->style->sides->top,
				),
				array(
					"property"=>"border-bottom-left",
					"value"=> ($el->style->border_radius->bottom_left)? ($el->style->border_radius->bottom_left): 0,
					"unit"=>"px"
					// 'condition' => $el->style->sides->top,
				),
				array(
					"property"=>"border-bottom-right",
					"value"=> ($el->style->border_radius->bottom_right)? ($el->style->border_radius->bottom_right): 0,
					"unit"=>"px"
					// 'condition' => $el->style->sides->top,
				)
			),
			'margin' =>array(
				array(
					"property"=>"margin-top",
					"value"=> $el->style->main->margin->top,
					"unit"=>"px"
				),
				array(
					"property"=>"margin-left",
					"value"=> $el->style->main->margin->left,
					"unit"=>"px"
				),
				array(
					"property"=>"margin-bottom",
					"value"=> $el->style->main->margin->bottom,
					"unit"=>"px"
				),
				array(
					"property"=>"margin-right",
					"value"=> $el->style->main->margin->right,
					"unit"=>"px"
				),
			)
		),
		"condition"=>array(
			"border"=> $el->style->border->enable,
			"radius"=> $el->style->border_radius->enable
		)
		),
		array(
		"el" => ".serp-button-static.serp-button-collections.serp-button-collections_".$parent_index.">ul>div>li:nth-child(".$index.") .ca_icon",
		"styles" => array(
			'basic' => array(
				array(
					"property"=>"color",
					"value"=>$el->style->icon->color,
					"unit"=>""
				),
				array(
					"property"=>"font-size",
					"value"=>$el->style->icon->size,
					"unit"=>$el->style->icon->unit
				)
			)
		),
		"condition"=>array(
		)
		),
		array(
		"el" => ".serp-button-static.serp-button-collections.serp-button-collections_".$parent_index.">ul>div>li:nth-child(".$index.") .ca_btn_text",
		"styles" => array(
			'basic' => array(
				array(
					"property"=>"color",
					"value"=>$el->style->text->color,
					"unit"=>""
				),
				array(
					"property"=>"font-size",
					"value"=>$el->style->text->size,
					"unit"=>$el->style->text->unit
				)
			)
		),
		"condition"=>array(
		)
		)
	);

	foreach($style as $s){		
		$element = $s["el"];
		$item_style = $s["styles"];
		$condition = $s["condition"];
		mobile_render_style_rule($s["el"],mobile_cta_render_item_style($item_style,$condition));
	}
}

function mobile_cta_set_style($property,$value,$unit='',$condition=true){
	if($condition){
		return $property.":". $value.$unit.";";
	}
}

function mobile_cta_render_setting($item,$condition=true){
	$output = " ";
	foreach($item as  $i){
		$output .= mobile_cta_set_style($i['property'],$i['value'],$i['unit']);
	}
	return $output;
}

function mobile_cta_render_item_style($item,$condition){
	$output = "";
	foreach($item as $key => $i){		
		if((!array_key_exists($key,$condition)) && (empty(json_decode($condition[$key])) ))	{
			$output .= mobile_cta_render_setting($i,$i['condition']);
		}
	}
	return $output;
}

function mobile_render_style_rule($el,$data){
	echo $el."{";
	echo $data;
	echo "}";
}
function mobile_cta_render_structure(){
	echo "<div class ='serp-mobile-elements-section'>";
	foreach(Mobile_CTA_Frontend_Render::get_instance()->getItems() as $item){
		$static_class = "serp-button-static serp-button-collections_".$item["ID"];
		$loaded_data = $item['content']->loaded_data;
		require("frontend/template/mobile-elements.tmpl.php");	
	}
	echo '</div>';
}

