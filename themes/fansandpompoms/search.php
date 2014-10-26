<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">
						<h1 class="archive-title"><span><?php _e( 'Search Results for:', 'bonestheme' ); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

								<header class="article-header">

								<div class="post-loop-thumb cf">
									<?php 
										if ( has_post_thumbnail() ) { ?> 
											<a href="<?php echo get_permalink(); ?>"> <?php the_post_thumbnail('fapp-thumb-150'); ?> </a>
										<?php } 
									?>
									</div>

									<h3 class="search-title post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>

                  <p class="byline vcard">
                   <span class="dashicons-admin-users dashicon"></span> <span class="post-author"><?php the_author_posts_link(); ?></span> <span class="dashicons-clock dashicon"></span><span class="post-time"> <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></span> <span class="dashicons-admin-comments dashicon"></span> <a class="comments-link" href="<?php the_permalink(); ?>#disqus_thread"></a>
                  </p>

								</header>

								<section class="entry-content">

										<?php the_excerpt( '<span class="read-more">' . __( 'Read more &raquo;', 'bonestheme' ) . '</span>' ); ?>

								</section>

								<footer class="article-footer">
									
									<?php if(get_the_category_list(', ') != ''): ?>
                  					<?php printf( __( 'Categories: %1$s', 'bonestheme' ), get_the_category_list(', ') ); ?>
                  					<?php endif; ?>

                 					<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

								</footer> <!-- end article footer -->

							</article>

						<?php endwhile; ?>

								<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
										<header class="article-header">
											<h1><?php _e( 'Sorry, No Results.', 'bonestheme' ); ?></h1>
										</header>
										<section class="entry-content">
											<p><?php _e( 'Try your search again.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the search.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</div>

							<?php get_sidebar(); ?>

					</div>

			</div>

<?php get_footer(); ?>
