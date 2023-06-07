<?php /* Template Name: Privacy policy page template */ ?>
<?php get_header(); ?>
<main>
	<div class="hero">
		<h1 class="header__sitename"><?= get_bloginfo('name'); ?></h1>
		<p class="header__tagline"><?= get_bloginfo('description'); ?></p>
	</div>
	<section class="description">
		<h2><?= get_field('description_title')?></h2>
		<?php foreach(get_field('qualities') as $quality ): ?>
		<p> <?= $quality['name'] ?> </p>
		<?php endforeach; ?>
	</section>
</main>
<?php get_footer(); ?>
