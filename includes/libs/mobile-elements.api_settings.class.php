<?php
	class ME_API_Settings{
		public static function api_settings_init(){


			register_setting( 'ca_set_api_values', 'me_settings' );

			add_settings_section(
				'me_pluginPage_section', 
				__( '', 'ca-mobile-elements' ), 
				array('ME_API_Settings','me_settings_section_callback'), 
				'ca_set_api_values'
			);
			add_settings_field( 
				'me_textarea_field_0', 
				__( 'Google Tag Manager', 'ca-mobile-elements' ), 
				array('ME_API_Settings','me_textarea_field_0_render'), 
				'ca_set_api_values', 
				'me_pluginPage_section' 
			);

			add_settings_field( 
				'me_textarea_field_1', 
				__( 'Facebook Pixel API', 'ca-mobile-elements' ), 
				array('ME_API_Settings','me_textarea_field_1_render'), 
				'ca_set_api_values', 
				'me_pluginPage_section' 
			);			

			register_setting( 'reading', 'eg_setting_name' );
		}



public static function me_textarea_field_0_render(  ) { 

	$options = get_option( 'me_settings' );
	?>
	<textarea cols='40' rows='5' name='me_settings[me_textarea_field_0]'><?php echo $options['me_textarea_field_0']; ?></textarea>
	<?php

}


public static function me_textarea_field_1_render(  ) { 

	$options = get_option( 'me_settings' );
	?>
	<textarea cols='40' rows='5' name='me_settings[me_textarea_field_1]'><?php echo $options['me_textarea_field_1']; ?></textarea>
	<?php

}


public static function me_settings_section_callback(  ) { 



}


function me_options_page(  ) { 

	?>
	<form action='options.php' method='post'>
	<p>API Fields</p>
	<?php
		settings_fields( 'ca_set_api_values' );
		do_settings_sections( 'ca_set_api_values' );
		submit_button();
		?>

	</form>
	<?php

}

	public static function print_tagmanager_script(){
		$options = get_option( 'me_settings' );
		echo $options['me_textarea_field_0']; 
	}

	}
?>