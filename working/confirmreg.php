<?php
	require_once './include/dbconfig.php';
	if (!(isset($_GET) && isset($_GET['mail']) && isset($_GET['code'])))
		die("Couldnt Confirm the registration");
	else{
		$conn = new connDota();
		if ($conn->confirmReg($_GET['mail'], $_GET['code'])) {
			die("Registration confirmed");
		}
	}
	die("Couldnt Confirm the registration");
?>