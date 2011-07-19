<?php

/**
 * @file
 *   The comment template
 * 
 * Available variables:
 * - $author: Comment author. Can be link or plain text. 
 * - $content: Body of the post. 
 * - $date: Date and time of posting. 
 * - $links: Various operational links. Already as a string. 
 * - $new: New comment marker. 
 * - $picture: Authors picture. 
 * - $signature: Authors signature. 
 * - $status: Comment status. Possible values are: comment-unpublished, comment-published or comment-preview. 
 * - $submitted: By line with date and time. 
 * - $title: Linked title.
 * 
 * The comment object variable contains the following fields:
 * - cid: {comments}/cid
 * - pid: {comments}/pid
 * - nid: {comments}/nid
 * - uid: {comments}/uid
 * - subject: {comments}/subject
 * - comment: {comments}/comment
 * - format: {comments}/format
 * - timestamp: {comments}/timestamp
 * - name: {comments}/name
 * - homepage: {comments}/homepage
 * - registered_name: {users}/name ?
 * - signature: {users}/signature
 * - picture: {users}/picture
 * - data: {users}/data
 * - thread: {comments}/thread
 * - status: {comments}/status
 * - {users}/data#key => {users}/data#value
 * - depth: computed
 * - new: computed
 * 
 * The full node object is also available
 */


$img_path = base_path() . path_to_theme() .'/images/';
$webbug = $img_path . 'null.gif';

$author = "<strong>" . theme('username', $comment) . "</strong>";
$date = format_date($comment->timestamp);
$body = $content 
      . '<hr />'
      . '<div style="text-align: right;">[ '
      . /* theme('links', */ $links 
      . ' ]</div>';
$picture = theme_get_setting('toggle_comment_user_picture') 
  ? theme('user_picture', $comment) 
  : '';
?>
<!-- comment: "<?php print $comment->subject ?>" -->
<?php
$class = 'comment goofy-comment';
$header = array
  (
  
  );
$data = array();
$data[] = array(
  array
    (
    'colspan' => 2,
    'data'    => $body,
    ),
  );
// print theme('table', $header, $data, array('class' => $class));
?>
<table class="goofyo comment goofy-comment">
  <tr class="ht">
    <td class="htl"><img src="<?php print $img_path . 'or-ul.png' ?>" alt="" /></td>
    <td class="htc" colspan="2"><img src="<?php print $img_path . 'or-u.png' ?>" alt="" /></td>
    <td class="htr"><img src="<?php print $img_path . 'or-ur.png' ?>" alt="" /></td>
    </tr>
  <tr class="hm">
    <td class="hml" />
    <td class="hmc" colspan="2">
      <table cellpadding="0" cellspacing="1" style="width: 100%">
        <tr class="hm comment-subject">
          <th class="hmc comment-label"><?php print t("Subject") ?>:&nbsp;</th>
          <td class="hmc left comment-subject"><?php print $comment->subject ?></td>
          <td rowspan="3" class="hmc comment-right"><?php print $picture ?></td>
          </tr>
        <tr class="hm">
          <th class="hmc comment-label"><?php print t("Author") ?>:&nbsp;</th>
          <td class="hmc left"><?php print $author ?></td>
          </tr>
        <tr class="hm">
          <th class="hmc comment-label"><?php print t("Date") ?>:&nbsp;</th>
          <td class="hmc left"><?php print $date ?></td>
          </tr>
        </table>
      </td>
    <td class="hmr" />
    </tr>
  <tr class="hb">
    <td class="hbl" />
    <td class="hbc" colspan="2" />
    <td class="hbr" />
    </tr>
  <tr>
    <td class="rtl" />
    <td class="rtc" colspan="2" />
    <td class="rtr" />
    </tr>
  <tr>
    <td class="rml"></td>
    <td class="rmc" colspan="2"><?php print $body ?></td>
    <td class="rmr"></td>
    </tr>
  <tr>
    <td class="rbl"><img src="<?php print $img_path . 'lg-dl.png' ?>" alt="" /></td>
    <td class="rbc" colspan="2" />
    <td class="rbr"><img src="<?php print $img_path . 'lg-dr.png' ?>" alt="" /></td>
    </tr>
  </table>
<br />
