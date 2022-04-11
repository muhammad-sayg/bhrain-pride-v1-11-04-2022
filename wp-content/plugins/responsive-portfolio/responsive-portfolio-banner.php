<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
wp_enqueue_style( 'respport-banner', WEBLIZAR_RP_PLUGIN_URL . 'css/banner.css' );
$gp_imgpath = WEBLIZAR_RP_PLUGIN_URL . "images/resp_pro.png";
?>
<div class="wb_plugin_feature notice  is-dismissible">
    <div class="wb_plugin_feature_banner default_pattern pattern_ ">
        <div class="wb-col-md-6 wb-col-sm-12 box">
            <div class="ribbon"><span>Go Pro</span></div>
            <img class="wp-img-responsive" src="<?php echo $gp_imgpath; ?>" alt="img">
        </div>
        <div class="wb-col-md-6 wb-col-sm-12 wb_banner_featurs-list">
            <span class="gp_banner_head"><h2><?php _e( 'Responsive Portfolio Pro Features', WEBLIZAR_RP_TEXT_DOMAIN ); ?> </h2></span>
            <ul>
                <li><?php _e( '8 Gallery Layout', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Unlimited Hover Color', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Album View Gallery', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Isotope or Masonary Effects', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
                <li><?php _e( '8 Type of Hover Animations', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
                <li><?php _e( '500 plus Font Style', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Multiple Image uploader', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>                
                <li><?php _e( '8 Types of Lightbox Integrated', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Drag and Drop image Position', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Shortcode Button on post or page', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
                <li><?php _e( 'Font Icon Customization & Many More', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
				<li><?php _e( 'Hide or Show Gallery Title and Label', WEBLIZAR_RP_TEXT_DOMAIN ); ?></li>
            </ul>
            <div class="wp_btn-grup">
                <a class="wb_button-primary" href="http://demo.weblizar.com/responsive-portfolio-pro/"
                   target="_blank"><?php _e( 'View Demo', WEBLIZAR_RP_TEXT_DOMAIN ); ?></a>
                <a class="wb_button-primary" href="https://weblizar.com/plugins/responsive-portfolio-pro/"
                   target="_blank"><?php _e( 'Buy Now', WEBLIZAR_RP_TEXT_DOMAIN ); ?> $19</a>
            </div>

        </div>
    </div>
</div>