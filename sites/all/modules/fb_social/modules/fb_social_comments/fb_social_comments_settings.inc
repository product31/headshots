<?php

function _fb_social_comments_fb_defaults() {
  return array(
    'numposts' => 10,
    'width' => 550,
    'colorscheme' => 'light',
    'colorscheme' => 0
  );
}

function _fb_social_comments_fb_attrs_form() {
  $form = array();


  $form['numposts'] = array(
    '#type' => 'textfield',
    '#title' => t('Number of posts'),
    '#description' => t('The maximum number of posts to display. You can set numposts to 0 to not display any comments. (Default value is 10.)'),
  );

  $form['width'] = array(
    '#type' => 'textfield',
    '#title' => t('Width'),
    '#description' => t('The width of the Comments Box in pixels. (Default value is 550px.)'),
  );
  
  $form['colorscheme'] = array(
    '#type' => 'select',
    '#title' => t('Color Scheme'),
    '#description' => t('The color scheme of the plugin'),
    '#options' => array(
      'dark' => t('dark'),
      'light' => t('light'),
    ),
  );
  
  
  $form['migrated'] = array(
    '#type' => 'checkbox',
    '#title' => t('Migrate to the new version of facebook comments'),
    '#description' => t('If you are using the original version of the Facebook Comments box, check and the comments box will automatically switch to the new version'),
  );
  
  return $form;
}

function _fb_social_comments_settings_form($settings) {

  $form = array();
  $form['node_types'] = array(
    '#type' => 'fieldset',
    '#title' => t('Content types'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['node_types']['types'] = array(
    '#type' => 'checkboxes',
    '#description' => t('Select types that will use the facebook like plugin'),
    '#default_value' =>  isset($settings['node_types']['types']) ? array_keys(array_filter($settings['node_types']['types'])): array(),
    '#options' => node_get_types('names'),
  );

  $form['opengraph_tags'] = array(
    '#type' => 'checkbox',
    '#title' => t('Output the facebook opengraph tags for the above content types'),
    '#description' => t('This module has limited support for fb opengraph tags. Uncheck if you are using some other modules that better support opengraph protocol'),
    '#default_value' =>  isset($settings['opengraph_tags']) ? $settings['opengraph_tags']: 1,
  );

  $form['plugin_location'] = array(
    '#type' => 'fieldset',
    '#title' => t('plugin location and display'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  $form['plugin_location']['location'] = array(
    '#type' => 'radios',
    '#title' => t('plugin location'),
    '#default_value' =>  isset($settings['plugin_location']['location']) ? $settings['plugin_location']['location']: 0,
    '#options' => array(t('Node links'), t('Node content')),
    '#description' => t('The plugin can be printed in the "links" are of the node or as part of the node content'),
  );

  $form['plugin_location']['display_teasers'] = array(
    '#type' => 'checkbox',
    '#title' => t('Show on teasers'),
    '#default_value' =>  isset($settings['plugin_location']['display_teasers']) ? $settings['plugin_location']['display_teasers']: 1,
    '#description' => t('Should the plugin be displayed on teasers?'),
  );
  return $form;
}


