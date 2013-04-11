<?php /* Smarty version 2.6.18, created on 2013-04-11 10:48:17
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout/blocks/manage/account_left.html */ ?>
 <div class="my_account_left">
<ul>
    <?php $_from = $this->_tpl_vars['userquery']->my_account_links(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['link']):
?>
    <li class="li">
    	<span class="heading"><?php echo $this->_tpl_vars['name']; ?>
</span>
        <ul>
        <?php $_from = $this->_tpl_vars['link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link_name'] => $this->_tpl_vars['alink']):
?>
        	<li><a href="<?php echo $this->_tpl_vars['alink']; ?>
"><?php echo $this->_tpl_vars['link_name']; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
        </ul>
    </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
</div>