<?php /* Template Name: Contact page template */ ?>
<?php get_header();?>
<main class="page">
	<div class="page__form">
		<?php
		$feedback = portfolio_session_get('portfolio_contact_form_feedback') ?? false;
		$errors = portfolio_session_get('portfolio_contact_form_errors') ?? [];
		?>


		<?php if ($feedback): ?>
			<div class="success" style="border:green;padding:1em;color: green;">
				<p>Merci&nbsp;! Votre message a bien été envoyé.</p>
			</div>
		<?php else: ?>

			<?php if ($errors): ?>
				<div class="error" style="border:red;padding:1em;color: red;">
					<p>Attention&nbsp;! Merci de corriger les erreurs du formulaire.</p>
				</div>
			<?php endif; ?>

			<form action="<?= esc_url(admin_url('admin-post.php')); ?>" method="POST" class="contact">
				<fieldset class="contact__info">
					<div class="field">
						<label for="firstname" class="field__label">Votre prénom</label>
						<input type="text" name="firstname" id="firstname" class="field__input"/>
						<?php if ($errors['firstname'] ?? null): ?>
							<p class="field__error" style="color:red"><?= $errors['firstname']; ?></p>
						<?php endif; ?>
					</div>
					<div class="field">
						<label for="lastname" class="field__label">Votre nom</label>
						<input type="text" name="lastname" id="lastname" class="field__input"/>
						<?php if ($errors['lastname'] ?? null): ?>
							<p class="field__error" style="color:red"><?= $errors['lastname']; ?></p>
						<?php endif; ?>
					</div>
					<div class="field">
						<label for="email" class="field__label">Votre adresse mail</label>
						<input type="email" name="email" id="email" class="field__input"/>
						<?php if ($errors['email'] ?? null): ?>
							<p class="field__error" style="color:red"><?= $errors['email']; ?></p>
						<?php endif; ?>
					</div>
					<div class="field">
						<label for="message" class="field__label">Votre message</label>
						<textarea name="message" id="message" cols="30" rows="10" class="field__textarea"></textarea>
						<?php if ($errors['message'] ?? null): ?>
							<p class="field__error" style="color:red"><?= $errors['message']; ?></p>
						<?php endif; ?>
					</div>
				</fieldset>
				<div class="contact__footer">
					<input type="hidden" name="action" value="portfolio_contact_form"/>
					<input type="hidden" name="contact_nonce" value="<?= wp_create_nonce('portfolio_contact_form'); ?>"/>
					<button class="contact__submit" type="submit">Envoyer</button>
				</div>
			</form>
		<?php endif; ?>
	</div>
</main>
