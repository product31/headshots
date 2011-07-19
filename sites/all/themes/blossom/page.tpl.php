<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">
<head>

  <title><?php print $head_title ?></title>
  <?php print $head ?>
  <?php print $styles ?>
  <?php print $scripts ?>
  <script type="text/javascript"><?php /* Needed to avoid Flash of Unstyle Content in IE */ ?> </script>
</head>

<body>
<div id="container">

<!-- Header -->
<div id="header">
    <div id="logo">
        <?php if ($logo) { ?><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" /></a><?php } ?>
    </div>
    <div id="header_left">
	    <h1><?php if ($site_name) { ?><a href="<?php print $base_path ?>" title="<?php print t('Home') ?>"><?php print $site_name ?></a><?php } ?></h1>
    	<h2><?php if ($site_slogan) { ?><?php print $site_slogan ?><?php } ?></h2>
    </div>

	<div id="header_right">
		<?php print flower_user_bar() ?>
	</div>
  
</div>

<!-- End of Header -->
<div class="main-container">
    <div id="left">
        <div id="navcontainer">
            <?php if (count($primary_links)) : ?>
            <h4><span class="menu_first_letter">Navigation</span></h4>
                <?php print theme('links', $primary_links, array('class' => 'links primary-links')) ?>
            <?php endif; ?>
        </div>
        <div class="otherm">
            <?php if (isset($secondary_links)) : ?>
                <?php print theme('links', $secondary_links, array('class' => 'links secondary-links')) ?>
            <?php endif; ?>
    
            <?php if ($left) { ?>
                <?php print $left ?>
            <?php } ?>
        </div>
    </div>

	<div id="right">
 		<?php if ($mission) { ?><?php print $mission ?><?php } ?>
        <?php print $breadcrumb ?>
        <h1 class="title"><?php print $title ?></h1>
        <?php print $tabs ?>
        <?php print $help ?>
        <?php print $messages ?>
        <?php print $content; ?>
        <?php print $feed_icons; ?>
  		<div id="footer">
        	Designed by Dieter Schneider of <a href="http://www.csstemplateheaven.com" >www.csstemplateheaven.com</a><br />Developed by <a href="http://www.cmswebsiteservices.com"> CMS Website Services</a> <?php print $footer_message ?>
        </div>
	</div>
</div>
</div>




  

<?php print $closure ?>
</body>
</html>
