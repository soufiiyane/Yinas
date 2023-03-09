<?php 
get_header();
/*
    Template Name: Contact
*/
?>


    <?php 
        if(have_rows("contact_page_flexbile_content")){
            while(have_rows("contact_page_flexbile_content")){
                the_row();
                if(get_row_layout()=="contact_page_map_settings"){
                    $map = get_sub_field("contact_page_map");
                    if($map){
                        get_template_part("./template-part/Contact/contact", "map");
                    }
                }
                if(get_row_layout()=="contact_page_form_settings"){
                    $form = get_sub_field("contact_page_form");
                    if($form){
                        get_template_part("./template-part/Contact/contact", "form");
                    }
                }
                if(get_row_layout()=="contact_page_instagram_settings"){
                    $insta = get_sub_field("contact_page_instagram");
                    if($insta){
                        get_template_part("./template-part/Contact/contact", "instagram");
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