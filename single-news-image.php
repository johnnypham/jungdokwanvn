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

			
			<div id="news_slider" class="carousel slide" data-ride="carousel">

				<div class="carousel-inner">
						<?php 
						$count = 0;
							for($i=1;$i<=11;$i++){

							$images='image-'.$i;
							if($image = get_post_meta($post->ID, $images, true)){
								$count ++;
								if($i == 1){
						?>
									<div class="item active">
										<img class="img-responsive" src="<?php the_field($images) ;?>" alt="Image">
									</div>

						<?php }else{ ?>
						<div class="item">
							<img class="img-responsive" src="<?php the_field($images) ;?>" alt="Image">
						</div>
						<?php	}}
						else{
						// echo 'No Images Slider';
						}
						 }?>
					
				</div>
				<ol class="carousel-indicators">
					<?php 
						for($i=0;$i<=$count;$i++){
							if($i == 1){
								echo '<li data-target="#news_slider" data-slide-to="0" class="active"></li>';
							}
							else{
								echo '<li data-target="#news_slider" data-slide-to="1" class=""></li>';
							}
						}
					?>
				</ol>

			</div>
		</div>
		<div class="text">
			<?php the_content(); ?>
		</div>
	</article>
	<div style="position: relative;" class="tools clearfix">
	<div class="tools clearfix">
		<?php echo do_shortcode('[ssba]'); ?>
	</div>
				<ul id='slider-single' class="controls">
					<li class="prev"><a class="left carousel-control" href="#news_slider" role="button" data-slide="prev">
						<span class="icon-prev"></span>
					</a></li>
					<li class="next active"><a class="right carousel-control" href="#news_slider" role="button" data-slide="next">
						<span class="icon-next"></span>
					</a></li>
				</ul>
	</div>
	<?php comments_template(); ?>
</div>
<?php endwhile; endif; ?>