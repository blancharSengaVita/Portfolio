<?php /* Template Name: Landing page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()):
the_post(); ?>
<main>
	<div class="hero">
		<h1 class="header__sitename"><?= get_bloginfo('name'); ?></h1>
		<p class="header__tagline"><?= get_bloginfo('description'); ?></p>
	</div>
	<section class="description">
		<h2><?= get_field('description_title') ?></h2>
		<?php foreach (get_field('qualities') as $quality): ?>
			<p> <?= $quality['name'] ?> </p>
		<?php endforeach; ?>

		<?php foreach (get_field('description') as $description): ?>
			<p> <?= $description['paragraphe'] ?> </p>
		<?php endforeach; ?>

		<?php foreach(get_field('legends_picture') as $legend): ?>
			<p> <?= $legend['text']; ?> </p>
		<?php endforeach; ?>
	</section>

	<div class="project_container">
		<?php

		// Faire une requête en DB pour récupérer 3 projets
		$projects = new WP_Query([
				'post_type' => 'projet',
				'posts_per_page' => 3
		]);

		// Lancer la boucle pour afficher chaque projet
		if ($projects->have_posts()): while ($projects->have_posts()):
		$projects->the_post();
		?>
		<article>

				<a href="<?= get_the_permalink(); ?>" class="project__link">
					<span class=""><?= get_the_title(); ?></span>
				</a>
		</article>
	</div>

	<?php endwhile; else: ?>
	<p> j'ai aucun projet pour l'instant </p>
	<?php endif; ?>

</main>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>
