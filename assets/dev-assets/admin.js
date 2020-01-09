
var app ={};
var ca_item_collection = ca_item_collection || [];
window.ca_item_index = 0;
window.$datepicker = {};
window.$timepicker = {};


(function($){






		// tinymce.init({
  // 			selector: '#wp_editor_custom',  // change this value according to your HTML  		
  // 			selection_toolbar: 'bold italic | quicklink h2 h3 blockquote',
  // 			menubar:false,
  //   		statusbar: false,

  //   		 setup:function(ed) {
  //     			 ed.on('keyup', function(e) {
  //          		// console.log('the event object ', e);
  //          		// console.log('the editor object ', ed);
  //          		// console.log('the content ', ed.getContent());
  //          		app._data.message = ed.getContent()
  //      		});
  //  			}
		// });


        


		$('.modal').modal();
		$('select').material_select();

		console.log(fetched_expiration);

    var expiration = fetched_expiration.split(" ");
    var expiration_date = expiration[0];
    var expiration_time = expiration[1];


	    // initialize_events();


      var mydata = {};

      
    if(fetched_data.custom_buttons == undefined || fetched_data.custom_buttons.length == 0 ){

      mydata = fetched_data;  

      mydata.display_options={
          settings:"show_all",
          pages:[],
      };

      ca_item_collection.push({
            type:'custom',
            name:"",
            icon:'fa-rocket',
            link_text: "",
            link_path: "",
            width:20,
            height:"",

            visibility_options:"always_visible",
            visible_on_scroll_value:0,
            text_position:"right",
            style:{
                main:{
                    background:"#000",
                    color:"#000",
                },
                icon:{
                    background:"#fff",
                    color:"#fff",
                },
                text:{
                    background:"#fff",
                    color:"#fff",
                },
                border:{
                    radius:0,
                    width:0,
                    style:'none',
                    color:"#fff"
                },
                class:"",
                id:"",
            }
        });

      mydata = {
        message:'',
        link:'',
        button_text:"",
        success_message:"",
        ok:false,
        current_item:ca_item_collection[0],
        current_item_index:0,
        social_button_style:"ca_radio_default",
        social_buttons:{
          facebook:true,
          google_plus:true,
          twitter:true,
          pinterest:true,
          linkedin:true,
          reddit:true,
          tumblr:true,
        },
        visibility_options:"always_visible",
        visible_on_scroll_value:0,
        visible_on_scroll_speed:500,
        display_options:{
          settings:"show_all",
          pages:[],
        },
        custom_buttons:ca_item_collection,
        appearance:{
          background:"#fff",
          text_color:"#000",
          button_background:"#0f7374",
          button_text_color:"#fff",
          bar_height:120,
          font_size:27,
          opacity:1 
        },
        social_button_style:"none",
        list1:ca_item_collection,
        list2:ca_item_collection,

      }


      if(!mydata.style){
        mydata.style= {
            main:{
              background:"#000",
              color:"#000",
            },

            icon:{
              background:"#fff",
              color:"#fff",
            },
            
            text:{
             background:"#fff",
             color:"#fff",
            },
            
            class:"",
            id:"",           

            line_height:0,
            border:{
                radius:0,
                width:0,
                style:'none',
                color:"#fff"
            }
          }

      }
      
      mydata.current_item_index=0;
      mydata.style.line_height=0;
      mydata.current_item={
        style:mydata.style
      };

      console.log(mydata.current_item);

      // mydata.visibility_options="always_visible";
      // mydata.visible_on_scroll_value=0;
      // mydata.visible_on_scroll_speed=750;
    }else{

        console.log(ca_item_collection[0]);


        mydata = {
        message: fetched_data.message,
        link:'http://youtube.com',
        button_text:"Click Here",
        success_message:"Thank you. We will get back to you soon",
        ok:false,
        current_item:ca_item_collection[0],
        current_item_index:0,
        social_button_style:fetched_data.social_button_style,
        social_buttons:{
          facebook:true,
          google_plus:true,
          twitter:true,
          pinterest:true,
          linkedin:true,
          reddit:true,
          tumblr:true,
        },

        
        visibility_options:"always_visible",
        visible_on_scroll_value:0,
        visible_on_scroll_speed:500,
        display_options:{
          settings:"show_all",
          pages:[],
        },
        list1:ca_item_collection,
        list2:ca_item_collection,
        appearance:{
          background:"#fff",
          text_color:"#000",
          button_background:"#0f7374",
          button_text_color:"#fff",
          bar_height:120,
          font_size:27,
          opacity:1 
        },
        module_settings:fetched_module_settings,
        custom_buttons:ca_item_collection
      };

    }


        mydata.message=data.message;

        mydata.module_settings=fetched_module_settings;
        mydata.expiration_date=expiration_date;
        mydata.expiration_time=expiration_time;



    app = new Vue({
  		el: '#app',
  		data: mydata,
      current_item:mydata.current_item,

      
  		methods:{
  			add: function(){
				this.list.push({name:'Juan'});
			},
        log:function(){
        

        },
        stop:function(){
          console.log("Colorizer Reinitialized!!!!!.");

        },
			replace: function(){
				this.list=[{name:'Edgard'}]
			},
			clone: function(el){
				return {
					name : el.name + ' cloned'
				}
			},
      clearIcon:function(e){
        this.list1[this.current_item_index].icon="";
      },

      removeCurrentItem:function(index){
        $(".mca_mobile_button_panels").find("#tab-1").removeClass("current");
        this.list1.splice(index,1);

      },
  		showPanel:function(e){
        // console.log("Showing Panel..s.");
  				if(e){
  					e.preventDefault();
  					var index = 0;
  					if(!$(e.target).hasClass('ca_nav_item_panel')){
  						index = $(e.target).closest('.ca_nav_item_panel').parent().index(); 						
  					}else{
  						index = $(e.target).parent().index();  						
  					}

            this.current_item = this.list1[index];
            this.current_item_index=index;

            if(!this.current_item.style.line_height){
               this.current_item.style.line_height=0;
            }

            if(!this.current_item.style.border){
              this.current_item.style.border={
                  radius:0,
                  width:0,
                  style:'none',
                  color:"#fff"
                };
            }

            console.log(this.current_item);
            if($(".content_panel").hasClass("current")){
              $(".content_panel").addClass("current");
            }

  					$(".mca_mobile_button_panels > .mca_mobile_button_panel").removeClass("show");
  					$(".mca_mobile_button_panels > .mca_mobile_button_panel").eq(index).addClass("show");



      $('.ca_button_main_bg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                    var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                    var color_val = color.toHexString();
                    console.log(color_val);
                    app._data.list1[app._data.current_item_index].style.main.background = color_val;
                    $("#primary-content").find(".ca_icon_nav_panel").eq(index).find(".ca_nav_item_panel").css({"background":color_val})
                }   
           });

          $('.ca_button_icon_fg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                    var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                    var color_val = color.toHexString();
                    app._data.list1[app._data.current_item_index].style.icon.color = color_val;
                    $("#primary-content").find(".ca_icon_nav_panel").eq(index).find(".fa").css({"color":color_val})
                }   
            });

          $('.ca_button_icon_text_fg ').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                         console.log("Spectrum this...");
                    var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                    var color_val = color.toHexString();
                    app._data.list1[app._data.current_item_index].style.text.color = color_val;

                }   
            });

          $('.ca_button_border').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                    var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                    var color_val = color.toHexString();
                    console.log(color_val);
                    app._data.list1[app._data.current_item_index].style.border.color = color_val;
                    // $("#primary-content").find(".ca_icon_nav_panel").eq(index).find(".ca_nav_item_panel").css({"background":color_val})
                }   
           });



          
  				}
  			}
  		}
	})
        // reinitialize_sortables();
     

      $('ul.tabs li').click(function(){
      var tab_id = $(this).attr('data-tab');

      // console.log(tab_id);
  
      $('ul.tabs li').removeClass('current');
      $('.tab-content').removeClass('current');
  
      $(this).addClass('current');
      $("#"+tab_id).addClass('current');
    })  



          $("#ca_background").spectrum({
        showAlpha: true,
        change: function(color) {
          app._data.appearance.background = color.toHexString(); 
      }
    });
    $("#ca_buttom_bg").spectrum({
        showAlpha: true,
        change: function(color) {
          app._data.appearance.button_background = color.toHexString(); 
      }
        
    });
    $("#ca_text_color").spectrum({
        showAlpha: true,
        change: function(color) {
          app._data.appearance.text_color = color.toHexString(); 
      }
    });
    $("#ca_button_text_color").spectrum({
        showAlpha: true,
        change: function(color) {
          app._data.appearance.button_text_color = color.toHexString(); 
      }
    });



    var initialize_countdown = function(str){
        var clock;

  // Grab the current date
        var currentDate = new Date();

        // Set some date in the future. In this case, it's always Jan 1
        var futureDate  = new Date(str);
        // var futureDate  = new Date(currentDate.getFullYear() + 1, 0, 1);

        // Calculate the difference in seconds between the future and current date
        var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

        // Instantiate a coutdown FlipClock
        clock = $('.clock').FlipClock(diff, {
          clockFace: 'DailyCounter',
          countdown: true
        });

        // console.log("intitalize date "+ str);
    }

    var ca_expiration_date = app._data.expiration_date+" "+ app._data.expiration_time;

  initialize_countdown(ca_expiration_date);

  // Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();




  $("#ca_saveitem").on("click",function(){
   $(this).addClass("disabled");
    var $el = $(this);
    var text = $("#serpwars-component-title").val();
    var message = $(".ca_module_message").val();
    var id = $("serpwars-component-id").val();
    var content = app._data;

    var module_settings = $(".module_settings_tab").serializeArray();
    var expiration = jQuery($datepicker.get(0)).val()+" "+ jQuery($timepicker.get(0)).val();
    if(text!=""){           
      $.post(ajaxurl,{
        action:"ca_saveitem",
        title:text,
        message:message,
        content:content,
        module_settings:module_settings,
        expiration:expiration
      },
      function(data){

        if(data){
          $.toast({
              text: 'Item has been Added',
              position: 'bottom-right',
              showHideTransition: 'fade',
              afterHidden: function () {
                 // location.reload();
                  var path = location.href.split("=")[0];
                  path += "=ca_add_new_mobile_elements&id="+data;
                  location.href = path;
              }
          })
        }
      })
    }else{
      $(this).removeClass("disabled");
      $.toast({
              text: 'Title for this module is required',
              position: 'bottom-right',
              showHideTransition: 'fade',
              afterHidden: function () {
              }
          })
    }
  })

  $("#ca_updateitem").on("click",function(){
    // $(this).addClass("disabled");
    var $el = $(this);
    var text = $("#serpwars-component-title").val();
    var message = $(".ca_module_message").val();
    var id = $("serpwars-component-id").val();
    var content = app._data;

    var module_settings = $(".module_settings_tab").serializeArray();
    var expiration = jQuery($datepicker.get(0)).val()+" "+ jQuery($timepicker.get(0)).val();

    console.log(module_settings);
    // if(text!=""){     
      // $.post(ajaxurl,{action:"ca_updateitem",title:text,message:message,content:content,module_settings:module_settings,expiration:expiration,id:id},function(data){
      //   console.log(data);
      //     $el.removeClass("disabled");
      //   if(data!=0){
      //     $.toast({
      //         text: 'Item has been Updated',
      //         position: 'bottom-right',
      //         showHideTransition: 'fade',
      //         afterHidden: function () {
      //            // location.reload();
      //         }
      //     })
      //   }else{
      //      $.toast({
      //         text: 'Unexpected Error Occured',
      //         position: 'bottom-right',
      //         showHideTransition: 'fade',
      //         afterHidden: function () {

      //         }
      //     })
      //   }
      // })
    // }
  })

  $(".ca_remove_item").on("click",function(){
    $(this).addClass("disabled");
    var id = $(this).data('item-id');
    var $el = $(this);
    

  })

  
 

     $('.ca_button_main_bg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                    var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                    var color_val = color.toHexString();
                    console.log(index);
                    // app._data.list1[app._data.current_item_index].style.main.background = color_val;
                    app._data.list1[0].style.main.background=color_val;
                    $("#primary-content").find(".ca_icon_nav_panel").eq(index).find(".ca_nav_item_panel").css({"background":color_val})
                }   
           });

          $('.ca_button_icon_fg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                    var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                    var color_val = color.toHexString();
                    // app._data.list1[app._data.current_item_index].style.icon.color = color_val;
                    app._data.list1[0].style.main.background=color_val;
                    $("#primary-content").find(".ca_icon_nav_panel").eq(index).find(".fa").css({"color":color_val})
                }   
            });

          $('.ca_button_icon_text_fg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                    console.log("Spectrum this...");
                    var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                    var color_val = color.toHexString();
                    // app._data.list1[app._data.current_item_index].style.text.color = color_val;
                    app._data.list1[0].style.main.background=color_val;
                }   
            });   

          $('.ca_button_border').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                    var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                    var color_val = color.toHexString();
                    console.log(color_val);
                    app._data.list1[app._data.current_item_index].style.border.color = color_val;
                    // $("#primary-content").find(".ca_icon_nav_panel").eq(index).find(".ca_nav_item_panel").css({"background":color_val})
                }   
           });

              $('.dropdown-button').dropdown({
      inDuration: 300,
      outDuration: 225,
      constrainWidth: false, // Does not change width of dropdown to that of the activator
      hover: true, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: false, // Displays dropdown below the button
      alignment: 'left', // Displays dropdown with edge aligned to the left of button
      stopPropagation: false // Stops event propagation
    }
  );
         

 window.$datepicker =   $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    format: 'yyyy-mm-dd', 
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: true, // Close upon selecting a date,
    onStop:function(date){
      console.log(date);
    }
  }).on("change",function(e){
    e.preventDefault();
    app._data.expiration_date = jQuery($datepicker.get(0)).val();
    render_countdown();
  });


  window.$timepicker = $('.timepicker').pickatime({
    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Clear', // text for clear-button
    canceltext: 'Cancel', // Text for cancel-button
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} //Function for after opening timepicker
  }).on("change",function(e){
    e.preventDefault();
    app._data.expiration_time = jQuery($timepicker.get(0)).val();
    render_countdown();
  });


  $('select').material_select();


  $('body').on("change",".datepicker,.timepicker",function(){
     var day = $(".datepicker").val(),
     time = $(".timepicker").val();
     str = day+" "+time;
     initialize_countdown(str);
  })
    // reinitialize_colorizer();


    //Accordion
  $(".ca_accordion_panel_title").on("click",function(e){
    var $el = $(this);
    e.preventDefault();
    var $main = $el.closest(".ca_accordion_panel_wrap");
    $main.find(".ca_accordion_panel_content.show").removeClass("show");

    var $parent = $el.parent();
    $parent.find(".ca_accordion_panel_content").addClass("show");
  })

  // Module Settings Tab
  $(".module_settings_tab_nav").on("click","a",function(e){
    e.preventDefault();
    $el = $(this);

    $(".module_settings_tab_nav").find(".active").removeClass("active");
    $el.addClass("active");

    var tab_data = "."+$el.data("tab");

    $(".module_settings_tab").find(".show").removeClass("show");

    $(tab_data).addClass("show");

  })



   function render_countdown(){


  $('.ca_countdown').countdown(app._data.expiration_date+' '+app._data.expiration_time, function(event) {
      $(this).html(event.strftime(`<span class="weeks" v-show="module_settings.display_weeks">
                <span class="value">%w</span>
                <span class="unit">Weeks</span>
            </span>
            <span class="days">
                <span class="value">%d</span>
                <span class="unit">Days</span>
            </span>
            <span class="hours">
                <span class="value">%H</span>
                <span class="unit">Hours</span>
            </span>
            <span class="minutes">
                <span class="value">%M</span>
                <span class="unit">Minutes</span>
            </span>
            <span class="seconds">
                <span class="value">%S</span>
                <span class="unit">Seconds</span>
            </span>`));
      // $(this).html(event.strftime('%w <span style="color:red;">weeks</span> %d days %H hours %M  minutes %S seconds'));
  });

   }

   render_countdown();


   $(".ca_icon_filter").on("keyup",function(e){
      e.preventDefault();
      var text = $(this).val();
      $(".fa-field-modal-icons").find(".fa-field-modal-icon-holder").hide();
      if(text!=""){
        $(".fa-field-modal-icons").find("i[class*='"+text+"']").closest(".fa-field-modal-icon-holder").show();        
      }else{
        $(".fa-field-modal-icons").find(".fa-field-modal-icon-holder").show();
      }
   })

})(jQuery)