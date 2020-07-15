<?php


class SERPWARS_Mobile_Elements_Admin{
	function __construct(){
		add_action('admin_menu', array($this,'create_menu') );
		add_action('admin_enqueue_scripts', array($this,'load_assets') );

		add_action('wp_head', function () {
    		global $post;
    		if ($post) {
    		    setup_postdata($post);
    		    $content = get_the_content();    		    
    		    echo '<style id="styler"></style>';    		    
    		}
		});


	}



	public function load_assets($hook){

		if($hook=='mobile-cta_page_ca_add_new_mobile_cta'){	
			wp_enqueue_style( "new-serp-vendor", SERPWARS_MOBILE_ELEMENTS_ASSETS. '/css/chunk-vendors.56689a7f.css', array(),"1.0.0", 'all' );
			wp_enqueue_style( "new-serp-app", SERPWARS_MOBILE_ELEMENTS_ASSETS. '/css/app.958814a7.css', array(),"1.0.0", 'all' );
			global $post;

			$id = (isset($_GET["id"])) ?  sanitize_text_field($_GET["id"]) : 0;
			wp_enqueue_script( "serp-vendor-new-js", SERPWARS_MOBILE_ELEMENTS_ASSETS . '/js/chunk-vendors.71337edb.js', array(), "1.0.5", true );
			wp_enqueue_script( "serp-app-new-js", SERPWARS_MOBILE_ELEMENTS_ASSETS . '/js/app.98d9e844.js', array(), microtime(), true );
			wp_localize_script( "serp-app-new-js",'env', "live" );
			$appvar = array("id"=>$id) ;
			wp_localize_script( "serp-app-new-js",'appvar', $appvar );
			wp_localize_script( "serp-app-new-js",'fetch_id', $id );
		}else if($hook=='toplevel_page_ca-mobile-elements'){
			wp_enqueue_style( "new-serp-listings", SERPWARS_MOBILE_ELEMENTS_ASSETS. '/css/listings.css', array(),microtime(), 'all' );
			wp_enqueue_script( "new-serp-listings", SERPWARS_MOBILE_ELEMENTS_ASSETS. '/js/listings.js', array('jquery'),microtime(), 'all' );

			wp_enqueue_style( 'prefix-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css' );
		}


	}

	public function create_menu(){
		$page_title = 'Mobile CTA';
  		$menu_title = 'Mobile CTA';
  		$capability = 'manage_options';
  		$menu_slug  = 'ca-mobile-elements';
  		$function   = array($this,'render_admin_home');
  		$icon_url   = 'dashicons-media-code';
  		$position   = null;

  		add_menu_page( $page_title,
                 $menu_title, 
                 $capability, 
                 $menu_slug, 
                 $function, 
                 $icon_url, 
                 $position );

  		add_submenu_page( $menu_slug, 'New Mobile CTA', 'Buttons', $capability,  $menu_slug);
  		add_submenu_page( 'ca-mobile-elements', 'New Mobile CTA', 'Add New', $capability, 'ca_add_new_mobile_cta', array($this,'create_new_item_page') );
  		add_submenu_page( 'ca-mobile-elements', 'API', 'API', $capability, 'ca_set_api_values', array('SERPWARS_API_Settings','me_options_page') );
  		

  	}
  	public function ca_set_api_values(){ ?>
		<div class="row">
			<div class="col m12">
				<h5> SET API Values</h5>
			</div>
		</div>
		<div class="row">
			<div class="col m12">
				<p>Google Analytics code</p>
				<textarea name="" id="" cols="30" rows="20" style="height:200px;"></textarea>
			</div>
			<div class="col m12">
				<p>Facebook pixel code</p>
				<textarea name="" id="" cols="30" rows="20" style="height:200px;"></textarea>
			</div>
		</div>
  	<?php }
  	public function create_new_item_page(){	 
		$id = (isset($_GET['id'])) ? sanitize_text_field($_GET['id']) : -1;

		$item = array();
		if($id!=-1){
			$item = CA_Mobile_Element::get_item($id);					
		}

		?>
		<div id="app"></div>
		<?php			


	}
	public function render_post_modal(){ ?>
		<div class="post-overlay"></div>
		<div class="post-modal">
			<div class="post-modal-wrapper">
				<div class="post-modal-header"><h2>Select Page(s)</h2></div>
				<div class="post-modal-content">
					<select name="post-items[]" multiple="multiple" id="post-lists"></select>
				</div>
				<div class="post-modal-footer">
					<a href="#" class="btn btn-save">Save</a>
					<a href="#" class="btn btn-cancel">Cancel</a>
				</div>
			</div>
		</div>

	<?php }
  	public function render_admin_home(){ ?>
		<div class="wrap">
		<p>&nbsp;</p>
		<div class="row">		

			<a href="admin.php?page=ca_add_new_mobile_cta" class="page-title-action"> Create New  CTA</a>
		</div>
		</div>
		<p>&nbsp;</p>
		<div class="row">
			<?php $collection = CA_Mobile_Element::get_collection();
				$this->render_post_modal();
			 ?>
			<table class="wp-list-table widefat fixed striped pages">
				<thead>
					<tr>
						<th></th>
						<th style="width:200px;">Title</th>
						<th style="max-width:
						320px">Preview</th>
						<th style="text-align:center;width:320px;">Display CTA</th>
						<!-- <th style="text-align:center">Statistics</th> -->
						<th style="width:50px;">Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($collection as $item) { ?>
						<tr class="item-row_<?php echo $item->id;?>">
							<td><a href = "admin.php?page=ca_add_new_mobile_cta&id=<?php echo $item->id;?>" style="float:Left;" class ="row-title"><span class="dashicons dashicons-edit"></span></a><a href = "#" data-id="<?php echo $item->id;?>" style="float:left;" class ="ca-clone row-title"><span class="dashicons 
dashicons-admin-page"></span></a></td>						
					
							<td class="title column-title has-row-actions column-primary page-title">
								<a href = "admin.php?page=ca_add_new_mobile_cta&id=<?php echo $item->id;?>" class ="row-title"><?php echo $item->title;?></a>
								</b>
							</td>
							
							<td style="width:320px">
								<?php
									
									$loaded_data = json_decode($item->content)->loaded_data;
									$container = json_decode($item->content)->container;
								
								?>
								<style>
									<?php
										foreach ($loaded_data as $index=>$el) {

					$i=$index+1;
						echo "\n.serp-mobile-elements-".$item->id." .serp-button-collections>ul>li:nth-child(".$i."){";
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
					echo ".serp-mobile-elements-".$item->id." .serp-button-collections>ul>li:nth-child(".$i.") .ca_icon{";
						echo "color: ".$el->style->icon->color.";";
						echo "font-size: ".$el->style->icon->size.$el->style->icon->unit.";";
					echo "}";
					echo ".serp-mobile-elements-".$item->id." .serp-button-collections>ul>li:nth-child(".$i.") .ca_btn_text{";
						echo "color: ".$el->style->text->color.";";
						echo "font-size: ".$el->style->text->size.$el->style->text->unit.";";
					echo "}\n";
				
			}
									?>
								</style>
								
								<div class="serp-mobile-elements-<?php echo $item->id;?>" id="spb-information-bar-<?php echo $item->id;?>">
									<div class="serp-button-collections">
										<ul class="<?php echo $container->layout;?>">
										<?php foreach($loaded_data as $button){ ?>
											 
											<li  class="ca-share-button item waves-effect <?php echo $button->visible_content;?>" style="padding:0" id="<?php echo $button->id; ?>">
												<a href="<?php echo $button->link_path; ?>" class="<?php echo $button->class;?>" >
													<div class="ca_button_content">
														<span class="ca_icon <?php echo $button->icon;?>"></span>
														<span class="ca_btn_text"><?php echo $button->link_text;?></span>
													</div>
												</a>
											</li>
										<?php } ?>
										</ul>
									</div>
								</div>
							</td>
							<td style="text-align:center;">
								<?php $display_on = json_decode($item->display_pages)->display_on;?>
							<div style="display:flex;">
								<div style="width:70%">
									<select name="" id="" class="select-display-option" data-item-id="<?php echo $item->id?>" style="width:100%;">
										<option value="all" <?php echo ($display_on =="all") ? "selected" :"" ?>>On All</option>
										<option value="only-on" <?php echo ($display_on =="only-on") ? "selected" :"" ?>>Only On</option>
										<option value="except-on" <?php echo ($display_on =="except-on") ? "selected" :"" ?>>Except On</option>
									</select>
								</div>
								<div  style="width:30%">
									<a href="#" class="modal-trigger" data-item-id="<?php echo $item->id;?>">These Pages</a>
								</div>
							</div>																
							</td>
							<!-- <td>
								
							</td> -->
							<td><a href="#" class="del-mbl ca-delete" data-id="<?php echo $item->id;?>" style="float:Left;" ><span class="dashicons dashicons-trash"></span></a></td>
						</tr>
					<?php 	}  ?>
				</tbody>
			</table>
		</div>
  	<?php }

}

new SERPWARS_Mobile_Elements_Admin();
$nb_me_admin = new NB_Mobile_Elements_Admin; $nb_me_admin->del_item();

if(isset($_GET['page']) && $_GET['page'] == 'ca-mobile-elements'){

?>

<script>
function del(id){
	if(confirm("Are you sure to delete this record!")){
		var path = "admin.php?page=ca-mobile-elements&del="+id;
        location.href = path;
	}
}
</script>

<?php } ?>