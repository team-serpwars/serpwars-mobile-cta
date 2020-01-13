<?php
class NB_Mobile_Elements_Admin{
	function __construct(){
		add_action( 'add_meta_boxes', array($this,'create_metaboxes' ));
		add_action('admin_enqueue_scripts', array($this,'load_assets') );	
		// add_action('admin_footer', array($this,'font_awesome_selection_modal') );
		add_action('admin_footer', array($this,'materialize_font_awesome_selection_modal') );

		add_action( 'wp_ajax_load_item',array($this, 'load_element_item' ));

		add_action( 'wp_ajax_ca_saveitem',array($this, 'save_item' ));
		add_action( 'wp_ajax_save_item',array($this, 'save_item' ));
		add_action( 'wp_ajax_ca_updateitem',array($this, 'update_item' ));

		add_action( 'wp_ajax_ca_clone_item',array($this, 'clone_item' ));
		add_action( 'wp_ajax_ca_removeitem',array($this, 'remove_item' ));

		add_action( 'save_post', array($this,'meta_box_save' ));


		add_action( 'wp_ajax_ca_get_page_info',array($this, 'get_page_info' ));
		add_action( 'wp_ajax_ca_get_pages',array($this, 'get_pages' ));
		add_action( 'wp_ajax_ca_get_component',array($this, 'get_component' ));
		add_action( 'wp_ajax_ca_get_page_component',array($this, 'get_page_component' ));

		 add_action( 'admin_init',array($this,  'api_settings_init' ));
	}

	public function create_metaboxes(){
			add_meta_box( 'ca-marketing-tools', 'Mobile CTA', array($this,'ca_marketing_metabox'), 'post', 'normal', 'high' );
			add_meta_box( 'ca-marketing-tools', 'Mobile CTA', array($this,'ca_marketing_metabox'), 'page', 'normal', 'high' );
	}

	public function ca_marketing_metabox(){
			global $post;
			 wp_nonce_field( 'ca_ma_metabox_nonce', 'ca_ma_metabox_nonce' );
			 $data = get_post_meta($post->ID,'ca_ma_selected_components',true);

			 // print_r($data);
			?>
          		<div class="ca_marketing_com_wrap">
				<label>Select Components</label>
          			
          		    <textarea class= "ca_ma_com_selected" name="ca_ma_com_selected" style="display: none;"><?php echo $data ?></textarea>

          		     <div class="ca_ma_com_selected_input_query_wrap">
          		      <input type="text" class="ca_ma_com_selection_input_query" placeholder="Seach Title of a module">
          		      <div class="ca_ma_com_selection_input_results">
		
          		      </div>
          		    </div>
					<p>Click on the item to show more options </p>
          		    <div class="ca_ma_com_tags">
          		      	<ul></ul>
          		    </div>
		
          		   
          		</div>

				<div class="row ca_component_schedule" data-itemid="-1">

				<pre>
				Current Time is : <?php echo date("H:i"); ?>
				</pre>


				<label>Schedule Display [<span class="ca_component_selected"></span>]</label>
				<div class="row">
					<div class="col m12">
						<label for="enable_schedule"> <input type="checkbox" id="enable_schedule">Enable Schedule</label>
					</div>
				</div>
				<div class="row">
					<p>Display From</p>
					<div class="col m3">
						<input type="date" class="ca_start_date_input" style="display:none">
          				<input type="time" class="ca_start_time_input" value="08:56"> 			to			
					</div>
					<div class="col m3">
						<!-- <p>End Date and Time</p> -->
						<input type="date" class="ca_end_date_input" style="display:none">
          				<input type="time" class="ca_end_time_input">	
					</div>
				</div>
				</div>

			<?php
		}

	public function load_assets($hook){
		if($hook =="post.php"){
				wp_enqueue_style( "ca-hotfix-metabox-admin",CA_MOBILE_ELEMENTS_ASSETS. '/custom-element-metabox.min.css', array(),"1.0.0", 'all' );
				wp_enqueue_script( "scheduler_js",CA_MOBILE_ELEMENTS_ASSETS. '/custom-element-metabox.js', array(), "1.0.0", true );
		}
	}

	function load_item($id){			;
		$item = CA_Mobile_Element::get_item($id);
		return  $item;
	}

	public function materialize_font_awesome_selection_modal(){
		// require("libs/icon-list.php");
		$icons = json_decode($icon_list) ;
/*
		?>
		<div id="modal1" class="modal">
    		<div class="modal-content">
      			<h5 class="fa-field-modal-title"><?php _e( 'Select Font Awesome Icon', 'fa-field' ); ?></h5>
      			<input type="text" class="ca_icon_filter" placeholder="Seach Icon">
      			<div class="fa-field-modal-icons">
      				<?php if ( $icons ) : ?>
      					<?php foreach ( $icons as $icon ) : ?>
      						<div class="fa-field-modal-icon-holder" data-icon="<?php echo $icon->class; ?>">
                 				<div class="icon">
                 				  <i class="fa <?php echo $icon->class; ?>"></i>
                 				</div>
                 				<div class="label">
                 				  <?php echo $icon->class; ?>
                 				</div>
                			</div>
      					<?php endforeach; ?>
      				<?php endif; ?>
      			</div>				
    		</div>
    		<div class="modal-footer">
      			<a href="#!" class="modal-close waves-effect waves-blue btn-flat">Continue</a>
    		</div>
  		</div>

		<?php
*/		
	}

	public function font_awesome_selection_modal() {
		require("libs/icon-list.php");
		// $icons = get_option( 'ca_fa_icons' );  
		$icons = json_decode($icon_list) ;
		?> <div class="fa-field-modal" id="fa-field-modal" style="display:none">
          <div class="fa-field-modal-close">&times;</div>
          <h5 class="fa-field-modal-title"><?php _e( 'Select Font Awesome Icon', 'fa-field' ); ?></h5>

          <div class="fa-field-modal-icons">

            <?php if ( $icons ) : ?>

              <?php foreach ( $icons as $icon ) : ?>

                <div class="fa-field-modal-icon-holder" data-icon="<?php echo $icon->class; ?>">
                  <div class="icon">
                    <i class="fa <?php echo $icon->class; ?>"></i>
                  </div>
                  <div class="label">
                    <?php echo $icon->class; ?>
                  </div>
                </div>

              <?php endforeach; ?>

            <?php endif; ?>
          </div>
        </div>
		<?php
	}
	public function get_pages(){
		$title = $_POST['data'];
		$collection = CA_Mobile_Element::get_pages();
		// foreach ($collection as $item) { 			echo "<li><a href ='#' data-value-id='".$item->ID."'>".$item->post_title."</li>";		}
		echo json_encode($collection);
		die();		
	}
	// public function get_pages(){		$collection = CA_Mobile_Element::get_pages();	}
	public function get_page_info(){
		$title = $_POST['data'];
		$collection = CA_Mobile_Element::get_component($title);
		foreach ($collection as $item) {
			echo "<li><a href ='#' data-value-id='".$item->id."'>".$item->title."</li>";
		}
		die();
	} 

		public function get_page_component(){
			$page_ID = $_POST['id'];
			global $wpdb;
			$item = $wpdb->get_results( "SELECT ID,post_title FROM `{$wpdb->prefix}posts` WHERE ID =".$page_ID, OBJECT );

			echo "SELECT ID,post_title FROM `{$wpdb->prefix}posts` WHERE ID =".$page_ID;
			// echo json_encode($item);
			die();
		}  

	public function get_component(){
			$id = $_POST['id'];

			$item = CA_Mobile_Element::get_component_by_ID((object)array('id'=>$id));
			echo json_encode($item);
			die();
		} 
	public function clone_item(){
		$id = $_POST["id"];
		$item = CA_Mobile_Element::get_item($id);
		$num = CA_Mobile_Element::get_last_index();
		$title = $item->title." Clone ".$num;
		$content = $item->content;
		$data = array(
			"title"=>$title,
			"content"=>$content
		);
		echo CA_Mobile_Element::add_item($data);
		die();
	}
	public function update_item(){
			$id = $_POST['id'];			
			// $module_settings = $_POST['module_settings'];
			$settings = array();

			$module_settings = json_encode($_POST['module_settings']);
			$ca_ma_selected_components = $_POST['ca_ma_selected_components'];
			// foreach ($module_settings as $s) {
			// 	if($s['value']=="on"){
			// 		$settings[$s['name']]=true;					
			// 	}else{
			// 		$settings[$s['name']]=false;										
			// 	}
			// }

			$data = array(
					'title'=>$_POST['title'],
					'message'=>$_POST['message'],
					'content' => json_encode($_POST['content']),
					'expiration'=>$_POST['expiration'],
					'settings'=>$module_settings,
			);


			/*Remotely adding post meta*/
			
			$status = CA_Mobile_Element::update_item($id,$data);
			$debug_data = array();

			if($status){
				$settings = $_POST['module_settings'];
				global $wpdb;

				foreach ($settings['page_settings'] as $page) {

					$the_data = $_POST['ca_ma_selected_components'];

					$page_meta = json_decode(get_post_meta( $page['id'], "ca_ma_selected_components",true)[0]);

					if(!$page_meta || $page_meta=""){
						$page_meta = array();						
					}

			 		// array_push($debug_data,gettype($page_meta));
					array_push($page_meta,$the_data);
			 		$post_meta_Status = update_post_meta( $page['id'], "ca_ma_selected_components", json_encode($page_meta)); 


				}

				/*Removing from posts*/
				$delete_pages = $_POST['remove_from_pages'];
				foreach($delete_pages  as $page){
					delete_post_meta($page, "ca_ma_selected_components");
				}				 
				
				echo json_encode(array("text"=>"Item is Updated","value"=>""));
			}else{
			echo json_encode(array("text"=>"Unexpected Error Occured","value"=>""));
			// 	echo false;
			}


			die();
		}  
	public function remove_item(){
		$id = $_POST['id'];
		echo CA_Mobile_Element::remove_item($id);
		die();
	} 

public function del_item(){
	global $wpdb;
	$id = (isset($_GET['del']) && $_GET['del'] != '') ? $_GET['del']:'';
	if($id != ''){
		$wpdb->delete( "{$wpdb->prefix}header_bar", array( 'id' => $id ), array( '%d' ) );
	}
}	
	
	public function save_item2(){
		echo "Attempt to save item";
	}
	public function load_element_item(){
		$id = $_POST["id"];
		$item = CA_Mobile_Element::get_item($id);
		echo json_encode($item);
		die();
	}
	public function save_item(){

		$return_id = -1;

		$content= array();
		$content["loaded_data"] = $_POST["loaded_data"];
		$content["container"] = $_POST["container"];
		$content = (object) $content;

			$id = $_POST["id"];

			$data = array(
				'title'=>$_POST['title'],
				'content' => json_encode($content),
			);


			if($id==0){
				$return_id =  CA_Mobile_Element::add_item($data);
			}else{
				$return_id = CA_Mobile_Element::update_item($id,$data);		
				if($return_id ==1)		{
					$return_id =$id;
				}else{
					$return_id =1;
				}
			}
			$status = ($return_id!=-1) ? "success" : "error";
			$message = ($return_id!=-1) ? "Saved" : "Unable to Save Please Try again later";

			$response = (object) array(
				"return_id"=>$return_id  ,
				"status"=>$status,
				"message"=>$message
			);

			echo json_encode($response);
			// // print_r(json_encode($_POST['content']));
			die();
		}
	public function meta_box_save($post_id){
			// Bail if we're doing an auto save
    		if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    		// if our nonce isn't there, or we can't verify it, bail
    		if( !isset( $_POST['ca_ma_metabox_nonce'] ) || !wp_verify_nonce( $_POST['ca_ma_metabox_nonce'], 'ca_ma_metabox_nonce' ) ) return;
     
    		// if our current user can't edit this post, bail
    		if( !current_user_can( 'edit_post' ) ) return;

    		if( isset( $_POST['ca_ma_com_selected'] ) )
        	update_post_meta( $post_id, 'ca_ma_selected_components', wp_kses( $_POST['ca_ma_com_selected'], $allowed )) ;


		}

	public function api_settings_init(){
		ME_API_Settings::api_settings_init();
	}
};

new NB_Mobile_Elements_Admin();
?>