<article>
	<div class="news_video">
		<h5><?php  the_title(); ?></h5>
		<?php 	$post_id = get_the_ID();
						$meta_values = get_post_meta(  $post_id, 'link-video', true );
				        $video = wp_get_attachment($meta_values); ?>
		<span class="bg_icon"><span class="icon-film"></span></span>
		<video width="100%" height="260" id="player2" controls="controls">
			<source src="<?php echo $video['src'] ;?>" type="video/mp4">
			<source src="<?php echo bloginfo('template_directory'); ?>/media/echo-hereweare.webm" type="video/webm">	
			<track kind="subtitles" src="<?php echo bloginfo('template_directory'); ?>/media/mediaelement.srt" srclang="en" /> 
			<p>Your browser leaves much to be desired.</p>			
		</video>
		<p><?php the_excerpt(); ?></p>
		<a class="read_more" href="<?php the_permalink(); ?>">Read More</a>
		<ul class="list_icon clearfix"> 
			<li>
				<span class="icon-clock"></span><br />
				<span><?php the_time(' jS, Y') ?></span>
			</li>
			<li>
				<span class="icon-user"></span><br />
				<span><?php echo get_the_author();?></span>
			</li>

		</ul>
	</div>
</article>