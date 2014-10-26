              <article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

                <header class="article-header">

                  <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>

                  <p class="byline vcard">

                  <span class="dashicons-admin-users dashicon"></span> <span class="post-author"><?php the_author_posts_link(); ?></span> <span class="dashicons-clock dashicon"></span><span class="post-time"> <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></span> <span class="dashicons-admin-comments dashicon"></span> <a class="comments-link" href="<?php the_permalink(); ?>#disqus_thread"></a>
  
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
                    the_content();
                  ?>
                </section> <?php // end article section ?>

                <footer class="article-footer">

                <section class="tweet-follow">
               <?php global $post;
                $twitter = get_the_author_meta( 'twitter', $post->post_author ); ?>
                <?php if ( $twitter ) : ?>
                <a href="https://twitter.com/<?php echo $twitter; ?>" class="twitter-follow-button" data-show-count="false" data-dnt="true">Follow @<?php echo $twitter; ?></a><script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                <?php endif; ?>
                </section>

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