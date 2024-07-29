<?php get_header(); ?>
<main class="main">
	<?php
	$query = new WP_Query([
		'post_type' => 'catalog-tkani',
		'posts_per_page' => 6,
	]);

	if ($query->have_posts()) {
	?>
		<section class="section">
			<div class="container">
				<div class="section__title">
					<h1 class="text text__title-big text_fw700 text_dark">Каталог складских запасов тканей</h1>
					<div class="section__text-button">
						<?php if (!empty(get_field("tekst_bloka_katalog_tkanej"))) { ?>
							<p class="text text_big text_lh150 text_dark"><?php echo get_field("tekst_bloka_katalog_tkanej"); ?></p>
						<?php	} ?>
						<a href="/catalog-tkani/" class="section__link text text_nano text_fw500 text_lh160 text_textUp">Перейти в каталог
							<span>
								<svg class="contact__before">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
								</svg>
							</span>
						</a>
					</div>
				</div>
				<div class="product">
					<?php
					while ($query->have_posts()) {
						$query->the_post();
						echo  get_template_part('template_parts/tkani-front-page');
					}
					wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
	<?php } ?>
	<section class="section section_pt">
		<div class="container">
			<div class="section__title">
				<h1 class="text text__title-big text_fw700 text_dark">Каталог готовых изделий</h1>
				<div class="section__text-button">
					<p class="text text_big text_lh150 text_dark">Производит инновационные «умные» ткани из
						синтетических
						волокон и готовую швейную продукцию, применимые в любой отрасли
						от туризма и медицины до тяжелой промышленности.</p>
					<a href="/" class="section__link text text_nano text_fw500 text_lh160 text_textUp">Перейти в каталог
						<span>
							<svg class="contact__before">
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
							</svg>
						</span>
					</a>
				</div>
			</div>
			<div class="product">
				<div class="product__box">
					<a href="/" class="product__block product__block_bg">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/dest/Rectangle.png" alt="product" class="product__img product__img_bg">
						<div class="product__text">
							<p class="product__link text text_nano text_fw500 text_lh160 text_textUp">Специальная одежда
								<span>
									<svg class="contact__before">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
									</svg>
								</span>
							</p>
							<p class="text text_gray text_mid text_lh150">10 позиций
							</p>
						</div>
					</a>
				</div>
				<div class="product__box">
					<a href="/" class="product__block product__block_bg">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/dest/Rectangle.png" alt="product" class="product__img product__img_bg">
						<div class="product__text">
							<p class="product__link text text_nano text_fw500 text_lh160 text_textUp">Специальная одежда
								<span>
									<svg class="contact__before">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
									</svg>
								</span>
							</p>
							<p class="text text_gray text_mid text_lh150">10 позиций
							</p>
						</div>
					</a>
				</div>
				<div class="product__box">
					<a href="/" class="product__block product__block_bg">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/dest/Rectangle.png" alt="product" class="product__img product__img_bg">
						<div class="product__text">
							<p class="product__link text text_nano text_fw500 text_lh160 text_textUp">Специальная одежда
								<span>
									<svg class="contact__before">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
									</svg>
								</span>
							</p>
							<p class="text text_gray text_mid text_lh150">10 позиций
							</p>
						</div>
					</a>
				</div>
				<div class="product__box">
					<a href="/" class="product__block product__block_bg">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/dest/Rectangle.png" alt="product" class="product__img product__img_bg">
						<div class="product__text">
							<p class="product__link text text_nano text_fw500 text_lh160 text_textUp">Специальная одежда
								<span>
									<svg class="contact__before">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
									</svg>
								</span>
							</p>
							<p class="text text_gray text_mid text_lh150">10 позиций
							</p>
						</div>
					</a>
				</div>
				<div class="product__box">
					<a href="/" class="product__block product__block_bg">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/dest/Rectangle.png" alt="product" class="product__img product__img_bg">
						<div class="product__text">
							<p class="product__link text text_nano text_fw500 text_lh160 text_textUp">Специальная одежда
								<span>
									<svg class="contact__before">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
									</svg>
								</span>
							</p>
							<p class="text text_gray text_mid text_lh150">10 позиций
							</p>
						</div>
					</a>
				</div>
				<div class="product__box">
					<a href="/" class="product__block product__block_bg">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/dest/Rectangle.png" alt="product" class="product__img product__img_bg">
						<div class="product__text">
							<p class="product__link text text_nano text_fw500 text_lh160 text_textUp">Специальная одежда
								<span>
									<svg class="contact__before">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
									</svg>
								</span>
							</p>
							<p class="text text_gray text_mid text_lh150">10 позиций
							</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>