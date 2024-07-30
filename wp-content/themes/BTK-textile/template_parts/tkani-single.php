<?php
$thumbnail_url = get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/assets/images/dest/product.png';
?>

<a href="<?php the_permalink(); ?>" class="product__block">
	<img src="<?php echo $thumbnail_url; ?>" alt="<?php the_title(); ?>" class="product__img">
	<div class="product__text">
		<p class="product__link text text_nano text_fw500 text_lh160 text_textUp"><?php the_title(); ?>
		</p>
		<p class="text text_gray text_mid text_lh133 text_fw700"><?php echo get_field("czena"); ?><span class="measurement">₽ / м<span>2</span></span></p>
	</div>
</a>