<?php
/**
* Template Name: FAQs
*/

get_header(); ?>

<div class="content-holder clearfix">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
                <div class="row-fluid">
                    <div id="title-header" class="span12">
                    <div class="page-header">
                   <?php get_template_part("static/static-customtitle"); ?>
                        </div>
                    </div>
                </div>
				
                        <?php get_template_part("loop/loop-faq-content"); ?>

                <div class="row-fluid">
                    <div class="span12" id="content">
					<article class="post__holder">
                        <?php get_template_part("loop/loop-faq"); ?>
						</article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer">
<?php get_template_part('wrapper/wrapper-footer'); ?>
</footer>
<?php get_footer(); ?>