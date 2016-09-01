<?php
/**
 *
 *  Short code functions
 *  Developer by : Amr Sadek
 *  http://themeforest.net/user/bdayh
 *
 */
defined('WP_ADMIN') || define('WP_ADMIN', true);
require_once('../../../../../../wp-load.php');
?>
<!doctype html>
<html lang="en">
<head>
<title><?php _e('Insert Google maps','bd'); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language="javascript" type="text/javascript" src="<?php echo includes_url();?>/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo includes_url();?>/js/tinymce/utils/mctabs.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo includes_url();?>/js/tinymce/utils/form_utils.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo includes_url();?>/js/jquery/jquery.js?ver=1.4.2"></script>
<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri(). '/includes/shortcode/shortcodes/assets/js/lib.js' ?>"></script>
<link href="<?php echo get_template_directory_uri(). '/includes/shortcode/shortcodes/assets/css/notifications.css' ?>" type="text/css" rel="stylesheet" media="all"  />
<base target="_self" />
</head>
<body  onload="init();">
<form name="googlemaps" action="#" >
	<div class="panel_wrapper">
        <fieldset style="margin-bottom:10px;padding:10px">
            <legend>Insert Map Url</legend>
            <input data-name="googlemapssrc" type="text" data-hex="true" id="googlemapssrc" style="width:230px" value="">
        </fieldset>
        <fieldset style="margin-bottom:10px;padding:10px">
            <legend>Width</legend>
            <input data-name="googlemapswidth" type="text" data-hex="true" id="googlemapswidth" style="width:230px" value="620">
        </fieldset>
        <fieldset style="margin-bottom:10px;padding:10px">
            <legend>Height</legend>
            <input data-name="googlemapsheight" type="text" data-hex="true" id="googlemapsheight" style="width:230px" value="455">
        </fieldset>
	</div>
	<div class="mceActionPanel">
		<div style="float: right">
			<input type="submit" class="btn-BDSC" name="insert" value="<?php _e('Insert','bd'); ?>" onClick="submitData(jQuery(this).closest('form'));" />
		</div>
	</div>
</form>
</body>
</html>