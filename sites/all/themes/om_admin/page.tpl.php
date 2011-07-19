<?php

/**
 * @file
 *
 * Displays Single page
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
   <!--[if IE  ]><?php print om_get_ie_styles('ie'); ?><![endif]-->
   <!--[if IE 6]><?php print om_get_ie_styles('ie6'); ?><![endif]-->
   <!--[if IE 7]><?php print om_get_ie_styles('ie7'); ?><![endif]-->
   <!--[if IE 8]><?php print om_get_ie_styles('ie8'); ?><![endif]-->
   <!--[if IE 9]><?php print om_get_ie_styles('ie9'); ?><![endif]-->
  <?php print $scripts; ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyled Content in IE */ ?> </script>
</head>
<body class="<?php print $body_classes; ?>">
  <div id="page-top"></div>
  <div id="page-link"><a class="link-top" href="#page-top">Top</a><a class="link-bottom" href="#page-bottom">Bottom</a></div>
  <div class="wrapper-outer">
    <div id="container" class="wrapper">
      <?php print $breadcrumb; ?>
      <div id="container-inner" class="wrapper-inner">
        <?php print om_content_elements($mission, $tabs, $title, $messages, $help) ?>
        <?php print om_region('content', $content, 0); ?>
      </div> <!-- /#container-inner -->
    </div> <!-- /#container -->
  </div> <!-- /.wrapper-outer -->
  <div id="page-bottom"></div>
  <?php print $closure; ?>
</body>
</html>
