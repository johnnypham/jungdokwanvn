<?php get_header(); ?>
<div class="main container news_page">
	<div class="row" >
		<div class="news_event col-md-8">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

					$post_type_custom = get_queried_object();
					$post_id = get_the_ID();
					$format = get_post_format( $post_id );
					switch ($format) {
					    case "image":
					        get_template_part( 'news','image' );
					        break;
					    case "event":
					        get_template_part( 'news','events' );
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
			  endwhile; 
			   get_template_part( 'nav', 'below' );  else : ?>
				<div class="news_event">
					<article>
						<div class="news_post">
							<h5><?php _e( 'Sorry, nothing matched your search. Please try again.', 'jungdo' ); ?></h5>
						
							<?php endif; ?>
						</div>
					</article>	
				</div>
		</div>
		<aside>
			<div class="category col-md-4">
					<h3 class="title"><span>DANH MỤC</span></h3>
				<?php if ( is_active_sidebar( 'new-single' ) ) : ?>
					<?php dynamic_sidebar( 'new-single' ); ?>
				<?php endif; ?>	
			</div>
		</aside>
	</div>
</div>
<?php// get_sidebar(); ?>
<?php get_footer(); ?>