"function"!=typeof Object.create&&(Object.create=function(t){function o(){}return o.prototype=t,new o}),function(t,o,i,s){"use strict";var n={_positionClasses:["bottom-left","bottom-right","top-right","top-left","bottom-center","top-center","mid-center"],_defaultIcons:["success","error","info","warning"],init:function(o,i){this.prepareOptions(o,t.toast.options),this.process()},prepareOptions:function(o,i){var s={};"string"==typeof o||o instanceof Array?s.text=o:s=o,this.options=t.extend({},i,s)},process:function(){this.setup(),this.addToDom(),this.position(),this.bindToast(),this.animate()},setup:function(){var o="";if(this._toastEl=this._toastEl||t("<div></div>",{class:"jq-toast-single"}),o+='<span class="jq-toast-loader"></span>',this.options.allowToastClose&&(o+='<span class="close-jq-toast-single">&times;</span>'),this.options.text instanceof Array){this.options.heading&&(o+='<h2 class="jq-toast-heading">'+this.options.heading+"</h2>"),o+='<ul class="jq-toast-ul">';for(var i=0;i<this.options.text.length;i++)o+='<li class="jq-toast-li" id="jq-toast-item-'+i+'">'+this.options.text[i]+"</li>";o+="</ul>"}else this.options.heading&&(o+='<h2 class="jq-toast-heading">'+this.options.heading+"</h2>"),o+=this.options.text;this._toastEl.html(o),!1!==this.options.bgColor&&this._toastEl.css("background-color",this.options.bgColor),!1!==this.options.textColor&&this._toastEl.css("color",this.options.textColor),this.options.textAlign&&this._toastEl.css("text-align",this.options.textAlign),!1!==this.options.icon&&(this._toastEl.addClass("jq-has-icon"),-1!==t.inArray(this.options.icon,this._defaultIcons)&&this._toastEl.addClass("jq-icon-"+this.options.icon)),!1!==this.options.class&&this._toastEl.addClass(this.options.class)},position:function(){"string"==typeof this.options.position&&-1!==t.inArray(this.options.position,this._positionClasses)?"bottom-center"===this.options.position?this._container.css({left:t(o).outerWidth()/2-this._container.outerWidth()/2,bottom:20}):"top-center"===this.options.position?this._container.css({left:t(o).outerWidth()/2-this._container.outerWidth()/2,top:20}):"mid-center"===this.options.position?this._container.css({left:t(o).outerWidth()/2-this._container.outerWidth()/2,top:t(o).outerHeight()/2-this._container.outerHeight()/2}):this._container.addClass(this.options.position):"object"==typeof this.options.position?this._container.css({top:this.options.position.top?this.options.position.top:"auto",bottom:this.options.position.bottom?this.options.position.bottom:"auto",left:this.options.position.left?this.options.position.left:"auto",right:this.options.position.right?this.options.position.right:"auto"}):this._container.addClass("bottom-left")},bindToast:function(){var t=this;this._toastEl.on("afterShown",function(){t.processLoader()}),this._toastEl.find(".close-jq-toast-single").on("click",function(o){o.preventDefault(),"fade"===t.options.showHideTransition?(t._toastEl.trigger("beforeHide"),t._toastEl.fadeOut(function(){t._toastEl.trigger("afterHidden")})):"slide"===t.options.showHideTransition?(t._toastEl.trigger("beforeHide"),t._toastEl.slideUp(function(){t._toastEl.trigger("afterHidden")})):(t._toastEl.trigger("beforeHide"),t._toastEl.hide(function(){t._toastEl.trigger("afterHidden")}))}),"function"==typeof this.options.beforeShow&&this._toastEl.on("beforeShow",function(){t.options.beforeShow(t._toastEl)}),"function"==typeof this.options.afterShown&&this._toastEl.on("afterShown",function(){t.options.afterShown(t._toastEl)}),"function"==typeof this.options.beforeHide&&this._toastEl.on("beforeHide",function(){t.options.beforeHide(t._toastEl)}),"function"==typeof this.options.afterHidden&&this._toastEl.on("afterHidden",function(){t.options.afterHidden(t._toastEl)}),"function"==typeof this.options.onClick&&this._toastEl.on("click",function(){t.options.onClick(t._toastEl)})},addToDom:function(){var o=t(".jq-toast-wrap");if(0===o.length?(o=t("<div></div>",{class:"jq-toast-wrap",role:"alert","aria-live":"polite"}),t("body").append(o)):this.options.stack&&!isNaN(parseInt(this.options.stack,10))||o.empty(),o.find(".jq-toast-single:hidden").remove(),o.append(this._toastEl),this.options.stack&&!isNaN(parseInt(this.options.stack),10)){var i=o.find(".jq-toast-single").length-this.options.stack;i>0&&t(".jq-toast-wrap").find(".jq-toast-single").slice(0,i).remove()}this._container=o},canAutoHide:function(){return!1!==this.options.hideAfter&&!isNaN(parseInt(this.options.hideAfter,10))},processLoader:function(){if(!this.canAutoHide()||!1===this.options.loader)return!1;var t=this._toastEl.find(".jq-toast-loader"),o=(this.options.hideAfter-400)/1e3+"s",i=this.options.loaderBg,s=t.attr("style")||"";s=s.substring(0,s.indexOf("-webkit-transition")),s+="-webkit-transition: width "+o+" ease-in;                       -o-transition: width "+o+" ease-in;                       transition: width "+o+" ease-in;                       background-color: "+i+";",t.attr("style",s).addClass("jq-toast-loaded")},animate:function(){t=this;if(this._toastEl.hide(),this._toastEl.trigger("beforeShow"),"fade"===this.options.showHideTransition.toLowerCase()?this._toastEl.fadeIn(function(){t._toastEl.trigger("afterShown")}):"slide"===this.options.showHideTransition.toLowerCase()?this._toastEl.slideDown(function(){t._toastEl.trigger("afterShown")}):this._toastEl.show(function(){t._toastEl.trigger("afterShown")}),this.canAutoHide()){var t=this;o.setTimeout(function(){"fade"===t.options.showHideTransition.toLowerCase()?(t._toastEl.trigger("beforeHide"),t._toastEl.fadeOut(function(){t._toastEl.trigger("afterHidden")})):"slide"===t.options.showHideTransition.toLowerCase()?(t._toastEl.trigger("beforeHide"),t._toastEl.slideUp(function(){t._toastEl.trigger("afterHidden")})):(t._toastEl.trigger("beforeHide"),t._toastEl.hide(function(){t._toastEl.trigger("afterHidden")}))},this.options.hideAfter)}},reset:function(o){"all"===o?t(".jq-toast-wrap").remove():this._toastEl.remove()},update:function(t){this.prepareOptions(t,this.options),this.setup(),this.bindToast()},close:function(){this._toastEl.find(".close-jq-toast-single").click()}};t.toast=function(t){var o=Object.create(n);return o.init(t,this),{reset:function(t){o.reset(t)},update:function(t){o.update(t)},close:function(){o.close()}}},t.toast.options={text:"",heading:"",showHideTransition:"fade",allowToastClose:!0,hideAfter:3e3,loader:!0,loaderBg:"#9EC600",stack:5,position:"bottom-left",bgColor:!1,textColor:!1,textAlign:"left",icon:!1,beforeShow:function(){},afterShown:function(){},beforeHide:function(){},afterHidden:function(){},onClick:function(){}}}(jQuery,window,document);
var icons = JSON.parse(data_icons);


			(function($){
				  $( ".ca-icon-picker" ).caIconPicker( {
          icons: icons
        } );

        $('.range-field').each(function() {
          var val = $(this).find("input").val();
          var $value = $(this).find('.value');
            $(this).find('.value').html(val);

            $(this).find("input").on("change",function(){
              $value.html(val);
              $("#dataRenderer").trigger("change");

            })
          }).on("change",function(){
          $("#dataRenderer").trigger("change");
          });

          $("#dataRenderer").on("change",function(){
            $("#styler").html(app.renderTemplateStyles());
          })
          jQuery("body").on("click",function(){
          jQuery(".serpwars-secondary-panel").removeClass("active")           
          })
          jQuery("body").on("click","select,.minicolors,.ui-accordion-header,.ca-button-type .select-dropdown",function(e){
          e.preventDefault();
          e.stopPropagation();        
          }).on("click",".show-secondary",function(e){
          e.preventDefault();
          e.stopPropagation();
          jQuery(".serpwars-secondary-panel").addClass("active")
        }).on("change","input.range-label",function(){
          var value = $(this).val();
          $(this).closest(".col").find("input[type='range']").val(value);

        });

            $(".selected-icon").html($("<span>",{
          html:"<i class ='fa "+app._data.current_item.icon+"'></i>",
          class:"selected-icon"         
          }))

            $(".ca-share-button a").on("click",function(e){e.preventDefault()})

  

  //Do not change anything on this line from exploration
	$("input[type='checkbox']").on("change",function(e){
		e.stopPropagation();
		$("#styler").html(app.renderTemplateStyles())
	})

  $("#ca_saveitem").on("click",function(){
   $(this).addClass("disabled");
    var $el = $(this);
    var text = $("#serpwars-component-title").val();
    var message = $(".ca_module_message").val();
    var id = $("#serpwars-component-id").val();
    var content = app._data;

    var module_settings = $(".module_settings_tab").serializeArray();
    // var expiration = jQuery($datepicker.get(0)).val()+" "+ jQuery($timepicker.get(0)).val();
    var expiration = "";
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
                  path += "=ca_add_new_mobile_cta&id="+data;
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

    $(this).addClass("disabled");
    var $el = $(this);
    var text = $("#serpwars-component-title").val();
    var message = $(".ca_module_message").val();
    var id = $("#serpwars-component-id").val();
	app._data.container_style.main.width = $('label[for=container_width] .range-label').val();
	app._data.container_style.main.bottom = $('label[for=top_position] .range-label').val();
	app._data.container_style.main.left = $('label[for=left_postition] .range-label').val();
	app._data.current_item.style.normal.icon.font_size = $('.cicon-size .range-label').val();
	app._data.current_item.style.normal.text.font_size = $('.ctext-size .range-label').val();
	app._data.current_item.style.normal.height = $('label[for=button_height] .range-label').val();
	app._data.current_item.style.normal.width = $('label[for=button_size] .range-label').val();
	
    var content = app._data;
    var page_settings = JSON.parse($(".ca_ma_com_selected").val());

    // var module_settings = $(".module_settings_tab").serializeArray();
    var module_settings = {};
    module_settings.page_settings = page_settings;


    // var expiration = jQuery($datepicker.get(0)).val()+" "+ jQuery($timepicker.get(0)).val();
    var expiration = "";


    if(text!=""){     
      var tobepasted = {
        id:id,
        title:text
      };

      $.post(ajaxurl,{
        action:"ca_updateitem",
        title:text,
        message:message,
        content:content,
        module_settings:module_settings,
        expiration:expiration,
        ca_ma_selected_components:tobepasted,
        remove_from_pages:remove_from_pages,
        id:id},function(data){
          //console.log(data);
          data = JSON.parse(data);
          $el.removeClass("disabled");
          remove_from_pages = [];
          $.toast({
              text: data.text+" : "+data.value,
              position: 'bottom-right',
              showHideTransition: 'fade',
              afterHidden: function () {
                 // location.reload();
              }
          })
  
      })
    }
  })




			})(jQuery)