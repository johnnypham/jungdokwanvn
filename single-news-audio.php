<h3 class="title"><span>TIN TỨC &amp; SỰ KIỆN &gt; Tin tức hoạt động</span></h3>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="content_news_active">
	<article class="article">
		<div class="news_slider">
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
			    </div><!--Playlist-->
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