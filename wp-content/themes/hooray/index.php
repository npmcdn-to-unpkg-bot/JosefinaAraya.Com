
<?php get_header(); ?>
    <div class="bd-container">
        <div class="bd-main">
            <?php bd_in( 'slider' ); ?>
            <div class="blog-v1 blog-v">
                <div id="containn">
                <?php
                    $format = get_post_format();
                    if( false === $format ) { $format = 'standard'; }
                        get_template_part( 'loop', $format );
                ?>
                </div>
            </div><!-- .blog-v1-->
            <?php
                echo '<div class="clear"></div>';
                bd_pagenavi($pages = '', $range = 2);
            ?>
        </div><!-- .bd-main-->
        <?php get_sidebar(); ?>
    </div><!-- .bd-container -->
<?php
get_footer();