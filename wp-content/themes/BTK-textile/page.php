<?php get_header(); ?>
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
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

</main>
<?php get_footer(); ?>