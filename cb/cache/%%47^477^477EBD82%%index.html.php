<?php /* Smarty version 2.6.18, created on 2013-04-10 18:34:45
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout/index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'lang', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/index.html', 8, false),array('function', 'link', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/index.html', 9, false),array('function', 'cbMenu', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/styles/youtube/layout/index.html', 45, false),)), $this); ?>
<div class="main_index">
	<div class="left_side">
		<div id="guide-builder-promo">
		<div class="clearfix"></div>
		  <div class="pages">
			<ul>
				<?php if (! $this->_tpl_vars['userquery']->login_check('',true)): ?>
				<?php echo smarty_lang(array('code' => 'after_meny_guest_msg','assign' => 'guestmsg'), $this);?>

				<?php echo cblink(array('name' => 'login','assign' => 'loginlink'), $this);?>

				 
				<h2>Sign in to add channels to your homepage</h2> 
		<div class="accunts">                 
		<ul>
		<li class="button_1"><a href="<?php echo cblink(array('name' => 'signup'), $this);?>
">Sign In</a></li> 
		<li class="button_2"><a href="<?php echo cblink(array('name' => 'signup'), $this);?>
">Create Account</a></li>
		</ul>
		</div>	
				<?php else: ?>
			   <div class="button_3">
			   <ul><li><a href="<?php echo cblink(array('name' => 'upload'), $this);?>
">Upload video</a></li></ul></div> 
				
				<div class="accunts_2 clearfix">
				
		<a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['userquery']->udetails); ?>
"><img src="<?php echo $this->_tpl_vars['userquery']->getUserThumb($this->_tpl_vars['userquery']->udetails); ?>
" width="100" height="88" style="float:left;border-radius: 2px 2px 2px 2px; margin-right:5px; border:none;" /></a>
		 
				
					<li><a href="<?php echo cblink(array('name' => 'my_account'), $this);?>
"><?php echo smarty_lang(array('code' => 'com_my_account'), $this);?>
</a></li>          	
					<li><a href="<?php echo $this->_tpl_vars['userquery']->profile_link($this->_tpl_vars['userquery']->udetails); ?>
"><?php echo smarty_lang(array('code' => 'com_my_channel'), $this);?>
</a></li>
					<li><a href="<?php echo cblink(array('name' => 'my_videos'), $this);?>
"><?php echo smarty_lang(array('code' => 'com_my_videos'), $this);?>
</a></li>
					<li><a href="<?php echo cblink(array('name' => 'my_favorites'), $this);?>
"><?php echo smarty_lang(array('code' => 'Favorites'), $this);?>
</a></li>
					<li><a href="<?php echo cblink(array('name' => 'my_playlists'), $this);?>
"><?php echo smarty_lang(array('code' => 'playlists'), $this);?>
</a></li>
					
					<li><a href="<?php echo cblink(array('name' => 'logout'), $this);?>
">Logout</a></li> 
				 <li><a href="<?php echo cblink(array('name' => 'my_contacts'), $this);?>
"><?php echo smarty_lang(array('code' => 'friend_requests'), $this);?>
 (<?php echo $this->_tpl_vars['userquery']->get_pending_contacts($this->_tpl_vars['userquery']->userid,0,true); ?>
)</a></li> 
					   </div>
				  
						
					<?php endif; ?>
				
					</ul>
					</div>
		</div><!--guide-builder-promo-->
		<div class="nav_bar">
		<ul>
		<?php echo cbMenu(array('echo' => 'yes'), $this);?>

		</ul>
		</div><!--nav_bar-->
		<div class="side_bar clearfix">
		</div><!--side_bar-->
	</div><!--left_side-->
	<div class="large_right_side">
		<?php if (isSectionEnabled ( 'videos' ) || isSectionEnabled ( 'photos' )): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['style_dir'])."/blocks/subscriptions.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
		<?php if (isSectionEnabled ( 'videos' )): ?>
			<div class="black_right">				
				<div class="text_91">Videos</div>
				
				<div class="tabs">
				<ul>
				   <li class="selected"><a href="javascript:void(0)" id="watched" onclick="get_video('recent_viewed_vids','#index_vid_container')"><?php echo smarty_lang(array('code' => 'being_watched'), $this);?>
</a></li>
				   <li><a href="javascript:void(0)" id="most_watched" onclick="get_video('most_viewed','#index_vid_container')"><?php echo smarty_lang(array('code' => 'most_viewed'), $this);?>
</a></li>
				   <li><a href="javascript:void(0)" id="recently_watched" onclick="get_video('recently_added','#index_vid_container')"><?php echo smarty_lang(array('code' => 'recently_added'), $this);?>
</a></li>
				</ul>    	
				</div> <!--TABS END-->
			</div><!--black_right-->
			<div class="largebox">
				<div class="main_vids clearfix">
				<div id="style_change">
				<div id="grid" onclick="ToggleView(this);" title="Change To Grid Style"></div> 
				<div id="list" onclick="ToggleView(this);" title="Change to List Style"></div>
				</div> <!--STYLE_CHANGE END-->
				<div id="index_vid_container" style="display:block;">
				</div>
				</div> <!--MAIN_VIDS END-->
				<div class="main_vid_shadow"></div>
				<div style="height:5px;"></div>	
			</div><!--box-->
		<?php endif; ?>
		<div class="clearfix"></div>
		<?php if (isSectionEnabled ( 'photos' )): ?>
			<div class="black_right">				
				<div class="text_91">Photos</div>
					
				<div class="tabs">
				  <ul>
						<li class="selected"><a href="javascript:void(0)" id="watched" onclick="getAjaxPhoto('last_viewed','#index_pho_container')"><?php echo smarty_lang(array('code' => 'being_watched'), $this);?>
</a></li>
						<li><a href="javascript:void(0)" id="most_watched" onclick="getAjaxPhoto('most_viewed','#index_pho_container')"><?php echo smarty_lang(array('code' => 'most_viewed'), $this);?>
</a></li>
						<li><a href="javascript:void(0)" id="recently_watched" onclick="getAjaxPhoto('most_recent','#index_pho_container')"><?php echo smarty_lang(array('code' => 'recently_added'), $this);?>
</a></li>
				   </ul>    	
				</div> <!--TABS END-->
			</div><!--black_right-->
			<div class="largebox">
			 <div class="main_vids clearfix">
				
				   <div id="index_pho_container">
				   
				   </div>
					
				</div> <!--MAIN_VIDS END-->
				 <div class="main_vid_shadow"></div>
				 <div style="height:5px;"></div>
				
			</div><!--box-->
		<?php endif; ?>
		<div class="clearfix"></div>
		<?php if (isSectionEnabled ( 'collections' )): ?>
			<div class="black_right">
				<div class="text_91">Collections</div>
					
				<div class="tabs">
				  <ul>
						<li class="selected"><a href="javascript:void(0)" id="watched" onclick="getAjaxCollection('col_last_viewed','#index_col_container')"><?php echo smarty_lang(array('code' => 'being_watched'), $this);?>
</a></li>
						<li><a href="javascript:void(0)" id="most_watched" onclick="getAjaxCollection('col_most_viewed','#index_col_container')"><?php echo smarty_lang(array('code' => 'most_viewed'), $this);?>
</a></li>
						<li><a href="javascript:void(0)" id="recently_watched" onclick="getAjaxCollection('col_most_recent','#index_col_container')"><?php echo smarty_lang(array('code' => 'recently_added'), $this);?>
</a></li>
				   </ul>    	
				</div> <!--TABS END-->
			</div><!--black_right-->
			<div class="largebox">
			 <div class="main_vids clearfix">
				
				   <div id="index_col_container">
				   
				   </div>
					
				</div> <!--MAIN_VIDS END-->
				 <div class="main_vid_shadow"></div>
				 <div style="height:5px;"></div>
				
			</div><!--box-->
		<?php endif; ?>
		<div class="clearfix"></div>
		<?php if (isSectionEnabled ( 'artists' )): ?>
			<div class="black_right">
				<div class="text_91">Artists</div>
					
				<div class="tabs">
				  <ul>
						<li class="selected"><a href="javascript:void(0)" id="watched" onclick="getAjaxArtist('ar_last_viewed','#index_ar_container')"><?php echo smarty_lang(array('code' => 'being_watched'), $this);?>
</a></li>
						<li><a href="javascript:void(0)" id="most_watched" onclick="getAjaxArtist('ar_most_viewed','#index_ar_container')"><?php echo smarty_lang(array('code' => 'most_viewed'), $this);?>
</a></li>
						<li><a href="javascript:void(0)" id="recently_watched" onclick="getAjaxArtist('ar_most_recent','#index_ar_container')"><?php echo smarty_lang(array('code' => 'recently_added'), $this);?>
</a></li>
				   </ul>    	
				</div> <!--TABS END-->
			</div><!--black_right-->
			<div class="largebox">
			 <div class="main_vids clearfix">
				
				   <div id="index_ar_container">
				   
				   </div>
					
				</div> <!--MAIN_VIDS END-->
				 <div class="main_vid_shadow"></div>
				 <div style="height:5px;"></div>
				
			</div><!--box-->
		<?php endif; ?>
		<div class="clearfix"></div>
	</div><!--right_side-->

</div><!--main_index-->