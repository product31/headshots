<?php if($block->subject=='User login'){ ?>
<?php }else{?>
<div class="block block-<?php print $block->module; ?>" id="block-<?php print $block->module; ?>-<?php print $block->delta; ?>">
    <h4><?php print $block->subject; ?></h4>
    <div class="content"><?php print $block->content; ?></div>
 </div>
<?php }?>