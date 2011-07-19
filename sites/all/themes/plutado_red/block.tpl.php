<div id="block-<?php print $block->module .'-'. $block->delta; ?>" class="block block-<?php print $block->module ?>">
  <div class="block-header"></div>
  
  <div class="block-stuff">
	<?php if ($block->subject): ?>
	  <div class="block-subject"><h2><?php print $block->subject ?></h2></div>
	<?php endif;?>
	<div class="block-content"><?php print $block->content ?>

		<?php if (user_access('administer blocks')): ?>

		<div class="edit-block">
	  	<a href="<?php print base_path(); ?>admin/build/block/configure/<?php print $block->module; ?>/<?php print $block->delta; ?>">edit block</a>
		</div>

    <?php endif; ?>

	</div>
  </div>
	
	<div class="block-footer"></div>
		  	  
</div>
