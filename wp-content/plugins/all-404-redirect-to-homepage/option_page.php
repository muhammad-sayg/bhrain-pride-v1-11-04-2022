<?php

include_once "cf_dropdown.php";

global $wpdb,$table_prefix;



$redirect_to = (isset($_POST['redirect_to'])) ? sanitize_text_field($_POST['redirect_to']) : '';
$nonce = isset($_REQUEST['_wpnonce']) ? sanitize_text_field($_REQUEST['_wpnonce']) : '';

if($redirect_to !=='')
{
if(wp_verify_nonce( $nonce, 'p404home_nounce' ))
	{

		$newoptions['p404_redirect_to']= $redirect_to;
		$newoptions['p404_status']=sanitize_text_field($_POST['p404_status']);
		P404REDIRECT_update_my_options($newoptions);
		P404REDIRECT_option_msg('Options Saved!');
		
	}else {
                P404REDIRECT_failure_option_msg('Unable to save data!');
        }
}
$options= P404REDIRECT_get_my_options();
?>

<?php
if(P404REDIRECT_there_is_cache()!='') 
P404REDIRECT_info_option_msg("You have a cache plugin installed <b>'" . P404REDIRECT_there_is_cache() . "'</b>, you have to clear cache after any changes to get the changes reflected immediately! ");
?>

<div class="wrap">
<div ><div class='inner'>
<h2>All 404 Redirect to Homepage</h2>
	
	
<form method="POST">
	404 Redirection Status: 
	<?php
		$drop = new dropdown('p404_status');
		$drop->add('Enabled','1');	
		$drop->add('Disabled','2');
		$drop->dropdown_print();
		$drop->select($options['p404_status']);
	?>
	
	<br/><br/>
	
	Redirect all 404 pages to: 
	<input type="text" name="redirect_to" id="redirect_to" size="30" value="<?php echo $options['p404_redirect_to']?>">		
	
	<br/>
<input type="hidden" id="_wpnonce" name="_wpnonce" value="<?php echo $nonce = wp_create_nonce('p404home_nounce'); ?>" />
<br />
<input  class="button-primary" type="submit" value="  Update Options  " name="Save_Options"></form>  

</div></div>

<br/>
<hr><br/>

				 
<div>
   <i class="fa fa-times-circle"></i><span id="oops_msg"><b style="color:red">Have many broken links?</b> </span>keep track of 404 errors using our powerfull <a target="_blank" href="http://www.clogica.com/product/seo-redirection-premium-wordpress-plugin#404-options-page">redirection Plugin</a> to show and fix all broken links & 404 errors that occur on your site
<div id="seo-redirection-msg">
<br />
<input type="button" name="dismiss" value="Dismiss this message" onclick="seoredirection_hide_msg()">
<br />
<br />
<a href="https://www.clogica.com/product/seo-redirection-premium-wordpress-plugin#404-options-page" target="_blank">
<img src="<?php echo plugins_url( 'images/seo-redirection.png', __FILE__ ) ?>"></a>
</div>
</div>

<script type="text/javascript">

function seoredirection_hide_msg()
{
	localStorage.setItem('hide-seoredirection-message', 'hide_msg');
	document.getElementById("seo-redirection-msg").style.display = 'none'; 
	document.getElementById("oops_msg").style.display = 'none'; 
	window.open('https://www.clogica.com/product/seo-redirection-premium-wordpress-plugin#404-options-page', '_blank ');
}

if(localStorage.getItem('hide-seoredirection-message') == 'hide_msg')
{
	document.getElementById("seo-redirection-msg").style.display = 'none'; 
	document.getElementById("oops_msg").style.display = 'none'; 
}
</script>


