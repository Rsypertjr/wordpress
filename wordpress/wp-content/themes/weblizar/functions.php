<?php
/*	*Theme Name	: Weblizar
	*Theme Core Functions and Codes
*/	
	/**Includes reqired resources here**/
	define('WL_TEMPLATE_DIR_URI', get_template_directory_uri());
	define('WL_TEMPLATE_DIR', get_template_directory());
	define('WL_TEMPLATE_DIR_CORE' , WL_TEMPLATE_DIR . '/core');
	

	require( WL_TEMPLATE_DIR_CORE . '/menu/wp_bootstrap_navwalker.php' );
	require( WL_TEMPLATE_DIR_CORE . '/comment-box/comment-function.php' ); //for comments
	require( WL_TEMPLATE_DIR_CORE . '/plugin-activation.php');
	
	
	
	//wp title tag starts here
	function wl_head( $title, $sep )
	{	global $paged, $page;		
		if ( is_feed() )
			return $title;
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( _e( 'Page', 'weblizar' ), max( $paged, $page ) );
		return $title;
	}	
	add_filter( 'wp_title', 'wl_head', 10,2 );	
	add_action( 'after_setup_theme', 'wl_setup' ); 	
	function wl_setup()
	{	
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 720; //px
	
		// Load text domain for translation-ready
		load_theme_textdomain( 'weblizar', WL_TEMPLATE_DIR_CORE . '/lang' );	
		
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'weblizar' ) );
		// theme support 	
		$args = array('default-color' => '000000',);
		add_theme_support( 'custom-background', $args); 
		add_theme_support( 'automatic-feed-links'); 
		require_once('weblizar-default-settings.php');
		require( WL_TEMPLATE_DIR_CORE . '/theme-options/option-panel.php' ); // for Weblizar Options-Panel
		
		// setup admin pannel defual data for index page		
		$weblizar_default_theme_settings = weblizar_default_settings();	
		
		$weblizar_saved_theme_settings = get_option('weblizar_options'); // get existing option data 		
		if($weblizar_saved_theme_settings) {
			$weblizar_saved_theme_settings = array_merge($weblizar_default_theme_settings, $weblizar_saved_theme_settings);
			update_option('weblizar_options', $weblizar_saved_theme_settings);	// Set existing and new option data			
		} else {
			add_option('weblizar_options', $weblizar_default_theme_settings);  // set New option data 
		}
	}
	
	function weblizar_scripts()
	{	//** font-awesome-3.2.1 **//
		wp_enqueue_style('font-awesome-css-3.2.1', WL_TEMPLATE_DIR_URI. '/css/font-awesome-3.2.1/css/font-awesome.css');
		wp_enqueue_style('font-awesome-min-css-3.2.1', WL_TEMPLATE_DIR_URI. '/css/font-awesome-3.2.1/css/font-awesome.min.css');
		//** font-awesome-4.2.0 **//
		wp_enqueue_style('font-awesome-css', WL_TEMPLATE_DIR_URI. '/css/font-awesome-4.2.0/css/font-awesome.css');
		wp_enqueue_style('font-awesome-min-css', WL_TEMPLATE_DIR_URI. '/css/font-awesome-4.2.0/css/font-awesome.min.css');
		wp_enqueue_style('bootstrap-min', WL_TEMPLATE_DIR_URI . '/css/bootstrap.min.css');
		wp_enqueue_style('responsive', WL_TEMPLATE_DIR_URI . '/css/responsive.css');
		wp_enqueue_style('flat-blue', WL_TEMPLATE_DIR_URI . '/css/skins/flat-blue.css');	
		wp_enqueue_style('theme-menu', WL_TEMPLATE_DIR_URI . '/css/theme-menu.css');
		wp_enqueue_style('carousel', WL_TEMPLATE_DIR_URI . '/css/carousel.css');
		
		// Js
		wp_enqueue_script('menu', WL_TEMPLATE_DIR_URI .'/js/menu/menu.js', array('jquery'));
		wp_enqueue_script('bootstrap-min-js', WL_TEMPLATE_DIR_URI .'/js/menu/bootstrap.min.js');
		wp_enqueue_script('docs-js', WL_TEMPLATE_DIR_URI .'/js/docs.min.js');				
	}
	add_action('wp_enqueue_scripts', 'weblizar_scripts'); 
	if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 

	// Read more tag to formatting in blog page 
	function weblizar_content_more($more)
	{  global $post;							
	   return '<div class="blog-post-details-item blog-read-more"><a href="'.get_permalink().'">Read More...</a></div>';
	}   
	add_filter( 'the_content_more_link', 'weblizar_content_more' );
	
	/*
	* Weblizar widget area
	*/
	add_action( 'widgets_init', 'weblizar_widgets_init');
	function weblizar_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'weblizar' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'weblizar' ),
			'before_widget' => '<div class="sidebar-block">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="h3-sidebar-title sidebar-title">',
			'after_title' => '</h3>'
		) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'weblizar' ),
			'id' => 'footer-widget-area',
			'description' => __( 'footer widget area', 'weblizar' ),
			'before_widget' => '<div class="col-md-3 col-sm-3 footer-col">',
			'after_widget' => '</div>',
			'before_title' => '<div class="footer-title">',
			'after_title' => '</div>',
		) );             
	}
	
	/*
	* Image resize and crop
	*/
	 if ( ( 'add_image_size' ) ) 
	 { 
		add_image_size('wl_media_sidebar_img',54,54,true);
		add_image_size('wl_media_blog_img',800,400,true);
		add_image_size('wl_blog_img',350,150,true);
	}
	// code for home slider post types 
	add_filter( 'intermediate_image_sizes', 'weblizar_image_presets');
	function weblizar_image_presets($sizes){
	   $type = get_post_type($_REQUEST['post_id']);	
		foreach($sizes as $key => $value)
		{	if($type=='post'  &&  $value != 'wl_media_blog_img' &&  $value != 'wl_media_sidebar_img' && $value != 'wl_blog_img')
			{   unset($sizes[$key]);      }		 
		}
		return $sizes;	 
	}
?>