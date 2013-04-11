<?php
/* 
 ****************************************************************
 | Copyright (c) 2007-2010 Clip-Bucket.com. All rights reserved.
 | @ Author	   : FawazTahir, ArslanHassan									
 | @ Software  : ClipBucket , © PHPBucket.com					
 ****************************************************************
*/

define("THIS_PAGE",'manage_artists');
define("PARENT_PAGE","collections");

require 'includes/config.inc.php';
$userquery->logincheck();
$udetails = $userquery->get_user_details(userid());
assign('user',$udetails);
$order = tbl("artist_items").".date_added DESC";

$mode = $_GET['mode'];
$cid = mysql_clean($_GET['cid']);

assign("mode",$mode);
$page = mysql_clean($_GET['page']);
$get_limit = create_query_limit($page,COLLPP);

switch($mode)
{
	case "manage":
	default:
	{
		if(isset($_GET['delete_artist']))
		{
			$cid = clean($_GET['delete_artist']);
			$cbartist->delete_artist($cid);	
		}
		
		if($_POST['delete_selected'])
		{
			$count = count($_POST['check_col']);
			for($i=0;$i<$count;$i++)
			{
				$cbartist->delete_artist($_POST['check_col'][$i]);	
			}
			$eh->flush();
			e("selected_collects_del","m");
		}
		$collectArray = array('user'=>userid(),"limit"=>$get_limit);
		$usr_artists = $cbartist->get_artists($collectArray);
		
		assign('usr_collects',$usr_artists);
		
		$collectArray['count_only'] = TRUE;
		$total_rows = $cbartist->get_artists($collectArray);
		$total_pages = count_pages($total_rows,COLLPP);
		
		//Pagination
		$pages->paginate($total_pages,$page);
		subtitle(lang("manage_artists"));
	}
	break;
	
	case "add_new":
	{
		$reqFields = $cbartist->load_required_fields();
		$otherFields = $cbartist->load_other_fields();
		
		assign("fields",$reqFields);
		assign("other_fields",$otherFields);
		
		if(isset($_POST['add_artist']))
		{
			$cbartist->create_artist($_POST);
			
			if(!error()) $_POST = '';
		}
		
		subtitle(lang("create_artist"));
	}
	break;
	
	case "edit":
	case "edit_artist":
	case "edit_collect":
	{
			
		if(isset($_POST['update_artist']))
		{
			$cbartist->update_artist($_POST);	
		}
		
		$artist = $cbartist->get_artist($cid);
		$reqFields = $cbartist->load_required_fields($artist);
		$otherFields = $cbartist->load_other_fields($artist);
		
		assign("fields",$reqFields);
		assign("other_fields",$otherFields);
		assign('c',$artist);
		
		subtitle(lang("edit_artist"));		
	}
	break;
	
	case "artist_items":
	case "items":
	case "manage_items":
	{
		$type = clean($_GET['type']);
		assign('type',$type);
		switch($type)
		{
			case "videos":
			{
				if(isset($_POST['delete_selected']))
				{
					$count = count($_POST['check_item']);
					for($i=0;$i<$count;$i++)
					{
						$cbvideo->artist->remove_item($_POST['check_item'][$i],$cid);
					}
					$eh->flush();
					e(sprintf("selected_items_removed","videos"),"m");
				}
				$objs = $cbvideo->artist->get_artist_items_with_details($cid,$order);
			}
			break;
			
			case "photos":
			{
				if(isset($_POST['delete_selected']))
				{
					$count = count($_POST['check_item']);
					for($i=0;$i<$count;$i++)
					{
						$cbphoto->artist->remove_item($_POST['check_item'][$i],$cid);
						$cbphoto->make_photo_orphan($cid,$_POST['check_item'][$i]);
					}
					$eh->flush();
					e(sprintf("selected_items_removed","photos"),"m");
				}
				$objs = $cbphoto->artist->get_artist_items_with_details($cid,$order);
			}
			break;
		}
		$artist = $cbartist->get_artist($cid);
		
		assign('c',$artist);
		assign('objs',$objs);
		
		subtitle(lang("manage_artist_items"));
	}
	break;
	
	case "favorite":
	case "favorites": case "fav":
	{
		if(isset($_GET['remove_fav_artist']))
		{
			$cid = mysql_clean($_GET['remove_fav_artist']);
			$cbartist->action->remove_favorite($cid);	
		}
		
		if(isset($_POST['remove_selected_favs']))
		{
			$total = count($_POST['check_col']);
			for($i=0;$i<$total;$i++)
			{
				$cbartist->action->remove_favorite($_POST['check_col'][$i]);	
			}
			$eh->flush();
			e(sprintf(lang("total_fav_artist_removed"),$total),"m");
		}
		
		if(get('query')!='')
		{
			$cond = " (artist.artist_name LIKE '%".mysql_clean(get('query'))."%' OR artist.artist_tags LIKE '%".mysql_clean(get('query'))."%' )";
		}
		
		$col_arr = array("user"=>userid(),"limit"=>$get_limit,"order"=>tbl('favorites.date_added DESC'),"cond"=>$cond);
		$artists = $cbartist->action->get_favorites($col_arr);
		assign('artists',$artists);
		
		$col_arr['count_only'] = TRUE;
		$total_rows  = $cbartist->action->get_favorites($col_arr);
		$total_pages = count_pages($total_rows,COLLPP);
		
		//Pagination
		$pages->paginate($total_pages,$page);
		subtitle(lang("manage_favorite_artists"));
	}
		
}

template_files('manage_artists.html');
display_it();
?>