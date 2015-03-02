<article>
	<div class="news_audio">
	<h5><?php the_title(); ?></h5>
	<span class="bg_icon"><span class="icon-volume-up"></span></span>

	<?php 	$post_id = get_the_ID();
			$meta_values = get_post_meta(  $post_id, 'link-audio', true );
	        $audio = wp_get_attachment($meta_values); ?>
	<div class="bg_playlist">
		<div class="player">
            <div class="controls">
            	<div class="rew"></div>
                <div class="play"></div>
                <div class="pause"></div>
                <div class="fwd"></div>
            </div>
            <div class="current-time">00:00</div>
            <div class="volume"><span class="icon-volume"></span></div>
            <div class="duration-time">20:30</div>
            <div class="tracker"></div>
        </div>
        <ul class="playlist hidden">
            <li audiourl="<?php echo $audio['src'] ;?>" cover="cover1.jpg" artist="<?php echo $audio['description']; ?>"><?php echo $audio['title']; ?></li>
        </ul>
        <p><?php the_excerpt(); ?></p>
		<a class="read_more" href="<?php the_permalink(); ?>">Read More</a>
    </div><!--Playlist-->
	<ul class="list_icon clearfix"> 
		<li>
			<span class="icon-clock"></span><br />
			<span><?php the_time('d-m-Y g:i:s A ') ?></span>
		</li>
		<li>
			<span class="icon-user"></span><br />
			<span><?php echo get_the_author();?></span>
		</li>

	</ul>

</div>
</article>