<?php get_header();
$kategori = get_the_terms(get_the_ID(), "kategorii");
?>
<main class="main">
	<section class="section section_single">
		<div class="container">
			<div class="breadcrumb-block">
				<ul class="breadcrumb">
					<?php bcn_display(); ?>
				</ul>
			</div>
			<h1 class="text text__title-mid text_drak text_fw700"><?php the_title(); ?></h1>
		</div>
	</section>
	<section class="section section_pt">
		<div class="container">
			<div class="product-info">

				<div class="product-info__box">
					<div class="gallery-container">
						<div class="swiper-container gallery-main">
							<div class="swiper-wrapper lg" id="product-img">
								<?php
								foreach (get_field("fotografii") as $value) {
								?>
									<a href="<?php echo $value["foto"]['url']; ?>" class="swiper-slide lg-item">
										<img src="<?php echo $value["foto"]['sizes']["large"]; ?>" alt="<?php echo $value["foto"]['title']; ?>" class="product-img">
									</a>
								<?php } ?>
							</div>
							<div class="swiper-button-prev gallery-slider-button gallery-slider-button_prev"></div>
							<div class="swiper-button-next gallery-slider-button gallery-slider-button_next"></div>
						</div>
						<div class="swiper-container gallery-thumbs">
							<div class="swiper-wrapper">
								<?php foreach (get_field("fotografii") as $value) { ?>
									<div class="swiper-slide">
										<img src="<?php echo $value["foto"]['sizes']["thumbnail"]; ?>" alt="<?php echo $value["foto"]['title']; ?>" class="product-img-thums">
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="product-info__box ">
					<div class="product-info__block">
						<div class="product-info__row">
							<div class="product-info__colum">
								<p class="text text_lh171 product-info__text">Цвет</p>
								<p class="text text_lh150 text_fw500 text_mini"><?php echo get_field("czvet"); ?></p>
							</div>
							<div class="product-info__colum">
								<p class="text text_lh171 product-info__text">Категория</p>
								<p class="text text_lh150 text_fw500 text_mini"><?php foreach ($kategori as $value) {
																																	echo $value->name;
																																} ?></p>
							</div>
							<div class="product-info__colum">
								<p class="text text_lh171 product-info__text">Свойства</p>
								<p class="text text_lh150 text_fw500 text_mini"><?php echo get_field("svojstva")["label"]; ?></p>
							</div>
							<div class="product-info__colum">
								<p class="text text_lh171 product-info__text">Плотность</p>
								<p class="text text_lh150 text_fw500 text_mini"><?php echo get_field("plotnost"); ?> г/м2</p>
							</div>
							<div class="product-info__colum">
								<p class="text text_lh171 product-info__text">Переплетение</p>
								<p class="text text_lh150 text_fw500 text_mini"><?php echo get_field("perepletenie")["label"]; ?></p>
							</div>

						</div>
						<div class="product-info__cen-button">
							<p class="text text_nano text_dark text_lh160">Цена за пог.м.: <span><?php echo get_field("czena"); ?><span class="measurement"> ₽ <!--/ м<span class="single-cen">2</span>--></span></span></p>
							<div class="button-contact button-contact_button  order-button">Отправить заявку</div>
						</div>
						<?php if (!empty(get_field("tekst"))) { ?>
							<p class="text text_lh150 text_mini text_dark"><?php echo get_field("tekst"); ?></p>
						<?php	} ?>
					</div>
				</div>
			</div>
			<a href="/catalog-tkani" class="back text text_nano text_fw500 text_lh160 text_textUp"><span>
					<svg class="contact__before">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
					</svg>
				</span>НАЗАД В КАТЕГОРИЮ</a>
		</div>
	</section>
	<?php
	$query = new WP_Query([
		'post_type' => 'catalog-tkani',
		'posts_per_page' => 8,
		'post__not_in' => array(get_the_ID()),
	]);
	if ($query->have_posts()) {
	?>
		<section class="section section_pt">
			<div class="container">
				<div class="section__title section__title_single">
					<p class="text text_lh150 text__title-mid text_fw700 text_dark">Смотрите также</p>
				</div>
				<div class="product product_single">
					<?php
					while ($query->have_posts()) {
						$query->the_post(); ?>
						<div class="product__box product__box_single">
							<?php echo	get_template_part('template_parts/tkani-single'); ?>
						</div>
					<?php	}
					wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
	<?php } ?>
	<?php
	if (isset($_COOKIE['catalogTkaniViewed'])) {
		$viewedPosts = array_map('intval', explode(",", $_COOKIE['catalogTkaniViewed']));
		$viewedPosts = array_filter($viewedPosts, function ($id) {
			return $id != get_the_ID();
		});
		if (!empty($viewedPosts)) {

			$query = new WP_Query([
				'post__in' => $viewedPosts,
				'orderby' => 'post__in',
				'posts_per_page' => 4,
				'post_type' => 'catalog-tkani',
			]);

			if ($query->have_posts()) { ?>
				<section class="section section_pt">
					<div class="container">
						<div class="section__title section__title_single">
							<p class="text text_lh150 text__title-mid text_fw700 text_dark">Ранее смотрели</p>
						</div>
						<div class="product product_single">
							<?php
							while ($query->have_posts()) {
								$query->the_post(); ?>
								<div class="product__box product__box_single">
									<?php echo	get_template_part('template_parts/tkani-single'); ?>
								</div>
							<?php }
							wp_reset_query();
							wp_reset_postdata(); ?>
						</div>
					</div>
				</section>
	<?php }
		}
	} ?>
	<?php echo	get_template_part('template_parts/modal-order'); ?>
</main>
<?php get_footer(); ?>