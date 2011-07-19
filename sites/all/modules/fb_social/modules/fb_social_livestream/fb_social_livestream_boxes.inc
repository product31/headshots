<?php

class fb_social_livestream_box extends fb_social_boxes_default {
  
  public $fb_plugin_name;

  protected function __construct(){
    parent::__construct();
    $this->fb_plugin_name = 'livestream';
  }

  /**
   * Implementation of boxes_content::options_defaults().
   */
  public function options_defaults(){
    return fb_social_attrs_defaults('livestream');
  }

  /**
   * Implementation of boxes_content::options_form().
   */
  public function options_form(){
    $form = fb_social_attrs_form('livestream');
    
    foreach ( $form as $key => &$el ) {
      $el['#default_value'] = $this->options[$key];
    }
    return parent::options_form() + $form;
  }

  /**
   * Implementation of boxes_content::render().
   */
  public function render(){
    $block = parent::render();
    $block['content'] = theme('fb_social_box', $this);
    return $block;
  }
}