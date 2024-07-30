<?php
$thumbnail_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/assets/images/dest/product.png';
?>

<a href="<?php the_permalink(); ?>" class="product__block product__block_bg">
	<img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" class="product__img product__img_bg">
	<div class="product__text">
		<p class="product__link text text_nano text_fw500 text_lh160 text_textUp"><?php the_title(); ?>
		</p>
		<p class="text text_gray text_mid text_lh133 text_fw700"><?php echo get_field("czena"); ?> <span class="measurement">₽ / м<span>2</span></span></p>
	</div>
</a>

<!-- <a href="/" class="product__block product__block_bg">
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
</a> -->