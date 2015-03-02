<?php
/**
 * Template Name: Home Page
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
<div class="main container">
	<?php 	$args = array('post_type'=>'post','posts_per_page' => 3);
		 	$the_query = new WP_Query( $args ); ?>
	<div class="welcome">
		<h3 class="title"><span>WELCOME </span></h3>
		<div class="row">
			<?php if ( $the_query->have_posts() ) : ?>
				<!-- pagination here -->
				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<figure>
						<a class="img-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></figure>
					<figcaption>
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<div><?php 
							$excerpt = get_the_excerpt();
							  echo string_limit_words($excerpt,25).'...';

							  //the_excerpt(); ?></div>
					</figcaption>
				</div>
				<?php endwhile; ?>
				<!-- end of the loop -->
				<!-- pagination here -->
				<?php wp_reset_postdata(); ?>
		</div><!--End row-->
			<?php else : ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
	</div><!--End welcome-->
	<?php 	$args = array('post_type'=>'post','posts_per_page' => 1,'orderby'  => 'rand',);
		 	$the_query = new WP_Query( $args ); ?>
	<div class="row">
		<div class="news col-md-8">
			<h3 class="title"><span>Tin tức hoạt động</span></h3>
				<article class="news_main row">
				<?php if ( $the_query->have_posts() ) : ?>
					<!-- pagination here -->
					<!-- the loop -->
					<?php  while ( $the_query->have_posts() ) : $the_query->the_post();	?>
						<figure class="col-md-6 col-sm-6 col-xs-12"><a href="<?php the_permalink(); ?>" class="img-link"><?php the_post_thumbnail(); ?></a></figure>
							<figcaption class="col-md-6 col-sm-6 col-xs-12">
							<h4 class='new-cus-jh'><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<?php 
							$excerpt = get_the_excerpt();
							  echo string_limit_words($excerpt,100).'...';

							  //the_excerpt(); ?>
							</figcaption>
					<?php endwhile; ?>
					<!-- end of the loop -->
					<!-- pagination here -->
				</article>
					<?php wp_reset_postdata(); ?>
				<?php else : ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>

		<?php 	$args = array('post_type'=>'post','posts_per_page' => 3,'orderby' => 'rand',);
			 	$the_query = new WP_Query( $args ); ?>
				<div class="list-news row">
					
					<?php $count=1 ;if ( $the_query->have_posts() ) : ?>
						<!-- pagination here -->
						<!-- the loop -->
						<?php  while ( $the_query->have_posts() ) : $the_query->the_post();
							if( $count = 1 || $count =6){
							echo ('<ul class="nav col-md-12 col-sm-12 col-xs-12">');
						}	?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

						<?php 
							if( $count = 6 || $count = 12){
								echo ('</ul>');
							}
								endwhile; ?>
						<!-- end of the loop -->
						<!-- pagination here -->
					
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>

				</div><!--End Tin tuc khac-->				
		</div><!--End new-->

		<div class="students col-md-4">
			<h3 class="title"><span>Học viên</span></h3>
				<?php if ( is_active_sidebar( 'home-1' ) ) : ?>
					<?php dynamic_sidebar( 'home-1' ); ?>
				<?php endif; ?>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 trainer">
			<h4 class="text-center">HUẤN LUYỆN VIÊN</h4>
				<?php 	$args = array('post_type'=>'master','posts_per_page' => -1);
		 			$the_query = new WP_Query( $args ); ?>
			<div id="trainer_slide" class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						
							<?php $count=1 ;if ( $the_query->have_posts() ) : ?>
								<!-- pagination here -->
								<!-- the loop -->
								
									<?php  while ( $the_query->have_posts() ) : $the_query->the_post();	?>
										<?php if($count % 2 != 0 && $count == 1){
											echo ('<div class="item active">');
										}elseif ($count % 2 != 0) {
											echo ('<div class="item">');
											
										}; ?>
											<div class="col-md-6 col-sm-6c col-xs-6 master-jung text-center">
												<figure class="master-image">
													<?php  the_post_thumbnail( 'full', array( 'class' => 'image' ) ); ?>
												</figure>
												<figcaption>
														<?php echo get_the_content(); ?>
												</figcaption>
											</div>
										<?php if($count % 2 == 0){
											echo ('</div>');

										};$count++; ?>
										
									<?php endwhile; ?>
									<!-- end of the loop -->
									<!-- pagination here -->
								
								<?php wp_reset_postdata(); ?>
							<?php else : ?>
								<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
							<?php endif; ?>

							</div>
					
					<a class="left carousel-control" href="#trainer_slide" data-slide="prev">
						<span class="icon-prev"></span>
					</a>
					<a class="right carousel-control" href="#trainer_slide" data-slide="next">
						<span class="icon-next"></span>
					</a>
			</div>
		</div><!--End Huấn luyện viên-->
	<?php 	$args = array('post_type'=>'event','posts_per_page' => -1);
		 			$the_query = new WP_Query( $args ); ?>
			<div class="col-md-4 col-xs-12 col-sm-6 events">
				<h4 class="text-center">SỰ KIỆN</h4>
				<?php if ( $the_query->have_posts() ) : ?>
						<!-- pagination here -->
						<!-- the loop -->
						
							<?php  while ( $the_query->have_posts() ) : $the_query->the_post();	?>
								
									<section class="section event-cus">
										<div class="image pull-left">
											<p class="time"><?php the_time('d-m-Y g:i:s A ') ?> </p>
											<?php the_post_thumbnail(array(120,70)); ?>
										</div>
										<div class="text pull-left">
											<p class="hour"><?php  //echo get_post_meta($post->ID, 'times_event', true); ?></p>
											<h6><?php the_title(); ?></h6>
											<p><?php//the_excerpt(); ?></p>
											<a  href="<?php the_permalink(); ?>"  class="booking">Read more</a>
										</div>
									</section>
							<?php endwhile; ?>
							<!-- end of the loop -->
							<!-- pagination here -->
						
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					<?php endif; ?>

			</div><!--End sự kiện-->
			<div class="col-md-4 col-xs-12 col-sm-6 fb_area">
				<h4 class="text-center">FACEBOOK</h4>
				<?php if ( is_active_sidebar( 'home-2' ) ) : ?>
					<?php dynamic_sidebar( 'home-2' ); ?>
				<?php endif; ?>	
			</div><!--End fb_area-->
		</div>
	</div>

</div><!--End Main-->
	<div class="show">
		<div class="container">
			<div class="row">
				<?php if ( is_active_sidebar( 'gallery-video' ) ) : ?>
					<?php dynamic_sidebar( 'gallery-video' ); ?>
				<?php endif; ?>	
			</div><!--End row-->
		</div>
	</div><!--End show-->
<?php get_footer(); ?>