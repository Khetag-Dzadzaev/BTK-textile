<?php global $god;
global $qo;
?>
<form action="<?php if (isset($god)) { ?>
									/kategorii/<?php echo $qo->slug ?>
						<?php	} else { ?>
	/catalog-tkani/
							<?php } ?>" method="GET" class="archive__filter-bottom <?php if (isset($god)) {
																																				echo ("archive__filter-bottom_mt0");
																																			} ?>">
	<div class="archive__filter-block">
		<div class="archive__filter-box">
			<p class="archive__filter-title text text_mid text_fw600 text_lh150 text_textUp">Свойства</p>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="100pe" <?php if (!empty($_GET["svoistva"]) && in_array("100pe", $_GET["svoistva"]))  echo "checked";
																																?>>
				<span>100 ПЭ</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="100hl" <?php if (!empty($_GET["svoistva"]) && in_array("100hl", $_GET["svoistva"]))  echo "checked";
																																?>>
				<span>100 Хл</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="100pa" <?php if (!empty($_GET["svoistva"]) && in_array("100pa", $_GET["svoistva"]))  echo "checked";
																																?>>
				<span>100 ПА</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="h<50" <?php if (!empty($_GET["svoistva"]) && in_array("h<50", $_GET["svoistva"]))  echo "checked";
																															?>>
				<span>Хлопок менее 50%</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="h>50" <?php if (!empty($_GET["svoistva"]) && in_array("h>50", $_GET["svoistva"]))  echo "checked";
																															?>>
				<span>Хлопок более 50%</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="h50pe50" <?php if (!empty($_GET["svoistva"]) && in_array("h50pe50", $_GET["svoistva"]))  echo "checked";
																																	?>>
				<span>50 Хл/50 Пэ</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="HP" <?php if (!empty($_GET["svoistva"]) && in_array("HP", $_GET["svoistva"]))  echo "checked";
																														?>>
				<span>Хлопок с полиамидом</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="HA" <?php if (!empty($_GET["svoistva"]) && in_array("HA", $_GET["svoistva"]))  echo "checked";
																														?>>
				<span>Хлопок с антистатикой</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="HE" <?php if (!empty($_GET["svoistva"]) && in_array("HE", $_GET["svoistva"]))  echo "checked";
																														?>>
				<span>Хлопок с эластаном</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="P" <?php if (!empty($_GET["svoistva"]) && in_array("P", $_GET["svoistva"]))  echo "checked";
																														?>>
				<span>Поливискоза</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="PosEl" <?php if (!empty($_GET["svoistva"]) && in_array("PosEl", $_GET["svoistva"]))  echo "checked";
																																?>>
				<span>Полиэстер с эластаном</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="OH" <?php if (!empty($_GET["svoistva"]) && in_array("OH", $_GET["svoistva"]))  echo "checked";
																														?>>
				<span>Огнестойкий хлопок</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="A" <?php if (!empty($_GET["svoistva"]) && in_array("A", $_GET["svoistva"]))  echo "checked";
																														?>>
				<span>Арамиды</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="OP" <?php if (!empty($_GET["svoistva"]) && in_array("OP", $_GET["svoistva"]))  echo "checked";
																														?>>
				<span>Огнестойкий полиэстер</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="MO" <?php if (!empty($_GET["svoistva"]) && in_array("MO", $_GET["svoistva"]))  echo "checked";
																														?>>
				<span>Модакрил огнейстойкий</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="OV" <?php if (!empty($_GET["svoistva"]) && in_array("OV", $_GET["svoistva"]))  echo "checked";
																														?>>
				<span>Огнестойкая вискоза</span>
			</label>
		</div>
		<div class="archive__filter-box">
			<p class="archive__filter-title text text_mid text_fw600 text_lh150 text_textUp">Переплетение</p>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="pereplet[]" value="Pol" <?php if (!empty($_GET["pereplet"]) && in_array("Pol", $_GET["pereplet"]))  echo "checked";
																															?>>
				<span>Полотняное</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="pereplet[]" value="Saj" <?php if (!empty($_GET["pereplet"]) && in_array("Saj", $_GET["pereplet"]))  echo "checked";
																															?>>
				<span>Саржа</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="pereplet[]" value="Rip" <?php if (!empty($_GET["pereplet"]) && in_array("Rip", $_GET["pereplet"]))  echo "checked";
																															?>>
				<span>Рип-стоп</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="pereplet[]" value="Kylinar" <?php if (!empty($_GET["pereplet"]) && in_array("Kylinar", $_GET["pereplet"]))  echo "checked";
																																	?>>
				<span>Кулирная гладь</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="pereplet[]" value="Pike" <?php if (!empty($_GET["pereplet"]) && in_array("Pike", $_GET["pereplet"]))  echo "checked";
																															?>>
				<span>Пике</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="pereplet[]" value="1plush" <?php if (!empty($_GET["pereplet"]) && in_array("1plush", $_GET["pereplet"]))  echo "checked";
																																?>>
				<span>1-сторонний плюш</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="pereplet[]" value="2plush" <?php if (!empty($_GET["pereplet"]) && in_array("2plush", $_GET["pereplet"]))  echo "checked";
																																?>>
				<span>2-сторонний плюш</span>
			</label>
		</div>
		<div class="archive__filter-box">
			<p class="archive__filter-title text text_mid text_fw600 text_lh150 text_textUp">плотность</p>
			<div class="archive__calc">
				<input type="hidden" id="amount-input" name="amount-input">
				<div class="min-max min-max_1"><?php echo get_field("minimalnoe_znacheni_plotnosti", "option") ?></div>
				<div class="min-max min-max_2"><?php echo get_field("maksimalnoe_znachenie_plotnosti", "option") ?></div>
				<div class="output text text_mini text_fw500 text_lh150" id="amount">
					<?php if (!empty($_GET["amount-input"])) {
						$args['meta_query'] = array('relation' => 'OR');
						if (strpos($_GET["amount-input"], '-')) {
							$price_arr = explode('-', $_GET["amount-input"]);
							echo ('от <strong><span class="amount-dufult1">' . $price_arr[0] . '</span>г/м2</strong> - до <strong><span class="amount-dufult2">' . $price_arr[1] . '</span>г/м2</strong>');
						}
					} else { ?>
						от <strong><span class="amount-dufult1"><?php echo get_field("minimalnoe_znacheni_plotnosti", "option") ?></span>г/м2</strong> - до
						<strong><span class="amount-dufult2"><?php echo get_field("maksimalnoe_znachenie_plotnosti", "option") ?></span>г/м2</strong>
					<?php } ?>

				</div>
				<div id="slider"></div>
			</div>
		</div>
	</div>
	<div class="archive__filter-block">
		<button class="archive__button">Показать</button>
	</div>
</form>