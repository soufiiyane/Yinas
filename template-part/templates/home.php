<?php
/*
    Template Name: Home
*/
get_header();
?>


<?php 
    if(have_rows("home_page_flexible_content")){
        while(have_rows("home_page_flexible_content")){
            the_row();
            if(get_row_layout()=="showcase_home_page_settings"){
                $showcase = get_sub_field('home_hero_showcase');
                if($showcase){
                    get_template_part("./template-part/Home/home", "showcase");
                }
            }
            if(get_row_layout()=="home_block_post_settings"){
                $blockpost = get_sub_field("home_block_post");
                if($blockpost){
                    get_template_part("./template-part/Home/home", "block-Post");
                    
                }
            }
            if(get_row_layout()=="home_page_blog_settings"){
                $blogpost = get_sub_field("home_blog_feed");
                if($blogpost){
                    get_template_part("./template-part/Home/home", "blog");
                }
            }
            if(get_row_layout()=="instagram_carousel_settings"){
                $instagramcar = get_sub_field("instagram_carousel");
                if($instagramcar){
                    get_template_part("./template-part/Home/home", "instagram");
                }
            }
        }
    }
?>



<!-- Subscribe Modal -->
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