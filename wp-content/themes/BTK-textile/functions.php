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
		'posts_per_page' => 3,
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
