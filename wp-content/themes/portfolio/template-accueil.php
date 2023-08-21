<?php /* Template Name: Landing page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()):the_post(); ?>

	<main class="main-page">
		<div class="hero">
			<div class="hero__container">
				<p class="hero__title"><?= get_bloginfo('name'); ?></p>
				<p class="hero__tagline"><?= get_bloginfo('description'); ?></p>
			</div>
			<div class="hero__container">
				<?php
//				dd(get_field('pictures')['picture'][0]);
				$image_id = get_field('pictures')['picture'][0];
				$image_url = wp_get_attachment_url($image_id);
				$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
				$image_srcset = wp_get_attachment_image_srcset($image_id);
				?>

				<img class="hero__img wp-post-image" src="<?= $image_url ?>" alt="Logo de Blanchar Senga-Vita" srcset="<?= $image_srcset ?>" sizes="(max-width: 1000px) 300px,
                (min-width: 1001px) 500px">
			</div>
		</div>

		<section class="quality" id="quality">
			<h2 class="quality__title"><?= get_field('description_title') ?></h2>

			<section class="quality__card">
				<h3 class="card__title">  <?= get_field('qualities')['0']['name'] ?> </h3>

				<?php
				$image_id = get_field('pictures')['picture'][2];
				$image_url = wp_get_attachment_url($image_id);
				$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
				$image_srcset = wp_get_attachment_image_srcset($image_id);
				?>

				<img class="card__img" src="<?= $image_url ?>" alt="dessin de 3 éclaires" srcset="<?= $image_srcset ?>" sizes="(max-width: 1000px) 80px,
                (min-width: 1001px) 150px">
			</section>

			<section class="quality__card">
				<h3 class="card__title">  <?= get_field('qualities')['1']['name'] ?> </h3>
				<?php
				$image_id = get_field('pictures')['picture'][1];
				$image_url = wp_get_attachment_url($image_id);
				$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
				$image_srcset = wp_get_attachment_image_srcset($image_id);
				?>

				<img class="card__img" src="<?= $image_url ?>" alt="dessin d'un soleil" srcset="<?= $image_srcset ?>" sizes="(max-width: 1000px) 79px,
                (min-width: 1001px) 150px">
			</section>

			<section class="quality__card">
				<h3 class="card__title">  <?= get_field('qualities')['2']['name'] ?> </h3>
				<?php
				$image_id = get_field('pictures')['picture'][3];
				$image_url = wp_get_attachment_url($image_id);
				$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
				$image_srcset = wp_get_attachment_image_srcset($image_id);
				?>

				<img class="card__img" src="<?= $image_url ?>" alt="dessin d'une ampoule" srcset="<?= $image_srcset ?>" sizes="(max-width: 1000px) 80px,
                (min-width: 1001px) 150px">
			</section>

			<section class="description">
				<h2 class="sr-only"> Mais encore </h2>

				<?php
				$image_url = get_home_url() . '/wp-content/uploads/2023/06/2-bg-remove.png';
				$image_id = attachment_url_to_postid($image_url);
				$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
				$image_srcset = wp_get_attachment_image_srcset($image_id);
				?>


				<figure class="description__fig">
					<img class="description__img" src="<?= $image_url ?>" alt="photo de moi souriant" srcset="<?= $image_srcset ?>" sizes="(max-width: 1000px) 200px,
                (min-width: 1001px) 300px">
				</figure>

				<div class="description__container">
					<?php foreach (get_field('description') as $description): ?>
						<p class="description__paragraph"> <?= $description['paragraphe'] ?> </p>
					<?php endforeach; ?>
				</div>
			</section>


		</section>

		<section class="projects" id="project">
			<h2 class="projects__title"> <?= get_field('project_section_title') ?> </h2>
			<div class="projects__container">
				<?php
				$call_to_action_text = get_field('call_to_action');

				// Faire une requête en DB pour récupérer 3 projets
				$projects = new WP_Query([
						'post_type' => 'projet',
						'posts_per_page' => 9999
				]); ?>

				<?php // Lancer la boucle pour afficher chaque projet
				if ($projects->have_posts()): while ($projects->have_posts()):
					$projects->the_post();
					?>
					<article class="project__card">
						<h3 class="sr-only"><?= get_the_title(); ?></h3>
						<a href="<?= get_the_permalink(); ?>" class="project__link">
							<figure class="project__fig">
								<?= get_the_post_thumbnail(null, 'project_thumbnail', ['class' => 'project__thumbnail', ]); ?>
							</figure>
							<p class="project__title"><?= get_the_title(); ?></p>
						</a>
					</article>
				<?php endwhile; else: ?>
					<p>Je n'ai aucun projet pour l'instant.</p>
				<?php endif;
				wp_reset_query(); ?>
			</div>
		</section>
		<div class="call-to-action">
			<h2 class="sr-only"> Contatez-moi !</h2>
			<a href="<?= get_home_url() . "/contact/" ?>"> <?= get_field('call_to_action') ?> </a>

		</div>
	</main>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>
