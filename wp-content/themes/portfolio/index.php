<?php get_header(); ?>
<main>
	<div class="hero">
		<h2 class="hero__title"><?= get_the_title(); ?></h2>
	</div>
	<div class="page__content">
		<?php the_content(); ?>
	</div>
</main>
<?php get_footer(); ?>
