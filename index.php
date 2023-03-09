<?php get_header() ?>


<div class="subscribe-newsletter-area">
        <div class="modal fade" id="subsModal" tabindex="-1" role="dialog" aria-labelledby="subsModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="modal-body">
                       <?php  echo  do_shortcode('[contact-form-7 id="161" title="Contact form 1"]'); ?>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php get_footer() ?>
