<?php
// $Id: box.tpl.php,v 1.1.2.1 2008/02/16 16:40:26 eaton Exp $

/**
 * @file box.tpl.php
 *
 * Theme implementation to display a box.
 *
 * Available variables:
 * - $title: Box title.
 * - $content: Box content.
 *
 * @see template_preprocess()
 */
?>
<?php if ($title): ?>
  <h2><?php print $title ?></h2>
<?php endif; ?>
<?php print $content ?>