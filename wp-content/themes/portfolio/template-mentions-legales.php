<?php /* Template Name: Privacy policy page template */ ?>
<?php get_header(); ?>
<main class="legal-mention">
	<h1 class="legal-mention__title "><?=get_the_title();?></h1>
	<div class="legal-mention__content">
		<article class="general-information legal-mention__container">
			<h2>Informations générales</h2>
			<dl>
				<dt>Nom</dt>
				<dd><?= get_field('surname'); ?></dd>
				<dt>Prénom</dt>
				<dd><?= get_field('firstname'); ?></dd>
				<dt>Numéro de téléphone</dt>
				<dd><?= get_field('phone_number'); ?></dd>
				<dt>Rue</dt>
				<dd><?= get_field('street') . ' '. get_field('street_number'); ?> </dd>
				<dt>E-mail</dt>
				<dd><a href="<?= get_field('email'); ?>"><?= get_field('email'); ?></a></dd>
				<dt>Ville</dt>
				<dd><?= get_field('city'); ?></dd>
				<dt>Pays</dt>
				<dd><?=get_field('Country');?><?=get_field('country');?>  </dd>
			</dl>
		</article>

		<section class="privacy-policy legal-mention__container">
			<h2>Clause de confidentialité</h2>
			<p> <?= get_field('privacy_policy')?> </p>
		</section>
	</div>
</main>
<?php get_footer(); ?>
