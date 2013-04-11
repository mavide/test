<?php /* Smarty version 2.6.18, created on 2013-04-10 18:34:47
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout//blocks/collection.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/collection.html', 10, false),array('modifier', 'number_format', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/collection.html', 11, false),array('modifier', 'capitalize', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/collection.html', 11, false),array('modifier', 'categories', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/collection.html', 51, false),array('function', 'lang', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/collection.html', 12, false),array('function', 'getThumb', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/collection.html', 23, false),array('function', 'get_photo', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/collection.html', 31, false),array('function', 'videoLink', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/collection.html', 199, false),)), $this); ?>
<?php if ($this->_tpl_vars['display_type'] == 'a' || $this->_tpl_vars['display_type'] == 'normala'): ?>
<div class="image505" style="">
<div class="clearfix"></div>
	<div class="image507" style="">
		<div class="thumb_container_medium" style=" display:inline-block;border:1px solid #ccc;"><a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
"><img src="<?php echo $this->_tpl_vars['cbcollection']->get_thumb($this->_tpl_vars['collection'],'small'); ?>
" width="124" height="98"  style="border:none;"/></a>
		</div>
	</div>
<div class="clearfix"></div>
<div style="margin-left:6px">
<div><a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['collection_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 22) : smarty_modifier_truncate($_tmp, 22)); ?>
</a></div>
<div><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</div> 
<div><?php echo $this->_tpl_vars['collection']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div>
<div><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['collection']); ?>
" title="<?php echo $this->_tpl_vars['collection']['username']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['username'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 16) : smarty_modifier_truncate($_tmp, 16)); ?>
</a></div>
</div>
</div><!--image500-->
<?php endif; ?>

<?php if ($this->_tpl_vars['display_type'] == 'view_collectiona'): ?>
<div class="collectItemBox">
	<?php if ($this->_tpl_vars['type'] == 'videos'): ?>
    <div class="collect_grid">
        <a class="CollectThumb" href="<?php echo $this->_tpl_vars['cbphoto']->photo_links($this->_tpl_vars['object'],'view_item'); ?>
">
            <img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['object']), $this);?>
" alt="<?php echo $this->_tpl_vars['object']['title']; ?>
" width="120" height="70" style="border:none;" />
        </a>
    </div> <!-- collection_<?php echo $this->_tpl_vars['collection']['videokey']; ?>
 end -->
    <?php endif; ?>
    
    <?php if ($this->_tpl_vars['type'] == 'photos'): ?>
    <div class="collect_grid">
        <a class="CollectThumb" href="<?php echo $this->_tpl_vars['cbphoto']->photo_links($this->_tpl_vars['object'],'view_item'); ?>
">
            <?php echo get_photo(array('details' => $this->_tpl_vars['object'],'size' => 't','output' => 'html','alt' => $this->_tpl_vars['object']['photo_title']), $this);?>

        </a>        
    </div> <!-- collection_<?php echo $this->_tpl_vars['object']['photo_key']; ?>
 end -->    
    <?php endif; ?>
</div>  
<?php endif; ?>

<?php if ($this->_tpl_vars['display_type'] == 'view_collection'): ?>
	<?php if ($this->_tpl_vars['type'] == 'videos'): ?>
		<div class="box">
		<div class="main_vids clearfix">
		<div class="main_vids clearfix" style="display: block;">
			<div class="grid_view">
				<div class="vid_thumb">
					<a href="<?php echo $this->_tpl_vars['cbphoto']->photo_links($this->_tpl_vars['object'],'view_item'); ?>
"><img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['object']), $this);?>
" alt="<?php echo $this->_tpl_vars['object']['title']; ?>
" width="124" height="98"  style="border:none;"/></a>
				</div>
				<div class="vid_info_wrap">
					<div><a href="<?php echo $this->_tpl_vars['cbphoto']->photo_links($this->_tpl_vars['object'],'view_item'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['object']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a></div>
					<!--div><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</div--> 
					<div><?php echo $this->_tpl_vars['object']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div>
					<div class="tag"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['object']['category'])) ? $this->_run_mod_handler('categories', true, $_tmp, 'collections') : categories($_tmp, 'collections')); ?>
</span></div>
				</div>
			</div>
		</div>
		</div> <!--MAIN_VIDS END-->
		</div><!--box-->
	<?php endif; ?>
	<?php if ($this->_tpl_vars['type'] == 'photos'): ?>
		<div class="box">
		<div class="main_vids clearfix">
		<div class="main_vids clearfix" style="display: block;">
			<div class="grid_view">
				<div class="vid_thumb">
					<a href="<?php echo $this->_tpl_vars['cbphoto']->photo_links($this->_tpl_vars['object'],'view_item'); ?>
">
					<?php echo get_photo(array('details' => $this->_tpl_vars['object'],'size' => 't','output' => 'html','alt' => $this->_tpl_vars['object']['photo_title']), $this);?>

					</a>
				</div>
				<div class="vid_info_wrap">
					<div><a href="<?php echo $this->_tpl_vars['cbphoto']->photo_links($this->_tpl_vars['object'],'view_item'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['object']['photo_title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a></div>
					<!--div><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</div--> 
					<div><?php echo $this->_tpl_vars['object']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div>
				</div>
			</div>
		</div>
		</div> <!--MAIN_VIDS END-->
		</div><!--box-->
	<?php endif; ?>
<?php endif; ?>


<?php if ($this->_tpl_vars['display_type'] == 'aa' || $this->_tpl_vars['display_type'] == 'normalaa'): ?>

<div class="box">
<div class="main_vids clearfix">
<div class="main_vids clearfix" style="display: block;">
	<div class="grid_view">
		<div class="vid_thumb">
			<a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
"><img src="<?php echo $this->_tpl_vars['cbcollection']->get_thumb($this->_tpl_vars['collection'],'small','true'); ?>
" width="124" height="98"  style="border:none;"/></a>
			<span class="vid_time"><?php echo $this->_tpl_vars['collection']['total_objects']; ?>
 <?php echo $this->_tpl_vars['collection']['type']; ?>
</span>
		</div>
		<div class="vid_info_wrap">
			<div><a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['collection_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a></div>
			<!--div><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</div--> 
			<div><?php echo $this->_tpl_vars['collection']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div>
			<div class="tag"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['category'])) ? $this->_run_mod_handler('categories', true, $_tmp, 'collections') : categories($_tmp, 'collections')); ?>
</span></div>
		</div>
	</div>
</div>
</div> <!--MAIN_VIDS END-->
</div><!--box-->
<?php endif; ?>

<?php if ($this->_tpl_vars['display_type'] == "" || $this->_tpl_vars['display_type'] == 'normal'): ?>
<div class="image505" style="width: 180px;height: 195px;">	
	<div class="vid_thumb">
		<a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
">
		<img src="<?php echo $this->_tpl_vars['cbcollection']->get_thumb($this->_tpl_vars['collection'],'small','true'); ?>
" width="128" height="130"  style="border:none;"/></a>
		<span class="vid_time"><?php echo $this->_tpl_vars['collection']['total_objects']; ?>
 <?php echo $this->_tpl_vars['collection']['type']; ?>
</span>
	</div>
	<div class="clearfix"></div>
	<div class="box_one" style="">
		<div class="textyui"><a href="<?php echo $this->_tpl_vars['cbartist']->artist_links($this->_tpl_vars['artist'],'view'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['collection_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</a></div>
		<div class="command" style="color: #666666;font-size: 11px;font-weight: normal;"><?php echo $this->_tpl_vars['collection']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div> 		
		<div class="tag"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['category'])) ? $this->_run_mod_handler('categories', true, $_tmp, 'collections') : categories($_tmp, 'collections')); ?>
</span></div>
	</div>
</div><!--image500-->
<?php endif; ?>

<?php if ($this->_tpl_vars['display_type'] == 'related'): ?>

<div class="relbox" style="display: block;">
	<div class="rel_view">
		<div class="vid_thumb">
			<a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
"><img src="<?php echo $this->_tpl_vars['cbcollection']->get_thumb($this->_tpl_vars['collection'],'small','true'); ?>
" width="124" height="98"  style="border:none;"/></a>
			<span class="vid_time"><?php echo $this->_tpl_vars['collection']['total_objects']; ?>
 <?php echo $this->_tpl_vars['collection']['type']; ?>
</span>
		</div>
		<div class="vid_info_wrap">
			<div><a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['collection_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25) : smarty_modifier_truncate($_tmp, 25)); ?>
</a></div>
			<!--div><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</div--> 
			<div><?php echo $this->_tpl_vars['collection']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div>
			<div class="tag"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['category'])) ? $this->_run_mod_handler('categories', true, $_tmp, 'collections') : categories($_tmp, 'collections')); ?>
</span></div>
		</div>
	</div>
</div><!--box-->
<?php endif; ?>


<?php if ($this->_tpl_vars['display_type'] == 'artist'): ?>

<div class="box">
<div class="main_vids clearfix">
<div class="main_vids clearfix" style="display: block;">
	<div class="grid_view">
		<div class="vid_thumb">
		<a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
">
		<img src="<?php echo $this->_tpl_vars['cbcollection']->get_thumb($this->_tpl_vars['collection'],'small','true'); ?>
" width="124" height="98"  style="border:none;"/></a>
			<span class="vid_time"><?php echo $this->_tpl_vars['artist']['total_objects']; ?>
 <?php echo $this->_tpl_vars['artist']['type']; ?>
</span>
		</div>
		<div class="vid_info_wrap">
			<div class="textyui"><a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['collection_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</a></div>
			<!--div><?php echo ((is_array($_tmp=$this->_tpl_vars['artist']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['artist']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</div--> 
			<div><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php if ($this->_tpl_vars['collection']['type'] == 'videos'): ?> Clips <?php else: ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
  <?php endif; ?>  | <?php echo $this->_tpl_vars['collection']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div>
			<div class="tag"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['username'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 16) : smarty_modifier_truncate($_tmp, 16)); ?>
</span></div>
		</div>
	</div>
</div>
</div> <!--MAIN_VIDS END-->
</div><!--box-->
<?php endif; ?>





<?php if ($this->_tpl_vars['display_type'] == 'artiste'): ?>
<div class="image505"  style="width: 114px;height: 124px;">

<div class="clearfix"></div>

<div class="thumb_container_medium" style=" display:inline-block;border:1px solid #ccc;">
<a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
">
<img src="<?php echo $this->_tpl_vars['cbcollection']->get_thumb($this->_tpl_vars['collection'],'small','true'); ?>
" width="112" height="120"  style="border:none;"/></a>

</div>

<div class="box_one" style="">

<div class="textyui"><a href="<?php echo $this->_tpl_vars['cbcollection']->collection_links($this->_tpl_vars['collection'],'view'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['collection_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</a></div>

<div class="command" style="color: #666666;font-size: 11px;font-weight: normal;"><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php if ($this->_tpl_vars['collection']['type'] == 'videos'): ?> Clips <?php else: ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
  <?php endif; ?>  | <?php echo $this->_tpl_vars['collection']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div> 

<!-- <div class="command_2" style="color: #666666;font-size: 11px;font-weight: normal;"><?php echo $this->_tpl_vars['collection']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div> -->

<div class="textyui"><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['collection']); ?>
" title="<?php echo $this->_tpl_vars['collection']['username']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['username'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 16) : smarty_modifier_truncate($_tmp, 16)); ?>
</a></div>

</div>

</div><!--image500-->

<?php endif; ?>


<?php if ($this->_tpl_vars['display_type'] == 'view_artist'): ?>
		<div class="box">
		<div class="main_vids clearfix">
		<div class="main_vids clearfix" style="display: block;">
			<div class="grid_view">
				<div class="vid_thumb">
					<a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['object']), $this);?>
"><img src="<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['object']), $this);?>
" alt="<?php echo $this->_tpl_vars['object']['title']; ?>
" width="124" height="98"  style="border:none;"/></a>
				</div>
				<div class="vid_info_wrap">
					<div><a href="<?php echo videoSmartyLink(array('vdetails' => $this->_tpl_vars['object']), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['object']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a></div>
					<!--div><?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['collection']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</div--> 
					<div><?php echo $this->_tpl_vars['object']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div>
					<div class="tag"><span><?php echo ((is_array($_tmp=$this->_tpl_vars['object']['category'])) ? $this->_run_mod_handler('categories', true, $_tmp, 'collections') : categories($_tmp, 'collections')); ?>
</span></div>
				</div>
			</div>
		</div>
		</div> <!--MAIN_VIDS END-->
		</div><!--box-->
<?php endif; ?>


