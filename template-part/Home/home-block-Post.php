<div class="container ">
        <div class="row">
            <!-- Single Blog Area -->
            <div class="col-12 col-lg-4">
            <?php 

                $field  = get_field("blog_post","option");
                if($field){
                    $category = get_the_category($field->ID);
                  ?>
                   <div class="single-blog-area clearfix mb-100">
                    <!-- Blog Content -->
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <a href="<?php echo get_category_link($category[0]->term_id) ?>" class="post-tag"><?php echo get_the_category( $field->ID )[0]->name ; ?></a>
                            <h4><a href="<?php the_permalink($field->ID) ?>" class="post-headline"><?php echo $field->post_title ?></a></h4>
                            <p><?php echo wp_trim_words(get_the_excerpt($field->ID),30,"...") ?></p>
                            <a href="<?php the_permalink($field->ID) ?>" class="btn original-btn">Read More</a>
                        </div>
                    </div>
                  <?php
                }
            
            ?>
               
            </div>
            <!-- Single Blog Area -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="single-catagory-area clearfix mb-100 speciale-container">
                <?php 

                    $featured_category_image  = get_field("featured_category_image","option");
                    $featured_category_posts = get_field("featured_cat","option");
                    if($featured_category_image && $featured_category_posts){
                    ?>
                        <img class="h-100 featured-category-image" src="<?php  echo $featured_category_image["url"]; ?>" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="<?php echo get_category_link($featured_category_posts->term_id) ?>"><?php echo $featured_category_posts->name ?> posts</a>
                        </div>
                    <?php
                    }
                ?>
                    
                </div>
            </div>
            <!-- Single Blog Area -->
            <div class="col-12 col-md-6 col-lg-4 ">
               <?php
               $featured = get_field("featured_posts_image","option");
              if($featured){
                ?>
                    <div class="single-catagory-area clearfix mb-100 speciale-container">
                    <img class="h-100 featured-category-image" src="<?php echo $featured ?>" alt="">
                    <!-- Catagory Title -->
                    <div class="catagory-title">
                        <a href="<?php echo get_post_type_archive_link( 'post' ); ?>">latest posts</a>
                    </div>
                    </div>
                <?php
              }
               ?>
            </div>
        </div>
</div>