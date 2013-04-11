<?php
/* 
 *******************************************************************
 | Copyright (c) 2007-2008 Clip-Bucket.com. All rights reserved.	
 | @ Author   : ArslanHassan										
 | @ Software : ClipBucket , © PHPBucket.com
 | @ Modified : June 14, 2009 by Arslan Hassan
 *******************************************************************
*/

define("THIS_PAGE","suggest");
define("PARENT_PAGE","upload");

require 'includes/config.inc.php';
$userquery->logincheck();

define('_STOPBADCOMMENTS','1');



$yt_id = trim($_POST['yt_id']);
$video_title = trim($_POST['video_title']);
$description = trim($_POST['description']);
$tags = trim($_POST['tags']);
$category = trim($_POST['category']);

if(isset($_POST['Submit'])) { // Submit new video
	$required_fields = array('yt_id' => "URL",
							 'category' => 'category',
							 'video_title' => 'video', 
							 );
	foreach( $_POST as $key => $value) {
		$value = trim($value);
		if(array_key_exists(strtolower($key), $required_fields) && empty($value) )
			$errors[$key] = $required_fields[$key]." ".'register_err_msg8';
		$_POST[$k] = htmlspecialchars($value);
	}
	if($_POST['category'] == '-1') {
		$errors['category'] = 'choose_category';
	}
		if($url != '' && $use_this_src == -1)
	{
		$errors['yt_id'] = 'suggest_msg5';
	}
	
		if( count($errors) == 0 )
	{
	
	
	
	
	// prepare everything for mysql
	$url = secure_sql($url);
	$description = trim($_POST['description']);
	$description = nl2br($description);
	$description = removeEvilTags($description);
	$description = secure_sql($description);

/* 	if(_STOPBADCOMMENTS == '1') {
	$description = search_bad_words($description);
	}
	$description = word_wrap_pass($description); */
	
	$video_title = 		secure_sql($_POST['video_title']);
	$video_title = 		str_replace( array("<", ">"), '', $video_title);
	$submitted = secure_sql($userdata['username']);
	$category = secure_sql($_POST['category']);
	$yt_id = specialchars($yt_id, 0);
	$video_title = specialchars($video_title, 0); 
	$user_id = "1";
	$tags = removeEvilTags($_POST['tags']);
	$tags = secure_sql($tags);

	
	//	Lookup this URL in the database, check for existence to avoid duplication.
	$query = mysql_query("SELECT uniq_id FROM pm_videos_urls WHERE direct = '".$url."'");
	$count = mysql_num_rows($query);

	$query2 = mysql_query("SELECT id FROM pm_temp WHERE url = '".$url."'");
	$count2 = mysql_num_rows($query2);

	@mysql_free_result($query);
	@mysql_free_result($query2);
	
	
	if($count > 0) 
	{
		Assign('success', 3); // Already exists in database
	}
	elseif($count2 > 0) 
	{
		Assign('success', 4); // Already exists in pm_temp table - waiting for approval
	} 
	else 
	{
		$sql = "INSERT INTO pm_temp (url, video_title, description, tags, category, username, user_id, added, source_id, language) 
											VALUES ('".$url."', '".$video_title."', '".$description."', '".$tags."', '".$category."', '".$submitted."', '".$user_id."', '".time()."', '".$use_this_src."', '1')";

		$query = @mysql_query($sql);
		Assign('success', 1);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
/* 		// submit video
		Assign('yt_id',$yt_id);
		Assign('video_title',$video_title);
		Assign('description',$description);
		Assign('tags',$tags);
		Assign('category',$category); */
	}
	else
	{
		$_POST['video_title'] = str_replace('"', '', $_POST['video_title']);
		$_POST['tags'] = str_replace('"', '', $_POST['tags']);
		$_POST['yt_id'] = str_replace('"', '', $_POST['yt_id']);
		Assign('success', 0);
		Assign('errors', $errors);
	}
	


/*
$pages->page_redir();


$file_name = time().RandomString(5);
assign('file_name',$file_name);
if(isset($_POST['submit_data']))

$description = trim($_POST['description']);

Assign('description',$description);*/


}

Assign('categories_dropdown', categories_dropdown(array('selected' => $_POST['category'], 'attr_class' => 'span5')));

//Displaying The Template
template_files('suggest.html');
display_it();

?>