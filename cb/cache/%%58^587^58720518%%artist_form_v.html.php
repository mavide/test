<?php /* Smarty version 2.6.18, created on 2013-04-10 18:50:56
         compiled from C:%5CProgram+Files+%28x86%29%5CEasyPHP-12.1%5Cwww%5Ccb/styles/youtube/layout//blocks/artist_form_v.html */ ?>
<!-- Add To Artist This <?php echo $this->_tpl_vars['type']; ?>
 -->
<div id="artist_form" class="action_box"  >
	<div class="action_box_title">Add this <?php echo $this->_tpl_vars['params']['type']; ?>
 to artist <?php if ($this->_tpl_vars['params']['type'] == 'collection'): ?> or playlist<?php endif; ?></span></div>
    <div class="form_container" align="center">
    
     <div class="form_result" id="artist_form_result" style="display:none"></div>
     
    <form id="add_artist_form" name="artist_form" method="post" action="" class="">
    Please select artist name from following<br>
	<select name="artist" id="artist" style="font:normal 11px Tahoma, Geneva, sans-serif;">
    <?php unset($this->_sections['clist']);
$this->_sections['clist']['name'] = 'clist';
$this->_sections['clist']['loop'] = is_array($_loop=$this->_tpl_vars['artists']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['clist']['show'] = true;
$this->_sections['clist']['max'] = $this->_sections['clist']['loop'];
$this->_sections['clist']['step'] = 1;
$this->_sections['clist']['start'] = $this->_sections['clist']['step'] > 0 ? 0 : $this->_sections['clist']['loop']-1;
if ($this->_sections['clist']['show']) {
    $this->_sections['clist']['total'] = $this->_sections['clist']['loop'];
    if ($this->_sections['clist']['total'] == 0)
        $this->_sections['clist']['show'] = false;
} else
    $this->_sections['clist']['total'] = 0;
if ($this->_sections['clist']['show']):

            for ($this->_sections['clist']['index'] = $this->_sections['clist']['start'], $this->_sections['clist']['iteration'] = 1;
                 $this->_sections['clist']['iteration'] <= $this->_sections['clist']['total'];
                 $this->_sections['clist']['index'] += $this->_sections['clist']['step'], $this->_sections['clist']['iteration']++):
$this->_sections['clist']['rownum'] = $this->_sections['clist']['iteration'];
$this->_sections['clist']['index_prev'] = $this->_sections['clist']['index'] - $this->_sections['clist']['step'];
$this->_sections['clist']['index_next'] = $this->_sections['clist']['index'] + $this->_sections['clist']['step'];
$this->_sections['clist']['first']      = ($this->_sections['clist']['iteration'] == 1);
$this->_sections['clist']['last']       = ($this->_sections['clist']['iteration'] == $this->_sections['clist']['total']);
?>
    	<option value="<?php echo $this->_tpl_vars['artists'][$this->_sections['clist']['index']]['artist_id']; ?>
"><?php echo $this->_tpl_vars['artists'][$this->_sections['clist']['index']]['artist_name']; ?>
 (<?php echo $this->_tpl_vars['artists'][$this->_sections['clist']['index']]['total_v_objects']; ?>
)</option>
    <?php endfor; else: ?>
    	<option>No Artists Found</option>    
  	<?php endif; ?>
    </select>

    <input type="button" name="add_to_playlist" value="Add to artist" class="cb_button" onclick="artist_actions('add_artist_form','add_new_item_ar','<?php echo $this->_tpl_vars['id']; ?>
','#artist_form_result','video');"/>
    </form>
    </div>
</div>
<!-- Add To Artist This <?php echo $this->_tpl_vars['type']; ?>
 -->