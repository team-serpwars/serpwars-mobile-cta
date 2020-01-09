
<?php

	$raw_data = (object)array(
		'message'=>'Checkout our latest product',
		'expiration'=>'2018-08-08 15:06:48'
	);

	if(isset($item->settings)){		
		$raw_options = json_decode($item->settings);
	}else{
		$raw_options = (object)array();
	}

	?>
		
	<?php


	$fetched_data = array(
		'title'=>isset($item->title) ? $item->title : "",
		'message'=>isset($item->message) ? $item->message : "",
		'expiration_date'=>isset($item->expiration) ? $item->expiration : "0000-00-00 00:00:00",
		'display_message'=>isset($raw_options->display_message) ? true: false,
		'enable_expiration'=>isset($raw_options->display_for_limited_time) ? true: false,
		'display_timer'=>isset($raw_options->display_timer) ? true: false,
		'display_desktop'=>isset($raw_options->display_desktop) ? true: false,
		'display_tablet'=>isset($raw_options->display_tablet) ? true: false,
		'display_mobile'=>isset($raw_options->display_mobile) ? true: false,
		'display_close'=>isset($raw_options->display_close) ? true: false
	);

	$default_data = array(
		'title'=>"Sample1 Button",
		'message'=>'Hello There Limited Offer',
		'display_message'=>true,
		'enable_expiration'=>true,
		'display_timer'=>true,
		'display_desktop'=>false,
		'display_tablet'=>true,
		'display_mobile'=>true,
		'display_close'=>true
	);

	$settings_data = (object)array_merge($default_data,$fetched_data);



	$expiration = explode(" ",$settings_data->expiration_date);
	$expiration_date = $expiration[0];
	$expiration_time = isset($expiration[1]) ? $expiration[1] : "00:00";
?>

<ul class="module_settings_tab_nav">
	<li><a href="#" data-tab="ca_main-tab-panel" class="active">Main</a></li>
	<li><a href="#" data-tab="ca_expiration-panel">Expiration</a></li>
	<li><a href="#" data-tab="ca_display-panel">Display</a></li>
	<li><a href="#" data-tab="ca_advance-panel">Advance</a></li>
</ul>

<form action="#" id="ca_module_settings" class="module_settings_tab">
	<div class="ca_main-tab-panel show">
		<div class="row">
			<div class="col m12">
				<div class="ca-field-wrap">
				<label for="ca_item_title">Title</label>
				<input type = "text" name="ca_item_title" class ="ca_item_title" value = "<?php echo (isset($settings_data->title)) ? $settings_data->title : ''; ?>" placeholder = "Title" required >
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col m12">
		
				<div class="ca-field-wrap">
					<label for="display_for_limited_time">Message</label>
					<input type="text" name="ca_module_message" class ="ca_module_message" v-model="message" placeholder="Your message">
					<!-- <?php wp_editor($settings_data->message,'ca_module_message');?> -->
					<!-- <textarea name="display_message" id="display_message" cols="30" rows="10"></textarea>			 -->
					
				</div>
			</div>
		</div>
	</div>
	<div class="ca_expiration-panel">
		<div class="row">
			<div class="col m12">
				<div class="row">			
				<div class="col m6 ca-field-wrap">
					<label for="ca_expire_date">Expire Date</label>
					<input type="text" class="datepicker" id="ca_expire_date" format="yyyy-mm-dd" v-model= "expiration_date" data-value = "<?php echo $expiration_date;?>" placeholder="Select Date" >
				</div>
				<div class="col m6 ca-field-wrap">
					<label for="ca_expire_time">Expire Time</label>
					<input type="text" class="timepicker" id="ca_expire_time" v-model= "expiration_time" data-value = "<?php echo $expiration_time;?>"  placeholder="Select Time" >
				</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ca_display-panel">
		<div class="row">
			<div class="col m6 ca-field-wrap">
				<div class="ca-field-wrap">
					<label for="display_message"><input type="checkbox" v-model="module_settings.display_message" class = "filled-in" name="display_message" id="display_message" checked>
					Display Message</label>
				</div>
				<div class="ca-field-wrap">
					<label for="display_for_limited_time"><input type="checkbox" class = "filled-in" v-model="module_settings.enable_expiration" name="display_for_limited_time" id="display_for_limited_time">
					Display for limited time</label>
				</div>
		
				<div class="ca-field-wrap">
					<label for="display_timer"><input type="checkbox" v-model="module_settings.display_timer" class = "filled-in" name="display_timer" id="display_timer">
					Display Countdown Timer</label>
				</div>
				<div class="ca-field-wrap">
					<label for="display_desktop"><input type="checkbox" class = "filled-in"  v-model="module_settings.display_desktop" name="display_desktop" id="display_desktop">
				Display Desktop</label>
					<label for="display_tablet"><input type="checkbox" class = "filled-in"  v-model="module_settings.display_tablet"  name="display_tablet" id="display_tablet">
				Display Tablet</label>
					<label for="display_mobile"><input type="checkbox" class = "filled-in"  v-model="module_settings.display_mobile"  name="display_mobile" id="display_mobile">
				Display Mobile</label>
				</div>
				<br>
			<!-- 	<div class="ca-field-wrap">
					<label for="display_weeks"><input type="checkbox" class = "filled-in"  v-model="module_settings.display_weeks" name="display_weeks" id="display_weeks">
				Display Weeks </label> <br>

					<label for="display_days"><input type="checkbox" class = "filled-in"  v-model="module_settings.display_days" name="display_days" id="display_days">
				Display Days </label> <br>

					<label for="display_hours"><input type="checkbox" class = "filled-in"  v-model="module_settings.display_hours" name="display_hours" id="display_hours">
				Display Hours </label> <br>

					<label for="display_minutes"><input type="checkbox" class = "filled-in"  v-model="module_settings.display_minutes" name="display_minutes" id="display_minutes">
				Display Weeks </label> <br>

					<label for="display_seconds"><input type="checkbox" class = "filled-in"  v-model="module_settings.display_seconds" name="display_seconds" id="display_seconds">
				Display Seconds </label> <br>
				</div> -->


			</div>
		</div>
		<div class="row">
			<div class="col m6 ca-field-wrap">
				<label for="display_close"><input type="checkbox" class = "filled-in"  v-model="module_settings.display_close" name="display_close" id="display_close">
				Display Close Button</label>
			</div>
		</div>
	</div>
	<div class="ca_advance-panel">
		<p>Advance CSS Option</p>
		<textarea name="ca_advance_css" id="ca_advance_css" cols="30" rows="10" style="width:100%;max-width:100%;max-height:400px;height: 400px;"></textarea>
	</div>
</form>