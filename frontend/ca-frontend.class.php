<?php
	class ca_FrontEnd_Mobile_Module {
		private $item;
		private $component;
		private $component_data;
		private $template;

		function __construct($item){
			$this->item = $item;
			$this->component = CA_Header_Bar_Helper::get_component_by_ID($item);

			$this->component_data = json_decode($this->component[0]->content);
			$this->template = "mobile-footer-navbar";
			$this->render();
		}

		private 	function get_social_media_share_link($type){
		global $post;

		$url = $post->guid;
		$title = $post->post_title;

		$social_links = array(
		"fb_share"=>(object)array(
			// "icon"=>"fa-facebook",
			// "link_text"=>"Share",
			"url"=>"https://www.facebook.com/sharer.php?u=".$url
		),
		"twitter_share"=>(object)array(
			// "icon"=>"fa-twitter",
			// "link_text"=>"Tweet",
			"url"=>"https://twitter.com/intent/tweet?url=".$url."&text=".$title
		),
		"google_share"=>(object)array(
			// "icon"=>"fa-google-plus",
			// "link_text"=>"Share",
			"url"=>"https://plus.google.com/share?url=".$url
		),
		"pinterest_share"=>(object)array(
			// "icon"=>"fa-pinterest",
			// "link_text"=>"Pin",
			"url"=>"https://pinterest.com/pin/create/bookmarklet/?url=".$url
		),
		"linkedin_share"=>(object)array(
			// "icon"=>"fa-linkedin",
			// "link_text"=>"Share",
			"url"=>"https://www.linkedin.com/shareArticle?url=".$url."&title=".$title
		),
		// "buffer"=>(object)array(
		// 	"icon"=>"fa-buffer",
		// 	"link_text"=>"Share",
		// 	"url"=>"https://buffer.com/add?text=".$title."&url=".$url
		// ),
		"digg_share"=>(object)array(
			// "icon"=>"fa-digg",
			// "link_text"=>"Share",
			"url"=>"http://digg.com/submit?url=".$url."&title=".$title
		),
		"tumblr_share"=>(object)array(
			// "icon"=>"fa-tumblr",
			// "link_text"=>"Share",
			"url"=>"https://www.tumblr.com/widgets/share/tool?canonicalUrl=".$url."&title=".$title."&caption=".$title
		),
		"reddit_share"=>(object)array(
			// "icon"=>"fa-reddit",
			// "link_text"=>"Share",
			"url"=>"https://reddit.com/submit?url=".$url."&title=".$title
		),
		// "stumble_upon"=>(object)array(
		// 	"icon"=>"fa-stumble-upon",
		// 	"link_text"=>"Share",
		// 	"url"=>"http://www.stumbleupon.com/submit?url=".$url."&title=".$title
		// ),
		"yahoo_share"=>(object)array(
			// "icon"=>"fa-yahoo",
			// "link_text"=>"Share",
			"url"=>"http://compose.mail.yahoo.com/?body=".$url
		),
		// "news_vine"=>(object)array(
		// 	"icon"=>"fa-news-vine",
		// 	"link_text"=>"Share",
		// 	"url"=>"http://www.newsvine.com/_tools/seed&save?u=".$url
		// ),
	);

		return $social_links[$type];
	}

		public function render(){
			// require("template/mobile-footer-navbar-simple.tmpl.php");
			// echo "<pre>";
			// print_r($this->component_data);
			// echo "</pre>";
			if(count($this->component_data->list1)>0){
				require("template/frontend-template.tmpl.php");				
			}
		}

		private function renderCustomButton($item){ ?>
			<a href="<?php echo $item->link_path; ?>" class="<?php echo $item->class;?>" onclick = "gtag('event','<?php echo $item->type."_button"; ?>', {event_category: '<?php echo $item->type; ?>', event_label: '<?php echo $item->type." ".$item->id; ?>'});" >
			<!-- <a href="<?php echo $item->link_path; ?>" class="<?php echo $item->class;?>" onclick = "gtag(['_trackEvent', '<?php echo $item->type; ?>', 'Click', '<?php echo $item->id;?>' ]);" > -->
				<div class="ca_button_content"> 
					<?php if(json_decode($item->display_icon)){ ?> 
						<span class = "fa <?php echo $item->icon;?>"></span>
					<?php } ?>
					<?php if(json_decode($item->display_text)){ ?> 
						<span class = "ca_btn_text"><?php echo $item->link_text;?></span>
					<?php } ?>
				</div>
			</a>
		<?php }
		private function renderStaticText($item){ ?>
			<span class="<?php echo $item->class;?>" onclick = "gtag('event','<?php echo $item->type."_button"; ?>', {event_category: '<?php echo $item->type; ?>', event_label: '<?php echo $item->type." ".$item->id; ?>'});" >
				<div class="ca_button_content"> 
					<?php if(json_decode($item->display_icon)){ ?> 
						<span class = "fa <?php echo $item->icon;?>"></span>
					<?php } ?>
					<?php if(json_decode($item->display_text)){ ?> 
						<span class = "ca_btn_text"><?php echo $item->link_text;?></span>
					<?php } ?>
				</div>
			</span>
		<?php }
		private function renderToggle($item){ ?>
			<a href="<?php echo $item->link_path; ?>" class="<?php echo $item->class;?>" onclick = "gtag('event','<?php echo $item->type."_button"; ?>', {event_category: '<?php echo $item->type; ?>', event_label: '<?php echo $item->type." ".$item->id; ?>'});" >
				<div class="ca_button_content"> 
					<?php if(json_decode($item->display_icon)){ ?> 
						<span class = "fa <?php echo $item->icon;?>"></span>
					<?php } ?>
					<?php if(json_decode($item->display_text)){ ?> 
						<span class = "ca_btn_text"><?php echo $item->link_text;?></span>
					<?php } ?>
				</div>
			</a>
		<?php }
		private function renderTimer($item){ ?>
			<span class="serp-countdown <?php echo $item->class;?>" data-expiration-date="<?php echo $item->expiration_date;?>" data-date-format="<?php echo $item->date_format;?>" onclick = "gtag('event','<?php echo $item->type."_button"; ?>', {event_category: '<?php echo $item->type; ?>', event_label: '<?php echo $item->type." ".$item->id; ?>'});" >
				<div class="ca_button_content"> 
					<?php if(json_decode($item->display_icon)){ ?> 
						<span class = "fa <?php echo $item->icon;?>"></span>
					<?php } ?>
					<?php //if(json_decode($item->display_text)){ ?> 
						<!-- <span class = "ca_btn_text serp-clock"><?php echo $item->link_text;?></span> -->
						<span class = "ca_btn_text serp-clock"></span>
					<?php //} ?>

				</div>
			</span>
		<?php }
		private function renderMessengerButton($item){ ?>
			<a href="<?php echo $item->link_path; ?>" class="<?php echo $item->class;?> fb-messenger-toggle" onclick = "gtag('event','<?php echo $item->type."_button"; ?>', {event_category: '<?php echo $item->type; ?>', event_label: '<?php echo $item->type." ".$item->id; ?>'});">
				<div class="ca_button_content"> 
					<?php if(json_decode($item->display_icon)){ ?> 
						<span class = "fa <?php echo $item->icon;?>"></span>
					<?php } ?>
					<?php if(json_decode($item->display_text)){ ?> 
						<span class = "ca_btn_text"><?php echo $item->link_text;?></span>
					<?php } ?>
				</div>
			</a>
		<?php }
		private function renderSocialButton($item){ 
			$url = $this->get_social_media_share_link($item->type)->url;			
			?>
			<a href="<?php echo $url; ?>" target="_blank" class="<?php echo $item->class;?>" onclick = "gtag('event','<?php echo $item->type."_button"; ?>', {event_category: '<?php echo $item->type; ?>', event_label: '<?php echo $item->type." ".$item->id; ?>'});" >
				<div class="ca_button_content"> 
					<?php if(json_decode($item->display_icon)){ ?> 
						<span class = "fa <?php echo $item->icon;?>"></span>
					<?php } ?>
					<?php if(json_decode($item->display_text)){ ?> 
						<span class = "ca_btn_text"><?php echo $item->link_text;?></span>
					<?php } ?>
				</div>
			</a>
	
		<?php }
		private function renderContent($item){
			if($item->type=="static_text"){
				$this->renderStaticText($item);
			}else if($item->type=="custom"){
				$this->renderCustomButton($item);				
			}else if($item->type=="toggle"){
				$item->class.= " serp-secondary-toggle";
				$this->renderToggle($item);				
			}else if(	$item->type=="fb_share" || 
						$item->type=="twitter_share" || 
						$item->type=="google_share" || 
						$item->type=="pinterest_share" || 
						$item->type=="linkedin_share" || 
						$item->type=="digg_share" || 
						$item->type=="tumblr_share" || 
						$item->type=="reddit_share" || 
						$item->type=="yahoo_share"  
					){
				$this->renderSocialButton($item);	
			}else if($item->type=="count_down"){
				$this->renderTimer($item);	
			}else if($item->type=="fb_messenger"){
				$this->renderMessengerButton($item);
			}else{
				print_r($item->type);
			}
		}		
	};
?>