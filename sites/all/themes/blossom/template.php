<?php
/**
 * Return themed links.
 * Creates the type of delimiter used for $links
 */
function flower_links($links, $attributes = array('class' => 'links')) {
  $output = '';
  $is_front = drupal_is_front_page();
  if (count($links) > 0) {

    $num_links = count($links);
    $i = 1;
	$output = '<ul class="'.$attributes['class'].'">';
    foreach ($links as $key => $link) {
      $class = '';

      // Automatically add a class to each link and also to each LI
      if (isset($link['attributes']) && isset($link['attributes']['class'])) {
        $link['attributes']['class'] .= ' ' . $key;
        $class = $key;
      }
      else {
		if($i == 1 && $is_front)
		{
			$link['attributes']['class'] =  $key.'-active active';
			$class = $key.'-active';
		} else {
			$link['attributes']['class'] = $key;
			$class = $key;
		}
      }
      // Add first and last classes to the list of links to help out themers.
      $extra_class = '';
      if ($i == 1) {
		$extra_class .= 'first ';
      } else {
        // $output .= '&nbsp;| &nbsp;';
      }
	  if ($i == $num_links) {
        $extra_class .= 'last ';
      }
      $output .= '<li class="'. $extra_class . $class .'">';

      // Is the title HTML?
      $html = isset($link['html']) && $link['html'];

      // Initialize fragment and query variables.
      $link['query'] = isset($link['query']) ? $link['query'] : NULL;
      $link['fragment'] = isset($link['fragment']) ? $link['fragment'] : NULL;

      if (isset($link['href'])) {
        $output .= l($link['title'], $link['href'], $link['attributes'], $link['query'], $link['fragment'], FALSE, $html);
      }
      else if ($link['title']) {
        //Some links are actually not links, but we wrap these in <span> for adding title and class attributes
        if (!$html) {
          $link['title'] = check_plain($link['title']);
        }
        $output .= '<li'. drupal_attributes($link['attributes']) .'>'. $link['title'] .'</li>';
      }

      $i++;
      $output .= "</li>\n";
    }
	$output .= "</ul>";
  }

  return $output;
}

/********* USER LOGIN FUNCTION ****************************/

function flower_user_bar() {
  global $user;                                                               
  $output = '';

  if (!$user->uid) {    
 
  $output .=t('<p class="welcome">Welcome, Guest.<br />Please login or <a href="'.$base_path.'user/register">register</a>.<br /><a href="'.$base_path.'user/password">Request Password</a></p>');
                                                        
    $output .= drupal_get_form('user_login_block');                           
  }                                                                           
  else {                                                                      
    $output .= t('<p class="user-info">Welcome !user.</p>', array('!user' => theme('username', $user)));
 
    $output .= theme('item_list', array(
      l(t('Your account'), 'user/'.$user->uid, array('title' => t('Edit your account'))),
      l(t('Logout'), 'logout')));
  }
   
  $output = '<div id="user-bar">'.$output.'</div>';
     
  return $output;
}
