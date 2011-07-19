<?php

/**
 * @file
 *   The overrides file.
 */

define('GOOFY_TABLE_HAS_HEADER', 0x2);
define('GOOFY_TABLE_HAS_ROWS',   0x1);

/**
 * Override or insert PHPTemplate variables into the templates.
 * - logo2 is the secondary, yellow logo on the right
 * - linksBar is a themed primary links block element
 * - colspan is the number of columns in the main layout table
 *
 * Replace empty or whitespace-only messages by NULL
 */
function phptemplate_preprocess_page(&$vars)
  {
  $vars['logo2'] = base_path() . path_to_theme() . '/' . theme_get_setting('logo2');
  $vars['linksBar'] = phptemplate_linksbar();

  $messages = trim($vars['messages']);
  $vars['messages']  = empty($messages)
    ? NULL
    : $messages . "<!-- div.messages -->\n";

  $footer_message = trim($vars['footer_message']);
  $vars['footer_message']  = empty($footer_message)
    ? NULL
    : $footer_message;

  if (!isset($vars['favicon']))
    {
    $vars['favicon'] = '';
    }

  switch ($vars['layout'])
    {
    case 'both':
      $colspan = 3;
      break;

    case 'left':
    case 'right':
      $colspan = 2;
      break;

    case 'none':
    default:
      $colspan = 1;
      break;
    }
  $vars['colspan'] = $colspan;
  }


/**
 * Preserve the old 4.6 look used by Goofy from the then-current default theme.
 *
 * @param array $links
 * @param array $attributes
 * @return string
 */
function phptemplate_links($links, $attributes = array('class' => 'links'))
  {
  $arLinks = array();
  if (!is_array($links))
    {
    drupal_set_message('phptemplate_links(' . gettype($links) . " = [$links])", 'warning');
    $links = array($links);
    }
  foreach ($links as $link)
    {
    if (array_key_exists('attributes', $link))
      {
      $arLinks[] = l($link['title'], $link['href'], array('attributes' => $link['attributes']));
      }
    else
      {
      if (isset($link['html']))
        {
        $arLinks[] = $link['title'];
        }
      elseif (isset($link['href']))
        {
        $arLinks[] = l($link['title'], $link['href']);
        }
      else
        {
        $arLinks[] = $link['title'];
        }
      }
    }
  return implode(' | ', $arLinks);
  }

/**
 * Implement theme_help().
 *
 * @return string
 */
function phptemplate_help()
  {
  if ($help = menu_get_active_help())
    {
    return '<div class="help">'. $help .'</div><hr />';
    }
  }

/**
 * "Helper function to prevent double code."
 *
 * Not really a themeable function, just a helper for the page template.
 * @see phptemplate_preprocess_page()
 *
 * @return string
 */
function phptemplate_linksbar()
  {
  if (!theme_get_setting('toggle_primary_links'))
    {
    return;
    }
  $links = ($primary_links = theme('links', menu_primary_links())) ? $primary_links : NULL ;
  $img_path = base_path() . path_to_theme() .'/images/';
  $webbug = $img_path . 'null.gif';

  return PHP_EOL . '          <table class="goofy goofy-linksbar">
            <tr>
              <td><img src="' . $img_path .'lg-ul.png" class="goofy" alt=""  /></td>
              <td class="lgu"><img src="'. $webbug . '" alt="" /></td>
              <td><img src="' . $img_path .'lg-ur.png" class="goofy" alt="" /></td>
              </tr>
            <tr>
              <td class="lgl"><img src="'. $webbug . '" alt="" /></td>
              <td class="lgcnt">' . $links . '</td>
              <td class="lgr"><img src="'. $webbug .'" alt="" /></td>
              </tr>
            <tr>
              <td><img src="' . $img_path .'lg-dl.png" class="goofy" alt="" /></td>
              <td class="lgd"><img src="'. $webbug . '" alt="" /></td>
              <td><img src="' . $img_path .'lg-dr.png" class="goofy" alt="" /></td>
              </tr>
            </table><!-- .goofy .goofy-linksbar -->' . PHP_EOL;
  }

/**
 * Utility function for forum-topic-list.tpl.php
 *
 * @param object $topic
 * @return string
 */
function _forum_format($topic)
  {
  if (empty($topic))
    {
    return t('n/a');
    }
  elseif (isset($topic->timestamp))
    {
    return t('@time ago by !author', array('@time' => format_interval(time() - $topic->timestamp), '!author' => theme('username', $topic)));
    }
  else
    {
    return $topic;
    }
  }

function phptemplate_preprocess_forum_topic_list(&$variables)
  {
  global $forum_topic_list_header;

  // Create the tablesorting header.
  $ts = tablesort_init($forum_topic_list_header);
  $header = '';
  foreach ($forum_topic_list_header as $cell)
    {
    $cell = tablesort_header($cell, $forum_topic_list_header, $ts);
    $header[] = $cell;
    }
  $variables['header'] = $header;
  }

function phptemplate_preprocess_table(&$vars)
  {
  $header = $vars['header'];
  $colspanH = 0;
  if (is_array($header))
    {
    foreach ($header as $cell)
      {
      if (is_array($cell) && !empty($cell['colspan']))
        {
        $colspanH += $cell['colspan'];
        }
      else
        {
        $colspanH++;
        }
      }
    }
  else
    {
    $colspanH = 1;
    }

  $rows = $vars['rows'];

  $colspanR = 0;
  if (is_array($rows))
    {
    foreach ($rows as $row)
      {
      $tmpColspan = 0;
      foreach ($row as $cell)
        {
        if (is_array($cell) && !empty($cell['colspan']))
          {
          $tmpColspan += $cell['colspan'];
          }
        else
          {
          $tmpColspan++;
          }
        }
      if ($tmpColspan > $colspanR)
        {
        $colspanR = $tmpColspan;
        }
      }
    }
  else
    {
    $colspanR = 1;
    }
  $vars['colspan'] = max($colspanH, $colspanR);

  $vars['draggable'] = FALSE;
  if (is_array($vars['rows']))
    {
    foreach ($rows as $row)
      {
      if (is_array($row) && isset($row['class']) && (strpos($row['class'], 'draggable') !== FALSE))
        {
        $vars['draggable'] = TRUE;
        break;
        }
      }
    }

  $vars['layout'] = 0;
  if (!empty($vars['header']))
    {
    $vars['layout'] |= GOOFY_TABLE_HAS_HEADER;
    }
  if (!empty($rows))
    {
    $vars['layout'] |= GOOFY_TABLE_HAS_ROWS;
    }

  if (isset($vars['attributes']['zebra']))
    {
    $vars['zebra'] = $vars['attributes']['zebra'];
    }
  }
