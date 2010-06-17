<?php
/*
Plugin Name: Ozh' Vuvuzelator
Plugin URI: http://planetozh.com/blog/?s=vuvuzela
Description: Make your blog go BRRZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ
Author: Ozh
Author URI: http://ozh.org/
*/

function ozh_vvzl_load() {
	if( isset($_COOKIE['vuvuzelator']) && $_COOKIE['vuvuzelator'] == 'false' )
		return;

	$plugin_url = WP_PLUGIN_URL.'/'.plugin_basename(dirname(__FILE__));
	
	$vuvupics = array(
		1 => 'width:159px; height:100px; left:0px;',
		2 => 'width:195px; height:98px; right:0px;',
		3 => 'width:250px; height:295px',
	);
	
	$rnd = mt_rand(1,3);
	$pic = 'vuvuzela'.$rnd.'.png';
	$css = $vuvupics[$rnd];
	$script = $rnd == 3 ? "<script>var margin = '".mt_rand(3,75)."%';</script>" : '' ;
	
	echo <<<HTML
	
	<div id="vuvusound">
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="1" height="1" id="1" align="middle">
		<param name="allowScriptAccess" value="sameDomain" />
		<param name="allowFullScreen" value="false" />
		<param name="wmode" value="transparent"> 
		<param name="movie" value="$plugin_url/assets/vuvuzela.swf" />
		<param name="quality" value="high" />
		<param name="bgcolor" value="#ffffff" />
		<embed src="$plugin_url/assets/vuvuzela.swf" quality="high" bgcolor="#ffffff" wmode="transparent" width="1" height="1" name="1" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer" />
	</object>
	</div>

	<div id="vuvupic" style="$css;">
		<img src="$plugin_url/assets/$pic"  />
		<div id="nomoreplz">No more BRZZZZ?<br/>Click here :)</div>
	</div>
	
	<link rel="stylesheet" type="text/css" href="$plugin_url/assets/vuvuzela.css" />
	$script
	<script src="$plugin_url/assets/vuvuzela.js" ></script>
HTML;
}
add_action( 'wp_footer', 'ozh_vvzl_load' );


function ozh_vvzl_init() {
	wp_enqueue_script('jquery');
}
add_action( 'init', 'ozh_vvzl_init' );
