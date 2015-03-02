<?php get_header(); ?>
<div class="main container news_page">
	<div class="row" >
		<div class="news_event col-md-8">
				<h3 class="title"><span><?php 
				if ( is_day() ) { printf( __( 'Daily Archives: %s', 'jungdo' ), get_the_time( get_option( 'date_format' ) ) ); }
				elseif ( is_month() ) { printf( __( 'Monthly Archives: %s', 'jungdo' ), get_the_time( 'F Y' ) ); }
				elseif ( is_year() ) { printf( __( 'Yearly Archives: %s', 'jungdo' ), get_the_time( 'Y' ) ); }
				else { _e( 'Archives', 'jungdo' ); }
				?></span></h3>	
		
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
			 ?>
			<?php endwhile; endif; ?>
			<?php get_template_part( 'nav', 'below' ); ?>
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