<?php
add_action( 'after_setup_theme', 'jungdo_setup' );
function jungdo_setup(){
	load_theme_textdomain( 'jungdo', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 640;
	register_nav_menus(
	array( 'main-menu' => __( 'Main Menu', 'jungdo' ) )
	);
}
add_action( 'wp_enqueue_scripts', 'jungdo_load_scripts' );
function jungdo_load_scripts(){
	wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'jungdo_enqueue_comment_reply_script' );

function jungdo_enqueue_comment_reply_script(){
if ( get_option( 'thread_comments' ) ) { 
	wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'jungdo_title' );
function jungdo_title( $title ) {
	if ( $title == '' ) {
		return '&rarr;';
	} else {
	return $title;
	}
}
add_filter( 'wp_title', 'jungdo_filter_wp_title' );
function jungdo_filter_wp_title( $title ){
	return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'jungdo_widgets_init' );
function jungdo_widgets_init(){
	register_sidebar( array (
	'name' => __( 'Footer-1', 'jungdo' ),
	'id' => 'footer-1',
	'before_widget' => '<div id="%1$s" class="col-lg-4 col-md-6 sigup">',
	'after_widget' => "</div>",
	'before_title' => '<h6 class="widget-title">',
	'after_title' => '</h6>',
	) );
	register_sidebar( array (
	'name' => __( 'Footer-2', 'jungdo' ),
	'id' => 'footer-2',
	'before_widget' => '<div id="%1$s" class="col-lg-4 col-md-6 center">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array (
	'name' => __( 'Footer-3', 'jungdo' ),
	'id' => 'footer-3',
	'before_widget' => '<div id="%1$s" class="col-lg-4 col-md-6 footer-link">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array (
	'name' => __( 'Footer-4', 'jungdo' ),
	'id' => 'footer-bottom',
	'before_widget' => '<div id="%1$s" class="row">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array (
	'name' => __( 'Sidebar Widget Area', 'jungdo' ),
	'id' => 'primary-widget-area',
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</li>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array (
	'name' => __( 'Home-1', 'jungdo' ),
	'id' => 'home-1',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array (
	'name' => __( 'Home-2', 'jungdo' ),
	'id' => 'home-2',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array (
	'name' => __( 'Gallery-Video', 'jungdo' ),
	'id' => 'gallery-video',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
	register_sidebar( array (
	'name' => __( 'News And Single', 'jungdo' ),
	'id' => 'new-single',
	'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</div>",
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
	) );
}
function jungdo_custom_pings( $comment ){
	$GLOBALS['comment'] = $comment;
?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'jungdo_comments_number' );
function jungdo_comments_number( $count ){
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}
add_action( 'after_setup_theme', 'jungdo_formats', 11 );
function jungdo_formats(){
     add_theme_support( 'post-formats', array( 'aside',
     'chat',
     'gallery',
     'image',
     'link',
     'quote',
     'status',
     'video',
     'audio' ) );
}
function create_posttype() {

	register_post_type( 'gallery ',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Gallery ' ),
				'singular_name' => __( 'Gallery ' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'images'),
			'supports' => array(
				            'title', 
				            'editor', 
				            'excerpt', 
				            'custom-fields', 
				            'thumbnail',
				            'page-attributes'
							),
		)
	);
	register_post_type( 'video',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Video ' ),
				'singular_name' => __( 'video ' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'video'),
			'supports' => array(
				            'title', 
				            'editor', 
				            'excerpt', 
				            'custom-fields', 
				            'thumbnail',
				            'page-attributes'
							),
		)
	);
	register_post_type( 'event',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Events ' ),
				'singular_name' => __( 'Events ' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'event'),
			'show_in_menu' => true,
			'supports' => array('title','editor','excerpt','thumbnail','custom-fields','comments')
		)
	);
	register_post_type( 'pan-dan',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Pon/Dan ' ),
				'singular_name' => __( 'Pon/Dan ' )
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'pan-dan'),
			'show_in_menu' => true,
		)
	);

 	  register_post_type('master', array(
			'label' => 'Master',
			'public' => true,
			'show_ui' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => array('slug' => 'master'),
			'query_var' => true,
			'supports' => array(
			'title',
			'editor',
			'excerpt',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'thumbnail',
			'author',
			'page-attributes',)
			) );
 	   register_taxonomy(
        'cat_videos',
        'video',
        array(
            'labels' => array(
                'name' => 'Categories',
                'add_new_item' => 'Add New Categories',
                'new_item_name' => "New Categories Type Video"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );


}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );
 function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}



add_filter("the_excerpt", "limit_the_excerpt");

  function limit_the_excerpt($content)
  {
    // Take the existing content and return a subset of it
   	if($content){
   		return substr($content, 0, 200);
   	}
    
  };
function query_poon(){

				$args = array('post_type'=>'pan-dan','posts_per_page' => -1);
						 	$the_query = new WP_Query( $args );
				 if ( $the_query->have_posts() ) : 
					echo '<div id="poon"><h3>Result</h3>';
				while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
					<div class="table-responsive-1" id="<?php the_ID(); ?>">

						<div class='row-cus-100'>
							<label class="bg_cus bore-bt">NAME</label>
							<span class='name bore-bt'><?php the_title(); ?></span>	
							<div style="clear: both;"></div>
							<label class="bg_cus">Current Poom/Dan</label>
							<span class='current_poom/dan'><?php  the_field('current_poom/dan'); ?></span>
						</div>
						<div style="clear: both;"></div>
						<div style="border-bottom: none;" class='row-cus-50'>
							<label class="bg_cus">Current Poom/Dan</label>
							<span class='poom_dan_no'><?php the_field('poom/dan_no'); ?></span>	
							<label class="bg_cus">Date of Issuance</label>
							<span class='date_of_issuance'><?php the_field('date_of_issuance'); ?></span>
						</div>
						
						<div  class='row-cus-50'>
							<label class="bg_cus">Certification</label>
							<span class='certification'><?php  the_field('certification');?></span>	
							<label class="bg_cus">Date of Issuance</label>
							<span class='date_of_issuance_2'><?php  the_field('date_of_issuance_2'); ?></span>
						</div>
						<div style="display:none" >
							<span class='natinality'><?php the_field('natinality'); ?></span>
							<span class='date'><?php  the_field('birdthday'); ?></span>
						</div>
					</div>
				<?php endwhile;
				echo '</div>';
				endif;


}
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
add_action( 'init', 'create_my_taxonomies', 0 );
function create_my_taxonomies() {

}
function mypost($id){

	$mypost  = array(
						'post_type' => 'video',
						'posts_per_page'=> -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'cat_videos',
								'field'    => 'id',
								'terms'    => $id,
							),
						),
					);
	return $mypost;
}
function custom_search_query( $query ) {
	if ( $query->is_search ) {
		$meta_query_args = array(
			array(
				'key' => '__meta_field__',
				'value' => $query->query_vars['s'],
				'compare' => 'LIKE',
			),
		);
		$query->set('meta_query', $meta_query_args);
	};
}
add_filter( 'pre_get_posts', 'custom_search_query');
function template_chooser($template)
{
  global $wp_query;
  $post_type = get_query_var('post_type');
  if( $wp_query->is_search && $post_type == 'pan-dan' )
  {
  	$meta_query_args = array(
			array(
				'post_type' => 'pan-dan',
				'compare' => 'LIKE',
			),
		);
  	$wp_query->set('meta_query', $meta_query_args);
    return locate_template('archive-recipes.php');
  }
  return $template;
}
add_filter('template_include', 'template_chooser');
function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
 function the_titlesmall($before = '', $after = '', $echo = true, $length = false) { $title = get_the_title();

	if ( $length && is_numeric($length) ) {
		$title = substr( $title, 0, $length );
	}

	if ( strlen($title)> 0 ) {
		$title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
		if ( $echo )
			echo $title;
		else
			return $title;
	}
}