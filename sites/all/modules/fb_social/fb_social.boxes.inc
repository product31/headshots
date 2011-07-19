<?php

abstract class fb_social_boxes_default extends boxes_box {

  /**
   * Implementation of boxes_content::options_defaults().
   */
  public function options_defaults() {
  }

  /**
   * Implementation of boxes_content::options_form().
   */
  public function options_form(){
    return array(
        '#type' => 'fieldset', 
        '#title' => t('Facebook plugin attributes'), 
        '#collapsible' => TRUE, 
    );
  }

  /**
   * Implementation of boxes_content::render().
   */
  public function render() {
    $title = isset($this->title) ? check_plain($this->title) : NULL;
    $block['title'] = $title;
    $block['subject'] = $title;
    $block['delta'] = $this->delta;
    //$block['content'] = theme_fb_social_box($this);
    return $block;
  }
}