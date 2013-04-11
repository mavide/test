<?php /* Smarty version 2.6.18, created on 2013-04-10 18:50:56
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout/watch_video.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 2, false),array('function', 'link', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 31, false),array('function', 'get_videos', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 33, false),array('function', 'ANCHOR', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 47, false),array('function', 'FlashPlayer', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 50, false),array('function', 'show_video_rating', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 64, false),array('function', 'show_flag_form', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 109, false),array('function', 'videoLink', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 111, false),array('function', 'show_share_form', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 112, false),array('function', 'show_playlist_form', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 113, false),array('function', 'show_collection_form', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 114, false),array('function', 'show_artist_form_v', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 115, false),array('function', 'AD', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 180, false),array('modifier', 'truncate', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 5, false),array('modifier', 'number_format', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 14, false),array('modifier', 'nicetime', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 102, false),array('modifier', 'description', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 127, false),array('modifier', 'categories', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 135, false),array('modifier', 'tags', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/watch_video.html', 136, false),)), $this); ?>

<?php echo smarty_lang(array('code' => 'video','assign' => 'object_type'), $this);?>

<?php $this->assign('u', $this->_tpl_vars['userquery']->get_user_details($this->_tpl_vars['vdo']['userid'])); ?>
<div class="LiftSide">
<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['vdo']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 100) : smarty_modifier_truncate($_tmp, 100)); ?>
</h1>
<div style="height:5px; clear:both;"></div>
<div class="sub_post moveL">
     <a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['vdo']); ?>
" title="<?php echo $this->_tpl_vars['vdo']['username']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['vdo']['username'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20) : smarty_modifier_truncate($_tmp, 20)); ?>
</a>
</div>
<div class="clearfix UploadInfo">
    
<span class="cb-category full_round_5 moveL" onclick='beginToggle(this,"OpenUserVideo")' style="margin-right:5px; padding:11px;">
    <button class="OpenArrow" id="UVToggle"></button>
    <?php echo ((is_array($_tmp=$this->_tpl_vars['u']['total_videos'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 videos
</span>

<div class="sub_post moveL">
	<?php if (! $this->_tpl_vars['userquery']->is_subscribed($this->_tpl_vars['vdo']['userid'])): ?>
	<div class="subscribe myacc_S_btn full_round" onClick="subscriber('<?php echo $this->_tpl_vars['vdo']['userid']; ?>
','subscribe_user','Vdo_Subs')"><?php echo smarty_lang(array('code' => 'subscribe'), $this);?>
</div>
	<?php else: ?>
	<div class="subscribe myacc_S_btn full_round" onClick="subscriber('<?php echo $this->_tpl_vars['vdo']['userid']; ?>
','unsubscribe_user','Vdo_Subs')"><?php echo smarty_lang(array('code' => 'unsubscribe'), $this);?>
</div>
	<?php endif; ?>
</div>
</div> <!-- UploadInfo -->
<div class="video_action_result_boxes">
	<div class="action_box full_round_5" style="display:none; padding:5px;" id="Vdo_Subs"></div>
</div>
<div style="position:relative">
<div id="OpenUserVideo" class="UserVideoCon full_round_5 clearfix">
<div class="UVCTop">
<a href="<?php echo cblink(array('name' => 'user_videos'), $this);?>
<?php echo $this->_tpl_vars['vdo']['username']; ?>
">See All Videos</a>
</div>
<?php echo get_videos(array('user' => $this->_tpl_vars['vdo']['userid'],'assign' => 'user_vids','limit' => 10,'exclude' => $this->_tpl_vars['vdo']['videoid']), $this);?>

<div class="UVCBottom">    
    <?php if ($this->_tpl_vars['user_vids']): ?>
    <?php unset($this->_sections['uvlist']);
$this->_sections['uvlist']['name'] = 'uvlist';
$this->_sections['uvlist']['loop'] = is_array($_loop=$this->_tpl_vars['user_vids']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['uvlist']['show'] = true;
$this->_sections['uvlist']['max'] = $this->_sections['uvlist']['loop'];
$this->_sections['uvlist']['step'] = 1;
$this->_sections['uvlist']['start'] = $this->_sections['uvlist']['step'] > 0 ? 0 : $this->_sections['uvlist']['loop']-1;
if ($this->_sections['uvlist']['show']) {
    $this->_sections['uvlist']['total'] = $this->_sections['uvlist']['loop'];
    if ($this->_sections['uvlist']['total'] == 0)
        $this->_sections['uvlist']['show'] = false;
} else
    $this->_sections['uvlist']['total'] = 0;
if ($this->_sections['uvlist']['show']):

            for ($this->_sections['uvlist']['index'] = $this->_sections['uvlist']['start'], $this->_sections['uvlist']['iteration'] = 1;
                 $this->_sections['uvlist']['iteration'] <= $this->_sections['uvlist']['total'];
                 $this->_sections['uvlist']['index'] += $this->_sections['uvlist']['step'], $this->_sections['uvlist']['iteration']++):
$this->_sections['uvlist']['rownum'] = $this->_sections['uvlist']['iteration'];
$this->_sections['uvlist']['index_prev'] = $this->_sections['uvlist']['index'] - $this->_sections['uvlist']['step'];
$this->_sections['uvlist']['index_next'] = $this->_sections['uvlist']['index'] + $this->_sections['uvlist']['step'];
$this->_sections['uvlist']['first']      = ($this->_sections['uvlist']['iteration'] == 1);
$this->_sections['uvlist']['last']       = ($this->_sections['uvlist']['iteration'] == $this->_sections['uvlist']['total']);
?>
    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/video.html", 'smarty_include_vars' => array('video' => $this->_tpl_vars['user_vids'][$this->_sections['uvlist']['index']],'display_type' => 'WatchUserVideos')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endfor; endif; ?>
   <?php endif; ?>
</div>    
</div> <!--UserVideoCon END-->
</div>
<div class="break2"></div>



    <?php echo ANCHOR(array('place' => 'before_watch_player'), $this);?>

    <!-- Player -->
    <div class="player_container" id="normal_player_cont">
		<?php echo flashPlayer(array('vdetails' => $this->_tpl_vars['vdo'],'width' => 640), $this);?>

    </div>
    <?php if (has_hq ( $this->_tpl_vars['vdo'] )): ?>
    <div class="player_container" style="display:none" id="hd_player_cont">    
        <div id="hd_div" class='video_player'>
            <?php echo flashPlayer(array('vdetails' => $this->_tpl_vars['vdo'],'player_div' => 'hd_div','hq' => true,'width' => 640), $this);?>

		</div>	
    </div>
    <?php endif; ?>
    <!-- Player End -->

<!-- ShareButtons -->    
<div class="ShareButtons clearfix">
	<div class="moveL">
    	<div class="moveL"><?php echo show_video_rating(array('rating' => $this->_tpl_vars['vdo']['rating'],'ratings' => $this->_tpl_vars['vdo']['rated_by'],'total' => '10','id' => $this->_tpl_vars['vdo']['videoid'],'type' => 'video'), $this);?>
</div>
        
      <div class="TextNone moveL" style="position:relative">
    	<a href="javascript:void(0)" title="<?php echo smarty_lang(array('code' => 'Playlist'), $this);?>
" onclick="slide_up_watch_video('#playlist_form');$('#playlist_form').slideToggle();">  	
    	<div class="FavButton efe_fff left_round moveL" style="margin-right:0px; padding:9px; margin-left:8px;">
        <img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="AddToIcon" /><span style="margin-left:3px;">Add to</span>
        </div></a>
        <div class="FavButton efe_fff right_round moveL" onclick='$("#OpenFav").toggleClass("");$("#OpenAddTo").toggle()' style="border-left:0px;  padding: 10px;">
        <button class="FavtIcon" id="OpenFav"></button>
        </div>
        <div id="OpenAddTo" class="FavtText" style="display:none; clear:both">
            <ul>
                <li><a href="javascript:void(0)" onclick="slide_up_watch_video('#video_action_result_cont');add_to_fav('video','<?php echo $this->_tpl_vars['vdo']['videoid']; ?>
');$(this).parents('div#OpenAddTo').hide()">Favorite</a></li>
                <li><a href="javascript:void(0)" title="<?php echo smarty_lang(array('code' => 'Playlist'), $this);?>
" onclick="slide_up_watch_video('#playlist_form');$('#playlist_form').slideToggle();$(this).parents('div#OpenAddTo').hide()">Playlist</a></li>
                <?php if (userid ( )): ?>
                <li><a href="javascript:void(0)" onclick="slide_up_watch_video('#addCollectionCont');$('#addCollectionCont').slideToggle();$(this).parents('div#OpenAddTo').hide()">Collection</a></li> 
                <li><a href="javascript:void(0)" onclick="slide_up_watch_video('#addArtistCont');$('#addArtistCont').slideToggle();$(this).parents('div#OpenAddTo').hide()">Artist</a></li> 
                <?php endif; ?>
            </ul>       		
        </div>
        </div>
        <div class="TextNone moveL">
             <a href="javascript:void(0)" title="<?php echo smarty_lang(array('code' => 'share_form'), $this);?>
" onclick="slide_up_watch_video('#share_form');$('#share_form').slideToggle();">
            <div class="FavButton efe_fff full_round moveL" style="width:34px; padding:9px;">Share</div>
            </a>
        </div>
        <a href="javascript:void(0)" title="<?php echo smarty_lang(array('code' => 'report_this'), $this);?>
" onclick="slide_up_watch_video('#flag_item');$('#flag_item').slideToggle();">
        <div class="FavButton efe_fff full_round moveL" style=" padding:8px;"><img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="FlagIcon" /></div></a>
    </div> <!--moveL END-->    
    
    <div class="moveR">
    	<div class="WatchViews">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['vdo']['views'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <span style="font-size:14px">views</span>       
    	</div>
    </div>
</div> <!-- ShareButtons -->

<div class="uploading_detail moveR">
	<?php echo smarty_lang(array('code' => 'uploaded by'), $this);?>
 <a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['vdo']); ?>
"><?php echo $this->_tpl_vars['vdo']['username']; ?>
</a>  <?php echo ((is_array($_tmp=$this->_tpl_vars['vdo']['date_added'])) ? $this->_run_mod_handler('nicetime', true, $_tmp) : nicetime($_tmp)); ?>

</div>
<div class="break2"></div>
<div class="clearfix"></div>

<!-- action -->
<div id="video_actions_html_container" class="video_action_result_boxes">
    <?php echo show_flag_form(array('id' => $this->_tpl_vars['vdo']['videoid'],'type' => 'Video'), $this);?>

    <div class="action_box full_round_5" style="display:none; padding:5px;" id="video_action_result_cont"></div>
    <?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['vdo'],'assign' => 'WatchVideo'), $this);?>

    <?php echo show_share_form(array('id' => $this->_tpl_vars['vdo']['videoid'],'type' => 'Video','object_url' => $this->_tpl_vars['WatchVideo']), $this);?>

    <?php echo show_playlist_form(array('id' => $this->_tpl_vars['vdo']['videoid'],'type' => 'Video'), $this);?>

    <div id="addCollectionCont" style="display:none"><?php echo show_collection_form(array('id' => $this->_tpl_vars['vdo']['videoid'],'type' => 'Video'), $this);?>
</div>
    <div id="addArtistCont" style="display:none"><?php echo show_artist_form_v(array('id' => $this->_tpl_vars['vdo']['videoid'],'type' => 'Video'), $this);?>
</div>
</div>

<ol id="toc">
    <li><a href="#page-1"><span><?php echo smarty_lang(array('code' => 'descrition'), $this);?>
</span></a></li>
    <li><a href="#page-2"><span><?php echo smarty_lang(array('code' => 'Lyrics'), $this);?>
</span></a></li>
	<li><a href="#page-3"><span><?php echo smarty_lang(array('code' => 'comments'), $this);?>
 (<?php echo $this->_tpl_vars['vdo']['comments_count']; ?>
)</span></a></li>
    
</ol>
<div class="content" id="page-1">
<!-- description -->
<!-- <div id="OpenShowMore" class="OpenSM" style="display:block;">
	<div class="WVDec"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vdo']['description'])) ? $this->_run_mod_handler('description', true, $_tmp) : description($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</div>
	<span class="ShowMore eaf_fff bottom_round_5" onclick='$("#OpenShowMore").hide();$("#OpenShowLess").show();'>	
		<div class="dasdawq">Show more</div>
	</span>
</div> -->
<!-- <div id="OpenShowLess" class="OpenSM" style="display:none;"> -->
	<div class="OpenSM">
	<div class="WVDec"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['vdo']['description'])) ? $this->_run_mod_handler('description', true, $_tmp) : description($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</div>     
	<div class="VideoCate">Category:<br /><?php echo ((is_array($_tmp=$this->_tpl_vars['vdo']['category'])) ? $this->_run_mod_handler('categories', true, $_tmp, 'video') : categories($_tmp, 'video')); ?>
</div>
	<div class="VideoCate">Tags:<br /><?php echo ((is_array($_tmp=$this->_tpl_vars['vdo']['tags'])) ? $this->_run_mod_handler('tags', true, $_tmp, 'videos') : tags($_tmp, 'videos')); ?>
</div>
 	<!--span class="ShowMore eaf_fff bottom_round_5 SM_img_closed" onclick='$("#OpenShowLess").hide();$("#OpenShowMore").show();'>	
	<div class="dasdawq">Show less</div>
	</span-->
</div>
</div>
<div class="content" id="page-2">
	<div class="clearfix" style="background-color: whiteSmoke;margin-bottom:20px;font-family: 'Hoefler Text', Georgia, 'Times New Roman', serif;">
	<div style="margin:5px 5px 5px 5px"><?php echo $this->_tpl_vars['vdo']['lyric']; ?>
</div>
	</div>
</div>
<div class="content" id="page-3">
<!-- Comments -->
<div class="WVComments">    
    <div id="comments"></div>
    <script>
		$(document).ready(function()
		{		
			comments_voting = '<?php echo $this->_tpl_vars['vdo']['comment_voting']; ?>
';	
			getComments('<?php echo $this->_tpl_vars['type']; ?>
','<?php echo $this->_tpl_vars['vdo']['videoid']; ?>
','<?php echo $this->_tpl_vars['vdo']['last_commented']; ?>
',1,'<?php echo $this->_tpl_vars['vdo']['comments_count']; ?>
','<?php echo $this->_tpl_vars['object_type']; ?>
')
		}
		);
	</script>
    
    <?php if ($this->_tpl_vars['myquery']->is_commentable($this->_tpl_vars['vdo'],'v')): ?>
    	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/comments/add_comment.html", 'smarty_include_vars' => array('id' => $this->_tpl_vars['vdo']['videoid'],'type' => 'v')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php else: ?>
    	<div class="disable_msg" align="center"><?php echo smarty_lang(array('code' => 'comm_disabled_for_vid'), $this);?>
</div>
    <?php endif; ?>    


</div>
</div>  
<script src="<?php echo $this->_tpl_vars['js']; ?>
/activatables.js" type="text/javascript"></script>
<script type="text/javascript">activatables('page', ['page-1', 'page-2', 'page-3']);</script>





</div> <!-- LiftSide -->

<div class="RightSide">

<?php echo getAd(array('place' => 'ad_300x250'), $this);?>


<div class="break5"></div>

<?php if ($this->_tpl_vars['open_collection']): ?>
	<!-- Loading items from collection -->
<div class="MPhotoTitle" style="font-weight: bold;font-size:15px; color:#000; padding-bottom:3px; cursor:pointer;" onclick='$(this).toggleClass("");$("#vid_collections_list").slideToggle("fast")'>
	<a>Collection - <?php echo $this->_tpl_vars['c']['collection_name']; ?>
</a>
</div>
<div id="vid_collections_list" style="display:block;">
		<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>					
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/quicklist/video_block.html", 'smarty_include_vars' => array('video' => $this->_tpl_vars['item'],'selected' => $this->_tpl_vars['vdo']['videoid'],'bg' => $this->_tpl_vars['bg'],'videoLink' => $this->_tpl_vars['cbphoto']->photo_links($this->_tpl_vars['item'],'view_item'))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			
			<?php if ($this->_tpl_vars['vdo']['videoid'] == $this->_tpl_vars['item']['videoid']): ?>
			<?php $this->assign('pre_lock', 'yes'); ?>
			<?php else: ?>
				<?php if (! $this->_tpl_vars['pre_lock']): ?>
					<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['item'],'assign' => 'pre_vid'), $this);?>

				<?php else: ?>
					<?php if (! $this->_tpl_vars['next_lock']): ?>
						 <?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['item'],'assign' => 'next_vid'), $this);?>

						 <?php $this->assign('next_lock', 'yes'); ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<!-- Loading items ends -->
</div>
<?php endif; ?>


<!-- Collections -->
<!-- <?php if (userid ( )): ?>
<?php $this->assign('collections', $this->_tpl_vars['cbvid']->collection->getCollectionFromItem($this->_tpl_vars['vdo']['videoid'])); ?>
<?php if ($this->_tpl_vars['collections']): ?>
<div class="MPhotoTitle" style="font-size:13px; color:#666; padding-bottom:3px; cursor:pointer;" onclick='$(this).toggleClass("");$("#vid_collections_private").slideToggle("fast")'>
	<a><?php echo smarty_lang(array('code' => 'Private Collections'), $this);?>
</a>
</div>
<div id="vid_collections_private" style="display:block;">
	<?php echo smarty_lang(array('code' => 'this_video_found_in_no_collection'), $this);?>

	<?php $_from = $this->_tpl_vars['collections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['collect'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['collect']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['collection']):
        $this->_foreach['collect']['iteration']++;
?>
		<div class="watch_collect_item">
			<?php echo $this->_foreach['collect']['iteration']; ?>
. <a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection']['collection_id'],'view'); ?>
"><?php echo $this->_tpl_vars['collection']['collection_name']; ?>
</a>
		</div>
	<?php endforeach; endif; unset($_from); ?>

</div>
<?php endif; ?>
<?php endif; ?> -->
<!-- Collections -->

<!-- Public Collections -->
<?php $this->assign('collections', $this->_tpl_vars['cbvid']->collection->getPublicCollectionFromItem($this->_tpl_vars['vdo']['videoid'])); ?>
<?php if ($this->_tpl_vars['collections']): ?>
<div class="MPhotoTitle" style="font-size:13px; color:#666; padding-bottom:3px; cursor:pointer;" onclick='$(this).toggleClass("");$("#vid_collections_public").slideToggle("fast")'>
	<a><?php echo smarty_lang(array('code' => 'Collections'), $this);?>
</a>
</div>
<div id="vid_collections_public" style="display:block;">
	<?php echo smarty_lang(array('code' => 'this_video_found_in_no_collection'), $this);?>

	<?php $_from = $this->_tpl_vars['collections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['collect'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['collect']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['collection']):
        $this->_foreach['collect']['iteration']++;
?>
		<div class="watch_collect_item">
			<?php echo $this->_foreach['collect']['iteration']; ?>
. <a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection']['collection_id'],'view'); ?>
"><?php echo $this->_tpl_vars['collection']['collection_name']; ?>
</a>
		</div>
	<?php endforeach; endif; unset($_from); ?>

</div>
<?php endif; ?>
<!-- Public Collections -->

<div class="break5"></div>

<!-- Playlist -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/playlist_box.html", 'smarty_include_vars' => array('selected' => $this->_tpl_vars['vdo']['videoid'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!-- Playlist End-->

<?php $this->assign('videos_items_columns', config(videos_items_columns)); ?>
<!-- Related Videos based on category, please remove * and also above smarty function -->
<div class="MPhotoTitle" style="font-size:13px; color:#666; padding-bottom:3px; cursor:pointer;" onclick='$(this).toggleClass("");$("#vid_suggestions").slideToggle("fast")'>
	<a><?php echo smarty_lang(array('code' => 'Suggestions'), $this);?>
</a>
</div>
<div id="vid_suggestions" style="display:block;">	
	<?php echo get_videos(array('category' => $this->_tpl_vars['vid_cat'],'exclude' => $this->_tpl_vars['vdo']['videoid'],'limit' => $this->_tpl_vars['videos_items_columns'],'order' => 'date_added ASC','broadcast' => 'public','assign' => 'related_vids'), $this);?>

	<?php unset($this->_sections['feat_vid']);
$this->_sections['feat_vid']['name'] = 'feat_vid';
$this->_sections['feat_vid']['loop'] = is_array($_loop=$this->_tpl_vars['related_vids']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['feat_vid']['show'] = true;
$this->_sections['feat_vid']['max'] = $this->_sections['feat_vid']['loop'];
$this->_sections['feat_vid']['step'] = 1;
$this->_sections['feat_vid']['start'] = $this->_sections['feat_vid']['step'] > 0 ? 0 : $this->_sections['feat_vid']['loop']-1;
if ($this->_sections['feat_vid']['show']) {
    $this->_sections['feat_vid']['total'] = $this->_sections['feat_vid']['loop'];
    if ($this->_sections['feat_vid']['total'] == 0)
        $this->_sections['feat_vid']['show'] = false;
} else
    $this->_sections['feat_vid']['total'] = 0;
if ($this->_sections['feat_vid']['show']):

            for ($this->_sections['feat_vid']['index'] = $this->_sections['feat_vid']['start'], $this->_sections['feat_vid']['iteration'] = 1;
                 $this->_sections['feat_vid']['iteration'] <= $this->_sections['feat_vid']['total'];
                 $this->_sections['feat_vid']['index'] += $this->_sections['feat_vid']['step'], $this->_sections['feat_vid']['iteration']++):
$this->_sections['feat_vid']['rownum'] = $this->_sections['feat_vid']['iteration'];
$this->_sections['feat_vid']['index_prev'] = $this->_sections['feat_vid']['index'] - $this->_sections['feat_vid']['step'];
$this->_sections['feat_vid']['index_next'] = $this->_sections['feat_vid']['index'] + $this->_sections['feat_vid']['step'];
$this->_sections['feat_vid']['first']      = ($this->_sections['feat_vid']['iteration'] == 1);
$this->_sections['feat_vid']['last']       = ($this->_sections['feat_vid']['iteration'] == $this->_sections['feat_vid']['total']);
?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/video.html", 'smarty_include_vars' => array('video' => $this->_tpl_vars['related_vids'][$this->_sections['feat_vid']['index']],'display_type' => 'featured_video')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endfor; endif; ?>
</div> <!-- TPhotoCon End -->


</div> <!-- RightSide -->


