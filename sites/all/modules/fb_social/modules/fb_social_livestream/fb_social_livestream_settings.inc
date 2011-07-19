<?php


// keep the default separate as they are used by boxes and presets

function _fb_social_livestream_fb_defaults(){
  return array(
      'event_app_id' => variable_get('fb_social_appid', ''),
      'width' => 400, 
      'height' => 500, 
      'xid' => '', 
      'via_url' => '' 
  );
}

function _fb_social_livestream_fb_attrs_form(){
  $form = array();
  
  $form['app_id'] = array(
      '#type' => 'textfield', 
      '#title' => t('App ID'), 
      '#description' => t('Your facebook application ID or API key') 
  );
  
  $form['width'] = array(
      '#type' => 'textfield', 
      '#title' => t('Width'), 
      '#description' => t('The width of the plugin in pixel') 
  );
  
  $form['height'] = array(
      '#type' => 'textfield', 
      '#title' => t('Height'), 
      '#description' => t('The height of the plugin in pixel') 
  );
  
  $form['xid'] = array(
      '#type' => 'textfield', 
      '#title' => t('XID'), 
      '#description' => t('If you have multiple live stream boxes on the same page, specify a unique \'xid\' for each') 
  );

  $form['via_url'] = array(
      '#type' => 'textfield', 
      '#title' => t('Via Attribution URL'), 
      '#description' => t('The URL that users are redirected to when they click on your app name on a status (if not specified, your Connect URL is used)') 
  );
  
  $form['always_post_to_friends'] = array(
      '#type' => 'checkbox', 
      '#title' => t('Always post to friends'), 
      '#description' => t('If set, all user posts will always go to their profile. This option should only be used when users&#039; posts are likely to make sense outside of the context of the event.') 
  );
  
  return $form;

}

function _fb_social_livestream_settings_form($settings){
  $form = array();
  
  return $form;
}


