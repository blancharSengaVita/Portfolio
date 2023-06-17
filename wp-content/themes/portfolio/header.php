<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= get_bloginfo('name'); ?></title>
	<link rel="stylesheet" href="<?= get_stylesheet_directory_uri() . '/public/css/site.css';?>" />
	<script src="<?= get_stylesheet_directory_uri() . '/public/js/main.js';?>" defer > </script>
</head>
<body>
<header class="header">
	<div class="header__container logo">
		<a class="logo__link" href="https://portfolio.localhost/">
			<?= image('https://portfolio.localhost/wp-content/uploads/2023/06/Logo.png', 'logo__img', 'Logo de Blanchar Senga-Vita') ?>
		</a>
	</div>

	<div class="header__container menu">
		<input type="checkbox" name="menu" id="menu" class="sr-only">
		<label for="menu" class="menu__open">
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu" width="40" height="40" viewBox="0 0 24 24" stroke-width="1">
				<line x1="4" x2="20" y1="12" y2="12"></line>
				<line x1="4" x2="20" y1="6" y2="6"></line>
				<line x1="4" x2="20" y1="18" y2="18"></line>
			</svg>
		</label>

		<div class="menu__content">
			<label for="menu" class="menu__close">
				<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><line x1="18" x2="6" y1="6" y2="18"/><line x1="6" x2="18" y1="6" y2="18"/></svg>
			</label>

			<nav class="menu__nav nav">
				<?php foreach (portfolio_get_menu('main') as $link): ?>
					<a href="<?= $link->href; ?>" class="nav__link">
						<span class="nav__label">
							<?= $link->label; ?>
						</span>
					</a>
				<?php endforeach; ?>
			</nav>
		</div>
	</div>
</header>

