<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package William_Boles
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-starter' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<?php // The primary site navigation
		wp_starter_site_navigation(); ?>
	</header><!-- #masthead -->

	<?php // A jumbotron (hero image) can be displayed on a static front page, set with the customizer
	if ( is_front_page() && ! is_home() ) :
		wp_starter_frontpage_jumbotron();
	endif; ?>

	<div id="content" class="site-content container">
