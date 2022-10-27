<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package UNDERSCORES
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<header id="masthead" class="site__header">
			<div class="site-branding">

				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>

				<?php
				$underscores_description = get_bloginfo('description', 'display');
				if ($underscores_description || is_customize_preview()) :
				?>

					<p class="site-description"><?php echo $underscores_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
												?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<?php wp_nav_menu(array(
				"menu" => "principal",
				"container" => "nav",
				"container_class" => "menu__principal"
			));

			?>
		</header><!-- #masthead -->
		<aside class="widget__area-1">
			<h2>Menu secondaire</h2>

			<?php wp_nav_menu(array(
				"menu" => "aside",
				"container" => "nav",
				"container_class" => "menu__aside"
			));

			?>

		</aside>

		<aside class="widget__area-2">
			<div><?php get_sidebar('aside-1'); ?></div>
			<div><?php get_sidebar('aside-2'); ?></div>
		</aside>