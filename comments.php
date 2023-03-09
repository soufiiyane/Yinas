<?php
if (post_password_required()) {
    return;
}
?>
    <?php $fields =  array(
        'author' => '
            <div class="col-12 col-md-6">
                <div class="group">
                <input type="text" name="author" id="name" value="' . esc_attr($commenter['comment_name']) . '"  required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label for="name">Name</label>
                </div>
            </div>'
            ,
            'email' => '
            <div class="col-12 col-md-6">
                <div class="group">
                    <input type="email" name="email" id="email" required value="' . esc_attr($commenter['comment_author_email']) . '"  required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Email</label>
                </div>
            </div>'
            ,
             

                 
    );
    $comments_args = array(
        'fields' =>  $fields,
        'label_submit' => 'Send My Comment',
        'submit_button'        => '<div class="col-12">
                <button type="submit" class="btn original-btn">Reply</button>
            </div>',
            'class_form' => 'row'
    );
    // wp_list_comments();
    comment_form($comments_args);

    
?>