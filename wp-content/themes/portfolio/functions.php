<?php
if (session_status() === PHP_SESSION_NONE) session_start();

require_once(__DIR__ . '/controllers/ContactForm.php');

// Disable Wordpress' default Gutenberg Editor:
add_filter('use_block_editor_for_post', '__return_false', 10);

// Register existing navigation menus
register_nav_menu('main', 'Navigation principale du site web (en-tête)');
register_nav_menu('footer', 'Navigation de pied de page');
function get_menu(string $location, ?array $attributes = []): array
{
	// 1. Récupérer les liens en base de données pour la location $location
	$locations = get_nav_menu_locations();
	$menuId = $locations[$location];
	$items = wp_get_nav_menu_items($menuId);

	// 2. Formater les liens récupérés en objets qui contiennent les attributs suivants :
	// - href : l'URL complète pour ce lien
	// - label : le libellé affichable pour ce lien
	$links = [];

	foreach ($items as $item) {
		$link = new stdClass();
		$link->href = $item->url;
		$link->label = $item->title;

		foreach($attributes as $attribute) {
			$link->$attribute = get_field($attribute, $item->ID);
		}

		$links[] = $link;
	}

	// 3. Retourner l'ensemble des liens formatés en un seul tableau non-associatif
	return $links;
}