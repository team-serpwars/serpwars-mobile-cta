    var wizard = {}
    wizard.i18n = {};
    wizard.i18n.tooltips = {};
    wizard.i18n.tooltips.removeStep = "Remove Step";
    wizard.i18n.icon_label = "Select Icon";
    wizard.i18n.tooltips.icon_label = "Select Icon";
    wizard.i18n.link_text = "Link Text";
    wizard.i18n.tooltips.link_text = "Set Link Text";
    wizard.i18n.link_path  = "Link URL";

    var wizard_container = "#primary-content";
    var elements_container = "#fw-elements-container";

    var ca_item_collection = [];



    var fetched = (data.fetched) ? JSON.parse(data.fetched) : {};
    var message = (data.message) ? data.message : '';
    var fetched_data = fetched;

    var fetched_module_settings = (data.module_settings) ? JSON.parse(data.module_settings) : JSON.parse('{}');
    var fetched_expiration = (data.expiration) ? data.expiration : '{}';


    fetched = fetched.custom_buttons;

    console.log(JSON.parse(data.module_settings) );

        var fetched_module = {
            'expiration_date':fetched_expiration,
            'display_message':(fetched_module_settings.display_message) ? true: false,
            'enable_expiration':(fetched_module_settings.display_for_limited_time) ? true: false,
            'display_timer':(fetched_module_settings.display_timer) ? true: false,
            'display_desktop':(fetched_module_settings.display_desktop) ? true: false,
            'display_tablet':(fetched_module_settings.display_tablet) ? true: false,
            'display_mobile':(fetched_module_settings.display_mobile) ? true: false,
            'display_close':(fetched_module_settings.display_close) ? true: false,
            'display_weeks':false,
            'display_days':true,
            'display_hours':true,
            'display_minutes':true,
            'display_seconds':true,
        };
    fetched_module_settings = fetched_module;
    // console.log(fetched_module_settings);

    // var fetched = JSON.parse('[{"icon":"fa-facebook","link_text":"http://rocket.com","link_path":"#","style":{"main":{"background":"#17c43e","color":"#000"},"icon":{"background":"#fff","color":"#ffffff"},"text":{"background":"#fff","color":"#000"},"class":"","id":""},"counter":0},{"icon":"fa-twitter","link_text":"","link_path":"http://facebook.com","style":{"main":{"background":"#921f99","color":"#000"},"icon":{"background":"#fff","color":"#ffffff"},"text":{"background":"#fff","color":"#000"},"class":"","id":""},"counter":1},{"icon":"fa-calendar","link_text":"","link_path":"http://google.com","style":{"main":{"background":"#ff0000","color":"#000"},"icon":{"background":"#fff","color":"#ffffff"},"text":{"background":"#fff","color":"#000"},"class":"","id":""},"counter":2},{"icon":"fa-pinterest","link_text":"","link_path":"http://twitter.com","style":{"main":{"background":"#4a8ebb","color":"#000"},"icon":{"background":"#fff","color":"#ffffff"},"text":{"background":"#fff","color":"#000"},"class":"","id":""},"counter":3},{"icon":"fa-envelope","link_text":"","link_path":"#","style":{"main":{"background":"#ffef00","color":"#000"},"icon":{"background":"#fff","color":"#ffffff"},"text":{"background":"#fff","color":"#000"},"class":"","id":""},"counter":4},{"icon":"fa-rocket","link_text":"","link_path":"#","style":{"main":{"background":"#ec8705","color":"#000"},"icon":{"background":"#fff","color":"#ffffff"},"text":{"background":"#fff","color":"#000"},"class":"","id":""},"counter":5}]');
    // var fetched = JSON.parse('[{"icon":"fa-facebook","link_text":"facebook","link_path":"facebook.com","style":{"main":{"background":"#1e73be","color":"#000"},"icon":{"background":"#1e73be","color":"#ffffff"},"text":{"background":"#ffffff","color":"#000"},"class":"","id":""},"counter":0},{"icon":"fa-envelope","link_text":"Email","link_path":"noobertx@gmail.com","style":{"main":{"background":"#eeee22","color":"#000"},"icon":{"background":"#eeee22","color":"#ffffff"},"text":{"background":"transparent","color":"#000"},"class":"","id":""},"counter":1},{"icon":"fa-twitter","link_text":"twitter","link_path":"twitter.com","style":{"main":{"background":"#ea2567","color":"#000"},"icon":{"background":"#ea2567","color":"#ffffff"},"text":{"background":"transparent","color":"#000"},"class":"","id":""},"counter":2}]');

(function($){


    var e = $;
    // function change_model_property(property,value){
    //     var model = {};
    //     return model["property"] = value;
    // }
    function init_step_model() {
        return {
            type:"custom",
            name:"",
            icon: "fa-rocket",
            link_text: "",
            link_path: "",
            width:'20',
            height:"",
            text_position:"right",
            visibility_options:"always_visible",
            visible_on_scroll_value:0,
             style:{
                main:{
                    background:"#fff",
                    color:"#000",
                },
                icon:{
                    background:"#fff",
                    color:"#000",
                },
                text:{
                    background:"#fff",
                    color:"#000",
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
        }
    }

    /*
      <li><a href="#!" data-item-type="custom">Custom</a></li>
    <li><a href="#!" data-item-type="facebook"><i class = "fa fa-facebook"></i> Facebook</a></li>
    <li><a href="#!" data-item-type="twitter"><i class = "fa fa-twitter"></i> Twitter</a></li>
    <li><a href="#!" data-item-type="google_plus"><i class = "fa fa-google-plus"></i> Google+</a></li>
    <li><a href="#!" data-item-type="pinterest"><i class = "fa fa-pinterest"></i> Pinterest</a></li>
    <li><a href="#!" data-item-type="linked_in"><i class = "fa fa-linked-in"></i> Linked In</a></li>
    <li><a href="#!" data-item-type="buffer"><i class = "fa fa-buffer"></i> Buffer</a></li>
    <li><a href="#!" data-item-type="digg"><i class = "fa fa-digg"></i> Digg</a></li>
    <li><a href="#!" data-item-type="tumblr"><i class = "fa fa-tumblr"></i> Tumblr</a></li>
    <li><a href="#!" data-item-type="reddit"><i class = "fa fa-reddit"></i> Reddit</a></li>
    <li><a href="#!" data-item-type="yahoo"><i class = "fa fa-yahoo"></i> Yahoo</a></li>
    */

    var ca_social_media_collection ={
        "facebook":{
            icon:"fa-facebook"
        },
        "twitter":{
            icon:"fa-twitter"
        },
        "google_plus":{
            icon:"fa-google-plus"
        },
        "pinterest":{
            icon:"fa-pinterest"
        },
        "linked_in":{
            icon:"fa-linkedin"
        },
        "buffer":{
            icon:"fa-buffer"
        },
        "digg":{
            icon:"fa-digg"
        },
        "tumblr":{
            icon:"fa-tumblr"
        },
        "reddit":{
            icon:"fa-reddit"
        },
        "yahoo":{
            icon:"fa-tumblr"
        }
    }


    function init_social_button(type) {
        return {
            type:type,
            name:"",
            icon:ca_social_media_collection[type].icon,
            link_text: "",
            link_path: "",
            width:'20',
            height:"",
            text_position:"right",
            visibility_options:"always_visible",
            visible_on_scroll_value:0,
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
        }
    }

        function t() {
        // "console" in window && console.log.apply(console, arguments)
    }

     function K(a) {
        var i = e(this);
        t("titleOnChangeU", i.val()), i.closest(".postbox").find("h1 > span").html(i.val())
    }

    function render_item(data) {

        var str = '<div class="postbox">';
        str += '<div class="fw-movediv hndle ui-sortable-handle"><i class="fa fa-arrows"></i></div>';
        str += '<h1 class="fw-step-h1 hndle ui-sortable-handle"><span class = "fa '+data.icon+'">'; 
        str +=  "</span></h1>";
        str += '<div class="fw-step-controls">'
        str += '<i class="fa fa-files-o fw-duplicate-step" title="duplicate step" aria-hidden="true"></i>';
        // str += '<i class="fa fa-caret-up fw-toggle-step" aria-hidden="true"></i>'; 
        str += '<i class="fa fa-remove fw-remove-step" title="' + wizard.i18n.tooltips.removeStep + '" aria-hidden="true"></i>'; 
        str += "</div>"; 
        str += '<div class="fw-clearfix"></div>'; 
        str += render_item_wrap(data); 
        str += '<div class="fw-clearfix"></div>'; 
        str += "</div>";


        return str;
    }


     function render_item_wrap(data, t) {
        var a = "fw-headline-" + t,
            i = "fw-copy-text-" + t,
        str = '<div class="fw-step">';    
        // str += '<ul class="fw-step-views-nav"><li><a href ="#" class="btn fw-show-content">Content</a><a href ="#" class="btn ca-show-style-panel">Advance</a></li></ul>';
        str += '<div class="form-wrap">';

        // class="ca-app-icon-wrapper"


        str += '<div class="row">';
        str += '<div class="col m12">';
        str += '<p style="padding:10px 0;"><b>Settings</b></p>';
        str += '</div">';
        str += '<div class="col m12">';
        str +=  ' <div class="fa-field-metabox">';
        str +=  '          <div class="fa-field-current-icon">';
        str +=  '            <div class="icon">';
                //<?php if ( $icon ) : ?>';
                if(data.icon!=""){
                    str+='                <i class="fa '+data.icon+'"></i>';
                }
                //<?php endif; ?>';
        str += '            </div>';
        str += '            <div class="delete ">&times;</div>';
        str += '          </div>';
        str += '          <input type="hidden" name="fa_field_icon" id="fa_field_icon" class = "fw-step-title" value="'+data.icon+'">';
        str += '          <button class="button-primary add-fa-icon">Set Icon</button>';
        str += '        </div>';
        str += '        </div>';


         str += '<div class="col m12">';


        str += '<div class="input form-field">' ;
        str += '<label for="' + a + '"><b>' + wizard.i18n.link_text + "</b>" ;
        str += '<i class="fa fa-info-circle" aria-hidden="true" title="' + wizard.i18n.tooltips.link_text + '"></i></label>' ;
        str += '<input type="text" class="ca_link_text_field" value="' + data.link_text + '" ></input>' ;
        str += "</div>" ;
        str += '<div class="input form-field">' ;
        str += '<label for="' + i + '"><b>' + wizard.i18n.link_path + "</b>" ;
        str += '<i class="fa fa-info-circle" aria-hidden="true" title="' + wizard.i18n.link_path + '"></i></label>' ;
        str += '<input type="text" class="ca_link_path_field" value="' + data.link_path + '"></input>' ;
        str += "</div>" ;
       


        var style = data.style;

        if(style){

        str += "<div class = 'row'>";


        str += "<div class = 'col m4'>";
        str += "<p><b>Background</b></p>";
        str += "<div class='ca_field_wrap input-field'>";
        str += "<input id='ca-main-bg-color' type = 'text' class='jscolor ca_color-field ca_button_main_bg' value='"+style.main.background+"'>";
        str += "</div>";
        // str += "<div class='ca_field_wrap input-field'>";
        // str += "<input id='ca-main-fg-color'  type = 'text' class='jscolor ca_color-field ca_button_main_fg' value='"+style.main.color+"'><label for='ca-main-fg-color'>Icon Color </label>";
        // str += "</div>";
        str += "</div>";



        str += "<div class = 'col m4'>";
        str += "<p><b>Icon</b></p>";

        // str += "<div class='ca_field_wrap input-field'>";
        // str += "<input id='ca-icon-bg-color' type = 'text' class='jscolor ca_color-field ca_button_icon_bg' value='"+style.icon.background+"'><label for='ca-icon-bg-color'>Background Color </label>";
        // str += "</div>";
        str += "<div class='ca_field_wrap input-field'>";
        str += "<input id='ca-icon-fg-color' type = 'text' class='jscolor ca_color-field ca_button_icon_fg' value='"+style.icon.color+"'>";
        str += "</div>";
        str += "</div>";

        str += "<div class = 'col m4'>";
        str += "<p><b>Text</b></p>";

        // str += "<div class='ca_field_wrap input-field'>";
        // str += "<input id='ca-text-bg-color' type = 'text' class='jscolor ca_color-field ca_button_icon_text_bg' value='"+style.text.background+"'><label for='ca-text-bg-color'>Background Color </label>";
        // str += "</div>";
        str += "<div class='ca_field_wrap input-field'>";
        str += "<input id='ca-text-fg-color' type = 'text' class='jscolor ca_color-field ca_button_icon_text_fg' value='"+style.text.color+"'>";
        str += "</div>";
        str += "</div>";
        str += '</div>';
        }

        str += "</div>";        
        str += '</div>';
        str += '</div>';



        return str;
    }

    function move(arr, old_index, new_index) {
    while (old_index < 0) {
        old_index += arr.length;
    }
    while (new_index < 0) {
        new_index += arr.length;
    }
    if (new_index >= arr.length) {
        var k = new_index - arr.length;
        while ((k--) + 1) {
            arr.push(undefined);
        }
    }
     arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);  
   return arr;
}


function array_move(arr, old_index, new_index) {
    if (new_index >= arr.length) {
        var k = new_index - arr.length + 1;
        while (k--) {
            arr.push(undefined);
        }
    }
    arr.splice(new_index, 0, arr.splice(old_index, 1)[0]);
    return arr; // for testing
};



    // function initialize_sortables() {
    //     $(".meta-box-sortables").sortable({
    //         opacity: .6,
    //         revert: !0,
    //         cursor: "move",
    //         // handle: ".hndle",
    //         tolerance: "pointer",
    //         placeholder: "fw-block-placeholder",
    //         start: function(t, a) {
    //             var i = e(a.item).height();
    //             $(".fw-block-placeholder").height(i)
    //         },
    //         update: function(t, i) {
    //             console.log(t,i);
    //             $("sortables update", t, i), $(i.item).removeAttr("style"), initialize_sortables(), initialize_tooltips()
    //         }
    //     }), $(".fw-step-part .inside").sortable({
    //         opacity: .6,
    //         cursor: "move",
    //         connectWith: ".connectedSortable",
    //         handle: ".fw-block-hndle",
    //         tolerance: "intersect",
    //         placeholder: "fw-block-placeholder",
    //         revert: 100,
    //         start: function(t, a) {
    //             var i = e(a.item).height(),
    //                 l = $(".fw-block-placholder");
    //             l.height(i), l.attr("data-type", a.item.attr("data-type"))
    //         },
    //         update: function(t, i) {
    //             a("block sortables update", t, i);
    //               console.log(t,i);
    //             var r = e(i.item).attr("data-type");
    //             $(i.item).is(".fw-draggable-block") && ("registration" === r && validate_registration() ? (l("Only one registration block allowed!", !1), $(i.item).remove()) : $(i.item).replaceWith($(render_form_element({
    //                 type: r,
    //                 label: ""
    //             })))), initialize_sortables(), initialize_tooltips(), initialize_step_events(), msfp && setupConditionals()
    //         }
    //     }), $(".fw-parts-container").sortable({
    //         opacity: .6,
    //         cursor: "move",
    //         connectWith: ".fw-parts-container",
    //         handle: ".fw-section-hndle",
    //         tolerance: "intersect",
    //         placeholder: "fw-section-placeholder",
    //         revert: 100,
    //         start: function(t, a) {
    //             var i = e(a.item).height();
    //             $(".fw-section-placeholder").height(i)
    //         },
    //         update: function(e, t) {
    //             console.log(e,t);
    //             initialize_sortables(); initialize_tooltips(); initialize_step_events();
    //         }
    //     });
    //         $(elements_container + " .fw-draggable-block").draggable({
    //         connectToSortable: ".fw-step-part .inside",
    //         revert: "invalid",
    //         helper: "clone",
    //         cursor: "move"
    //     }), $(wizard_container).find(".fw-step-title").on("change input", K)


    //         var from_index = 0;
    //           $(".meta-box-sortables").sortable({
    //         opacity: .6,
    //         revert: !0,
    //         cursor: "move",
    //         // handle: ".hndle",
    //         tolerance: "pointer",
    //         placeholder: "fw-block-placeholder",
    //         start: function(t, a) {
    //             var i = $(a.item).height();
    //             from_index = $(a.item).index();
    //             $(".fw-block-placeholder").height(i)
    //              i = $(a.item).width();
    //             $(".fw-block-placeholder").width(i);
                
    //         },
    //         update: function(t, i) {
    //               var to_index = $(i.item).index();
    //               var myitem = ca_item_collection[to_index];
    //               move(ca_item_collection,from_index,to_index);

    //               $(".mca_mobile_button_panels").html("");
    //               $(".mca_mobile_button_panels").find(".mca_mobile_button_panel").removeClass("show");
    //               render_panels(ca_item_collection);
    //               $(".mca_mobile_button_panels").find(".mca_mobile_button_panel").eq(to_index).addClass("show")
    //               // var elm = $(".mca_mobile_button_panel").eq((i.item).index()).html();

    //               // $(".mca_mobile_button_panel").eq((i.item).index()).innerHTML = $(".mca_mobile_button_panel").eq(from_index).html();
    //               // $(".mca_mobile_button_panel").eq(from_index).innerHTML = elm;
    //               //ca_icon_nav_panel
    //             $("sortables update", t, i), $(i.item).removeAttr("style"), initialize_sortables(), initialize_tooltips()

    //             initialize_colorizer();
    //         }
    //     })
    // }


    function ne(){}
 function initialize_tooltips() {
        
        $(".fa-info-circle").tooltip(), $(".fw-remove-step").tooltip(), $(".fw-duplicate-step").tooltip(), $(".fw-remove-part").tooltip(), $(".fw-remove-block").tooltip(), $(".hndle.ui-sortable-handle").tooltip()
    }


    function create_item(item) {
        item.counter = ca_item_collection.length;
        app._data.list1.push(item);
        // var a = $(".fw-step").length;
        // // if (a < 5 || msfp)
        //     // if (a < 10) {
        //         var i = $(render_icon_nav_item(item));
        //         // var i = $(render_item(item));
        //         i.appendTo($(wizard_container).find(".meta-box-sortables")),initialize_sortables(), ne(), a > 0 && $("html, body").animate({
        //             scrollTop: e(document).height() - i.height() - 180
        //         }, 500)

        //         i = $(render_icon_panel_item(item));

        //         i.appendTo($(wizard_container).find(".mca_mobile_button_panels"))
            // } else show_message(wizard.i18n.alerts.onlyTen, !1);
        // else show_message(wizard.i18n.alerts.onlyFive, !1)
        // initialize_colorizer();

    }

    function initialize_icon_picker(){
//          $('.ca_icon_selection').iconpicker();

//                $('.ca_icon_selection').on('iconpickerSelected', function(event){
//   /* event.iconpickerValue */
//                 var icon = event.iconpickerValue;
//                 var index =  $(this).closest(".mca_mobile_button_panel").index();
//                 ca_item_collection[index].icon = icon;

//                 $(".meta-box-sortables").find(".ca_icon_nav_panel").eq(index).find("a").html("<span class = ' fa "+icon+"'></span>");
// });
    }

    function initialize_colorizer(){
          $('.ca_button_main_bg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                    var index =  $(this).closest(".mca_mobile_button_panel").index();
                    var color_val = color.toHexString();
                    ca_item_collection[index].style.main.background = color_val;
                    $("#primary-content").find(".ca_icon_nav_panel").eq(index).find("a").css({"background-color":color_val})
                }   
           });
          console.log("Initialize Color Picker");
          // $('.ca_button_main_fg').spectrum({
          //       preferredFormat: "hex",
          //       showAlpha: true,
          //       showInput: true,
          //       change: function(color) {
          //           var index =  $(this).closest(".mca_mobile_button_panel").index();
          //           var color_val = color.toHexString();
          //           ca_item_collection[index].style.main.color = color_val;
          //           $("#primary-content").find(".ca_icon_nav_panel").eq(index).find("a").css({"color":color_val})
          //       }   
          //   });

          // $('.ca_button_icon_bg').spectrum({
          //       preferredFormat: "hex",
          //       showAlpha: true,
          //       showInput: true,
          //       change: function(color) {
          //           var index =  $(this).closest(".mca_mobile_button_panel").index();
          //           var color_val = color.toHexString();
          //           ca_item_collection[index].style.icon.background = color_val;
          //           $("#primary-content").find(".ca_icon_nav_panel").eq(index).find(".fa").css({"background-color":color_val})
          //       }   
          //  });

          $('.ca_button_icon_fg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                    var index =  $(this).closest(".mca_mobile_button_panel").index();
                    var color_val = color.toHexString();
                    ca_item_collection[index].style.icon.color = color_val;
                    $("#primary-content").find(".ca_icon_nav_panel").eq(index).find(".fa").css({"color":color_val})
                }   
            });

          // $('.ca_button_icon_text_bg ').spectrum({
          //       preferredFormat: "hex",
          //       showAlpha: true,
          //       showInput: true,
          //       change: function(color) {
          //           var index =  $(this).closest(".mca_mobile_button_panel").index();
          //           var color_val = color.toHexString();
          //           ca_item_collection[index].style.text.background = color_val;
          //       }   
          //  });

          $('.ca_button_icon_text_fg ').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                change: function(color) {
                    var index =  $(this).closest(".mca_mobile_button_panel").index();
                    var color_val = color.toHexString();
                    ca_item_collection[index].style.main.color = color_val;
                }   
            });
       
    }

    function initialize_events() {

       
        $("body").on("click","#dropdown1 a",function(e){
            e.preventDefault();
            var data = $(this).data("item-type");
            console.log(data);
            if(data=="custom"){
                create_item(init_step_model());
            }else{
                create_item(init_social_button(data));
            }

             initialize_icon_picker();

             console.log("Initialize Color Picker");

               $('.ca_button_main_bg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,

                change: function(color) {
                     var color_val = color.toHexString();
                     $(this).val(color_val)
                }
             
           });

          $('.ca_button_icon_fg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                // change: function(color) {
                //     var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                //     var color_val = color.toHexString();
                //     app._data.list1[index].style.icon.color = color_val;
                //     $("#primary-content").find(".ca_icon_nav_panel").eq(index).find(".fa").css({"color":color_val})
                // }   
            });

          $('.ca_button_icon_text_fg ').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                // change: function(color) {
                //     var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                //     var color_val = color.toHexString();
                //     app._data.list1[index].style.main.color = color_val;
                // }   
            });


        })
        $("body").on("click","#ca-add-button",function(e){
            e.preventDefault();
            e.stopPropagation();

            create_item(init_step_model());
            
            initialize_icon_picker();


        $('.ca_button_main_bg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,

                change: function(color) {
                     var color_val = color.toHexString();
                     $(this).val(color_val)
                }
             
           });

          $('.ca_button_icon_fg').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                // change: function(color) {
                //     var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                //     var color_val = color.toHexString();
                //     app._data.list1[index].style.icon.color = color_val;
                //     $("#primary-content").find(".ca_icon_nav_panel").eq(index).find(".fa").css({"color":color_val})
                // }   
            });

          $('.ca_button_icon_text_fg ').spectrum({
                preferredFormat: "hex",
                showAlpha: true,
                showInput: true,
                // change: function(color) {
                //     var index =  $(this).closest(".mca_mobile_button_panel").parent().index();
                //     var color_val = color.toHexString();
                //     app._data.list1[index].style.main.color = color_val;
                // }   
            });
            
        });

        // console.log("Reinitialize Colorizer hehe..");

       
    }

         function render_advance_wrap(data){
        $wrap = $("<div>",{
            class:"fw-advance-form-wrap"
        });
           $wrap.append($("<div>",{
                class:'input form-field',
            }).append($("<label>",{
                text:"Class Name"
            }).append($("<input>",{
                type:"text",            
                name:"fw-step-classname",            
                class:"fw-step-classname",            
                value:data.extra_class
            }))));

             $wrap.append($("<div>",{
                class:'input form-field',
            }).append($("<label>",{
                text:"Image path"
            }).append($("<input>",{
                type:"text",            
                name:"fw-step-image",            
                class:"fw-step-image",            
                value:data.image
            }))));



        return $wrap.html();
    }

        function render_icon_nav_item(data) {

        var str = "";
        // console.log(data.style);    

        if(data.style){            
            str = "<div class = 'ca_icon_nav_panel ca_icon_nav_panel_"+data.counter+"'>";
            str += "<a href = '#' style='background:"+data.style.main.background+";color:"+data.style.main.color+"'><span class='fa "+data.icon+"' style='color:"+data.style.icon.color+"'></span></a>";
            str += "</div>";
        }

        return str;
    }

    function render_panels(collection){
        for(items in collection){
            $(wizard_container).find(".mca_mobile_button_panels").append($(render_icon_panel_item(collection[items])));
        }

        initialize_icon_picker();
    }

    function render_icon_panel_item(data){
        var str = '<div class="mca_mobile_button_panel">';
        str += '<div class="postbox">';
        str += '<div class="fw-step-controls">'
        str += '<i class="fa fa-remove fw-remove-step" title="' + wizard.i18n.tooltips.removeStep + '" aria-hidden="true"></i>'; 
        // str += '<i class="fa fa-caret-up fw-toggle-step" aria-hidden="true"></i>'; 
        // str += '<i class="fa fa-files-o fw-duplicate-step" title="duplicate step" aria-hidden="true"></i>';
        str += "</div>"; 
        str += '<div class="fw-clearfix"></div>'; 
        str += render_item_wrap(data); 
        str += '<div class="fw-clearfix"></div>'; 

        str += '<div class="form-wrap-style">'+render_advance_wrap(data.style)+'</div>';
        str += "</div>";
        str += "</div>";

        return str;
    }
     function render_advance_wrap(style){

        var str = "<div class = 'row'>";


        // str += "<div class = 'col m3'>";
        // str += "<p><b>Main Element</b></p>";
        // str += "<div class='ca_field_wrap input-field'>";
        // str += "<input id='ca-main-bg-color' type = 'text' class='jscolor ca_color-field ca_button_main_bg' value='"+style.main.background+"'><label for='ca-main-bg-color'>Background Color </label>";
        // str += "</div>";
        // str += "<div class='ca_field_wrap input-field'>";
        // str += "<input id='ca-main-fg-color'  type = 'text' class='jscolor ca_color-field ca_button_main_fg' value='"+style.main.color+"'><label for='ca-main-fg-color'>Icon Color </label>";
        // str += "</div>";
        // str += "</div>";



        // str += "<div class = 'col m3'>";
        // str += "<p><b>Icon</b></p>";

        // str += "<div class='ca_field_wrap input-field'>";
        // str += "<input id='ca-icon-bg-color' type = 'text' class='jscolor ca_color-field ca_button_icon_bg' value='"+style.icon.background+"'><label for='ca-icon-bg-color'>Background Color </label>";
        // str += "</div>";
        // str += "<div class='ca_field_wrap input-field'>";
        // str += "<input id='ca-icon-fg-color' type = 'text' class='jscolor ca_color-field ca_button_icon_fg' value='"+style.icon.color+"'><label for='ca-icon-fg-color'>Icon Color </label>";
        // str += "</div>";
        // str += "</div>";

        // str += "<div class = 'col m3'>";
        // str += "<p><b>Text</b></p>";

        // str += "<div class='ca_field_wrap input-field'>";
        // str += "<input id='ca-text-bg-color' type = 'text' class='jscolor ca_color-field ca_button_icon_text_bg' value='"+style.text.background+"'><label for='ca-text-bg-color'>Background Color </label>";
        // str += "</div>";
        // str += "<div class='ca_field_wrap input-field'>";
        // str += "<input id='ca-text-fg-color' type = 'text' class='jscolor ca_color-field ca_button_icon_text_fg' value='"+style.text.color+"'><label for='ca-text-fg-color'>Icon Color </label>";
        // str += "</div>";
        // str += "</div>";

        str += "</div>";

        $wrap = $("<div>",{
            class:"ca-style-wrap"
        }).html(str);



        return $wrap.html();
    }








    $(".meta-box-sortables").on("click",".ca_icon_nav_panel a",function(e){
        e.preventDefault();
        console.log("Showing properties");
        var index = $(this).closest(".ca_icon_nav_panel").index();



        $(".mca_mobile_button_panel").removeClass("show");
        $(".mca_mobile_button_panel").eq(index).addClass("show");
    })





        // $(".meta-box-sortables").sortable({
        //     opacity: .6,
        //     revert: !0,
        //     cursor: "move",
        //     // handle: ".hndle",
        //     tolerance: "pointer",
        //     placeholder: "fw-block-placeholder",
        //     start: function(t, a) {
        //         var i = $(a.item).height();
        //         $(".fw-block-placeholder").height(i)
        //          i = $(a.item).width();
        //         $(".fw-block-placeholder").width(i)
        //     },

        //     update: function(t, i) {
        //         console.log(t);
        //         $("sortables update", t, i), $(i.item).removeAttr("style"), initialize_sortables(), initialize_tooltips()

        //         initialize_colorizer();;
        //     }
        // })

        $("body").on("click",".ca-show-style-panel",function(e){
            e.preventDefault();

            console.log("Showing Style Panel");
            $(this).closest(".fw-step").find(".form-wrap").hide();
            $(this).closest(".fw-step").find(".form-wrap-style").show();

            
        }).on("click",".fw-show-content",function(e){
            e.preventDefault();
             $(this).closest(".fw-step").find(".form-wrap").show();
            $(this).closest(".fw-step").find(".form-wrap-style").hide();
        }).on("keyup",".ca_link_text_field",function(){
            var value = $(this).val();
            var index = $(this).closest(".mca_mobile_button_panel").index();
            app._data.list1[index].link_text = value;
        }).on("keyup",".ca_link_path_field",function(){
            var value = $(this).val();
            var index = $(this).closest(".mca_mobile_button_panel").index();
            app._data.list1[index].link_path = value;
        }).on("change",".fw-step-title",function(){
            var value = $(this).val();
            var index = $(this).closest(".mca_mobile_button_panel").index();
            app._data.list1[index].icon = value;

            console.log(value);
        }).on("click",".ca_save_btn",function(e){
            e.preventDefault();
            $.post(ajaxurl,{action:'ca_save_changes',collection:ca_item_collection},function(data){
                location.reload();
            })
        }).on("click",".fw-remove-step",function(e){
            e.preventDefault();
            e.stopPropagation();
            var index = $(this).closest(".mca_mobile_button_panel").parent().index();
            
            $(this).closest(".mca_mobile_button_panel").parent().slideUp(700,function(){
                if (index > -1) {
                    // $(".ca_test_block").find(".dragArea>div").eq(index).fadeOut();
                    app._data.list1.splice(index,1);
                }                
            })
        })


        function load_data(data){
            console.log(data);
            if(data){                
                for (var i=0;i<data.length;i+=1){
                    // create_item(data[i]);
                    data[i].counter = ca_item_collection.length;

                        if(!data[i].style.border){                            
                            data[i].style.border={
                                radius:0,
                                width:0,
                                style:'none',
                                color:"#fff"
                            }
                        }
                    ca_item_collection.push(data[i]);
                }
            }
            // initialize_colorizer();
        }

        load_data(fetched);
        $('.modal').modal();
        initialize_events();

        // $("#ca-preview").on("click",function(e){
        //     e.preventDefault();
        //     jQuery(".modal").modal('open');
        //     console.log(ca_item_collection);
        //     $.get(ajaxurl,{action:"preview_con_buttons",collection:ca_item_collection},function(data){
        //         // console.log(data);
        //         $(".modal-content").html(data);
        //     })
        // })

    // initialize_colorizer();

    // if($(".mca_mobile_button_panel").length>0){        
    //     $(".mca_mobile_button_panel").eq(0).addClass("show");
    // }


    // console.log(ca_item_collection);
  
})(jQuery)