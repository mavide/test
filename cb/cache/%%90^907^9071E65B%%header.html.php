<?php /* Smarty version 2.6.18, created on 2013-04-10 18:34:45
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout/header.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'link', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/header.html', 10, false),array('function', 'lang', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/header.html', 47, false),)), $this); ?>

<div class="header clearfix">
<div class="span3">
	<div class="title">
	<h1><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
" rel="home"><?php echo $this->_tpl_vars['Cbucket']->configs['site_title']; ?>
</a></h1>
	</div>
</div>

<div id="SearchCon">
	<form action="<?php echo cblink(array('name' => 'search_result'), $this);?>
" method="get" name="search" id="search" class="navbar-form pull-left">
	<div class="controls">
		 <div class="input-append">
			<input class="span5" id="query" size="16" name="query" type="text" placeholder="Search" x-webkit-speech="x-webkit-speech" onwebkitspeechchange="this.form.submit();" onkeyup="lookup(this.value);" onblur="fill();" autocomplete="off"/><button class="btn" type="submit"><i class="icon-search"></i></button>
			<!-- <input type="hidden" name="type" id="searchType" value="<?php echo $_GET['type']; ?>
" />  -->
		</div>
		<div class="suggestionsBox" id="suggestions" style="display: none;">
			<div class="suggestionList input-xlarge" id="autoSuggestionsList">
			</div>
		</div>
		</div>
	</form>          
</div> <!--SearchCon--> 



<div class="UploadLinks moveL clearfix">
	<ul>                
	<li>
	<?php if (isSectionEnabled ( 'videos' )): ?><li><a href="<?php echo cblink(array('name' => 'videos'), $this);?>
">Videos</a></li><?php endif; ?>
	<?php if (isSectionEnabled ( 'collections' )): ?><li><a href="<?php echo cblink(array('name' => 'collections'), $this);?>
">Collections</a></li><?php endif; ?>
	<?php if (isSectionEnabled ( 'artists' )): ?><li><a href="<?php echo cblink(array('name' => 'artists'), $this);?>
">Artists</a></li><?php endif; ?>
	<?php if (isSectionEnabled ( 'channels' )): ?><li><a href="<?php echo cblink(array('name' => 'channels'), $this);?>
">Channels</a></li><?php endif; ?>
	<?php if (isSectionEnabled ( 'groups' )): ?><li><a href="<?php echo cblink(array('name' => 'groups'), $this);?>
">Groups</a></li><?php endif; ?>
	<?php if (isSectionEnabled ( 'photos' )): ?><li><a href="<?php echo cblink(array('name' => 'photos'), $this);?>
">Photos</a></li><?php endif; ?>
	<?php if (isSectionEnabled ( 'videos' )): ?><li><a href="<?php echo $this->_tpl_vars['baseurl']; ?>
/suggest.php">Suggest</a></li><?php endif; ?>               
	<?php if (isSectionEnabled ( 'photos' )): ?><li><a href="<?php echo cblink(array('name' => 'photo_upload'), $this);?>
">Upload</a></li><?php endif; ?> 
	</li>                
	</ul>                
</div>       
         
<div class="AccountLinks moveR">                 
	<ul>
	<?php if (! $this->_tpl_vars['userquery']->login_check('',true)): ?>
	<div style="height:10px;"></div>
	<li><a href="<?php echo cblink(array('name' => 'signup'), $this);?>
">Create Account</a></li>
	<li class="Sign_In"><a href="<?php echo cblink(array('name' => 'signup'), $this);?>
">Sign In</a></li> 
	<?php echo smarty_lang(array('code' => 'after_meny_guest_msg','assign' => 'guestmsg'), $this);?>

	<?php echo cblink(array('name' => 'login','assign' => 'loginlink'), $this);?>

	<?php else: ?> 

		<a class="btn" href="#"><?php echo $this->_tpl_vars['userquery']->udetails['username']; ?>
</a>

	
	
	<?php endif; ?>
	</ul>
</div><!--AccountLinks moveR-->
</div><!--header-->

<div style="position:relative">
<div id="OpenUserCon" class="UserMenuBox clearfix">
<div class="Container clearfix">
<div class="UserBeingWatch moveL">
<div class="break2"></div>
<span class="UserMenuTitle"></span>
<div class="BeingWatch clearfix">
<ul id="mycarousel" class="jcarousel-skin-tango IndexNextPre">
<?php unset($this->_sections['v_list']);
$this->_sections['v_list']['name'] = 'v_list';
$this->_sections['v_list']['loop'] = is_array($_loop=$this->_tpl_vars['videos']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['v_list']['show'] = true;
$this->_sections['v_list']['max'] = $this->_sections['v_list']['loop'];
$this->_sections['v_list']['step'] = 1;
$this->_sections['v_list']['start'] = $this->_sections['v_list']['step'] > 0 ? 0 : $this->_sections['v_list']['loop']-1;
if ($this->_sections['v_list']['show']) {
    $this->_sections['v_list']['total'] = $this->_sections['v_list']['loop'];
    if ($this->_sections['v_list']['total'] == 0)
        $this->_sections['v_list']['show'] = false;
} else
    $this->_sections['v_list']['total'] = 0;
if ($this->_sections['v_list']['show']):

            for ($this->_sections['v_list']['index'] = $this->_sections['v_list']['start'], $this->_sections['v_list']['iteration'] = 1;
                 $this->_sections['v_list']['iteration'] <= $this->_sections['v_list']['total'];
                 $this->_sections['v_list']['index'] += $this->_sections['v_list']['step'], $this->_sections['v_list']['iteration']++):
$this->_sections['v_list']['rownum'] = $this->_sections['v_list']['iteration'];
$this->_sections['v_list']['index_prev'] = $this->_sections['v_list']['index'] - $this->_sections['v_list']['step'];
$this->_sections['v_list']['index_next'] = $this->_sections['v_list']['index'] + $this->_sections['v_list']['step'];
$this->_sections['v_list']['first']      = ($this->_sections['v_list']['iteration'] == 1);
$this->_sections['v_list']['last']       = ($this->_sections['v_list']['iteration'] == $this->_sections['v_list']['total']);
?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/video.html", 'smarty_include_vars' => array('video' => $this->_tpl_vars['videos'][$this->_sections['v_list']['index']],'display_type' => 'Being_Watch')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endfor; else: ?>
</ul>
<?php echo smarty_lang(array('code' => 'No Video Found'), $this);?>

<?php endif; ?>
</div> <!-- BeingWatch -->
<!--Roms And Zoms-->
</div> <!-- UserBeingWatch -->
<div class="ShadowLeft ebebeb moveL"></div>
<div class="UserMenu moveL">
<ul>
<li><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['userquery']->udetails); ?>
"><?php echo smarty_lang(array('code' => 'Channel'), $this);?>
</a></li>
<li><a href="<?php echo cblink(array('name' => 'my_videos'), $this);?>
"><?php echo smarty_lang(array('code' => 'Videos'), $this);?>
</a></li>
<li><a href="<?php echo cblink(array('name' => 'my_account'), $this);?>
"><?php echo smarty_lang(array('code' => 'com_my_account'), $this);?>
</a></li>
<li><a href="<?php echo cblink(array('name' => 'my_favorites'), $this);?>
"><?php echo smarty_lang(array('code' => 'Favorites'), $this);?>
</a></li>
<li><a href="<?php echo cblink(array('name' => 'my_contacts'), $this);?>
"><?php echo smarty_lang(array('code' => 'Inbox'), $this);?>
</a></li>
<li><a href="<?php echo cblink(array('name' => 'my_subscriptions'), $this);?>
"><?php echo smarty_lang(array('code' => 'subscriptions'), $this);?>
</a></li>   
<li><a href="<?php echo cblink(array('name' => 'logout'), $this);?>
">sign out</a></li>              
</ul>
</div> <!--UserMenu end-->	
</div> <!-- Container -->
</div>
</div>

 <script>
<?php echo '
 function lookup(a){
    if (a.length == 0) {
        $("#suggestions").hide()
    }
    else {
        if (a.length > 2) {
            $.post(baseurl + "/ajax_search.php", {
                queryString: "" + a + ""
            }, function(b){
                if (b.length > 0) {
                    $("#suggestions").show();
                    $("#autoSuggestionsList").html(b)
                }
            })
        }
    }
};
function fill(a){
    $("#inputString").val(a);
    setTimeout("$(\'#suggestions\').hide();", 200)
};
'; ?>

</script>