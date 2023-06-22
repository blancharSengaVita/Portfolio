<?php /* Template Name: Contact page template */ ?>
<?php get_header();?>
<main class="page">
	<div class="page__form">
		<?php
		$feedback = portfolio_session_get('portfolio_contact_form_feedback') ?? false;
		$errors = portfolio_session_get('portfolio_contact_form_errors') ?? [];
		?>

		<h1 class="sr-only"> Formulaire de contact </h1>
		<p class="title"> <?= get_field('title') ?> </p>

		<?php if ($feedback): ?>
			<div class="success"">
				<p>Merci&nbsp;! Votre message a bien été envoyé.</p>
			</div>
		<?php endif; ?>

			<?php if ($errors): ?>
				<div class="error">
					<p>Attention&nbsp;! Merci de corriger les erreurs du formulaire.</p>
				</div>
			<?php endif; ?>

			<form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="contact">
				<fieldset class="contact__info">
					<div class="contact__container ">
						<div class="field">
							<label for="firstname" class="field__label">Votre prénom</label>
							<input type="text" name="firstname" id="firstname" class="field__input"/>
							<?php if ($errors['firstname'] ?? null): ?>
								<p class="field__error" ><?= $errors['firstname']; ?></p>
							<?php endif; ?>
						</div>
						<div class="field">
							<label for="lastname" class="field__label">Votre nom</label>
							<input type="text" name="lastname" id="lastname" class="field__input"/>
							<?php if ($errors['lastname'] ?? null): ?>
								<p class="field__error" ><?= $errors['lastname']; ?></p>
							<?php endif; ?>
						</div>
					</div>

					<div class="field">
						<label for="email" class="field__label">Votre adresse mail</label>
						<input type="email" name="email" id="email" class="field__input"/>
						<?php if ($errors['email'] ?? null): ?>
							<p class="field__error" ><?= $errors['email']; ?></p>
						<?php endif; ?>
					</div>
					<div class="field">
						<label for="message" class="field__label">Votre message</label>
						<textarea name="message" id="message" cols="30" rows="10" class="field__textarea"></textarea>
						<?php if ($errors['message'] ?? null): ?>
							<p class="field__error" ><?= $errors['message']; ?></p>
						<?php endif; ?>
					</div>
				</fieldset>
				<div class="contact__footer">
					<input type="hidden" name="action" value="portfolio_contact_form"/>
					<input type="hidden" name="contact_nonce" value="<?= wp_create_nonce('portfolio_contact_form'); ?>"/>
					<button class="contact__submit" type="submit">Envoyer</button>
				</div>
			</form>
</main>
<?php get_footer(); ?>
