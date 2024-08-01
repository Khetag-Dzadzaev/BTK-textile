<?php global $god;
global $qo;
$kategori = get_terms("tip_odezhdi");
?>
<?php if (!empty($kategori)) { ?>
	<div class="archive__taxsanomi">
		<?php foreach ($kategori as  $value) {
			$kategori_link = get_term_link($value->{'term_id'}, 'tip_odezhdi');
		?>
			<a href="<?php echo $kategori_link; ?>" class="archive__taxsanomi-item  text text_nano text_fw500 text_lh160 text_textUp"><?php echo $value->{'name'} ?><span>
					<svg class="">
						<use xlink:href="<?php echo get_template_directory_uri(); ?>/assets/images/sprite.svg#arrow-link"></use>
					</svg>
				</span></a>
		<?php } ?>
	</div>
<?php	} ?>
<form action="<?php if (isset($god)) { ?>
									/tip_odezhdi/<?php echo $qo->slug ?>
						<?php	} else { ?>/finished-product/<?php } ?>" method="GET" class="archive__filter-bottom">
	<div class="archive__filter-block">
		<div class="archive__filter-box">
			<p class="archive__filter-title text text_mid text_fw600 text_lh150 text_textUp">Свойства</p>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="one" <?php if (!empty($_GET["svoistva"]) && in_array("one", $_GET["svoistva"]))  echo "checked";
																															?>>
				<span>Один</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="svoistva[]" value="two" <?php if (!empty($_GET["svoistva"]) && in_array("two", $_GET["svoistva"]))  echo "checked";
																															?>>
				<span>Два</span>
			</label>
		</div>
		<div class="archive__filter-box">
			<p class="archive__filter-title text text_mid text_fw600 text_lh150 text_textUp">Ткань</p>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="pereplet[]" value="one" <?php if (!empty($_GET["pereplet"]) && in_array("one", $_GET["pereplet"]))  echo "checked";
																															?>>
				<span>Один</span>
			</label>
			<label class="archive__filter-checkbox text text_lh150 text_mini">
				<input type="checkbox" name="pereplet[]" value="two" <?php if (!empty($_GET["pereplet"]) && in_array("two", $_GET["pereplet"]))  echo "checked";
																															?>>
				<span>Два</span>
			</label>

		</div>
		<div class="archive__filter-box">
			<p class="archive__filter-title text text_mid text_fw600 text_lh150 text_textUp">Цена</p>
			<div class="archive__calc">
				<input type="hidden" id="Cenamount-input" name="Cenamount-input">
				<div class="min-max Cenmin-max_1"><?php echo get_field("minimalnoe_znacheni_plotnosti", "option") ?></div>
				<div class="min-max Cenmin-max_2"><?php echo get_field("maksimalnoe_znachenie_plotnosti", "option") ?></div>
				<div class="output text text_mini text_fw500 text_lh150" id="CenAmount">
					<?php if (!empty($_GET["Cenamount-input"])) {
						$args['meta_query'] = array('relation' => 'OR');
						if (strpos($_GET["Cenamount-input"], '-')) {
							$price_arr = explode('-', $_GET["Cenamount-input"]);
							echo ('от <strong><span class="Cenamount-dufult1">' . $price_arr[0] . '</span><span class="measurement">₽ / м<span>2</span></span></strong> - до <strong><span class="Cenamount-dufult2">' . $price_arr[1] . '</span><span class="measurement">₽ / м<span>2</span></span></strong>');
						}
					} else { ?>
						от <strong><span class="Cenamount-dufult1"><?php echo get_field("minimalnoe_znacheni_plotnosti", "option") ?></span><span class="measurement">₽ / м<span>2</span></span></strong> - до
						<strong><span class="Cenamount-dufult2"><?php echo get_field("maksimalnoe_znachenie_plotnosti", "option") ?></span><span class="measurement">₽ / м<span>2</span></span></strong>
					<?php } ?>
				</div>
				<div id="CenSlider"></div>
			</div>
		</div>
	</div>
	<div class="archive__filter-block">
		<button class="archive__button">Показать</button>
	</div>
</form>