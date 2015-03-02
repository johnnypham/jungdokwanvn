<?php
/**
 * Template Name: Search Page
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
<form class="search" action="<?php echo home_url( '/' ); ?>">
  <input type="search" name="s" placeholder="Search&hellip;">
  <input type="submit" value="Search">
  <input type="hidden" name="post_type" value="pan-dan">
</form>
		
<?php get_footer(); ?>