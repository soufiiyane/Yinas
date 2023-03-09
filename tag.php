<?php 
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-9">
            <?php
            while(have_posts()){
                the_post();
                $cat = get_the_category(get_the_ID());

                $desc = get_the_content();
                if(strlen($desc)>196){
                    $strcut = substr($desc,0,196);
                    $desc = $strcut.'...<a style="margin:0 !important" href="'.get_the_permalink().'">Read More</a>' ;
                }
                ?>
                <div class="single-blog-area blog-style-2 mb-50 wow fadeInUp" data-wow-delay="0.6s" data-wow-duration="1000ms">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="single-blog-thumbnail image-blog-container">
                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                <div class="post-date">
                                    <a href="#"><?php echo get_the_date("d") ?><span><?php echo get_the_date("F") ?></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Blog Content -->
                            <div class="single-blog-content">
                                <div class="line"></div>
                                <a href="<?php echo get_category_link($cat[0]->term_id) ?>" class="post-tag"><?php echo $cat[0]->name;?></a>
                                <h4><a href="<?php  the_permalink()?>" class="post-headline"><?php echo get_the_title() ?></a></h4>
                                <p><?php echo $desc ?></p>
                                <div class="post-meta">
                                    <p>By <a href="<?php echo get_author_posts_url(get_the_author_ID()) ?>"><?php echo get_the_author() ?></a></p>
                                    <p><?php echo get_comments_number(get_the_ID()) ?> comments</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            the_posts_pagination( );
            ?>
            
        </div>
        <?php get_sidebar("archives") ?>
    </div>
</div>

<div class="subscribe-newsletter-area">
        <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-body">
                       <!-- echo  do_shortcode('[contact-form-7 id="161" title="Contact form 1"]');  -->
                       <?php echo do_shortcode('[newsletter_form form="1" ]'); ?>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php 
get_footer();
?>