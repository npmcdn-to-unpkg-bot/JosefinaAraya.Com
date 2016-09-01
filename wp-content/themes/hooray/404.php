<?php
get_header();
global $bd_data;
?>

    <div class="bd-container post_full_width">
        <div class="bd-main">

            <div class="blog-v1">
                <div class="oops"><?php _e('oops!','bd') ?></div>
                <div class="text-aligncenter oops-meta">
                    <?php _e('Sorry, but you are looking for something that isn\'t here, back to', 'bd'); ?>
                    <a href="index.php"><?php _e('Homepage','bd') ?></a>
                </div>
            </div><!-- .blog-v1-->

        </div><!-- .bd-main-->

    </div><!-- .bd-container -->

<?php
get_footer();