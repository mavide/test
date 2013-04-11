<?php /* Smarty version 2.6.18, created on 2013-04-10 18:34:46
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout/blocks/video.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'videoLink', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 7, false),array('function', 'getThumb', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 7, false),array('function', 'ANCHOR', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 7, false),array('function', 'avatar', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 23, false),array('function', 'lang', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 51, false),array('modifier', 'SetTime', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 8, false),array('modifier', 'truncate', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 18, false),array('modifier', 'description', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 20, false),array('modifier', 'niceTime', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 25, false),array('modifier', 'categories', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 52, false),array('modifier', 'number_format', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 174, false),array('modifier', 'capitalize', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/video.html', 174, false),)), $this); ?>
<?php if ($this->_tpl_vars['display_type'] == 'normala' || $this->_tpl_vars['display_type'] == 'a'): ?>
<!-- Video Box -->

<div id="vid_wrap_<?php echo $this->_tpl_vars['video']['videoid']; ?>
" class="<?php if ($this->_tpl_vars['video_view']): ?><?php echo $this->_tpl_vars['video_view']; ?>
<?php else: ?>grid_view <?php if ($this->_tpl_vars['cur_class'] == 'grid_view'): ?><?php else: ?><?php echo $this->_tpl_vars['cur_class']; ?>
<?php endif; ?><?php endif; ?>">
	
    <div class="vid_thumb">
    	<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" width="120" height="70" title="<?php echo $this->_tpl_vars['video']['title']; ?>
" alt="<?php echo $this->_tpl_vars['video']['title']; ?>
" <?php echo ANCHOR(array('place' => 'video_thumb','data' => $this->_tpl_vars['video']), $this);?>
 /></a>
        <span class="vid_time"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['duration'])) ? $this->_run_mod_handler('SetTime', true, $_tmp) : SetTime($_tmp)); ?>
</span>
		<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="add_icon" onclick="add_quicklist(this,'<?php echo $this->_tpl_vars['video']['videoid']; ?>
')" title="Add <?php echo $this->_tpl_vars['video']['title']; ?>
 to Quicklist" alt="Quicklist" />   
        <?php if ($this->_tpl_vars['video']['broadcast'] == 'private'): ?>
        	<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><span class="private_video">&nbsp;</span></a>
        <?php endif; ?>
        <?php echo ANCHOR(array('place' => 'in_video_thumb','data' => $this->_tpl_vars['video']), $this);?>
    
    </div> <!--VID_THUMB END-->
    
    <div class="vid_info_wrap">

        <div class="Video_title"><a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</a></div>
                 
<!--p id="desc" class="vid_info" style="margin:0px;color: #999999;max-height: 28px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['video']['description'])) ? $this->_run_mod_handler('description', true, $_tmp) : description($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</p-->
<p class="vid_info" style="margin:0px;line-height: 14px; color:#000; font-size: 10px;"><?php echo $this->_tpl_vars['video']['views']; ?>
 Views</p>  
<p class="vid_info" style=" margin: 6px 0 0;"><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['video']); ?>
">        
<img src="<?php echo avatar(array('uid' => $this->_tpl_vars['video']['userid']), $this);?>
" border="0" width="20" height="20" style="float:left;"></a>
<a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['video']); ?>
"><?php echo $this->_tpl_vars['video']['username']; ?>
 </a> 
<span class="info_list">Uploaded <?php echo ((is_array($_tmp=$this->_tpl_vars['video']['date_added'])) ? $this->_run_mod_handler('niceTime', true, $_tmp) : niceTime($_tmp)); ?>
</span></p>
    </div> <!--VID_INFO_WRAP END-->
    
</div> <!--VID_WRAP END-->

<?php if ($this->_tpl_vars['only_once']): ?>
    <div class="clearfix"></div>
<?php endif; ?>
<!-- Video Box -->
<?php endif; ?>

<?php if ($this->_tpl_vars['display_type'] == "" || $this->_tpl_vars['display_type'] == 'normal'): ?>
<div class="image505" style="width: 180px;height: 165px;">	
	<div class="vid_thumb">
		<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
">
		<img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" width="178" height="100"  style="border:none;"/></a>
		<span class="vid_time"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['duration'])) ? $this->_run_mod_handler('SetTime', true, $_tmp) : SetTime($_tmp)); ?>
</span>
		<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="add_icon" onclick="add_quicklist(this,'<?php echo $this->_tpl_vars['video']['videoid']; ?>
')" title="Add <?php echo $this->_tpl_vars['video']['title']; ?>
 to Quicklist" alt="Quicklist" />   
        <?php if ($this->_tpl_vars['video']['broadcast'] == 'private'): ?>
        	<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><span class="private_video">&nbsp;</span></a>
        <?php endif; ?>
        <?php echo ANCHOR(array('place' => 'in_video_thumb','data' => $this->_tpl_vars['video']), $this);?>
 
	</div>
	<div class="clearfix"></div>
	<div class="box_one" style="">
		<div class="textyui"><a href="<?php echo $this->_tpl_vars['cbartist']->artist_links($this->_tpl_vars['artist'],'view'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</a></div>
		<div class="command" style="color: #666666;font-size: 11px;font-weight: normal;"><?php echo $this->_tpl_vars['video']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div> 
		<div class="tag"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['category'])) ? $this->_run_mod_handler('categories', true, $_tmp, 'video') : categories($_tmp, 'video')); ?>
</span></div>
		
	</div>
</div><!--image500-->
<?php endif; ?>

<?php if ($this->_tpl_vars['display_type'] == 'Being_Watch'): ?>

<li>
 <div class="WCon" style=""> 
<div class="vid_thumb">

 <a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" width="96" height="54" title="<?php echo $this->_tpl_vars['video']['title']; ?>
" alt="<?php echo $this->_tpl_vars['video']['title']; ?>
" <?php echo ANCHOR(array('place' => 'video_thumb','data' => $this->_tpl_vars['video']), $this);?>
 /></a>    
<span class="vid_time"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['duration'])) ? $this->_run_mod_handler('SetTime', true, $_tmp) : SetTime($_tmp)); ?>
</span>    
<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="add_icon" onclick="add_quicklist(this,'<?php echo $this->_tpl_vars['video']['videoid']; ?>
')" title="Add <?php echo $this->_tpl_vars['video']['title']; ?>
 to Quicklist" alt="Quicklist" style="border:medium none;" />  
<?php if ($this->_tpl_vars['video']['broadcast'] == 'private'): ?>
<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><span class="private_video">&nbsp;</span></a>
<?php endif; ?>
<?php echo ANCHOR(array('place' => 'in_video_thumb','data' => $this->_tpl_vars['video']), $this);?>
     
</div><!--vid_thumb -->  
<div class="box_one" style="">
<div class="textyui" style=""><a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['video']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10) : smarty_modifier_truncate($_tmp, 10)); ?>
</a></div>
<div class="command_2" style="color: #666666;font-size: 11px;font-weight: normal;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['video']['description'])) ? $this->_run_mod_handler('description', true, $_tmp) : description($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 10) : smarty_modifier_truncate($_tmp, 10)); ?>
</div>


<div class="command_2" style="color: #666666;font-size: 11px;font-weight: normal;"><?php echo $this->_tpl_vars['video']['views']; ?>
 Views</div>

</div>     
        
    </div>
</li>


<?php endif; ?>

<?php if ($this->_tpl_vars['display_type'] == 'featured_video'): ?>
<div class="hight_box">
<div class="vid_thumb" style="float: left; margin: 0 6px 0 0;">
<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" width="120" height="70" title="<?php echo $this->_tpl_vars['video']['title']; ?>
" alt="<?php echo $this->_tpl_vars['video']['title']; ?>
" <?php echo ANCHOR(array('place' => 'video_thumb','data' => $this->_tpl_vars['video']), $this);?>
 /></a>
        <span class="vid_time"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['duration'])) ? $this->_run_mod_handler('SetTime', true, $_tmp) : SetTime($_tmp)); ?>
</span>
		<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="add_icon" onclick="add_quicklist(this,'<?php echo $this->_tpl_vars['video']['videoid']; ?>
')" title="Add <?php echo $this->_tpl_vars['video']['title']; ?>
 to Quicklist" alt="Quicklist" />   
        <?php if ($this->_tpl_vars['video']['broadcast'] == 'private'): ?>
        	<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><span class="private_video">&nbsp;</span></a>
        <?php endif; ?>
        <?php echo ANCHOR(array('place' => 'in_video_thumb','data' => $this->_tpl_vars['video']), $this);?>
    
    </div> <!--VID_THUMB END-->
<div class="right_box" style="float:left;">
<div class="text89"><a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" title="<?php echo $this->_tpl_vars['video']['title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25) : smarty_modifier_truncate($_tmp, 25)); ?>
</a></div>
<div class="vid" style="color: #666666;display: block;font-size: 0.9166em;height: 1.4em;line-height: 1.4em;overflow: hidden;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['video']['description'])) ? $this->_run_mod_handler('description', true, $_tmp) : description($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
</div>
<p class="info" style="color: #666666;display: block;font-size: 0.9166em;height: 1.4em;line-height: 1.4em;overflow: hidden; margin:0px;"><?php echo $this->_tpl_vars['video']['views']; ?>
 Views</p>
</div>
</div>
<?php endif; ?>     


      
<?php if ($this->_tpl_vars['display_type'] == 'featurea'): ?>
<div class="videos_bom">
<div class="vid_thumb">
<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" width="177" height="100" title="<?php echo $this->_tpl_vars['video']['title']; ?>
" alt="<?php echo $this->_tpl_vars['video']['title']; ?>
" <?php echo ANCHOR(array('place' => 'video_thumb','data' => $this->_tpl_vars['video']), $this);?>
 /></a>

<span class="vid_time"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['duration'])) ? $this->_run_mod_handler('SetTime', true, $_tmp) : SetTime($_tmp)); ?>
</span>
<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="add_icon" onclick="add_quicklist(this,'<?php echo $this->_tpl_vars['video']['videoid']; ?>
')" title="Add <?php echo $this->_tpl_vars['video']['title']; ?>
 to Quicklist" alt="Quicklist" />   
<?php if ($this->_tpl_vars['video']['broadcast'] == 'private'): ?>
<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><span class="private_video">&nbsp;</span></a>
<?php endif; ?>
<?php echo ANCHOR(array('place' => 'in_video_thumb','data' => $this->_tpl_vars['video']), $this);?>
    
</div> <!--VID_THUMB END-->

<div class="Videos_tittle" style="margin-top:8px;display: inline-block;">    
<div class="gfd" style=""><a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" title="<?php echo $this->_tpl_vars['video']['title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 15) : smarty_modifier_truncate($_tmp, 15)); ?>
</a></div>
<div class="jhjhg" style="color: #666666;display: inline;font-weight: normal; font-size:11px;"><span><?php echo $this->_tpl_vars['video']['views']; ?>
</span> view | <?php echo ((is_array($_tmp=$this->_tpl_vars['video']['date_added'])) ? $this->_run_mod_handler('niceTime', true, $_tmp) : niceTime($_tmp)); ?>
 </div>
<p class="font" style="margin:-1px 0 0;"><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['video']); ?>
"><?php echo $this->_tpl_vars['video']['username']; ?>
</a> </p> 
</div><!--Videos_tittle-->
</div><!--videos_bom-->
<?php endif; ?>    


<?php if ($this->_tpl_vars['display_type'] == 'featurea'): ?>
<div class="videos_bom">
<div class="vid_thumb">
<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" width="177" height="100" title="<?php echo $this->_tpl_vars['video']['title']; ?>
" alt="<?php echo $this->_tpl_vars['video']['title']; ?>
" <?php echo ANCHOR(array('place' => 'video_thumb','data' => $this->_tpl_vars['video']), $this);?>
 /></a>

<span class="vid_time"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['duration'])) ? $this->_run_mod_handler('SetTime', true, $_tmp) : SetTime($_tmp)); ?>
</span>
<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="add_icon" onclick="add_quicklist(this,'<?php echo $this->_tpl_vars['video']['videoid']; ?>
')" title="Add <?php echo $this->_tpl_vars['video']['title']; ?>
 to Quicklist" alt="Quicklist" />   
<?php if ($this->_tpl_vars['video']['broadcast'] == 'private'): ?>
<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><span class="private_video">&nbsp;</span></a>
<?php endif; ?>
<?php echo ANCHOR(array('place' => 'in_video_thumb','data' => $this->_tpl_vars['video']), $this);?>
    
</div> <!--VID_THUMB END-->

<div class="Videos_tittle" style="margin-top:8px;display: inline-block;">    
<div class="gfd" style=""><a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" title="<?php echo $this->_tpl_vars['video']['title']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 15) : smarty_modifier_truncate($_tmp, 15)); ?>
</a></div>
<div class="jhjhg" style="color: #666666;display: inline;font-weight: normal; font-size:11px;"><span><?php echo $this->_tpl_vars['video']['views']; ?>
</span> view | <?php echo ((is_array($_tmp=$this->_tpl_vars['video']['date_added'])) ? $this->_run_mod_handler('niceTime', true, $_tmp) : niceTime($_tmp)); ?>
 </div>
<p class="font" style="margin:-1px 0 0;"><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['video']); ?>
"><?php echo $this->_tpl_vars['video']['username']; ?>
</a> </p> 
</div><!--Videos_tittle-->
</div><!--videos_bom-->
<?php endif; ?>  


<?php if ($this->_tpl_vars['display_type'] == 'feature'): ?>
<div class="box">


<div class="main_vids clearfix">

<div class="main_vids clearfix" style="display: block;">
	<div class="grid_view">

		<div class="vid_thumb">
			<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" width="177" height="100"  title="<?php echo $this->_tpl_vars['video']['title']; ?>
" alt="<?php echo $this->_tpl_vars['video']['title']; ?>
" <?php echo ANCHOR(array('place' => 'video_thumb','data' => $this->_tpl_vars['video']), $this);?>
 style="border:none;"/></a>
		
		<span class="vid_time"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['duration'])) ? $this->_run_mod_handler('SetTime', true, $_tmp) : SetTime($_tmp)); ?>
</span>
		<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="add_icon" onclick="add_quicklist(this,'<?php echo $this->_tpl_vars['video']['videoid']; ?>
')" title="Add <?php echo $this->_tpl_vars['video']['title']; ?>
 to Quicklist" alt="Quicklist" />   
		<?php if ($this->_tpl_vars['video']['broadcast'] == 'private'): ?>
		<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><span class="private_video">&nbsp;</span></a>
		<?php endif; ?>
		<?php echo ANCHOR(array('place' => 'in_video_thumb','data' => $this->_tpl_vars['video']), $this);?>
 
		</div>

		<div class="vid_info_wrap">
			<div><a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a></div>
			<!--div><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</div--> 
			<div><?php echo $this->_tpl_vars['video']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div>
			<div class="tag"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['category'])) ? $this->_run_mod_handler('categories', true, $_tmp, 'video') : categories($_tmp, 'video')); ?>
</span></div>
			<!--div><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['collection']); ?>
" title="<?php echo $this->_tpl_vars['collection']['username']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['username'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 16) : smarty_modifier_truncate($_tmp, 16)); ?>
</a></div-->
		</div>

	</div>
</div>


</div> <!--MAIN_VIDS END-->

</div><!--box-->
<?php endif; ?>  


<?php if ($this->_tpl_vars['display_type'] == 'channel_page'): ?>
	<li class="itemBox" onclick="loadObject(this,'videos','<?php echo $this->_tpl_vars['video']['videoid']; ?>
','viewingArea')">
    	<div align="center"><img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" alt="<?php echo $this->_tpl_vars['video']['title']; ?>
" width="110" height="64" /></div>
    </li> <!-- itemBox <?php echo $this->_tpl_vars['video']['videokey']; ?>
 end -->
<?php endif; ?>     
   
    
    
    
    





<?php if ($this->_tpl_vars['display_type'] == 'WatchUserVideos'): ?>
 <div class="UVCon"> 
<div class="vid_thumb">

 <a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" width="100" height="50" title="<?php echo $this->_tpl_vars['video']['title']; ?>
" alt="<?php echo $this->_tpl_vars['video']['title']; ?>
" <?php echo ANCHOR(array('place' => 'video_thumb','data' => $this->_tpl_vars['video']), $this);?>
 /></a>    
<span class="vid_time"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['duration'])) ? $this->_run_mod_handler('SetTime', true, $_tmp) : SetTime($_tmp)); ?>
</span>    
<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="add_icon" onclick="add_quicklist(this,'<?php echo $this->_tpl_vars['video']['videoid']; ?>
')" title="Add <?php echo $this->_tpl_vars['video']['title']; ?>
 to Quicklist" alt="Quicklist" />  
<?php if ($this->_tpl_vars['video']['broadcast'] == 'private'): ?>
<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
"><span class="private_video">&nbsp;</span></a>
<?php endif; ?>
<?php echo ANCHOR(array('place' => 'in_video_thumb','data' => $this->_tpl_vars['video']), $this);?>
     
</div><!--vid_thumb -->  
<div class="box_one" style="">
<div class="textyui"><a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['video']), $this);?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['video']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30) : smarty_modifier_truncate($_tmp, 30)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['video']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10) : smarty_modifier_truncate($_tmp, 10)); ?>
</a></div>
<div class="command_2" style="color: #666666;font-size: 11px;font-weight: normal;"><?php echo $this->_tpl_vars['video']['views']; ?>
 Views</div>
</div>     
        
    </div>
<?php endif; ?>






