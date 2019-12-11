<!doctype html>
<html lang="ru">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php wp_title('«', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link rel="icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/img/favicon/favicon.ico">
	<link rel="apple-touch-icon" sizes="180x180" href="/<?php echo esc_url( get_template_directory_uri() ); ?>img/favicon/apple-touch-icon-180x180.png">
	<?php wp_head(); ?>

</head>

<body <?php body_class('bg-x-custom'); ?>>

<!--<Header>-->

<!--search&login-->
<div class="navbar navbar-expand navbar-light bg-custom">
	<!--<a class="navbar-brand" href="#">Navbar</a>-->
	<ul class="navbar-nav mr-auto mt -2 mt-lg-0">
		<!--<li class="nav-item active">
			<a class="nav-link" href="#">Вход <span class="sr-only">(current)</span></a>
		</li>
		<li class="nav-item">
			<a class="nav-link d-none d-sm-block" href="#">Регистрация</a>
		</li>-->
	</ul>
	<?php get_search_form(); ?>

</div>

<!--header-logo-->
<div class="container-fluid header bg-light">
	<div class="row header-row ">
		<div class="d-none d-lg-block col-lg-4 text-right my-auto">
			<p class="text-muted h2 my-auto">cum tu affectavisti imperium super vita et morte, meminito quod tu es homo tantum.</p>
		</div>
		<div class="col-sm-4 col-lg-3 col-xl-3">
			<div class="m-auto text-center">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.svg" alt="logo" class="logo img-fluid m-auto">
			</div>
		</div>
		<div class="col-sm-8 col-lg-5 my-auto">
			<h1 class="display-4 mx-auto my-auto text-center">орден хранителей смерти</h1>
		</div>
	</div>
</div>
<!--main menu-->

<!--<nav class="sticky-top navbar navbar-expand-lg navbar-light bg-custom">-->
<nav class="sticky-nav navbar navbar-expand-lg navbar-light bg-custom">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<a class="navbar-brand d-lg-none" href="/">
		<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.svg" width="30" height="30" class="d-inline-block align-top" alt="">OXC
	</a>
	<div class="collapse navbar-collapse" id="navbarTogglerDemo03">

		<?php
			wp_nav_menu( array(
				'menu'            => 'top-menu',
				'theme_location'  => 'top-menu',
				'depth'           => 2,
				'container'       => false,
				'menu_class'      => 'navbar-nav mr-auto',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker()
			) );
			?>

	</div>
</nav>
<!--</Header>-->

<main class="">
	<div class="container">



