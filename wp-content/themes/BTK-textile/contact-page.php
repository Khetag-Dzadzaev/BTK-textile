<?php get_header();
/* Template Name: Контакты*/ ?>
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
			<div class="contact">
				<div class="contact__box contact__box_carts">
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
					<form class="form" id="form-contact" action="<?php echo get_template_directory_uri(); ?>/php/contact.php">
						<h2 class="text text__title-mini text_fw500 text_gray" style=" width: 100%; ">Форма обратной связи</h2>
						<div class="form__block form__block_50">
							<input name="contact-name" type="text" class="form__input form__input_pf" placeholder="Ваше имя">
						</div>
						<div class="form__block form__block_50">
							<input name="contact-city" type="text" class="form__input form__input_pf" placeholder="Город или Область">
						</div>
						<div class="form__block form__block_50">
							<input name="contact-phone" type="text" class="form__input form__input_pf tel" placeholder="Телефон">
						</div>
						<div class="form__block form__block_50">
							<input name="contact-mail" type="email" class="form__input form__input_pf" placeholder="Электронная почта">
						</div>
						<div class="form__block">
							<textarea name="contact-text" type="text" class="form__input form__input_textarea " placeholder="Дополнительная информация"></textarea>
						</div>

						<div class="form__checkbox-block">
							<input name="contact-checkbox" type="checkbox" class="form__checkbox" id="checkbox">
							<label id="contact-check" class=" form__checkbox-text" for="checkbox"><span class="">Согласен на обработку персональных
									даных в соответствии с <a href=" #" class="form__checkbox-link">политикой конфиденциальности</a>
								</span></label>
						</div>

						<button class="button-contact">Отправить сообщение</button>
						<div class="response text text_white text_tac text_mid response-contact"></div>
						<?php wp_nonce_field('modal_nonce_action-contact', 'modal_nonce_field-contact'); ?>
					</form>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>
<script>
	const formContact = document.querySelector("#form-contact");

	var actContact = formContact.getAttribute("action");
	formContact.addEventListener("submit", async function(e) {
		e.preventDefault();
		var formData = new FormData(formContact);
		const request = await fetch(actContact, {
			method: "POST",
			body: formData
		});

		const response = await request.json();
		var inputFormContact = formContact.querySelectorAll("input");
		inputFormContact.forEach(element => {
			element.style.border = "1px solid #262626";
		});

		if (request.ok) {
			document.querySelector(".response-contact").classList.remove("false");
			document.querySelector(".response-contact").classList.add("good");
			document.querySelector(".response-contact").innerHTML = "Успешная отправка";
			for (var key in response) {
				if (key == 'contact-checkbox') {
					document.querySelector("#contact-check").classList.remove("error");
				} else {
					document.querySelector(`input[name=${key}]`).style.border = "1px solid #262626";
				}
			}

		} else {


			switch (request.status) {
				case 422:
					document.querySelector(".response-contact").classList.add("false");
					document.querySelector(".response-contact").innerHTML = "Заполните обязательные поля";
					for (var key in response) {
						if (key == 'contact-checkbox') {
							document.querySelector("#contact-check").classList.add("error");
						} else {
							document.querySelector(`input[name=${key}]`).style.border = "1px solid red";
						}
					}

					break;

				default:
					document.querySelector(".response-contact").classList.add("false");
					document.querySelector(".response-contact").innerHTML = "Что-то пошло не так";
					break;
			}
		}
	})
</script>