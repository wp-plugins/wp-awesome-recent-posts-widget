<div class="wp-awesome-recent-posts-widget">
	<ul class="wp-awesome-recent-posts">
		<?php 
		$wp_awesome_query = new WP_Query( array('cat' => $category, 'posts_per_page' => $no_post_to_display, 'orderby' => $order_by, 'order' => $order_type, 'offset'=>$post_offset, 'nopagging' => true));
		if($wp_awesome_query->have_posts()){
		while ($wp_awesome_query->have_posts()) : $wp_awesome_query->the_post();?>
		<li class="wp-awesome-recent-post">
		 <?php if($show_post_thumb){?>
			<div class="wp-awesome-recent-posts-thumbnail" style="width:<?php echo $post_thumb_width; ?>px;height:<?php echo $post_thumb_height; ?>px;">
			<?php if(has_post_thumbnail()){?>
			 <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"><?php the_post_thumbnail(array($post_thumb_width,$post_thumb_height), array('title' => '', 'class' => '')); ?></a>
			<?php }else{?>
			 <a href="<?php the_permalink(); ?>" class="post-thumbnail-link no-thumb"><img src="<?php echo plugins_url( 'wp-awesome-recent-posts-widget/images/no-thumb.jpg' ) ?>" style="width:<?php echo $post_thumb_width; ?>px;height:<?php echo $post_thumb_height; ?>px;"></a>
			<?php }?>
			</div>
		<?php }?>
		 <?php if ($post_title) { ?>
			<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute() ?>"> <?php the_title() ?></a></h4>
		<?php } ?>
		 <span class="posted-date-and-author"><?php if ($post_date) { ?> <?php echo _e("Posted on- "). get_the_time($post_date_format); } ?> <?php if ($post_author) { ?> <?php echo _e("by ").get_the_author(); } ?></span>
		 <?php if($post_excerpt) { ?>
			<div class="wp_awesome_excerpt">
				<?php
                    $post_content=wp_trim_words(get_the_excerpt(),$post_excerpt_length).'<a href="'.get_permalink().'">'.$read_more_text.'</a>';
                    echo $post_content;
                 ?>
			</div>
			<hr />
		<?php } ?>
		 
		</li>
		<?php 
		endwhile;
		}else{ echo "No results found!"; }
		wp_reset_query();
		wp_reset_postdata();
		?>
	</ul>
</div>