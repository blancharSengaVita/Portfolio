<?php

// Démarrer le système de sessions pour pouvoir afficher des messages de feedback venant des formulaires.
if(session_status() === PHP_SESSION_NONE) session_start();


// Charger les fichiers des fonctionnalités extraites dans des classes.
require_once(__DIR__ . '/controllers/ContactForm.php');

// Disable Wordpress' default Gutenberg Editor:
add_filter('use_block_editor_for_post', '__return_false', 10);

// Register existing navigation menus
register_nav_menu('main', 'Navigation principale du site web (en-tête)');
register_nav_menu('footer', 'Navigation de pied de page');

function portfolio_get_menu(string $location, ?array $attributes = []): array
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

// Activer les images "thumbnail" sur nos posts
add_theme_support('post-thumbnails');
add_image_size('h350', 9999, 350, false);
add_image_size('w50', 500, 9999, false);
add_image_size('w80', 80, 9999, false);
add_image_size('w60', 60, 9999, false);
add_image_size('w200xh200', 200, 200, false);

// Enregistrer un custom post type :
function portfolio_register_custom_post_types()
{
	register_post_type('projet', [
		'label' => 'Projets',
		'description' => 'Les projets de Blanchar Senga-Vita',
		'public' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-portfolio', // https://developer.wordpress.org/resource/dashicons/#pets,
		'supports' => ['title','thumbnail', 'editor'],
	]);

	register_post_type('message', [
		'label' => 'Message de contact',
		'description' => 'Les messages envoyés via le formulaire de contact.',
		'public' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-email', // https://developer.wordpress.org/resource/dashicons/#pets,
		'supports' => ['title','editor'],
	]);
}

add_action('init', 'portfolio_register_custom_post_types');

// Gérer le formulaire de contact "custom"
// Inspiré de : https://wordpress.stackexchange.com/questions/319043/how-to-handle-a-custom-form-in-wordpress-to-submit-to-another-page

function portfolio_execute_contact_form()
{
	$config = [
		'nonce_field' => 'contact_nonce',
		'nonce_identifier' => 'portfolio_contact_form',
	];

	(new \Portfolio\ContactForm($config, $_POST))
		->sanitize([
			'firstname' => 'text_field',
			'lastname' => 'text_field',
			'email' => 'email',
			'message' => 'textarea_field',
		])
		->validate([
			'firstname' => ['required'],
			'lastname' => ['required'],
			'email' => ['required','email'],
			'message' => [],
		])
		->save(
			title: fn($data) => $data['firstname'] . ' ' . $data['lastname'] . ' <' . $data['email'] . '>',
			content: fn($data) => $data['message'],
		)
		->send(
			title: fn($data) => 'Nouveau message de ' . $data['firstname'] . ' ' . $data['lastname'],
			content: fn($data) => 'Prénom: ' . $data['firstname'] . PHP_EOL . 'Nom: ' . $data['lastname'] . PHP_EOL . 'Email: ' . $data['email'] . PHP_EOL . 'Message:' . PHP_EOL . $data['message'],
		)
		->feedback();
}

add_action('admin_post_nopriv_portfolio_contact_form', 'portfolio_execute_contact_form');
add_action('admin_post_portfolio_contact_form', 'portfolio_execute_contact_form');

// Travailler avec la session de PHP
function portfolio_session_flash(string $key, mixed $value)
{
	if(! isset($_SESSION['portfolio_flash'])) {
		$_SESSION['portfolio_flash'] = [];
	}

	$_SESSION['portfolio_flash'][$key] = $value;
}

function portfolio_session_get(string $key)
{
	if(isset($_SESSION['portfolio_flash']) && array_key_exists($key, $_SESSION['portfolio_flash'])) {
		// 1. Récupérer la donnée qui a été flash.
		$value = $_SESSION['portfolio_flash'][$key];
		// 2. Supprimer la donnée de la session.
		unset($_SESSION['portfolio_flash'][$key]);
		// 3. Retourner la donnée récupérée.
		return $value;
	}

	// La donnée n'existait pas dans la session flash, on retourne null.
	return null;
}

function dd($var){
	echo '<pre>';
	var_dump($var);
	echo '<pre>';
	die;
}

function image(string $image_url, string $classname, string $alt){
	$image_id = attachment_url_to_postid($image_url);
	$image = wp_get_attachment_image($image_id, false, false, ['class' => $classname, 'alt' => $alt ]);
	return $image;
};