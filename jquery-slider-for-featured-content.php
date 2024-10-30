<?php
/*
Plugin Name: jQuery Slider for Featured Content
Plugin URI: http://www.jqueryslider.org.
Description: Displays up to four recent posts in a featured slideshow.  Displays pictures, captions, and links to the posts. | <a href="https://www.e-junkie.com/ecom/gb.php?ii=779886&c=ib&aff=143939&cl=88913" target="ejejcsingle">Find themes with built-in jQuery sliders </a>
Author: jQuerySlider.org
Version: 1.1
Author URI: http://www.jqueryslider.org/
*/

/* options page */
$options_page = get_option('url') . '/wp-admin/admin.php?page=jquery-slider-for-featured-content/options.php';

define('FCG_PLUGIN_URL',WP_PLUGIN_URL . '/jquery-slider-for-featured-content');
define('FCG_PLUGIN_FILE',WP_PLUGIN_DIR . '/jquery-slider-for-featured-content/featured-posts.php');

function FCG_head(){
?>

<script type="text/javascript" src="<?php echo FCG_PLUGIN_URL; ?>/scripts/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php echo FCG_PLUGIN_URL; ?>/scripts/jquery-ui-1.7.3.custom.min.js"></script>
<script type="text/javascript" >
	var slider_speed = '<?php echo get_option("speed_slider"); ?>';
	var animation_style = '<?php echo get_option("animation_style"); ?>';
	
	var show_caption = '<?php echo get_option("show_caption");?>';
		
	$(document).ready(function(){
		if(show_caption == 'No') {
			$("#featured .ui-tabs-panel .info").hide();	
		}
		if( animation_style == 'Slide Up/Down'){
			FCGSlideInOut();
		}
		else if( animation_style == 'Fade In/Out'){
			FCGFadeInOut();
		}
	});  
	function FCGSlideInOut(){
		$("#featured").tabs(
			{
			fx:{opacity: "toggle"},
			 select : function(){
			 	if( show_caption != 'No') {
					$("#featured .ui-tabs-panel .info").animate({top:'280px'}, 500 ).animate({top:'180px'}, 500 );
				}
			}
			}
			).tabs("rotate", <?php echo get_option("speed_lefttxt");?>, true); 
		
		$("#featured").hover(function() {  
			$("#featured").tabs("rotate",0,true); 
			},  
		function() {  
		$("#featured").tabs("rotate",<?php echo get_option("speed_lefttxt");?>,true);  

		});  
	}
	function FCGFadeInOut(){
//		$("#featured .ui-tabs-panel .info").css('top','280px');
		$("#featured").tabs(
			{
			fx:{opacity: "toggle"},
			select : function(){
				if( show_caption != 'No') {
					//$("#featured .ui-tabs-panel .info").fadeOut("slow");
				}
			}
			}
			).tabs("rotate", slider_speed, true); 
		$("#featured").hover(function() {  
			$("#featured").tabs("rotate",0,true); 
			},  
		function() {  
		$("#featured").tabs("rotate",slider_speed,true);  

		});  
	}
</script>
<style type="text/css">



	#featured{ 
		width:400px; 
		padding-right:250px; 
		position:relative; 
		border:5px solid #ccc; 
		height:250px; 
		background:#fff;
		overflow:hidden;
		margin:0 
	}
	
	
	#featured ul.ui-tabs-nav{ 
		position:absolute; 
		top:0px; left:400px; 
		list-style:none; 
		padding:0; margin:0; 
		width:250px; 
	}
	#featured ul.ui-tabs-nav li{ 
		padding:0px 0; padding-left:13px;  
		font-size:12px; 
		color:#666; 
	}
	#featured ul.ui-tabs-nav li img{ 
		float:left; margin:2px 5px; 
		background:#fff; 
		width:80px;
		height:50px;
		padding:2px; 
		border:1px solid #eee;
	}
	#featured ul.ui-tabs-nav li span{ 
		font-size: <?php if(get_option("tab_fontsize")){echo get_option("tab_fontsize");}else{echo "11";}?>px; 
		font-family: <?php if(get_option("tab_fontfamily")){echo get_option("tab_fontfamily");}else{echo "Verdana, Arial, Helvetica, sans-serif";}?>; 
		line-height:18px; 
	}
	#featured li.ui-tabs-nav-item a{ 
		display:block; 
		height:63px;
		padding-right:3px; 
		color:#333;  
		background:#fff; 
		line-height:20px;
		text-decoration:underline;
	}
	#featured li.ui-tabs-nav-item a:hover{ 
		background:#f2f2f2; 
	}
	#featured li.ui-tabs-selected{ 
		background:url('<?php echo FCG_PLUGIN_URL; ?>/images/selected-item.png') top left no-repeat;  
	}
	#featured ul.ui-tabs-nav li.ui-tabs-selected a{ 
		background:#ccc; 
	}
	#featured .ui-tabs-panel{ 
		width:400px; 
		height:250px; 
		background:#999; position:relative;
		z-index:99998;
	}
	#featured .ui-tabs-panel .info{ 
		position:absolute; 
		width:400px;
		top:180px; 
		left:0; 
		height:70px; 
		overflow:hidden;
		background: url('<?php echo FCG_PLUGIN_URL; ?>/images/transparent-bg.png'); 
		z-index:99999;
	}
	#featured .info h2{ 
		font-size: <?php if(get_option("heading_fontsize")){echo get_option("heading_fontsize");}else{echo "18";}?>px; 
		font-family: <?php if(get_option("heading_fontfamily")){echo get_option("heading_fontfamily");}else{echo "Georgia, 'Times New Roman', Times, serif";}?>; 
		color:#fff; padding:5px; margin:0;
		overflow:hidden; 
	}
	#featured .info p{ 
	
		margin:0 5px; 
		font-family:<?php if(get_option("captiontext_fontfamily")){echo get_option("captiontext_fontfamily");}else{echo "Verdana, Arial, Helvetica, sans-serif";}?>; 
		font-size:<?php if(get_option("captiontext_fontsize")){echo get_option("captiontext_fontsize");}else{echo "11";}?>px; 
		line-height:15px; color:#f0f0f0;
	}
	#featured .info a{ 
		text-decoration:none; 
		color:#fff; 
	}
	#featured .ui-tabs-hide{ 
		display:none; 
	}
</style>
<?php
}
add_action('wp_head','FCG_head');
function featured_options_page() {
	add_options_page('Jquery Slider for Featured Content', 'Jquery Slider for Featured Content', 10, 'jquery-slider-for-featured-content/options.php');
}

add_action('admin_menu', 'featured_options_page');
register_activation_hook(__FILE__, 'myplugin_activate');
function myplugin_activate(){
	update_option('speed_slider',2000);
	update_option('animation_style','Slide Up/Down');
	update_option('speed_lefttxt',2000);
}
?>