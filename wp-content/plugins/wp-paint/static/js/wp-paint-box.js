(function ($) {
  $.blockUI.defaults = $.extend($.blockUI.defaults, {
    message: 'Loading ...',
    css: { 
      padding:        0, 
      margin:         0, 
      width:          '100%', 
      top:            '50%', 
      left:           '0%', 
      textAlign:      'center', 
      color:          '#000', 
      border:         'none', 
      backgroundColor:'transparent', 
      cursor:         'default',
      fontSize:       '16px',
      lineHeight:     '24px',
      height:         '24px',
      marginTop:      '-12px'
    }, 
    overlayCSS:  { 
      backgroundColor: '#f9f9fa', 
      opacity:         0.6, 
      cursor:          'default' 
    }, 
  });
  if(window.top == window.self) {
    window.top.location.href = wp_paint_meta.wp_admin_url;
  }
  window.wpp_enable_color_memory = function () {
    window.MP_GUI.GUI_colors._change_color = window.MP_GUI.GUI_colors.change_color;
    window.MP_GUI.GUI_colors.change_color = function (hex, r, g, b) {
      window.MP_GUI.GUI_colors._change_color(hex, r, g, b);
      window.MP_GUI.Helper.setCookie('selected_color', hex);
    };
  };
  window.wpp_open_url = function (url, layers) {
    if (url == '')
      return;
      
    if(typeof layers == "undefined") {
      var layers = window.State.Base_layers;
    }

    var layer_name = url.replace(/^.*[\\\/]/, '');
    
    var img = new Image();
    img.crossOrigin = "Anonymous";
    img.onload = function () {
      var new_width = img.width;
      var new_height = img.height;
      if(img.width > wp_paint_meta.max_width || img.height > wp_paint_meta.max_height) {
        var aspect_ratio = img.width / img.height;
        if(aspect_ratio > 1) {
          new_width = wp_paint_meta.max_width;
          new_height = Math.round(wp_paint_meta.max_width / aspect_ratio);
          if(new_height > Number(wp_paint_meta.max_height)) {
            new_height = wp_paint_meta.max_height;
            new_width = Math.round(wp_paint_meta.max_height * aspect_ratio);
          }
        } else {
          new_height = wp_paint_meta.max_height;
          new_width = Math.round(aspect_ratio * wp_paint_meta.max_height);
          if(new_width > Number(wp_paint_meta.max_width)) {
            new_width = wp_paint_meta.max_width;
            new_height = Math.round(wp_paint_meta.max_width / aspect_ratio);
          }
        }
      }
      var new_layer = {
        name: layer_name,
        type: 'image',
        link: img,
        width: new_width,
        height: new_height,
        width_original: img.width,
        height_original: img.height,
      };
      layers.insert(new_layer);
      layers.autoresize(new_width, new_height);
      $('#wpp-loading').remove();
    };
    img.onerror = function (ex) {
      alertify.error('Sorry, image could not be loaded. Try copy image and paste it.');
    };
    img.src = url;
  };
  
  window.addEventListener('load', function (e) {
    //render all
    window.MP_GUI.load_modules();
    window.MP_GUI.load_default_values();
    
    if(window.MP_GUI.Helper.getCookie('toggle_info') == null) {
      window.MP_GUI.Helper.setCookie('toggle_info', 0);
    }
    if(window.MP_GUI.Helper.getCookie('toggle_colors') == null) {
      window.MP_GUI.Helper.setCookie('toggle_colors', 0);
    }
    if(window.MP_GUI.Helper.getCookie('toggle_details') == null) {
      window.MP_GUI.Helper.setCookie('toggle_details', 0);
    }

    var selected_color = window.MP_GUI.Helper.getCookie('selected_color');

    AppConfig.COLOR = (selected_color && selected_color.match(/^#((0x){0,1}|#{0,1})([0-9A-F]{8}|[0-9A-F]{6})$/ig)) ? selected_color : "#333333";
    AppConfig.TRANSPARENCY = true;
    AppConfig.TOOLS = AppConfig.TOOLS.filter(function( obj ) {
      return ["media", "animation", "clone"].indexOf(obj.name) == -1;
    });

    AppConfig.themes = ["light", "dark", "green"]

    window.MP_GUI.render_main_gui();

    window.MP_Layers.init();

    if(wp_paint_meta && wp_paint_meta.attachment_url)
      window.wpp_open_url(wp_paint_meta.attachment_url);
    
    window.wpp_enable_color_memory();
    
    AppConfig.mp_version = wp_paint_meta.wpp_version;
    $('#wpp-save-image-button').on('click', function () {
      var tempCanvas = document.createElement("canvas");
      var tempCtx = tempCanvas.getContext("2d");
      var dim = window.MP_Layers.get_dimensions();
      
      var canvas_width = dim.width;
      var canvas_height = dim.height;
      
      tempCanvas.width = canvas_width;
      tempCanvas.height = canvas_height;
      window.MP_Layers.convert_layers_to_canvas(tempCtx);

      $('#wpp-image-data').val(tempCanvas.toDataURL());
      $('#wpp-save-image-form').submit();
    });
    $('#wpp-save-image-form').on('submit', function () {
      $.blockUI({
        message: 'Please wait ... Saving Image ...'
      });
    });
    $('#wpp-restore-image-form').on('submit', function () {
      $.blockUI({
        message: 'Please wait ... Restoring Original Image ...'
      });
    });
  }, false);
})(jQuery);
