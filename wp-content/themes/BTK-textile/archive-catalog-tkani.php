<?php get_header();
$kategori = get_terms("categori");
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
			<div class="archive">
				<div class="archive__filter">
					<div class="archive__taxsanomi">
						<?php foreach ($kategori as  $value) {
							$kategori_link = get_term_link($value->{'term_id'}, 'categori');
						?>
							<a href="<?php echo $kategori_link; ?>" class="archive__taxsanomi-item  text text_nano text_fw500 text_lh160 text_textUp"><?php echo $value->{'name'} ?><span>
									<svg class="">
										<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
									</svg>
								</span></a>

						<?php } ?>

					</div>
					<div class="archive__filter-bottom">
						<div class="archive__filter-block">
							<div class="archive__filter-box">
								<p class="archive__filter-title text text_mid text_fw600 text_lh150 text_textUp">Свойства</p>
								<label class="archive__filter-checkbox text text_lh150 text_mini">
									<input type="checkbox">
									<span>Антибактериальная</span>
								</label>
								<label class="archive__filter-checkbox text text_lh150 text_mini">
									<input type="checkbox">
									<span>Антибактериальная</span>
								</label>
								<label class="archive__filter-checkbox text text_lh150 text_mini">
									<input type="checkbox">
									<span>Антибактериальная</span>
								</label>
								<label class="archive__filter-checkbox text text_lh150 text_mini">
									<input type="checkbox">
									<span>Антибактериальная</span>
								</label>
							</div>
							<div class="archive__filter-box">
								<p class="archive__filter-title text text_mid text_fw600 text_lh150 text_textUp">Переплетение</p>
								<label class="archive__filter-checkbox text text_lh150 text_mini">
									<input type="checkbox">
									<span>Саржевое</span>
								</label>
								<label class="archive__filter-checkbox text text_lh150 text_mini">
									<input type="checkbox">
									<span>Полотняное</span>
								</label>
							</div>
							<div class="archive__filter-box">
								<p class="archive__filter-title text text_mid text_fw600 text_lh150 text_textUp">плотность</p>
								<div class="archive__calc">
									<div class="output text text_mini text_fw500 text_lh150" id="amount">от <strong>0г/м2</strong> -
										до
										<strong>140г/м2</strong>
									</div>
									<div id="slider"></div>
								</div>
							</div>
						</div>
						<div class="archive__filter-block">
							<div class="archive__button">Показать</div>
						</div>
					</div>
				</div>
				<img src="./images/cross.png" alt="charset" class="filter-crest">
				<div class="filter-button">
					<p class="text text_mid text_lh150 text_fw500">Фильтры</p>
				</div>
				<div class="archive__product">
					<div class="product product_archive">
						<?php
						while (have_posts()) {
							the_post(); ?>
							<div class="product__box ">
								<?php echo	get_template_part('template_parts/tkani-single'); ?>
							</div>
						<?php	} ?>
					</div>
					<div class="dop-buttons">
						<?php $max_pages = $wp_query->max_num_pages;
						$paged = get_query_var('paged') ? get_query_var('paged') : 1;
						$link = html_entity_decode(get_pagenum_link()); ?>

						<a href="#" class="button-ajax text text_nano text_fw500 text_lh160 gallery" data-pages="<?php echo $max_pages; ?>" data-page="<?php echo $paged; ?>" data-link="<?php echo $link; ?>">Показать ещё
						</a>
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

<script>
	const loadMore = document.querySelector('.gallery');
	var currentPage = <?php echo $paged; ?>;
	var pageNext = Number(loadMore.getAttribute('data-page'));
	var pages = loadMore.getAttribute('data-pages');
	if (pageNext < pages) {
		pageNext++;
	}
	window.addEventListener("DOMContentLoaded", () => {
		if (currentPage == pageNext) {
			loadMore.remove();
		}
	});
	loadMore.addEventListener('click', (e) => {
		var act = '/wp-admin/admin-ajax.php';
		e.preventDefault();
		var link = loadMore.getAttribute('data-link') + "page/" + pageNext + "/";
		window.history.pushState("", "Title", link);
		const xhr = new XMLHttpRequest();
		const data = new FormData();
		data.append("action", "loadmoreProjects");
		data.append("page", currentPage);
		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4) {
				if (xhr.status === 200) {
					let response = xhr.responseText;
					let divResponse = document.createElement("div");
					divResponse.innerHTML = xhr.responseText;
					// console.log(divResponse);return;
					let paginationResponse = divResponse.querySelector('.pagination');
					let itemsResponse = divResponse.querySelectorAll('.product__box');
					let parent = document.querySelector(".product.product_archive");
					let pagination = document.querySelector('.pagination');
					// console.log(itemsResponse);console.log(div);return;
					if (response) {
						itemsResponse.forEach(el => {
							parent.append(el);
						});
						pagination.replaceWith(paginationResponse);
					}
					if (pageNext == pages) {
						loadMore.remove();
						console.log(pageNext);
					} else {
						pageNext++;
					}
					currentPage++;
				} else {
					console.log('An error occurred during your request: ' + xhr.status + ' ' + xhr.statusText);
				}
			}
		}
		xhr.open("POST", act);
		xhr.send(data);
	});
</script>