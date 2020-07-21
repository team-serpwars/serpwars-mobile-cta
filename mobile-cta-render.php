<?php
add_action('wp_head', 'mobile_cta_get_items_style'); 
add_action('wp_footer', 'mobile_cta_render_structure'); 

class Mobile_CTA_Frontend_Render{
	private static $instance;
	private static $cta_collections;
	private static $cta_sections;
	private static $current_post_ID;
    private function __construct($id) {
    	
    	$current_post_ID = ($id==-1) ? get_the_ID() : $id;

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
    public static function get_instance($id=-1) {
        {
            if (! self::$instance)
                self::$instance = new Mobile_CTA_Frontend_Render($id);
            return self::$instance;
        }
    }

    public function getItems(){
    	return self::$cta_sections;
    }



}

function mobile_cta_get_items_style(){
		echo "<style id='mobile-cta-ajax-style'>";
		echo "</style>";
	// foreach(Mobile_CTA_Frontend_Render::get_instance()->getItems() as $item){
	// 	echo "<style id='custom_element_style_".$item['ID']."'>";
	// 	foreach($item['content']->loaded_data as  $index => $loaded){
	// 		mobile_cta_render_style($loaded,$item['ID'],($index+1));
	// 	}
	// 	echo "</style>";
	// }
}


function mobile_cta_render_style($el,$parent_index,$index){	
	$output = "";
	$border_string = $el->style->border->size."px ".$el->style->border->style." ".$el->style->border->color.";";

	$width = ($el->style->main->adjust_width==true) ? $el->style->main->width->size.$el->style->main->width->unit : "auto";
	$height = ($el->style->main->adjust_height=="true") ? $el->style->main->height->size.$el->style->main->height->unit : "auto";
	$output .= "/** Marking Adjust Width = ".$el->style->main->adjust_height."**/";
	$style = array(
		array(
		"el" => ".serp-button-static.serp-button-collections.serp-button-collections_".$parent_index.">ul>div>li:nth-child(".$index.")",
		"styles" => array(
			'basic' => array(
				array(
					"property"=>"background-color",
					"value"=>$el->style->main->background,
					"unit"=>"",
					'condition' => true
				),
				array(
					"property"=>"width",
					"value"=>$el->style->main->width->size,
					"unit"=>$el->style->main->width->unit,
					'condition' => true,
				),
				array(
					"property"=>"height",
					"value"=>$el->style->main->height->size,
					"unit"=>$el->style->main->height->unit,
					'condition' => ($el->style->main->adjust_height==true && $el->style->main->layout != "vertical"),
				)
			),
			'border'=>array(
				array(
					"property"=>"border-top",
					"value"=> ($el->style->sides->top) ? $border_string : "none",
					'condition' => ($el->style->border->enable == true && $el->style->sides->top==true),
				),
				array(
					"property"=>"border-right",
					"value"=> ($el->style->sides->right) ? $border_string : "none",
					'condition' => ($el->style->border->enable == true && $el->style->sides->right==true),
				),
				array(
					"property"=>"border-bottom",
					"value"=> ($el->style->sides->bottom) ? $border_string : "none",
					'condition' => ($el->style->border->enable == true && $el->style->sides->bottom==true),
				),
				array(
					"property"=>"border-left",
					"value"=> ($el->style->sides->left) ? $border_string : "none",
					'condition' => ($el->style->border->enable == true && $el->style->sides->left==true),
				)
			),
			'radius'=>array(
				// 'condition' => $el->style->border->enable,
				array(
					"property"=>"border-top-left-radius",
					"value"=>$el->style->border_radius->top_left,
					"unit"=>"px",
					'condition' => ($el->style->border_radius->enable==true),
				),
				array(
					"property"=>"border-top-right-radius",
					"value"=>$el->style->border_radius->top_right,
					"unit"=>"px",
					'condition' => ($el->style->border_radius->enable==true),
				),
				array(
					"property"=>"border-bottom-left-radius",
					"value"=>$el->style->border_radius->bottom_left,
					"unit"=>"px",
					'condition' => ($el->style->border_radius->enable==true),
				),
				array(
					"property"=>"border-bottom-right-radius",
					"value"=>$el->style->border_radius->bottom_right,
					"unit"=>"px",
					'condition' => ($el->style->border_radius->enable==true),
				)
			),
			'margin' =>array(
				array(
					"property"=>"margin-top",
					"value"=> $el->style->main->margin->top,
					"unit"=>"px",
					'condition' =>  $el->style->main->margin->top,
				),
				array(
					"property"=>"margin-left",
					"value"=> $el->style->main->margin->left,
					"unit"=>"px",
					'condition' =>  $el->style->main->margin->left,
				),
				array(
					"property"=>"margin-bottom",
					"value"=> $el->style->main->margin->bottom,
					"unit"=>"px",
					'condition' =>  $el->style->main->margin->bottom,
				),
				array(
					"property"=>"margin-right",
					"value"=> $el->style->main->margin->right,
					"unit"=>"px",
					'condition' =>  $el->style->main->margin->right,
				),
			)
		),
		"condition"=>array(


		)
		),
		array(
		"el" => ".serp-button-static.serp-button-collections.serp-button-collections_".$parent_index.">ul>div>li:nth-child(".$index.") .ca_icon",
		"styles" => array(
			'basic' => array(
				array(
					"property"=>"color",
					"value"=>$el->style->icon->color,
					"unit"=>"",
					"condition"=>true
				),
				array(
					"property"=>"font-size",
					"value"=>$el->style->icon->size,
					"unit"=>$el->style->icon->unit,
					"condition"=>true
				),
				array(
					"property"=>"line-height",
					"value"=>"1.5",
					"unit"=>"em",
					"condition"=>true
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
					"unit"=>"",
					"condition"=> true
				),
				array(
					"property"=>"font-size",
					"value"=>$el->style->text->size,
					"unit"=>$el->style->text->unit,
					"condition"=> true
				)
			)
		),
		"condition"=>array(
		)
		),
		array(
		"el" => ".serp-button-static.serp-button-collections.serp-button-collections_".$parent_index.">ul>div>li:nth-child(".$index.") .ca_btn_sub_text",
		"styles" => array(
			'basic' => array(
				array(
					"property"=>"color",
					"value"=>$el->style->sub_text->color,
					"unit"=>"",
					"condition"=> true
				),
				array(
					"property"=>"font-size",
					"value"=>$el->style->sub_text->size,
					"unit"=>$el->style->sub_text->unit,
					"condition"=> true
				)
			)
		),
		"condition"=>array(
		)
		),
		array(
		"el" => ".serp-button-static.serp-button-collections.serp-button-collections_".$parent_index.">ul>div>li:nth-child(".$index.") .text-wrap",
		"styles" => array(
			'basic' => array(
				array(
					"property"=>"text-align",
					"value"=>$el->style->text->align,
					"unit"=>"",
					"condition"=> true
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
		$output .= mobile_render_style_rule($s["el"],mobile_cta_render_item_style($item_style,$condition));
	}

	return $output;
}

function mobile_cta_set_style($property,$value,$unit=''){
		return $property.":". $value.$unit.";";
}

function mobile_cta_render_setting($item,$condition=true){
	$output = " ";
	foreach($item as  $i){
		if($i["condition"]===true){
			$output .= mobile_cta_set_style($i['property'],$i['value'],$i['unit']);
		}
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

	$output = "";
	$output .= $el."{". $data."}";
	return $output;
}
function mobile_cta_render_structure(){

	echo '<div class="mcta-spinner-wrap">
<i class="fas fa-circle-notch fa-spin" style="font-size:42px"></i></div>';
	echo "<div class ='serp-mobile-elements-section' style='display:none'>";
	foreach(Mobile_CTA_Frontend_Render::get_instance()->getItems() as $item){
		$static_class = "serp-button-static serp-button-collections_".$item["ID"];
		$loaded_data = $item['content']->loaded_data;
		$container = $item['content']->container;
		require("frontend/template/mobile-elements.tmpl.php");	
	}
	echo '</div>';
}


class Mobile_CTA_AJAX_Loaders {
	function __construct(){
		add_action('wp_ajax_nopriv_load_mobile_ctas', array($this,'load_mobile_ctas'));
		add_action('wp_ajax_load_mobile_ctas', array($this,'load_mobile_ctas'));	
	}
	private function print_style($id){
		$output = "";
		foreach(Mobile_CTA_Frontend_Render::get_instance($id)->getItems() as $item){
			foreach($item['content']->loaded_data as  $index => $loaded){
				$output .= mobile_cta_render_style($loaded,$item['ID'],($index+1));
			}
		}
		return $output;
	}

	// private function render_structure(){
	// 	echo "<div class ='serp-mobile-elements-section'>";
	// 	foreach(Mobile_CTA_Frontend_Render::get_instance()->getItems() as $item){
	// 		$static_class = "serp-button-static serp-button-collections_".$item["ID"];
	// 		$loaded_data = $item['content']->loaded_data;
	// 		$container = $item['content']->container;
	// 		require("frontend/template/mobile-elements.tmpl.php");	
	// 	}
	// 	echo '</div>';
	// }

	public function load_mobile_ctas(){
		$id = sanitize_text_field($_GET['id']);
		wp_send_json_success(array(
			"style"=>$this->print_style($id),
			"ID"=>get_the_ID()
			// "structure"=>$this->render_structure()
		));

		die();
	}
};

new Mobile_CTA_AJAX_Loaders();