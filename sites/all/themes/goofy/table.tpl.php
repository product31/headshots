<?php
unset($attributes['zebra']);
/**
 * For some reason, draggable tables break the layout in Goofy because their
 * column count appears lower than the needed value, so we resort to the
 * core formatting for these.
 */
if ($draggable)
  {
  print theme_table($header, $rows, $attributes, $caption);
  return;
  }

// dvr(array($header, $rows, $layout));
// Add our own class
$attributes['class'] = empty($attributes['class'])
  ? 'goofyo'
  : $attributes['class'] . ' goofyo';
// ... now we know $attributes['class'] can NOT be empty below

// Add sticky headers, if applicable.
if ($layout & GOOFY_TABLE_HAS_HEADER)
  {
  drupal_add_js('misc/tableheader.js');
  // Add 'sticky-enabled' class to the table to identify it for JS.
  // This is needed to target tables constructed by this function.
  $attributes['class'] .= ' sticky-enabled';

  if (empty($attributes['cellpadding']))
    {
    $attributes['cellpadding'] = 0;
    }
  if (empty($attributes['cellspacing']))
    {
    $attributes['cellspacing'] = 0;
    }
  }

$ret = '<table ' . drupal_attributes($attributes) . ">\n";
if (isset($caption))
  {
  $ret .= '<caption>'. $caption ."</caption>\n";
  }

// Goofy common formatting elements
$img_path = base_path() . path_to_theme() .'/images/';
$webbug = $img_path . 'null.gif';

/**
 * Format the table header. Goofy is a table-heavy design, for each visible row,
 * we need the TR information, the static leftmost cell, the central (colspanned)
 * cell, and the static rightmost cell
 */

$headerStructure = array
  (
  // Top yellow row
  'top' => '
    <tr class="ht">
      <td class="htl" ><img src="' . $img_path . 'or-ul.png" alt="decoration" /></td>
      <td class="htc" colspan="' . $colspan . '" ><img src="' . $img_path . 'or-u.png" alt="decoration" /></td>
      <td class="htr" ><img src="' . $img_path . 'or-ur.png" alt="decoration" /></td>
      </tr>',
  // Actual header row
  'middle' => array
    (
    'left'   => "\n" . '    <tr class="hm">' . "\n"
              . '      <td class="hml" />',
    'center' => '      <th colspan="' . $colspan . '" />',
    'right'  => '      <td class="hmr" />' . "\n"
              . '      </tr>',
    ),
  // Bottom yellow row
  'bottom' => '
    <tr class="hb">
      <td class="hbl" />
      <td class="hbc" colspan="' . $colspan . '" />
      <td class="hbr" />
      </tr>',
  'bottomSeparate' => '
    <tr class="hbs">
      <td class="hbl" />
      <td class="hbc" colspan="' . $colspan . '" />
      <td class="hbr" />
      </tr>',
    );

$dataStructure = array
  (
  'top' => '
    <tr class="rt">
      <td class="rtl"  />
      <td class="rtc" colspan="' . $colspan . '" />
      <td class="rtr"  />
      </tr>',
  'topSeparate' => '
    <tr class="rts">
      <td class="rtl"  >&nbsp;</td>
      <td class="rtc" colspan="' . $colspan . '" />
      <td class="rtr"  />
      </tr>',
  'middle' => array
    (
    'row'   => '<tr class="rm">',
    'left'  => "\n" . '<td class="rml" />',
    'center'=> '<td colspan="' . $colspan . '" />',
    'right' => '<td class="rmr" />'
             . "</tr>\n",
    ),
  'bottom' => '
    <tr class="rb">
      <td class="rbl" ><img src="' . $img_path . 'lg-dl.png" alt="decoration" /></td>
      <td class="rbc" colspan="' . $colspan . '" />
      <td class="rbr" ><img src="' . $img_path . 'lg-dr.png" alt="decoration" /></td>
      </tr>',
  );

if ($layout & GOOFY_TABLE_HAS_HEADER)
  {
  $ts = tablesort_init($header);
  // HTML requires that the thead tag has tr tags in it followed by tbody
  // tags. Using ternary operator to check and see if we have any rows.
  $ret .= '  '
       . (count($rows) ? '<thead>' : NULL)
       . $headerStructure['top']
       . $headerStructure['middle']['left'];
  foreach ($header as $cell)
    {
    $cell = tablesort_header($cell, $header, $ts);
    if (!is_array($cell))
      {
      $cell = array('data' => $cell);
      }
    $cell['class'] = 'hmc';
    $ret .= _theme_table_cell($cell, TRUE);
    }
  $ret .= $headerStructure['middle']['right'];

  // Using ternary operator to close the tags based on layout
  $ret .= ($layout & GOOFY_TABLE_HAS_ROWS)
    ? $headerStructure['bottom'] . "\n    </thead>\n"
    : $headerStructure['bottomSeparate'] . "\n";
  }
else
  {
  $ts = array();
  }

// Format the table rows:
if ($layout & GOOFY_TABLE_HAS_ROWS)
  {
  $ret .= "  <tbody>\n";
  $flip = $zebra // If zebra is false, don't stripe
    ? array('even' => 'odd', 'odd' => 'even')
    : array('even' => 'even');

  // Force tables with no header to start unlike tables with a header
  $class = ($layout & GOOFY_TABLE_HAS_HEADER) ? 'even' : 'odd';

  $ret .= ($layout & GOOFY_TABLE_HAS_HEADER)
    ? $dataStructure['top'] . "\n"
    : $dataStructure['topSeparate'];

  foreach ($rows as $number => $row)
    {
    $attributes = array();

    // Check if we're dealing with a simple or complex row
    if (isset($row['data']))
      {
      foreach ($row as $key => $value)
        {
        if ($key == 'data')
          {
          $cells = $value;
          }
        else
          {
          $attributes[$key] = $value;
          }
        }
      }
    else
      {
      $cells = $row;
      }
    if (count($cells))
      {
      // Add odd/even class
      if (isset($attributes['class']))
        {
        $attributes['class'] .= ' rm '. $class;
        }
      else
        {
        $attributes['class'] = 'rm ' . $class;
        }

      // Build row
      $ret .= ' <tr'. drupal_attributes($attributes) .'>';
      $i = 0;
      $ret .= $dataStructure['middle']['left'];
      foreach ($cells as $cell)
        {
        $cell = tablesort_cell($cell, $header, $ts, $i++);
        $ret .= _theme_table_cell($cell);
        }
      $ret .= $dataStructure['middle']['right'];
      $class = $flip[$class];
      }
    }
  $ret .= $dataStructure['bottom'];
  $ret .= "</tbody>\n";
  }

$ret .= "</table>\n";
print $ret;
