<?php /* Smarty version 2.6.18, created on 2013-04-10 18:34:45
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout/blocks/subscriptions.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/subscriptions.html', 5, false),)), $this); ?>
<?php if (userid ( )): ?>
<div class="main_vids clearfix" style="">
<div class="basd clearfix" style="background:#333; color:#fff;padding:8px; border-radius:0px 5px 0px 0px;">
<div class="text_91">Subscriptions</div>
	<span class="subsription"><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/edit_account.php?mode=subscriptions"><?php echo smarty_lang(array('code' => 'Manage Subscriptions'), $this);?>
</a></span>
  </div><!--basd--> 
  <div class="clearfix"></div>
   <div style="background:#fff;padding:8px; ">
   <!-- Listing Subscriptions-->
      <?php $this->assign('subs_uploads', $this->_tpl_vars['userquery']->getSubscriptionsUploadsWeek($this->_tpl_vars['userquery']->userid,10)); ?>
   <?php if ($this->_tpl_vars['subs_uploads']): ?>
   	<?php $_from = $this->_tpl_vars['subs_uploads']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['item']):
?>
    	<?php if ($this->_tpl_vars['type'] == 'videos'): ?>
        
        	<div class="clearfix">
                <h2 style=" font-size:12px; padding:0 5px 5px; color:#333; margin-bottom:5px; "><?php echo $this->_tpl_vars['item']['title']; ?>
 (<?php echo $this->_tpl_vars['item']['total']; ?>
 <?php echo $this->_tpl_vars['type']; ?>
)</h2>
                   
                <?php $_from = $this->_tpl_vars['item']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['videos']):
?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/video.html", 'smarty_include_vars' => array('video' => $this->_tpl_vars['videos'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endforeach; endif; unset($_from); ?>
                   

            </div>        
        <?php endif; ?>
        
        
    	<?php if ($this->_tpl_vars['type'] == 'photos'): ?>
        	<div class="clearfix">
                <h2 style="font-size:12px; padding:0 5px 5px; color:#333; margin-bottom:5px;"><?php echo $this->_tpl_vars['item']['title']; ?>
 (<?php echo $this->_tpl_vars['item']['total']; ?>
 <?php echo $this->_tpl_vars['type']; ?>
)</h2>
                <?php $_from = $this->_tpl_vars['item']['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['photos']):
?>
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/photo.html", 'smarty_include_vars' => array('photo' => $this->_tpl_vars['photos'],'display_type' => 'subscription')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                <?php endforeach; endif; unset($_from); ?>
            </div>
		<?php endif; ?>	
    <?php endforeach; endif; unset($_from); ?>
<?php else: ?>
  <em><?php echo smarty_lang(array('code' => 'no_new_subs_video'), $this);?>
</em>        
   <?php endif; ?>
   
   <!-- End Listing Subscriptions -->
   </div>
 
   

</div>
  
<div class="feature_shadow" ></div>
  
<?php endif; ?>