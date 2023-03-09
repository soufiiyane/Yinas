<?php 

class LatestPosts extends WP_Widget{
    
    public function __construct() {
        parent::__construct(
            'Yinas-LatestPosts', // Base ID
            'Yinas-LatestPosts-Widget', // Name
            array( 'description' => __( 'Customized Latetest Posts Widget'),
            ) // Args
        );
    }

    public function widget( $args, $instance ) {
        extract( $args );
 
        echo $before_widget;
        $query  = new WP_Query(
            array(
                "posts_per_page" => 4,
                "type" => "post",
                'orderby' => 'date',
                'order' => 'DESC',
            ),
        );
        if($query->have_posts()){
            ?>
            <div class="sidebar-widget-area">
                <h5 class="title">Latest Posts</h5>
                <div class="widget-content">
            <?php
            while($query->have_posts()){
                $query->the_post();
                 $cat = get_the_category(get_the_ID());
                 
                if(has_post_thumbnail()){
                    ?>
                    <div class="single-blog-post d-flex align-items-center widget-post">
                            <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                        <img class="thumbnail" src="<?php echo the_post_thumbnail_url() ?>" alt="">
                        </div>
                            <!-- Post Content -->
                        <div class="post-content">
                            <a href="<?php echo get_category_link($cat[0]->term_id) ?>" class="post-tag"><?php echo $cat[0]->name;?></a>
                            <h4><a href="<?php the_permalink() ?>" class="post-headline mb-0"><?php echo get_the_title() ?></a></h4>
                            <div class="post-meta">
                            <p><a href="#"><?php echo get_the_date() ?></a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div class="single-blog-post d-flex align-items-center widget-post">
                            <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                        <img class="thumbnail" src="<?php echo get_theme_file_uri("/default-image.jpg") ?>" alt="">
                        </div>
                            <!-- Post Content -->
                        <div class="post-content">
                        <a href="<?php echo get_category_link($cat[0]->term_id) ?>" class="post-tag"><?php echo $cat[0]->name;?></a>
                            <h4><a href="<?php the_permalink() ?>" class="post-headline mb-0"><?php echo get_the_title() ?></a></h4>
                            <div class="post-meta">
                            <p><a href="<?php the_permalink() ?>"><?php echo get_the_date() ?></a></p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            wp_reset_query();
            ?>
                </div>
            </div>
            <?php
        }
        echo $after_widget;
    }

    public function form( $instance ) {

        $query  = new WP_Query(
            array(
                "posts_per_page" => 2,
                "type" => "post",
                'orderby' => 'date',
                'order' => 'DESC',
                
            ),
        );
        if($query->have_posts()){
            ?>
            <div class="sidebar-widget-area">
                <h5 class="title">Latest Posts</h5>
                <div class="widget-content">
            <?php
            if($query->have_posts()){
                ?>
                <div class="sidebar-widget-area">
                    <div class="widget-content">
                <?php
                while($query->have_posts()){
                    $query->the_post();
                    $cat = get_the_category(get_the_ID());
                    if(has_post_thumbnail()){
                        ?>
                        <div class="single-blog-post d-flex align-items-center widget-post">
                                <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                            <img  width="100px" height="100px" sty class="thumbnail" src="<?php echo the_post_thumbnail_url() ?>" alt="">
                            </div>
                                <!-- Post Content -->
                            <div class="post-content">
                            <a href="<?php echo get_category_link($cat[0]->term_id) ?>" class="post-tag"><?php echo $cat[0]->name;?></a>
                            <h4><a href="<?php the_permalink() ?>" class="post-headline mb-0"><?php echo get_the_title() ?></a></h4>
                                <div class="post-meta">
                                <p><a href="<?php the_permalink() ?>"><?php echo get_the_date() ?></a></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    else{
                        ?>
                        <div class="single-blog-post d-flex align-items-center widget-post">
                                <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                            <img width="100px" height="100px" class="thumbnail" src="<?php echo get_theme_file_uri("/default-image.jpg") ?>" alt="">
                            </div>
                                <!-- Post Content -->
                            <div class="post-content">
                            <a href="<?php echo get_category_link($cat[0]->term_id) ?>" class="post-tag"><?php echo $cat[0]->name;?></a>
                            <h4><a href="<?php the_permalink() ?>" class="post-headline mb-0"><?php echo get_the_title() ?></a></h4>
                                <div class="post-meta">
                                <p><a href="<?php the_permalink() ?>"><?php echo get_the_date() ?></a></p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                wp_reset_query();
                ?>
                    </div>
                </div>
                <?php
            }
            ?>
                </div>
            </div>
            <?php
        }

    }

}

?>