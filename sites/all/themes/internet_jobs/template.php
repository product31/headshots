<?php
function phptemplate_menu_tree($tree) {
  return '<ul class="menu-tree">'. $tree .'</ul>';
}
function phptemplate_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' active-trail';
  }
  //return '<li class="'. $class .'">'. $link . $menu .'</li>'."\n";
  return '<li>'. $link . $menu .'</li>'."\n";

}
