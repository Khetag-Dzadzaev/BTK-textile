<?php
add_action('after_setup_theme', 'nav_menus');
function nav_menus()
{
	add_image_size('blog-item', 370, 225, true);
	add_image_size('portfolio', 370, 464, array('left', 'top'));

	register_nav_menus(
		array(
			'menu_main_header' => 'Меню в хедер',
			'menu_main_footer' => 'Меню футер',
		)
	);
}



class footer_Menu_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		if ($depth == 0) {
			$output .= '<li class="footer-menu__item"><a href="' . $item->url . '" class = "footer-menu__link text text_lh171 text_textUp" >' . $item->title . '<span>
							<svg class="contact__before">
								<use xlink:href="' . get_template_directory_uri() . '/assets/images/sprite.svg#arrow-link"></use>
							</svg>
						</span></a>';
		}
	}
}

class main_nav_menu_Walker extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{
		if ($depth == 0) {
			if ($args->has_children && $item->current) {
				$output .= '<li class="menu__item menu__item_parent"><a href="' . $item->url . '" class="menu__link text text_nano text_textUp text_lh160">' . $item->title . '</a>';
			} else if ($args->has_children) {
				$output .= '<li class="menu__item menu__item_parent"><a href="' . $item->url . '" class="menu__link text text_nano text_textUp text_lh160">' . $item->title . '</a>';
			} else {
				$output .= '<li class="menu__item"><a href="' . $item->url . '" class="menu__link text text_nano text_textUp text_lh160">' . $item->title . '</a>';
			}
		}
		if ($depth == 1) {

			$output .= '<li class="menu-child__item"><a href="' . $item->url . '" class="menu-child__link text text_nano text_textUp text_lh160">' . $item->title . '</a>';
		}
	}
	function start_lvl(&$output, $depth = 0, $args = array())
	{
		$output .= '<ul class="menu-child">';
	}

	function end_lvl(&$output, $depth = 0, $args = array())
	{
		$output .= '</ul>';
	}
	function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
	{
		$id_field = $this->db_fields['id'];
		if (is_object($args[0])) {
			$args[0]->has_children = !empty($children_elements[$element->$id_field]);
		}
		return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
	}
}
