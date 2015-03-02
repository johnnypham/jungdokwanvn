<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,initial-scale=1">
<title><?php wp_title( ' | ', true, 'right' ); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/css/icons/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('template_directory'); ?>/css/main.css" />
<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/jquery.fancybox.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo bloginfo('template_directory'); ?>/css/mediaelementplayer.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="header" class="index_page">

		<div class="banner">
			<figure id="home"><img src="<?php echo bloginfo('template_directory'); ?>/img/banner_index.png" alt="Jung Do Kwan" /></figure>
			<figure id="different_home"><img src="<?php echo bloginfo('template_directory'); ?>/img/advbottom_s438.png" alt="Jung Do Kwan" /></figure>
			<div id="caption-home" class="container">
				<div class="banner_caption container">
					<a href="#" class="navbar-brand"><img src="<?php echo bloginfo('template_directory'); ?>/img/logo_index.png" alt="Jung Do"/></a>
					<div style="display:none" class="button"><a href="#" class="btn btn-success">BECOME A MEMEBER</a></div>
				</div>
			</div>	
		</div><!--End banner-->
		<div class="navigation">
			<div class="nav_inner">
				<div class="container">
					<!-- Menu responsive -->
					<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'items_wrap' => '<ul class="nav navbar-nav menu navbar-collapse collapse">%3$s</ul>' ) ); ?>
					<?php get_search_form() ?>
				</div>
			</div>
		</div>
	</header>