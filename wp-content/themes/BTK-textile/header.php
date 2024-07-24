<!DOCTYPE html>
<html lang="ru">

<head>
	<?php wp_head(); ?>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="body">
	<header class="header" id="header">
		<div class="container">
			<div class="header__block">
				<a href="/" class="logo-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo" class="logo"></a>
				<ul class="menu">
					<?php wp_nav_menu(
						[
							'theme_location'  => 'menu_main_header',
							'container'       => '',
							'menu_class'      => 'menu__item',
							'menu_id'         => '',
							'walker'          => new main_nav_menu_Walker(),
							'items_wrap'      => '%3$s',
						]
					);
					?>
				</ul>
				<div class="header__right">
					<div class="callback">
						<p class="text text_fw600 text_lh160 text_nano text_textUp">обратная связь</p>
						<div class="callback__svg">
							<svg>
								<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#mesege"></use>
							</svg>
						</div>
					</div>
					<div class="burger">
						<div class="burger__line"></div>
					</div>
				</div>


			</div>
		</div>
	</header>