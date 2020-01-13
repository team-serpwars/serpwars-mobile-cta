<?php

	
	class SERPWARS_Frontend_module{
		function __construct(){
			add_action('wp_head',array($this,'render_tag_manager_script'));
		}

		public function render_tag_manager_script(){
			SERPWARS_API_Settings::print_tagmanager_script();
		}
	};

	new SERPWARS_Frontend_module();
?>