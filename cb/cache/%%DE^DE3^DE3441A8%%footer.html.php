<?php /* Smarty version 2.6.18, created on 2013-04-10 18:49:15
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/admin_area/styles/cbv2/layout/footer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/admin_area/styles/cbv2/layout/footer.html', 3, false),)), $this); ?>
<div style="height:10px"></div>
<div class="footer_grey_bar">
	<img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/dot.gif" class="cbicon" /> Thanks for using ClipBucket | &copy; Copyright 2007 &#8211; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>

<div style="float:right" align="right">
<em><?php echo $this->_tpl_vars['Cbucket']->cbinfo['version']; ?>
</em>| <a href="http://forums.clip-bucket.com/">Forums</a> | <a href="http://clip-bucket.com/arslan-hassan">Arslan Hassan</a> | <a href="http://docs.clip-bucket.com/">Docs</a> | <a href="http://www.opensource.org/licenses/attribution.php">Attribution Assurance License</a></div>

</div>