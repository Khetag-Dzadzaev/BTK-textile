<div class="modal-order">
	<div class="container">
		<div class="modal-order__box">
			<div class="modal-order__block">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/Plus.svg" alt="moda-crest" class="modal-order__crest">
				<form class="form" id="form-order" action="<?php echo get_template_directory_uri(); ?>/php/product.php">
					<p class="text text__title-mini text_fw500 text_gray" style=" width: 100%; ">Форма обратной связи</p>
					<div class="form__block">
						<input name="order-productName" type="hidden" value="<?php the_title(); ?>">
						<p class="text text_lh130 text_mini text_dark">Позиция: <span class="text text_mid text_fw600"><?php the_title(); ?></span></p>
					</div>
					<div class="form__block form__block_50">
						<input name="order-name" type="text" class="form__input form__input_pf" placeholder="Ваше имя">
					</div>
					<div class="form__block form__block_50">
						<input name="order-city" type="text" class="form__input form__input_pf " placeholder="Город">
					</div>
					<div class="form__block form__block_50">
						<input name="order-phone" type="text" class="form__input form__input_pf tel" placeholder="Телефон">
					</div>
					<div class="form__block form__block_50">
						<input name="order-mail" type="email" class="form__input form__input_pf" placeholder="Электронная почта">
					</div>
					<div class="form__block">
						<textarea name="order-text" type="text" class="form__input form__input_textarea " placeholder="Текст сообщения"></textarea>
					</div>

					<div class="form__checkbox-block">
						<input name="order-checkbox" type="checkbox" class="form__checkbox" id="checkbox">
						<label id="order-check" class=" form__checkbox-text" for="checkbox"><span class="">Согласен на обработку персональных
								даных в соответствии с <a href=" #" class="form__checkbox-link">политикой конфиденциальности</a>
							</span></label>
					</div>

					<button class="button-contact">Отправить</button>
					<div class="response text text_white text_tac text_mid response-order"></div>
					<?php wp_nonce_field('modal_nonce_action-product', 'modal_nonce_field-product'); ?>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
	const formOrder = document.querySelector("#form-order");

	var actOrder = formOrder.getAttribute("action");
	formOrder.addEventListener("submit", async function(e) {
		e.preventDefault();
		var formData = new FormData(formOrder);
		const request = await fetch(actOrder, {
			method: "POST",
			body: formData
		});

		const response = await request.json();
		var inputFormOrder = formOrder.querySelectorAll("input");
		inputFormOrder.forEach(element => {
			element.style.border = "1px solid #262626";
		});

		if (request.ok) {
			document.querySelector(".response-order").classList.remove("false");
			document.querySelector(".response-order").classList.add("good");
			document.querySelector(".response-order").innerHTML = "Успешная отправка";
			for (var key in response) {
				if (key == 'order-checkbox') {
					document.querySelector("#order-check").classList.remove("error");
				} else {
					document.querySelector(`input[name=${key}]`).style.border = "1px solid #262626";
				}
			}

		} else {


			switch (request.status) {
				case 422:
					document.querySelector(".response-order").classList.add("false");
					document.querySelector(".response-order").innerHTML = "Заполните обязательные поля";
					for (var key in response) {
						if (key == 'order-checkbox') {
							document.querySelector("#order-check").classList.add("error");
						} else {
							document.querySelector(`input[name=${key}]`).style.border = "1px solid red";
						}
					}

					break;

				default:
					document.querySelector(".response-order").classList.add("false");
					document.querySelector(".response-order").innerHTML = "Что-то пошло не так";
					break;
			}
		}
	})
</script>