<?php get_header(); ?>

    <div class="bd-container">
        <div class="bd-main">

            <?php if ( have_posts() ) { ?>
                <div class="page-title">
                    <h2>
                        <?php _e( 'Author', 'bd' ) ?> <?php the_author_posts_link(); ?>
                    </h2>
                </div>

                <?php if( !class_exists( 'bd_author_box',false ) ) { ?>
                    <div class="taxonomy-description">
                        <?php bd_author_box() ?>
                    </div>
                <?php } ?>
            <?php } ?>

            <div class="clear bottom24"></div>
            <div class="blog-v1">
                <?php
                $format = get_post_format();
                if( false === $format ) { $format = 'standard'; }
                get_template_part( 'loop', $format );
                ?>
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