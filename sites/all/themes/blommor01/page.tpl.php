<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language ?>" xml:lang="<?php print $language->language ?>">

<head>
<title><?php print $head_title ?></title>
<?php print $head ?>
<?php print $styles ?>

<!--[if lt IE 8]>
<link rel="stylesheet" type="text/css" media="all" href="<?php print $base_path . $directory .'/fix-ie.css'; ?>" />
<![endif]-->

<?php print $scripts ?>
</head>

<body class="<?php print $body_classes ?>">
<div id="body-wrapper">
<div id="header" class="clear-block">
<?php if ($logo): ?>
<a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img id="logo" src="<?php print $logo ?>" alt="Logo" /></a>
<?php endif; ?>

<?php if ($site_name): ?>
<h1 id="site-name"><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a></h1>
<?php endif; ?>
<?php if ($site_slogan): ?>
<span id="site-slogan"><?php print $site_slogan ?></span>
<?php endif;?>
</div>

<?php if ($primary_links): ?>
<div id="top-nav" class="clear-block">
<?php print $search_box ?>
<?php print theme('links', $primary_links, array('id' => 'primary')) ?>
</div>
<?php endif; ?>

<?php if ($secondary_links): ?>
<div id="top-nav2" class="clear-block">
<?php print theme('links', $secondary_links, array('id' => 'secondary')) ?>
</div>
<?php endif; ?>

<div id="page-wrapper">
<?php if ($header): ?>
<div id="header-block" class="clear-block"><?php print $header ?></div>
<?php endif; ?>

<div id="content-<?php print $layout ?>">

<div id="main" class="column"><div id="main2">

<?php if ($content_top): ?>
<div id="content-top" class="clear-block"><?php print $content_top ?></div>
<?php endif; ?>

<?php if ($mission): ?>
<div id="mission"><?php print $mission ?></div>
<?php endif; ?>

<?php print $breadcrumb ?>

<?php if ($title): ?>
<h2 class="title<?php print $node ? ' nodetitle' : ''; print $tabs ? ' withtabs' : ''; ?>"><?php print $title ?></h2>
<?php endif; ?>

<?php if ($tabs): ?>
<div id="tabs-wrapper" class="clear-block"><?php print $tabs ?></div>
<?php endif; ?>

<?php print $help ?>
<?php if ($show_messages && $messages): ?>
<?php print $messages ?>
<?php endif; ?>
<div class="clear-block"><?php print $content ?></div>
<?php print $feed_icons ?>

<?php if ($content_bottom): ?>
<div id="content-bottom" class="clear-block"><?php print $content_bottom ?></div>
<?php endif; ?>

</div></div>

<?php if ($left): ?>
<div id="sidebar-left" class="column sidebar">
<?php print $left ?>
</div>
<?php endif; ?>

<?php if ($right): ?>
<div id="sidebar-right" class="column sidebar">
<?php print $right ?>
</div>
<?php endif; ?>

</div>

<!-- footer -->
<div id="footer">
<?php print $footer_message ?>
<!-- Please don't remove -->
<p>Theme design by <a href="http://drupal.org/user/235829" title="Masumi Hirose">Masumi Hirose</a></p>
<!-- /Please don't remove -->
</div></div></div>
<?php print $closure ?>
</body>
</html>
