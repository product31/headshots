<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?php print $head_title ?></title>
  <?php print $head ?>
  <?php print $styles ?>
  <?php print $scripts ?>
  <!--[if IE 7]>
    <link rel="stylesheet" href="<?php print $base_path . $directory; ?>/css/ie7.css" type="text/css">
  <![endif]-->
  <!--[if IE 6]>
    <link rel="stylesheet" href="<?php print $base_path . $directory; ?>/css/ie6.css" type="text/css">
    <script defer type="text/javascript" src="<?php print $base_path . $directory; ?>/js/pngfix.js"></script>
  <![endif]-->
</head>
<body>
  <!-- leaderboard -->
  <?php if ($leaderboard): ?>
  <div id="leaderboard">
    <?php print $leaderboard; ?>
  </div>
  <?php endif; ?>
  <!-- end leaderboard -->
  <!-- header -->
  <div id="header">
      <?php print $header; ?>
  </div>
  <!-- end header -->
  <!-- custom login links -->
  <div id="custom-login">
    <?php if ($user->uid) : ?>
      <span class="login_text">Welcome, </span><strong><?php print l($user->name,'user/'.$user->uid); ?> |
      <?php print l("logout","logout"); ?> </strong>
    <?php else : ?>
      <strong><?php print l("Login","user/login"); ?> / <?php print l("Create an Account","user/register"); ?></strong>
    <?php endif; ?>
  </div>
  <div id="page-wrapper">
    <!-- header-wrapper -->
    <div id="header-wrapper">
      <!-- logo-name -->
      <div id="logo-name">
        <!-- site logo -->
        <div id="site-logo">
          <?php if ($logo): ?>
            <a href="<?php print $base_path; ?>" title="<?php print t('return to the home page'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('return to the home page'); ?>"/>
            </a>
          <?php endif; ?>
        </div>
        <!-- end site-logo -->
        <!-- site name -->
        <div id="site-name-slogan">
          <div id="site-name">
              <h1><a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>"/><?php print $site_name; ?></a></h1>
          </div>
          <!-- site slogan -->
          <div id="site-slogan">
            <?php print $site_slogan; ?>
          </div>
        </div>
        <!-- end site name -->
      </div>
      <!-- end logo-name -->
      <!-- theme search box -->
      <div id="search-box">
        <?php print $search_box; ?>
      </div>
      <!-- end theme search box -->
    </div>
    <!-- end header-wrapper -->
    <!-- main wrapper -->
    <!-- primary links -->
    <div id="primary">
    <?php if (isset($primary_links)) { ?>
      <div id="nav">  
        <?php print menu_tree('primary-links'); ?>
      </div>
    <?php } ?>
  </div> 
  <!-- end primary links -->

  <div id="main-wrapper-top"></div>
  <div id="main-wrapper">
	<?php if($ad_position_a && $top_data) : ?>
    <div id="banner-top">
      <div id="top-blocks">
        <?php print $top_data; ?>
      </div>
      <div id="ad-position-a">
        <?php print $ad_position_a; ?>
      </div>
      <br class="clear" />
    </div>
	<?php endif; ?>
  	
    <!-- tabs and secondary links -->
    <div class="tabs">
      <div class="secondary">
        <?php print theme('links', $secondary_links); ?>
      </div>
      <?php if ($tabs): ?>
        <?php print $tabs; ?>
      <?php endif; ?>
    </div>
    <!-- end tabs -->
    <!-- breadcrumbs -->
    <?php if ($breadcrumb): ?>
      <div id="breadcrumbs">
        <?php print $breadcrumb; ?>
        <div class="delimit"><?php print '<div class="delimit-1">»</div>' ?></div>
        <div class="bread-title"><?php print $title; ?></div>
      </div><!-- end breadcrumb -->
    <?php endif; ?>
    <!-- messages -->
    <?php if ($messages): ?>
      <div id="help-messages">	
        <div id="messages">
          <?php print $messages; ?>
        </div>
      </div>
    <?php endif; ?>
    <!-- end messages -->
    <!-- section top -->
    <div id="section-top">
      <?php if ($section_top): ?>
        <?php print $section_top; ?>
      <?php endif; ?><!-- endif $section_top -->
    </div>
    <!-- end section top -->
    <?php if ($left): ?>
    <div id="sidebar-left-region">
      <?php print $left; ?>
    </div>
    <?php endif; ?>
    <!-- end sidebar-left-region -->
    <!-- sidebar right -->	
    <?php if ($right): ?>
    <div id="sidebar-right-region">
      <?php print $right ?>
    </div>
    <?php endif; ?>
    <!-- end sidebar right -->
    <!-- content -->
    <div id="content-region-<?php print $layout ?>">
      <!-- content top -->
      <?php if ($content_top): ?>
      <div id="content-top">
        <?php print $content_top; ?>
      </div>
      <?php endif; ?>
      <!-- end content-top -->
      <!-- help -->
      <?php if ($help): ?>
      <div id="help">
        <?php print $help; ?>
      </div>
      <?php endif; ?>
      <!-- end help -->
      <!-- site mission -->
      <?php if ($mission): ?>
      <div id="site-mission">
        <?php print $mission; ?>
      </div>
      <?php endif; ?>
      <!-- end site mission -->
      <!-- title -->
      <h2 class="content-title"><?php print $title; ?></h2>
      <!-- node content -->
      <div class="node-content"><?php print $content; ?></div>
      <!-- content bottom -->
      <?php if ($content_bottom): ?>
      <div id="content-bottom">
        <?php print $content_bottom; ?>
      </div>
      <?php endif; ?>
      <!-- end content-bottom -->
    </div>
    <!-- end content -->
    <!-- section bottom -->
    <div id="section-bottom">
      <?php if ($section_bottom): ?>
        <?php print $section_bottom; ?>
      <?php endif; ?><!-- endif $section_bottom -->
    </div>
    <!-- end section bottom -->
    <div class="clear"></div>
  </div>
  <!-- end main-wrapper -->
  <div id="main-wrapper-bottom"></div>
  <!-- footer-region -->
  <div id="footer-region">
    <!-- feed icons -->
    <div id="feed-icons">
      <?php print $feed_icons; ?>
    </div>
    <!-- end feed icons -->
    <!-- credits -->
    <div id="credits">
      <div class="credit-text">Designed by <a href="http://www.davidfugate.com">David Plutado Fugate</a></div>
    </div>
    <!-- end credits -->
    <!-- footer text -->
    <div id="footer-text">
      <?php print $footer_message; ?>
    </div>
    <!-- end footer-text -->
  </div>
  <!-- end footer-region -->
  <!-- footer ad -->
  <?php if ($footer_ad): ?>
  <div id="footer-ad">
    <?php print $footer_ad; ?>
  </div>
  <?php endif; ?>
</div>
<!-- end page-wrapper -->
<?php print $closure ?>
</body>
</html>