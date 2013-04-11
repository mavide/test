<?php
/*
Plugin Name: Must Register
Description: User must register before viewing site. They are automatically directed to signup page.
Author: Clip bucket forum leaders & D Smith
ClipBucket Version: 2.5
Version: 1.0
*/
if(!function_exists('must_register'))
{
    function must_register()
    {
        if(!userid()) 
            if(PARENT_PAGE != 'signup') //do not redirect if parent page is 'signup' which includes forget page
                redirect_to(cblink(array('name'=>'signup')));
    }
    
    //Load this on every page
    register_anchor_function(array('must_register'=>'global'));
}
?>