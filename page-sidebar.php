<?php
/**
 * Template Name: Sidebar + Page
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
<div class="main container">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<header class="header">
<h1 class="entry-title"><?php //the_title(); ?></h1> <?php edit_post_link(); ?>
</header>
<section class="entry-content">
<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>
</article>
<?php //if ( ! post_password_required() ) comments_template( '', true ); ?>
<?php endwhile; endif; ?>
</div><!--End show-->
	<div class="show">
		<div class="container">
			<div class="row">
				<?php if ( is_active_sidebar( 'gallery-video' ) ) : ?>
					<?php dynamic_sidebar( 'gallery-video' ); ?>
				<?php endif; ?>	
			</div><!--End row-->
		</div>
	</div><!--End show-->
<?php get_footer(); ?>