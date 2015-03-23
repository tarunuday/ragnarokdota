<?php
	require_once './include/dbconfig.php';
	$ar  = array('ret' => false, 'err' => '' );
	header("Content-Type: application/json", true);
	$content = "SERVER= ".json_encode($_SERVER)."POST = ".json_encode($_POST);

	function returnResponse($ar, $content){
		$content .= "\nar = ".json_encode($ar)."\n--------------------*---------------------\n";
		file_put_contents("register_log.txt", $content, FILE_APPEND);
		die(json_encode($ar));
	}
	
	if (isset($_POST) && isset($_POST['teamname']) && isset($_POST['teammail']) && isset($_POST['teamnumber']) && isset($_POST['teamnick']) && isset($_POST['team_captain'])) {
		$fl = true;
		for ($i=1; $i < 8; $i++) { 
			if($i < 6)
				if(!(isset($_POST['p_nick_'.$i]) && isset($_POST['p_name_'.$i]) && isset($_POST['p_id_'.$i]))){
					if (!isset($_POST['p_nick_'.$i])) $ar['key'] = 'p_nick_'.$i;
					if (!isset($_POST['p_name_'.$i])) $ar['key'] = 'p_name_'.$i;
					if (!isset($_POST['p_id_'.$i])) $ar['key'] = 'p_id_'.$i;
					$fl = false;
					break;
				}
			else
				if (!(!(isset($_POST['p_nick_'.$i]) || isset($_POST['p_name_'.$i]) || isset($_POST['p_id_'.$i])) || (isset($_POST['p_nick_'.$i]) && isset($_POST['p_name_'.$i]) && isset($_POST['p_id_'.$i])))) {
					if (!isset($_POST['p_nick_'.$i])) $ar['key'] = 'p_nick_'.$i;
					if (!isset($_POST['p_name_'.$i])) $ar['key'] = 'p_name_'.$i;
					if (!isset($_POST['p_id_'.$i])) $ar['key'] = 'p_id_'.$i;
					$fl = false;
					break;
				}
		}
		if ($fl == false){
			$ar['err'] = "Required fields not present";
			returnResponse($ar, $content);
		}
		
		$conn = new connDota();
		foreach ($_POST as $key => $value) {
			$type = '';
			if ($key=="teammail") {
				$type = "email";
			}
			if(!($key == 'g-recaptcha-response') && !($key == 'team_captain') && !($_POST[$key] = $conn->sanitize($key, $type)))
			{
				$ar['key'] = $key;
				returnResponse($ar, $content);
			}
		}
		$ar = $conn->registerTeam($ar);
		returnResponse($ar, $content);
	}
	if (!isset($_POST['teamname'])) $ar['key'] = 'teamname';
	if (!isset($_POST['teammail'])) $ar['key'] = 'teammail';
	if (!isset($_POST['teamnumber'])) $ar['key'] = 'teamnumber';
	if (!isset($_POST['teamnick'])) $ar['key'] = 'teamnick';
	$ar['err'] = "Required fields not present";
	if (!isset($_POST['team_captain'])) $ar['err'] = 'Select your Team Captain';

	returnResponse($ar, $content);
?>