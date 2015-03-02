<?php
/**
 * Template Name: Movies Page
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
		<div class="main container video_page">
			<h3 class="title"><span>Video</span></h3>
		<div id="video-left" class="col-md-6 col-xs-12">

		<?php 	$mypost = array( 'post_type' => 'video','posts_per_page'=> 1 );
      			$loop = new WP_Query( $mypost ); 
      		while ( $loop->have_posts() ) : $loop->the_post(); ?>

          	<article id="post-video-current" <?php post_class(); ?>>
                 <?php $id = get_field('url_youtube');  ?>
				<iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/<?php echo $id; ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>              
                <h3 class="title-video-current"><?php the_title(); ?></h3>
				<ul class=" info_video_list list_icon clearfix"> 
					<li>
						<span class="icon-clock"></span><span id="video-time"> <?php the_time('d-m-Y g:i:s A ') ?></span>
					</li>
					<li>
						<span class="icon-user"></span><span id="video-author"><?php $author = get_the_author(); echo $author; ?></span>
					</li>
				</ul>
					<div id="video_content"><?php the_content()?></div>

         	</article>
  			 <?php endwhile;  ?>


		</div>
		<div id="video-thumb-right" class="col-md-6 col-xs-12 pull-right">
			<div class="carousel-video slide" id="myCarousel-1">
				<div class="navation_title">
					<a class="left carousel-control" href="#myCarousel-1" data-slide="prev">
						<span class="icon-prev"></span>
					</a>
					<a class="right carousel-control" href="#myCarousel-1" data-slide="next">
						<span class="icon-next"></span>
					</a>
					<h3 class="title-video">Video</h3>
				</div>
				<div class="carousel-inner">
				<?php 	$the_query = new WP_Query( mypost(20) );
						$count=0;
						while ( $the_query->have_posts() ) : $the_query->the_post();
						$count++;
						
						if($count == 1){
							$active = 'active';
						}else{
							$active='';
						}
				?>
				    <div class="item <?php echo $active ; ?>">
				      	<div class="col-md-4 col-sm-4 col-xs-4">
					      	<a class="changeurl" style="display: block;width: 100%;height: 100%;" href="#" data-date="<?php the_time('d-m-Y g:i:s A '); ?>" data-author="<?php $author = get_the_author(); echo $author; ?>" data-content="<?php the_content(); ?>" data-title="<?php the_title(); ?>" data-id="https://www.youtube-nocookie.com/embed/<?php the_field('url_youtube');?>?rel=0&amp;showinfo=0" frameborder="0">
					      		<?php $id=get_field('url_youtube'); ?>
								<?php the_post_thumbnail('thumbnail'); ?>
					     	</a>
					     	<h5 class="videos-details">
								<a class="changeurl"  href="#" data-date="<?php the_time('d-m-Y g:i:s A '); ?>" data-author="<?php $author = get_the_author(); echo $author; ?>" data-content="<?php the_content(); ?>" data-title="<?php the_title(); ?>" data-id="https://www.youtube-nocookie.com/embed/<?php the_field('url_youtube');?>?rel=0&amp;showinfo=0" frameborder="0">
									<?php the_title(); ?>
								</a>
					     	</h5>
					     	
					     	
				  		</div>
				    </div>
					<?php endwhile;  ?>
				</div>
			</div>
			<div class="carousel carousel-video slide" id="myCarousel-19">
				<div class="navation_title">
					<a class="left carousel-control" href="#myCarousel-19" data-slide="prev">
						<span class="icon-prev"></span>
					</a>
					<a class="right carousel-control" href="#myCarousel-19" data-slide="next">
						<span class="icon-next"></span>
					</a>
					<h3 class="title-video">Video</h3>
				</div>
				<div class="carousel-inner">
				<?php 	$the_query = new WP_Query( mypost(19) );
						$count=0;
						while ( $the_query->have_posts() ) : $the_query->the_post();
						$count++;
						
						if($count == 1){
							$active = 'active';
						}else{
							$active='';
						}
				?>
				    <div class="item <?php echo $active ; ?>">
				      	<div class="col-md-4 col-sm-4 col-xs-4">
					      	<a class="changeurl" style="display: block;width: 100%;height: 100%;" href="#" data-date="<?php the_time('d-m-Y g:i:s A '); ?>" data-author="<?php $author = get_the_author(); echo $author; ?>" data-content="<?php the_content(); ?>" data-title="<?php the_title(); ?>" data-id="https://www.youtube-nocookie.com/embed/<?php the_field('url_youtube');?>?rel=0&amp;showinfo=0" frameborder="0">
					      		<?php $id=get_field('url_youtube'); ?>
								<?php the_post_thumbnail('thumbnail'); ?>
									
					     	</a>
					     	<h5 class="videos-details">
								<a class="changeurl"  href="#" data-date="<?php the_time('d-m-Y g:i:s A '); ?>" data-author="<?php $author = get_the_author(); echo $author; ?>" data-content="<?php the_content(); ?>" data-title="<?php the_title(); ?>" data-id="https://www.youtube-nocookie.com/embed/<?php the_field('url_youtube');?>?rel=0&amp;showinfo=0" frameborder="0">
									<?php the_title(); ?>
								</a>
					     	</h5>
					     	
					     	
				  		</div>
				    </div>
					<?php endwhile;  ?>
				</div>
			</div>

			<div class="carousel carousel-video slide" id="myCarousel-18">
				<div class="navation_title">
					<a class="left carousel-control" href="#myCarousel-18" data-slide="prev">
						<span class="icon-prev"></span>
					</a>
					<a class="right carousel-control" href="#myCarousel-18" data-slide="next">
						<span class="icon-next"></span>
					</a>
					<h3 class="title-video">Video</h3>
				</div>
				<div class="carousel-inner">
				<?php 	$the_query = new WP_Query( mypost(18) );
						$count=0;
						while ( $the_query->have_posts() ) : $the_query->the_post();
						$count++;
						
						if($count == 1){
							$active = 'active';
						}else{
							$active='';
						}
				?>
				    <div class="item <?php echo $active ; ?>">
				      	<div class="col-md-4 col-sm-4 col-xs-4">
					      	<a class="changeurl" style="display: block;width: 100%;height: 100%;" href="#" data-date="<?php the_time('d-m-Y g:i:s A '); ?>" data-author="<?php $author = get_the_author(); echo $author; ?>" data-content="<?php the_content(); ?>" data-title="<?php the_title(); ?>" data-id="https://www.youtube-nocookie.com/embed/<?php the_field('url_youtube');?>?rel=0&amp;showinfo=0" frameborder="0">
					      		<?php $id=get_field('url_youtube'); ?>
								<?php the_post_thumbnail('thumbnail'); ?>
								
					     	</a>
					     	<h5 class="videos-details">
								<a class="changeurl"  href="#" data-date="<?php the_time('d-m-Y g:i:s A '); ?>" data-author="<?php $author = get_the_author(); echo $author; ?>" data-content="<?php the_content(); ?>" data-title="<?php the_title(); ?>" data-id="https://www.youtube-nocookie.com/embed/<?php the_field('url_youtube');?>?rel=0&amp;showinfo=0" frameborder="0">
									<?php the_title(); ?>
								</a>
					     	</h5>
					     	
					     	
				  		</div>
				    </div>
					<?php endwhile;  ?>
				</div>
			</div>

			<div class="carousel carousel-video slide" id="myCarousel-17">
				<div class="navation_title">
					<a class="left carousel-control" href="#myCarousel-17" data-slide="prev">
						<span class="icon-prev"></span>
					</a>
					<a class="right carousel-control" href="#myCarousel-17" data-slide="next">
						<span class="icon-next"></span>
					</a>
					<h3 class="title-video">Video</h3>
				</div>
				<div class="carousel-inner">
				<?php 	$the_query = new WP_Query( mypost(17) );
						$count=0;
						while ( $the_query->have_posts() ) : $the_query->the_post();
						$count++;
						
						if($count == 1){
							$active = 'active';
						}else{
							$active='';
						}
				?>
				    <div class="item <?php echo $active ; ?>">
				      	<div class="col-md-4 col-sm-4 col-xs-4">
					      	<a class="changeurl" style="display: block;width: 100%;height: 100%;" href="#" data-date="<?php the_time('d-m-Y g:i:s A '); ?>" data-author="<?php $author = get_the_author(); echo $author; ?>" data-content="<?php the_content(); ?>" data-title="<?php the_title(); ?>" data-id="https://www.youtube-nocookie.com/embed/<?php the_field('url_youtube');?>?rel=0&amp;showinfo=0" frameborder="0">
					      		<?php $id=get_field('url_youtube'); ?>
								<?php the_post_thumbnail('thumbnail'); ?>
									
					     	</a>
					     	<h5 class="videos-details">
								<a class="changeurl"  href="#" data-date="<?php the_time('d-m-Y g:i:s A '); ?>" data-author="<?php $author = get_the_author(); echo $author; ?>" data-content="<?php the_content(); ?>" data-title="<?php the_title(); ?>" data-id="https://www.youtube-nocookie.com/embed/<?php the_field('url_youtube');?>?rel=0&amp;showinfo=0" frameborder="0">
									<?php the_title(); ?>
								</a>
					     	</h5>
					     	
					     	
				  		</div>
				    </div>
					<?php endwhile;  ?>
				</div>
			</div>
			
   		</div>
	
		
	</div><!--End main-->
<?php get_footer(); ?>