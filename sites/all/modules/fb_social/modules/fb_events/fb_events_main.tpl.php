<div id="fb-event" style="width: 252px;">
<?php if ($members): ?>
<div class="profile_pics">
<h2><?php print t('Who’s going?') ?></h2>
<p class="fb_events_see_all_button"><a href="http://www.connect.facebook.com/event.php?eid=<?php echo $event_id; ?>&amp;locale=en_US"><?php print t('See all '.$total_rsvp.' guests on Facebook »') ?></a></p>
<div class="clear"></div>
<?php foreach ($members as $member){ ?>
<div class="fb_pic" style="float: left; margin-right: 2px;">
<fb:profile-pic width="40" height="40" uid="<?php print $member->id; ?>" facebook-logo="false" linked="true"></fb:profile-pic>
<!--<fb:name uid="<?php //print $member->id; ?>" firstnameonly="true" capitalize="true"></fb:name>-->
</div>
<?php } ?>
<div class="clear"></div>
</div>
<?php endif; ?>
<?php if ($fbc_status == FBC_EVENTS_FULL_CONNECT): ?>
<h2 class="status"><?php print ($event_status ? t('Your status: @status', array('@status' => $event_status)) : t('Are you going?'));?></h2>
<?php if ($perm_status): ?>
<?php print $event_form; ?>
<?php else: ?>
<div class="permission"><a href="#" onclick="FB.Connect.showPermissionDialog('rsvp_event', function(perms){window.location.reload()}); return false;"><?php print $signup_text; ?></a></div>
<div class="fb_description"><?php print t('The site needs permission to talk to your Facebook, is this OK? If yes, please press the button.'); ?></div>
<?php endif; ?>
<?php else: ?>
<h2 class="action"><?php print t('Are you going?'); ?></h2>
<?php $network = sony_connect_get_network('facebook'); print sony_connect_login_link($network); ?>
<div class="fb_description"><?php print t('Connect with Facebook to find out who\'s going and RSVP!') ?></div>
<?php endif; ?>
</div>