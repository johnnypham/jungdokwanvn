<?php get_header(); 
$post_type_custom = get_queried_object();
$post_id = get_the_ID();
$format = get_post_format( $post_id );
 // echo('<pre>');
 // var_dump( $post_type_custom->post_type );
 // var_dump( $format );?>
 <div class="main container news_single_page">
 <div class="row">
 	<div class="news_active col-md-8">
		 <?php switch ( $post_type_custom->post_type) {
				    case "gallery":
				       get_template_part( 'single','gallery-image' );
				        break;
				    case "video":
				       get_template_part( 'single','video' );
				        break;
				    case "event":
				       get_template_part( 'single','events' );
				        break;
				    case "post":
				    		switch ( $format) {
				    			case "image":
							       	get_template_part( 'single','news-image' );
							        break;
				    			case "audio":
							       	get_template_part( 'single','news-audio' );
							        break;	
				    			case "aside":
							       	get_template_part( 'single','news-aside' );
							        break;
				    			case "quote":
							       	get_template_part( 'single','news-default' );
							        break;	
				    			case "video":
							       	get_template_part( 'single','news-video' );
							        break;
				    			default :
							       	get_template_part( 'single','news-default' );
							        break;			        
				    		}
				        break;
				    default :
				       	get_template_part( 'single','news-default' );
				        break;

				};

		?>

	</div>
		<?php
			if(($post_type_custom->post_type) != 'gallery'){
			 ?>
				<div class="category col-md-4">
						<h3 class="title"><span>DANH MỤC</span></h3>
					<?php if ( is_active_sidebar( 'new-single' ) ) : ?>
						<?php dynamic_sidebar( 'new-single' ); ?>
					<?php endif; ?>	
				</div>
		<?php } ;?>
</div>
</div>
<?php //if ( have_posts() ) : while ( have_posts() ) : the_post(); 

?>

	<!-- <div class="main container album_detail">
		<div class="album">
			<h3 class="title"><span>ALBUM DETAILS </span></h3>

		</div>
			<div class="masonry-gutter">

			<div id="content">
			<div class="box-gutter"></div>
			<div class="box-sizer"></div> -->



<?php 

//$content = get_the_content();
//$content=split("\,", $content);

//foreach ($content as $key => $value) {
	
//	$gallery = wp_get_attachment( $value );
	// echo '<pre>';
	// var_dump($gallery);

//	echo ('<div class="box">');
//	echo ('<a class="fancybox" rel="gallery1" href="'.$gallery['src'].'" title="'.$gallery['caption'].'">');
///	echo('<img src="'.$gallery['src'].'" alt="'.$gallery['alt'].'" /></a></div>');


	# code...
//};


//get_template_part( 'entry' ); ?>
<?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php //endwhile; endif; ?>
			   


       
	<!-- 			</div><!--End gallery-->
			<!-- <div class=""><a href="#" class="btn btn_more">More</a></div>
		</div><!--End album--> 
	<!-- </div><!--end main-->
<!--<footer class="footer"> --> 
<?php //get_template_part( 'nav', 'below-single' ); ?>
<!-- </footer> -->

<?php// get_sidebar(); ?>
<?php get_footer(); ?>