<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<footer class="footer-area padding-45">
      <div class="footer-center">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3 col-lg-3"> 
              <!-- footer About -->
              <div class="footer-about">
			  <h2 class="footer-hadding">About Us</h2>
			  <div class="footer-content">
              <?php if ( function_exists ( dynamic_sidebar('about_pride') ) ) : ?>
              <?php dynamic_sidebar ('about_pride'); ?>
              <?php endif; ?>
			  </div>
			  </div>
              <!-- / footer About --> 
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 hidden-sm"> 
              <!-- start footer information -->
              <div class="information">
                <h2 class="footer-hadding">information</h2>
				<?php wp_nav_menu( array( 'menu' => 'information_menu','menu_class' => '','container'=>'') ); ?>
             </div>
              <!-- / footer information --> 
            </div>
			  
            
            <!-- footer contact -->
            <div class="col-sm-6 col-md-4 col-lg-4">
              <div class="footer-contact">
                <?php if ( function_exists ( dynamic_sidebar('contact_address') ) ) : ?>
            <?php dynamic_sidebar ('contact_address'); ?>
            <?php endif; ?>
              </div>
            </div>
            <!-- / footer contact --> 
          </div>
        </div>
      </div>
      <!-- / footer center --> 
      <!-- footer bottom -->
      <div class="footer-bottom">
        <div class="container">
          <p class="copyright">&copy;2018 All Rights Reserved. Development by <a href="https://sayg.bh/">SayG</a></p>
        </div>
      </div>
      <!-- / footer bottom --> 
    </footer>
    <!-- / footer -->
    <div style="display: block;" id="top-buttom" class="top-bottom"><span class="fa fa-long-arrow-right"></span></div>
  </div>
  <!-- / page --> 
</div>
<style>
.product-item{
	    min-height: 100px;
}
.product-item-img{
	min-height: 180px;
    margin-bottom: 20px;
	    border: 1px solid #ddd !important;
}
</style>
<?php wp_footer(); ?>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/plugins/jquery/jquery-1.11.3.min.js"></script> 
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/plugins/jquery-ui-1.12.0/jquery-ui.min.js"></script> 
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/plugins/owl-carousel/owl.carousel.min.js"></script> 
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/plugins/Nivo-Slider/jquery.nivo.slider.js"></script> 
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/plugins/elevatezoom/jquery.elevatezoom.js" type="text/javascript"></script> 
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/plugins/magnific/jquery.magnific-popup.min.js"></script> 
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/jquery.accordion.source.js"></script> 
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/jquery.ddslick.min.js"></script> 
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/theme.js"></script>
</body>
</html>
