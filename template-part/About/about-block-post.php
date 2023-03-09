<div class="blog-wrapper section-padding-100-0 clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Blog Area -->
                <div class="col-12 col-lg-8">
                    <div class="single-blog-area clearfix mb-100">
                        <!-- Blog Content -->
                        <?php
                            $name = get_field("website_name","option");
                            $title = get_field("header_title","option");    
                            $summry_left = get_field("summry_text_left","option");    
                            $summry_right = get_field("summry_text_right","option");                    
                        ?>
                        <div class="single-blog-content">
                            <div class="line"></div>
                            <?php 
                                if($name){
                                    echo '<a href="#" class="post-tag">'.$name.'</a>';
                                }
                                else{
                                    echo '<a href="#" class="post-tag">'.get_bloginfo("name").'</a>';
                                }
                                if($title){
                                    echo '<h4><a href="#" class="post-headline">'.$title.'</a></h4>';
                                }
                                else{
                                    echo '<h4><a href="#" class="post-headline">'.get_bloginfo("description").'</a></h4>';
                                }
                                if($summry_left){
                                    echo '<p class="mb-3">'.$summry_left.'</p>';
                                }
                                else{
                                    echo '<p class="mb-3">Curabitur venenatis efficitur lorem sed tempor. Integer aliquet tempor cursus. Nullam vestibulum convallis risus vel condimentum. Nullam auctor lorem in libero luctus, vel volutpat quam tincidunt. Morbi sodales, dolor id ultricies dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris tempus vestibulum mauris quis aliquam. Integer accumsan sodales odio, id tempus velit ullamcorper id. Quisque at erat eu libero consequat tempus.slacus sit amet augue sodales, vel cursus enim tristique.</p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- Single Blog Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-catagory-area clearfix mb-100 speciale-container">
                        <?php
                        $about_us_right_tab_image = get_field("about_us_right_tab_image","option");
                        ?>
                        <img class="h-100 about-image"  src="<?php echo $about_us_right_tab_image ?>" alt="">
                        <!-- Catagory Title -->
                        <div class="catagory-title">
                            <a href="<?php echo get_post_type_archive_link( 'post' ); ?>">latest posts</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>