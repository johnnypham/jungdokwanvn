<?php
/**
 * Template Name: Video Page
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
		<h3 class="title"><span>Video</span></h3>
		<div id="video-left" class="col-md-6 col-xs-12">
			<?php $id='aW7jhBq2dwI'?>
			<iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/<?php echo $id; ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
		</div>
		<div id="video-thumb-right" class="col-md-6 col-xs-12">
		</div>
		<ul class="row list_picture">
			<?php 
			$page_ID=6;
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array('post_type'=>'video','posts_per_page' => $pageID, 'paged'=>$paged);
			$the_query = new WP_Query( $args ); ?>
			<?php if ( $the_query->have_posts() ) : ?>
			<?php $count = 1; while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<li class="col-lg-4 col-sm-6">
				<figure>
					<a class="video img-link" title="<?php the_title(); ?>" href="<?php the_field('url_youtube') ?>"><?php the_post_thumbnail(); ?></a></figure>
				<figcaption>
					<h4><a class="video" title="<?php the_title(); ?>" href="<?php the_field('url_youtube') ?>"><?php the_title(); ?></a></h4>
					<div><?php the_excerpt(); ?></div>
				</figcaption>
			</li>
			<?php if($count == 3 || $count == 6 || $count == 9){
				echo ('<div style="clear:both"></div>');
				}
			$count++; ?>
			<?php wp_pagenavi( array( 'type' => 'multipart' ) ); ?>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>
<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
		</ul><!--End row-->
	</div><!--End main-->
<?php get_footer(); ?>