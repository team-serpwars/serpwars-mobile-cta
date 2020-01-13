<?php
	class ca_Marketing_tools_frontend{
		function __construct(){

			// add_action( 'wp_footer', array($this,'render_com_modules' ));
			add_action( 'wp_footer', array($this,'render_mobile_elements' ));
			add_action( 'wp_head', array($this,'render_mobile_elements_inline_style' ));
			add_action('wp_enqueue_scripts', array($this,'load_assets') );
		}
		public function getComponent(){

		}
		public function render_mobile_elements_inline_style(){

			global $post;
			$post_ID = $post->ID;

			$component_data = get_post_meta($post_ID,"ca_ma_selected_components",true);
			$component_data = json_decode($component_data);

			$test_string = CA_Mobile_Element::get_item($component_data[0]->id);

			$parse_data = json_decode($test_string->content);
			
			$loaded_data = $parse_data->loaded_data;

			echo "<style id='dynamic-mobile-style'>";
			echo ".serp-button-collections>ul{";
				if ($parse_data->container->width=="custom"){
					echo "width:".$parse_data->container->cw->size.$parse_data->container->cw->unit.";";
				}else{
					echo "width:".$parse_data->container->width.";"	;		
				}
			echo "}";

			$loaded_data = FrontendHelper::filterElements($loaded_data,$post_ID);

			foreach ($loaded_data as $index=>$el) {

					$i=$index+1;
					echo "\n/* asd asd Print style ".$i."*/\n";
						echo "\n.serp-button-collections>ul>div>li:nth-child(".$i."){";
						echo "background-color: ".$el->style->main->background.";";
						echo "width: ".$el->style->main->width->size.$el->style->main->width->unit.";";

						echo "height: ".$el->style->main->height->size.$el->style->main->height->unit.";";

						if($el->style->border->enable){
							$border_string = $el->style->border->size."px ".$el->style->border->style." ".$el->style->border->color.";";
							echo ($el->style->sides->top) ? "border-top: ".$border_string : "none;";
							echo ($el->style->sides->right) ? "border-right: ".$border_string : "none;";
							echo ($el->style->sides->bottom) ? "border-bottom: ".$border_string : "none;";
							echo ($el->style->sides->left) ? "border-left: ".$border_string : "none;";
						}

						if($el->style->border_radius->enable){
							echo "border-top-left-radius: ".$el->style->border_radius->top_left."px;";
							echo "border-top-right-radius: ".$el->style->border_radius->top_right."px;";
							echo "border-bottom-left-radius: ".$el->style->border_radius->bottom_left."px;";
							echo "border-bottom-right-radius: ".$el->style->border_radius->bottom_right."px;";
						}

					echo "margin-top:". $el->style->main->margin->top."px;";
					echo "margin-left:". $el->style->main->margin->left."px;";
					echo "margin-bottom:". $el->style->main->margin->bottom."px;";
					echo "margin-right:". $el->style->main->margin->right."px;";


					echo "}";
					echo ".serp-button-collections>ul>div>li:nth-child(".$i.") .ca_icon{";
						echo "color: ".$el->style->icon->color.";";
						echo "font-size: ".$el->style->icon->size.$el->style->icon->unit.";";
					echo "}";
					echo ".serp-button-collections>ul>div>li:nth-child(".$i.") .ca_btn_text{";
						echo "color: ".$el->style->text->color.";";
						echo "font-size: ".$el->style->text->size.$el->style->text->unit.";";
					echo "}\n";
				
			}
			echo "</style>";
		}
		public function render_mobile_elements(){

			global $post;
			$post_ID = $post->ID;

			$component_data = get_post_meta($post_ID,"ca_ma_selected_components",true);
			$component_data = json_decode($component_data);

			$test_string = CA_Mobile_Element::get_item($component_data[0]->id);


			$parse_data = json_decode($test_string->content);
			$loaded_data = $parse_data->loaded_data;
			$container = $parse_data->container;



			require_once("template/mobile-elements.tmpl.php");
		}

		public function render_com_modules(){
			global $post;
			$post_ID = $post->ID;

			$component_data = get_post_meta($post_ID,"ca_ma_selected_components",true);
			$component_data = json_decode($component_data);

			?>
			<div class="ca_mobile_module_collection">
				<?php
				foreach ($component_data as $data_id) { 

					$data_id->enable_schedule = isset($data_id->enable_schedule) ? $data_id->enable_schedule : false;

					?>
					<?php
						if($data_id->enable_schedule==true){
							$start_time = explode(" ",$data_id->start_time)[1];
							$end_time = explode(" ",$data_id->end_time)[1];
							
							// date_default_timezone_set("Asia/Kuala_Lumpur");
							// date_default_timezone_set("America/Los_Angeles");

							$date = date("H:i:s");

							$debug=false;
							if($debug==true){
							?>
							Current Date : <?php echo $date; ?> - Start Time : <?php echo $start_time; ?> - End Time :<?php echo $end_time; ?> <br>		
							<?php
							}
							if((strtotime($start_time)<strtotime($date))&& ( strtotime($end_time)>strtotime($date) || (strtotime($end_time)<strtotime($start_time))) ){
								new ca_FrontEnd_Mobile_Module($data_id);						
							}else{

							}


						}else{
							new ca_FrontEnd_Mobile_Module($data_id);
						} 
				} ?>
			</div>

			<?php
		}

		public function load_assets(){
			global $post;
			wp_enqueue_style( "serp-app-new", CA_MOBILE_ELEMENTS_ASSETS. '/css/mobile-elements-style.css', array(),"1.0.1", 'all' );
		}

		function load_item($id){			;
			$item = CA_Mobile_Element::get_item($id);
			return  $item;
		}

	 	function load_module($item){	 	


			$component = CA_Mobile_Element::get_component_by_ID($item->id);
	 		
	 		// print_r($item);
	 		$component_data = json_decode($component[0]->content);

	 		
	 		$template = "mobile-footer-navbar";

	 		// require("template/header-bar.tmpl.php");
	 		require("template/mobile-footer-navbar-simple.tmpl.php");
	 	}
	};

	new ca_Marketing_tools_frontend();
?>