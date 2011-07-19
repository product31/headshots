<?php

/**
 * @file
 *   The box template
 */
$img_path = base_path() . path_to_theme() .'/images/';
$webbug = $img_path . 'null.gif';

print theme('table', array($title), array(array($content)), array('class' => 'goofy-box'));