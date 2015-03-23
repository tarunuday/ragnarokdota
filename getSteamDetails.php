<?php
	require_once './include/dbconfig.php';
	$conn = new connDota();
	error_reporting(E_ERROR | E_PARSE);
	$ar  = array('ret' => false, 'err' => 'Not Registered' );
	if(!(isset($_GET) && isset($_GET['id'])))
		die(json_encode($ar));
	$steam = $conn->chkSteamID($_GET['id']);
	header("Content-Type: application/json", true);
	if($steam){
		$key="B60274AC48E9D284E1648F00B3030212";
	    $link = file_get_contents('http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $key . '&steamids=' . $steam->steamID64 . '&format=json');
	    if ($link !== false) {
		    $myarray = json_decode($link, true);
			die(json_encode($myarray));
	    }
	}
	die(json_encode($ar));
?>