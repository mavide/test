<?php /* Smarty version 2.6.18, created on 2013-04-10 18:50:57
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout/blocks/comments/comments.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/comments/comments.html', 13, false),array('modifier', 'sprintf', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/blocks/comments/comments.html', 13, false),)), $this); ?>
<?php if ($this->_tpl_vars['comments']): ?>
<div style="height:10px"></div>
    <?php $_from = $this->_tpl_vars['comments']['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comment']):
?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/comments/comment.html", 'smarty_include_vars' => array('comment' => $this->_tpl_vars['comment'],'type' => $this->_tpl_vars['type'],'parents' => $this->_tpl_vars['comments']['parents'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endforeach; endif; unset($_from); ?>
    
    <div style="height:10px"></div>
  
   
<?php else: ?>
	<div id="latest_comment_container">
	<div align="center" class="no_comments">
    	<?php echo smarty_lang(array('code' => 'no_comments','assign' => 'no_comments'), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['no_comments'])) ? $this->_run_mod_handler('sprintf', true, $_tmp, $this->_tpl_vars['object_type']) : sprintf($_tmp, $this->_tpl_vars['object_type'])); ?>

    </div>
    </div>
    
<?php endif; ?>
<?php if ($this->_tpl_vars['comments']): ?>
<div id="latest_comment_container"></div>
<?php endif; ?>