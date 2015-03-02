<?php
/**
 * Template Name: News Page
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
<?php wp_reset_query(); ?>
		<div class="main container news_page">
		<div class="row" >
			<div class="news_event col-md-8">
				<h3 class="title"><span>TIN TỨC & SỰ KIỆN</span></h3>
				<?php 	
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array('post_type'=>'post','cat'=> 1 ,'posts_per_page' => 5,'paged'=>$paged);
						 	$the_query = new WP_Query( $args ); ?>
				<?php if ( $the_query->have_posts() ) : ?>
				<!-- pagination here -->
				<!-- the loop -->

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
				$post_type_custom = get_queried_object();
				$post_id = get_the_ID();
				$format = get_post_format( $post_id );
					switch ($format) {
					    case "image":
					        get_template_part( 'news','image' );
					        break;
					    case "video":
					         get_template_part( 'news','video' );
					        break;
					    case "quote":
					         get_template_part( 'news','quote' );
					        break;
					    case "audio":
					         get_template_part( 'news','audio' );
					        break;
					    case "aside":
					        get_template_part( 'news','aside' );
					        break;
					     default:
      						get_template_part( 'news','default' );	        
					        break;
					}
					
				?>

				<?php endwhile; ?>
				<?php wp_reset_query(); 
				wp_pagenavi(array( 'query' => $the_query ) );    ?>
				<!-- end of the loop -->
				<!-- pagination here -->
		
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php wp_reset_query(); ?>
			<?php endif; ?>
			</div>	
			<aside>
				<div class="category col-md-4">
						<h3 class="title"><span>DANH MỤC</span></h3>
					<?php if ( is_active_sidebar( 'new-single' ) ) : ?>
						<?php dynamic_sidebar( 'new-single' ); ?>
					<?php endif; ?>	
				</div>
			</aside>
	</div><!--End main-->
	</div><!--End main-->
<?php get_footer(); ?>