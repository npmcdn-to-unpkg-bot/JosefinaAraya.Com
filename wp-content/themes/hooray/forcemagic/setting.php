<?php
/**
 *  Options
 */
$bd_options["general_options"]["bd_general"][] = array
(
    "name" 		=> "General Options",
    "type"  	=> "subtitle"
);
$bd_options["general_options"]["bd_general"][] = array
(
    "name" 		=> "Sidebar position",
    "id"    	=> "site_sidebar_position",
    "type"  	=> "sidebarpo"

);
$bd_options["general_options"]["bd_general"][] = array(
    "name" 		=> "Date Format",
    "id"    	=> "date_format",
    "exp"		=> '<a href="http://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">Formatting Date and Time</a>',
    "type"  	=> "text"
); // Date Format

$bd_options["general_options"]["bd_general"][] = array(
    "name" 		=> "Responsive Design",
    "id"    	=> "responsive",
    "exp"		=> "Check this box to use the responsive design features. If left unchecked then the fixed layout is used.",
    "type"  	=> "checkbox"

); // Responsive

$bd_options["general_options"]["bd_general"][] = array(
    "name" 		=> "Notify On Theme Updates",
    "id"    	=> "notify_theme",
    "exp"		=> "Check the box to enable the Notify On Theme Updates.",
    "type"  	=> "checkbox"

); // Notify On Theme Updates

$bd_options["general_options"]["bd_general"][] = array(
    "name" 		=> "Allow Comments on Pages",
    "id"    	=> "comments_pages",
    "exp"		=> "Check the box to allow comments on regular pages.",
    "type"  	=> "checkbox"

); // Allow Comments on Pages

$bd_options["general_options"]["bd_general"][] = array
(
    "name" 		=> "Meta on pages",
    "id"    	=> "mmeta_pages",
    "exp"		=> "Enable or Disable : Meta on pages",
    "type"  	=> "checkbox"

);
$bd_options["general_options"]["bd_general"][] = array
(
    "name" 		=> "Custom Dashboard Logo",
    "id"    	=> "dashboard_logo",
    "exp"		=> "Custom Dashboard Logo",
    "type"  	=> "upload"

);
$bd_options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Favicon Icons",
    "type"  	=> "subtitle"
);
$bd_options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Custom Favicon",
    "id"    	=> "favicon",
    "exp"		=> "You can put url of an ico image that will represent your website favicon (16px x 16px)",
    "type"  	=> "upload"

);
$bd_options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Apple iPhone Icon Upload",
    "id"    	=> "iphone_icon_upload",
    "exp"		=> "Icon for Apple iPhone (57px x 57px)",
    "type"  	=> "upload"

);
$bd_options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Apple iPhone Retina Icon Upload",
    "id"    	=> "iphone_icon_retina_upload",
    "exp"		=> "Icon for Apple iPhone Retina Version (114px x 114px)",
    "type"  	=> "upload"

);
$bd_options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Apple iPad Icon Upload",
    "id"    	=> "ipad_icon_upload",
    "exp"		=> "Icon for Apple iPhone (72px x 72px)",
    "type"  	=> "upload"

);
$bd_options["general_options"]["bd_favicon"][] = array
(
    "name" 		=> "Apple iPad Retina Icon Upload",
    "id"    	=> "ipad_icon_retina_upload",
    "exp"		=> "Icon for Apple iPad Retina Version (144px x 144px)",
    "type"  	=> "upload"

);

$bd_options["general_options"][] = array
(
    "name" 		=> "Tracking Code",
    "id"    	=> "google_analytics",
    "exp"		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
    "type"  	=> "textarea"

);
$bd_options["general_options"][] = array
(
    "name" 		=> "Space before &lt;/head&gt;",
    "id"    	=> "space_head",
    "exp"		=> "Add code before the &lt;/head&gt; tag.",
    "type"  	=> "textarea"

);
$bd_options["general_options"][] = array
(
    "name" 		=> "Space before &lt;/body&gt;",
    "id"    	=> "space_body",
    "exp"		=> "Add code before the &lt;/body&gt; tag.",
    "type"  	=> "textarea"
);

/*
 * Header
 */

$bd_options["header_settings"]["bd_header"][] = array
(
    "name" 		=> "Header Options",
    "type"  	=> "subtitle"
);
$bd_options["header_settings"]["bd_header"][] = array
(
    "name" 		=> "Header Fixed",
    "id"    	=> "header_fix",
    "exp"		=> "Check to enable the Header Fixed, uncheck to disable",
    "type"  	=> "checkbox",
);
$bd_options["header_settings"]["bd_header"][] = array(
    "name" 		=> "Header Fixed Transparency",
    "id"    	=> "header_fix_transparency",
    "exp"		=> "Check to enable the Header Fixed Transparency, uncheck to disable",
    "type"  	=> "checkbox",
);
$bd_options["header_settings"]["bd_topbar_options"][] = array
(
    "name" 		=> "Topbar Options",
    "type"  	=> "subtitle"
);
$bd_options["header_settings"]["bd_topbar_options"][] = array
(
    "name" 		=> "Show Top bar ?",
    "id"    	=> "show_top_bar",
    "exp"		=> "Check to enable the Top bar, uncheck to disable",
    "type"  	=> "checkbox",
    "class"  	=> "col50"
);

$bd_options["header_settings"]["bd_topbar_options"][] = array
(
    "name" 		=> "Show Search ?",
    "id"    	=> "show_top_search_right",
    "exp"		=> "Check to enable the Search, uncheck to disable",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);

$bd_options["header_settings"]["bd_topbar_options"][] = array
(
    "name" 		=> "Show Top Menu ?",
    "id"    	=> "show_top_menu_right",
    "exp"		=> "Check to enable the Top Menu, uncheck to disable",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["header_settings"]["bd_topbar_options"][] = array
(
    "name" 		=> "Show Social Links ?",
    "id"    	=> "show_top_social_right",
    "exp"		=> "Check to enable the Social Links, uncheck to disable",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);

/**
 * Logo
 */

$bd_options["header_settings"]["bd_logo"][] = array
(
    "name" 		=> "Logo Settings",
    "type"  	=> "subtitle"
);
$bd_options["header_settings"]["bd_logo"][] = array
(
    "name" 		=> "Logo display",
    "id" 		=> "logo_displays",
    "exp"		=> "choose Logo display .",
    "type"  	=> "radio",
    "options"   => array
    (
        "logo_title"       => "Display Site Title" ,
        "logo_image"       => "Custom Image" ,
    ),
);
$bd_options["header_settings"]["bd_logo"][] = array
(
    "name" 		=> "Logo Center",
    "id"    	=> "logo_center",
    "exp"		=> "Check to enable the Logo Center, uncheck to disable",
    "type"  	=> "checkbox",
);

$bd_options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "Logo Upload",
    "type"  	=> "subtitle"
);
$bd_options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "Logo",
    "id"    	=> "logo_upload",
    "exp"		=> "Please choose an image file for your logo.",
    "type"  	=> "upload"

);
$bd_options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "Logo (Retina Version @2x)",
    "id"    	=> "logo_retina",
    "exp"		=> "Please choose an image file for the retina version of the logo. It should be 2x the size of main logo.",
    "type"  	=> "upload"

);
$bd_options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "Standard Logo Width for Retina Logo",
    "id"    	=> "retina_logo_width",
    "exp"       =>  "If retina logo is uploaded, please enter the standard logo (1x) version width, do not enter the retina logo width.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(pixels)",
    "max" 		=> 1000,
    "min" 		=> 0
);
$bd_options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "Standard Logo Height for Retina Logo",
    "id"    	=> "retina_logo_height",
    "exp"       =>  "If retina logo is uploaded, please enter the standard logo (1x) version height, do not enter the retina logo height.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(pixels)",
    "max" 		=> 1000,
    "min" 		=> 0
);
$bd_options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "logo Top Margin",
    "id"    	=> "margin_logo_top",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0

);
$bd_options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "logo Right Margin",
    "id"    	=> "margin_logo_right",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0

);
$bd_options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "logo Bottom Margin",
    "id"    	=> "margin_logo_bottom",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0

);
$bd_options["header_settings"]["logo_settings"][] = array
(
    "name" 		=> "logo Left Margin",
    "id"    	=> "margin_logo_left",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0

);
/**
 * Header Adv
 */
$bd_options["header_settings"][] = array
(
    "name" 		=> "Header Advertising",
    "type"  	=> "subtitle"
);
$bd_options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Enable or Disable : Header Advertising",
    "id"    	=> "show_header_ads",
    "type"  	=> "checkbox"
);
$bd_options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Header Advertising Code html ( Google ads)",
    "exp" 		=> "Header Advertising Code html ( Google ads).",
    "id"    	=> "header_ads_code",
    "type"  	=> "textarea"
);
$bd_options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Header Advertising Top Margin",
    "id"    	=> "margin_header_adv_top",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0

);
$bd_options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Header Advertising upload image",
    "exp" 		=> "Header Advertising upload image.",
    "id"    	=> "header_ads_img",
    "type"  	=> "upload"
);
$bd_options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Header Advertising Url",
    "exp" 		=> "Header Advertising Url.",
    "id"    	=> "header_ads_img_url",
    "type"  	=> "text"
);
$bd_options["header_settings"]["header_advertising"][] = array
(
    "name" 		=> "Header Advertising Alt name",
    "exp" 		=> "Header Advertising Alt name.",
    "id"    	=> "header_ads_img_altname",
    "type"  	=> "text"
);

$bd_options["blog_options"]["bd_blog"][] = array
(
    "name" 		=> "Blog Options",
    "type"  	=> "subtitle"
);

$bd_options["blog_options"]["bd_blog"][] = array
(
    "name" 		=> "Blog Display",
    "id" 		=> "blog_display",
    "exp"		=> "will appears in all archives pages like categories and tags and search and in homepage blog style",
    "type"  	=> "radio",
    "options"   => array
    (
        "excerpt"       => "Excerpt + Featured image",
        "content"       => "Content"
    ),
);


$bd_options["blog_options"]["bd_ele"][] = array
(
    "name" 		=> "Blog Elements",
    "type"  	=> "subtitle"
);
$bd_options["blog_options"]["bd_ele"][] = array(
    "name" 		=> "Format Icon In Top Post",
    "exp"		=> "Check to disable the Format Icon Top Post, uncheck to enable",
    "id"    	=> "post_format_icon",
    "type"  	=> "checkbox"
); /* Format Icon Top Post */
$bd_options["blog_options"]["bd_ele"][] = array(
    "name" 		=> "Category Name In Top Post",
    "exp"		=> "Check to disable the Category Name In Top Post, uncheck to enable",
    "id"    	=> "category_top_post",
    "type"  	=> "checkbox"
); /* Format Icon Top Post */
$bd_options["blog_options"]["bd_ele"][] = array(
    "name" 		=> "Review",
    "exp"		=> "Check to enable the Review in Home page, uncheck to disable",
    "id"    	=> "home_review",
    "type"  	=> "checkbox"
);
$bd_options["blog_options"]["bd_ele"][] = array
(
    "name" 		=> "Post meta",
    "exp"		=> "Check to disable the Post meta in Home page, uncheck to enable",
    "id"    	=> "home_post_meta",
    "type"  	=> "checkbox"
);


$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Featured Images",
    "type"  	=> "subtitle"
);
$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Posts Featured Images in Home page",
    "exp"		=> "Check to enable the Featured Images in Home page, uncheck to disable",
    "id"    	=> "home_featured_image",
    "type"  	=> "checkbox"
);
$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Posts Featured Image In Article ",
    "exp"		=> "Check to enable the Featured Images in Article, uncheck to disable",
    "id"    	=> "post_featured_image",
    "type"  	=> "checkbox"

);

$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Featured Images",
    "id" 		=> "all_featured_image",
    "exp"		=> "Choose Featured Images open",
    "type"  	=> "radio",
    "options"   => array
    (
        "none"       => "None" ,
        "fea_lightbox"       => "Light Box" ,
        "fea_link"       => "Post Link" ,
    ),
);
$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Gallery Featured Images",
    "id" 		=> "gallery_featured_image",
    "exp"		=> "Choose Gallery Featured Images open",
    "type"  	=> "radio",
    "options"   => array
    (
        "none"       => "None" ,
        "fea_lightbox"       => "Light Box" ,
        "fea_link"       => "Post Link" ,
    ),
);

$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Featured Images Width",
    "id"    	=> "fea_width",
    "exp"       => "Enter the Featured Images Width width ( Default 800px ) .",
    "type"  	=> "ui_slider",
    "unit" 		=> "(pixels)",
    "max" 		=> 10000,
    "min" 		=> 0
);
$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Featured Images Height",
    "id"    	=> "fea_height",
    "exp"       => "Enter the Featured Images Width Height ( Default 500px ) .",
    "type"  	=> "ui_slider",
    "unit" 		=> "(pixels)",
    "max" 		=> 10000,
    "min" 		=> 0
);

/**
 * Slider
 */
$bd_options["sliders_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider",
    "id"    	=> "slider_show",
    "exp"    	=> "Check to enable the Slider, uncheck to disable",
    "type"  	=> "checkbox"
);

$bd_options["sliders_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider excerpt",
    "id"    	=> "slider_excerpt_show",
    "exp"    	=> "Check to enable the Slider excerpt, uncheck to disable",
    "type"  	=> "checkbox"
);

$bd_options["sliders_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider Speed",
    "id"    	=> "slider_speed",
    "exp"    	=> "Select the Slider speed, 1000 = 1 second.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(second)",
    "max" 		=> 50000,
    "min" 		=> 0
);

$bd_options["sliders_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider Animation Speed",
    "id"    	=> "slider_animation",
    "exp"    	=> "Select the animation speed, 1000 = 1 second.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(second)",
    "max" 		=> 5000,
    "min" 		=> 0
);

$bd_options["sliders_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Number of posts Sliders",
    "id"    	=> "slider_bumber",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in posts)",
    "max" 		=> 20,
    "min" 		=> 5
);
$bd_options["sliders_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider display",
    "id" 		=> "slider_display",
    "type"  	=> "radio",
    "options"   => array
    (
        "lates"     => "Latest posts" ,
        "category"  => "Select Category" ,
        "tag"       => "Tags"
    ),
    "js"		=>
        '
        <script type="text/javascript">
            jQuery(document).ready(function()
            {
                jQuery(".r_slider_display").change(function ()
                {
                    if(jQuery(this).val() == "lates")
                    {
                        jQuery(".get_slider_category").hide();
                        jQuery(".lates").fadeIn();
                        jQuery(".get_slider_tags").hide();
                    }
                    else if(jQuery(this).val() == "tag")
                    {
                        jQuery(".get_slider_category").hide();
                        jQuery(".lates").hide();
                        jQuery(".get_slider_tags").fadeIn();
                    }
                    else
                    {
                        jQuery(".get_slider_category").fadeIn();
                        jQuery(".lates").hide();
                        jQuery(".get_slider_tags").hide();
                    }
                });
            });
        </script>
        '
);
$slider_display_lates = (bdayh_get_option('slider_display') != 'lates') ? 'hidden' : '';
$slider_display_category = (bdayh_get_option('slider_display') != 'category') ? 'hidden' : '';
$bd_options["sliders_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider Category",
    "id"		=> "slider_category",
    "type"  	=> "select",
    "class" 	=> $slider_display_category . " get_slider_category",
    "list"		=> "cats"
);
$slider_display_tags = (bdayh_get_option('slider_display') != 'tag') ? 'hidden' : '';
$bd_options["sliders_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider Tags",
    "id"		=> "slider_tag",
    "class" 	=> $slider_display_tags . " get_slider_tags",
    "type"  	=> "tags"
);


/**
 * Footer
 */

$bd_options["footer_settings"]["footer_copyrights"][] = array
(
    "name" 		=> "Copyright Bar",
    "id"    	=> "footer_copyright",
    "exp" 		=> "Enable or Disable : copyright bar .",
    "type"  	=> "checkbox"
);
$bd_options["footer_settings"]["footer_copyrights"][] = array
(
    "name" 		=> "Copyright Text",
    "id"    	=> "footer_copyright_text",
    "type"  	=> "textarea"
);
/**
 * Adv
 */
$bd_options["footer_settings"][] = array
(
    "name" 		=> "Footer Advertising",
    "type"  	=> "subtitle"
);
$bd_options["footer_settings"]["footer_advertising"][] = array
(
    "name" 		=> "Footer Advertising",
    "id"    	=> "show_footer_ads",
    "type"  	=> "checkbox"
);
$bd_options["footer_settings"]["footer_advertising"][] = array
(
    "name" 		=> "Footer Advertising Code html ( Google ads)",
    "exp" 		=> "Footer Advertising Code html ( Google ads).",
    "id"    	=> "footer_ads_code",
    "type"  	=> "textarea"
);
$bd_options["footer_settings"]["footer_advertising"][] = array
(
    "name" 		=> "Footer Advertising upload image",
    "exp" 		=> "Footer Advertising upload image.",
    "id"    	=> "footer_ads_img",
    "type"  	=> "upload"
);
$bd_options["footer_settings"]["footer_advertising"][] = array
(
    "name" 		=> "Footer Advertising Url",
    "exp" 		=> "Footer Advertising Url.",
    "id"    	=> "footer_ads_img_url",
    "type"  	=> "text"
);
$bd_options["footer_settings"]["footer_advertising"][] = array
(
    "name" 		=> "Footer Advertising Alt name",
    "exp" 		=> "Footer Advertising Alt name.",
    "id"    	=> "footer_ads_img_altname",
    "type"  	=> "text"
);

/**
 * Portfolio
 */
$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Portfolio options",
    "type"  	=> "subtitle"
);
$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Number of Portfolio Items Per Page",
    "exp" 		=> "Insert the number of posts to display per page.",
    "id"    	=> "wportfolio_items",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 100,
    "min" 		=> 0
);
$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Show Filter",
    "exp" 		=> "Check the box to enable Filter on portfolio items.",
    "id"    	=> "folio_filter",
    "type"  	=> "checkbox"
);
$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Show Heart like",
    "exp" 		=> "Check the box to enable Heart like on portfolio.",
    "id"    	=> "folio_like",
    "type"  	=> "checkbox"
);

$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Show Comments",
    "exp" 		=> "Check the box to enable comments on portfolio items.",
    "id"    	=> "wportfolio_comments",
    "type"  	=> "checkbox"
);
$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Show Author",
    "exp" 		=> "Check the box to enable Author on portfolio items.",
    "id"    	=> "wportfolio_author",
    "type"  	=> "checkbox"
);
$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Show Tags",
    "exp" 		=> "Check the box to enable Tags on portfolio items.",
    "id"    	=> "wportfolio_tags",
    "type"  	=> "checkbox"
);
$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Show Skills",
    "exp" 		=> "Check the box to enable Skills on portfolio items.",
    "id"    	=> "folio_skills",
    "type"  	=> "checkbox"
);
$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Show Categories",
    "exp" 		=> "Check the box to enable Categories on portfolio items.",
    "id"    	=> "folio_categories",
    "type"  	=> "checkbox"
);

$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Show Social Sharing",
    "exp" 		=> "Check the box to enable Social Sharing on portfolio.",
    "id"    	=> "folio_social_sharing",
    "type"  	=> "checkbox"
);
$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Show Related Portfolio item",
    "exp" 		=> "Check the box to enable Related Portfolio item on portfolio.",
    "id"    	=> "folio_related",
    "type"  	=> "checkbox"
);
$bd_options["portfolio_options"]["bd_portfolio_options"][] = array
(
    "name" 		=> "Number of Related Portfolio item",
    "exp" 		=> "Insert the number of Related Portfolio item.",
    "id"    	=> "folio_related_nu",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 100,
    "min" 		=> 0
);

/**
 * article
 */

$bd_options["article_options"][] = array
(
    "name" 		=> "Article Sidebar Position",
    "id" 		=> "article_sidebar_position",
    "exp"		=> "choose Article Sidebar Position",
    "type"  	=> "radio",
    "options"   => array
    (
        "article_sidebar_position_right"       => "Article Sidebar Right" ,
        "article_sidebar_position_left"        => "Article Sidebar Left" ,
        "article_sidebar_position_full"        => "Article Full width",
    ),
);

$bd_options["article_options"][] = array
(
    "name" 		=> "Posts Slideshow Images",
    "id"    	=> "posts_slideshow_number",
    "exp"		=> "Number of images in posts slideshow ( Featured Image 1, 2, 3 ... etc ).",
    "type"  	=> "ui_slider",
    "unit" 		=> "(Featured Image)",
    "max" 		=> 100,
    "min" 		=> 0
);
$bd_options["article_options"][] = array
(
    "name" 		=> "Post Elements",
    "type"  	=> "subtitle"
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Tags",
    "id"    	=> "post_tags",
    "exp"		=> "Show Tags views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);

$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Pagination",
    "id"    	=> "post_pagination",
    "exp"		=> "Show Pagination views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Author Box",
    "id"    	=> "post_author_box",
    "exp"		=> "Show Author Box views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Comments",
    "id"    	=> "post_comments_box",
    "exp"		=> "Show Comments Box views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "fb Comments",
    "id"    	=> "post_fb_comments_box",
    "exp"		=> "Show fb Comments Box views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Comment Validation",
    "id"    	=> "post_comments_valid",
    "exp"		=> "Enable Comments Validation views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);

/**
 * Related Posts
 */
$bd_options["article_options"][] = array
(
    "name" 		=> "Related Posts",
    "type"  	=> "subtitle"
);
$bd_options["article_options"]["related_posts"][] = array
(
    "name" 		=> "Related Posts",
    "id"    	=> "article_related",
    "exp"		=> "Show Related Posts on blog posts.",
    "type"  	=> "checkbox"
);
$bd_options["article_options"]["related_posts"][] = array
(
    "name" 		=> "Number Of related Posts",
    "id"    	=> "article_related_numb",
    "exp"		=> "Number Of related Posts .",
    "type"  	=> "ui_slider",
    "unit" 		=> "(post)",
    "max" 		=> 30,
    "min" 		=> 0
);
$bd_options["article_options"]["related_posts"][] = array
(
    "name" 		=> "Related Query type",
    "id" 		=> "related_query",
    "type"  	=> "radio",
    "options"   => array
    (
        "author"        => "Author",
        "tag"           => "Tag",
        "category"      => "Category" ,
    ),
);
/*
$bd_options["article_options"]["related_posts"][] = array
(
    "name" 		=> "Related posts Displays",
    "id" 		=> "related_style",
    "type"  	=> "radio",
    "options"   => array
    (
        "re_scroll"    => "Featured Image",
        "list"         => "List" ,
    ),
);
*/



$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta",
    "id"    	=> "post_meta",
    "exp"		=> "Show post meta on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta author",
    "id"    	=> "post_meta_author",
    "exp"		=> "Show post meta author on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta category",
    "id"    	=> "post_meta_cats",
    "exp"		=> "Show post meta category on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta date",
    "id"    	=> "post_meta_date",
    "exp"		=> "Show post meta date on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta comments",
    "id"    	=> "post_meta_comments",
    "exp"		=> "Show post meta comments on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta views",
    "id"    	=> "post_meta_views",
    "exp"		=> "Show post meta views on blog posts.",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);
$bd_options["article_options"]["post_meta"][] = array
(
    "name" 		=> "Post Heart Like",
    "id"    	=> "post_heart_like",
    "exp"		=> "Show Heart Like .",
    "type"  	=> "checkbox",
    "class"  	=> "col50",
);

/**
 * article Adv
 */
$bd_options["article_advertising"]["article_adv_above"][] = array
(
    "name" 		=> "Article Above Advertising",
    "id"    	=> "show_article_above_ads",
    "type"  	=> "checkbox"
);
$bd_options["article_advertising"]["article_adv_above"][] = array
(
    "name" 		=> "Article Above Advertising Code html ( Google ads)",
    "exp" 		=> "Article Above Advertising Code html ( Google ads).",
    "id"    	=> "article_above_ads_code",
    "type"  	=> "textarea"
);
$bd_options["article_advertising"]["article_adv_above"][] = array
(
    "name" 		=> "Or : Article Above Advertising image",
    "exp" 		=> "Article Above Advertising upload image.",
    "id"    	=> "article_above_ads_img",
    "type"  	=> "upload"
);
$bd_options["article_advertising"]["article_adv_above"][] = array
(
    "name" 		=> "Article Above Advertising Url",
    "exp" 		=> "Article Above Advertising Url.",
    "id"    	=> "article_above_ads_img_url",
    "type"  	=> "text"
);
$bd_options["article_advertising"]["article_adv_above"][] = array
(
    "name" 		=> "Article Above Advertising Alt name",
    "exp" 		=> "Article Above Advertising Alt name.",
    "id"    	=> "article_above_ads_img_altname",
    "type"  	=> "text"
);


$bd_options["article_advertising"]["article_adv_below"][] = array
(
    "name" 		=> "Article Below Advertising",
    "id"    	=> "show_article_below_ads",
    "type"  	=> "checkbox"
);
$bd_options["article_advertising"]["article_adv_below"][] = array
(
    "name" 		=> "Article Below Advertising Code html ( Google ads)",
    "exp" 		=> "Article Below Advertising Code html ( Google ads).",
    "id"    	=> "article_below_ads_code",
    "type"  	=> "textarea"
);
$bd_options["article_advertising"]["article_adv_below"][] = array
(
    "name" 		=> "Or : Article Below Advertising image",
    "exp" 		=> "Article Below Advertising upload image.",
    "id"    	=> "article_below_ads_img",
    "type"  	=> "upload"
);
$bd_options["article_advertising"]["article_adv_below"][] = array
(
    "name" 		=> "Article Below Advertising Url",
    "exp" 		=> "Article Below Advertising Url.",
    "id"    	=> "article_below_ads_img_url",
    "type"  	=> "text"
);
$bd_options["article_advertising"]["article_adv_below"][] = array
(
    "name" 		=> "Article Below Advertising Alt name",
    "exp" 		=> "Article Below Advertising Alt name.",
    "id"    	=> "article_below_ads_img_altname",
    "type"  	=> "text"
);

/**
 * Seo
 */
$bd_options["seo"][] = array
(
    "name" 		=> "Enable Seo Feature",
    "id"    	=> "enable_seo",
    "exp"		=> "Enable Seo Feature.",
    "type"  	=> "checkbox"

);
$bd_options["seo"][] = array
(
    "name" 		=> "Custom Keywords",
    "id"    	=> "seo_keywords",
    "exp"		=> "Add Custom Your Keywords.<br><img src=\"http://www.ten28.com/qa.jpg\">",
    "type"  	=> "textarea"

);

/**
 * Social Sharing
 */
$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Social Sharing Box",
    "type"  	=> "subtitle"
); // Social Sharing Box


$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Social Sharing in Home blog",
    "id"    	=> "social_sharing_box_home",
    "exp"		=> "Check the box to show the Social sharing icons in Single posts.",
    "type"  	=> "checkbox"
); // Social Sharing in Home posts

$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Social Sharing in Single post",
    "id"    	=> "social_sharing_box",
    "exp"		=> "Check the box to show the Social sharing icons in Single posts.",
    "type"  	=> "checkbox"
); // Social Sharing in Single posts

$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Social Sharing display",
    "id" 		=> "social_displays",
    "exp"		=> "choose Social display .",
    "type"  	=> "radio",
    "options"   => array(
        "sharing_box_v1"       => "Just icon",
        "sharing_box_v2"       => "Vertical",
        "sharing_box_v3"       => "Horizontal"
    ),
); // Social Sharing display

$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Twitter User Name",
    "id"    	=> "share_twitter_username",
    "type"  	=> "text"
); // Twitter User Name

$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Facebook",
    "id"    	=> "sharing_facebook",
    "exp"		=> "Show the facebook sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50"
); // Facebook

$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Twitter",
    "id"    	=> "sharing_twitter",
    "exp"		=> "Show the twitter sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50"
); // Twitter

$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Linkedin",
    "id"    	=> "sharing_linkedin",
    "exp"		=> "Show the Linkedin sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50"
); // Linkedin

$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Reddit",
    "id"    	=> "sharing_reddit",
    "exp"		=> "Show the Reddit sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50"
); // Reddit

$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Tumblr",
    "id"    	=> "sharing_tumblr",
    "exp"		=> "Show the Tumblr sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50"
); // Tumblr

$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Google",
    "id"    	=> "sharing_google",
    "exp"		=> "Show the Google sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50"
); // Google

$bd_options["social_sharing_box"]['social_sharing'][] = array(
    "name" 		=> "Pinterest",
    "id"    	=> "sharing_pinterest",
    "exp"		=> "Show the Pinterest sharing option in blog posts .",
    "type"  	=> "checkbox",
    "class"  	=> "col50"
); // Pinterest

/**
 * Social links
 */
$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Social Sharing Links",
    "type"  	=> "subtitle"
); // Social Sharing Links

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Don't forget http:// before link",
    "type"  	=> "msginfo"
); // Msg

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "RSS",
    "id"    	=> "rss_url",
    "type"  	=> "text"
); // Custom Feed URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Facebook URL",
    "id"    	=> "social_facebook_url",
    "type"  	=> "text"
); //Facebook URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Twitter URL",
    "id"    	=> "social_twitter_url",
    "type"  	=> "text"
); // Twitter URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Google+ URL",
    "id"    	=> "social_google_plus_url",
    "type"  	=> "text"
); // Google+ URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Dribbble URL",
    "id"    	=> "social_dribbble_url",
    "type"  	=> "text"
); // Dribbble URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "MySpace URL",
    "id"    	=> "social_myspace_url",
    "type"  	=> "text"
); // MySpace URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "LinkedIn URL",
    "id"    	=> "social_linkedin_url",
    "type"  	=> "text"
); // LinkedIn URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Evernote URL",
    "id"    	=> "social_evernote_url",
    "type"  	=> "text"
); // Evernote URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Flickr URL",
    "id"    	=> "social_flickr_url",
    "type"  	=> "text"
); // Flickr URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "DeviantArt URL",
    "id"    	=> "social_deviantart_url",
    "type"  	=> "text"
); // DeviantArt URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "YouTube URL",
    "id"    	=> "social_youtube_url",
    "type"  	=> "text"
); // YouTube URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Grooveshark URL",
    "id"    	=> "social_grooveshark_url",
    "type"  	=> "text"
); // Grooveshark URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Vimeo URL",
    "id"    	=> "social_vimeo_url",
    "type"  	=> "text"
); // Vimeo URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Skype URL",
    "id"    	=> "social_skype_url",
    "type"  	=> "text"
); // Skype URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Digg URL",
    "id"    	=> "social_digg_url",
    "type"  	=> "text"
); // Digg URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Reddit URL",
    "id"    	=> "social_reddit_url",
    "type"  	=> "text"
); // Reddit URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Delicious URL",
    "id"    	=> "social_delicious_url",
    "type"  	=> "text"
); // Delicious URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "StumbleUpon URL",
    "id"    	=> "social_stumbleupon_url",
    "type"  	=> "text"
); // StumbleUpon URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Tumblr URL",
    "id"    	=> "social_tumblr_url",
    "type"  	=> "text"
); // Tumblr URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Blogger URL",
    "id"    	=> "social_blogger_url",
    "type"  	=> "text"
); // Blogger URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Wordpress URL",
    "id"    	=> "social_wordpress_url",
    "type"  	=> "text"
); // Wordpress URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Yelp URL",
    "id"    	=> "social_yelp_url",
    "type"  	=> "text"
); // Yelp URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Posterous URL",
    "id"    	=> "social_posterous_url",
    "type"  	=> "text"
); // Posterous URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Openid URL",
    "id"    	=> "social_openid_url",
    "type"  	=> "text"
); // Openid URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Xing.me URL",
    "id"    	=> "social_xing_url",
    "type"  	=> "text"
); // Xing.me URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Google Play URL",
    "id"    	=> "social_google_play_url",
    "type"  	=> "text"
); // Google Play URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Pinterest URL",
    "id"    	=> "social_pinterest_url",
    "type"  	=> "text"
); // Pinterest URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Forrst URL",
    "id"    	=> "social_forrst_url",
    "type"  	=> "text"
); // Forrst URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Behance URL",
    "id"    	=> "social_behance_url",
    "type"  	=> "text"
); // Behance URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Viadeo URL",
    "id"    	=> "social_viadeo_url",
    "type"  	=> "text"
); // Viadeo URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "VK.com URL",
    "id"    	=> "social_vk_url",
    "type"  	=> "text"
); // VK.com URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Last.fm URL",
    "id"    	=> "social_lastfm_url",
    "type"  	=> "text"
); // Last.fm URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Instagram URL",
    "id"    	=> "social_instagram_url",
    "type"  	=> "text"
); // Instagram URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Spotify URL",
    "id"    	=> "social_spotify_url",
    "type"  	=> "text"
); // Spotify URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "PayPal URL",
    "id"    	=> "social_paypal_url",
    "type"  	=> "text"
); // PayPal URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Apple URL",
    "id"    	=> "social_apple_url",
    "type"  	=> "text"
); // Apple URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Amazon URL",
    "id"    	=> "social_amazon_url",
    "type"  	=> "text"
); // Amazon URL

$bd_options["social_sharing_links"]['social'][] = array(
    "name" 		=> "Soundcloud URL",
    "id"    	=> "social_soundcloud_url",
    "type"  	=> "text"
); // Soundcloud URL


/* theme_styling */
$bd_options["theme_styling"]["custom_theme_color_options"][] = array
(
    "name" 		=> "Choose Theme Color",
    "id"    	=> "custom_theme_colors",
    "type"  	=> "theme_colors"
);

$bd_options["theme_styling"]["custom_theme_color_options"][] = array
(
    "name" 		=> "Choose Theme Color",
    "id"    	=> "custom_theme_color",
    "type"  	=> "color"
);

$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Background display",
    "id" 		=> "background_displays",
    "exp"		=> "choose Background display",
    "type"  	=> "radio",
    "options"   => array
    (
        "bg_cutsom"       => "Custom Background" ,
        "bg_pattren"      => "Pattern",
    ),
    "js"		=>
    '
    <script type="text/javascript">
        jQuery(document).ready(function()
        {
            jQuery(".r_background_displays").change(function ()
            {
                if(jQuery(this).val() == "bg_cutsom")
                {
                    jQuery(".bd_custom_pattrens_color, .bd_custom_pattrens").hide();
                    jQuery(".bd_custom_background, .bd_custom_background_full").fadeIn();
                }
                else
                {
                    jQuery(".bd_custom_pattrens_color, .bd_custom_pattrens").fadeIn();
                    jQuery(".bd_custom_background, .bd_custom_background_full").hide();
                }
            });
        });
    </script>
    '
);
$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "&nbsp;",
    "type"  	=> "subtitle"
);


$bg_cus = (bdayh_get_option('background_displays') != 'bg_cutsom') ? 'hidden' : '';
$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Custom Background",
    "id"    	=> "custom_background",
    "type"  	=> "bgop",
    "class" 	=> $bg_cus . " bd_custom_background",
);
$bg_cus_full = (bdayh_get_option('background_displays') != 'bg_cutsom') ? 'hidden' : '';
$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Full Screen",
    "id"    	=> "custom_background_full",
    "type"  	=> "checkbox",
    "class" 	=> $bg_cus_full . " bd_custom_background_full",
);

$bg_pat_color = (bdayh_get_option('background_displays') != 'bg_pattren') ? 'hidden' : '';
$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Background Color",
    "id"    	=> "custom_pattrens_color",
    "type"  	=> "color",
    "class" 	=> $bg_pat_color . " bd_custom_pattrens_color",
);
$bg_pat = (bdayh_get_option('background_displays') != 'bg_pattren') ? 'hidden' : '';
$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Choose Pattern",
    "id"    	=> "custom_pattrens",
    "type"  	=> "pattrens_bg",
    "class" 	=> $bg_pat . " bd_custom_pattrens",
);


/**
 *  Custom Css Style
 */
$bd_options["theme_styling"]["bd_css"][] = array
(
    "name" 		=> "Global CSS",
    "id"    	=> "custom_css",
    "exp"       => "Any custom CSS from the user should go in this field, it will override the theme CSS",
    "type"  	=> "textarea"
);
$bd_options["theme_styling"]["bd_css"][] = array
(
    "name" 		=> "Tablets CSS Width from 768px to 985px",
    "id"    	=> "css_tablets",
    "exp"       => "Any custom CSS from the user should go in this field, it will override the theme CSS",
    "type"  	=> "textarea"
);
$bd_options["theme_styling"]["bd_css"][] = array
(
    "name" 		=> "Wide Phones CSS Width from 480px to 767px",
    "id"    	=> "css_wide_phones",
    "exp"       => "Any custom CSS from the user should go in this field, it will override the theme CSS",
    "type"  	=> "textarea"
);
$bd_options["theme_styling"]["bd_css"][] = array
(
    "name" 		=> "Phones CSS Width from 320px to 479px",
    "id"    	=> "css_phones",
    "exp"       => "Any custom CSS from the user should go in this field, it will override the theme CSS",
    "type"  	=> "textarea"
);

/**
 *  Custom Css Style
 */
$bd_options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Main",
    "type"  	=> "subtitle"
);
$bd_options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Main text Color",
    "id"    	=> "main_text_color",
    "type"  	=> "color"
);
$bd_options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Links Color",
    "id"    	=> "links_color",
    "type"  	=> "color"
);
$bd_options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Links Decoration",
    "id"    	=> "links_decoration",
    "type"  	=> "sellist",
    "options" 	=>
    array(
        ""=>"Default" ,
        "none"=>"none",
        "underline"=>"underline",
        "overline"=>"overline",
        "line-through"=>"line-through"
    ),
);
$bd_options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Links Color on mouse over",
    "id"    	=> "links_color_hover",
    "type"  	=> "color"
);
$bd_options["custom_design"]["global_main_color"][] = array
(
    "name" 		=> "Links Decoration on mouse over",
    "id"    	=> "links_decoration_hover",
    "type"  	=> "sellist",
    "options" 	=>
    array(
        ""=>"Default" ,
        "none"=>"none",
        "underline"=>"underline",
        "overline"=>"overline",
        "line-through"=>"line-through"
    ),
);


$bd_options["custom_design"]["bd_post"][] = array
(
    "name" 		=> "Posts",
    "type"  	=> "subtitle"
);
$bd_options["custom_design"]["bd_post"][] = array
(
    "name" 		=> "Posts text Color",
    "id"    	=> "post_text_color",
    "type"  	=> "color"
);
$bd_options["custom_design"]["bd_post"][] = array
(
    "name" 		=> "Posts Links Color",
    "id"    	=> "post_links_color",
    "type"  	=> "color"
);
$bd_options["custom_design"]["bd_post"][] = array
(
    "name" 		=> "Posts Links Decoration",
    "id"    	=> "post_links_decoration",
    "type"  	=> "sellist",
    "options" 	=>
        array(
            ""=>"Default" ,
            "none"=>"none",
            "underline"=>"underline",
            "overline"=>"overline",
            "line-through"=>"line-through"
        ),
);
$bd_options["custom_design"]["bd_post"][] = array
(
    "name" 		=> "Posts Links Color on mouse over",
    "id"    	=> "post_links_color_hover",
    "type"  	=> "color"
);
$bd_options["custom_design"]["bd_post"][] = array
(
    "name" 		=> "Posts Links Decoration on mouse over",
    "id"    	=> "post_links_decoration_hover",
    "type"  	=> "sellist",
    "options" 	=>
        array(
            ""=>"Default" ,
            "none"=>"none",
            "underline"=>"underline",
            "overline"=>"overline",
            "line-through"=>"line-through"
        ),
);


/**
 *  wrapper
 */
$bd_options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Top Navigation Styling",
    "id"    	=> "s_top",
    "type"  	=> "bgop"
);
$bd_options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Header",
    "id"    	=> "s_header",
    "type"  	=> "bgop"
);
$bd_options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Post Styling",
    "id"    	=> "s_post",
    "type"  	=> "bgop"
);
$bd_options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Widget Styling",
    "id"    	=> "s_widget",
    "type"  	=> "bgop"
);

$bd_options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Read More & All Buttons",
    "id"    	=> "read_btn",
    "type"  	=> "bgop"
);
$bd_options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Read More & All Buttons text Color",
    "id"    	=> "read_btn_text_color",
    "type"  	=> "color"
);


$bd_options["custom_design"]['bd_wrapper'][] = array
(
    "name" 		=> "Footer Styling",
    "id"    	=> "s_footer",
    "type"  	=> "bgop"
);

/**
 *  Custom Css Style
 */
$bd_options["typography"]["bd_character_sets"][] = array
(
    "name" 		=> "Character sets",
    "type"  	=> "subtitle"
); // Character sets
$bd_options["typography"]["bd_character_sets"][] = array
(
    "name" 		=> "Latin Extended",
    "id"    	=> "wp_typography_latin_extended",
    "exp"		=> "Check to enable the Latin Extended, uncheck to disable",
    "type"  	=> "checkbox"
); // Latin Extended
$bd_options["typography"]["bd_character_sets"][] = array
(
    "name" 		=> "Cyrillic",
    "id"    	=> "wp_typography_cyrillic",
    "exp"		=> "Check to enable the Cyrillic, uncheck to disable",
    "type"  	=> "checkbox"
); //Cyrillic
$bd_options["typography"]["bd_character_sets"][] = array
(
    "name" 		=> "Cyrillic Extended",
    "id"    	=> "wp_typography_cyrillic_extended",
    "exp"		=> "Check to enable the Cyrillic Extended, uncheck to disable",
    "type"  	=> "checkbox"
); // Cyrillic Extended
$bd_options["typography"]["bd_character_sets"][] = array
(
    "name" 		=> "Greek",
    "id"    	=> "wp_typography_greek",
    "exp"		=> "Check to enable the Greek, uncheck to disable",
    "type"  	=> "checkbox"
); // Greek
$bd_options["typography"]["bd_character_sets"][] = array
(
    "name" 		=> "Greek Extended",
    "id"    	=> "wp_typography_greek_extended",
    "exp"		=> "Check to enable the Greek Extended, uncheck to disable",
    "type"  	=> "checkbox"
); // Greek Extended
$bd_options["typography"]["bd_character_sets"][] = array
(
    "name" 		=> "Khmer",
    "id"    	=> "wp_typography_khmer",
    "exp"		=> "Check to enable the Khmer, uncheck to disable",
    "type"  	=> "checkbox"
); // Khmer
$bd_options["typography"]["bd_character_sets"][] = array
(
    "name" 		=> "Vietnamese",
    "id"    	=> "wp_typography_vietnamese",
    "exp"		=> "Check to enable the Vietnamese, uncheck to disable",
    "type"  	=> "checkbox"
); // Vietnamese
$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "General Typography",
    "id"    	=> "tybo_general",
    "type"  	=> "tybo"
);

$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Site Title In Header",
    "id"    	=> "t_site_title",
    "type"  	=> "tybo"
);

$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Page title",
    "id"    	=> "t_page_title",
    "type"  	=> "tybo"
);
$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Page Titles Text Transform",
    "id"    	=> "page_tt",
    "type"  	=> "sellist",
    "options" 	=>
        array(
            ""=>"Default" ,
            "none"=>"none",
            "inherit"=>"inherit",
            "uppercase"=>"uppercase",
            "lowercase"=>"lowercase",
            "capitalize"=>"capitalize",
            "full-size-kana"=>"full-size-kana",
            "full-width"=>"full-width",
        ),
);

$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Single Post Title",
    "id"    	=> "t_single_title",
    "type"  	=> "tybo"
);
$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Single Post Titles Text Transform",
    "id"    	=> "singel_tt",
    "type"  	=> "sellist",
    "options" 	=>
        array(
            ""=>"Default" ,
            "none"=>"none",
            "inherit"=>"inherit",
            "uppercase"=>"uppercase",
            "lowercase"=>"lowercase",
            "capitalize"=>"capitalize",
            "full-size-kana"=>"full-size-kana",
            "full-width"=>"full-width",
        ),
);

$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Top Menu",
    "id"    	=> "tybo_topbar",
    "type"  	=> "tybo"
);
$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Main Navigation",
    "id"    	=> "tybo_nav",
    "type"  	=> "tybo"
);
$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Main Navigation Text Transform",
    "id"    	=> "main_nav_tt",
    "type"  	=> "sellist",
    "options" 	=>
        array(
            ""=>"Default" ,
            "none"=>"none",
            "inherit"=>"inherit",
            "uppercase"=>"uppercase",
            "lowercase"=>"lowercase",
            "capitalize"=>"capitalize",
            "full-size-kana"=>"full-size-kana",
            "full-width"=>"full-width",
        ),
);

$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Post Entry",
    "id"    	=> "t_post_entry",
    "type"  	=> "tybo"
);

$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Post Meta",
    "id"    	=> "t_post_meta",
    "type"  	=> "tybo"
);

$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Widgets Titles",
    "id"    	=> "t_widget_title",
    "type"  	=> "tybo"
);
$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Widgets Titles Text Transform",
    "id"    	=> "widgets_tt",
    "type"  	=> "sellist",
    "options" 	=>
        array(
            ""=>"Default" ,
            "none"=>"none",
            "inherit"=>"inherit",
            "uppercase"=>"uppercase",
            "lowercase"=>"lowercase",
            "capitalize"=>"capitalize",
            "full-size-kana"=>"full-size-kana",
            "full-width"=>"full-width",
        ),
);

$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Boxes Titles",
    "id"    	=> "t_boxes_title",
    "type"  	=> "tybo"
);
$bd_options["typography"]["bd_tybo"][] = array
(
    "name" 		=> "Boxes Titles Text Transform",
    "id"    	=> "boxes_tt",
    "type"  	=> "sellist",
    "options" 	=>
        array(
            ""=>"Default" ,
            "none"=>"none",
            "inherit"=>"inherit",
            "uppercase"=>"uppercase",
            "lowercase"=>"lowercase",
            "capitalize"=>"capitalize",
            "full-size-kana"=>"full-size-kana",
            "full-width"=>"full-width",
        ),
);

/**
 *  Twitter API
 */
$bd_options["twitter_API"]["wpbd_twitter_API"][] = array(
    "name" 		=> "Twitter API OAuth Options",
    "type"  	=> "subtitle"
);
$bd_options["twitter_API"]["wpbd_twitter_API"][] = array(
    "name" 		=> "Twitter Username",
    "id"    	=> "twitter_username",
    "exp"       => 'You need to create <a href="https://dev.twitter.com/apps" target="_blank">Twitter APP</a>',
    "type"  	=> "text"
);
$bd_options["twitter_API"]["wpbd_twitter_API"][] = array(
    "name" 		=> "Twitter Consumer Key",
    "id"    	=> "twitter_consumer_key",
    "type"  	=> "text"
);
$bd_options["twitter_API"]["wpbd_twitter_API"][] = array(
    "name" 		=> "Twitter Consumer Secret",
    "id"    	=> "twitter_consumer_secret",
    "type"  	=> "text"
);
$bd_options["twitter_API"]["wpbd_twitter_API"][] = array(
    "name" 		=> "Twitter Access Token",
    "id"    	=> "twitter_access_token",
    "type"  	=> "text"
);
$bd_options["twitter_API"]["wpbd_twitter_API"][] = array(
    "name" 		=> "Twitter Access Token Secret",
    "id"    	=> "twitter_access_token_secret",
    "type"  	=> "text"
);

/**
 *  Theme Backup
 */
$bd_options["backup_options"][] = array(
    "name" 		=> "Backup Import Options",
    "id"    	=> "advanced_import",
    "exp"       => "You can transfer the saved options data between different installs by copying the text inside the text box.",
    "type"  	=> "textarea"
);
$bd_options["backup_options"][] = array(
    "name" 		=> "Backup Export Options",
    "id"    	=> "advanced_export",
    "type"  	=> "textarea"
);
?>