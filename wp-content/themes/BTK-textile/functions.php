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
		<?php $_SERVER['REQUEST_URI'] = '/news-akcii'; ?>
		<?php if (function_exists('wp_pagenavi')) {
			wp_pagenavi();
		} ?>
	</div>

<?php
	wp_die();
}


/* 
add_action('wp_ajax_filter', 'filter_action');
add_action('wp_ajax_nopriv_filter', 'filter_action');
function filter_action()
{
	global $post;

	$args = [
		'post_type' => 'catalog-tkani',
		'post_status' => 'publish',
		'posts_per_page' => 6,
		'meta_query'    => array(
			'relation'      => 'AND',
			array(
				'key'       => 'czvet',
				'value'     => array('Красный'),
				'compare'   => 'IN',
			),
		),
		'paged' => $_POST['page'] + 1,
	];
	echo "<hr /><h1>DEBUG</h1><pre>";
	var_dump($post);
	echo "</pre>";



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
		<?php $_SERVER['REQUEST_URI'] = '/news-akcii'; ?>
		<?php if (function_exists('wp_pagenavi')) {
			wp_pagenavi();
		} ?>
	</div>

<?php
	wp_die();
}
 */

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
}
