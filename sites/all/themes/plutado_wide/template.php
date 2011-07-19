<?php

function phptemplate_breadcrumb($breadcrumb) {
	if (!empty($breadcrumb)) {
		return '<div class="breadcrumb">' . implode ('<div class="delimit">&nbsp;»&nbsp;</div>', $breadcrumb) . '</div>';
	}
}