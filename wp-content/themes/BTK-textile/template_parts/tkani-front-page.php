<?php
$thumbnail_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/assets/images/dest/product.png';
$pos_count = get_field("skolko_poziczij");
?>
<div class="product__box">
	<a href="<?php the_permalink(); ?>" class="product__block">
		<img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" class="product__img">
		<div class="product__text">
			<p class="product__link text text_nano text_fw500 text_lh160 text_textUp"><?php the_title(); ?>
				<span>
					<svg class="contact__before">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
					</svg>
				</span>
			</p>
			<p class="text text_gray text_mid text_lh150">
				<?php
				if (is_numeric($pos_count)) {
					echo $pos_count == 1 ? $pos_count . " позиция" : $pos_count . " позиций";
				} else {
					echo "неизвестное количество позиций";
				}
				?> </p>
		</div>
	</a>
</div>