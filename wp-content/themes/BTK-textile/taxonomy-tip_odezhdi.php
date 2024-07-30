<?php get_header();
global $wp_query;
$god = 0;
$qo = get_queried_object();
?>
<main class="main">
	<section class="section section_single">
		<div class="container">
			<div class="breadcrumb-block">
				<ul class="breadcrumb">
					<?php bcn_display(); ?>
				</ul>
			</div>
			<h1 class="text text__title-mid text_drak text_fw700"><?php echo $qo->name;  ?></h1>
		</div>
	</section>
	<section class="section section_pt">
		<div class="container">
			<div class="archive">
				<div class="archive__filter">
					<?php echo	get_template_part('template_parts/filterProduct'); ?>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/cross.png" alt="charset" class="filter-crest">
				<div class="filter-button">
					<p class="text text_mid text_lh150 text_fw500">Фильтры</p>
				</div>
				<div class="archive__product">
					<div class="product product_archive">
						<?php
						$args = array(
							"post_type" => "finished-product",
							"tax_query" => array(
								array(
									'taxonomy' => 'tip_odezhdi',
									'field'    => 'slug',
									'terms'    => $qo->slug,
									'posts_per_page' => '12',
									'paged' => get_query_var('paged') ?: 1
								)
							),
						);
						if (!is_admin() && $wp_query->is_main_query() && $wp_query->is_post_type_archive("finished-product")) {
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
								$wp_query->set('meta_query', $args['meta_query']);
							}
						}
						$wp_query = new WP_Query($args);

						while (have_posts()) {
							the_post();
						?>
							<div class="product__box ">
								<?php echo	get_template_part('template_parts/product-single'); ?>
							</div>
						<?php	}
						?>
					</div>
					<div class="dop-buttons">
						<?php if (function_exists('wp_pagenavi')) {
							wp_pagenavi();
						} ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>