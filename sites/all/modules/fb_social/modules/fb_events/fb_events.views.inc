<?php
// $Id$

/**
* @file
* fb_events.views.inc
*/

/**
* Implementation of hook_views_data()
*/
function fb_events_views_data() {
  $data = array();

  $data['fb_events']['table']['group'] = t('Sony Connect');

  $data['fb_events']['table']['join'] = array(
      'content_type_date' => array(
      'left_field' => 'nid',
      'field' => 'nid',
      'type' => 'INNER', // all nodes have an author.
    ),
  );

  $data['fb_events']['fb_events'] = array(
      'group' => t('Sony Connect'),
      'field' => array(
          'title' => t('Facebook Events'),
          'help' => t('Provides the fb events rsvp option as a field'),
          'handler' => 'fb_events_handler_field_events'
      )
  );

  return $data;
}

/**
* Implementation of hook_views_handlers() to register all of the basic handlers
* views uses.
*/
function fb_events_views_handlers() {
  return array(
      'info' => array(
          'path' => drupal_get_path('module', 'fb_events') . '/views',
      ),
      'handlers' => array(
          'fb_events_handler_field_events' => array(
              'parent' => 'views_handler_field_node'
          )
      )
  );
}