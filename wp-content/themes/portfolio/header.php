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
	<nav class="nav">
		<?php foreach (portfolio_get_menu('main') as $link): ?>
			<a href="<?= $link->href; ?>" class="nav__link">
				<span class="nav__label">
					<?= $link->label; ?>
				</span>
			</a>
		<?php endforeach; ?>
	</nav>
</header>
