
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<!-- <base href="/"> -->
	<title><?php the_title(); ?></title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Template Basic Images Start -->
	<meta property="og:image" content="path/to/image.jpg">

	<link rel="icon" href="<?php echo F_IMG_DIR; ?>/favicon/favicon.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo F_IMG_DIR; ?>/favicon/apple-touch-icon-180x180.png">
	<!-- Template Basic Images End -->

	<!-- Custom Browsers Color Start -->
	<!--<meta name="theme-color" content="green">-->
	<!-- Custom Browsers Color End -->


	<!--[if lte IE 10]>
	<meta http-equiv="refresh" content="3; url=http://outdatedbrowser.com/ru">
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body>
<div class="wrapper">
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		<div class="container">
			<a class="navbar-brand" href="#">Navbar</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Link</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Dropdown
						</a>
						<div class="dropdown-menu bg-primary" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="#">Action</a>
							<a class="dropdown-item" href="#">Another action</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Something else here</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Other link</a>
					</li>
				</ul>

			</div>
		</div>
	</nav>


	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1 class="display-1 text-primary">Fix-it!</h1>
			</div>
		</div>

		<div id="carouselExampleIndicators" class="carousel slide my-5" data-ride="carousel">
			<ol class="carousel-indicators">
				<?php $i=0; foreach(get_sliders() as $slider): ?>
					<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; $i++ ?>" class="<?php echo $slider['class']?>"></li>
<!--				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
<!--				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
				<?php endforeach ?>
			</ol>
			<div class="carousel-inner">
				<?php foreach(get_sliders() as $slider): ?>
					<div class="carousel-item <?php echo $slider['class']?>">
						<img class="d-block w-100" src="<?php echo $slider['img'] ?>" alt="First slide">
						<div class="carousel-caption text-light rounded d-none d-md-block">
							<h3><?php echo $slider['title']?></h3>
							<p>
								<?php echo $slider['text']?>
							</p>
							<a href="<?php echo $slider['url']?>" class="btn btn-primary">FIX - IT!</a>
						</div>
					</div>
			 <?php endforeach ?>

			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>


	</div>
	<section id="main_page" class="bg-light">
		<div class="container">
			<div class="row py-5">
			 <?php while ( have_posts() ) : the_post(); $home = get_post(); /*print_R( $home);*/ ?>
				<div class="col-md-5">
					<img src="<?php echo get_the_post_thumbnail_url( $home->ID  ); ?>" alt="" class="img-fluid">
				</div>
				<div class="col-md-7">


					<h3><?php echo $home->post_title; ?></h3>

					<?php echo $home->post_content; ?>

				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="container">
		<div class="card-deck my-5">
			<?php foreach( get_posts() as $card ): ?>
				<div class="card" >
					<img class="card-img-top" src="<?php echo get_the_post_thumbnail_url( $card->ID ); ?>" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title"><?php echo $card->post_title; ?></h5>
						<p class="card-text"><?php echo $card->post_content; ?></p>
					</div>
					<div class="card-footer bg-transparent">
						<a href="<?php $url=get_post_custom_values(url, $card->ID); echo $url[0]; ?>" class="btn btn-primary">Вызвать курьера</a>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</section>
	<section>
		<div class="container">
			<div class="row justify-content-center py-5">
				<div class="col-12 text-center">
					<h2>Отзывы</h2>
				</div>

				<ul class="nav nav-pills nav-fill nav-justified w-100 m-3" id="pills-tab" role="tablist">
					<?php $j=0; foreach( get_faq() as $post ):
//						print_r($post);
					 ?>
					<li class="nav-item">
						<a class="nav-link <?php if($j == 0) echo 'active'; $j++ ?>" id="pills-<?php echo $post->ID; ?>-tab" data-toggle="pill" href="#pills-<?php echo $post->ID; ?>" role="tab" aria-controls="pills-<?php echo $post->ID; ?>" aria-selected="true">
							<img src="<?php echo get_the_post_thumbnail_url( $post->ID ); ?>" alt="" width="80" class="img-fluid img-thumbnail rounded-circle border border-primary">
							<br> <span class=""><?php echo $post->post_title; ?></span>
						</a>
					</li>

					<?php
				   $i++;
						endforeach;
					?>
					<!--TODO Первая ссылка в цикле должна иметь дополнительный класс "active" что бы быть активной-->
				</ul>

				<div class="tab-content" id="pills-tabContent">
					<?php $ij=0; foreach( get_faq() as $post ): ?>
						<div class="tab-pane fade p-3 <?php if($ij == 0) echo 'show active'; $ij++ ?>" id="pills-<?php echo $post->ID; ?>" role="tabpanel" aria-labelledby="pills-<?php echo $post->ID; ?>-tab">
							<h3><?php echo $post->post_excerpt; ?></h3>
							<p>
						 <?php echo $post->post_content; ?>
							</p>
						</div>
			   	<?php endforeach; ?>
					<!--TODO Первsq блок в цикле должty иметь дополнительно классы "show active" что бы быть активной-->
				</div>
			</div>
		</div>
	</section>
	<section id="form" class="p-5 text-center">
		<h2 class="mb-5">Для вызова курьера оставьте свой телефон и мы вам перезвоним!</h2>
		<div class="form-inline w-50 mx-auto d-flex justify-content-center">
			<?php echo do_shortcode('[contact-form-7 id="29" title="Контактная форма"]'); ?>
		</div>
	</section>
	<!--подключаем футер:-->
</div> <!--wrapper end-->
<!--<script src="js/scripts.min.js"></script>-->
<?php wp_footer(); ?>
</body>
</html>