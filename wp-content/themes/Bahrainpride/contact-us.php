<?php 
/*
	Template Name: Location and timing
*/
get_header(); 
?>
<a href="https://play.google.com/store/apps/details?id=com.shahico.bahrainpride&hl=en_US&gl=US" target="_blank">
<section class="breadcrumb-area" style="background:url('https://www.shakeelgroup.com.bh/bahrainpride/wp-content/uploads/2021/09/Banner-Bahrain-Pride.png');">
      <div class="dropshadow">
        <div class="container">
          <div class="breadcrumb breadcrumb-box">
            <div class="breadcrumbtitle"><span>Contact Us</span></div>
            <ul>
              <!--<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><span>home</span></span></a></li>-->
              <!--<li><a href="#"><span><span>Contact</span></span></a></li>-->
              <li><span>Locations and Timings</span></li>
            </ul>
          </div>
        </div>
      </div>
</section>
</a>
<?php
 query_posts('post_type=contact_us' ); 
 while (have_posts()) : the_post();
 ?> 
<section class="main-page container m_t_40 m_b_40">
    <div class="main-container col1-layout">
        <div class="main">
          <div class="col-main">
            <section class="contact-us-area">
              <div class="contact-box">
                <div class="page-title p_b_20"> <span>For more information and further queries , kindly contact us at:</span> </div>
                <div class="row">
					<?php 
				$branch_details = get_group('branch_details');
				foreach($branch_details as $bd)
					{
				?>
				<div class="col-md-4 m_b_30">
                    <div class="full-locations">
                      <div class="haddingred"><span>Our Branches</span></div>
                      <div class="loopcolor">
                        <?php 
						echo $bd['first_branch_details'][1];
						$loc1=$bd['first_map_details'][1];
						$cordinates1=$bd['first_branch_coordinates'][1];	
						?>
                      </div>
                      <div class="loopcol">
                        <?php echo $bd['second_branch_details'][1]; 
						$loc2=$bd['second_map_details'][1];						
						$cordinates2=$bd['second_branch_coordinates'][1];
						?>
                      </div>
                      <div class="loopcolor">
                        <?php echo $bd['third_branch_details'][1]; 
						$loc3=$bd['third_map_details'][1];			
						$cordinates3=$bd['third_branch_coordinates'][1];
						?>
                      </div>
                      <div class="loopcol">
                        <?php echo $bd['fourth_branch_details'][1];
						$loc4=$bd['fourth_map_details'][1];		
						$cordinates4=$bd['fourth_branch_coordinates'][1];
						?>
                      </div>
                      <div class="loopcolor">
                        <?php echo $bd['fifth_branch_details'][1];
						$loc5=$bd['fifth_map_details'][1];
						$cordinates5=$bd['fifth_branch_coordinates'][1];
						?>
                      </div>
						<div class="loopcolor">
                        <?php echo $bd['sixth_branch_details'][1];
						$loc6=$bd['sixth_map_details'][1];
						$cordinates6=$bd['sixth_branch_coordinates'][1];
						?>
                      </div>
						<div class="loopcolor">
                        <?php echo $bd['seventh_branch_details'][1];
						$loc7=$bd['seventh_map_details'][1];
						$cordinates7=$bd['seventh_branch_coordinates'][1];
						?>
                      </div>
                    </div>
                </div>
				<?php } ?>
				<div class="col-md-8 m_b_30">
                    <div class="full-map-section">
                      <div id="map-canvas"></div>
                    </div>
                </div>                 
				
				
				</div>
				  <div class="row">
					   <div class="col-md-4 m_b_20">
                    <!--<div class="hadding m_t_30"><span>Postal address</span></div>--->
                    <!---<?php echo get_the_content(); ?>  --->
                  </div>
				  <div class="col-md-8 m_b_20">
                    <div class="contact-form">
                      <div class="comment-respond">
                        <div class="comment-respond-inner">
                          <div class="hadding"><span>Feedback Form</span></div>
                          <?php echo do_shortcode("[contact-form-7 id='8' title='Contact form 1']"); ?>
                        </div>
                      </div>
                    </div>
                </div>
				  </div>
              </div>
            </section>
          </div>
        </div>
    </div>
</section>
<?php
endwhile; 
wp_reset_query();
?> 
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ3eA3I17SAVn3Xeh1s9z9HCYOB0G4j_o&sensor=false"></script>
<?php get_footer(); ?>
<script>

$(function(){
function initialize() {

    var markers = new Array();

    var mapOptions = {
        zoom: 11,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: new google.maps.LatLng(26.2000008,50.5746725)
    };

    var locations = [
        [new google.maps.LatLng(<?php echo $cordinates1; ?>), '<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/map-1.png">', '<?php echo $loc1; ?>'],
        [new google.maps.LatLng(<?php echo $cordinates2; ?>), '<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/map-2.png">', '<?php echo $loc2; ?>'],
        [new google.maps.LatLng(<?php echo $cordinates3; ?>), '<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/map-3.png">', '<?php echo $loc3; ?>'],
        [new google.maps.LatLng(<?php echo $cordinates4; ?>), '<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/map-4.png">', '<?php echo $loc4; ?>'],
        [new google.maps.LatLng(<?php echo $cordinates5; ?>), '<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/map-5.png">', '<?php echo $loc5; ?>'],
        [new google.maps.LatLng(<?php echo $cordinates6; ?>), '<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/map-6.png">', '<?php echo $loc6; ?>'],
        [new google.maps.LatLng(<?php echo $cordinates7; ?>), '<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/image/map-7.png">', '<?php echo $loc7; ?>']
    ];

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

    var infowindow = new google.maps.InfoWindow();

    for (var i = 0; i < locations.length; i++) {

        // Append a link to the markers DIV for each marker
        $('#markers'+i).append('<a class="marker-link" data-markerid="' + i + '">' + locations[i][1] + '</a> ');

        var marker = new google.maps.Marker({
            position: locations[i][0],
            map: map,
            title: locations[i][1],
        });

        // Register a click event listener on the marker to display the corresponding infowindow content
        google.maps.event.addListener(marker, 'click', (function (marker, i) {

            return function () {
                infowindow.setContent(locations[i][2]);
                infowindow.open(map, marker);
            }

        })(marker, i));

        // Add marker to markers array
        markers.push(marker);
    }

    // Trigger a click event on each marker when the corresponding marker link is clicked
    $('.marker-link').on('click', function () {

        google.maps.event.trigger(markers[$(this).data('markerid')], 'click');
    });
}

initialize();
});
</script>
