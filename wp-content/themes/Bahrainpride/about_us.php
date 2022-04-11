<?php 
/*
	Template Name: About us
*/
get_header(); 
?>
<a href="https://play.google.com/store/apps/details?id=com.shahico.bahrainpride&hl=en_US&gl=US" target="_blank">
<section class="breadcrumb-area" style="background:url(https://www.shakeelgroup.com.bh/bahrainpride/wp-content/uploads/2021/09/Banner-Bahrain-Pride.png);">
      <div class="dropshadow">
        <div class="container">
          <div class="breadcrumb breadcrumb-box">
            <div class="breadcrumbtitle"><span>About Us</span></div>
<!--             <ul>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><span>home</span></span></a></li>
              <li><span>About Us</span></li>
            </ul> -->
          </div>
        </div>
      </div>
</section>
</a>
<?php
 query_posts('post_type=about_us' ); 
 while (have_posts()) : the_post();
 ?> 
<section class="page-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12"> <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="rightimg" />
            <h3 class="mainheadding"> <?php echo get('welcome_caption'); ?></h3>
            <?php echo get('welcome_text');          ?>
            <h3 class="mainheadding"> <?php echo get('mission_caption'); ?></h3>
            <?php echo get('mission_text');          ?>
          </div>
        </div>
      </div>
    </section>
<?php
endwhile; 
wp_reset_query();
?> 
<?php get_footer(); ?>
