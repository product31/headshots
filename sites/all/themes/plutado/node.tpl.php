<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">
<?php print $picture ?>
<?php if ($page == 0): ?>
  <h2><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>
  <div class="meta">
  <?php if ($submitted): ?>
    <span class="submitted">
      <?php print 'Published ' . format_date($node->created, 'custom', 'F j, Y, g:i a') . ' | ' . 'by ' . theme('username', $node); ?>
    </span>
  <?php endif; ?>
  <div class="content">
    <?php print $content ?>
  </div>
  <?php if ($terms): ?>
  <div id="tax">
    <span class="terms"><div class="filed">Categories: </div><?php print $terms ?></span>
  </div>
  <?php endif;?>
  </div>
  <div id="links">
  <?php 
    if ($links) {
      print $links;
    }
  ?>
  </div>
</div>