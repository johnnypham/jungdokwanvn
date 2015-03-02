<h3 class="title"><span>TIN TỨC &amp; SỰ KIỆN &gt; Tin tức hoạt động</span></h3>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<div class="content_news_active">
		<article class="article">
			<div class="news_slider default">
			<h5><?php the_title(); ?> - <?php the_field('times_event');?></h5>

			<ul class="list_icon clearfix"> 
				<li>
					<span class="icon-clock"></span><span><?php the_time('d-m-Y g:i:s A ') ?>></span>
				</li>
				<li>
					<span class="icon-user"></span><span><?php $author = get_the_author(); echo $author; ?></span>
				</li>
				
			</ul>
			<div class="news_post">
				<?php the_post_thumbnail('full',array('class'=>'img-responsive')); ?>
			</div>	
				

			</div>

		<div class="text">
			<?php the_content(); ?>
		</div>
		</article>
	<div class="tools clearfix">
		<?php echo do_shortcode('[ssba]'); ?>
	</div>
	<?php comments_template(); ?>
</div>
<?php endwhile; endif; ?>