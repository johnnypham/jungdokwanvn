<article>
	<div class="news_slider">
		<h5><?php the_title(); ?></h5>
		<span class="bg_icon"><span class="icon-photo"></span></span>
		<!-- http://www.sanwebe.com/2013/03/loading-more-results-from-database -->
		<div id="news_slider" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
					<?php 
						$count = 0;
						for($i=1;$i<=11;$i++){

						$images='image-'.$i;
						if($image = get_post_meta($post->ID, $images, true)){
							$count ++;
							if($i == 2){
					?>
								<div class="item active">
									<img class="img-responsive" src="<?php the_field($images) ;?>" alt="Image">
								</div>

					<?php }else{ ?>
					<div class="item">
						<img  class="img-responsive"src="<?php the_field($images) ;?>" alt="Image">
					</div>
					<?php	}}
					else{
					// echo 'No Images Slider';
					}
					 }?>
				
			</div>
				<ol class="carousel-indicators">
					<?php 
						for($i=0;$i<$count;$i++){
							if($i == 1){
								echo '<li data-target="#news_slider" data-slide-to="'.$i.'" class="active"></li>';
							}
							else{
								echo '<li data-target="#news_slider" data-slide-to="'.$i.'" class=""></li>';
							}
						}
					?>
				</ol>
			<a class="left carousel-control" href="#news_slider" role="button" data-slide="prev">
				<span class="icon-prev"></span>
			</a>
			<a class="right carousel-control" href="#news_slider" role="button" data-slide="next">
				<span class="icon-next"></span>
			</a>
		</div>
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