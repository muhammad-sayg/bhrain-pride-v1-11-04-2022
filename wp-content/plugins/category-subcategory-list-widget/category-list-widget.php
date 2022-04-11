<?php
/*
Plugin Name: Category Subcategory List Widget
Description: Category and Subcategory List Widget
Version: 4.8
Text Domain: category-subcategory-list-widget
Domain Path: /languages/
Plugin URI: http://products.indiacitys.com/
Author: Muralidharan Ramasamy
Author URI: http://forum.indiacitys.com/
*/
/**
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright (c) <2016> <Indiacitys.com technologies private limited>
 *
 *
 * @author    Murali
 * @copyright 2016 Indiacitys.com Technologies private limited, Coimbatore, India
 * @license   GPLv2 or later
 * 
 */
class core_special_widgets_categories extends WP_Widget { 
    function __construct() {
        // widget actual processes		
	/*	$opts = array(
			'classname' => 'core_special_widgets_categories',
			'description' => __( 'Category and subcategory list widget.' )
		);
		parent::__construct( 'core_special_widgets_categories', __( '&#9658; Category and Subcategory list' ), $opts );*/

		parent::__construct(
			'core_special_widgets_categories', // Base ID
			__( '&#9658; Category and Subcategory list', 'category-subcategory-list-widget' ), // Name
			array( 'description' => __( 'Category and subcategory list widget', 'category-subcategory-list-widget' ), ) // Args
		);		
    }
    function form($instance) {	
 		$defaults = array(
			'title'		=> 'Website Categories',
			'fontweightcustom' => 'normal',
			'fontsizecustom' => '12',
			'icon' => true,
		);		
		$instance = wp_parse_args( $instance, $defaults );  

	 ?>
     
 	<p><b><?php esc_html_e("Title",'category-subcategory-list-widget'); ?></b></p>
	<input class="widefat" type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $instance['title']); ?>" />
 	<p><b><?php esc_html_e("Font weight normal/bold",'category-subcategory-list-widget'); ?></b></p>
	<input type="text" id="<?php echo $this->get_field_id( 'fontweightcustom' ); ?>" name="<?php echo $this->get_field_name( 'fontweightcustom' ); ?>" value="<?php echo esc_attr( $instance['fontweightcustom']); ?>" />
 	<p><b><?php esc_html_e("Font size in px",'category-subcategory-list-widget');?></b></p>
	<input type="number" id="<?php echo $this->get_field_id( 'fontsizecustom' ); ?>" name="<?php echo $this->get_field_name( 'fontsizecustom' ); ?>" value="<?php echo esc_attr( $instance['fontsizecustom']); ?>" />

     <?php
	$args = array(
  		'public'   => true,
  		'_builtin' => false
  
	); 
	$output = 'names'; // or objects
	$operator = 'and'; // 'and' or 'or'
	$custtaxonomies = get_taxonomies($args, $output, $operator); 
  	$out = '<p><input id="' . $this->get_field_id('icon') . '" name="' . $this->get_field_name('icon') . '" type="checkbox" ' . checked(isset($instance['icon'])? $instance['icon']: 0, true, false) . ' /> <b>'.esc_html__("Show Category Icon","category-subcategory-list-widget").'</b></p><br /><p><input id="' . $this->get_field_id('f') . '" name="' . $this->get_field_name('f') . '" type="checkbox" ' . checked(isset($instance['f'])? $instance['f']: 0, true, false) . ' /> <b>'.esc_html__('Show Count','category-subcategory-list-widget').'</b></p><br /><p><input id="' . $this->get_field_id('empty') . '" name="' . $this->get_field_name('empty') . '" type="checkbox" ' . checked(isset($instance['empty'])? $instance['empty']: 0, true, false) . ' /> <b>'.esc_html__('Show Empty Cats','category-subcategory-list-widget').'</b></p><br /><b>'.esc_html__('Select Taxonomy&nbsp;&nbsp;','category-subcategory-list-widget').'</b><select name="'.$this->get_field_name( 'taxonomytype' ).'" id="'.$this->get_field_name( 'taxonomytype' ).'" class="wn_status widget-core_special_widgets_categories-2-wn_show">';
	if (count($custtaxonomies) == 0)
	{
		$out .=  '<option value="category">'.esc_html__("Category","category-subcategory-list-widget").'</option>';
	}
	foreach ( $custtaxonomies as $taxonomy ) {
		if ($instance['taxonomytype'] == 'category') {
    			$out .=  '<option value="category" selected=selected>Category</option><option value="'.$taxonomy.'">' . $taxonomy . '</option>';
		}
		else
		{
			if ($instance['taxonomytype'] == $taxonomy) {
    				$out .=  '<option value="category">Category</option><option value="'.$taxonomy.'" selected=selected>' . $taxonomy . '</option>';
			}
			else
			{
    				$out .=  '<option value="category">Category</option><option value="'.$taxonomy.'">' . $taxonomy . '</option>';
			}
		}
	}
	$out .= '</select><br /><br />';
	echo $out; 

    }

	function update( $new, $old )	{	
	
		$clean = $old;		
		$clean['title'] = isset( $new['title'] ) ? strip_tags( esc_html( $new['title'] ) ) : '';
		$clean['f'] = isset( $new['f'] ) ? '1' : '0';
		$clean['ff'] = isset( $new['ff'] ) ? '1' : '0';	
		$clean['empty'] = isset( $new['empty'] ) ? '1' : '0';
		$clean['icon'] = isset( $new['icon'] ) ? '1' : '0';
		$clean['taxonomytype'] = isset($new['taxonomytype'] ) ? $new['taxonomytype'] : 'category';
		$clean['fontweightcustom'] = isset( $new['fontweightcustom'] ) ? $new['fontweightcustom'] : 'normal';	
		$clean['fontsizecustom'] = isset( $new['fontsizecustom'] ) ? $new['fontsizecustom'] : '12';
		return $clean;
	}

    function widget($args, $instance) {
		wp_enqueue_style( 'iccategoryjquerycss', plugins_url( '/css/categoryjquerycss.css', __FILE__ ) );
		wp_enqueue_style( 'iccategorystyle', plugins_url( '/css/categorystyle.css', __FILE__ ) );
		wp_enqueue_script('jquery-ui-menu');
		wp_enqueue_script('iccategoryjs', plugins_url( '/js/categoryjs.js', __FILE__ ), array(), '1.0.0');

		global $CORE; $STRING = ""; @extract($args); 
		/*** get the menu items **/
		if($instance['empty']){ $hideempty = 0; }else { $hideempty = 1; }
		// CHECK FOR COUNT
		if(isset($instance['f']) && $instance['f']){ $show_count = 1; }else{ $show_count = 0; }

		if(isset($instance['taxonomytype'])){ $themetaxonomy = $instance['taxonomytype'];} else { $themetaxonomy = 'category'; }

		if($instance['icon']){ $show_image = true; }else { $show_image = false; }
	
		$cats = wp_list_categories(array('walker'=> new Walker_Simple_Example2, 'taxonomy' => $themetaxonomy, 'show_count' => $show_count, 'hide_empty' => $hideempty, 'echo' => 0, 'title_li' =>  false, 'show_image' => $show_image) ); 
	 
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}

		echo '<ul id="catsubcat" style="width:100%;margin:0 auto;" class="list-group clearfix">';
		//<li><a href=""> a aaaa </a></li>
		/*** show full list ***/
		if(isset($instance['ff']) && $instance['ff']){
		$cats = str_replace("children","list-group clearfix children openall",$cats);
		}
		$cats = str_replace("cat-item","list-group-item",$cats);
		/*** display output ***/
		echo $cats;
		echo '</ul>';	
			
		echo $after_widget;
 
    }



}
class Walker_Simple_Example2 extends Walker_Category {  


     function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) { 
	 	
		$count = "";
		$gettermcount = get_term_by( 'id', $item->term_id, 'listing');
	 	if ( ! empty( $args['show_count'] ) ) {
			$count = ' (' . number_format_i18n( $item->count ) . ')';
		} 

		$showimage = $args['show_image'];
		$img = "";
		if ($showimage) {
		$icons = get_option("iclcat_" . $item->term_id); 
		if (is_array($icons)){
			foreach($icons as $size => $attach_id) 
			{
				if($attach_id > 0) 
				{ 
					$img = wp_get_attachment_image($attach_id,'iclcat_icon_small');
				}
			}
		}
		}

 	 	
		$termchildren = get_term_children( $item->term_id, $item->taxonomy );

		$image_style = '';

        	if(count($termchildren)>0){
			$aclass =  ' class="parent" ';
			if ($img == ''){
        		$output .= "<li class=\"list-group-item".$image_style."\"><a href='".esc_url( get_term_link( $item ) )."'><div class='imgstyle1'>".$img."&nbsp;&nbsp;".esc_attr( $item->name ).$count."</div></a>";
			}
			else
			{
        		$output .= "<li class=\"list-group-item".$image_style."\"><a href='".esc_url( get_term_link( $item ) )."'><div class='imgstyle2'>".$img."&nbsp;&nbsp;".esc_attr( $item->name ).$count."</div></a>";
			}
        	}
		else
		{
			if ($img == ''){
        		$output .= "<li class=\"list-group-item".$image_style."\"><a href='".esc_url( get_term_link( $item ) )."'><div class='imgstyle1'>".$img."&nbsp;&nbsp;".esc_attr( $item->name ).$count."</div></a>";
			}
			else
			{
        		$output .= "<li class=\"list-group-item".$image_style."\"><a href='".esc_url( get_term_link( $item ) )."'><div class='imgstyle2'>".$img."&nbsp;&nbsp;".esc_attr( $item->name ).$count."</div></a>";
			}
		}
    }  

    function end_el(&$output, $item, $depth=0, $args=array(), $id = 0) {  
        $output .= "</li>\n";  
    }  
} 
// register Category list widget
function register_categorylist_widget() {
    register_widget( 'core_special_widgets_categories' );
}
add_action( 'widgets_init', 'register_categorylist_widget' );

//$plugin_dir = basename( dirname( __FILE__ ) );
//load_plugin_textdomain( 'core_special_widgets_categories', null, $plugin_dir );

add_action( 'plugins_loaded', 'myplugin_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function myplugin_load_textdomain() {
  load_plugin_textdomain( 'category-subcategory-list-widget', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' ); 
}

$widgettaxonomy = get_option('widget_core_special_widgets_categories');

$themetaxonomy = 'category';

if ($widgettaxonomy ==  false)
{
}
else
{
	foreach ($widgettaxonomy as $widgettax)
	{
		if (isset($widgettax['taxonomytype'])) {
			$themetaxonomy = $widgettax['taxonomytype'];
		}
	}
}

add_action( $themetaxonomy . "_add_form_fields", 'iclcat_add_new_metafield');

	function iclcat_add_new_metafield() 
	{


		$sizes1 = array("small" => __("","category-subcategory-list-widget"));
		$defaults1 = array('small_w' => 20, 'small_h' => 20); 

	?>
		<label for="parent"><?php esc_html_e("Category Icon - 32x32pixels", 'category-subcategory-list-widget'); ?></label>

		<?php foreach ($sizes1 as $size => $label) { ?> 

		<label for="upload_image"> <?php echo $label; ?>
		<div id="iclcat_preview_<?php echo $size; ?>"></div><div id='iclcat_remove'><a><?php esc_html_e("Remove Icon", 'category-subcategory-list-widget'); ?></a></div>
    		<input id="iclcat_icon_<?php echo $size ?>" type="hidden" size="36" name="iclcat_icon_<?php echo $size; ?>" value="http://"  />
    		<input id="<?php echo $size; ?>" class="iclcat_icon_button button" type="button" value="Upload Image" />
    		<br /><br />
    	
		</label>
		<?php } ?>
	<?php
	}

	add_action( $themetaxonomy . "_edit_form_fields", 'iclcat_edit_metafield');

	function iclcat_edit_metafield($term)
	{

		$sizes1 = array("small" => __("","category-subcategory-list-widget"));
		$defaults1 = array('small_w' => 20, 'small_h' => 20); 
		$id = $term->term_id; 

	// Fix 1.11
	//$icons = get_post_meta($term->term_id,'iclcat_icons',true);
	$icons = get_option("iclcat_" .$id); 

	$output = "</tbody></table>
				<h2>" . __("Category Icons - 32x32pixels", 'category-subcategory-list-widget') . "</h2> 
			  <table class='form-table iclcat-form-table'><tbody>
			  "; 
				
	foreach($sizes1 as $size => $label) 
	{
		if (isset($icons[$size]))
		{
			$attach_id = $icons[$size]; 
			$img = wp_get_attachment_image($attach_id,"iclcat_icon_" .$size);
		//	$img = image_downsize($attach_id,$size);
	
		} 
		else  
		{
			$attach_id = 0; 
			$img = '';
		} 
		  		  
	$output .= '<tr class="form-field">
			<th scope="row" valign="top"><label>' . $label . '</label></th>';
	
	$output .= ""; 
		
	$output .= '<td>
				 <div id="iclcat_preview_' . $size . '" class="iclcat_icon_preview" >' . $img .'</div>
				 </td>
				
	 <td>
	  <input id="iclcat_icon_' . $size . '" type="hidden" name="iclcat_icon_' . $size .'" value="' . $attach_id . '" />
      <input id="' . $size . '" class="button iclcat_icon_button" type="button" value="Upload Image" />
		
				</td>
				<td><div><a class="iclcat_remove" id=' . $size . '>' . __("Remove Icon", 'category-subcategory-list-widget') . '</a></div></td>
				
				</tr>' ;
	}

	$output .= "</tbody>";
	echo $output; 
}


	add_action( "edited_" .$themetaxonomy, 'iclcat_save_metafield');  

	add_action( "create_" . $themetaxonomy, 'iclcat_save_metafield');

function iclcat_save_metafield($term_id)
{

	$sizes1 = array("small" => __("","category-subcategory-list-widget"));
	$defaults1 = array('small_w' => 20, 'small_h' => 20); 

	$icons = array(); 
	
	foreach($sizes1 as $size => $label)
	{
		if (isset($_POST["iclcat_icon_" . $size]))
		{
			$attach_id = $_POST["iclcat_icon_$size"];
		
			if ($attach_id > 0)
			{
				$local_file = get_attached_file($attach_id);
		
				$attach_data = wp_generate_attachment_metadata($attach_id, $local_file);
				wp_update_attachment_metadata( $attach_id,  $attach_data );	
				$icons[$size] = $attach_id;
			}
		}
	}

	// then save the taxonomy metadata
	// FIX 1.11 Use Get_option for custom tax
	update_option("iclcat_" . $term_id,$icons);
	
	//update_post_meta($term_id,'iclcat_icons',$icons);

}

add_filter( 'manage_edit-'.$themetaxonomy.'_columns', 'iclcat_category_column');

function iclcat_category_column($columns)
{
	$columns["icon"] = __("Icon", 'category-subcategory-list-widget');
	return $columns;
}	


add_filter( 'manage_' . $themetaxonomy. '_custom_column', 'iclcat_category_column_data',10,3);

function iclcat_category_column_data($deprecated, $column, $post_id)
{	

	if ($column == 'icon')
	{	
		//$icons = get_post_meta($post_id,'sci_icons',true);
		$icons = get_option("iclcat_" .$post_id); 

		if (! is_array($icons)) return;
		foreach($icons as $size => $attach_id) 
		{
			if($attach_id > 0) 
			{ $img = wp_get_attachment_image($attach_id,'iclcat_icon_small');
				return $img;
			}
		}
	}
}

add_action('admin_init','init');
function init()
{
	// dirty hack to get around wp_enqueue_media bug ( http://core.trac.wordpress.org/ticket/22843 )
	global $pagenow;
	if ($pagenow != 'post.php' && $pagenow != 'post-new.php')
	{	wp_enqueue_media();

	}
	wp_enqueue_style( 'iccategoryjquerycss', plugins_url( '/css/categoryjquerycss.css', __FILE__ ) );
	wp_enqueue_style( 'iccategorystyle', plugins_url( '/css/categorystyle.css', __FILE__ ) );
	wp_enqueue_script('jquery-ui-menu');
	wp_enqueue_script('iccategoryjs', plugins_url( '/js/categoryjs.js', __FILE__ ), array(), '1.0.0');

	$nonce = wp_create_nonce(); 
	wp_localize_script( 'iccategoryjs', 'ajax_object',
           		 array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'we_value' => $nonce,
				'loader_url' => plugins_url('images/ajax-loader.gif',__FILE__ ) ) );  
}

// Ajax calls for image processing
add_action( 'wp_ajax_iclcat_new_icon', 'iclcat_ajax_new_icon');
function iclcat_ajax_new_icon()
{
	//retrieve image
	if (! isset($_POST["img_url"]))
		die ("Error: No URL");
	
	$attach_id = $_POST["attach_id"];
	$size = $_POST["size"]; // which size are we doing? 
				
   	$local_file = get_attached_file($attach_id);
   
	// generate metadata on basis of sizes
	$attach_data = wp_generate_attachment_metadata($attach_id, $local_file);
	wp_update_attachment_metadata( $attach_id,  $attach_data );	

	// return new image URL
	$data = array("newimg" => image_downsize($attach_id, "iclcat_icon_" . $size),
				  "size" => $size	
				);
	
	header('Content-Type: application/json');
	echo json_encode($data);
	exit();

}

function getSizes()
{
	return $this->sizes; 
}

// dim = w / h
function getDimensions($size,$dim = 'w') 
{
	if ($dim != ('w' || 'h')) return -1; 
	
	$val = get_option('iclcat_icon_' . $size . '_' .$dim);
	if (! $val || ! is_numeric($val))
	{
		return $this->defaults[$size . '_' . $dim];
	}
	else return $val;

}

function saveDimensions($size,$dim = 'w', $value) 
{
	if ($dim != ('w' || 'h')) return -1; 
	if (! is_numeric($value)) return -2;
	
	update_option('iclcat_icon_'. $size . '_' . $dim, $value);
	return true;

}

function getTaxonomySettings()
{
	$taxonomies =  get_option('iclcat_taxonomies'); 
	if ($taxonomies == "") // default to everything if there are no settings
	{ 
		$taxonomies = get_taxonomies(array(
						'public' => true,
						'show_ui' => true,

					), 'objects');
			$taxArray = array();
		foreach($taxonomies as $taxonomy => $taxObj)
		{
			$taxArray[$taxonomy] = 1;
		
		}			
		return $taxArray;
	
	
	}
	return $taxonomies;
}

function saveTaxonomySettings($taxSettings)
{
	$r = update_option('iclcat_taxonomies',$taxSettings);
	return $r;
}

function taxonomyIsActive($tax_type)
{
	$taxonomies = $this->getTaxonomySettings();
	if (array_key_exists ($tax_type, $taxonomies))
	{

		if ($taxonomies[$tax_type] == 1)
			return true; 
		else 
			return false;
	}
	else
		return false;

}
?>