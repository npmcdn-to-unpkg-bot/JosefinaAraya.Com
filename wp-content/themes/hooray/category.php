<?php get_header(); ?>

    <div class="bd-container">
        <div class="bd-main">

            <?php if ( have_posts() ) { ?>
                <div class="page-title"><h2><?php single_cat_title(); ?></h2></div>
                <?php
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) {
                        printf( '<div class="taxonomy-description">%s</div>', $term_description );
                    }
                ?>
            <?php } ?>

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