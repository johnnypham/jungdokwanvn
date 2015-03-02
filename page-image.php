<?php
/**
 * Template Name: Gallery Page
 *
 * Description: Johnny Dev
 * 
 *
 * Tip: Everthing Dev.
 *
 * @package WordPress
 * @subpackage Johnny_Themes
 * @since Johnny Themes 1.0
 */?>
<?php get_header(); ?>
		<div class="main container gallery_page">
		<h3 class="title"><span>HÌNH ẢNH</span></h3>
		<ul class="row list_picture">
<?php 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array('post_type'=>'gallery','posts_per_page' => 6, 'paged'=>$paged);
	 	$the_query = new WP_Query( $args ); ?>


<?php if ( $the_query->have_posts() ) : ?>
	
	<!-- pagination here -->

	<!-- the loop -->
	<?php $count = 1; while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<li class="col-md-4 col-sm-4 col-xs-12">
				<figure>
					<a class="img-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(370,280)); ?></a></figure>
				<figcaption>
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<div><?php the_excerpt(); ?></div>
				</figcaption>
			</li>
			<?php if($count == 3 || $count == 6 || $count == 9){
				echo ('<div style="clear:both"></div>');
				}
			$count++; ?>
			<?php wp_pagenavi( array( 'type' => 'multipart' ) ); ?>
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
		</ul><!--End row-->
		
	</div><!--End main-->
<?php get_footer(); ?>