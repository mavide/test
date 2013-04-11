<?php /* Smarty version 2.6.18, created on 2013-04-10 18:49:15
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/admin_area/styles/cbv2/layout/reports.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'get_videos', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/admin_area/styles/cbv2/layout/reports.html', 19, false),array('function', 'get_users', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/admin_area/styles/cbv2/layout/reports.html', 71, false),array('function', 'get_groups', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/admin_area/styles/cbv2/layout/reports.html', 118, false),array('modifier', 'number_format', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/admin_area/styles/cbv2/layout/reports.html', 208, false),array('modifier', 'formatfilesize', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/admin_area/styles/cbv2/layout/reports.html', 208, false),)), $this); ?>
<div class="clearfix"></div>
<div id="my_chart"></div>
<script type="text/javascript">
var daily_activity = "<?php echo $this->_tpl_vars['baseurl']; ?>
/admin_area/charts/daily_activity.php";
swfobject.embedSWF("<?php echo $this->_tpl_vars['baseurl']; ?>
/player/open-flash-chart.swf", "my_chart", "99%", "300", "9.0.0", "expressInstall.swf",<?php echo ' {"data-file":daily_activity}'; ?>
 );
</script>
<div style="height:20px"></div>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="block">
            <tr>
              <td colspan="3"><h2>Videos Reports</h2></td>
            </tr>
            <tr>
              <td width="120">All Time</td>
              <td>Total <strong><?php echo get_videos(array('count_only' => true), $this);?>
</strong> &#8211; Active <strong><?php echo get_videos(array('count_only' => true,'active' => 'yes'), $this);?>
</strong> &#8211; Processing <strong><?php echo get_videos(array('count_only' => true,'status' => 'Processing'), $this);?>
</strong></td>
              
        </tr>
            <tr>
              <td width="120">Todays Videos</td>
              <td>Total <strong><?php echo get_videos(array('count_only' => true,'date_span' => 'today'), $this);?>
</strong> &#8211; Active <strong><?php echo get_videos(array('count_only' => true,'active' => 'yes','date_span' => 'today'), $this);?>
</strong> &#8211; Processing <strong><?php echo get_videos(array('count_only' => true,'status' => 'Processing','date_span' => 'today'), $this);?>
</strong></td>
        </tr>
            <tr>
              <td width="120">This Week</td>
              <td>Total <strong><?php echo get_videos(array('count_only' => true,'date_span' => 'this_week'), $this);?>
</strong> &#8211; Active <strong><?php echo get_videos(array('count_only' => true,'active' => 'yes','date_span' => 'this_week'), $this);?>
</strong> &#8211; Processing <strong><?php echo get_videos(array('count_only' => true,'status' => 'Processing','date_span' => 'this_week'), $this);?>
</strong></td>
        </tr>
            <tr>
              <td>Last Week</td>
              <td>Total <strong><?php echo get_videos(array('count_only' => true,'date_span' => 'last_week'), $this);?>
</strong> &#8211; Active <strong><?php echo get_videos(array('count_only' => true,'active' => 'yes','date_span' => 'last_week'), $this);?>
</strong> &#8211; Processing <strong><?php echo get_videos(array('count_only' => true,'status' => 'Processing','date_span' => 'last_week'), $this);?>
</strong></td>
            </tr>
            <tr>
              <td>This Month</td>
              <td>Total <strong><?php echo get_videos(array('count_only' => true,'date_span' => 'this_month'), $this);?>
</strong> &#8211; Active <strong><?php echo get_videos(array('count_only' => true,'active' => 'yes','date_span' => 'this_month'), $this);?>
</strong> &#8211; Processing <strong><?php echo get_videos(array('count_only' => true,'status' => 'Processing','date_span' => 'this_month'), $this);?>
</strong></td>
            </tr>
            <tr>
              <td>Last Month</td>
              <td>Total <strong><?php echo get_videos(array('count_only' => true,'date_span' => 'last_month'), $this);?>
</strong> &#8211; Active <strong><?php echo get_videos(array('count_only' => true,'active' => 'yes','date_span' => 'last_month'), $this);?>
</strong> &#8211; Processing <strong><?php echo get_videos(array('count_only' => true,'status' => 'Processing','date_span' => 'last_month'), $this);?>
</strong></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
    </table></td>
    <td width="50%" valign="top"><div id="videos_stats"></div>
<script type="text/javascript">
var daily_activity = "<?php echo $this->_tpl_vars['baseurl']; ?>
/admin_area/charts/videos_activity.php";
swfobject.embedSWF("<?php echo $this->_tpl_vars['baseurl']; ?>
/player/open-flash-chart.swf", "videos_stats", "98%", "200", "9.0.0", "expressInstall.swf",<?php echo ' {"data-file":daily_activity}'; ?>
 );
</script></td>
  </tr>
</table>



<div style="height:25px"></div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="block">
            <tr>
              <td colspan="3"><h2>User Reports</h2></td>
            </tr>
            <tr>
              <td width="120">All Time</td>
              <td>Total <strong><?php echo get_users(array('count_only' => true), $this);?>
</strong> &#8211; Active <strong><?php echo get_users(array('count_only' => true,'status' => 'Ok'), $this);?>
</strong> &#8211; Inactive <strong><?php echo get_users(array('count_only' => true,'status' => 'ToActivate'), $this);?>
</strong></td>
              
        </tr>
            <tr>
              <td width="120">Todays Users</td>
              <td>Total <strong><?php echo get_users(array('count_only' => true,'date_span' => 'today'), $this);?>
</strong> &#8211; Active <strong><?php echo get_users(array('count_only' => true,'status' => 'Ok','date_span' => 'today'), $this);?>
</strong> &#8211; Inactive <strong><?php echo get_users(array('count_only' => true,'status' => 'ToActivate','date_span' => 'today'), $this);?>
</strong></td>
        </tr>
            <tr>
              <td width="120">This Week</td>
              <td>Total <strong><?php echo get_users(array('count_only' => true,'date_span' => 'this_week'), $this);?>
</strong> &#8211; Active <strong><?php echo get_users(array('count_only' => true,'status' => 'Ok','date_span' => 'this_week'), $this);?>
</strong> &#8211; Inactive <strong><?php echo get_users(array('count_only' => true,'status' => 'ToActivate','date_span' => 'this_week'), $this);?>
</strong></td>
        </tr>
            <tr>
              <td width="120">Last Week</td>
              <td>Total <strong><?php echo get_users(array('count_only' => true,'date_span' => 'last_week'), $this);?>
</strong> &#8211; Active <strong><?php echo get_users(array('count_only' => true,'status' => 'Ok','date_span' => 'last_week'), $this);?>
</strong> &#8211; Processing <strong><?php echo get_users(array('count_only' => true,'status' => 'ToActivate','date_span' => 'last_week'), $this);?>
</strong></td>
        </tr>
            <tr>
              <td>This Month</td>
              <td>Total <strong><?php echo get_users(array('count_only' => true,'date_span' => 'this_month'), $this);?>
</strong> &#8211; Active <strong><?php echo get_users(array('count_only' => true,'status' => 'Ok','date_span' => 'this_month'), $this);?>
</strong> &#8211; Inactive <strong><?php echo get_users(array('count_only' => true,'status' => 'ToActivate','date_span' => 'this_month'), $this);?>
</strong></td>
            </tr>
            <tr>
              <td>Last Month</td>
              <td>Total <strong><?php echo get_users(array('count_only' => true,'date_span' => 'last_month'), $this);?>
</strong> &#8211; Active <strong><?php echo get_users(array('count_only' => true,'status' => 'Ok','date_span' => 'last_month'), $this);?>
</strong> &#8211; Inactive <strong><?php echo get_users(array('count_only' => true,'status' => 'ToActivate','date_span' => 'last_month'), $this);?>
</strong></td>
            </tr>
    </table></td>
    <td width="50%" valign="top"><div id="user_stats"></div>
<script type="text/javascript">
var daily_activity = "<?php echo $this->_tpl_vars['baseurl']; ?>
/admin_area/charts/users_activity.php";
swfobject.embedSWF("<?php echo $this->_tpl_vars['baseurl']; ?>
/player/open-flash-chart.swf", "user_stats", "98%", "200", "9.0.0", "expressInstall.swf",<?php echo ' {"data-file":daily_activity}'; ?>
 );
</script></td>
  </tr>
</table>






<div style="height:25px"></div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="50%" valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="0" class="block">
            <tr>
              <td colspan="3"><h2>Group Reports</h2></td>
            </tr>
            <tr>
              <td width="120">All Time</td>
              <td>Total <strong><?php echo get_groups(array('count_only' => true), $this);?>
</strong> &#8211; 
              Active <strong> <?php echo get_groups(array('count_only' => true,'active' => 'yes'), $this);?>
</strong> &#8211; 
              Inactive <strong> <?php echo get_groups(array('count_only' => true,'active' => 'no'), $this);?>
</strong>
              </td>
              
        </tr>
            <tr>
              <td width="120">Today</td>
              <td>Total <strong><?php echo get_groups(array('count_only' => true,'date_span' => 'today'), $this);?>
</strong> &#8211; 
              Active <strong> <?php echo get_groups(array('count_only' => true,'active' => 'yes','date_span' => 'today'), $this);?>
</strong> &#8211; 
              Inactive <strong> <?php echo get_groups(array('count_only' => true,'active' => 'no','date_span' => 'today'), $this);?>
</strong></td>
        </tr>
            <tr>
              <td width="120">This Week</td>
              <td>Total <strong><?php echo get_groups(array('count_only' => true,'date_span' => 'this_week'), $this);?>
</strong> &#8211; 
              Active <strong> <?php echo get_groups(array('count_only' => true,'active' => 'yes','date_span' => 'this_week'), $this);?>
</strong> &#8211; 
              Inactive <strong> <?php echo get_groups(array('count_only' => true,'active' => 'no','date_span' => 'this_week'), $this);?>
</strong></td>
        </tr>
            <tr>
              <td width="120">Last Week</td>
              <td>Total <strong><?php echo get_groups(array('count_only' => true,'date_span' => 'last_week'), $this);?>
</strong> &#8211; 
              Active <strong> <?php echo get_groups(array('count_only' => true,'active' => 'yes','date_span' => 'last_week'), $this);?>
</strong> &#8211; 
              Inactive <strong> <?php echo get_groups(array('count_only' => true,'active' => 'no','date_span' => 'last_week'), $this);?>
</strong></td>
        </tr>
            <tr>
              <td>This Month</td>
              <td>Total <strong><?php echo get_groups(array('count_only' => true,'date_span' => 'this_month'), $this);?>
</strong> &#8211; 
              Active <strong> <?php echo get_groups(array('count_only' => true,'active' => 'yes','date_span' => 'this_month'), $this);?>
</strong> &#8211; 
              Inactive <strong> <?php echo get_groups(array('count_only' => true,'active' => 'no','date_span' => 'this_month'), $this);?>
</strong></td>
            </tr>
            <tr>
              <td>Last Month</td>
              <td>Total <strong><?php echo get_groups(array('count_only' => true,'date_span' => 'last_month'), $this);?>
</strong> &#8211; 
              Active <strong> <?php echo get_groups(array('count_only' => true,'active' => 'yes','date_span' => 'last_month'), $this);?>
</strong> &#8211; 
              Inactive <strong> <?php echo get_groups(array('count_only' => true,'active' => 'no','date_span' => 'last_month'), $this);?>
</strong></td>
            </tr>
    </table></td>
    <td width="50%" valign="top"><div id="group_stats"></div>
<script type="text/javascript">
var daily_activity = "<?php echo $this->_tpl_vars['baseurl']; ?>
/admin_area/charts/groups_activity.php";
swfobject.embedSWF("<?php echo $this->_tpl_vars['baseurl']; ?>
/player/open-flash-chart.swf", "group_stats", "98%", "200", "9.0.0", "expressInstall.swf",<?php echo ' {"data-file":daily_activity}'; ?>
 );
</script></td>
  </tr>
</table>


<div style="height:25px"></div>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="block">
  <tr>
    <td width="25%"><h2>Comments</h2></td>
    <td width="25%"><h2>Flags</h2></td>
    <td width="25%"><h2>Playlists</h2></td>
    <td width="25%"><h2>Favorites</h2></td>
  </tr>
  <tr>
    <td valign="top"><ul>
      <li><strong><?php echo $this->_tpl_vars['myquery']->get_comments('wildcard','v','TRUE'); ?>
 </strong>video comments</li>
      <li><strong><?php echo $this->_tpl_vars['myquery']->get_comments('wildcard','t','TRUE'); ?>
 </strong>Group Discussions</li>
      <li><strong><?php echo $this->_tpl_vars['myquery']->get_comments('wildcard','c','TRUE'); ?>
 </strong>Profile Comments</li>
    </ul></td>
    <td valign="top"><ul>
      <li><strong><?php echo $this->_tpl_vars['cbvid']->action->count_flagged_objects(); ?>
</strong> videos are reported</li>
      <li><strong><?php echo $this->_tpl_vars['userquery']->action->count_flagged_objects(); ?>
</strong> groups are reported</li>
      <li><strong><?php echo $this->_tpl_vars['cbgroup']->action->count_flagged_objects(); ?>
</strong> profiles are reported</li>
    </ul>
    <p>&nbsp;</p></td>
    <td valign="top"><ul>
      <li><strong><?php echo $this->_tpl_vars['cbvid']->action->count_total_playlist(); ?>
</strong> Video Playlists are created</li>
      <li><strong><?php echo $this->_tpl_vars['cbvid']->action->count_total_playlist(true); ?>
</strong> Video Items are in playlist</li>
    </ul></td>
    <td valign="top"><ul>
      <li><strong><?php echo $this->_tpl_vars['cbvid']->action->total_favorites(); ?>
</strong> favorite videos</li>
    </ul></td>
  </tr>
</table>




<div style="height:25px"></div>


<table width="100%" border="0" cellspacing="0" cellpadding="0" class="block">
  <tr>
    <td width="25%"><h2>Files and Sizes</h2></td>
  </tr>
  <tr>
    <td valign="top"><ul>
      <li>Video Files : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['vid_dir']['count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</strong> &#8211; Folder Size : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['vid_dir']['size'])) ? $this->_run_mod_handler('formatfilesize', true, $_tmp) : formatfilesize($_tmp)); ?>
</strong></li>
      <li>Thumb Files : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['thumb_dir']['count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</strong> &#8211; Folder Size : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['thumb_dir']['size'])) ? $this->_run_mod_handler('formatfilesize', true, $_tmp) : formatfilesize($_tmp)); ?>
</strong></li>
      <li>Original Video Files : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['orig_dir']['count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</strong> &#8211; Folder Size : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['orig_dir']['size'])) ? $this->_run_mod_handler('formatfilesize', true, $_tmp) : formatfilesize($_tmp)); ?>
</strong></li>
      <li>User Thumb Files : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['user_thumbs']['count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</strong> &#8211; Folder Size : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['user_thumbs']['size'])) ? $this->_run_mod_handler('formatfilesize', true, $_tmp) : formatfilesize($_tmp)); ?>
</strong></li>
      <li>User Background Files <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['user_bg']['count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</strong> &#8211; Folder Size : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['user_bg']['size'])) ? $this->_run_mod_handler('formatfilesize', true, $_tmp) : formatfilesize($_tmp)); ?>
</strong></li>
      <li>Groups Thumb Files : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['grp_thumbs']['count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</strong> &#8211; Folder Size : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['grp_thumbs']['size'])) ? $this->_run_mod_handler('formatfilesize', true, $_tmp) : formatfilesize($_tmp)); ?>
</strong></li>
      <li>Category Thumb Files <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['cat_thumbs']['count'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</strong> &#8211; Folder Size : <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['cat_thumbs']['size'])) ? $this->_run_mod_handler('formatfilesize', true, $_tmp) : formatfilesize($_tmp)); ?>
</strong></li>
      <li>Database Size : <strong><?php echo $this->_tpl_vars['db_size']; ?>
</strong></li>
    </ul></td>
  </tr>
</table>