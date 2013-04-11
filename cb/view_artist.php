<?php
/* 
 ******************************************************************
 | Copyright (c) 2007-2008 Clip-Bucket.com. All rights reserved.	
 | @ Author : ArslanHassan										
 | @ Software : ClipBucket , © PHPBucket.com					
 ******************************************************************
*/
define("THIS_PAGE",'view_artist');
define("PARENT_PAGE",'collections');

require 'includes/config.inc.php';
$pages->page_redir();

$c = mysql_clean($_GET['cid']);
$type = mysql_clean($_GET['type']);

$page = mysql_clean($_GET['page']);
$get_limit = create_query_limit($page,COLLIP);
$order = tbl("artist_items").".ci_id DESC";

if($cbartist->is_viewable($c))
{
	$param = array("type"=>$type,"cid"=>$c);
	$cdetails = $cbartist->get_artist($c,"AND ".tbl($cbartist->section_tbl).".type = '$type' ");
	
	if($cdetails)
	{
	switch($type)
	{
		case "videos":
		case "video":
		case "v":
		{
			$items = $cbvideo->artist->get_artist_items_with_details($c,$order,$get_limit);			$viditems = $cbvideo->artist->get_artist_videos_with_details($c,$order,$get_limit);
			$count = $cdetails['total_objects'];			$viditemscount = $cdetails['total_v_objects'];
		}
		break;
		
		case "photos":
		case "photo":
		case "p":
		{
			$items = $cbphoto->artist->get_artist_items_with_details($c,$order,$get_limit);
			$count = $cdetails['total_objects'];
		}
		break;
	}
	
	// Calling nesscary function for view artist
	call_view_artist_functions($cdetails[0]);
	$total_pages = count_pages($viditemscount,COLLIP);
	
	//Pagination
	$pages->paginate($total_pages,$page);
	
	assign('objects',$items);		assign('viditems',$viditems);			assign('count',$count);		assign('viditemscount',$viditemscount);	
	assign("c",$cdetails);
	assign("type",$type);
	assign("cid",$c);	
	subtitle($cdetails['artist_name']);
	} else {
		e(lang("artist_not_exists"));
		$Cbucket->show_page = false;	
	}
} else {
	$Cbucket->show_page = false;	
}


template_files('view_artist.html');
display_it();	
?>