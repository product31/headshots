<?php



/**
 * @file
 * Views handler fb like widget.
 *
 * This is a fake field that does not query anything. 
 */

/**
 * Field handler to provie the fb widget
 * Inherit from views_handler_field_node so we get the nid for free
 * @ingroup views_field_handlers
 */
class fb_social_like_handler_field_like extends views_handler_field_node {

  /**
   * query() override to not query this fake field.
   */
  function query(){
    $this->ensure_my_table();
  }

  /**
   * options definitions and their default values
   */
  function option_definition(){
    $options = parent::option_definition();
    
    $presets = fb_social_enabled_presets('like');
    
    $options['fb_social_like_preset'] = array(
        'default' => 'something' 
    );
    
    return $options;
  }

  /**
   * the fb like options form
   */
  function options_form(&$form, &$form_state){
    parent::options_form($form, $form_state);
    
    $dropdown = array();
    $presets = fb_social_enabled_presets('like');
    //dpm($presets);
    foreach ( $presets as $preset ) {
      $name = $preset->name;
      $dropdown[$name] = $name;
    }
    $form['fb_social_like_preset'] = array(
        '#type' => 'select', 
        '#options' => $dropdown, 
        '#title' => 'Select the preset to use', 
    );
    
    // Remove irrelevant controls / settings.
    unset($form['empty']);
    unset($form['empty_zero']);
    unset($form['hide_empty']);
    unset($form['link_to_node']);
    unset($form['alter']);
  }

  /**
   * Render the fb like field
   */
  function render($values){
    
    //dpm($this->options);
    $preset_name = $this->options['fb_social_like_preset'];
    $preset = fb_social_preset_load($preset_name);
    
    $output = theme('fb_social_preset', $preset, array(
        'href' => fb_social_url('node/' . $values->nid) 
    ));
    return $output;
  
  }
}

