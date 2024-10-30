<?php 
	$category = get_option('featured_cat'); 
	$numberposts = get_option('number-posts'); 
	
?>
	
<?php	$featured_slider = new WP_Query("cat=".$category."&showposts=".$numberposts);	?>
<div id="featured">
	  <ul class="ui-tabs-nav">
		<?php if($featured_slider->have_posts()) : while($featured_slider->have_posts()) : $featured_slider->the_post(); ?>
			<?php 
				if(get_post_meta($post->ID,"replacement_title",true)){
					$post_title = get_post_meta($post->ID,"replacement_title",true);
				}
				else {
					$post_title = get_the_title(get_the_ID());
				}	
			?>
			
			 <?php 
			 $blogurl = get_bloginfo('wpurl'); 
			 $longurl = get_post_meta($post->ID,'slider_image',true); 
			 $newurl= str_replace($blogurl,"", $longurl);
			 ?> 
			<li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?php the_ID();?>"><a href="#fragment-<?php the_ID();?>"><img src="<?php echo FCG_PLUGIN_URL; ?>/scripts/timthumb.php?src=/<?php echo $newurl;  ?>&h=50&w=80&zc=1" alt="<?php echo $post_title; ?>" /><span><?php echo $post_title; ?></span></a></li>
		<?php endwhile; endif; ?>
	  </ul>
	
	<?php if($featured_slider->have_posts()) : while($featured_slider->have_posts()) : $featured_slider->the_post(); ?>
		<?php 
			if(get_post_meta($post->ID,"replacement_title",true)){
				$post_title = get_post_meta($post->ID,"replacement_title",true);
			}
			else {
				$post_title = get_the_title(get_the_ID());
			}	
		?>
	<?php
			$blogurl = get_bloginfo('wpurl'); 
			 $longurl = get_post_meta($post->ID,'slider_image',true); 
			 $newurl= str_replace($blogurl,"", $longurl);
			 $newurl= str_replace("//","/", $newurl);
			 ?>
		<div id="fragment-<?php the_ID();?>" class="ui-tabs-panel" >
			<img src="<?php echo FCG_PLUGIN_URL; ?>/scripts/timthumb.php?src=<?php echo $newurl; ?>&h=250&w=400&zc=1" alt="<?php echo $post_title; ?>" />
			 <div class="info" >
				<h2><a href="<?php the_permalink(); ?>" ><?php echo $post_title; ?></a></h2>
				<?php 
					$content = get_the_content();
					$content = substr($content,0,100);
				?>
				<p><span><?php echo $content; ?></span><a href="<?php the_permalink();?>">....read more</a></p>
			 </div>
		</div>
	<?php endwhile; endif; ?>
</div>