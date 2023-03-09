<div class="blog-wrapper section-padding-100-0 clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Blog Area  -->

                <?php 
                    $query = new WP_Query(array(
                        "type"=>"post",
                        "orderby"=> "comment_count",
                        'order' => 'DESC',
                       "posts_per_page"=>"3"
                    ));
                    while($query->have_posts()){
                        $query->the_post();
                        $cat = get_the_category( get_the_ID())
                        ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="single-blog-area blog-style-2 mb-100">
                                    <div class="single-blog-thumbnail">
                                        <img class="about-us-image" src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                        <div class="post-date">
                                            <a href="#"><?php echo get_the_date("d") ?><span><?php  echo get_the_date("F") ?></span></a>
                                        </div>
                                    </div>
                                    <!-- Blog Content -->
                                    <div class="single-blog-content mt-50">
                                        <div class="line"></div>
                                        <a href="<?php echo get_category_link($cat[0]->term_id) ?>" class="post-tag"><?php echo $cat[0]->name;?></a>
                                        <h4><a href="<?php the_permalink(); ?>" class="post-headline"><?php echo get_the_title() ?></a></h4>
                                        <p><?php echo wp_trim_words(get_the_excerpt(),20) ?></p>
                                        <div class="post-meta">
                                        <p>By <a href="<?php echo get_author_posts_url(get_the_author_ID()) ?>"><?php echo get_the_author() ?></a></p>
                                        <p><?php echo get_comments_number(get_the_ID()) ?> comments</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                    wp_reset_postdata();
                    ?>
                
            </div>
        </div>
    </div>