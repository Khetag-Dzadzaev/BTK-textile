<?php get_header(); ?>
<main class="main">
	<?php
	if (!empty(get_terms('catalog-tkani'))) {
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
					foreach (get_terms('kategorii') as $value) {
						$photo = get_field("foto", "term_" . $value->term_id); ?>
						<div class="product__box">
							<a href="<?php echo ("/" . $value->taxonomy . "/" . $value->slug); ?>" class="product__block">
								<img src="<?php echo $photo["url"]; ?>" alt="<?php echo $photo["title"]; ?>" class="product__img">
								<div class="product__text">
									<p class="product__link text text_nano text_fw500 text_lh160 text_textUp"><?php echo $value->name; ?>
										<span>
											<svg class="contact__before">
												<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
											</svg>
										</span>
									</p>
									<p class="text text_gray text_mid text_lh150">
										<?php
										if (is_numeric($value->count)) {
											echo $value->count == 1 ? $value->count . " позиция" : $value->count . " позиций";
										} else {
											echo "неизвестное количество позиций";
										}
										?> </p>
								</div>
							</a>
						</div>
					<?php		} ?>
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