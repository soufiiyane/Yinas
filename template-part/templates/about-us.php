<?php 
/*
    Template Name: about-us
*/
get_header();
?>

<?php 
    if(have_rows("about_us_flexbile_content")){
        while(have_rows("about_us_flexbile_content")){
            the_row();
            if(get_row_layout()=="about_us_showcase_settings"){
                $showcase = get_sub_field('about_us_showcase');
                if($showcase){
                    get_template_part("./template-part/About/about", "showcase");
                }
            }
            if(get_row_layout()=="about_us_block_post_settings"){
                $blockpost = get_sub_field("about_us_block_post");
                if($blockpost){
                    get_template_part("./template-part/About/about", "block-post");
                    
                }
            }
            if(get_row_layout()=="about_us_posts_settings"){
                $blogpost = get_sub_field("about_us_posts");
                if($blogpost){
                    get_template_part("./template-part/About/about", "posts");
                }
            }
            if(get_row_layout()=="about_us_instagram_settings"){
                $instagramcar = get_sub_field("about_us_instagram");
                if($instagramcar){
                    get_template_part("./template-part/About/about", "instagram");
                }
            }
        }
    }
?>


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