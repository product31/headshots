<?php


// keep the default separate as they are used by boxes and presets

function _fb_social_like_fb_defaults(){
  return array(
      'send' => 0,
      'layout' => 'button_count', 
      'show_faces' => 0, 
      'width' => 350, 
      'action' => 'like', 
      'font' => 'verdana', 
      'colorscheme' => 'dark' 
  );
}

function _fb_social_like_fb_attrs_form(){
  $form = array();
  
  $form['send'] = array(
    '#type' => 'checkbox',
    '#title' => t('Send button'),
    '#description' => t('Include a Send button with the Like button'),
  );
  
  $form['layout'] = array(
      '#type' => 'select', 
      '#title' => t('Layout style'), 
      '#description' => t('Determines the size and the amount of the social context next to the button'), 
      '#options' => array(
          'standard' => t('standard'), 
          'button_count' => t('button_count'), 
          'box_count' => t('box_count') 
      )
  );
  
  $form['show_faces'] = array(
      '#type' => 'checkbox', 
      '#title' => t('Show faces'), 
      '#description' => t('Show profiles pictures below the button') 
  );
  
  $form['width'] = array(
      '#type' => 'textfield', 
      '#title' => t('Width'), 
      '#description' => t('The width of the plugin in pixel') 
  );
  
  $form['action'] = array(
      '#type' => 'select', 
      '#title' => t('Verb'), 
      '#description' => t('The verb to display in the button'), 
      '#options' => array(
          'like' => t('like'), 
          'recommend' => t('recommend') 
      ) 
  );
  
  $form['font'] = array(
      '#type' => 'select', 
      '#title' => t('Font'), 
      '#description' => t('The font of the plugin'), 
      '#options' => array(
          'arial' => t('arial'), 
          'verdana' => t('verdana') 
      ) 
  );
  
  $form['colorscheme'] = array(
      '#type' => 'select', 
      '#title' => t('Color'), 
      '#description' => t('The color scheme of the plugin'), 
      '#options' => array(
          'dark' => t('dark'), 
          'light' => t('light'), 
          'evil' => t('evil'),
          'lucida grande' => t('lucida grande'),
          'segoe ui' => t('segoe ui'),
          'tahoma' => t('tahoma'),
          'trebuchet ms' => t('trebuchet ms'), 
      ) 
  );
  
  return $form;
}

function _fb_social_like_settings_form($settings){

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


