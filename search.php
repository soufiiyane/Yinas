<?php 
get_header();
?>
<?php
$query = _sanitize_text_fields(get_search_query()) ;
$allsearch = new WP_Query("s=$s&showposts=0"); 
// echo $allsearch->found_posts.' results found.';
// echo get_search_query();

?>
<div class="container">
<?php 
        
        echo '<p class="para-results">'.$allsearch->found_posts.' results found for <stron>'.get_search_query().'</stron></p>';
        ?>
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
                                    <a href="#"><?php echo get_the_date("d") ?><span>march</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Blog Content -->
                            <div class="single-blog-content">
                                <div class="line"></div>
                                <a href="<?php echo get_category_link($cat[0]->term_id) ?>" class="post-tag"><?php echo $cat[0]->name;?></a>
                                <h4><a href="#" class="post-headline"><?php echo get_the_title() ?></a></h4>
                                <p><?php echo $desc ?></p>
                                <div class="post-meta">
                                    <p>By <a href="#"><?php echo get_the_author() ?></a></p>
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
<?php get_footer() ?>