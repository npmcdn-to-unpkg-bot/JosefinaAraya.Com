<?php
global $bd_data;

if( bdayh_get_option( 'fea_width' ) ) {
    $fea_w  = bdayh_get_option( 'fea_width' );
} else {
    $fea_w  = '800';
}
if( bdayh_get_option( 'fea_height' ) ) {
    $fea_h  = bdayh_get_option( 'fea_height' );
} else {
    $fea_h  = '500';
}

if( bdayh_get_option( 'site_sidebar_position_type', true ) == 'site_sidebar_position_no' ){
    $fea_w  = '1138';
    $fea_h  = '640';
}

$bd_criteria_display = get_post_meta(get_the_ID(), 'bd_criteria_display', true);

if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <article itemscope itemtype="http://schema.org/Recipe" id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
            <?php
                global $post;
                switch( get_post_format() ){
                    case 'gallery':
                        $format_class = 'format-gallery';
                        break;
                    case 'aside':
                        $format_class = 'format-aside';
                        break;
                    case 'link':
                        $format_class = 'format-links';
                        break;
                    case 'image':
                        $format_class = 'format-image';
                        break;
                    case 'quote':
                        $format_class = 'format-quote';
                        break;
                    case 'video':
                        $format_class = 'format-video';
                        break;
                    case 'audio':
                        $format_class = 'format-audio';
                        break;
                    case 'chat':
                        $format_class = 'format-status';
                        break;
                    default:
                        $format_class = 'admin-post';
                        break;
                }
                $cat_link = get_the_category_list( __( ", ", "Used between list items, there is a space after the comma.", "bd" ) );
                $bd_custom_post_color = get_post_meta(get_the_ID(), 'bd_custom_post_color', true);
            ?>
            <div class="divider-colors" <?php if( strlen( $bd_custom_post_color ) != 1 and $bd_custom_post_color != '' ){ echo 'style= "background-color: '. $bd_custom_post_color .'"'; } else {} ?>></div>

            <?php if( bdayh_get_option( 'post_format_icon' ) == 0 ) { if( has_post_format('gallery') || has_post_format('aside') || has_post_format('link') || has_post_format('image') || has_post_format('quote') || has_post_format('video') || has_post_format('audio') ) { ?>
                <span class="article-formats" <?php if( strlen( $bd_custom_post_color ) != 1 and $bd_custom_post_color != '' ){ echo 'style= "background-color: '. $bd_custom_post_color .'"'; } else {} ?>><a href="<?php echo get_permalink(); ?>"><i class="bdico dashicons-<?php echo $format_class ?>"></i></a></span>
            <?php } else { } } ?>

            <?php if( bdayh_get_option( 'category_top_post' ) == 0 ) { if ( has_post_thumbnail() || has_post_format('gallery') || has_post_format('image') || has_post_format('video') || has_post_format('audio') ) { ?>
                <span itemprop="recipeCategory" class="cat-links" <?php if( strlen( $bd_custom_post_color ) != 1 and $bd_custom_post_color != '' ){ echo 'style= "background-color: '. $bd_custom_post_color .'"'; } else {} ?>><?php echo $cat_link ?></span>
            <?php } else {?>
                
                  <span itemprop="recipeCategory" class="cat-links" <?php if( strlen( $bd_custom_post_color ) != 1 and $bd_custom_post_color != '' ){ echo 'style= "background-color: '. $bd_custom_post_color .'"'; } else {} ?>><?php echo $cat_link ?></span>
            <?php } } ?>


            <?php if( strlen( $bd_custom_post_color ) != 1 and $bd_custom_post_color != '' ){ echo '<style type="text/css"> #post-'. get_the_ID() .' a.more-link {background-color:'. $bd_custom_post_color .' } #post-'. get_the_ID() .' .entry-meta a { color :'. $bd_custom_post_color .' }</style>'; } else {} ?>
            <div>
            <?php
                $post_type = get_post_meta(get_the_ID(), 'bd_post_type', true);

                if ( has_post_format('gallery')) {
                    if ( has_post_thumbnail() ) { bd_wp_gallery( $fea_w, $fea_h, 'lightbox' ); }
                }
                elseif (has_post_format('video')){
                    global $post;
                    $id             = get_post_meta($post->ID, 'bd_video_url', true);
                    $embed          = get_post_meta($post->ID, 'bd_embed_code', true);
                    if($id || $embed){bd_wp_video( $fea_w , $fea_h );}
                }
                elseif (has_post_format('image')){
                    if ( has_post_thumbnail() ) { bd_home_thumb( $fea_w, $fea_h, 'lightbox' ); }
                }
                elseif (has_post_format('audio')){
                    global $post;
                    $url             = get_post_meta($post->ID, 'bd_soundcloud_url', true);
                    if ( has_post_thumbnail() ) { bd_home_thumb( $fea_w, $fea_h, 'lightbox' ); }
                    if($url){bd_wp_sc();}
                }
                elseif ( has_post_format('standard')) {
                    if ( has_post_thumbnail() ) { bd_home_thumb( $fea_w, $fea_h, 'lightbox' ); }
                }
                elseif($post_type == 'post_googlemap') {
                    $src            = get_post_meta(get_the_ID(), 'bd_google_maps_url', true);
                    $width          = 800;
                    $height         = 330;
                    echo '<div class="post-image google-box"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe></div>';
                }
                elseif ( is_single() ) {
                    if($post_type == 'post_slider'){
                            if ( has_post_thumbnail() ) { bd_wp_gallery( $fea_w, $fea_h, 'lightbox' ); }
                    }
                    elseif($post_type == 'post_soundcloud'){
                            global $post;
                            $url             = get_post_meta($post->ID, 'bd_soundcloud_url', true);
                            if ( has_post_thumbnail() ) { bd_home_thumb( $fea_w, $fea_h, 'lightbox' ); }
                            if($url){bd_wp_sc();}
                    }
                    elseif($post_type == 'post_image'){
                            if ( has_post_thumbnail() ) { bd_home_thumb( $fea_w, $fea_h, 'lightbox' ); }
                    }
                    elseif($post_type == 'post_googlemap') {
                        $src            = get_post_meta(get_the_ID(), 'bd_google_maps_url', true);
                        $width          = 800;
                        $height         = 330;
                        echo '<div class="post-image google-box"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe></div>';
                    }
                    elseif($post_type == 'post_video'){
                        global $post;
                        $id             = get_post_meta($post->ID, 'bd_video_url', true);
                        $embed          = get_post_meta($post->ID, 'bd_embed_code', true);
                        if($id || $embed){bd_wp_video( '800', '350' );}
                    }
                    elseif( bdayh_get_option( 'post_featured_image' ) ){
                        if ( has_post_thumbnail() ) { bd_home_thumb( $fea_w, $fea_h, 'lightbox' ); }
                    }
                    else { }
                } elseif($post_type == 'post_image'){
                    if ( has_post_thumbnail() ) { bd_home_thumb( $fea_w, $fea_h, 'lightbox' ); }
                } elseif( bdayh_get_option( 'home_featured_image' ) ){
                    if ( has_post_thumbnail() ) { bd_home_thumb( $fea_w, $fea_h, 'lightbox' ); }
                } else { }
            ?>
            <?php
                if (has_post_format('link')){
                    $bd_post_link = get_post_meta(get_the_ID(), 'bd_post_link_url', true);
                    $bd_post_link_text = get_post_meta(get_the_ID(), 'bd_post_link_text', true);

                    if($bd_post_link || $bd_post_link_text ){
                        echo '<h1 itemprop="name" class="entry-title"><a target="_blank" href="' . esc_url( $bd_post_link ) . '" rel="bookmark">'. $bd_post_link_text .'</a></h1>' ;
                    }
                    else
                    {
                        the_title( '<h1 itemprop="name" class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                    }
                } elseif (has_post_format('aside')){
                    if ( is_single() ) {
                        the_title( '<h1 itemprop="name" class="entry-title">', '</h1>' );
                    }
                } elseif (has_post_format('quote')){
                    $bd_post_q_author = get_post_meta(get_the_ID(), 'bd_post_quote_author', true);
                    $bd_post_q_text = get_post_meta(get_the_ID(), 'bd_post_quote_text', true);

                    if($bd_post_q_text || $bd_post_q_author ){
                        echo '<h1 itemprop="name" class="entry-title">'. $bd_post_q_text .'</h1><div class="q-content"><p> - &nbsp; '. $bd_post_q_author .' &nbsp; - </p></div>' ;
                        ?>
                        <span style="display:none" class="updated"><?php the_time( 'Y-m-d' ); ?></span>
                        <div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><?php the_author_posts_link(); ?></strong></div>
                        <?php
                    }
                    else
                    {
                        the_title( '<h1 itemprop="name" class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                    }
                } elseif ( is_single() ) {
                    the_title( '<h1 itemprop="name" class="entry-title">', '</h1>' );
                } else {
                    the_title( '<h1 itemprop="name" class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
                }
            ?>
            </div><!-- post media -->
            <?php
                if ( is_single() ) {
                    bd_post_meta();
                }
                elseif( is_page() ){
                    if( bdayh_get_option( 'mmeta_pages' ) ){
                        bd_post_meta();
                    }
                }
                else {
                    if ( has_post_format('aside') || has_post_format('link') || has_post_format('quote') ) {

                    } else {
                        if( bdayh_get_option( 'home_post_meta' ) == 1 ) {
                        } else { bd_post_meta(); }
                    }
                }
            ?>

            <?php $cc = get_the_content(); if( $cc != '' ){ $the_content_class = " the-content-class"; } else { $the_content_class = ""; }  ?>
            <div itemprop="description" class="entry entry-content<?php echo $the_content_class; ?>">
                <?php if ( is_single() ){ ?>
                    <?php
                        echo bd_post_above_ads();
                        if($bd_criteria_display == 't'){ bd_post_rate(); } ?>
                <?php } ?>
                <?php
                    if ( bdayh_get_option( 'blog_display' ) == 'excerpt' )
                    {
                        if ( is_home() || is_category() || is_author() || is_archive() || is_search() )
                        {
                            ?><p><?php wp_excerpt( 'wp_bd5' ); ?></p><?php echo '<p><a href="'. get_permalink() .'" class="more-link">'. __('Leer Mas', 'bd').'</a></p><!-- .post-readmore/-->' ?><?php
                        }
                        else
                        {
                            the_content();
                        }
                    }
                    else
                    {
                        the_content( __( 'Read More', 'bd' ) );

                        wp_link_pages( array(
                            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bd' ) . '</span>',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) );
                    }
                ?>
                <?php if ( is_single() ){ ?>
                    <?php echo bd_post_below_ads() ?>
                    <?php if($bd_criteria_display == 'bottom'){ bd_post_rate(); } ?>
                    <?php if($bd_data['post_tags']): ?>
                        <div class="clear"></div>
                        <div class="tagcloud">
                            <?php the_tags(' ', ' ', ' '); ?>
                        </div><!-- .post-tags/-->
                    <?php endif; ?>
                <?php } ?>

                <div class="clear"></div>
                <?php if( bdayh_get_option( 'social_sharing_box_home' ) ) { if( is_home() ){ ?>
                <div class="home-post-share">
                    <?php bd_in ('social-sharing'); // Get Social Sharing ?>
                </div><!-- home-post-share -->
                <?php } } ?>
            </div><!-- .entry-content -->
            <div class="clear"></div>
        </article>
    <?php
    endwhile;
else :
    ?>
    <article class="post-entry">
        <div class="oops"><?php _e('oops!','bd') ?></div>
        <div class="text-aligncenter oops-meta">
            <?php _e('Sorry, but you are looking for something that isn\'t here, back to', 'bd'); ?>
            <a href="index.php"><?php _e('Homepage','bd') ?></a>
        </div>
    </article>
<?php endif;