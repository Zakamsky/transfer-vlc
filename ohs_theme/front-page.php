
<?php get_header(); ?>
<div class="row">
	<div class="col-12">
		<div class="main-heading my-5">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>


	<?php if (!!get_sliders()):?>
		<section class="slider col-12">
		<div id="carouselExampleIndicators" class="carousel slide my-5" data-ride="carousel">
			<ol class="carousel-indicators">

			 <?php $i=0; foreach(get_sliders() as $slider): ?>
					 <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active'; $i++ ?>"></li>
					 <!--				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
					 <!--				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
			 <?php endforeach ?>
			</ol>
			<div class="carousel-inner">
			 <?php $j=0; foreach(get_sliders() as $slider): ?>
					 <div class="carousel-item <?php if($j == 0) echo 'active'; $j++ ?>">
						 <img class="d-block img-fluid w-100" src="<?php echo get_the_post_thumbnail_url( $slider->ID ) ?>" alt="Slide #<?php echo $j; ?>">
						 <div class="carousel-caption text-light rounded d-none d-md-block">
							 <h3><?php echo $slider->post_title ?></h3>
							 <p>
						  <?php echo $slider->post_content ?>
							 </p>
							 <a href="<?php echo $slider->post_excerpt ?>" class="btn btn-outline-light">Перейти</a>
<!--							 <a href="--><?php //$url=get_post_custom_values(url, $card->ID); echo $url[0]; ?><!--" class="btn btn-outline-light">Перейти</a>-->
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
	</section>
	<?php endif; ?>

	<?php foreach( get_posts(array( 'numberposts' => 4)) as $news ): ?>
		<div class="col-md-6 pb-3">
			<div class="card bg-custom text-white text-center border-0 mb-3">
				<!--<img src="<?php
			/*					if (!get_the_post_thumbnail_url( $news->ID )) echo OHS_IMG_DIR.'/moon.png';
							 echo get_the_post_thumbnail_url( $news->ID ); */?>" alt="card-image" class="card-image img-fluid">-->
				<div class="img card-image w-100 h-100" style=" background-image: url(
			<?php if (!get_the_post_thumbnail_url( $news->ID )) echo OHS_IMG_DIR.'/card.png'; echo get_the_post_thumbnail_url( $news->ID ); ?>); background-size: cover; background-position: center;"></div>
				<div class="card-img-overlay rounded">
					<div class="card-body">
						<!--					<h4 class="card-title">Специальный заголовок</h4>-->
						<h3 class="card-title text-white"><a class="text-light" href="<?php the_permalink($news) ?>"><?php echo $news->post_title; ?></a></h3>

						<p class="card-text"><?php echo wp_trim_words( $news->post_content, 20, '...' ); ?></p>
						<a href="<?php the_permalink($news) ?>" class="btn btn-outline-light">Читать полностью</a>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>




	<?php get_footer(); ?>
