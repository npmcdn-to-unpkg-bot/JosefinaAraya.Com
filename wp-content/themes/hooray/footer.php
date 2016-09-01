    <?php global $bd_data; ?>
    <div class="bd-container">
    <?php
        if( bdayh_get_option('show_footer_ads') == true ){
            if($bd_data['show_footer_ads'] == true){
                if($bd_data['footer_ads_code'] != ''){
                    echo '<div class="clear"></div><div class="footer-adv">' ."\n";
                    echo stripslashes( $bd_data['footer_ads_code'] );
                    echo '</div><!-- .footer-adv/-->' ."\n";
                } else {
                    echo '<div class="clear"></div><div class="footer-adv"><a href="'.$bd_data['footer_ads_img_url'].'" title="'.$bd_data['footer_ads_img_altname'].'"><img src="'.$bd_data['footer_ads_img'].'" alt="'.$bd_data['footer_ads_img_altname'].'" /></a></div><!-- .footer-adv/-->' ."\n";
                }
            }
        }
    ?>
    </div><!-- .ads -->
    <div class="footer">
        <div class="bd-container">
            <?php if($bd_data['footer_copyright'] == 1) { echo stripslashes( bd_footer_copy_rigths() ); } ?>
        </div>
    </div>
    </div><!-- #warp -->
    <?php
        if(array_key_exists('space_body',$bd_data)){ echo stripslashes ( $bd_data['space_body'] ) ."\n"; } echo '<div class="gotop" title="Go Top"><i class="bdico dashicons-arrow-up-alt2"></i></div>';
        wp_footer();
    ?>
    </body>
</html>