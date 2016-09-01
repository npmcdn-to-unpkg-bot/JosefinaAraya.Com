<!doctype html>
<html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php global $bd_data; ?>
<?php wp_head(); ?>
</head>
<?php
$body_styles = null;
if( is_singular() ){
    $body_styles = "style='";
    if(get_post_meta(get_the_ID(), 'bd_post_background_color', true) && get_post_meta(get_the_ID(), 'bd_post_background_color', true) !='#'){
        $body_styles .=   "background:".get_post_meta(get_the_ID(), 'bd_post_background_color', true)." !important;";
    }

    if(get_post_meta(get_the_ID(), 'bd_post_background_custom', true)){
        $att_id = get_post_meta(get_the_ID(), 'bd_post_background_custom', true);
        $attachment = wp_get_attachment_image_src( $att_id, 'full' );
        $body_styles .=   "background: ".get_post_meta(get_the_ID(), 'bd_post_background_color', true)." url(".$attachment[0].")".get_post_meta(get_the_ID(), 'bd_post_background_repeat', true)." ".get_post_meta(get_the_ID(), 'bd_post_background_attachment', true)." ".get_post_meta(get_the_ID(), 'bd_post_background_x', true)." ".get_post_meta(get_the_ID(), 'bd_post_background_y', true)." !important;";
    } else {}
    $body_styles .=  "'";
}
/*
 * Site sidebar position
 */
if( bdayh_get_option( 'site_sidebar_position_type', true ) == 'site_sidebar_position_left' ){
    $site_sidebar_position_type = 'site_sidebar_position_left';
} elseif( bdayh_get_option( 'site_sidebar_position_type', true ) == 'site_sidebar_position_right' ){
    $site_sidebar_position_type = 'site_sidebar_position_right';
} elseif( bdayh_get_option( 'site_sidebar_position_type', true ) == 'site_sidebar_position_no' ){
    if( is_home() )
        $site_sidebar_position_type = 'layout-full-width';
} else {
    $site_sidebar_position_type = '';
}
?>
<body <?php body_class(); echo $body_styles; ?>>
    <?php if( bdayh_get_option( 'logo_center' ) ) { $logo_center = ' logo-center'; } ?>
    <div id="warp" class="<?php echo $site_sidebar_position_type ?>">
        <div class="bd-header<?php echo $logo_center ?>">
            <?php if( bdayh_get_option( 'show_top_bar' ) ){ ?>
                <div class="top-bar">
                    <?php if( bdayh_get_option( 'show_top_search_right' ) ){ ?>
                    <div class="top-search">
                        <?php bd_search(); ?>
                    </div><!-- .top-search -->
                    <?php } ?>

                    <?php if( bdayh_get_option( 'show_top_social_right' ) ){ ?>
                    <div class="top-social">
                        <?php echo bd_social('yes', '', 'tooldown'); ?>
                    </div><!-- .top-social -->
                    <?php } ?>

                    <?php if( bdayh_get_option( 'show_top_menu_right' ) ){ ?>
                    <div class="top-menu-area">
                        <div id="top-navigation">
                            <?php wp_nav_menu(array('theme_location' => 'topmenu', 'depth' => 5, 'container' => false, 'menu_id' => 'menu-top', 'fallback_cb' => 'nav_fallback' ) ); ?>
                        </div>
                    </div><!-- .top-social -->
                    <?php } ?>

                </div><!-- .top-bar -->
            <?php } ?>

            <?php
                if( bdayh_get_option( 'header_fix' ) ) { $header_fix = ' fixed-on'; }
                if( bdayh_get_option( 'header_fix_transparency' ) ) { $header_tran = ' header-fixed-trans'; }
            ?>
            <div id="header-fix" class="header<?php echo $header_fix; echo $header_tran; ?>">
                <div class="bd-container">
                    <?php if(bdayh_get_option('logo_displays') == 'logo_image'){ $logo_class = " logo-img"; } else { $logo_class = " logo-title"; } ?>
                    <div class="logo header-logo<?php echo $logo_class ?>" style="<?php if($bd_data['margin_logo_top']){ ?>margin-top:<?php echo $bd_data['margin_logo_top']; ?>px;<?php } ?><?php if($bd_data['margin_logo_right']){ ?>margin-right:<?php echo $bd_data['margin_logo_right']; ?>px;<?php } ?><?php if($bd_data['margin_logo_bottom']){ ?>margin-bottom:<?php echo $bd_data['margin_logo_bottom']; ?>px;<?php } ?><?php if($bd_data['margin_logo_left']){ ?>margin-left:<?php echo $bd_data['margin_logo_left']; ?>px;<?php } ?>">
                        <?php bd_logo(); ?>
                    </div><!-- .logo-->

                    <div id="navigation">
                        <?php wp_nav_menu(array('theme_location' => 'primary', 'depth' => 5, 'container' => false, 'menu_id' => 'menu-nav', 'fallback_cb' => 'nav_fallback' ) ); ?>
                    </div><!-- #navigation -->
                </div>
            </div><!-- .header -->
        </div><!-- .bd-header -->
        <div class="clear"></div>
        <div class="bd-container">
            <?php
            if( bdayh_get_option('show_header_ads') == true ){
                if($bd_data['margin_header_adv_top']){
                    $m_adv_top = 'style="margin-top: '. $bd_data['margin_header_adv_top'] .'px"';
                } else {
                    $m_adv_top ='';
                }
                if($bd_data['header_ads_code'] != ''){
                    echo '<div class="header-adv">' ."\n";
                    echo stripslashes( $bd_data['header_ads_code'] );
                    echo '<div class="clear"></div></div><!-- .header-adv/-->' ."\n";
                } else {
                    echo '<div class="header-adv" '. $m_adv_top .'><a href="'.$bd_data['header_ads_img_url'].'" title="'.$bd_data['header_ads_img_altname'].'"><img src="'.$bd_data['header_ads_img'].'" alt="'.$bd_data['header_ads_img_altname'].'" /></a><div class="clear"></div></div><!-- .header-adv/-->' ."\n";
                }
            }
            ?>
        </div><!-- .ads -->