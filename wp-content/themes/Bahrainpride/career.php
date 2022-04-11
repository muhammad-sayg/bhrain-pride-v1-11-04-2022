<?php 
/*
	Template Name: Career
*/
get_header();
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
	{
	  //  print_r($_FILES);exit;
	move_uploaded_file($_FILES["file"]["tmp_name"],
       getcwd()."/uploads/".$_FILES["file"]["name"]);	
	$filename = getcwd()."/uploads/".$_FILES["file"]["name"];
	$admin_email = 'info@shakeelgroup.com.bh';
	//$admin_email = 'godwin@akit.me';
	$usermail = $_POST['email'];
	$content  = nl2br($_POST['covering']);
	$subject  = "Bahrain Pride Resume Application";
	$bound_text =  "dacc1231";
	$bound =   "--".$bound_text."\r\n";
	$bound_last =  "--".$bound_text."--\r\n";
	 
	$headers =     "MIME-Version: 1.0\r\n"
	."Content-Type: multipart/mixed; boundary=\"$bound_text\"". PHP_EOL;
	$headers .=    "From: " . strip_tags($usermail) . "\r\n";
	$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
	$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>New Resume</h2>\r\n";
	$msg .= "<p><strong>Full Name:</strong> ".$_POST['fname']."</p>\r\n";
	$msg .= "<p><strong>City :</strong> ".$_POST['city']."</p>\r\n";
	$msg .= "<p><strong>Your State :</strong> ".$_POST['state']."</p>\r\n";
	$msg .= "<p><strong>Country :</strong> ".$_POST['country']."</p>\r\n";
	$msg .= "<p><strong>Phone :</strong> ".$_POST['phone']."</p>\r\n";
	$msg .= "<p><strong>Email :</strong> ".$_POST['email']."</p>\r\n";
	$msg .= "<p><strong>Covering Letter :</strong> ".$_POST['covering']."</p>\r\n";
	$msg .= "</body></html>";
	//$greet = "The following was submitted on " . date("F j, Y, g:i a") . "<p>";
    $body = $msg;
	$message =     "If you can see this MIME than your client doesn't accept MIME types!\r\n".$bound;
	$message .=    "Content-Type: text/html; charset=\"iso-8859-1\"\r\n"."Content-Transfer-Encoding: 7bit\r\n\r\n"."Here is a Submission\r\n" .$body ."\r\n".$bound; 
	if($_FILES["file"]["name"] != "")
	{
		 $file =     file_get_contents($filename); 

		 $message .=    "Content-Type: ".$_FILES["file"]["type"]."; name=\"".$_FILES["file"]["name"]."\"\r\n"
		."Content-Transfer-Encoding: base64\r\n"
		."Content-disposition: attachment; file=\"".$filename."\"\r\n"
		."\r\n"
		.chunk_split(base64_encode($file))
		.$bound_last;
	}
	if(@mail($admin_email, $subject, $message, $headers)) 
		{
		echo "<script type='text/javascript'>alert('Resume Submitted Successfully')</script>";
		} 
	else 
		{
		echo "<script type='text/javascript'>alert('failed!')</script>";
		}
	}
?>
<a href="https://play.google.com/store/apps/details?id=com.shahico.bahrainpride&hl=en_US&gl=US" target="_blank">
<section class="breadcrumb-area" style="background:url('https://www.shakeelgroup.com.bh/bahrainpride/wp-content/uploads/2021/09/Banner-Bahrain-Pride.png');">
      <div class="dropshadow">
        <div class="container">
          <div class="breadcrumb breadcrumb-box">
            <div class="breadcrumbtitle"><span>Careers</span></div>
            <ul>
              <!--<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span><span>home</span></span></a></li>-->
              <!--<li><span>Careers</span></li>-->
            </ul>
          </div>
        </div>
      </div>
</section>
</a>
<section class="main-page container m_t_40 m_b_40">
      <div class="main-container col1-layout">
        <div class="main">
          <div class="col-main">
            <section class="contact-us-area">
              <div class="contact-box">
                <div class="row">
                  <div class="col-md-7 m_b_20">
                    <div class="contact-form">
                      <div class="comment-respond">
                        <div class="comment-respond-inner">
                          <div class="hadding"><span>Careers</span></div>
                          <form class="comment-form respond-form" method="POST" enctype="multipart/form-data">
                            <div class="row">
                              <div class="form-name m_b_20">
                                <label class="col-md-4">Full Name :</label>
                                <div class="col-md-8">
                                  <input type="text" value="" class="form-control border-radius" placeholder="Enter Your Full Name" name="fname" id="fname" required>
                                </div>
                              </div>
                              <div class="form-name m_b_20">
                                <label class="col-md-4">City :</label>
                                <div class="col-md-8">
                                  <input type="text" value="" class="form-control border-radius" placeholder="Your City" name="city" id="city" required>
                                </div>
                              </div>
                              <div class="form-name m_b_20">
                                <label class="col-md-4">Your State :</label>
                                <div class="col-md-8">
                                  <input type="text" value="" class="form-control border-radius" placeholder="State" name="state" id="state" required>
                                </div>
                              </div>
                              <div class="form-name m_b_20">
                                <label class="col-md-4">Country :</label>
                                <div class="col-md-8">
                                  <input type="text" value="" class="form-control border-radius" placeholder="Enter Your Country" name="country" id="country" required>
                                </div>
                              </div>
                              <div class="form-name m_b_20">
                                <label class="col-md-4">Phone :</label>
                                <div class="col-md-8">
                                  <input type="tel" value="" class="form-control border-radius" placeholder="Mobile Number" name="phone" id="phone" required>
                                </div>
                              </div>
                              <div class="form-name m_b_20">
                                <label class="col-md-4">Email :</label>
                                <div class="col-md-8">
                                  <input type="email" value="" class="form-control border-radius" placeholder="Your Email ID" name="email" id="email" required>
                                </div>
                              </div>
                              <div class="form-name m_b_20">
                                <label class="col-md-4">Resume Upload :</label>
                                <div class="col-md-8">
                                  <input type="file" name="file" id="file" required>
                                </div>
                              </div>
                              <div class="form-name m_b_20">
                                <label class="col-md-4">Covering Letter :</label>
                                <div class="col-md-8">
                                  <textarea rows="4" cols="40" name="covering" id="covering" placeholder="Enter Message:" class="form-control border-radius" required></textarea>
                                </div>
                              </div>
                              <div class="form-name m_b_20">
                                <label class="col-md-4"></label>
                                <div class="col-md-8">
                                  <button  type="submit" class="submitting">Submit</button>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
				 <div class="col-md-5 m_b_20">
				 <img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/image/careers.jpg" class="img-responsive" alt="" title="">
				 </div>
				</div>
              </div>
            </section>
          </div>
        </div>
      </div>
</section>
<?php get_footer(); ?>
