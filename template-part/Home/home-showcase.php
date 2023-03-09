 <!-- ##### Hero Area Start ##### -->
 <div class="hero-area mb-5 ">
                    <!-- Hero Slides Area -->
                    <div class="hero-slides owl-carousel">
                        <?php 
                    $categories = get_categories( array(
                        'orderby' => 'date',
                        'order'   => 'DESC',
                        'hide_empty'      => false,
                        "number" => "3"
                    ));

                    foreach( $categories as $category ) {
                        $image= get_field('category_image', 'category_'.$category->term_id);
                        ?>
                            <div class="single-hero-slide bg-img" style="background-image: url(<?php echo $image["url"]; ?>);">
                            <div class="container h-100">
                                <div class="row h-100 align-items-center">
                                    <div class="col-12">
                                        <div class="slide-content text-center">
                                            <div class="post-tag">
                                                <a href="<?php echo get_category_link($category->term_id) ?>" data-animation="fadeInUp"><?php echo $category->name ?></a>
                                            </div>
                                            <h2 data-animation="fadeInUp" data-delay="250ms"><a href="<?php echo get_category_link($category->term_id) ?>"><?php echo $category->description ?></a></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        <?php
                    } 
                ?>
        </div>
 </div>