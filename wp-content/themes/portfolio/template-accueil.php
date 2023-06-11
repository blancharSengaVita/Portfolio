<?php /* Template Name: Landing page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main>
		<div class="hero">
			<h1 class="header__sitename"><?= get_bloginfo('name'); ?></h1>
			<p class="header__tagline"><?= get_bloginfo('description'); ?></p>
			<img src="https://portfolio.localhost/wp-content/uploads/2023/06/Logo.png" alt="">
		</div>
		<section class="description" id="description">
			<h2><?= get_field('description_title') ?></h2>
			
			<div>
				<p>  <?= get_field('qualities')['0']['name'] ?> </p>
				<img src="https://portfolio.localhost/wp-content/uploads/2023/06/Eclaires.png" alt="">
				<?php

				$image_url = 'https://portfolio.localhost/wp-content/uploads/2023/06/Eclaires.png'; // Remplacez l'URL par l'URL de votre image

				$image_id = attachment_url_to_postid($image_url); // Obtient l'ID de l'image à partir de l'URL

				if ($image_id) {
					$image_size = 'project_thumbnail'; // Remplacez 'project_thumbnail' par la taille d'image souhaitée
					$image = wp_get_attachment_image($image_id, $image_size, false, ['class' => 'description__img']);
					echo $image; // Affiche l'image avec la taille spécifiée et la classe CSS 'animal__img'
				} else {
					// Aucun ID d'image n'a été trouvé pour l'URL donnée
					// Gérez cette situation en conséquence
				}
				?>

			</div>
			
			<div>
				<p>  <?= get_field('qualities')['1']['name'] ?> </p>
				<img src="https://portfolio.localhost/wp-content/uploads/2023/06/Soleil.png" alt="">
			</div>
			
			<div>
				<p>  <?= get_field('qualities')['2']['name'] ?> </p>
				<img src="https://portfolio.localhost/wp-content/uploads/2023/06/ampoule.png" alt="">
			</div>
			
			
			<?php foreach (get_field('description') as $description): ?>
				<p> <?= $description['paragraphe'] ?> </p>
			<?php endforeach; ?>
			
			<?php foreach (get_field('legends_picture') as $legend): ?>
				<img src="https://portfolio.localhost/wp-content/uploads/2023/06/2-bg-remove.png" alt="">
				<p> <?= $legend['text']; ?> </p>
			<?php endforeach; ?>
		</section>
		
		<div class="project_container" id="project">
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
				<article>
					<a href="<?= get_the_permalink(); ?>" class="project__link">
						<span class=""><?= get_the_title(); ?></span>
					</a>
					<figure class="project__fig">
						<?= get_the_post_thumbnail(null, 'project_thumbnail', ['class' => 'project__thumbnail']); ?>
					</figure>
				</article>
			<?php endwhile; else: ?>
				<p>Je n'ai aucun projet pour l'instant.</p>
			<?php endif; ?>
		</div>
		<?php wp_reset_query(); ?>
		<a href="https://portfolio.localhost/contact/">  <?= get_field('call_to_action') ?> </a>
	</main>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
