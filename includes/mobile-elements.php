<?php


class CA_Mobile_Elements_Admin{
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
			wp_enqueue_style( "new-serp-vendor", CA_MOBILE_ELEMENTS_ASSETS. '/css/chunk-vendors.c2c31243.css', array(),"1.0.0", 'all' );
			wp_enqueue_style( "new-serp-app", CA_MOBILE_ELEMENTS_ASSETS. '/css/app.2b8f8b7e.css', array(),"1.0.0", 'all' );
			// wp_enqueue_style( "new-serp-app", CA_MOBILE_ELEMENTS_ASSETS. '/css/app.71b1e085.css', array(),"1.0.0", 'all' );

			global $post;

			$id = (isset($_GET["id"])) ?  $_GET["id"] : 0;
			// wp_enqueue_style( "serp-vendor", CA_MOBILE_ELEMENTS_ASSETS. '/ver2/css/vendor.min.css', array(),"1.0.4", 'all' );

			// wp_enqueue_script( "serp-vendor", CA_MOBILE_ELEMENTS_ASSETS . '/ver2/js/vendor.min.js', array(), "1.0.4", true );
			// wp_enqueue_script( "serp-vendor-new-js", CA_MOBILE_ELEMENTS_ASSETS . '/js/chunk-vendors.7257d150.js', array(), "1.0.0", true );
			wp_enqueue_script( "serp-vendor-new-js", CA_MOBILE_ELEMENTS_ASSETS . '/js/chunk-vendors.61e59e7d.js', array(), "1.0.1", true );
			// wp_enqueue_script( "serp-app-new-js", CA_MOBILE_ELEMENTS_ASSETS . '/js/app.1373dafb.js', array(), "1.0.0", true );
			wp_enqueue_script( "serp-app-new-js", CA_MOBILE_ELEMENTS_ASSETS . '/js/app.748e7c33.js', array(), "1.0.0", true );
			wp_localize_script( "serp-app-new-js",'env', "live" );
			// $container = '{"class":"","id":"","layout":"start","gtm":{"category":""},"width":"custom","cw":{"size":320,"unit":"px"}}';
			// wp_localize_script( "serp-app-new-js",'loaded_data', array() );
			// wp_localize_script( "serp-app-new-js",'container', $container );

			wp_localize_script( "serp-app-new-js",'fetch_id', $id );

			// require_once("libs/icon-list.php");
			// $icons = array();
			// 	$data_icons = (json_decode($icon_list));
			// 	foreach ($data_icons as $item) {
			// 		$icons[] = $item->class;
			// 	}


			// 	$icons= json_encode($icons);

			// wp_enqueue_script( "serp-data-script", CA_MOBILE_ELEMENTS_ASSETS . '/ver2/js/script.js', array(), "1.0.0", true );
			// wp_enqueue_script( "app-script", CA_MOBILE_ELEMENTS_ASSETS . '/ver2/js/app.js', array(), "1.0.0", true );

			// global $serpwars_conversion;
			// $serpwars_conversion = CA_Header_Bar_Helper::get_item($_GET['id']);
			// $data_content	= $serpwars_conversion->content;			

			// wp_localize_script( "app-script",'serwars_conversion_data', $data_content );
		}else if($hook=='toplevel_page_ca-mobile-elements'){
			wp_enqueue_style( "new-serp-listings", CA_MOBILE_ELEMENTS_ASSETS. '/css/listings.css', array(),"1.0.0", 'all' );
			wp_enqueue_script( "new-serp-listings", CA_MOBILE_ELEMENTS_ASSETS. '/js/listings.js', array('jquery'),"1.0.0", 'all' );
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

  		add_submenu_page( 'ca-mobile-elements', 'New Mobile CTA', 'Add New', $capability, 'ca_add_new_mobile_cta', array($this,'create_new_item_page') );
  		add_submenu_page( 'ca-mobile-elements', 'API', 'API', $capability, 'ca_set_api_values', array('ME_API_Settings','me_options_page') );
  		

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
				$id = (isset($_GET['id'])) ? $_GET['id'] : -1;

				$item = array();
				if($id!=-1){
					$item = CA_Header_Bar_Helper::get_item($id);					
				}

				?>
				<div id="app"></div>
				<?php			
				// require_once("libs/mobile-elements.tmpl.php");


	}
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

			 ?>

			<table class="wp-list-table widefat fixed striped pages">
				<thead>
					<tr>
						<th></th>
						<th>Title</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($collection as $item) { ?>
						<tr>
							<td><a href = "admin.php?page=ca_add_new_mobile_cta&id=<?php echo $item->id;?>" style="float:Left;" class ="row-title"><span class="dashicons dashicons-edit"></span></a><a href = "#" data-id="<?php echo $item->id;?>" style="float:left;" class ="ca-clone row-title"><span class="dashicons 
dashicons-admin-page"></span></a></td>						
					
							<td class="title column-title has-row-actions column-primary page-title">
								<a href = "admin.php?page=ca_add_new_mobile_cta&id=<?php echo $item->id;?>" class ="row-title"><?php echo $item->title;?></a>
								</b>
							</td>
							<td><a href="#" class="del-mbl ca-delete" data-id="<?php echo $item->id;?>" style="float:Left;" ><span class="dashicons dashicons-trash"></span></a></td>
						</tr>
					<?php 	}  ?>
				</tbody>
			</table>

		

		</div>
  	<?php }

}

new CA_Mobile_Elements_Admin();
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