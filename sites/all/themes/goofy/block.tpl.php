<?php

/**
 * @file
 *   The block template
 */
?>

          <div class="block block-<?php print $block->module ?>" id="block-<?php print $block->module . '-' . $block->delta ?>">
<?php print theme('box', $block->subject, $block->content); ?>

            </div><!-- .block .block-<?php print $block->module ?> #block-<?php print $block->module . '-' . $block->delta ?> -->