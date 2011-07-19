<?php

$plugin = array(
    'schema' => 'fb_social_preset', 
    'menu' => array(
        'menu item' => 'fb_social_presets' 
    ), 
    'title' => t('Facebook social presets'), 
    
    'title singular' => t('preset'), 
    'title plural' => t('presets'), 
    'title singular proper' => t('Preset'), 
    'title plural proper' => t('Presets') 
);

/**
 * submit handler
 */
function fb_social_ctools_export_ui_form_submit(&$form, &$form_state){
  //dpm($form_state);
  $type = $form_state['values']['fb_plugin_type']['plugin_type'];
  $form_state['item']->plugin_type = $type;
  $form_state['item']->fb_attrs = $form_state['values']['fb_social_settings_' . $type]['fb_attrs_' . $type];
  $form_state['item']->settings = $form_state['values']['fb_social_settings_' . $type]['settings_' . $type];
}

/**
 * The preset add/edit form
 */
function fb_social_ctools_export_ui_form(&$form, &$form_state){
  
  ctools_include('dependent');
  $export = $form_state['item'];
  
  $form['description'] = array(
      '#title' => t('description'), 
      '#type' => 'textfield', 
      '#default_value' => ! empty($export->description) ? $export->description : '', 
      '#description' => t('Description for this preset.') 
  );
  
  $all_plugins = module_invoke_all('fb_social_plugins_info');
  $options = array();
  foreach ( $all_plugins as $plugin ) {
    $options[$plugin['name']] = $plugin['description'];
  }
  
  $form['fb_plugin_type'] = array(
      '#type' => 'fieldset', 
      '#title' => t('Facebook plugin type'),
      '#collapsible' => TRUE, 
      '#tree' => TRUE 
  );
  
  $form['fb_plugin_type']['plugin_type'] = array(
      '#title' => t('type'), 
      '#type' => 'radios', 
      '#options' => $options, 
      '#default_value' => ! empty($export->plugin_type) ? $export->plugin_type : 'like', 
      '#description' => t('Description for this preset.') 
  );
  
  // output all form settings here but show/hide using
  // ctools 'dependent' plugin
  
  foreach ( $all_plugins as $type => $plugin ) {
    
    // fb settings
    $id = 'fb_social-settings-' . $type;
    $wrapper_id = $id . '-wrapper';
    $form['fb_social_settings_' . $type] = array(
        '#type' => 'fieldset', 
        '#title' => t('%description  - settings', array(
            '%description' => $plugin['description'] 
        )), 
        '#input' => TRUE, 
        '#process' => array(
            'ctools_dependent_process' 
        ), 
        '#dependency' => array(
            'radio:fb_plugin_type[plugin_type]' => array(
                $type 
            ) 
        ), 
        '#id' => $id, 
        '#prefix' => '<div id="' . $wrapper_id . '">', 
        '#suffix' => '</div>', 
        '#collapsible' => TRUE, 
        '#tree' => TRUE 
    );
    
    // facebook attrs
    $form['fb_social_settings_' . $type]['fb_attrs_' . $type] = array(
        '#type' => 'fieldset', 
        '#collapsible' => TRUE, 
        '#title' => 'Fb plugin attributes' 
    );
    
    $plugin['options_form'] = fb_social_attrs_form($type); // rename options_form to attrs_form
    $plugin['defaults'] = fb_social_attrs_defaults($type);
    
    foreach ( $plugin['options_form'] as $k => $v ) {
      $form['fb_social_settings_' . $type]['fb_attrs_' . $type][$k] = $v;
      $form['fb_social_settings_' . $type]['fb_attrs_' . $type][$k]['#default_value'] = ! empty($export->fb_attrs[$k]) ? $export->fb_attrs[$k] : $plugin['defaults'][$k];
    }
    
    // drupal settings
    $form['fb_social_settings_' . $type]['settings_' . $type] = array(
        '#type' => 'fieldset', 
        '#title' => 'Drupal settings',
        '#collapsible' => TRUE, 
    );
    
    $fb_attrs_form = fb_social_settings_form($type, $export->settings);
    
    foreach ( $fb_attrs_form as $k => $v ) {
      $form['fb_social_settings_' . $type]['settings_' . $type][$k] = $v;
    }
    
    $form['fb_social_settings_' . $type]['settings_' . $type] += _fb_social_ctools_export_ui_create_block_form($export);

  }
}

function _fb_social_ctools_export_ui_create_block_form($export){
  $form = array();
  $form['block'] = array(
      '#type' => 'checkbox', 
      '#title' => t('Create a block'), 
      '#description' => t('Create a drupal block that contains this plugin.  You have to enable the block manually to show up.'), 
      
      '#default_value' => isset($export->settings['block']) ? $export->settings['block'] : 0 
  );
  return $form;
}

