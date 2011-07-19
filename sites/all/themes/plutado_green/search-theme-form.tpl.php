<div id="search-label"><label for="search_theme_form_keys">SEARCH </label></div>
<div id="search-field"><input type="text" name="search_theme_form" id="edit-search-theme-form-l" size="25" value="" title="Enter the terms you wish to search for." class="form-text" /></div>
<div id="search-button"><input type="image" src="<?php print base_path() . path_to_theme() ?>/images/go.png"  name="op" value="Search"  /></div>
<input type="hidden" name="form_id" id="edit-search-theme-form" value="search_theme_form" />
<input type="hidden" name="form_token" id="a-unique-id" value="<?php print drupal_get_token('search_theme_form'); ?>" />
