<?php
// $Id: 
?>
<div id="node-<?php print $node->nid; ?>" class="node<?php if ($sticky) { print ' sticky'; } ?><?php if (!$status) { print ' node-unpublished'; } ?> clear-block">

<?php print $picture ?>

<?php if (!$page): ?>
  <h2 class="node-title"><a href="<?php print $node_url ?>" title="<?php print $title ?>"><?php print $title ?></a></h2>
<?php endif; ?>
  
  <?php if ($submitted): ?>
    <div class="meta">
      <span class="submitted"><?php print $submitted ?></span>
    </div>
  <?php endif; ?>
  <div class="content">
    <?php print $content ?>
  </div>
  
  <?php if ($terms): ?>
    <div class="terms terms-inline"></div>
  <?php endif; ?>
  
  <?php if ($links || $terms) : ?>
    <div id="node-links"><?php print $links; ?><?php print $terms ?></div>
  <?php endif; ?>
</div>