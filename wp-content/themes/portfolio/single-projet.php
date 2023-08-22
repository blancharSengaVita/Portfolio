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
				<nav>
					<ul>
						<li>
							<?php if (get_field('project_link')): ?>
							<a target="_blank" href="<?= get_field('project_link') ?>"> Visiter le projet </a>
							<?php endif; ?>
						</li>
						<li>
							<a target="_blank" href="<?= get_field('project_github') ?>"> Voir le projet sur github </a>
						</li>
						<li>
							<?php if (get_field('Design')): ?>
								<a target="_blank" href="<?= get_field('Design') ?>"> Visiter le design du projet </a>
							<?php endif; ?>
						</li>
					</ul>
				</nav>


			</section>
		</section>


		<section class="single-project__container">
			<h2 class="sr-only">Galerie image du projet </h2>

			<?php if (get_field('galeria') !== null): ?>

				<?php foreach (get_field('galeria') as $image): ?>

					<input type="checkbox" id="<?= $image['filename'] ?>" class="img__checkbox sr-only">

					<?php
					$image_url = $image['url'];
					$image_id = attachment_url_to_postid($image_url);
					$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
					$image_srcset = wp_get_attachment_image_srcset($image_id);
					?>


					<label for="<?= $image['filename'] ?>" class="img__label">
						<img class="single-project__img" src="<?= $image_url ?>" alt="<?= 'image du projet' . get_the_title() ?>" srcset="<?= $image_srcset ?>" sizes="(max-width: 1000px) 50vw,
                (min-width: 1001px) 50vw, 50vw">
					</label>


					<div class="img__popup">
						<label for="<?= $image['filename'] ?>" class="img__checkbox">
							<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="popup__close">
								<line x1="18" x2="6" y1="6" y2="18"/>
								<line x1="6" x2="18" y1="6" y2="18"/>
							</svg>
							<img class="single-project__img--large" src="<?= $image_url ?>" alt="<?= 'image du projet' . get_the_title() ?>" srcset="<?= $image_srcset ?>" sizes="(max-width: 1000px) 75vw, (min-width: 1001px) 85vw">
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
