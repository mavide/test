<?php /* Smarty version 2.6.18, created on 2013-04-10 18:34:45
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout/footer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/footer.html', 8, false),array('function', 'foot_menu', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/footer.html', 19, false),)), $this); ?>

<body>

<div class="contanier">
<div class="final_footer">

<a href="<?php echo $this->_tpl_vars['baseurl']; ?>
"><div class="footer_image">
<span style="display: block;font-size: 10px;text-align: center;">@ <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")); ?>
 <?php echo $this->_tpl_vars['Cbucket']->configs['site_title']; ?>
</span>
</div></a>

<div class="image_boder_shadow"></div>




<div class="footer" align="center">

<ul>
    	<?php echo foot_menu(array('assign' => 'foot_menu'), $this);?>

        
        <?php $_from = $this->_tpl_vars['foot_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['fm']):
?>
        	<?php if ($this->_tpl_vars['fm']['name'] != ''): ?>
            	<li><a href="<?php echo $this->_tpl_vars['fm']['link']; ?>
" <?php if ($this->_tpl_vars['fm']['target']): ?> target="<?php echo $this->_tpl_vars['fm']['target']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['fm']['onclick']): ?> onclick="<?php echo $this->_tpl_vars['fm']['onclick']; ?>
" <?php endif; ?>><?php echo $this->_tpl_vars['fm']['name']; ?>
</a></li>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
</ul>


<div class="clearfix"></div>

<div style="margin-top:30px">  
    <div align="center">
        <!-- Forged by ClipBucket -->
    	<!-- Please do not remove this unless you have license -->
    		<div style="height: 25px;text-shadow: 0 1px 1px #FFFFFF;padding: 5px;font-weight:bold;color:#919191; clear:both;">Forged by <a href="http://clip-bucket.com/">ClipBucket</a></div>
        <!-- Forged by ClipBucket ends -->
        
        
    <?php echo $this->_tpl_vars['Cbucket']->footer(); ?>

        </div>
   </div><!--poweredby--> 
   </div><!--footer-->
   
   </div>
   
   </div><!--contanier-->
   <div id="quicklist_box" style="display:block;"></div>
</body>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   