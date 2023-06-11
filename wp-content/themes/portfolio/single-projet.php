<?php get_header(); ?>
<?php if(have_posts()): while(have_posts()): the_post(); ?>
	<main class="project">
		<h1 class="project__title"><?= get_the_title(); ?></h1>
		<p> <?= get_field('project_description') ?> </p>
		<a href="<?= get_field('project_link') ?>"> Visiter le projet </a>
		<figure class="project__fig">
			<?= get_the_post_thumbnail(null, 'project_medium', ['class' => 'project__img']); ?>
		</figure>
	</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
