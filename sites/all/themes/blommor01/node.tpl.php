
<!-- start node -->
<div id="node-<?php print $node->nid; ?>" class="node <?php print $node_classes; ?>">
<?php if ($page == 0): ?>
<h2 class="nodetitle"><a href="<?php print $node_url ?>"><?php print $title ?></a></h2>
<?php endif; ?>
<?php if ($unpublished): ?>
<div class="unpublished"><?php print t('Unpublished') ?></div>
<?php endif; ?>
<div class="meta">
<?php if ($submitted): ?>
<div class="submitted"><?php print $submitted ?></div>
<?php endif; ?>
<?php if ($terms): ?>
<div class="terms"><?php print $terms ?></div>
<?php endif; ?>
</div>
<?php print $picture ?>
<div class="content clear-block"><?php print $content ?></div>
<?php if ($links): ?>
<div class="links">&raquo; <?php print $links ?></div>
<?php endif; ?>
</div>
