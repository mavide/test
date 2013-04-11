<?php /* Smarty version 2.6.18, created on 2013-04-10 18:34:47
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout//blocks/artist.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/artist.html', 1, false),array('modifier', 'number_format', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/artist.html', 1, false),array('modifier', 'capitalize', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/artist.html', 1, false),array('function', 'lang', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout//blocks/artist.html', 1, false),)), $this); ?>
<?php if ($this->_tpl_vars['display_type'] == "" || $this->_tpl_vars['display_type'] == 'normal'): ?><div class="image505" style="width: 140px;height: 175px;">	<div class="clearfix"></div>	<div class="thumb_container_medium" style=" display:inline-block;border:1px solid #ccc;">		<a href="<?php echo $this->_tpl_vars['cbartist']->artist_links($this->_tpl_vars['artist'],'view'); ?>
">		<img src="<?php echo $this->_tpl_vars['cbartist']->get_thumb($this->_tpl_vars['artist'],'small','true'); ?>
" width="112" height="120"  style="border:none;"/></a>	</div>	<div class="box_one" style="">		<div class="textyui"><a href="<?php echo $this->_tpl_vars['cbartist']->artist_links($this->_tpl_vars['artist'],'view'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['artist']['artist_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 50) : smarty_modifier_truncate($_tmp, 50)); ?>
</a></div>		<div class="command" style="color: #666666;font-size: 11px;font-weight: normal;"><?php echo ((is_array($_tmp=$this->_tpl_vars['artist']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php if ($this->_tpl_vars['artist']['type'] == 'videos'): ?> Albums <?php else: ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['artist']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
  <?php endif; ?>  | <?php echo $this->_tpl_vars['artist']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div> 				<!--div class="textyui"><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['artist']); ?>
" title="<?php echo $this->_tpl_vars['artist']['username']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['artist']['username'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 16) : smarty_modifier_truncate($_tmp, 16)); ?>
</a></div-->	</div></div><!--image500--><?php endif; ?><?php if ($this->_tpl_vars['display_type'] == 'a' || $this->_tpl_vars['display_type'] == 'normala'): ?><div class="box"><div class="main_vids clearfix"><div class="main_vids clearfix" style="display: block;">	<div class="grid_view">		<div class="vid_thumb">			<a href="<?php echo $this->_tpl_vars['cbartist']->artist_links($this->_tpl_vars['artist'],'view'); ?>
"><img src="<?php echo $this->_tpl_vars['cbartist']->get_thumb($this->_tpl_vars['artist'],'small','true'); ?>
" width="124" height="98"  style="border:none;"/></a>			<span class="vid_time"><?php echo $this->_tpl_vars['artist']['total_objects']; ?>
 <?php echo $this->_tpl_vars['artist']['type']; ?>
</span>		</div>		<div class="vid_info_wrap">			<div><a href="<?php echo $this->_tpl_vars['cbartist']->artist_links($this->_tpl_vars['artist'],'view'); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['artist']['artist_name'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 40) : smarty_modifier_truncate($_tmp, 40)); ?>
</a></div>			<!--div><?php echo ((is_array($_tmp=$this->_tpl_vars['artist']['total_objects'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['artist']['type'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</div--> 			<div><?php echo $this->_tpl_vars['artist']['views']; ?>
 <?php echo smarty_lang(array('code' => 'views'), $this);?>
</div>		</div>	</div></div></div> <!--MAIN_VIDS END--></div><!--box--><?php endif; ?>