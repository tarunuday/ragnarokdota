<?php
	require_once '../include/dbconfig.php';
	$ar = array('ret' => false);
	if (!(isset($_POST) && isset($_POST['enb']) && isset($_POST['team_id']))) {
		$ar['err'] = 'Required field not present';
		die(json_encode($ar));
	}
	$conn = new connDota();
	if ($conn->enableTeam($_POST['team_id'], $_POST['enb'])) {
		$ar['ret'] = true;
		die(json_encode($ar));
	}
	$ar['err'] = 'Couldnt Update';
	die(json_encode($ar));
?>