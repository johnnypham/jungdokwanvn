<div class="clear"></div>
</div>



<footer id="footer">
		<div class="container footer_top">
			<div class="row">
				

				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				
					<?php dynamic_sidebar( 'footer-1' ); ?>
				
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				
					<?php dynamic_sidebar( 'footer-2' ); ?>
				
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				
					<?php dynamic_sidebar( 'footer-3' ); ?>
				
				<?php endif; ?>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>
								
					<?php dynamic_sidebar( 'footer-bottom' ); ?>
				
				<?php endif; ?>
			</div>
		</div>
	</footer><!--End footer-->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">.</h4>
      </div>
      <div class="modal-body">
       		<?php query_poon();?>
      </div>

    </div>
  </div>
</div>
</div>
<?php wp_footer();?>
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-1.10.1.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/mediaelement-and-player.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.masonry.3.2.1.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/imagesloaded.3.1.8.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/base.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/main.js"></script>
<script>
		jQuery(document).ready(function() {
			jQuery('audio,video').mediaelementplayer({
				features: ['playpause','volume','progress','current','duration','fullscreen','tracks']
				});
			jQuery('.carousel').carousel({
		 		 interval: 2000
			})
			jQuery(".video").click(function() {
					jQuery.fancybox({
						'padding'		: 0,
						'autoScale'		: false,
						'transitionIn'	: 'none',
						'transitionOut'	: 'none',
						'title'			: this.title,
						'width'			: 720,
						'height'		: 480,
						'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
						'type'			: 'swf',
						'swf'			: {
						'wmode'				: 'transparent',
						'allowfullscreen'	: 'true'
						}
					});

					return false;
				});
			jQuery(".fancybox").fancybox({
				openEffect	: 'elastic',
				closeEffect	: 'elastic',
				nextEffect 	: 'fade',
				prevEffect	: 'fade',

				});
			});

		jQuery( window ).load( function()
		{
		    var columns    = 3,
		        setColumns = function() { columns = jQuery( window ).width() > 640 ? 3 : $( window ).width() > 320 ? 2 : 1; };
		 
		    setColumns();
		    jQuery( window ).resize( setColumns );
		 
		    jQuery( '#list' ).masonry(
		    {
		        itemSelector: '.mini-item',
		        columnWidth:  function( containerWidth ) { return containerWidth / columns; }
		    });
		});
	</script>
</body>
<div style="display:block">
		<?php //query_poon();?>
</div>
</html>