<?php
$location = $options_page; 
?>

<div class="wrap">
	<h2>Jquery Slider for Featured Content</h2>
	<h3><b>Having Problems? </b>Try our <a href="http://www.jqueryslider.org/sub/support">support forum</a> or check out <a href="https://www.e-junkie.com/ecom/gb.php?ii=590158&c=ib&aff=143939&cl=88913" target="ejejcsingle">themes with built-in sliders</a>.</h3>

	<p>Use these fields below to select category and number of posts to display for your Jquery Slider for Featured Content</p>
	  
	<?php $catname = get_option("featured_cat");?>
	
	<form method="post" action="options.php">
		<?php wp_nonce_field('update-options'); ?>
		
		Category :<br />
		<?php wp_dropdown_categories("name=featured_cat&orderby=name&selected=".$catname );?>
				
		<br /><br />
		
		Number of Posts to display :<br />
		<input name="number-posts" id="number-posts" size="25" value="<?php echo get_option('number-posts'); ?>"></input>  
		
		<br /><br />
		
		Show Caption :&nbsp;&nbsp;
		<input type="radio" id="show_caption_yes" name="show_caption" value="Yes" <?php if((get_option("show_caption") == 'Yes') || !(get_option("show_caption")) ) { ?>checked="checked" <?php } ?> /> <label for="show_caption_yes">Yes</label>&nbsp;&nbsp;
		<input type="radio" id="show_caption_no" name="show_caption" value="No" <?php if(get_option("show_caption") == 'No') { ?>checked="checked" <?php } ?> /> <label for="show_caption_no">No</label> 	
		
		<br /><br />
		
		<h2>Typography</h2>
		<p>Use these fields below to set font of the Slideshow</p>
		
		<p style=" text-decoration:underline; font-weight:bold">Caption Heading Typography</p>			
		Font Family :<br />
		<select name="heading_fontfamily" id="heading_fontfamily" >
					
			<?php if(get_option("heading_fontfamily")) { ?>
			<option value="<?php echo get_option("heading_fontfamily");?>" selected="selected"><?php echo get_option("heading_fontfamily");?></option>
			<?php } else { ?>
			<option value="Georgia, 'Times New Roman', Times, serif" selected="selected" >Georgia, 'Times New Roman', Times, serif</option>
			<?php } ?>
			<option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
			<option value="Georgia, 'Times New Roman', Times, serif" >Georgia, 'Times New Roman', Times, serif</option>
			<option value="Times New Roman, Times, serif">Times New Roman, Times, serif</option>
			<option value="Verdana, Arial, Helvetica, sans-serif">Verdana, Arial, Helvetica, sans-serif</option>							
		</select>	
		
		<br /><br />
		
		Font size : <br />
		<input id="heading_fontsize" name="heading_fontsize" size="5" value="<?php if(get_option("heading_fontsize")){echo get_option("heading_fontsize");}else{ echo "18";} ?>" /> px
							
		<br /><br />
		
		<p style=" text-decoration:underline; font-weight:bold">Caption Text Typography</p>			
		Font Family :<br />
		<select name="captiontext_fontfamily" id="captiontext_fontfamily" >
			
			<?php if(get_option("captiontext_fontfamily")) { ?>
			<option value="<?php echo get_option("captiontext_fontfamily");?>" selected="selected"><?php echo get_option("captiontext_fontfamily");?></option>
			<?php } else { ?>
			<option value="Verdana, Arial, Helvetica, sans-serif" selected="selected">Verdana, Arial, Helvetica, sans-serif</option>
			<?php } ?>
			<option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
			<option value="Georgia, 'Times New Roman', Times, serif" >Georgia, 'Times New Roman', Times, serif</option>
			<option value="Times New Roman, Times, serif">Times New Roman, Times, serif</option>
			<option value="Verdana, Arial, Helvetica, sans-serif">Verdana, Arial, Helvetica, sans-serif</option>				
		</select>	
		
		<br /><br />
		
		Font size : <br />
		<input id="captiontext_fontsize" name="captiontext_fontsize" size="5" value="<?php if(get_option("captiontext_fontsize")){echo get_option("captiontext_fontsize");}else{ echo "11";} ?>" /> px

		<br /><br />
		
		<p style=" text-decoration:underline; font-weight:bold">Right Tab Typography</p>			
		Font Family :<br />
		<select name="tab_fontfamily" id="tab_fontfamily" >
			<?php if(get_option("tab_fontfamily")) { ?>
			<option value="<?php echo get_option("tab_fontfamily");?>" selected="selected"><?php echo get_option("tab_fontfamily");?></option>
			<?php } else { ?>
			<option value="Verdana, Arial, Helvetica, sans-serif" selected="selected">Verdana, Arial, Helvetica, sans-serif</option>
			<?php } ?>
			<option value="Arial, Helvetica, sans-serif">Arial, Helvetica, sans-serif</option>
			<option value="Georgia, 'Times New Roman', Times, serif" >Georgia, 'Times New Roman', Times, serif</option>
			<option value="Times New Roman, Times, serif">Times New Roman, Times, serif</option>
			<option value="Verdana, Arial, Helvetica, sans-serif">Verdana, Arial, Helvetica, sans-serif</option>				
		</select>	
		
		<br /><br />
		
		Font size : <br />
		<input id="tab_fontsize" name="tab_fontsize" size="5" value="<?php if(get_option("tab_fontsize")){echo get_option("tab_fontsize");}else{ echo "11";} ?>" /> px
		
		<h2>Gallery Effects</h2>
		<p>Use these fields below to adjust the transition effects of the Slideshow</p>
		<p style="color: #CC3300"><strong>Note : </strong>Animation speed should be multiple of hundred like 500,1000,1500 etc otherwise it could stop working</p>
		
		Animation Speed of the Slider : <br />
		<input name="speed_slider" id="speed_slider"  size="25" value="<?php echo get_option('speed_slider'); ?>" /> 
		
		<br /><br />
		
		Animation style of the left Caption : <br />
		<select name="animation_style" id="animation_style" style="width:155px" >
			<option value="<?php echo get_option("animation_style");?>" selected="selected"><?php echo get_option("animation_style");?></option>
			<option value="Slide Up/Down">Slide Up/Down</option>
			<option value="Fade In/Out">Fade In/Out</option>
		</select>
		
		<br /><br />
					
		Animation speed of the left Caption : <br />
		<input name="speed_lefttxt" id="speed_lefttxt" size="25" value="<?php echo get_option('speed_lefttxt'); ?>"  /> 
					 
		<input type="hidden" name="action" value="update" />
		<input type="hidden" name="page_options" value="featured_cat,number-posts,animation_style,speed_lefttxt,speed_slider,show_caption,heading_fontfamily,heading_fontsize,captiontext_fontfamily,captiontext_fontsize,tab_fontfamily,tab_fontsize" />
	
		<p class="submit"><input type="submit" name="Submit" value="<?php _e('Update Options') ?>" /></p>
	</form>    
	
	
</div>