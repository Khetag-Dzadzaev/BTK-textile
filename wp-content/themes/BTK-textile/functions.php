<?php

get_template_part('functions-default');
get_template_part('functions-styles');
get_template_part('functions-menu');


add_action('after_setup_theme', 'add_features');
function add_features()
{
	add_theme_support('custom-logo', [
		'height'      => "auto",
		'width'       => "auto",
		'flex-width'  => false,
		'flex-height' => false,
		'header-text' => '',
		'class'       => 'logo'
	]);
}


add_action('wp_ajax_loadmoreProjects', 'loadmoreProjects_action');
add_action('wp_ajax_nopriv_loadmoreProjects', 'loadmoreProjects_action');
function loadmoreProjects_action()
{
	global $post;

	$args = [
		'post_type' => 'catalog-tkani',
		'post_status' => 'publish',
		'posts_per_page' => 12,
		'paged' => $_POST['page'] + 1,
	];


	query_posts($args);
?>

	<div class="product product_archive">
		<?php while (have_posts()) {
			the_post(); ?>
			<div class="product__box">
				<?php echo	get_template_part('template_parts/tkani-single'); ?>
			</div>
		<?php
		};
		wp_reset_postdata(); ?>
	</div>
	<div class="dop_buttons">
		<a href="#" class="pagination__btn hover-btn loadmoreProjects" data-pages="<?php echo $max_pages; ?>" data-page="<?php echo $paged; ?>" data-link="<?php echo $link; ?>">
			Показать ещё
		</a>
		<?php $_SERVER['REQUEST_URI'] = '/catalog-tkani'; ?>
		<?php if (function_exists('wp_pagenavi')) {
			wp_pagenavi();
		} ?>
	</div>

<?php
	wp_die();
}
add_action('wp_ajax_loadmoreProduct', 'loadmoreProduct_action');
add_action('wp_ajax_nopriv_loadmoreProduct', 'loadmoreProduct_action');
function loadmoreProduct_action()
{
	global $post;

	$args = [
		'post_type' => 'finished-product',
		'post_status' => 'publish',
		'posts_per_page' => 12,
		'paged' => $_POST['page'] + 1,
	];


	query_posts($args);
?>
	<div class="product product_archive">
		<?php while (have_posts()) {
			the_post(); ?>
			<div class="product__box">

				<?php echo	get_template_part('template_parts/product-single'); ?>
			</div>
		<?php
		};
		wp_reset_postdata(); ?>
	</div>
	<div class="dop_buttons">
		<a href="#" class="pagination__btn hover-btn loadmoreProduct" data-pages="<?php echo $max_pages; ?>" data-page="<?php echo $paged; ?>" data-link="<?php echo $link; ?>">
			Показать ещё
		</a>
		<?php $_SERVER['REQUEST_URI'] = '/finished-product'; ?>
		<?php if (function_exists('wp_pagenavi')) {
			wp_pagenavi();
		} ?>
	</div>

<?php
	wp_die();
}

add_action('pre_get_posts', 'wpse176347_pre_get_posts');
function wpse176347_pre_get_posts($query)
{



	if (!is_admin() && $query->is_main_query() && $query->is_post_type_archive("catalog-tkani")) {
		$args['meta_query'] = array('relation' => 'AND'); // Общая связь - AND

		// Обработка 'amount-input'
		if (!empty($_GET["amount-input"])) {
			$amount_query = array();

			if (strpos($_GET["amount-input"], '-') !== false) {
				$price_arr = explode('-', $_GET["amount-input"]);

				$amount_query[] = array(
					'key'     => 'plotnost',
					'value'   => $price_arr[0],
					'compare' => '>=',
					'type'    => 'NUMERIC',
				);

				$amount_query[] = array(
					'key'     => 'plotnost',
					'value'   => $price_arr[1],
					'compare' => '<=',
					'type'    => 'NUMERIC',
				);
			} else {
				$amount_query[] = array(
					'key'     => 'plotnost',
					'value'   => sanitize_text_field($_GET["amount-input"]),
					'compare' => '=',
					'type'    => 'NUMERIC',
				);
			}

			if (!empty($amount_query)) {
				$args['meta_query'][] = array(
					'relation' => 'AND',
					$amount_query // Добавляем условие для amount-input
				);
			}
		}

		// Обработка 'svoistva'
		if (!empty($_GET["svoistva"]) && is_array($_GET["svoistva"])) {
			$svoistva_query = array('relation' => 'OR');
			foreach ($_GET["svoistva"] as $value) {
				$svoistva_query[] = array(
					'key'     => 'svojstva',
					'value'   => sanitize_text_field($value),
					'compare' => 'LIKE',
				);
			}
			$args['meta_query'][] = $svoistva_query; // Добавляем к общему запросу
		}

		// Обработка 'pereplet'
		if (!empty($_GET["pereplet"]) && is_array($_GET["pereplet"])) {
			$pereplet_query = array('relation' => 'OR');
			foreach ($_GET["pereplet"] as $value) {
				$pereplet_query[] = array(
					'key'     => 'perepletenie',
					'value'   => sanitize_text_field($value),
					'compare' => 'LIKE',
				);
			}
			$args['meta_query'][] = $pereplet_query; // Добавляем к общему запросу
		}

		// Установка итогового meta_query
		if (!empty($args['meta_query'])) {
			$query->set('meta_query', $args['meta_query']);
		}
	}
	if (!is_admin() && $query->is_main_query() && $query->is_post_type_archive("finished-product")) {
		$args['meta_query'] = array('relation' => 'AND'); // Общая связь - AND

		// Обработка 'amount-input'
		if (!empty($_GET["Cenamount-input"])) {
			$amount_query = array();

			if (strpos($_GET["Cenamount-input"], '-') !== false) {
				$price_arr = explode('-', $_GET["Cenamount-input"]);

				$amount_query[] = array(
					'key'     => 'czena',
					'value'   => $price_arr[0],
					'compare' => '>=',
					'type'    => 'NUMERIC',
				);

				$amount_query[] = array(
					'key'     => 'czena',
					'value'   => $price_arr[1],
					'compare' => '<=',
					'type'    => 'NUMERIC',
				);
			} else {
				$amount_query[] = array(
					'key'     => 'czena',
					'value'   => sanitize_text_field($_GET["Cenamount-input"]),
					'compare' => '=',
					'type'    => 'NUMERIC',
				);
			}

			if (!empty($amount_query)) {
				$args['meta_query'][] = array(
					'relation' => 'AND',
					$amount_query // Добавляем условие для Cenamount-input
				);
			}
		}

		// Обработка 'svoistva'
		if (!empty($_GET["svoistva"]) && is_array($_GET["svoistva"])) {
			$svoistva_query = array('relation' => 'OR');
			foreach ($_GET["svoistva"] as $value) {
				$svoistva_query[] = array(
					'key'     => 'svojstvo',
					'value'   => sanitize_text_field($value),
					'compare' => 'LIKE',
				);
			}
			$args['meta_query'][] = $svoistva_query; // Добавляем к общему запросу
		}

		// Обработка 'pereplet'
		if (!empty($_GET["pereplet"]) && is_array($_GET["pereplet"])) {
			$pereplet_query = array('relation' => 'OR');
			foreach ($_GET["pereplet"] as $value) {
				$pereplet_query[] = array(
					'key'     => 'tkan',
					'value'   => sanitize_text_field($value),
					'compare' => 'LIKE',
				);
			}
			$args['meta_query'][] = $pereplet_query; // Добавляем к общему запросу
		}

		// Установка итогового meta_query
		if (!empty($args['meta_query'])) {
			$query->set('meta_query', $args['meta_query']);
		}
	}
}

add_action('template_redirect', 'truemisha_recently_viewed_product_cookie', 20);

function truemisha_recently_viewed_product_cookie()
{

	// если находимся не на странице товара, ничего не делаем
	if (!is_singular("catalog-tkani") && !is_singular("finished-product")) {
		return;
	}


	if (empty($_COOKIE['catalogTkaniViewed'])) {
		$viewed_products = array();
	} else {
		$viewed_products = (array) explode(',', $_COOKIE['catalogTkaniViewed']);
	}

	// добавляем в массив текущий товар
	if (!in_array(get_the_ID(), $viewed_products)) {
		$viewed_products[] = get_the_ID();
	}

	// нет смысла хранить там бесконечное количество товаров
	if (sizeof($viewed_products) > 8) {
		array_shift($viewed_products); // выкидываем первый элемент
	}

	if (empty($_COOKIE['finishedProductViewed'])) {
		$viewed_products = array();
	} else {
		$viewed_products = (array) explode(',', $_COOKIE['finishedProductViewed']);
	}

	// добавляем в массив текущий товар
	if (!in_array(get_the_ID(), $viewed_products)) {
		$viewed_products[] = get_the_ID();
	}

	// нет смысла хранить там бесконечное количество товаров
	if (sizeof($viewed_products) > 8) {
		array_shift($viewed_products); // выкидываем первый элемент
	}

	// устанавливаем в куки
	setcookie('catalogTkaniViewed', join(',', $viewed_products), time() + 3600, "/");
	setcookie('finishedProductViewed', join(',', $viewed_products), time() + 3600, "/");
}
