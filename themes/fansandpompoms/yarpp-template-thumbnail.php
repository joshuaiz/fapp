<?php
/*
YARPP Template: Thumbnails
Description: Requires a theme which supports post thumbnails
Author: mitcho (Michael Yoshitaka Erlewine)
*/ ?>
<h3>Related Posts:</h3>
<?php if (have_posts()):?>
<ol>
	<?php while (have_posts()) : the_post(); ?>
		<?php if (has_post_thumbnail()):?>
		<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('fapp-thumb-150'); ?><?php the_title(); ?></a></li>
		<?php endif; ?>
	<?php endwhile; ?>
</ol>

<?php else: ?>
<p>No related photos.</p>
<?php endif; ?>
