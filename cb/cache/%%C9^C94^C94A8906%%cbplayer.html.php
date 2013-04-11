<?php /* Smarty version 2.6.18, created on 2013-04-10 18:50:56
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/player/cbplayer/cbplayer.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'getThumb', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/player/cbplayer/cbplayer.html', 11, false),array('modifier', 'urlencode', 'C:\\Program Files (x86)\\EasyPHP-12.1\\www\\cb/player/cbplayer/cbplayer.html', 47, false),)), $this); ?>
<div id="mediaplayer">Loading player, please wait....</div>
<script type="text/javascript">
var cb_player_file = '<?php echo $this->_tpl_vars['cb_player_url']; ?>
/player.swf';
var cb_player_url = '<?php echo $this->_tpl_vars['cb_player_url']; ?>
';
var player_logo = '<?php echo $this->_tpl_vars['player_logo']; ?>
';
var hq_video_file = '<?php echo $this->_tpl_vars['hq_vid_file']; ?>
';
var normal_video_file = '<?php echo $this->_tpl_vars['normal_vid_file']; ?>
';
var ytcode = '<?php echo $this->_tpl_vars['ytcode']; ?>
';
var pre_item = "";
var next_item = "";
var preview_img = '<?php echo getSmartyThumb(array('vdetails' => $this->_tpl_vars['vdata'],'size' => 'big'), $this);?>
';
var embed_type = '<?php echo $this->_tpl_vars['Cbucket']->configs['embed_type']; ?>
';


		jwplayer("mediaplayer").setup({
		flashplayer: cb_player_file,
		skin : cb_player_url+'/skins/<?php echo $this->_tpl_vars['cb_skin']; ?>
',
		<?php if ($this->_tpl_vars['ytcode']): ?>
		file: 'http://www.youtube.com/watch?v=<?php echo $this->_tpl_vars['ytcode']; ?>
',
		<?php else: ?>
		file: normal_video_file,
		<?php endif; ?>
		image: preview_img,
		width: '<?php echo $this->_tpl_vars['player_data']['width']; ?>
',
		height:'<?php echo $this->_tpl_vars['player_data']['height']; ?>
',
		autostart : '<?php echo $this->_tpl_vars['player_data']['autoplay']; ?>
',
		
		<!-- Setting Pseudo Streaming -->
		<?php if ($this->_tpl_vars['Cbucket']->configs['pseudostreaming'] == 'yes'): ?>provider: 'http',<?php endif; ?>
		
		<!-- Setting Plugins -->
		'plugins':
		{
			
			<!-- Loading HQ Plugin -->
			'hd-2':
			{
				'file':hq_video_file
			},
			<!-- End Loading HQ Plugin -->
			
			<!-- Loading Related Plugin -->
			'<?php echo $this->_tpl_vars['cb_player_url']; ?>
/plugins/related/related.swf':
			
			{
            	file: cb_player_url+'/plugins/related/related_videos.php'+
				'?vid=<?php echo $this->_tpl_vars['vdata']['videoid']; ?>
&title=<?php echo ((is_array($_tmp=$this->_tpl_vars['vdata']['title'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&tags=<?php echo ((is_array($_tmp=$this->_tpl_vars['vdata']['tags'])) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
',
				usedock :false,
				heading :'More suggested videos'
        	}
			<!-- End Loading Related plugin -->
			
			<!-- Adding Extra Plugin Files -->
			
			<!-- Adding Extra Plugin Files -->
		}
		,
		
		<!-- For Licensensed Players -->
  		<!-- Setting Logo -->
		'logo':{
			file :player_logo ,
			link :baseurl,
			margin : '<?php echo $this->_tpl_vars['logo_margin']; ?>
',
			position : '<?php echo $this->_tpl_vars['logo_placement']; ?>
',
			timeout : '3',
			over :'1',
			out :'0.5'
		},
		<!-- Ending Logo Settings-->
		<!-- Setting context menu -->
		'abouttext' : '<?php echo $this->_tpl_vars['Cbucket']->configs['pakplayer_contextmsg']; ?>
',
		'aboutlink' : baseurl,
		<!-- Setting context menu ends -->
		
		
		<!-- Events And JS Api -->
		events:{
			onComplete:function()
			{
				if(next_item)
				{
					if($.cookie('auto_play_playlist'))
					window.location = next_item;
				}
			}
		}
	});



	<!-- Writing Quality Toggle function which will work outside the player -->
	<?php echo '
	var video_quality = \'normal\';
	function cb_toggle_quality()
	{
		jwplayer().stop();
		if(video_quality==\'normal\')
		{
			video_quality = \'hq\';
			jwplayer().load(hq_video_file);
			jwplayer().play();
		}else
		{
			video_quality = \'normal\';
			jwplayer().load(normal_video_file);
			jwplayer().play();
		}
	}
	has_hq_function = true;
	hq_function = cb_toggle_quality;
	'; ?>

	<!-- Toggle quality video ends -->
</script>