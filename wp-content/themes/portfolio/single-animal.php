<?php get_header() ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
<main class="animal">
	<h1 class="animal__title"> <?= get_the_title() ?> </h1>
	<dl class="animal__details">
		<dt class="animal__attribut">
			<?= get_field('species') ?>
		</dt>
		<dl class="animal__attribut">`
			<?= get_field('species') ?>
		</dl>
	</dl>

</main>
<?php endwhile; endif; ?>
<?php get_footer() ?>
