<?php
	
	class CA_Header_Bar_Helper{
		function __construct(){
			add_action('init', array($this,'check_table') );
		}

		function check_table(){
			global $wpdb;
			$table_name = $wpdb->prefix.'header_bar';
			if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			     //table not in database. Create new table
			     $charset_collate = $wpdb->get_charset_collate();
			 
			     $sql = "CREATE TABLE $table_name (
			          id mediumint(9) NOT NULL AUTO_INCREMENT,
			          title text NOT NULL,
			          content text NOT NULL,
			          message text NOT NULL,
			          expiration date NOT NULL,
			          settings text NOT NULL,
			          UNIQUE KEY id (id)
			     ) $charset_collate;";
			     require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			     dbDelta( $sql );
			}
			else{

			}
		}
		public static function get_collection(){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}header_bar", OBJECT );
			return $results;
		}

		public static function get_item($id){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}header_bar WHERE id = ".$id, OBJECT );
			return $results[0];
		}

		public static function get_component_by_ID($item){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}header_bar` WHERE id =".$item->id, OBJECT );
			return $results;
		}

		public static function get_component($title){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT id,title FROM `{$wpdb->prefix}header_bar` WHERE title LIKE '%".$title."%'", OBJECT );
			return $results;
		}

		public static function get_page($title){
			global $wpdb;
			$results = $wpdb->get_results( "SELECT ID,post_title FROM `{$wpdb->prefix}posts` WHERE post_title LIKE '%".$title."%' AND `post_type` LIKE 'post' OR `post_type` LIKE 'page'", OBJECT );
			return $results;
		}

		public static function add_item($data){
			global $wpdb;

				
			 $wpdb->insert( 
				"{$wpdb->prefix}header_bar", 
				array( 
					'id' => '', 
					'title' => $data['title'] ,
					'content' => $data['content'],
					'settings' => json_encode($data['settings'])
				), 
				array( 
					'%d', 
					'%s',
					'%s',
					'%s'
				) 
			);

			 return $wpdb->insert_id;    
		}

		public static function update_item($id,$data){
			global $wpdb;
			return $wpdb->update( 
				"{$wpdb->prefix}header_bar", 
				array( 
					'title' => $data['title'],	// string
					'message' => $data['message'],	// string
					'content' => $data['content'],	// integer (number) 
					'expiration' =>  $data['expiration'],	// date_format(date_create($data['expiration']),'Y-m-d h:m:s'); integer (number) 
					'settings' => $data['settings']
				), 				
				array( 'id' => $id ), 
				array( 
					'%s',	// value1
					'%s',	// value1
					'%s',	// value2
					'%s',	// value2
					'%s'	// value2
				), 
				array( '%d' ) 
			);
		}

		public static function remove_item($id){
			global $wpdb;
			return $wpdb->delete( "{$wpdb->prefix}header_bar", array( 'id' => $id ) );
		}
	};


	new CA_Header_Bar_Helper();
?>