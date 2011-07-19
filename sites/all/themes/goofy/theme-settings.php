<?php

/**
 * @file
 *   Implement the theme_settings() function.
 *   
 * @param $saved_settings
 *   array An array of saved settings for this theme.
 * @return
 *   array A form array.
 */
function phptemplate_settings($saved_settings)
  {
  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the template.php file.
   */
  $defaults = array
    (
    'logo2' => 'drupal.png',
    );
    
  $form = array();
  
  $settings = array_merge($defaults, $saved_settings);
  
  $form['logo2'] = array
    (
    '#type'           => 'textfield',
    '#title'          => t('Right-side logo'),
    '#default_value'  => $settings['logo2'],
    );
  return $form;
  }