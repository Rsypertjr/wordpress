<?php
function weblizar_default_settings()
{
	$ImageUrl1 = WL_TEMPLATE_DIR_URI ."/images/slide-1.jpg";
	$ImageUrl2 = WL_TEMPLATE_DIR_URI ."/images/slide-2.jpg";
	$ImageUrl3 = WL_TEMPLATE_DIR_URI ."/images/slide-3.jpg";
	return $wl_theme_options=array(
			//Logo and Fevicon header			
			'upload_image_logo'=>'',
			'height'=>'55',
			'width'=>'150',
			'text_title'=>'off',
			'upload_image_favicon'=>'',			
			'custom_css'=>'',
			'slide_image' => $ImageUrl1,
			'slide_title' => 'Neque porro ',
			'slide_desc' => ' dolorem ipsum quia dolor sit amet,',
			'slide_btn_text' => 'Read More',
			'slide_btn_link' => '#',
			'slide_image_1' => $ImageUrl2,
			'slide_title_1' => 'Vonsectetur, adipisci velit...',
			'slide_desc_1' => 'satu fakta bahawa pembaca akan terganggus',
			'slide_btn_text_1' => 'Read More',
			'slide_btn_link_1' => '#',
			'slide_image_2' => $ImageUrl3,
			'slide_title_2' => 'echo establecido hace demasia.',
			'slide_desc_2' => 'es simplemente el texto de relleno de las imprentas y archivos de texto.',
			'slide_btn_text_2' => 'Read More',
			'slide_btn_link_2' => '#',
			
			
			'site_intro_title'=>'We are weblizar',
			'site_intro_text'=>"Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur.",
			'blog_title'=>'Latest Blog',
			'blog_text'=>"Lorem Ipsum is simply dummy text of the printing and typesetting industry..",
			
			//Social media links
			'social_media_in_contact_page_enabled'=>'on',
			'footer_section_social_media_enbled'=>'on',
			'social_media_twitter_link' =>"https://twitter.com/",
			'social_media_facebook_link' =>"https://facebook.com",
			'social_media_linkedin_link' =>"http://linkedin.com/",
			'social_media_google_plus' =>"https://plus.google.com/",

			'footer_customizations' => ' @ 2014 Weblizar Theme',
			'developed_by_text' => 'Theme Developed By',
			'developed_by_weblizar_text' => 'weblizar',
			'developed_by_link' => 'http://weblizar.com/',
			
			'service_1_title'=>"Idea",
			'service_1_icons'=>"fa fa-pagelines",
			'service_1_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
			'service_1_link'=>"#",
			
			'service_2_title'=>"Design",
			'service_2_icons'=>"fa fa-eye",
			'service_2_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
			'service_2_link'=>"#",
			
			'service_3_title'=>"management",
			'service_3_icons'=>"fa fa-users",
			'service_3_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
			'service_3_link'=>"#",
			
			'service_4_title'=>"Development",
			'service_4_icons'=>"fa fa-code",
			'service_4_text'=>"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.",
			'service_4_link'=>"#",		
			
		);
}



/*
* General Settings
*/

function reset_general_setting()
{
	$wl_theme_options = get_option('weblizar_options');
	$wl_theme_options['upload_image_logo']="";
	$wl_theme_options['height']=55;
	$wl_theme_options['width']=150;
	$wl_theme_options['upload_image_favicon']="";
	$wl_theme_options['text_title']="on";
	$wl_theme_options['custom_css']="";		
	update_option('weblizar_options',$wl_theme_options);
}

/*
* Slide image Settings
*/

function reset_slide_image_setting()
{	$wl_theme_options = get_option('weblizar_options');
	$ImageUrl1 = WL_TEMPLATE_DIR_URI ."/images/slide-1.jpg";
	$ImageUrl2 = WL_TEMPLATE_DIR_URI ."/images/slide-2.jpg";
	$ImageUrl3 = WL_TEMPLATE_DIR_URI ."/images/slide-3.jpg";
	$wl_theme_options['slide_image'] = $ImageUrl1;
	$wl_theme_options['slide_title'] = "Neque porro  ";
	$wl_theme_options['slide_desc'] = "Valdoh aohu Vidlegue";
	$wl_theme_options['slide_btn_text'] = "Read More";
	$wl_theme_options['slide_btn_link'] = "#";
	$wl_theme_options['slide_image_1'] = $ImageUrl2;
	$wl_theme_options['slide_title_1'] = "Neque porro tle";
	$wl_theme_options['slide_desc_1'] = "Sl sgiden mre tion";
	$wl_theme_options['slide_btn_text_1'] = "Read More";
	$wl_theme_options['slide_btn_link_1'] = "#";
	$wl_theme_options['slide_image_2'] = $ImageUrl3;
	$wl_theme_options['slide_title_2'] = "echo establecido hace demasia.";
	$wl_theme_options['slide_desc_2'] = "Sl sgiden mre tiones simplemente el texto de relleno de las imprentas y archivos de texto.";
	$wl_theme_options['slide_btn_text_2'] = "Read More";
	$wl_theme_options['slide_btn_link_2'] = "#";
	
	update_option('weblizar_options', $wl_theme_options);
}

/*
* Site into Settings
*/

function reset_site_intro_setting()
{	$wl_theme_options = get_option('weblizar_options');
	$wl_theme_options['site_intro_title']="We are weblizar";
	$wl_theme_options['site_intro_text']="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.";		
	
	$wl_theme_options['blog_title']="Latest Blog";
	$wl_theme_options['blog_text']="Lorem Ipsum is simply dummy text of the printing and typesetting industry.";		
	
	update_option('weblizar_options', $wl_theme_options);
}

/*
* Service Settings
*/

function reset_service_setting()
{	$wl_theme_options = get_option('weblizar_options');
	$wl_theme_options['service_1_title']="Idea";
	$wl_theme_options['service_1_icons']="icon-lightbulb";
	$wl_theme_options['service_1_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in";
	$wl_theme_options['service_1_link']="";
	
	$wl_theme_options['service_2_title']="Design";
	$wl_theme_options['service_2_icons']="icon-laptop";
	$wl_theme_options['service_2_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in";
	$wl_theme_options['service_2_link']="#";
	
	$wl_theme_options['service_3_title']="Management";
	$wl_theme_options['service_3_icons']="glyphicon glyphicon-th";
	$wl_theme_options['service_3_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in";
	$wl_theme_options['service_3_link']="#";
	
	$wl_theme_options['service_4_title']="Development";
	$wl_theme_options['service_4_icons']="icon-code";
	$wl_theme_options['service_4_text']="There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
	$wl_theme_options['service_4_link']="#";
	
	update_option('weblizar_options',$wl_theme_options);
}

/*
* Social Settings
*/

function reset_social_setting()
{	$wl_theme_options = get_option('weblizar_options');
	$wl_theme_options['footer_section_social_media_enbled']="on";	
	$wl_theme_options['social_media_twitter_link']="https://twitter.com/";
	$wl_theme_options['social_media_facebook_link']="https://facebook.com/";
	$wl_theme_options['social_media_linkedin_link']="https://linkedin.com/";
	$wl_theme_options['social_media_google_plus']="https://plus.google.com/";			
	
	update_option('weblizar_options', $wl_theme_options);
}

/*
* footer customizations Settings
*/

function reset_footer_customizations_setting()
{	$wl_theme_options = get_option('weblizar_options');
	$wl_theme_options['footer_customizations']="@ 2014 Weblizar Theme";
	$wl_theme_options['developed_by_text']="Theme Developed By";
	$wl_theme_options['developed_by_weblizar_text']="Weblizar";
	$wl_theme_options['developed_by_link']="http://weblizar.com/";
	update_option('weblizar_options',$wl_theme_options);
}
?>