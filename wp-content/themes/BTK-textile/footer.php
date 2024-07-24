<footer class="footer">
	<div class="container">
		<div class="footer__block">
			<a href="/" class="logo-link"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo" class="logo"></a>
			<ul class="footer-menu">
				<?php wp_nav_menu(
					[
						'theme_location'  => 'menu_main_footer',
						'container'       => '',
						'menu_class'      => 'footer-menu__item',
						'menu_id'         => '',
						'walker'          => new footer_Menu_Walker(),
						'items_wrap'      => '%3$s',
					]
				);
				?>
			</ul>
			<div class="footer__info">
				<div class="footer__info-block">
					<?php if (!empty(get_field("nomer_telefona", "option"))) { ?>
						<a href="tel:<?php echo (get_field("nomer_telefona", "option")); ?>" class="footer__link text text_lh150 text_textUp text_dark text_mini text_fw500"><?php echo preg_replace("/(\\d{1})(\\d{3}|\\d{4})(\\d{3}|\\d{4})(\\d{2})(\\d{2})$/i", "+7 ($2) $3-$4-$5 $6", get_field('nomer_telefona', "option")); ?>
							<span>
								<svg class="contact__before">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#phone"></use>
								</svg>
							</span></a>
					<?php	} ?>
					<?php
					if (!empty(get_field("pochta", "option"))) { ?>
						<a href="mailto:<?php echo get_field("pochta", "option"); ?>" class="footer__link text text_lh150 text_dark text_mini"><?php echo get_field("pochta", "option"); ?>
							<span>
								<svg class="contact__before">
									<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#mesege-footer"></use>
								</svg>
							</span>
						</a>
					<?php } ?>
				</div>
				<a href="https://abeta.ru/" target="_blank" class="text text_lh150 text_dark text_mini ">Разработка сайта <img src="<?php echo get_template_directory_uri(); ?>/assets/images/abeta.svg" alt="abeta" class="abeta"></a>
			</div>
		</div>
	</div>
	<div class="modal">
		<div class="container">
			<div class="modal__box">
				<div class="modal__block">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Plus.svg" alt="moda-crest" class="modal__crest">
					<form class="form" action="">
						<h2 class="text text__title-mini text_fw500 " style=" width: 100%; ">Форма обратной связи</h2>
						<div class="form__block">
							<input name="" type="text" class="form__input form__input_pf" placeholder="Ваше имя">
						</div>

						<div class="form__block form__block_50">
							<input name="" type="text" class="form__input form__input_pf " placeholder="Телефон">
						</div>
						<div class="form__block form__block_50">
							<input name="" type="email" class="form__input form__input_pf" placeholder="Электронная почта">
						</div>
						<div class="form__block">
							<textarea type="text" class="form__input form__input_textarea " placeholder="Текст сообщения"></textarea>
						</div>

						<div class="form__checkbox-block">
							<input name="" type="checkbox" class="form__checkbox" id="checkbox">
							<label class="form__checkbox-text" for="checkbox"><span class="">Согласен на обработку персональных
									даных в соттветсвии с <a href=" #" class="form__checkbox-link">политикой конфиденциальности</a>
								</span></label>
						</div>

						<button class="button-contact">Оставить заявку</button>
						<div class="response text text_white text_tac text_mid "></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>