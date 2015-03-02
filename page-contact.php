<?php
/**
 * Template Name: Contact Page
 *
 * Description: Johnny Dev
 * 
 *
 * Tip: Everthing Dev.
 *
 * @package WordPress
 * @subpackage Johnny_Themes
 * @since Johnny Themes 1.0
 */?>
<?php get_header(); ?>
	<div id="post-<?php the_ID(); ?>" class="main container contact_page">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
			<?php endwhile; endif; ?>
	</div><!--End main-->
<?php get_footer(); ?>