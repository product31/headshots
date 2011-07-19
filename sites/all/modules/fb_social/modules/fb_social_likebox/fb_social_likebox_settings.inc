<?php


function _fb_social_likebox_fb_defaults() {
  return array(
    'href' => '',
    'width' => 300,
    'height' => '',
    'colorscheme' => 'light',
    'show_faces' => 1,
    'border_color' => '',
    'stream' => 1,
    'header' => 1,
  );
}

function _fb_social_likebox_fb_attrs_form() {
  $form = array();

  $form['href'] = array(
    '#type' => 'textfield',
    '#title' => t('Facebook Page URL'),
    '#description' => t('The URL of the Facebook Page for this Like box.'),
  );

  $form['width'] = array(
    '#type' => 'textfield',
    '#title' => t('Width'),
    '#description' => t('The width of the wiget in pixel'),
  );

  $form['height'] = array(
    '#type' => 'textfield',
    '#title' => t('Height'),
    '#description' => t('The height of the wiget in pixel'),
  );
  
  $form['colorscheme'] = array(
    '#type' => 'select',
    '#title' => t('Color'),
    '#description' => t('The color scheme of the plugin'),
    '#options' => array('dark' => t('dark'), 'light' => t('light') )
  );
  
  $form['show_faces'] = array(
    '#type' => 'checkbox',
    '#title' => 'Show faces',
    '#description' => t('Specifies whether or not to display profile photos in the plugin'),
  );

  $form['border_color'] = array(
    '#type' => 'textfield',
    '#title' => t('Border color'),
    '#description' => t('The border color of the plugin '),
  );

  $form['stream'] = array(
    '#type' => 'checkbox',
    '#title' => 'Show stream',
    '#description' => t('Show the profile stream for the public profile'),
  );

  $form['header'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show header'),
    '#description' => t('Show the "find us on facebook" bar at the top. Only shown when either stream or connections are present'),
  );
  
  return $form;
}


function _fb_social_likebox_settings_form($settings) {
  $form = array();
  $form['block'] = array(
    '#type' => 'checkbox',
    '#title' => t('Create a block'),
    '#description' => t('Create a drupal block that contains this plugin.  You have to enable the block manually to show up.'),
    '#default_value' => isset($settings['block']) ? $settings['block'] : 0,
  );
  return $form;
}