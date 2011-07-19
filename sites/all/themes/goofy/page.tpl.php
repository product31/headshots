<?php

/**
 * @file
 *   The page template
 */

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">
  <head>
    <?php print preg_replace('/^</m', '    <', $head . $styles . $scripts) ?>
    <?php if (!empty($favicon)) : ?><link rel="shortcut icon" href="<?php print $favicon ?>" type="image/x-icon" /><?php endif ?>
    <title><?php print $head_title . ' - ' . $site_name ?></title>
    </head>
  <body>
    <table class="goofy" cellspacing="3"><!-- cellspacing kept for IE -->
      <tr>
        <td colspan="<?php print $colspan ?>" class="goofyTopWrapper">
          <table class="goofy goofy2">
            <tr>
              <td id="logoLeft"><!-- left logo cell -->
                <?php if (!empty($logo)): ?><a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a><?php endif ?>
                </td>
              <td id="slogan">
                <?php if (!empty($site_slogan)): print $site_slogan ; ?></td><td>&nbsp;<?php endif ?>
                </td>
              <td id="logoRight"><!--  right logo cell -->
                <?php if (!empty($logo2)): ?><a href="<?php print $front_page ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo2 ?>" alt="<?php print t('Home') ?>" /></a><?php endif ?>
                </td>
              </tr>
            </table><!-- .goofy .goofy2 -->
          <?php if (!empty($linksBar)) : print $linksBar ; endif ?>
          </td><!-- goofyTopWrapper -->
        </tr>
      <tr><!-- row with main content --><?php if ($left): ?>

        <td id="regionLeft"><?php print $left
          ?></td>
        <?php endif ?>

        <td id="regionContent">
          <?php
            /**
             * Goofy peculiar behaviour: only display breadcrumb if a title exists
             */
            if ($title):
              print $breadcrumb . PHP_EOL;
              print "          <h2>$title</h2>\n";
              endif;
            if ($mission):
              print theme('table', NULL, array(array($mission)), array('class' => 'goofyo'));
              endif;
            if ($tabs):
              print $tabs;
              endif;
            print $help;
            print $messages;
            ?>
          <!-- begin main content -->
          <?php print $content ?>
          <!-- end main content -->
          </td><!-- #regionContent -->
        <?php if ($right): ?>
        <td id="regionRight">
          <?php print $right ?>
          </td>
        <?php endif ?>
        </tr><!-- main content row -->
      <tr>
        <td colspan="<?php print $colspan ?>">
          <?php if (!empty($linksBar)) : print $linksBar ; endif ?>
          </td>
        </tr>
      </table>
    <?php if ($footer_message): ?>
    <p id="footer"><?php print $footer_message ?></p><!-- #footer -->
    <?php endif ?>
    <?php print $closure ?>
    </body>
  </html>
