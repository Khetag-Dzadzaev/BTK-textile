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
					<?php echo	get_template_part('template_parts/filterCatalog'); ?>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/cross.png" alt="charset" class="filter-crest">
				<div class="filter-button">
					<p class="text text_mid text_lh150 text_fw500">Фильтры</p>
				</div>
				<div class="archive__product">
					<div class="product product_archive">
						<?php
						$args = array(
							"post_type" => "catalog-tkani",
							"tax_query" => array(
								array(
									'taxonomy' => 'kategorii',
									'field'    => 'slug',
									'terms'    => $qo->slug,
									'posts_per_page' => '12',
									'paged' => get_query_var('paged') ?: 1
								)
							),
						);
						if (!is_admin() && $wp_query->is_main_query() && $wp_query->is_tax("kategorii")) {
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
								$wp_query->set('meta_query', $args['meta_query']);
							}
						}
						$wp_query = new WP_Query($args);

						while (have_posts()) {
							the_post();
						?>
							<div class="product__box ">
								<?php echo	get_template_part('template_parts/tkani-single'); ?>
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