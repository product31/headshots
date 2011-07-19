<?php
/*
$pager: The pager to display beneath the table.
$topics: An array of topics to be displayed.
$topic_id: Numeric id for the current forum topic.
Each $topic in $topics contains:
$topic->icon: The icon to display.
$topic->moved: A flag to indicate whether the topic has been moved to another forum.
$topic->title: The title of the topic. Safe to output.
$topic->message: If the topic has been moved, this contains an explanation and a link.
$topic->zebra: 'even' or 'odd' string used for row class.
$topic->num_comments: The number of replies on this topic.
$topic->new_replies: A flag to indicate whether there are unread comments.
$topic->new_url: If there are unread replies, this is a link to them.
$topic->new_text: Text containing the translated, properly pluralized count.
$topic->created: An outputtable string represented when the topic was posted.
$topic->last_reply: An outputtable string representing when the topic was last replied to.
$topic->timestamp: The raw timestamp this topic was posted.
*/

$img_path = base_path() . path_to_theme() . '/images/';
$webbug = $img_path . 'null.gif';

if (is_array($topics))
  {
  foreach ($topics as $topic)
    {
    // folder is new if topic is new or there are new comments since last visit
    if ($topic->tid != $topic_id)
      {
      $rows[] = array
        (
        array('data' => theme('forum_icon', $topic->new, $topic->num_comments, $topic->comment_mode, $topic->sticky), 'class' => 'icon'),
        array('data' => filter_xss($topic->title), 'class' => 'title'),
        array('data' => l(t('This topic has been moved'), "forum/$topic->tid"), 'colspan' => '3')
        );
      }
    else
      {
      $rows[] = array
        (
        array('data' => trim(theme('forum_icon', $topic->new, $topic->num_comments, $topic->comment_mode, $topic->sticky), " \n"), 'class' => 'icon'),
        array('data' => filter_xss($topic->title), 'class' => 'topic'),
        array(
          'data' => $topic->num_comments . ($topic->new_replies
            ? ' ' . l(format_plural($topic->new_replies, '1 new', '%count new'), "node/$topic->nid", array('class' => 'new'))
            : ''),
          'class' => 'replies'),
        array('data' => _forum_format($topic), 'class' => 'created'),
        array('data' => _forum_format($topic->last_reply), 'class' => 'last-reply')
        );
      }
    }
  }
  
print theme('table', $header, $rows, array('class' => 'goofy-forum-topic'));