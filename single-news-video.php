<h3 class="title"><span>TIN TỨC &amp; SỰ KIỆN &gt; Tin tức hoạt động</span></h3>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="content_news_active">
		<article class="article">
			<div class="news_slider default">
				<h5><?php the_title(); ?></h5>

				<ul class="list_icon clearfix"> 
					<li>
						<span class="icon-clock"></span><span><?php the_time('d-m-Y g:i:s A ') ?></span>
					</li>
					<li>
						<span class="icon-user"></span><span><?php $author = get_the_author(); echo $author; ?></span>
					</li>

				</ul>
					<?php 	$post_id = get_the_ID();
						$meta_values = get_post_meta(  $post_id, 'link-video', true );
				        $video = wp_get_attachment($meta_values); ?>
				<video width="100%" height="420" id="player2" controls="controls">
					<source src="<?php echo $video['src'] ;?>" type="video/mp4">
					<source src="<?php echo bloginfo('template_directory'); ?>/media/echo-hereweare.webm" type="video/webm">	
					<track kind="subtitles" src="<?php echo bloginfo('template_directory'); ?>/media/mediaelement.srt" srclang="en" /> 
					<p>Your browser leaves much to be desired.</p>			
				</video>
			<div class="text">
				<?php the_content(); ?>
			</div>

			</div>
		</article>
	<div class="tools clearfix">
		<?php echo do_shortcode('[ssba]'); ?>
	</div>
	<?php comments_template(); ?>
</div>
<?php endwhile; endif; ?>