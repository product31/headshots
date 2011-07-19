<?php

  $delimiter = "&nbsp;&nbsp;";
  $path = base_path() . path_to_theme(); 

  $output = '';

  if (count($links) > 0) {
    //$output = '<ul'. drupal_attributes($attributes) .'>';

    $num_links = count($links);
    $i = 1;

    foreach ($links as $key => $link) {
      $class = $key;

      // Add first, last and active classes to the list of links to help out themers.
      if ($i == 1) {
        $class .= ' first';
      }
      if ($i == $num_links) {
        $class .= ' last';
      }
      if (isset($link['href']) && $link['href'] == $_GET['q']) {
        $class .= ' active';
      }
      //$output .= '<li class="'. $class .'">';

      if ($link['title'] == 'Add new comment') {
		$output .= "<img alt=\"\" src=" . $path . "/images/comment.gif>" ;
	  }
	  if ($link['title'] == 'Read more') {
		$output .= "<img alt=\"\" src=" . $path . "/images/more.gif>";
	  }

      if (isset($link['href'])) {
        // Pass in $link as $options, they share the same keys.
        $output .= l($link['title'], $link['href'], $link);
      }
      else if (!empty($link['title'])) {
        // Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (empty($link['html'])) {
          $link['title'] = check_plain($link['title']);
        }
        $span_attributes = '';
        if (isset($link['attributes'])) {
          $span_attributes = drupal_attributes($link['attributes']);
        }
        $output .= '<span'. $span_attributes .'>'. $link['title'] .'</span>';
      }

      $i++;
      $output .= $delimiter;
      //$output .= "</li>\n";
    }

    //$output .= '</ul>';
  }

  print $output;
?> 
