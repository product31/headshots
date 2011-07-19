<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>">

  <head>
    <title><?php print $head_title ?></title>
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <?php print $head ?>
    <?php print $styles ?>
    <?php print $scripts ?>
    <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
  </head>

<body>

  <div id="header">
    <div id="logo">
      <?php if ($site_name) { ?><div style="float: left;"><h1 class='site-name'><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a><?php } ?></h1></div> 
      <?php if ($site_slogan) { ?><p class="slogan"><b><?php print $site_slogan ?></b></p><?php } ?>	 
    </div>
    <div id="hmenu">
      <?php if (isset($primary_links)) : ?>
        <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
      <?php endif; ?>
    </div>
  </div>

  <div class="content">


    <div id="articles">
      <div id="left">
        <?php print $help ?>
        <?php print $messages ?>
        <?php if ($title) { ?><h1 class="title"><?php print $title ?></h1><?php } ?>
        <div class="tabs"><?php print $tabs ?></div>
        <?php print $content; ?>
      </div>
      <div id="right">
        <?php print $right ?>
        <?php if ($left != ""): ?>
          <?php print $left ?> <!-- print left sidebar if any blocks enabled -->
        <?php endif; ?> 
      </div>
      <div id="links">
        <?php if ($mission) { ?><div id="mission"><?php print $mission ?></div><?php } ?>
      </div>
      <div id="whiteline">
      </div>
      <div id="footer">
        <p><?php print $footer_message ?></p>
      </div>
      <?php print $closure ?>

    </div>

  </div>

</body>
</html>
