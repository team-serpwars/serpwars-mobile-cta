<?php
	class ca_facebook_messenger{
		function __construct(){
			add_action("wp_head",array($this,'render_facebook_messenger'));
		}
    /*
      a:2:{s:8:"fb_appID";s:15:"215656965653707";s:9:"fb_pageID";s:15:"369237983593962";}
    */
		function render_facebook_messenger(){ 
        $options = get_option( 'serpwars-customer-chat-for-facebook_options' );
        // echo "Array Test......";
        $is_minimized = (isset($options['minimized']) && $options['minimized']);

        $facebook_page_id = $options['facebook-page-id'];
        $facebook_app_id = $options['facebook-app-id'];
        
        $theme_color = &$options['theme_color'];
        $logged_in_greeting = &$options['logged_in_greeting'] ?: null;
        $logged_out_greeting = &$options['logged_out_greeting'] ?: null;
        $greeting_dialog_display = &$options['greeting_dialog_display'] ?: 'hide';
        $greeting_dialog_delay = &$options['greeting_dialog_delay'] ?: null;
        $ref = $options['ref'] ?: 'website';
  
        $locale = get_locale() ?: 'en_US';
  
        $attributes = array(
          'page_id' => filter_var($facebook_page_id, FILTER_VALIDATE_INT),
          'greeting_dialog_display' => filter_var($greeting_dialog_display, FILTER_SANITIZE_ENCODED),
          'ref' => filter_var($ref, FILTER_SANITIZE_ENCODED),
        );
        
        // Optional attributes
        if (!empty($theme_color)) $attributes['theme_color'] = $theme_color;
        if (!empty($logged_in_greeting)) $attributes['logged_in_greeting'] = $logged_in_greeting;
        if (!empty($logged_out_greeting)) $attributes['logged_out_greeting'] = $logged_out_greeting;
        if (!empty($greeting_dialog_delay)) $attributes['greeting_dialog_delay'] = $greeting_dialog_delay;

        $data = json_encode($options);

    ?>


<div id='fb-root'></div>
  <script>
 //window.fbAsyncInit = function() {
 //   FB.init({
 //     appId            : '215656965653707',
 //     autoLogAppEvents : true,
 //     xfbml            : true,
 //     version          : 'v3.1'
 //   });
//
 //   FB.CustomerChat.hide();
 // };
//

 




  //   (function(d, s, id) {
  //   var js, fjs = d.getElementsByTagName(s)[0];
  //   if (d.getElementById(id)) return;
  //   js = d.createElement(s); js.id = id;
  //   js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js#xfbml=1&version=v4.5&autoLogAppEvents=1';
  //    // js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
  //   fjs.parentNode.insertBefore(js, fjs);



   

   
  // }(document, 'script', 'facebook-jssdk'));

  // window.fbAsyncInit = function() {
  //   FB.init({
  //     appId            : <?php echo $facebook_app_id; ?>,
  //     autoLogAppEvents : true,
  //     xfbml            : true,
  //     version          : 'v3.2'
  //   });

  //   FB.CustomerChat.hide();
  // };




    (function($){

       $.ajax(
            {
                url: 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js',
                // url: '//connect.facebook.net/en_US/sdk.js',
                dataType: 'script',
                cache: true,
                success:function(script, textStatus, jqXHR)
                {
                    FB.init(
                        {
                            appId      : '<?php echo $facebook_app_id; ?>',
                            xfbml      : true,
                            version     :'v2.8'

                        }
                    );
                     
                    $('#loginbutton,#feedbutton').removeAttr('disabled');
                    // FB.getLoginStatus(updateStatusCallback);
                }
            });


    var checkExist = setInterval(function() {
   if ($('.fb_dialog_content').length) {
      $(".fb_dialog_content").hide()
      $(".fb-customerchat iframe").css({"max-height":"0px"})
      $("a.fb-messenger-toggle").on("click",function(e){ e.preventDefault();jQuery(".fb-customerchat iframe").css({"max-height":"100%"}) })
      clearInterval(checkExist);
   }
}, 100);
         })(jQuery)


    // (function($){
    //   $(".fb-customerchat iframe").css({"max-height":"100%"})
    // })(jQuery)


</script>
<!--   <div class='fb-customerchat'
    attribution="wordpress"
    page_id='369237983593962'
    logged_in_greeting='Welcome'
    logged_out_greeting='Welcome'
  >
</div>   -->


<div class="fb-customerchat"
          <?php foreach ($attributes as $name => $value): ?>
            <?php echo $name; ?>="<?php echo $value; ?>"
          <?php endforeach; ?>>
        </div> 


		<?php }
	};

	new ca_facebook_messenger();
?>