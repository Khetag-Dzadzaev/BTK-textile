<?php get_header();
/* Template Name: Контакты*/ ?>
<main class="main">
	<section class="section section_single">
		<div class="container">
			<div class="breadcrumb-block">
				<ul class="breadcrumb">
					<li class="breadcrumb__item">
						<a href="#" class="breadcrumb__link">Главная</a>
					</li>
					<li class="breadcrumb__item breadcrumb__item_active">Контакты</li>
				</ul>
			</div>
			<h1 class="text text__title-mid text_drak text_fw700">Контакты</h1>
		</div>
	</section>
	<section class="section section_pt">
		<div class="container">
			<div class="contact">
				<div class="contact__box">
					<div class="contact__blocks">
						<div class="contact__block contact__block_100 contact__block_100-np">
							<div class="contact__block-info">
								<?php if (!empty(get_field("nomer_telefona", "option"))) { ?>
									<a href="tel:<?php echo (get_field("nomer_telefona", "option")); ?>" class="contact__phone text text_big text_dark text_lh120 text_fw600"><?php echo preg_replace("/(\\d{1})(\\d{3}|\\d{4})(\\d{3}|\\d{4})(\\d{2})(\\d{2})$/i", "+7 ($2) $3-$4-$5 $6", get_field('nomer_telefona', "option")); ?><svg class="contact__before">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#phone"></use>
										</svg></a>
								<?php	} ?>
								<?php if (!empty(get_field("whatsapp"))) { ?>
									<a href="<?php echo get_field("whatsapp"); ?>" class="social__link social__link_contact">WhatsApp<svg class="social__svg">
											<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#whats"></use>
										</svg></a>
								<?php	} ?>
							</div>
						</div>
						<?php if (!empty(get_field("pochta", "option"))) { ?>
							<div class="contact__block ">
								<div class="contact__block-info">
									<p class="contact__title text text_mini text_fw500 text_lh120">Электронная почта
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail.svg" class="contact__after contact__after_dark" alt="img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/mail-light.svg" class="contact__after contact__after_light" alt="img">
									</p>

									<a href="mailto:<?php echo get_field("pochta", "option"); ?>" class="contact__info text text_mini text_dark text_lh120 text_fw600"><?php echo get_field("pochta", "option"); ?></a>

								</div>
							</div>
						<?php	} ?>
						<?php if (!empty(get_field("dni")) && !empty(get_field("vremya"))) { ?>
							<div class="contact__block ">
								<div class="contact__block-info">
									<p class="contact__title text text_mini text_fw500 text_lh120">Режим работы <img src="<?php echo get_template_directory_uri(); ?>/assets/images/time.svg" class="contact__after contact__after_dark" alt="img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/time-light.svg" class="contact__after contact__after_light" alt="img">
									</p>
									<span class="contact__info text text_mini text_dark text_lh120 text_fw600"><?php echo get_field("dni"); ?><br>
										<?php echo get_field("vremya") ?></span>
								</div>
							</div>
						<?php	} ?>
						<?php if (!empty(get_field("adres"))) { ?>
							<div class="contact__block contact__block_100 contact__block_100-np">
								<div class="contact__block-info contact__block-info_flex">
									<p class="contact__title_contact-page contact__title text text_mini text_fw500 text_lh120">Адрес <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pin.svg" class="contact__after" alt="img"></p>
									<p class="contact__info text text_mini text_dark text_lh120 text_fw600">
										<?php echo get_field("adres"); ?>
									<p>
								</div>
							</div>
						<?php	} ?>
						<?php if (!empty(get_field("syllka_na_kartochku_organizaczii"))) { ?>
							<div class="contact__block contact__block_100 contact__block_100-np">
								<div class="contact__block-info contact__block-info_flex">
									<p class="contact__title contact__title_contact-page text text_mini text_fw500 text_lh120">Реквизиты
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/list.svg" class="contact__after contact__after_dark" alt="img">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/list-light.svg" class="contact__after contact__after_light" alt="img">
									</p>
									<a href="<?php echo get_field("syllka_na_kartochku_organizaczii"); ?>" target="_blank" class="contact__info text text_mini text_line text_dark text_lh120 text_fw600">Скачать
										карточку
										организации
									</a>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="contact__box">
					<form class="form" action="">
						<h2 class="text text__title-mini text_fw500 " style=" width: 100%; ">Форма обратной связи</h2>
						<div class="form__block form__block_50">
							<input name="" type="text" class="form__input form__input_pf" placeholder="Ваше имя">
						</div>
						<div class="form__block form__block_50">
							<input name="" type="text" class="form__input form__input_pf" placeholder="Название компании">
						</div>
						<div class="form__block form__block_50">
							<input name="" type="text" class="form__input form__input_pf " placeholder="Телефон">
						</div>
						<div class="form__block form__block_50">
							<input name="" type="email" class="form__input form__input_pf" placeholder="Электронная почта">
						</div>
						<div class="form__block">
							<textarea type="text" class="form__input form__input_textarea " placeholder="Дополнительная информация"></textarea>
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
	</section>
</main>
<?php get_footer(); ?>