<?php
/**
 * @ Author Arslan Hassan, Fawaz Tahir
 * @ License : Attribution Assurance License -- http://www.opensource.org/licenses/attribution.php
 * @ Class : Artist Class
 * @ date : 10 October 2010
 * @ Version : v2.0.1.9
 */

class Artists extends CBCategory
{
	var $collect_thumb_width = 160;
	var $collect_thumb_height = 120;
	var $collect_small_thumb_width = 120;
	var $collect_small_thumb_height = 90;
	var $items = 'artist_items'; // ITEMS TABLE
	var $types = ''; // TYPES OF ARTISTES
	var $user_links = '';
	var $custom_artist_fields = array();
	var $artist_delete_functions = array();
	var $action = '';
	var $share_variables;
	
	/**
	 * Setting variables of different thing which will
	 * help makes this class reusble for very object
	 */
	var $objTable = 'photos';
	var $objType = 'p';
	var $objName = 'Photo';
	var $objClass = 'cbphoto';
	var $objFunction = 'photo_exists';
	var $objFieldID = 'photo_id';
	
	
	/**
	 * Constructor function to set values of tables
	 */
	function Artists()
	{
		$this->cat_tbl = "artist_categories";
		$this->section_tbl = "artists";
		$this->types = array('videos' => lang("Videos"),'photos' => lang("Photos"));
		ksort($this->types);
		$this->setting_up_artists();
		$this->init_actions();

	}
	
	/**
	 *	 Settings up Action Class
	 */
	function init_actions()
	{
		$this->action = new cbactions();
		$this->action->init();	 // Setting up reporting excuses
		$this->action->type = 'ar';
		$this->action->name = 'artist';
		$this->action->obj_class = 'cbartist';
		$this->action->check_func = 'artist_exists';
		$this->action->type_tbl = "artists";
		$this->action->type_id_field = 'artist_id';	
	} 
	
	/**
	 * Setting links up in my account
	 */
	function setting_up_artists()
	{
		global $userquery,$Cbucket;
		$per = $userquery->get_user_level(userid());
		// Adding My Account Links	
		if(isSectionEnabled('artists'))
		$userquery->user_account[lang('Artists')] = array(
											lang('add_new_artist') => "manage_artists.php?mode=add_new",
											lang('manage_artists') => "manage_artists.php",
											lang('manage_favorite_artists') => "manage_artists.php?mode=favorite"
											);
		
		// Adding Search Type
		if(isSectionEnabled('artists'))
		$Cbucket->search_types['artists'] = "cbartist";
		
		// Adding Artist links in Admin Area
		if($per['artist_moderation'] == "yes")
		$Cbucket->AdminMenu['Artists'] = array(
													lang('Manage Artists')=>'artist_manager.php',
													lang('Manage Categories')=>'artist_category.php',
													lang('Flagged Artists')=>'flagged_artists.php');
		

		// Adding Artist links in Cbucket Class
		$Cbucket->links['artists'] = array('artists.php','artists/');
		$Cbucket->links['manage_artists'] = array('manage_artists.php','manage_artists.php');
		$Cbucket->links['edit_artist'] = array('manage_artists.php?mode=edit_artist&amp;cid=',
												   'manage_artists.php?mode=edit_artist&amp;cid=');
		$Cbucket->links['manage_items'] = array('manage_artists.php?mode=manage_items&amp;cid=%s&amp;type=%s',
												'manage_artists.php?mode=manage_items&amp;cid=%s&amp;type=%s');
		$Cbucket->links['user_artists'] = array('user_artists.php?mode=uploaded&user=','user_artists.php?mode=uploaded&user=');
		$Cbucket->links['user_fav_artists'] = array('user_artists.php?mode=favorite&user=','user_artists.php?mode=favorite&user=');										
												
																																													
	}
		
	/**
	 * Initiatting Search
	 */
	function init_search()
	{
		$this->search = new cbsearch;
		$this->search->db_tbl = "artists";
		$this->search->columns = array(
			array("field"=>"artist_name","type"=>"LIKE","var"=>"%{KEY}%"),
			array("field"=>"artist_tags","type"=>"LIKE","var"=>"%{KEY}%","op"=>"OR")
		);
		$this->search->match_fields = array("artist_name","artist_tags");
		$this->search->cat_tbl = $this->cat_tbl;
		
		$this->search->display_template = LAYOUT.'/blocks/artist.html';
		$this->search->template_var = 'artist';
		$this->search->has_user_id = true;
			
		$sorting	= 	array(
						'date_added'=> lang("date_added"),
						'views'		=> lang("views"),
						'total_comments'  => lang("comments"),
						'total_objects' 	=> lang("Items")
						);
								
		$this->search->sorting	= array(
						'date_added'=> " date_added DESC",
						'views'		=> " views DESC",
						'total_comments'  => " total_comments DESC ",
						'total_objects' 	=> " total_objects DESC"
						);
						
		$default = $_GET;
		if(is_array($default['category']))
			$cat_array = array($default['category']);		
		$uploaded = $default['datemargin'];
		$sort = $default['sort'];
		
		$this->search->search_type['artists'] = array('title'=>lang('artists'));
		$this->search->results_per_page = config('videos_items_search_page');
		
		$fields = array(
		'query'	=> array(
						'title'=> lang('keywords'),
						'type'=> 'textfield',
						'name'=> 'query',
						'id'=> 'query',
						'value'=>cleanForm($default['query'])
						),
		'category'	=>  array(
						'title'		=> lang('category'),
						'type'		=> 'checkbox',
						'name'		=> 'category[]',
						'id'		=> 'category',
						'value'		=> array('category',$cat_array),
						'category_type'	=> 'artists'
						),
		'uploaded'	=>  array(
						'title'		=> lang('uploaded'),
						'type'		=> 'dropdown',
						'name'		=> 'datemargin',
						'id'		=> 'datemargin',
						'value'		=> $this->search->date_margins(),
						'checked'	=> $uploaded,
						),
		'sort'		=> array(
						'title'		=> lang('sort_by'),
						'type'		=> 'dropdown',
						'name'		=> 'sort',
						'value'		=> $sorting,
						'checked'	=> $sort
						)
		);

		$this->search->search_type['artists']['fields'] = $fields;											
	}
	
	/**
	 * Function used to set-up sharing
	 */
	function set_share_mail($data)
	{
		$this->share_variables = array(
				'{name}' => $data['artist_name'],
				'{description}' => $data['artist_description'],
				'{type}' => $data['type'],
				'{total_items}' => $data['total_objects'],
				'{artist_link}' => $this->artist_links($data,'view'),
				'{artist_thumb}' => $this->get_thumb($data,'small',TRUE)
			);
		$this->action->share_template_name = 'artist_share_template';
		$this->action->val_array = $this->share_variables;			
	}
		
	/**
	 * Function used to check if artist exists
	 */
	function artist_exists($id)
	{
		global $db;
		$result = $db->count(tbl($this->section_tbl),"artist_id"," artist_id = $id");
		if($result)
			return true;
		else
			return false;		
	}
	
	/**
	 * Function used to check if object exists
	 * This is a replica of actions.class, exists function
	 */	
	function object_exists($id)
	{
		$obj = $this->objClass;
		global ${$obj};
		$obj = ${$obj};
		$func = $this->objFunction;
		return $obj->{$func}($id);
	}
	
	function collection_exists($id)
	{
		global $db;
		$result = $db->select(tbl('collections'),"collection_id"," collection_id = '$id'");		
		if($result)
			return true;
		else
			return false;		
	}
	
	function video_exists($id)
	{
		global $db;
		$result = $db->select(tbl('video'),"videoid"," videoid = '$id'");		
		if($result)
			return true;
		else
			return false;		
	}
	
	/**
	 * Function used to get artist
	 */
	function get_artist($id,$cond=NULL)
	{
		global $db;
		$result = $db->select(tbl($this->section_tbl).",".tbl("users"),
		"".tbl($this->section_tbl).".*,".tbl('users').".userid,".tbl('users').".username",
		" ".tbl($this->section_tbl).".artist_id = $id AND ".tbl($this->section_tbl).".userid = ".tbl('users').".userid $cond");
		//echo $db->db_query;
		if($result)
			return $result[0];
		else
			return false;		
	}
	
	function is_viewable($cid)
	{
		global $userquery;
		
		$c = $this->get_artist($cid);
		if(empty($c))
		{
			e(lang('artist_not_exists'));
			return false;	
		} elseif($c['active'] == 'no') {
			e(lang('artist_not_active'));
			if(!has_access('admin_access',TRUE))
				return false;
			else
				return true;		
		} elseif($c['broadcast'] == 'private' && !$userquery->is_confirmed_friend($c['userid'],userid())
				&& $c['userid']!=userid() && !has_access('admin_access',TRUE))
		{
			e(lang('artist_is_private'));
			return false;
		} else {
			return true;	
		}
	}
	
	/**
	 * Function used to get artists
	 */
	function get_artists($p=NULL)
	{
		global $db;
		
		$limit = $p['limit'];
		$order = $p['order'];	
		$cond = "";
		
		if(!has_access('admin_access',TRUE) && $p['user'] != userid())
			$cond .= " ".tbl('artists.active')." = 'yes'";
		elseif($p['user'] == userid())
			$cond .= " ".tbl('artists.active')." = 'yes'";	
		else
		{
			if($p['active'])
			{
				$cond .= " ".tbl('artists.active')." = '".$p['active']."'";
			}
			
			if($p['broadcast'])
			{
				if($cond != '')
					$cond .= " AND ";
				$cond .= " ".tbl('artists.broadcast')." = '".$p['broadcast']."'";		
			}
		}
		
		if($p['category'])
		{
			$get_all = false;
			if(!is_array($p['category']))
				if(strtolower($p['category']) == 'all')
					$get_all = true;
			
			if(!$get_all)
			{
				if($cond != '')
					$cond .= " AND ";
					
				$cond .= "(";
				if(!is_array($p['category']))
					$cats = explode(',',$p['category']);
				else
					$cats = $p['category'];
				$count = 0;
				
				foreach($cats as $cat)
				{
					$count++;
					if($count > 1)
						$cond .= " OR ";
					$cond .= " ".tbl('artists.category')." LIKE '%#$cat#%'";	
				}
				$cond .= ")";		
			}
		}
		
		if($p['date_span'])
		{
			if($cond!='')
				$cond .= ' AND ';
			$cond .= " ".cbsearch::date_margin("date_added",$p['date_span']);	
		}
		
		if($p['user'])
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ".tbl('artists.userid')." = '".$p['user']."'";		
		}
		
		if($p['type'])
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ".tbl('artists.type')." = '".$p['type']."'";		
		}
			
		if($p['featured'])
		{
			if($cond != '')	
				$cond .= " AND ";
			$cond .= " ".tbl('artists.featured')." = '".$p['featured']."'";	
		}
		
		if($p['public_upload'])
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ".tbl('artists.public_upload')." = '".$p['public_upload']."'";	
		}
		
		if($p['exclude'])
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ".tbl('artists.artist_id')." <> '".$p['exclude']."'";		
		}
		
		if($p['cid'])
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ".tbl('artists.artist_id')." = '".$p['cid']."'";		
		}
		
		

		/** Get only with those who have items **/
		if($p['has_items'] )
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ".tbl('artists.total_objects')." >= '1'";		
		}
		
		
		$title_tag = '';
		
		if($p['name'])
		{
			$title_tag .= " ".tbl('artists.artist_name')." LIKE '%".$p['name']."%'";	
		}
		
		if($p['tags'])
		{
			$tags = explode(",",$p['tags']);
			if(count($tags)>0)
			{
				if($title_tag != '')
					$title_tag .= " OR ";
				$total = count($tags);
				$loop = 1;
				foreach($tags as $tag)
				{
					$title_tag .= " ".tbl('artists.artist_tags')." LIKE '%$tag%'";
					if($loop<$total)
						$title_tag .= " OR ";
					$loop++;		
				}
			} else {
				if($title_tag != '')
					$title_tag .= " OR ";
				$title_tag .= " ".tbl('artists.artist_tags')." LIKE '%".$p['tags']."%'";		
			}
		}
		
		if($title_tag != "")
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ($title_tag) ";		
		}
		
		if(!$p['count_only'])
		{
			if($cond != "")
				$cond .= " AND ";
			$result =   $db->select(tbl("artists,users"),
						tbl("artists.*,users.userid,users.username"),
						$cond.tbl("artists.userid")." = ".tbl("users.userid"),$limit,$order);
									
			//echo $db->db_query;	
						
		}
		
		if($p['count_only'])
		{
			return $result = $db->count(tbl("artists"),"artist_id",$cond);
			//echo $db->db_query;	
		}
		
		if($p['assign'])
			assign($p['assign'],$result);
		else
			return $result;	
		
	}
	
	function get_public_active_artists($p=NULL)
	{
		global $db;
		
		$limit = $p['limit'];
		$order = $p['order'];	
		$cond = "";
		$cond .= " ".tbl('artists.active')." = 'yes'";
		$cond .= " AND ";
		$cond .= " ".tbl('artists.broadcast')." = '".'public'."'";
		$cond .= " AND ";
		$cond .= " ".tbl('artists.total_objects')." >= '1'";		
		
		if($p['category'])
		{
			$get_all = false;
			if(!is_array($p['category']))
				if(strtolower($p['category']) == 'all')
					$get_all = true;
			
			if(!$get_all)
			{
				if($cond != '')
					$cond .= " AND ";
					
				$cond .= "(";
				if(!is_array($p['category']))
					$cats = explode(' ',$p['category']);
				else
					$cats = $p['category'];
				$count = 0;
				foreach($cats as $cat)
				{
					if($cat != '')
					{
					$count++;
					if($count > 1)
						$cond .= " OR ";
					$cond .= " ".tbl('artists.category')." LIKE '%$cat%'";	 
					}
				}
				$cond .= ")";		
			}
		}
		
		if($p['date_span'])
		{
			if($cond!='')
				$cond .= ' AND ';
			$cond .= " ".cbsearch::date_margin("date_added",$p['date_span']);	
		}
		
		if($p['type'])
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ".tbl('artists.type')." = '".$p['type']."'";		
		}
			
		if($p['featured'])
		{
			if($cond != '')	
				$cond .= " AND ";
			$cond .= " ".tbl('artists.featured')." = '".$p['featured']."'";	
		}
		
		if($p['public_upload'])
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ".tbl('artists.public_upload')." = '".$p['public_upload']."'";	
		}
		
		if($p['exclude'])
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ".tbl('artists.artist_id')." <> '".$p['exclude']."'";		
		}
		
		if($p['cid'])
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ".tbl('artists.artist_id')." = '".$p['cid']."'";		
		}
		
		


		
		
		$title_tag = '';
		
		if($p['name'])
		{
			$title_tag .= " ".tbl('artists.artist_name')." LIKE '%".$p['name']."%'";	
		}
		
		if($p['tags'])
		{
			$tags = explode(",",$p['tags']);
			if(count($tags)>0)
			{
				if($title_tag != '')
					$title_tag .= " OR ";
				$total = count($tags);
				$loop = 1;
				foreach($tags as $tag)
				{
					$title_tag .= " ".tbl('artists.artist_tags')." LIKE '%$tag%'";
					if($loop<$total)
						$title_tag .= " OR ";
					$loop++;		
				}
			} else {
				if($title_tag != '')
					$title_tag .= " OR ";
				$title_tag .= " ".tbl('artists.artist_tags')." LIKE '%".$p['tags']."%'";		
			}
		}
		
		if($title_tag != "")
		{
			if($cond != '')
				$cond .= " AND ";
			$cond .= " ($title_tag) ";		
		}
		
		if(!$p['count_only'])
		{
			if($cond != "")
				$cond .= " AND ";
			$result =   $db->select(tbl("artists,users"),
						tbl("artists.*,users.userid,users.username"),
						$cond.tbl("artists.userid")." = ".tbl("users.userid"),$limit,$order);
									
			//echo $db->db_query;	
						
		}
		
		if($p['count_only'])
		{
			return $result = $db->count(tbl("artists"),"artist_id",$cond);
			//echo $db->db_query;	
		}
		
		if($p['assign'])
			assign($p['assign'],$result);
		else
			return $result;	
		
	}
	
	/**
	 * Function used to get artist items
	 */
	function get_artist_items($id,$order=NULL,$limit=NULL)
	{
		global $db;
		$result = $db->select(tbl($this->items),"*"," artist_id = $id",$limit,$order);
		if($result)
			return $result;
		else
			return false;		
	}
	
	/**
	 * Function used to get next / previous artist item
	 */
	function get_next_prev_item($ci_id,$cid,$item="prev",$limit=1,$check_only=false)
	{
		global $db;
		$iTbl = tbl($this->items);
		$oTbl = tbl($this->objTable);
		$uTbl = tbl('users');
		$tbls = $iTbl.",".$oTbl.",".$uTbl;
		
		if($item == "prev")
		{
			$op = ">";
			$order = '';
		}
		elseif($item == "next")
		{
			$op = "<";
			$order = $iTbl.".ci_id DESC";
		}
		elseif($item == NULL)
		{
			$op = "=";
			$order = '';
		}
		
		$cond = " $iTbl.artist_id = $cid AND $iTbl.ci_id $op $ci_id AND $iTbl.object_id = $oTbl.".$this->objFieldID." AND $oTbl.userid = $uTbl.userid";
		if(!$check_only)
		{	
			$result = $db->select($tbls,"$iTbl.*,$oTbl.*,$uTbl.username", $cond,$limit,$order);
			
			// Result was empty. Checking if we were going backwards, So bring last item
			if(empty($result) && $item == "prev")
			{
				$order = $iTbl.".ci_id ASC";
				$op = "<";
				$result = $db->select($tbls,"$iTbl.*,$oTbl.*,$uTbl.username", " $iTbl.artist_id = $cid AND $iTbl.ci_id $op $ci_id AND $iTbl.object_id = $oTbl.".$this->objFieldID." AND $oTbl.userid = $uTbl.userid",$limit,$order);
			}
			
			// Result was empty. Checking if we were going fowards, So bring first item
			if(empty($result) && $item == "next")
			{
				$order = $iTbl.".ci_id DESC";
				$op = ">";
				$result = $db->select($tbls,"$iTbl.*,$oTbl.*,$uTbl.username", " $iTbl.artist_id = $cid AND $iTbl.ci_id $op $ci_id AND $iTbl.object_id = $oTbl.".$this->objFieldID." AND $oTbl.userid = $uTbl.userid",$limit,$order);	
			}
		}
		
		if($check_only)
		{	
			$result = $db->count($iTbl.",".$oTbl,"$iTbl.ci_id", " $iTbl.artist_id = $cid AND $iTbl.ci_id $op $ci_id AND $iTbl.object_id = $oTbl.".$this->objFieldID,$limit,$order);
		}
		
		//echo $db->db_query;
		if($result)
			return $result;
		else
			return false;			
		
	}
	
	/**
	 * Function used to set cookie on moving
	 * forward or backward
	 */
	function set_item_cookie($value)
	{
		if(isset($_COOKIE['current_item']))
			unset($_COOKIE['current_item']);
		
		setcookie('current_item',$value,time()+240);	
	}
	
	/**
	 * Function used to get artist items with details
	 */
	function get_artist_items_with_details($id,$order=NULL,$limit=NULL,$count_only=FALSE)
	{
		global $db;
		$itemsTbl = tbl($this->items);
		$objTbl = tbl($this->objTable); 
		$tables = $itemsTbl.",".$objTbl.",".tbl("users");
		if(!$count_only)
		{
			$result = $db->select($tables,"$itemsTbl.artist_id,$objTbl.*,".tbl('users').".username"," $itemsTbl.artist_id = '$id' AND $itemsTbl.object_id = $objTbl.".$this->objFieldID." AND $itemsTbl.userid = ".tbl('users').".userid",$limit,$order);
			//echo $db->db_query;
		} else {
			$result = $db->count($itemsTbl,"ci_id"," artist_id = $id and type='cl'");	
		}
		
		if($result)
		{
			return $result;	
		}
		else
			return false;	
	}
	
		/**
	 * Function used to get artist items with details
	 */
	function get_artist_videos_with_details($id,$order=NULL,$limit=NULL,$count_only=FALSE)
	{
		global $db;
		$itemsTbl = tbl($this->items);
		$objTbl = tbl('video'); 
		$tables = $itemsTbl.",".$objTbl.",".tbl("users");
		$cond = " type='v'";
		if(!$count_only)
		{
			$result = $db->select($tables,"$itemsTbl.artist_id,$objTbl.*,".tbl('users').".username"," $itemsTbl.artist_id = '$id' AND $itemsTbl.object_id = $objTbl.videoid AND $itemsTbl.userid = ".tbl('users').".userid",$limit,$order);
			//echo $db->db_query;
		} else {
			$result = $db->count($itemsTbl,"ci_id"," artist_id = $id and type='v'");		
		}
		
		if($result)
		{
			return $result;	
		}
		else
			return false;	
	}
	
	/**
	 * Function used to get artist items with
	 * specific fields
	 */
	function get_artist_item_fields($cid,$objID,$fields)
	{
		global $db;
		$result = $db->select(tbl($this->items),$fields," object_id = $objID AND artist_id = $cid");
		if($result)
			return $result;
		else
			return false;	
	}
		
	/**
	 * Function used to load artists fields
	 */
	function load_required_fields($default=NULL)
	{
		if($default==NULL)
			$default = $_POST;
			
		$name = $default['artist_name'];
		$description = $default['artist_description'];
		$tags = $default['artist_tags'];
		$type = $default['type'];
		if(is_array($default['category']))
			$cat_array = array($default['category']);		
		else
		{
			preg_match_all('/#([0-9]+)#/',$default['category'],$m);
			$cat_array = array($m[1]);
		}
		
		$reqFileds = array
		(
			'name' => array(
						   'title'=> lang("artist_name"),
						   'type' => 'textfield',
						   'name' => 'artist_name',
						   'id' => 'artist_name',
						   'value' => cleanForm($name),
						   'db_field' => 'artist_name',
						   'required' => 'yes',
						   'invalid_err' => lang("collect_name_er")
						   ),
			
			'desc' => array(
							'title' => lang("artist_description"),
							'type' => 'textarea',
							'name' => 'artist_description',
							'id' => 'colleciton_desciption',
							'value' => cleanForm($description),
							'db_field' => 'artist_description',
							'required' => 'yes',
							'anchor_before' => 'before_desc_compose_box',
							'invalid_err' => lang("collect_descp_er")
							),
			'tags' => array(
							'title' => lang("artist_tags"),
							'type' => 'textfield',
							'name' => 'artist_tags',
							'id' => 'artist_tags',
							'value' => cleanForm(genTags($tags)),
							'hint_2' => lang("collect_tag_hint"),
							'db_field' => 'artist_tags',
							'required' => 'yes',
							'invalid_err' => lang("collect_tag_er"),
							'validate_function' => 'genTags'
							),
							
			'cat' => array(
						   'title' => lang("collect_category"),
						   'type' => 'checkbox',
						   'name' => 'category[]',
						   'id' => 'category',
						   'value' => array('category',$cat_array),
						   'db_field' => 'category',
						   'required' => 'yes',
						   'validate_function' => 'validate_artist_category',
						   'invalid_err' => lang('collect_cat_er'),
						   'display_function' => 'convert_to_categories',
						   'category_type' => 'artists'
						   ),
						   
			'type' => array(
							'title' => lang("collect_type"),
							'type' => 'dropdown',
							'name' => 'type',
							'id' => 'type',
							'value' => $this->types,
							'db_field' => 'type',
							'required' => 'yes',
							'checked' => $type
							)						   														   					   
		);
		
		return $reqFileds;	
	}
	
	/**
	 * Function used to load artists optional fields
	 */
	function load_other_fields($default=NULL)
	{
		if($default==NULL)
			$default = $_POST;
			
		$broadcast = $default['broadcast'];
		$allow_comments = $default['allow_comments'];
		$public_upload = $default['public_upload'];
		
		$other_fields = array
		(
			'broadcast' => array(
								'title' => lang("vdo_br_opt"),
								'type' => 'radiobutton',
								'name' => 'broadcast',
								'id' => 'broadcast',
								'value' => array("public"=>lang("collect_borad_pub"),"private"=>lang("collect_broad_pri")),
								'checked' => $broadcast,
								'db_field' => 'broadcast',
								'required' => 'no',
								'validate_function'=>'yes_or_no',
								'display_function' => 'display_sharing_opt',
								'default_value'=>'yes'
								),
			'comments' => array(
									'title' => lang("comments"),
									'type' => 'radiobutton',
									'id' => 'allow_comments',
									'name' => 'allow_comments',
									'value' => array("yes"=>lang("vdo_allow_comm"),"no"=>lang("vdo_dallow_comm")),
									'checked' => $allow_comments,
									'db_field' => 'allow_comments',
									'required' => 'no',
									'validate_function'=>'yes_or_no',
									'display_function' => 'display_sharing_opt',
									'default_value'=>'yes'
									),
			'public_upload' => array(
									'title' => lang("collect_allow_public_up"),
									'type' => 'radiobutton',
									'id' => 'public_upload',
									'name' => 'public_upload',
									'value' => array("no"=>lang("collect_pub_up_dallow"),"yes"=>lang("collect_pub_up_allow")),
									'checked' => $public_upload,
									'db_field' => 'public_upload',
									'required' => 'no',
									'validate_function'=>'yes_or_no',
									'display_function' => 'display_sharing_opt',
									'default_value'=>'no'
									)									  								
		);
		return $other_fields;	
	}
	
	/**
	 * Function used to validate form fields
	 */
	function validate_form_fields($array=NULL)
	{
		$reqFileds = $this->load_required_fields($array);
		
		if($array==NULL)
			$array = $_POST;
			
		if(is_array($_FILES))
			$array = array_merge($array,$_FILES);
				
		
		$otherFields = $this->load_other_fields($array);
		
		$artist_fields = array_merge($reqFileds,$otherFields);
		
		validate_cb_form($artist_fields,$array);	
	}
	
	/**
	 * Function used to validate artist category
	 * @param input array
	 */	
	function validate_artist_category($array=NULL)
	{
		if($array==NULL)
			$array = $_POST['category'];
		if(count($array)==0)
			return false;
		else
		{
			
			foreach($array as $arr)
			{
				if($this->category_exists($arr))
					$new_array[] = $arr;
			}
		}
		if(count($new_array)==0)
		{
			e(lang('vdo_cat_err3'));
			return false;
		}
		/*elseif(count($new_array)>ALLOWED_GROUP_CATEGORIES)
		{
			e(sprintf(lang('vdo_cat_err2'),ALLOWED_GROUP_CATEGORIES));
			return false;
		}*/
			
		return true;
	}
	
	/**
	 * Function used to create artists
	 */
	function create_artist($array=NULL)
	{
		global $db, $userquery;
		
		if($array==NULL)
			$array = $_POST;
			
		if(is_array($_FILES))
			$array = array_merge($array,$_FILES);
			
		$this->validate_form_fields($array);
		
		if(!error())
		{
			$fields = $this->load_required_fields($array);
			$artist_fields = array_merge($fields,$this->load_other_fields($array));
			
			if(count($this->custom_artist_fields) > 0)
				$artist_fields = array_merge($artist_fields,$this->custom_artist_fields);
	
			foreach($artist_fields as $field)
			{
				$name = formObj::rmBrackets($field['name']);
				$val = $array[$name];
				
				if($field['use_func_val'])
					$val = $field['validate_function']($val);
				
				if(!empty($field['db_field']))
					$query_field[] = $field['db_field'];
				
				if(is_array($val))
				{
					$new_val = '';
					foreach($val as $v)
					{
						$new_val .= "#".$v."# ";
					}
					$val = $new_val;
				}
				if(!$field['clean_func'] || (!function_exists($field['clean_func']) && !is_array($field['clean_func'])))
					$val = ($val);
				else
					$val = apply_func($field['clean_func'],sql_free('|no_mc|'.$val));

				if(!empty($field['db_field']))
					$query_val[] = $val;	
			}
			
			// date_added
			$query_field[] = "date_added";
			$query_val[] = NOW();
			
			// user
			$query_field[] = "userid";
			if($array['userid'])
				$query_val[] = $userid = $array['userid'];
			else
				$query_val[] =  $userid = userid();
				
			// active
			$query_field[] = "active";
			$query_val[] = "yes";

			$insert_id = $db->insert(tbl($this->section_tbl),$query_field,$query_val);
			
			addFeed(array('action'=>'add_artist','object_id' => $insert_id,'object'=>'artist'));
			
			//Incrementing usr artist
			$db->update(tbl("users"),array("total_artists"),array("|f|total_artists+1")," userid='".$userid."'");
			
			e(lang("collect_added_msg"),"m");
			return $insert_id;	
		}
	}
	
	/**
	 * Function used to get artist owner
	 */
	function get_artist_owner($cid)
	{
		global $db;
		$user_tbl = tbl("users");
		$result = $db->select(tbl($this->section_tbl.",users"),tbl($this->section_tbl).".*,$user_tbl.userid,$user_tbl.username"," artist_id = $cid AND ".tbl($this->section_tbl).".userid = $user_tbl.userid");
		if($db->num_rows > 0)
			return $result[0]['userid'];
		else
			return false;	
	}
	
	/**
	 * Function used to add item in artist
	 */
	function add_artist_item_cl($objID,$cid,$type)
	{
		global $db;
		if($array==NULL)
			$array = $_POST;
		
		if($this->artist_exists($cid))
		{
		
			if(!userid())
				e(lang("you_not_logged_in"));
			elseif($this->object_in_artist($objID,$cid))
				e(sprintf(lang("object_exists_artist"),$this->objName));
			elseif (!$this->collection_exists($objID))
					e(sprintf(lang("collection_does_not_exists"),$this->objName));	
			else
			{			
				$flds = array("artist_id","object_id","type","userid","date_added");
				$vls = array($cid,$objID,$type,userid(),NOW());
				$db->insert(tbl($this->items),$flds,$vls);
				$db->update(tbl($this->section_tbl),array("total_objects"),array("|f|total_objects+1")," artist_id = $cid");
				e(sprintf(lang("item_added_in_artist"),$this->objName),"m");	
			}
		} else {
			e(lang("artist_not_exist"));	
		}
	}
	

	/**
	 * Function used to add item in artist
	 */
	function add_artist_item_v($objID,$cid,$type)
	{
		global $db;
		if($array==NULL)
			$array = $_POST;
		
		if($this->artist_exists($cid))
		{
		
			if(!userid())
				e(lang("you_not_logged_in"));
			elseif($this->object_in_artist($objID,$cid))
				e(sprintf(lang("object_exists_artist"),$this->objName));
			elseif (!$this->object_exists($objID))
					e(sprintf(lang("object_does_not_exists"),$this->objName));	
			else
			{			
				$flds = array("artist_id","object_id","type","userid","date_added");
				$vls = array($cid,$objID,$type,userid(),NOW());
				$db->insert(tbl($this->items),$flds,$vls);
				$db->update(tbl($this->section_tbl),array("total_v_objects"),array("|f|total_v_objects+1")," artist_id = $cid");
				e(sprintf(lang("item_added_in_artist"),$this->objName),"m");	
			}
		} else {
			e(lang("artist_not_exist"));	
		}
	}
	
	
	/**
	 * Function used to check if object exists in artist
	 */
	function object_in_artist($id,$cid)
	{
		global $db;
		$result = $db->select(tbl($this->items),"*"," object_id = $id AND artist_id = $cid");
		if($result)
			return $result[0];
		else
			return false;		
	}
	
	/**
	 * Function used to get artist field vlaue
	 */
	function get_artist_field($cid,$field=NULL)
	{
		global $db;
		if($field==NULL)
			$field = "*";
		else
			$field = $field;
			
		if(is_array($cid))
			$id = $cid['artist_id'];
		else
			$id = $cid;
			
		$result = $db->select(tbl($this->section_tbl),$field," artist_id = $id");
		if($result)
		{
			if(count($result[0]) > 2)
				return $result[0];
			else
				return $result[0][$field];	
		} else
			return false;
	}
	
	/**
	 * Function used to check if user artist owner
	 */
	function is_artist_owner($cdetails,$userid=NULL)
	{
		if($userid==NULL)
			$userid = userid();
			
		if(!is_array($cdetails))
			$details = $this->get_artist($cdetails);
		else
			$details = $cdetails;
			
		if($details['userid'] == $userid)
			return true;
		else
			return false;				
	}
	
	/**
	 * Function used to delete artist
	 */
	function delete_artist($cid)
	{
		global $db,$eh;
		$artist = $this->get_artist($cid);
		if(empty($artist))
			e(lang("artist_not_exists"));
		elseif($artist['userid'] != userid() && !has_access('admin_access',true))
			e(lang("cant_perform_action_collect"));
		else
		{
			$del_funcs = $this->artist_delete_functions;
			if(is_array($del_funcs) && !empty($del_funcs))
			{
				foreach($del_funcs as $func)
				{
					if(function_exists($func))
						$func($artist);	
				}
			}
			
			$db->delete(tbl($this->items),array("artist_id"),array($cid));
			$this->delete_thumbs($cid);
			$db->delete(tbl($this->section_tbl),array("artist_id"),array($cid));
						
			//Decrementing users total artist
			$db->update(tbl("users"),array("total_artists"),array("|f|total_artists-1")," userid='".$cid."'");
			//Removing video Comments
			$db->delete(tbl("comments"),array("type","type_id"),array("cl",$cid));
			//Removing video From Favortes
			$db->delete(tbl("favorites"),array("type","id"),array("cl",$cid));
			$eh->flush();
			e(lang("artist_deleted"),"m");	
		}
	}
	
	/**
	 * Function used to delete artist items
	 */
	function delete_artist_items($cid)
	{
		global $db;
		$artist = $this->get_artist($id);
		if(!$artist)
			e(lang("artist_not_exists"));
		elseif($artist['userid'] != userid() && !has_access('admin_access',true))
			e(lang("cant_perform_action_collect"));
		else {
			$db->delete(tbl($this->items),array("artist_id"),array($cid));
			$db->update(tbl($this->section_tbl),array("total_objects"),array($this->count_items($cid))," artist_id = $cid");			
			e(lang("collect_items_deleted"),"m");	
		}
	}
	
	/**
	 * Function used to delete artist items
	 */
	function remove_item($id,$cid)
	{
		global $db;
				
		if($this->artist_exists($cid))
		{
			if(!userid())
				e(lang("you_not_logged_in"));
			elseif(!$this->object_in_artist($id,$cid))
				e(sprintf(lang("object_not_in_collect"),$this->objName));
			elseif(!$this->is_artist_owner($cid) && !has_access('admin_access',true))
				e(lang("cant_perform_action_collect"));
			else
			{
				$db->execute("DELETE FROM ".tbl($this->items)." WHERE object_id = $id AND artist_id = $cid");
				$db->update(tbl($this->section_tbl),array("total_objects"),array("|f|total_objects-1")," artist_id = $cid");
				e(sprintf(lang("collect_item_removed"),$this->objName),"m");	
			}
		} else {
			e(lang('collect_not_exists'));
			return false;	
		}
	}
	
	/**
	 * Function used to count artist items
	 */
	function count_items($cid)
	{
		global $db;
		$count = $db->count($this->items,"ci_id"," artist_id = $cid");	
		if($count)
			return $count;
		else
			return 0;	
	}
		
	/**
	 * Function used to delete artist preview
	 */
	function delete_thumbs($cid)
	{
		$glob = glob(ARTIST_THUMBS_DIR."/$cid*.jpg");
		if($glob)
		{
			foreach($glob as $file)
			{
				if(file_exists($file))
					unlink($file);
			}
		} else {
			return false;	
		}
	}
	
	/**
	 * Function used to create artist preview
	 */
	function upload_thumb($cid,$file)
	{
		global $imgObj,$cbphoto;
		$file_ext = strtolower(getext($file['name']));
		$exts = array("jpg","gif","jpeg","png");
		
		foreach($exts as $ext)
		{
			if($ext == $file_ext)
			{
				$thumb = ARTIST_THUMBS_DIR."/".$cid.".".$ext;
				$sThumb = ARTIST_THUMBS_DIR."/".$cid."-small.".$ext;
				foreach($exts as $un_ext)
					if(file_exists(ARTIST_THUMBS_DIR."/".$cid.".".$un_ext) && file_exists(ARTIST_THUMBS_DIR."/".$cid."-small.".$un_ext))
					{
						unlink(ARTIST_THUMBS_DIR."/".$cid.".".$un_ext); 
						unlink(ARTIST_THUMBS_DIR."/".$cid."-small.".$un_ext);
					}
				move_uploaded_file($file['tmp_name'],$thumb);
				if(!$imgObj->ValidateImage($thumb,$ext))
					e("pic_upload_vali_err");
				else
				{
					$imgObj->createThumb($thumb,$thumb,$this->collect_thumb_width,$ext,$this->collect_thumb_height);
					$imgObj->createThumb($thumb,$sThumb,$this->collect_small_thumb_width,$ext,$this->collect_small_thumb_height);	
				}
			}
		}
	}
	
	/**
	 * Function used to create artist preview
	 */
	function update_artist($array=NULL)
	{
		global $db;
		
		if($array==NULL)
			$array = $_POST;
		
		if(is_array($_FILES))
			$array = array_merge($array,$_FILES);
			
		$this->validate_form_fields($array);
		$cid = $array['artist_id'];
		
		if(!error())
		{
			$reqFields = $this->load_required_fields($array);
			$otherFields = $this->load_other_fields($array);
			
			$artist_fields = array_merge($reqFields,$otherFields);
			if($this->custom_artist_fields > 0)
				$artist_fields = array_merge($artist_fields,$this->custom_artist_fields);
			foreach($artist_fields as $field)
			{
				$name = formObj::rmBrackets($field['name']);
				$val = $array[$name];
				
				if($field['use_func_val'])
					$val = $field['validate_function']($val);
				
				
				if(!empty($field['db_field']))
				$query_field[] = $field['db_field'];
				
				if(is_array($val))
				{
					$new_val = '';
					foreach($val as $v)
					{
						$new_val .= "#".$v."# ";
					}
					$val = $new_val;
				}
				if(!$field['clean_func'] || (!function_exists($field['clean_func']) && !is_array($field['clean_func'])))
					$val = ($val);
				else
					$val = apply_func($field['clean_func'],sql_free('|no_mc|'.$val));
				
				if(!empty($field['db_field']))
				$query_val[] = $val;
				
			}
			
			if(has_access('admin_access',TRUE))
			{
				
				if(!empty($array['total_comments']))
				{
					$total_comments = $array['total_comments'];
					if(!is_numeric($total_comments) || $total_comments<0)
						$total_comments = 0;
						
					$query_field[] = "total_comments";
					$query_val[] = $total_comments;	
				}
				
				if(!empty($array['total_objects']))
				{
					$tobj = $array['total_objects'];
					if(!is_numeric($tobj) || $tobj<0)
						$tobj = 0;
					$query_field[] = "total_objects";
					$query_val[] = $tobj;	
				}
			}
		}
		
		if(!error())
		{
			if(!userid())
				e(lang("you_not_logged_in"));
			elseif(!$this->artist_exists($cid))
				e(lang("collect_not_exist"));
			elseif(!$this->is_artist_owner($cid,userid()) && !has_access('admin_access',TRUE))
				e(lang("cant_edit_artist"));
			else
			{
				$db->update(tbl($this->section_tbl),$query_field,$query_val," artist_id = $cid");
				e(lang("artist_updated"),"m");
				
				if(!empty($array['artist_thumb']['tmp_name']))
					$this->upload_thumb($cid,$array['artist_thumb']);	
			}
		}
	}
	
	/**
	 * Function used get default thumb
	 */
	function get_default_thumb($size=NULL)
	{
		if($size=="small" && file_exists(TEMPLATEDIR."/images/thumbs/artist_thumb-small.png"))
		{
			return TEMPLATEDIR."/images/thumbs/artist_thumb-small.png";	
		} elseif(!$size && file_exists(TEMPLATEDIR."/images/thumbs/artist_thumb.png")) {
			return TEMPLATEDIR."/images/thumbs/artist_thumb.png";	
		} else {
			if($size == "small")
				$thumb = ARTIST_THUMBS_URL."/no_thumb-small.png";
			else
				$thumb = ARTIST_THUMBS_URL."/no_thumb.png";
				
			return $thumb;			
		}
	}
	
	/**
	 * Function used get artist thumb
	 */
	function get_thumb($cdetails,$size=NULL,$return_c_thumb=false)
	{
		
		if(is_numeric($cdetails))
		{
			$cdetails = $this->get_artist($cdetails);
			$cid = $cdetails['artist_id'];	
		} else
			$cid = $cdetails['artist_id'];
				
		$exts = array("jpg","png","gif","jpeg");
					
		if($return_c_thumb)
		{
			foreach($exts as $ext)
			{
				if($size=="small")
					$s = "-small";
				if(file_exists(ARTIST_THUMBS_DIR."/".$cid.$s.".".$ext))
					return ARTIST_THUMBS_URL."/".$cid.$s.".".$ext;	
			}
		} else {
			
			$item = $this->get_artist_items($cid,'ci_id DESC',1);
			$type = $item[0]['type'];
			switch($type)
			{
				case "v":
				{
					global $cbvideo;
					$thumb = get_thumb($cbvideo->get_video_details($item[0]['object_id']));						
				}
				break;
				
				case "p":
				{
					global $cbphoto;
					$thumb = $cbphoto->get_image_file($cbphoto->get_photo($item[0]['object_id']));	
				}
			}
			
			if($thumb)
				return $thumb;
			else
			{
				foreach($exts as $ext)
				{
					if($size=="small")
						$s = "-small";
					if(file_exists(ARTIST_THUMBS_DIR."/".$cid.$s.".".$ext))
						return ARTIST_THUMBS_URL."/".$cid.$s.".".$ext;	
				}				
			}
		}
		
		return $this->get_default_thumb($size);
	}
	
	
	/**
	 * Used to display artist voterts details.
	 * User who rated, how many stars and when user rated
	 */
	function artist_voters($id,$return_array=FALSE,$show_all=FALSE)
	{
		global $json;
		$c= $this->get_artist($id);
		if((!empty($c) && $c['userid'] == userid()) || $show_all === TRUE)
		{
			global $userquery;
			$voters = $c['voters'];
			if(phpversion() < "5.2.0")
				$voters = $json->json_decode($voters,TRUE);
			else
				$voters = json_decode($voters,TRUE);
				
			if(!empty($voters))	
			{
				if($return_array)
					return $voters;
				else
				{
					foreach($voters as $id=>$details)
					{
						$username = get_username($id);
						$output = "<li id='user".$id.$c['artist_id']."' class='PhotoRatingStats'>";
						$output .= "<a href='".$userquery->profile_link($id)."'>$username</a>";
						$output .= " rated <strong>". $details['rate']/2 ."</strong> stars <small>(";
						$output  .= niceTime($details['time']).")</small>";
						$output .= "</li>";
						echo $output;		
					}	
				}
			}
		} else
			return false;
	}
	
	
	/**
	 * Used to get current rating
	 */
	function current_rating($id)
	{
		global $db;
		$result = $db->select(tbl('artists'),'allow_rating,rating,rated_by,voters,userid'," artist_id = ".$id."");
		if($result)
			return $result[0];
		else
			return false;				
	}
	
	
	/**
	 * Used to rate photo
	 */
	function rate_artist($id,$rating)
	{
		global $db,$json;
		
		if(!is_numeric($rating) || $rating <= 9)
			$rating = 0;
		if($rating >= 10)
			$rating = 10;
			
		$c_rating = $this->current_rating($id);
		$voters   = $c_rating['voters'];
		
		$new_rate = $c_rating['rating'];
		$rated_by = $c_rating['rated_by'];
		
		if(phpversion < '5.2.0')
			$voters = $json->json_decode($voters,TRUE);
		else
			$voters = json_decode($voters,TRUE);

		if(!empty($voters))
			$already_voted = array_key_exists(userid(),$voters);
		
		

		if(!userid())
			e(lang("please_login_to_rate"));
		elseif(userid()==$c_rating['userid'] && !config('own_artist_rating'))
			e(lang("you_cannot_rate_own_artist"));
		elseif(!empty($already_voted))
			e(lang("you_hv_already_rated_photo"));
		elseif($c_rating['allow_rating'] == 'no' || !config('artist_rating'))
			e(lang("artist_rating_not_allowed"));
		else
		{
			$voters[userid()] = array('rate'=>$rating,'time'=>NOW());
			if(phpversion < '5.2.0')
				$voters = $json->json_encode($voters);
			else
				$voters = json_encode($voters);
					
			$t = $c_rating['rated_by'] * $c_rating['rating'];
			$rated_by = $c_rating['rated_by'] + 1;
			$new_rate = ($t + $rating) / $rated_by;
			$db->update(tbl('artists'),array('rating','rated_by','voters'),
			array("$new_rate","$rated_by","|no_mc|$voters"),
			" artist_id = ".$id."");
			$userDetails = array(
				"object_id"	=>	$id,
				"type"	=>	"artist",
				"time"	=>	now(),
				"rating"	=>	$rating,
				"userid"	=>	userid(),
				"username"	=>	username()
			);	
			/* Updating user details */		
			update_user_voted($userDetails);			
			e(lang("thnx_for_voting"),"m");			
		}
	
		$return = array("rating"=>$new_rate,"rated_by"=>$rated_by,'total'=>10,"id"=>$id,"type"=>"artist","disable"=>"disabled");
		return $return;	
	}
	
	/**
	 * Function used generate artist link
	 */
	function artist_rating($cid,$type)
	{	
		switch($type)
		{
			case "videos":
			case "v":
			{
				global $cbvideo;
				$items = $cbvideo->artist->get_artist_items_with_details($cid);
				$total_rating = '';
				if(!empty($items))
				{
					foreach($items as $item)
					{
						$total_rating += $item['rating'];
						if(!empty($item['rated_by']) && $item['rated_by'] != 0)
							$voters[] = $item['rated_by'];	
					}
				}
			}
			break;
			
			case "photos":
			case "p":
			{
				global $cbphoto;
				$items = $cbphoto->artist->get_artist_items_with_details($cid);
				$total_rating = '';
				if(!empty($items))
				{
					foreach($items as $item)
					{
						$total_rating += $item['rating'];
						if(!empty($item['rated_by']) && $item['rated_by'] != 0)
							$voters[] = $item['rated_by'];	
					}
				}
			}
			break;
		}
		$total_voters = count($voters);
		if(!empty($total_rating) && $total_voters != 0)
		{
			$collect_rating = $total_rating / $total_voters;
			return round($collect_rating,2);	
		}
	}
	
	/**
	 * Function used to add comment 
	 */
	function add_comment($comment,$obj_id,$reply_to=NULL,$force_name_email=false)
	{
		global $myquery,$db;
		
		$artist = $this->get_artist($obj_id);
		if(!$artist)
			e(lang("collect_not_exist"));
		else
		{
			$obj_owner = $this->get_artist_field($artist,"userid");
			$cl_link = $this->artist_links($artist,'vc');
			$comment = $myquery->add_comment($comment,$obj_id,$reply_to,'cl',$obj_owner,$cl_link,$force_name_email);
			//echo $comment;
			if($comment)
			{
				$log_array = array
				(
				 'success'=>'yes',
				 'details'=> "comment on a artist",
				 'action_obj_id' => $obj_id,
				 'action_done_id' => $comment,
				);
				insert_log('artist_comment',$log_array);
				
				$this->update_total_comments($obj_id);	
			}
			return $comment;
		}
	}
	
	/**
	 * Function used to update total comments of artist 
	 */
	function update_total_comments($cid)
	{
		global $db;
		$count = $db->count(tbl("comments"),"comment_id"," type = 'cl' AND type_id = '$cid'");
		$db->update(tbl($this->section_tbl),array("total_comments","last_commented"),array($count,now())," artist_id = '$cid'");	
	}
	
	/**
	 * Function used return artist links
	 */
	function artist_links($details,$type=NULL)
	{		
		if(is_array($details))
		{
			if(empty($details['artist_id']))
				return BASEURL;
			else
				$cdetails = $details;		
		} else {
			if(is_numeric($details))
				$cdetails = $this->get_artist($details);
			else
				return BASEURL;		
		}
		
		if(!empty($cdetails))
		{
			if($type == NULL || $type == "main")
			{
				if(SEO == 'yes')
					return BASEURL."/artists";
				else
					return 	BASEURL."/artists.php";	
			}
			elseif($type == "vc" || $type == "view_artist" ||$type == "view")
			{
				if(SEO == 'yes')
					return BASEURL."/artist/".$cdetails['artist_id']."/".$cdetails['type']."/".SEO(($cdetails['artist_name']))."";	
				else
					return BASEURL."/view_artist.php?cid=".$cdetails['artist_id']."&amp;type=".$cdetails['type']; 
			} elseif($type == "vi" || $type == "view_item" ||$type == "item") {
				//$item_type = $this->get_artist_field($cdetails['artist_id'],'type');
				if($cdetails['videoid'])
					$item_type = 'videos';
				else
					$item_type = 'photos';
				switch($item_type)
					{
						case "videos":
						case "v":
						{
							if(SEO == "yes")
								return BASEURL."/item/".$item_type."/".$details['artist_id']."/".$details['videokey']."/".SEO(clean(str_replace(' ','-',$details['title'])));
							else
								return BASEURL."/view_item.php?item=".$details['videokey']."&amp;type=".$item_type."&amp;artist=".$details['artist_id'];
						}
						break;
						
						case "photos":
						case "p":
						{
							if(SEO == "yes")
								return BASEURL."/item/".$item_type."/".$details['artist_id']."/".$details['photo_key']."/".SEO(clean(str_replace(' ','-',$details['photo_title'])));
							else
								return BASEURL."/view_item.php?item=".$details['photo_key']."&amp;type=".$item_type."&amp;artist=".$details['artist_id'];	
						}
						break;
					}
			} elseif($type == 'load_more' || $type == 'more_items' || $type='moreItems') {
				if(empty($cdetails['page_no']))
					$cdetails['page_no'] = 2;
					
				if(SEO == 'yes')
					return "?cid=".$cdetails['artist_id']."&amp;type=".$cdetails['type']."&amp;page=".$cdetails['page_no'];
				else
					return 	"?cid=".$cdetails['artist_id']."&amp;type=".$cdetails['type']."&amp;page=".$cdetails['page_no'];
			}
		} else {
			return BASEURL;	
		}
	}
	
	/**
	 *	Used to update counts
	 */
	function update_artist_counts($id,$amount,$op)
	{
		global $db;
		$db->update(tbl("artists"),array("total_objects"),array("|f|total_objects$op$amount")," artist_id = $id");	
	}
	
	/**
	 *	Used to change artist of product
	 */
	function change_artist($new,$obj,$old=NULL)
	{
		global $db;
		
		/* THIS MEANS OBJECT IS ORPHAN MOST PROBABLY AND HOPEFULLY - PHOTO 
		   NOW WE WILL ADD $OBJ TO $NEW */
		if($old == 0 || $old == NULL)
		{
			$this->add_artist_item($obj,$new);
		} else {
			$update = $db->update(tbl($this->items),array('artist_id'),array($new)," artist_id = $old AND type = '".$this->objType."' AND object_id = $obj");
			
			if(!empty($update))
			{
				$this->update_artist_counts($new,1,'+');
				$this->update_artist_counts($old,1,'-');
			}
		}
	}
	
	/**
	 * Sorting links for artist
	 */
	function sorting_links()
	{
		if(!isset($_GET['sort']))
			$_GET['sort'] = 'most_recent';	
		
		$array = array
			('most_recent' 	=> lang('recent'),
			 'most_viewed'	=> lang('viewed'),
			 'featured'		=> lang('featured'),
			 'most_items'	=> lang('Most Items'),
			 'most_commented'	=> lang('commented'),
			 );
		return $array;	 	
	}
	
	/**
	 * Used to perform actions on artist
	 */
	function artist_actions($action,$cid)
	{
		global $db;
		switch($action)
		{
			case "activate":
			case "activation":
			case "ac":
			{
				$db->update(tbl($this->section_tbl),array("active"),array("yes")," artist_id = $cid");
				e(lang("artist_activated"),"m");
			}
			break;
			
			case "deactivate":
			case "deactivation":
			case "dac":
			{
				$db->update(tbl($this->section_tbl),array("active"),array("no")," artist_id = $cid");
				e(lang("artist_deactivated"),"m");
			}
			break;
			
			case "make_feature":
			case "featured":
			case "mcf":
			{
				$db->update(tbl($this->section_tbl),array("featured"),array("yes")," artist_id = $cid");
				e(lang("artist_featured"),"m");
			}
			break;
			
			case "make_unfeature":
			case "unfeatured":
			case "mcuf":
			{
				$db->update(tbl($this->section_tbl),array("featured"),array("no")," artist_id = $cid");
				e(lang("artist_unfeatured"),"m");
			}
			break;
			
			default:
			{
				header("location:".BASEURL);	
			}
		}
	}
	
	/**
	 * Function used to get artist from its Item ID and type
	 * only get artists of logged in user
	 * @param : OBJ_ID
	 * @param : OBJ_Type
	 * @return : Object
	 */
	function getArtistFromItem($objId,$type=NULL)
	{
		global $db;
		if(!$type)
			$type = $this->objType;
		$userid=userid();
		$results = $db->select(tbl('artists,artist_items'),'*',
		tbl("artists.artist_id")." = ".tbl("artist_items.artist_id")." AND "
		.tbl("artist_items.type='".$type."'")." AND ".tbl("artists.userid='".$userid."'")." AND "
		.tbl("artists.active='yes'")." AND ".tbl("artist_items.object_id='".$objId."'"));
		
		if($db->num_rows>0)
			$assign = $results;
		else
			$assign = false;
			
		return $assign;	
		
	}
	
	/**
	 * Function used to remove item from artists
	 * and decrement artist item count
	 * @param : itemID
	 * @param : type
	 */
	function deleteItemFromArtists($objId,$type=NULL)
	{
		global $db,$cbvid;
		if(!$type)
			$type = $this->objType;

			$db->update(tbl('artists,artist_items'),array('total_objects'),array('|f|total_objects -1'),
			tbl("artists.artist_id")." = ".tbl("artist_items.artist_id")." AND "
			.tbl("artist_items.type='".$type."'")."  AND ".tbl("artist_items.object_id='".$objId."'"));
			
			
			$db->execute("DELETE FROM ".tbl('artist_items')." WHERE "
			.("type='".$type."'")."  AND ".("object_id='".$objId."'"));
	}
	
}

?>