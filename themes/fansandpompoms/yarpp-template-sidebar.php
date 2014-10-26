<?php 
/*
YARPP Template: Sidebar
Author: mitcho (Michael Yoshitaka Erlewine)
Description: A simple example YARPP template.
*/
?><h3>Related Posts</h3>
<ul class="nostyle">
<?php // WP_Query arguments
						$args = array (
							'post_type'              => 'post',
							'post_status'            => 'publish',
							// 'category_name'          => 'news',
							'cat'					 => '2,6',
							'pagination'             => false,
							'posts_per_page'         => '10',
							'orderby'				 => 'meta_value_num',
              				'meta_key' 				 => 'mashsb_shares',
              				'order' 				 => 'DESC',
						);
						
						// The Query
						$query = new WP_Query( $args );
						
						// The Loop
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post(); ?>
								<?php  $cachedCountsArr = explode(",", get_post_meta($post->ID, 'mashsb_shares', true));
        $cachedCounts = end((array_values($cachedCountsArr))) + getFakecount();
       $counts = apply_filters('filter_get_sharedcount', $cachedCounts); ?>

       <?php // $countsArr = explode(",", get_post_meta($post->ID, 'mashsb_shares', true));
// $counts = end((array_values($countsArr))); ?>

	<li><a href="<?php the_permalink() ?>" rel="bookmark"><div class="widget-thumb"><?php the_post_thumbnail('fapp-thumb-150'); ?></div><div class="yarpp-widget-title"><?php the_title(); ?> <span class="share-count">(<?php echo $counts; ?> shares)</span></span></a></li>
	
	<?php }
						} else { ?>
							<p>no posts found</p>
						<?php }
						
						// Restore original Post Data
						wp_reset_postdata(); ?>
		</ul>

