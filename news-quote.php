<article>
	<div class="news_quote">
		<h5><?php  the_title(); ?></h5>
		<span class="bg_icon"><span class="icon-quote-right"></span></span>
		<p><?php the_excerpt(); ?></p>
		<a class="read_more" href="<?php the_permalink(); ?>">Read More</a>
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