<?php 
/*
	Template Name: Promotions-old
*/
get_header(); 
?>
<section class="breadcrumb-area" style="background:url(<?php bloginfo( 'stylesheet_directory' ); ?>/assets/image/breadcrumb.jpg);">
      <div class="dropshadow">
        <div class="container">
          <div class="breadcrumb breadcrumb-box">
            <div class="breadcrumbtitle"><span>Promotions</span></div>
            <ul>
              <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><span>home</span></span></a></li>
              <li><span><?php the_title(); ?></span></li>
            </ul>
          </div>
        </div>
      </div>
</section>
<section class="main-page container m_t_40 m_b_40">
    <div class="main-container col2-left-layout">
    <div class="main">
        <div class="row">
        <aside class=" col-sm-12 col-md-12 col-lg-12 p_b_30">
        <div class="col-main"> 
        <!--  our product -->
        <div class="allpr">
        <div class="product-container">
        <div id="products-grid">
        <ul class="products-grid row medium-products">
		<?php 
		query_posts('post_type=promotions' ); 
		while (have_posts()) : the_post();
		?>
		<li class="col-xs-12 col-sm-12 col-md-6 col-lg-6 m_b_20">
            <div class="pastpost">
            <div class="row">
                <div class="col-lg-5 col-md-5">
                <div class="picture"> <a href="<?php echo get_permalink(); ?>"> <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>" class="img-responsive" alt="img"></a> </div>
                </div>
                <div class="col-lg-7 col-md-7">
                <h1 class="corporatehead"><?php the_title(); ?></h1>
                <div class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get('date_from'); ?> to <?php echo get('date_to'); ?></div>
                <div class="description m_b_10"><?php echo substr(get_the_content(), 0, 80).'...';  ?></div>
                <div class="info">
                <div class="button"><a href="<?php echo get_permalink(); ?>" class="btn btn-default">Read More</a></div>
                </div>
                </div>
            </div>
            </div>
        </li>
		<?php
		endwhile; 
		wp_reset_query();
		?>
		</ul>
        </div>
        </div>
        </div>
        <!-- / our product --> 
        </div>
        </aside>
        <!-- / Right side --> 
        </div>
    </div>
    </div>
</section>
<?php get_footer(); ?>