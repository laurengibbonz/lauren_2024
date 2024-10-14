<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Theme
 * @since 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<?php include('analytics.php'); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
	<?php wp_head(); ?>

	<meta property="og:type" content="website" />       
	<meta property="og:url" content="<?php echo get_site_url(); ?>" />
	<meta property="og:title" content="<?php echo bloginfo('title'); ?>" />
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
	<link rel="shortcut icon" href="#">
</head>

<body <?php body_class(); ?>>

<header id="header" class="site-header wrapper" role="banner">
	<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
		<div class="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">{L}</a>
		</div>
<!-- 		<?php wp_nav_menu( array('menu' => 'Navigation' )); ?> -->
		<button class="nav-trigger">
			<div class="nav-trigger-line"></div>
			<div class="nav-trigger-line"></div>
		</button>
	</nav>
</header>

<?php function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
} ?>

<div id="main" class="wrapper scenes">