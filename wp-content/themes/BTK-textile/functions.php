<?php

get_template_part('functions-default');
get_template_part('functions-styles');
get_template_part('functions-menu');


add_action('after_setup_theme', 'add_features');
function add_features()
{
  add_theme_support('custom-logo', [
    'height'      => "auto",
    'width'       => "auto",
    'flex-width'  => false,
    'flex-height' => false,
    'header-text' => '',
    'class'       => 'logo'
  ]);
}
