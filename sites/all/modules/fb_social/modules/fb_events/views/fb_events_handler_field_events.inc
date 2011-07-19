<?php
// $Id$

/**
* @file
* Views handler fb events widget.
*
*/

/**
* Inherit from views_handler_field_node so we get the eid for free
* @ingroup views_field_handlers
*/
class fb_events_handler_field_events extends views_handler_field_node {
  function construct() {
    parent::construct();
    $this->additional_fields['field_fbeid_value'] = 'field_fbeid_value';

  }
  /**
* query() override to not query this fake field.
*/
  function query() {
    $this->ensure_my_table();
    $this->add_additional_fields();
  }

  /**
* options definitions and their default values
*/
  function option_definition() {
    $options = parent::option_definition();

    $options['fb_events_show_members'] = array('default' => !empty($this->options['fb_events_show_members']) ? $this->options['fb_events_show_members'] : 6);
    $options['fb_events_signup_text'] = array('default' => variable_get('fb_events_signup_text', t('Allow @site to sign me up for events', array('@site' => variable_get('site_name', '')))));

    return $options;
  }

  /**
* the fb events options form
*/
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);


    $widget_options = fb_events_configure();
    foreach ( $widget_options as $key => $value ) {
      $form[$key] = $value;
      $form[$key]['#default_value'] = $this->options[$key];
    }
    // Remove irrelevant controls / settings.
    unset($form['exclude']);
    unset($form['empty']);
    unset($form['empty_zero']);
    unset($form['hide_empty']);
    unset($form['link_to_node']);
    unset($form['alter']);
  }

  /**
* Render the fb events field
*/
  function render($values) {

    global $user;
    if (!empty($this->view->result[0]->field_fbeid_value)) {
      $eid = $this->view->result[0]->field_fbeid_value;

      if($fbuid = fb_events_get_fbu($user->uid)){
        // has this user authorised this app before?
        $is_app_user = fb_events_app_authorized();
      }
    }
    // by now we know the status of the user vis-a-vis fb
    $fbc_status = ($user->uid && $fbuid && $is_app_user) ? FBC_EVENTS_FULL_CONNECT : ($fbuid && $is_app_user ? FBC_EVENTS_NO_UID : ($fbuid ? FBC_EVENTS_NO_FBC : $user->uid ? FBC_EVENTS_USER_NO_FB : FBC_EVENTS_NO_LOGIN));

    $attending = array();
    $event_status = $perm_status = NULL;
    $event_form = array();

    // TODO: add handling for passing a numeric eid that does
    // not correspond to an existing fb event
    if ($eid && is_numeric($eid)) {
      $num_members_to_show = $this->options['fb_events_show_members'];

      if ($num_members_to_show) {
        $members = fb_events_get_members($eid);

        if ($members) {
          $total_rsvp = count($members->data);
          shuffle($members->data);
          $attending = array_slice($members->data, 0, $this->options['fb_events_show_members']);
        }
      }

      if ($fbc_status == FBC_EVENTS_FULL_CONNECT) {
        $my_status = NULL;

        // check whether the user has already authorised the app to RSVP
        // to FB events
        $has_granted_perm = fb_events_allowed_permission();

        if ($has_granted_perm) {
          //$fql = "SELECT rsvp_status FROM event_member WHERE uid = $fbuid AND eid = '$eid'";

          $network = sony_connect_get_network('facebook');
          $token = drupal_http_request('https://graph.facebook.com/oauth/access_token?client_id='.$network['conf']['application_id'].'&client_secret='.$network['conf']['secret_key'].'&grant_type=client_credentials');

          $my_status = json_decode(file_get_contents('https://api.facebook.com/method/fql.query?'.$token->data.'&query=SELECT%20rsvp_status%20FROM%20event_member%20WHERE%20uid%20=%20'.$fbuid.'%20AND%20eid%20=%20'.$eid.'&format=json'));

          //fb is currently returning 'unsure' from fql query, but wants 'maybe' for graph api status change
          if($my_status[0]['rsvp_status'] == 'unsure'){
            $status = 'maybe';
          }else{
            $status = $my_status[0]['rsvp_status'];
          }


          $event_form = drupal_get_form('fb_events_signup_form', $eid, $fbuid, $status);
        }
      }
      // send everything to our tpl file
      $output = theme('fb_events_main', $eid, $fbuid, $fbc_status, $attending, $my_status, $has_granted_perm, $event_form, $signup_text, $total_rsvp);

    }

    return $output;
  }
}