<?php
// +------------------------------------------------------------------------+
// | PHP Melody ( www.phpsugar.com )
// +------------------------------------------------------------------------+
// | PHP Melody IS NOT FREE SOFTWARE
// | If you have downloaded this software from a website other
// | than www.phpsugar.com or if you have received
// | this software from someone who is not a representative of
// | PHPSUGAR, you are involved in an illegal activity.
// | ---
// | In such case, please contact: support@phpsugar.com.
// +------------------------------------------------------------------------+
// | Developed by: PHPSUGAR (www.phpsugar.com) / support@phpsugar.com
// | Copyright: (c) 2004-2013 PHPSUGAR. All rights reserved.
// +------------------------------------------------------------------------+

@header('Content-Type: text/html; charset=UTF-8;');

/* require('config.php');
require_once('functions.php');
require_once('user_functions.php'); */

require 'includes/config.inc.php';


$output 	 = '';

$queryString = trim($_POST['queryString']);
// Is there a posted query string?
if($queryString != '') 
{
	error_reporting(0);
	$queryString = secure_sql($queryString);
	$queryString = str_replace(array('%', ','), '', $queryString);
	
	//	only perform queries if the length of the search string is greather than 3 characters
	if(strlen($queryString) >= 3)
	{
		$num_res = 0;
/* 		if(strlen($queryString) > 3)
		{
			$query = @mysql_query("SELECT videoid, title FROM cb_video WHERE (title LIKE '%$queryString%') LIMIT 10");
		}
		 */
		
		if(strlen($queryString) > 3)
		{
			$sql	 = "SELECT videoid, title, MATCH(title) AGAINST ('$queryString') AS score
						FROM cb_video   WHERE MATCH (title) AGAINST ('$queryString')
						ORDER BY score ASC LIMIT 10";
			$query	 = @mysql_query($sql);
			$num_res = @mysql_num_rows($query);
		}
		if($num_res == 0)
		{
			$query = @mysql_query("SELECT videoid, title FROM cb_video WHERE (title LIKE '%$queryString%') LIMIT 10");
		}
		
		
		if(	$query)
		{
			
			while($result = mysql_fetch_array($query))
			{
				
				$output .= '<li onClick="fill(\''.$result['title'] .'\');">';		
				$output .= '<a href="'.VideoLink($result['videoid']).' " title="'. htmlentities($result['title']) .'"> <img src="'.getThumb($result['videoid']).'" width="40" height="40"  style="border:none;"/> '.fewchars($result['title'] ."", 50).' </a>';
				$output .= '</li>';
			}
		} 
		else 
		{
			
			$output = 'No Result found';
		}
	}
}
echo $output;
exit();
?>