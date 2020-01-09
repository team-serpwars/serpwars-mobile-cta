<?php
	class FrontendHelper{
		public static function get_social_media_share_link($type){
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

	public static function filterElements($collection,$postID){
		$data = array();
		foreach ($collection as $item) {
			$continue_display = true;
			if($item->exclusive_page=="true"){
				// echo array_search($postID, $item->pages);
				if(count($item->pages)){
					if(array_search($postID, $item->pages)===false){
						$continue_display = false;
					}else{
						// $continue_display = true;
					}
				}
			}
			if($continue_display){
				array_push($data,$item);
			}
		}
		return $data;
	}
	}
?>