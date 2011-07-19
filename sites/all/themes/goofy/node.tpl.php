<?php

/**
 * @file
 *   The node template.
 */

$img_path = base_path() . path_to_theme() . '/images/';
$webbug = $img_path . 'null.gif';

$subleft = theme_get_setting("toggle_node_info_$node->type") 
  ? t("Submitted by !user on !date", array
    (
    "!user" => theme('username', $node), 
    "!date" => format_date($node->created, "large"),
    )) 
  : '';

if (module_exists("taxonomy")) {
  $terms = taxonomy_link("taxonomy terms", $node);
  $subright = theme("links", $terms);
  }
else {
  $subright = '';
  }

$body = '';

if (theme_get_setting('toggle_node_user_picture') && $picture = theme('user_picture', $node)) {
  $body .= $picture;
  }

/*
 * Replaced by $content
if ($teaser && $node->teaser) {
  $body .= $node->teaser;
  }
else {
  $body .= $node->body;
  }
*/

if ($node->links) {
  $content .= "<hr /><div style=\"text-align: right;\">[ " . theme("links", $node->links) . " ]</div>";
  }

?>
<!-- node: "<?php print $title ?>" -->
<?php
$class = $sticky ? 'goofy-node sticky' : 'goofy-node';
$title = $teaser 
  ? ('<a href="' . $node_url . '" title="' . $title . '">' . $title . '</a>') 
  : $title;

$header = array(array
  (
  'colspan' => 2,
  'data'    => $title,
  ));

$rows = array();
$rows[] = array($subleft, $subright);
$rows[] = array(array
  (
  'colspan' => 2,
  'data'    => '<hr />' . $content,
  ));
  
print theme('table', $header, $rows, array('class' => $class, 'zebra' => FALSE));
