<?php 
global $serpwars_conversion; 
?>
	<div id="app">
		
	<?php require_once("icon-list.php");?>
	<div class="container">

		 <div class="input-field col s6">
          <label for="first_name">Component Title</label>
          <input type="text" id="serpwars-component-title" class="serpwars-component-title" placeholder="Enter Component Title"  value = "<?php echo $serpwars_conversion->title;?>">
          <input type="hidden" id="serpwars-component-id" class="serpwars-component-id" value = "<?php echo $_GET['id'];?>">
        </div>


	<textarea name="" id="dataRenderer" cols="30" rows="10" @change="renderData" style="display:none;">
		{{list1}}
	</textarea>
	<div class="row"><!-- <li class="tab-link" data-tab="tab-2">Style</li> -->
			<div class="col m12">
				<!-- <a href="#" class="dropdown-trigger btn blue white-text" data-activates='dropdown1'><i class="fa fa-plus"></i> Create </a> -->
				<a class='dropdown-trigger btn blue white-text' href='#' data-target='dropdown1'><i class="fa fa-plus"></i> Create</a>

					<ul id='dropdown1' class='dropdown-content' style="width:320px;">
					  <li><a href="#!" data-item-type="custom" class = "create-custom-btn"><i class='fa fa-cog'></i>  Custom Button</a></li>
					  <li><a href="#!" data-item-type="static_text"  class = "create-custom-btn"><i class='fa fa-font'></i>  Static Text</a></li>
					  <li><a href="#!" data-item-type="fb_messenger"  class = "create-custom-btn"><i class='fa fa-comment'></i>  Messenger button</a></li>
					  <li><a href="#!" data-item-type="count_down"  class = "create-custom-btn"><i class='fa fa-hourglass'></i>  Count Down</a></li>
					  <li><a href="#!" data-item-type="toggle"  class = "create-custom-btn"><i class='fa fa-bars'></i>  Toggle Secondary</a></li>
					  <li><a href="#!" data-item-type="fb_share"  class = "create-custom-btn"><i class='fa fa-facebook'></i>  Facebook Share</a></li>
					  <li><a href="#!" data-item-type="twitter_share"  class = "create-custom-btn"><i class='fa fa-twitter'></i>  Twitter Share</a></li>
					  <li><a href="#!" data-item-type="google_share"  class = "create-custom-btn"><i class='fa fa-google-plus'></i>  Google Share</a></li>
					  <li><a href="#!" data-item-type="pinterest_share"  class = "create-custom-btn"><i class='fa fa-pinterest'></i>  Pinterest Share</a></li>
					  <li><a href="#!" data-item-type="linkedin_share"  class = "create-custom-btn"><i class='fa fa-linkedin'></i>  LinkedIn Share</a></li>
					  <li><a href="#!" data-item-type="digg_share"  class = "create-custom-btn"><i class='fa fa-digg'></i>  Digg Share</a></li>
					  <li><a href="#!" data-item-type="tumblr_share"  class = "create-custom-btn"><i class='fa fa-tumblr'></i>  Tumblr Share</a></li>
					  <li><a href="#!" data-item-type="reddit_share"  class = "create-custom-btn"><i class='fa fa-reddit'></i>  Reddit Share</a></li>
					  <li><a href="#!" data-item-type="yahoo_share"  class = "create-custom-btn"><i class='fa fa-yahoo'></i>  Yahoo Share</a></li>
					</ul>


			</div>
		</div>
	</div>

	<div class="serp-app-wrapper" >		


		<div class="container">
		<div class="row">
			<div class="col m8">
				
				<?php
					require_once("tab.php");
				?>
			</div>
			<div class="col m4" >
				
				<div class="serp-preview-wrap">
					<div class="serp-preview-screen" >		
						<div class="serp-preview-content">
							<div class="serp-preview-content-wrap" style="text-align:center;" >
								<div class="serp-preview-content-area"> 
								<div class="serp-preview-body ">
									
								
							<div style="background:#000;text-align: center">								
							<img src="<?php echo CA_MOBILE_ELEMENTS_ASSETS;?>/ver2/rsz_serpwars-logo.png" alt="">
							</div>

							<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit in tempore quia consectetur reprehenderit, accusantium adipisci debitis nulla, dignissimos, nesciunt itaque, fugiat consequuntur iste. Ab veniam facilis itaque veritatis repellendus.</p>

							<p>Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.</p>

							<p>Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In suscipit faucibus urna.</p>
							
							<p>Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero</p>

								</div>

							


								</div>
								
							<?php require_once("preview.php");?>
							</div>


						</div>										
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	</div>
	<script>
			

			
	</script>