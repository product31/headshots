
<!-- start block -->
<div id="block-<?php print "$block->module-$block->delta" ?>" class="block block-<?php print $block->module ?>">
<?php if ($block->subject): ?>
<h2><?php print $block->subject ?></h2>
<?php endif; ?>
<div class="content clear-block"><?php print $block->content ?></div>
</div>
