<div class="main container album_detail">
	<div class="album">
		<h3 class="title"><span>ALBUM DETAILS </span></h3>
	</div>
	<div class="masonry-gutter">
		<div id="content">
		<div class="box-gutter"></div>
		<div class="box-sizer"></div>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();

			// $content = get_the_content();
			// $content=split("\,", $content);
			// foreach ($content as $key => $value) {
			// 	$gallery = wp_get_attachment( $value );
			// 	echo ('<div class="box">');
			// 	echo ('<a class="fancybox" rel="gallery1" href="'.$gallery['src'].'" title="'.$gallery['caption'].'">');
			// 	echo('<img src="'.$gallery['src'].'" alt="'.$gallery['alt'].'" /></a></div>');
			// }; 
		$the_url = the_field('url_youtube');
			//echo ('<div class="box">');
			//echo ('<a class="fancybox" rel="gallery1" href="'.$gallery['src'].'" title="'.$gallery['caption'].'">');
			//echo('<img src="'.$gallery['src'].'" alt="'.$gallery['alt'].'" /></a></div>');
			echo '<a class="video" data-type="iframe" href="http://www.youtube.com/embed/WAZ5SmJd1To?autoplay=1" title="youtube">open youtube (embed mode)</a><br />
'
			 endwhile; endif; ?>
		</div><!--End gallery-->
		<div class=""><a href="#" class="btn btn_more">More</a></div>
	</div><!--End album-->
</div><!--end main-->
