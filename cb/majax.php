<?php
// +------------------------------------------------------------------------+
// | PHP Melody ( www.phpsugar.com )
// +------------------------------------------------------------------------+
// | PHP Melody IS NOT FREE SOFTWARE
// | If you have downloaded this software from a website other
// | than www.phpsugar.com or if you have received
// | this software from someone who is not a representative of
// | phpSugar, you are involved in an illegal activity.
// | ---
// | In such case, please contact: support@phpsugar.com.
// +------------------------------------------------------------------------+
// | Developed by: phpSugar (www.phpsugar.com) / support@phpsugar.com
// | Copyright: (c) 2004-2011 PhpSugar.com. All rights reserved.
// +------------------------------------------------------------------------+


@header('Content-Type: text/html; charset=UTF-8;');

/* require('config.php');
require_once('functions.php');
require_once('user_functions.php'); */

require 'includes/config.inc.php';
	
$suggest_msg1='The video you just submitted is already in our database.';
$suggest_msg2='The video you just submitted is currently pending approval. <br />Please choose another one.';
$suggest_msg3='The submitted video URL is not supported.';
$suggest_msg4='Success! The video has been submitted for approval.';
$suggest_msg5='Sorry, this video source is not available at this time.';

$illegal_chars = array(">", "<", "&", "'", '"', '*', '%');

$message = '';
$page	 = '';
$action  = '';

if ($_GET['p'] != '' || $_POST['p'] != '')
{
	$page = ($_GET['p'] != '') ? $_GET['p'] : $_POST['p'];
}

if ($_GET['do'] != '' || $_POST['do'] != '')
{
	$action = ($_GET['do'] != '') ? $_GET['do'] : $_POST['do'];
}

if ($page == '')
{
	exit();
}

switch ($page)
{

case 'suggest':
		
		$response = array('failed' => true);
		switch ($action)
		{
			case 'getdata':
				$url = trim($_POST['url']);
				$url = str_replace('https', 'http', $url);
				$url = str_replace('youtu.be/', 'youtube.com/watch?v=', $url);

				if ($url == '')
				{
					// empty URL
					$response = array('failed' => true,
									  'message' => 'Video URL '. 'register_err_msg8'
									 );
				}
				else
				{
					if ( ! is_url($url))
					{
						// invalid URL given
						$response = array('failed' => true,
									 	  'message' => $suggest_msg3
									 );
					}
					else
					{
						$sources = a_fetch_video_sources();
						$use_this_src = -1;
						foreach($sources as $src_id => $source)
						{
							if($use_this_src > -1)
							{
								break;
							}
							else
							{
								if(@preg_match($source['source_rule'], $url))
								{
									$use_this_src = $source['source_id'];
								}
							}
						}
						
						if ($use_this_src > -1)
						{
							if ( ! file_exists( "src/" . $sources[ $use_this_src ]['source_name'] . ".php"))
							{
								// reply as 'not a supported video source'
								$response = array('failed' => true, 
										 	  	  'message' => $suggest_msg5
										 	);
							}
							else
							{
								define('PHPMELODY', true);
								require_once( "src/" . $sources[ $use_this_src ]['source_name'] . ".php");
								do_main($video_details, $url);
								
								//	Lookup this URL in the database, check for existence to avoid duplication.
								$sql = "SELECT COUNT(*) as total_results 
										  FROM pm_videos_urls 
										 WHERE direct = '". $video_details['direct'] ."'";
								$result = mysql_query($sql);
								$row = mysql_fetch_assoc($result);
								mysql_free_result($result);
								
								if ($row['total_results'] > 0)
								{
									$response = array('failed' => true, 
										 	  		  'message' => $suggest_msg1
										 		);
									break;
								}
								unset($sql, $result, $row);
								
								$sql = "SELECT COUNT(*) as total_results 
										  FROM pm_temp 
										 WHERE url = '". secure_sql($url) ."'";
								$result = mysql_query($sql);
								$row = mysql_fetch_assoc($result);
								mysql_free_result($result);
								
								if ($row['total_results'] > 0)
								{
									$response = array('failed' => true, 
										 	  		  'message' => $suggest_msg2
										 		);
									break;
								}
								
								$video_details['source_id'] = $use_this_src;
								
								$response = array('success' => true,
												  'videodata' => $video_details
											);
							}
						}
						else
						{
							// not a supported video source
							$response = array('failed' => true, 
									 	  	  'message' => $suggest_msg5
									 	);
						}
					}
				}
					
			break;
			
			case 'submitvideo':
				
				$required_fields = array('yt_id' => 'URL',
										 'category' => 'category',
										 'video_title' => 'video', 
								   );
				foreach( $_POST as $key => $value) 
				{
					$value = trim($value);
					if (array_key_exists(strtolower($key), $required_fields) && empty($value))
						$errors[$key] = $required_fields[$key] .' '. 'register_err_msg8';
				}
				
				if ($_POST['category'] == '-1') 
				{
					$errors['category'] = 'choose_category';
				}
				
				$url = trim($_POST['yt_id']);
				$url = str_replace('https', 'http', $url);
				$url = str_replace('youtu.be/', 'youtube.com/watch?v=', $url);
				
				$sources = a_fetch_video_sources();
				$use_this_src = $source_id = (int) $_POST['source_id'];
				
				if ( ! $source_id || ! array_key_exists($source_id, $sources))
				{
					$use_this_src = -1;

					foreach($sources as $src_id => $source)
					{
						if($source['source_name'] != 'localhost' && $source['source_name'] != 'other')
						{
							if(@preg_match($source['source_rule'], $url))
							{
								$use_this_src = $source['source_id'];
								break;
							}
						}
					}
					
					if ($url != '' && $use_this_src == -1)
					{
						$errors['yt_id'] = $suggest_msg5;
					}
				}
				
				if (count($errors) == 0)
				{
					$url = secure_sql($url);
					//	Lookup this URL in the database, check for existence to avoid duplication.
					$sql = "SELECT COUNT(*) as total_results 
							  FROM pm_videos_urls 
							 WHERE direct = '". $url ."'";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					mysql_free_result($result);
					
					if ($row['total_results'] > 0)
					{
						$response = array('failed' => true, 
							 	  		  'message' => $suggest_msg1
							 		);
						break;
					}
					unset($sql, $result, $row);
					
					$sql = "SELECT COUNT(*) as total_results 
							  FROM pm_temp 
							 WHERE url = '". secure_sql($url) ."'";
					$result = mysql_query($sql);
					$row = mysql_fetch_assoc($result);
					mysql_free_result($result);
					
					if ($row['total_results'] > 0)
					{
						$response = array('failed' => true, 
							 	  		  'message' => '$suggest_msg2'
							 		);
						break;
					}
					
					$description = trim($_POST['description']);
					$description = nl2br($description);
					$description = removeEvilTags($description);
					$description = secure_sql($description);
					
 					if(_STOPBADCOMMENTS == '1') 
					{
						$description = search_bad_words($description);
					}
					$description = word_wrap_pass($description);
					
					$video_title = 		secure_sql($_POST['video_title']);
					$video_title = 		str_replace( array("<", ">"), '', $video_title);
					$submitted = secure_sql($userdata['username']);
					$category = secure_sql($_POST['category']);
					
					//$yt_id = specialchars($yt_id, 0);
					
					$user_id = $userdata['id'];
					$tags = removeEvilTags($_POST['tags']);
					$tags = secure_sql($tags);
					
					$sql = "INSERT INTO pm_temp (url, video_title, description, tags, category, username, user_id, added, source_id, language) 
								 VALUES ('".$url."', '".$video_title."', '".$description."', '".$tags."', '".$category."', '".$submitted."', '".$user_id."', '".time()."', '".$use_this_src."', '1')";

					$query = @mysql_query($sql);
					
					$response = array('success' => true, 
							 	  	  'message' => $suggest_msg4
							 	);
					break;
				}
				else
				{
					$error_msg = '<ul>';
					foreach ($errors as $k => $msg)
					{
						$error_msg .= '<li>'. $msg .'</li>';
					}
					$error_msg .= '</ul>';
					// not a supported video source
					$response = array('failed' => true, 
							 	  	  'message' => $error_msg
							 	);
				}

			break;
		}
		
		echo json_encode($response);
		
		
		exit();
	break;

}
exit();
?>