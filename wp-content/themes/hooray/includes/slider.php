<?php
/**
 *  Flex Slider
 */
global $bd_data;
$slider_speed       = $bd_data ['slider_speed'];
$slider_animation   = $bd_data ['slider_animation'];


if( bdayh_get_option( 'site_sidebar_position_no' ) ){
    $fea_h  = '640';
    $fea_w  = '1138';
} else {
    $fea_h  = '500';
    $fea_w  = '800';
}


if ( $bd_data['slider_show'] )
{
    $slider_display     = $bd_data ['slider_display'];

    if(array_key_exists('slider_category',$bd_data))
    {
        $slider_cat         = $bd_data ['slider_category'];
    }

    if(array_key_exists('slider_tag',$bd_data))
    {
        $slider_tag         = $bd_data ['slider_tag'];
    }

    $slider_nub         = $bd_data ['slider_bumber'];

    if ($slider_display == 'lates')
    {
        query_posts(array('showposts' => $slider_nub));
    }
    elseif ($slider_display == 'category')
    {
        query_posts(array('showposts' => $slider_nub, 'cat' => $slider_cat ));
    }
    elseif ($slider_display == 'tag')
    {
        query_posts(array('showposts' => $slider_nub, 'tag' => $slider_tag ));
    }
    ?>
    <div class="slider-flex">
        <div id="slider" class="slider-warpper flexslider">
            <ul class="slides">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); if ( has_post_thumbnail() ) { ?>
                    <li>
                        <?php bd_wp_thumb( $fea_w, $fea_h, '', '' ); ?>
                        <div class="slide-caption">
                            <div class="post-caption-content">
                                <?php
                                    global $bd_data;
                                    if( bdayh_get_option('date_format') ) {
                                        echo "<span itemprop='datePublished' class='date'>"; the_time( bdayh_get_option('date_format') ); echo "</span>";
                                    } else { echo "<span itemprop='datePublished' class='date updated'>"; the_time('F j, Y');  echo "</span>"; }
                                ?>
                                <h3 itemprop="name" class="post-title"><a href="<?php the_permalink()?>" rel="bookmark"><?php the_title(); ?></a></h3><!-- .post-title/-->
                                <?php if(array_key_exists('slider_excerpt_show', $bd_data )) { ?>
                                    <div itemprop="description" class="post-excerpt"><?php wp_excerpt('wp_bd2'); ?></div><!-- .post-excerpt/-->
                                    <div class="post-readmore"><a class="btn-link" href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to', 'bd'); ?> <?php the_title_attribute(); ?>"><?php _e('Read more', 'bd'); ?></a></div><!-- .post-readmore/-->
                                <?php } ?>
                            </div>
                        </div><!-- .post-caption/-->
                    </li><!-- article/-->
                <?php } endwhile; else: endif; wp_reset_query(); ?>
            </ul>
        </div>
    </div>
    <script type="text/javascript">
    jQuery(window).load(function() {
        jQuery('#slider').flexslider({
            animation       : "fade",
            easing          : "swing",
            slideshowSpeed  : <?php if($bd_data['slider_speed'] != ''){echo $bd_data['slider_speed'];} else {echo 6666;} ?>,
            animationSpeed  : <?php if($bd_data['slider_animation'] != ''){echo $bd_data['slider_animation'];} else {echo 555;} ?>,
            randomize       : false,
            pauseOnHover    : false,
            controlNav      : true,
            directionNav    : true,
            smoothHeight    : true,
            keyboard        : false,
            prevText        : '<i class="icon-chevron-left"></i>',
            nextText        : '<i class="icon-chevron-right"></i>'
        });
    });
    </script>
<?php
}
