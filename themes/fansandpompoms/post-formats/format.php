
              <?php
                /*
                 * This is the default post format.
                 *
                 * So basically this is a regular post. if you don't want to use post formats,
                 * you can just copy ths stuff in here and replace the post format thing in
                 * single.php.
                 *
                 * The other formats are SUPER basic so you can style them as you like.
                 *
                 * Again, If you want to remove post formats, just delete the post-formats
                 * folder and replace the function below with the contents of the "format.php" file.
                */
              ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">

                  <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

                  <p class="byline vcard">

                  <span class="dashicons-admin-users dashicon"></span> <span class="post-author"><?php the_author_posts_link(); ?></span> <span class="dashicons-clock dashicon"></span><span class="post-time"> <?php echo time_ago(); ?></span> <span class="dashicons-admin-comments dashicon"></span> <a class="comments-link" href="<?php the_permalink(); ?>#disqus_thread"></a>
  
                  </p>

                </header> <?php // end article header ?>

                <section class="entry-content cf" itemprop="articleBody">

                <section class="post-loop-thumb cf">

                <?php 
                  if ( has_post_thumbnail() ) { ?> 
                    <?php the_post_thumbnail('fapp-thumb-800'); ?>
                  <?php } 
                ?>
                </section>

                <section class="social-sharing sharing-post">
                     <?php do_action("mashshare"); ?>
                </section>

                  <?php
                    // the content (pretty self explanatory huh)
                    the_content();

                    /*
                     * Link Pages is used in case you have posts that are set to break into
                     * multiple pages. You can remove this if you don't plan on doing that.
                     *
                     * Also, breaking content up into multiple pages is a horrible experience,
                     * so don't do it. While there are SOME edge cases where this is useful, it's
                     * mostly used for people to get more ad views. It's up to you but if you want
                     * to do it, you're wrong and I hate you. (Ok, I still love you but just not as much)
                     *
                     * http://gizmodo.com/5841121/google-wants-to-help-you-avoid-stupid-annoying-multiple-page-articles
                     *
                    */
                    wp_link_pages( array(
                      'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bonestheme' ) . '</span>',
                      'after'       => '</div>',
                      'link_before' => '<span>',
                      'link_after'  => '</span>',
                    ) );
                  ?>
                </section> <?php // end article section ?>

                <footer class="article-footer">

                  <section class="social-sharing">
                     <?php do_action("mashshare"); ?>
                  </section>

                  <section class="related-posts">
                  <?php related_posts(); ?>
                  </section>

                  <?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>

                  

                </footer> <?php // end article footer ?>

                <?php comments_template(); ?>

              </article> <?php // end article ?>