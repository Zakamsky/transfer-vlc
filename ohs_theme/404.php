<?php get_header(); ?>
	<div class="row">
		<div class="main-heading my-5">
			<h1><?php the_title(); ?></h1>
		</div>
	   <?php //get_sidebar(); ?>

		<section class="col">
			<div class="m-5">
				<p class="h5"><?php echo __( 'Кажется, ничего не найдено. Возможно запрашиваемая вами страница не существует, или была перемещена. Проверьте адрес ссылки, или воспользуйтесь поиском по сайту.', 'ohs' ); ?></p>
			</div>
		</section>
	</div>
<?php get_footer(); ?>