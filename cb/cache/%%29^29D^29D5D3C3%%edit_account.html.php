<?php /* Smarty version 2.6.18, created on 2013-04-11 10:48:17
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout/edit_account.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/edit_account.html', 12, false),array('function', 'ANCHOR', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/edit_account.html', 49, false),array('modifier', 'number_format', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/edit_account.html', 330, false),)), $this); ?>
<div class="myaccount_full clearfix">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/manage/account_left.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

 
 
 <div class="account_box12">
 <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/manage/account_head.html", 'smarty_include_vars' => array('user' => $this->_tpl_vars['user'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
 
<?php if ($this->_tpl_vars['mode'] == 'profile_settings'): ?>

<span class="accntSettingHead" id="accntSettingHead" onclick="$('#accountSettings').toggle(); 
	$(this).toggleClass('accntSettingHeadarrowup')"><?php echo smarty_lang(array('code' => 'account_settings'), $this);?>
</span>
<form method="post" class="accountForm">
<div id="accountSettings" style="display:none">
<!--- CHANGING USER ACCOUNT AND PROFILE -->


<?php $this->assign('signup_fields', $this->_tpl_vars['userquery']->load_signup_fields($this->_tpl_vars['user'])); ?>
<?php $this->assign('cust_signup_fields', $this->_tpl_vars['userquery']->load_custom_signup_fields($this->_tpl_vars['user'],false,true)); ?>

<fieldset>
<legend><?php echo smarty_lang(array('code' => 'account_details'), $this);?>
</legend>
<div class="account_field_block clearfix">
<div class="account_field_label" align="right"><strong><label for="country"><?php echo smarty_lang(array('code' => 'country'), $this);?>
</label></strong></div>
<div class="account_field"><select name="country" id="country">
        	<?php $this->assign('countries', $this->_tpl_vars['Cbucket']->get_countries('iso2')); ?>
            <?php $_from = $this->_tpl_vars['countries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['code'] => $this->_tpl_vars['country']):
?>
            	<option value="<?php echo $this->_tpl_vars['code']; ?>
" <?php if ($this->_tpl_vars['user']['country'] == $this->_tpl_vars['code']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['country']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select></div>
<div class="clearfix"></div>
</div>


<div class="account_field_block clearfix">
<div class="account_field_label" align="right"><strong><label for="country"><?php echo smarty_lang(array('code' => 'gender'), $this);?>
</label></strong></div>
<div class="account_field"><label>
          <input type="radio" name="sex" value="male" id="sex_0" <?php if ($this->_tpl_vars['user']['sex'] == male): ?> checked="checked"<?php endif; ?> />
          <?php echo smarty_lang(array('code' => 'male'), $this);?>
</label>
        
        <label>
          <input type="radio" name="sex" value="female" id="sex_1" <?php if ($this->_tpl_vars['user']['sex'] == female): ?> checked="checked"<?php endif; ?>/>
          <?php echo smarty_lang(array('code' => 'female'), $this);?>
</label></div>
<div class="clearfix"></div>
</div>

<div class="account_field_block clearfix">
<div class="account_field_label" align="right"><strong><label for="category"><?php echo smarty_lang(array('code' => 'account_details'), $this);?>
</label></strong></div>
<div class="account_field"><?php echo ANCHOR(array('place' => $this->_tpl_vars['signup_fields']['cat']['anchor_before']), $this);?>
<?php echo $this->_tpl_vars['formObj']->createField($this->_tpl_vars['signup_fields']['cat']); ?>
<?php echo ANCHOR(array('place' => $this->_tpl_vars['signup_fields']['cat']['anchor_after']), $this);?>
</div>
<div class="clearfix"></div>
</div>

<div class="account_field_block clearfix">
<div class="account_field_label" align="right"><strong><label for="dob"><?php echo smarty_lang(array('code' => 'user_date_of_birth'), $this);?>
</label></strong></div>
<div class="account_field"><?php echo ANCHOR(array('place' => $this->_tpl_vars['signup_fields']['dob']['anchor_before']), $this);?>
<?php echo $this->_tpl_vars['formObj']->createField($this->_tpl_vars['signup_fields']['dob']); ?>
<?php echo ANCHOR(array('place' => $this->_tpl_vars['signup_fields']['dob']['anchor_after']), $this);?>
</div>
<div class="clearfix"></div>
</div>

<?php if ($this->_tpl_vars['cust_signup_fields']): ?>
<?php $_from = $this->_tpl_vars['cust_signup_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
<div class="account_field_block clearfix">
<div class="account_field_label" align="right"><strong><label for="<?php echo $this->_tpl_vars['field']['id']; ?>
"><?php echo $this->_tpl_vars['field']['title']; ?>
</label></strong></div>
<div class="account_field"><?php if ($this->_tpl_vars['field']['hint_1']): ?><?php echo $this->_tpl_vars['field']['hint_1']; ?>
<br /><?php endif; ?>
<?php echo ANCHOR(array('place' => $this->_tpl_vars['field']['anchor_before']), $this);?>
<?php echo $this->_tpl_vars['formObj']->createField($this->_tpl_vars['field']); ?>
<?php echo ANCHOR(array('place' => $this->_tpl_vars['field']['anchor_after']), $this);?>

<br>
<?php echo $this->_tpl_vars['field']['hint_2']; ?>
</div>
<div class="clearfix"></div>
</div>

<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>

</fieldset>
</div>

<span class="accntSettingHead"   id="accntProfileSettingHead"  onclick="$('#accntProfileSettings').toggle(); 
	$(this).toggleClass('accntSettingHeadarrowup')" ><?php echo smarty_lang(array('code' => 'channel_profile_settings'), $this);?>
</span>

	<?php $this->assign('channel_profile_fields', $this->_tpl_vars['userquery']->load_user_fields($this->_tpl_vars['p'])); ?>
    
   <div id="accntProfileSettings" style="display:none"> <?php $_from = $this->_tpl_vars['channel_profile_fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_group']):
?>
     <fieldset>
     	<legend><?php echo $this->_tpl_vars['field_group']['group_name']; ?>
</legend>
     	<?php $_from = $this->_tpl_vars['field_group']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
        <div class="account_field_block clearfix">
        <div class="account_field_label" align="right"><strong><label for="<?php echo $this->_tpl_vars['field']['id']; ?>
"><?php echo $this->_tpl_vars['field']['title']; ?>
</label></strong></div>
        <div class="account_field"><?php if ($this->_tpl_vars['field']['hint_1']): ?><?php echo $this->_tpl_vars['field']['hint_1']; ?>
<br /><?php endif; ?>
        <?php echo ANCHOR(array('place' => $this->_tpl_vars['field']['anchor_before']), $this);?>
<?php echo $this->_tpl_vars['formObj']->createField($this->_tpl_vars['field']); ?>
<?php echo ANCHOR(array('place' => $this->_tpl_vars['field']['anchor_after']), $this);?>

        <br>
        <?php echo $this->_tpl_vars['field']['hint_2']; ?>
</div>
        <div class="clearfix"></div>
        </div>
        
        <?php endforeach; endif; unset($_from); ?>
     </fieldset>    
    <?php endforeach; endif; unset($_from); ?></div>

<div align="right" style="padding-right:10px">
<button name="update_profile" id="button" value="submit" class="LoadMoreButton"><?php echo smarty_lang(array('code' => 'update'), $this);?>
</button></div>

</form>


</div>

<script>
	$(document).ready(function()
	{
		<?php if ($this->_tpl_vars['on'] == 'account'): ?>
			$('#accountSettings').toggle(); 
			$('#accntSettingHead').toggleClass('accntSettingHeadarrowup')
		<?php else: ?>
			$('#accntProfileSettings').toggle(); 
			$('#accntProfileSettingHead').toggleClass('accntSettingHeadarrowup')
		<?php endif; ?>
	}
	);
</script>
<?php endif; ?>

<!--- CHANGING USER AVATAR AND BG -->

<?php if ($this->_tpl_vars['mode'] == 'avatar_bg'): ?>
<div class="account_form avatar_bg">
<form method="post" enctype="multipart/form-data" name="edit_profile">

<fieldset class="fieldset">
<legend><?php echo smarty_lang(array('code' => 'user_user_avatar'), $this);?>
</legend>
<div style="height:15px;"></div>
<div style="float:left; width:200px;" align="center">
<img src="<?php echo $this->_tpl_vars['userquery']->getUserThumb($this->_tpl_vars['user']); ?>
" class="mid_user_thumb" style="max-width:95px"/>
</div>


<div style="width:300px; display:block; float:left">

<strong><?php echo smarty_lang(array('code' => 'user_user_avatar'), $this);?>
</strong><br />
  <?php echo smarty_lang(array('code' => 'please_select_img_file'), $this);?>
<br />
  <label for="avatar_file"></label>
  <input type="file" name="avatar_file" id="avatar_file"  />
  <?php echo smarty_lang(array('code' => 'or'), $this);?>
<br />
  
  <label for="avatar_url"><?php echo smarty_lang(array('code' => 'pelase_enter_image_url'), $this);?>

  <input name="avatar_url" type="text" id="avatar_url" value="<?php echo $this->_tpl_vars['user']['avatar_url']; ?>
" />
  <br />
  <input name="delete_avatar" type="checkbox" id="delete_avatar" value="yes" />
  <label for="delete_avatar" style="display:inline"><?php echo smarty_lang(array('code' => 'delete_this_img'), $this);?>
 - (if user has uploaded profile pic)</label>
  <input type="hidden" name="avatar_file_name" value="<?php echo $this->_tpl_vars['user']['avatar']; ?>
" /> 
</div> 
  
</fieldset>
<fieldset class="fieldset">
<legend><?php echo smarty_lang(array('code' => 'user_bg'), $this);?>
</legend>
<div style="height:15px;"></div>
<div style="float:left; width:200px;" align="center">
<?php if ($this->_tpl_vars['userquery']->getUserBg($this->_tpl_vars['user'])): ?><img src="<?php echo $this->_tpl_vars['userquery']->getUserBg($this->_tpl_vars['user']); ?>
" style="max-width:95px"/><?php else: ?><em><strong>No Bg</strong></em><?php endif; ?>
</div>
<div style="width:300px; display:block; float:left">
<strong><?php echo smarty_lang(array('code' => 'user_bg_img'), $this);?>

  </strong><br />
  <?php echo smarty_lang(array('code' => 'please_select_img_file'), $this);?>

  <br />
  <input type="file" name="background_file" id="background_file" />
  <?php echo smarty_lang(array('code' => 'or'), $this);?>



  <label for="background_url"><?php echo smarty_lang(array('code' => 'pelase_enter_image_url'), $this);?>
<br /></label>
<input name="background_url" type="text" id="background_url" value="<?php echo $this->_tpl_vars['user']['background_url']; ?>
" />

<?php echo smarty_lang(array('code' => 'or'), $this);?>

<label for="background_color"><?php echo smarty_lang(array('code' => 'please_enter_bg_color'), $this);?>
</label>
<input name="background_color" type="text" id="background_color" value="<?php echo $this->_tpl_vars['user']['background_color']; ?>
" />
<input type="hidden" name="bg_file_name" value="<?php echo $this->_tpl_vars['user']['background']; ?>
" />


<label for="background_repeat"><?php echo smarty_lang(array('code' => 'bg_repeat_type'), $this);?>
</label>
<select name="background_repeat" id="background_repeat" >
<option value="repeat" <?php if ($this->_tpl_vars['user']['background_repeat'] == 'repeat'): ?> selected="selected"<?php endif; ?>>repeat</option>
<option value="repeat-x" <?php if ($this->_tpl_vars['user']['background_repeat'] == 'repeat-x'): ?> selected="selected"<?php endif; ?>>repeat-x</option>
<option value="repeat-y" <?php if ($this->_tpl_vars['user']['background_repeat'] == 'repeat-y'): ?> selected="selected"<?php endif; ?>>repeat-y</option>
<option value="no-repeat" <?php if ($this->_tpl_vars['user']['background_repeat'] == 'no-repeat'): ?> selected="selected"<?php endif; ?>>no-repeat</option>
</select>
<br />

<input type="checkbox" <?php if ($this->_tpl_vars['user']['background_attachement'] == 'yes'): ?> checked="checked"<?php endif; ?> value="yes" name="background_attachement" id="background_attachement" />
<label for="background_attachement" style="display:inline"><?php echo smarty_lang(array('code' => 'fix_bg'), $this);?>
</label>
<?php if ($this->_tpl_vars['userquery']->getUserBg($this->_tpl_vars['user'])): ?><input name="delete_bg" type="checkbox" id="delete_bg" value="yes" /><label for="delete_bg" style="display:inline"><?php echo smarty_lang(array('code' => 'delete_this_img'), $this);?>
</label><?php endif; ?>
</div>

<div class="clearfix"></div>
</fieldset>
<div align="right" style="padding-right:10px"><button name="update_avatar_bg" id="button" value="submit" class="LoadMoreButton"><?php echo smarty_lang(array('code' => 'update'), $this);?>
</button></div>

</form>
</div>


<div class="clearfix"></div>

<?php endif; ?>
<!--- END CHANGING USER AVATAR AND BG -->



<?php if ($this->_tpl_vars['mode'] == 'change_email'): ?>

<!--- CHANGING USER EMAIL -->
<div class="account_form">
<form method="post" name="edit_profile">
<fieldset class="fieldset">
<legend><?php echo smarty_lang(array('code' => 'user_change_email'), $this);?>
</legend>


<div class="account_field_block">
<div class="account_field_label" align="right"><strong><label for="curemail"><?php echo smarty_lang(array('code' => 'current_email'), $this);?>
</label></strong></div>
<div class="account_field"><input type="text" disabled value="<?php echo $this->_tpl_vars['user']['email']; ?>
" id="curemail" style="margin-bottom:10px"></div>
<div class="clearfix"></div>
</div>


<div class="account_field_block">
<div class="account_field_label" align="right"><strong><label for="new_email"><?php echo smarty_lang(array('code' => 'user_new_email'), $this);?>
</label></strong></div>
<div class="account_field"><input type="text" name="new_email" id="new_email" style="margin-bottom:10px"></div>
<div class="clearfix"></div>
</div>

<div class="account_field_block">
<div class="account_field_label" align="right"><strong><label for="cnew_email"><?php echo smarty_lang(array('code' => 'confirm_new_email'), $this);?>
</label></strong></div>
<div class="account_field"><input type="text" name="cnew_email" id="cnew_email" style="margin-bottom:10px"></div>
<div class="clearfix"></div>
</div>
<div align="right"><button name="change_email" id="button" value="submit" class="LoadMoreButton"><?php echo smarty_lang(array('code' => 'user_change_email'), $this);?>
</button></div>



</fieldset>
</form>
</div>

<!-- END CHANGIN USER EMAIL -->
<?php endif; ?>




<?php if ($this->_tpl_vars['mode'] == 'change_password'): ?>

<!-- CHANGING USER PASSWORD -->
<div class="account_form">
<form method="post" name="edit_profile">
<fieldset class="fieldset">
<legend><?php echo smarty_lang(array('code' => 'user_change_pass'), $this);?>
</legend>


<div class="account_field_block">
<div class="account_field_label" align="right"><strong><label for="old_pass"><?php echo smarty_lang(array('code' => 'user_old_pass'), $this);?>
</label></strong></div>
<div class="account_field"><input name="old_pass" type="password" id="old_pass" style="margin-bottom:10px"></div>
<div class="clearfix"></div>
</div>


<div class="account_field_block">
<div class="account_field_label" align="right"><strong><label for="new_pass"><?php echo smarty_lang(array('code' => 'user_new_pass'), $this);?>
</label></strong></div>
<div class="account_field"><input name="new_pass" type="password" id="new_pass" style="margin-bottom:10px"/></div>
<div class="clearfix"></div>
</div>

<div class="account_field_block">
<div class="account_field_label" align="right"><strong><label for="c_new_pass"><?php echo smarty_lang(array('code' => 'user_c_new_pass'), $this);?>
</label></strong></div>
<div class="account_field"><input name="c_new_pass" type="password" id="c_new_pass"  style="margin-bottom:10px" /></div>
<div class="clearfix"></div>
</div>
<div align="right"><button name="change_password" id="button" value="submit" class="LoadMoreButton"><?php echo smarty_lang(array('code' => 'user_change_pass'), $this);?>
</button></div>



</fieldset>
</form>
</div>
<!-- END CHANGING USER PASSWORD -->
<?php endif; ?>

<?php if ($this->_tpl_vars['mode'] == 'block_users'): ?>
<!-- Banning Users -->
<div class="account_form">
<form method="post" name="ban_users">
<fieldset class="fieldset">
<legend><?php echo smarty_lang(array('code' => 'block_users'), $this);?>
</legend>
<div class="account_field_block">
<div class="account_field_label" align="right"><strong><label for="users"><?php echo smarty_lang(array('code' => 'block_users'), $this);?>
</label></strong></div>
<div class="account_field">
  <textarea name="users" id="users" style="margin-bottom:10px"><?php echo $this->_tpl_vars['user']['banned_users']; ?>
</textarea>
  <br />
<?php echo smarty_lang(array('code' => 'spe_users_by_comma'), $this);?>
</div>
<div class="clearfix"></div>
</div>

<div align="right"><button name="block_users" id="button" value="submit" class="LoadMoreButton"><?php echo smarty_lang(array('code' => 'update_blocked_user_list'), $this);?>
</button></div>

</fieldset>
</form>
</div>
<!-- Banning Users End-->
<?php endif; ?>


<?php if ($this->_tpl_vars['mode'] == 'subs'): ?>
<h2><?php echo smarty_lang(array('code' => 'com_manage_subs'), $this);?>
</h2>


 <?php if ($this->_tpl_vars['subs']): ?>
 	
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="manage_contacts_tbl_head">
      <tr>
        <td width="15"><input type="checkbox" name="checkall" onclick="checkUncheckAll(this);"/></td>
        <td width="50">&nbsp;</td>
        <td>Username</td>
        <td width="100">views</td>
        <td width="50">&nbsp;</td>
      </tr>
    </table>
    
   <?php $_from = $this->_tpl_vars['subs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub']):
?>
   <div class="manage_contacts_tbl">
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15"><input type="checkbox" name="sub[]" id="check_userd-<?php echo $this->_tpl_vars['user_detail']['userid']; ?>
" value="<?php echo $this->_tpl_vars['sub']['subscribed_to']; ?>
" /></td>
        <td width="50" height="50" align="center" valign="middle"><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['sub']); ?>
"><img src="<?php echo $this->_tpl_vars['userquery']->getUserThumb($this->_tpl_vars['sub']); ?>
" alt="<?php echo $this->_tpl_vars['sub']['username']; ?>
" width="40" height="40" border="0"></a></td>
        <td><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['sub']); ?>
"><?php echo $this->_tpl_vars['sub']['username']; ?>
</a> | <a href="<?php echo $this->_tpl_vars['userquery']->get_user_videos_link($this->_tpl_vars['sub']); ?>
"><?php echo smarty_lang(array('code' => 'grp_view_vdos'), $this);?>
</a></td>
        <td width="100"><?php echo ((is_array($_tmp=$this->_tpl_vars['sub']['profile_hits'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>

        <td width="50" align="center" valign="middle"><a href="?mode=subscriptions&delete_subs=<?php echo $this->_tpl_vars['sub']['subscribed_to']; ?>
"><img src="<?php echo $this->_tpl_vars['imageurl']; ?>
/cancel.png" width="16" height="16" border="0" /></a></td>
      </tr>
    </table>
    </div>
   <?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<div><em><strong><?php echo smarty_lang(array('code' => 'no_subs_found'), $this);?>
</strong></em></div>
 <?php endif; ?>





<?php endif; ?>
</div>