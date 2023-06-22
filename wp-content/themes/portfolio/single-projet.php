<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()):
	the_post(); ?>
	<main class="single-project">
		<section class="single-project__container">
			<h1 class="single-project__title"><?= get_the_title(); ?></h1>
			<section class="single-project__description">
				<h2 class="sr-only">Description du projet </h2>
				<p>  <?= get_field('project_description') ?> </p>
			</section>
			<section class="single-project__link">
				<h2 class="sr-only">Lien du projet</h2>
				<a  href="<?= get_field('project_link') ?>"> Visiter le projet  </a>
			</section>
		</section>



		<section class="single-project__container">
			<h2 class="sr-only">Galerie image du projet </h2>

			<?php if (get_field('galeria') !== null): ?>

				<?php foreach (get_field('galeria') as $image): ?>

					<input type="checkbox" id="<?= $image['filename'] ?>" class="img__checkbox sr-only">

					<label for="<?= $image['filename'] ?>" class="img__label">
						<?= image($image['url'], 'single-project__img', 'image du projet ' . get_the_title()) ?>
					</label>


					<div class="img__popup">
						<label for="<?= $image['filename'] ?>" class="img__checkbox">

							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="popup__close">
								<line x1="18" x2="6" y1="6" y2="18"/>
								<line x1="6" x2="18" y1="6" y2="18"/>
							</svg>

							<?= image($image['url'], 'single-project__img--large', 'image du projet ' . get_the_title()) ?>
						</label>
					</div>
				<?php endforeach; ?>
			<?php else: ?>
			<p> Ce projet contient aucune image </p>
			<?php endif; ?>
		</section>

	</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
