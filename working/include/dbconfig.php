<?php
	require_once 'class.phpmailer.php';

	class connDota
	{
		var $host;
		var $user;
		var $pwd;
		var $db;
		var $mysqli;
		var $From;
		
		function __construct(){
			if(!isset($_SERVER)||($_SERVER['SERVER_NAME']=='localhost'))
			{
				$this->host = "localhost";
				$this->user = "root";
				$this->pwd = "123";
				$this->db = "dotabase";
			}
			else if(($_SERVER['SERVER_NAME']=='dota2.ragam.org.in'))
			{
				$this->host = "localhost";
				$this->user = "nitcfest_dota";
				$this->pwd = "requiemofsouls";
				$this->db = "nitcfest_dotabase15";
			}
				$this->From = "dota2@ragam.org.in";
				$this->mysqli = false;
		}

		function __destruct() {
			if($this->mysqli != false){
				$this->mysqli->close();
			}
		}

		public function chkSteamID($steamID)
		{
			$pattern = '/^([0-9])+$/';
			if(preg_match ($pattern, $steamID )){
				$link = file_get_contents('http://steamcommunity.com/profiles/'.$steamID.'?xml=1');
			}
			else
				$link = file_get_contents('http://steamcommunity.com/id/'.$steamID.'?xml=1');
			if($link!=false)
				{
				$xml = new SimpleXMLElement($link);
				if($xml && isset($xml->steamID64))
				return $xml;
				}
			return false;
		}

		private function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}

		private function createConn(){
			if($this->mysqli == false){
				$this->mysqli = new mysqli($this->host, $this->user, $this->pwd, $this->db);
				if ($this->mysqli->connect_errno){
					return false;
				}
			}
			return true;
		}

		public function sanitize($value, $type=''){
			// var_dump($_POST);
			// die();
			
			if(!$this->createConn()){
				$ar['err'] = "Couldn't register";
				return false;
			}
			$_POST[$value] = $this->mysqli->real_escape_string(trim($_POST[$value]));
			// $_POST[$value] = htmlspecialchars($_POST[$value]);
			$_POST[$value] = escapeshellarg($_POST[$value]);
			switch ($type) {
				case 'string':
					return filter_input(INPUT_POST, $value, FILTER_SANITIZE_STRING);
				
				case 'email':
					return filter_input(INPUT_POST, $value, FILTER_VALIDATE_EMAIL);

				default:
					return filter_input(INPUT_POST, $value, FILTER_SANITIZE_STRING);
			}
		}

		public function registerTeam(&$ar){
			$date = new DateTime();
			$confId = $this->generateRandomString(6);
			if(!isset($_POST['g-recaptcha-response'])){
				$ar['err'] = "reCAPTCHA not answered";
				return $ar;
			}
			$captcha = $_POST['g-recaptcha-response'];
			$siteKey = '6LftVAMTAAAAAOztsOVH1wY56vFRz8-_rv7HsdnJ';
			$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$siteKey."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']));
			if(!isset($response->success) || $response->success==false){
				$ar['err'] = "reCAPTCHA not correct";var_dump($response);die();
				return $ar;
			}
			if(!$this->createConn()){
				return $ar;
			}
			$captain = "";
			$this->mysqli->autocommit(false);
			$qry = "INSERT INTO teams (name, phnumber, status, email, team_tag, confId) VALUES ('".$_POST['teamname']."', '".$_POST['teamnumber']."', '0', '".$_POST['teammail']."', '".$_POST['teamnick']."', '".$confId."')";
			$result = $this->mysqli->query($qry);
			if ($result) {
				$fl = true;
				$team_id = $this->mysqli->insert_id;
				for ($i=1; $i<8 ; $i++) {
					if (!(isset($_POST['p_nick_'.$i]) && isset($_POST['p_name_'.$i]) && isset($_POST['p_id_'.$i]))) {
						break;
					}
					else if($this->chkSteamID($_POST['p_id_'.$i])){
						$qry = "INSERT INTO players (name_real, name_game, steam_id, team) VALUES ('".$_POST['p_name_'.$i]."', '".$_POST['p_nick_'.$i]."', '".$_POST['p_id_'.$i]."', '".$team_id."')";
						$result = $this->mysqli->query($qry);
						if (!$result) {
							$fl = false;
							break;
						}
						if($_POST['team_captain'] == "p_$i")
							$captain = $this->mysqli->insert_id;
					}
					else{
						$ar['err'] = "SteamID not valid";
						$ar['key'] = 'p_id_'.$i;
						$this->mysqli->rollback();
						return $ar;
					}
				}
				if ($fl && $captain!="") {
					$qry = "UPDATE teams SET captain='$captain' WHERE id='$team_id'";
					$result = $this->mysqli->query($qry);
					if (!$result) {
						$ar['err'] = "Couldn't Register";
						$this->mysqli->rollback();
						return $ar;
					}
					$mailer = new PHPMailer();
					$mailer->CharSet = 'utf-8';
					$mailer->AddAddress($_POST['teammail'],$_POST['teamname']);
					$mailer->Subject = "Ragnarok Registration";
					$mailer->From = $this->From;        
					$mailer->FromName = "Ragnarok Dota2";
					$mailer->AddBCC("dota2@ragam.org.in", "Ragnarok Dota2");        
					$mailer->Body ="Hello ".$_POST['teamname']."\r\n\r\n".
					"Thanks for your registration with Ragnarok\r\n".
					"Email ID is ".$_POST['teammail']."\r\n".
					"Registartion Code is $confId\r\n".
					"Your registration code acts like a password throughout this tournament. You will have to use it for any authentication that may be required of you. Keep it safe.\r\n".
					"Please click the link below to pay the registration fees and confirm your registration.\r\n".
					"You will need your Registration Code to register in this link. Please make sure you enter the correct Team Name, Team Mail and Registration Code combination\r\n".
					"http://www.townscript.com/ragnarokdota2\r\n".
					"\r\n".
					"For any queries, you can call our admins Surya (+91 9447749977) or Tarun (+91 96332 58889)\r\n".
					"\r\n".
					"Also, please check your mail regularly for tournament updates, as we will be sending you tournament updates and schedule shortly after registration is closed.\r\n".
					"Regards,\r\n".
					"Ragnarok\r\n".
					"Ragnarok Website: http://dota2.ragam.org.in\r\n".
					"Ragnarok Facebook Page: http://https://www.facebook.com/ragnarokdota2\r\n".
					"\r\n";
					if(!$mailer->Send()){
					    $this->mysqli->rollback();
					    return $ar;
					}
					$this->mysqli->commit();
					$ar['ret'] = true;
					return $ar;
				}
				else if($fl && $captain == ""){
					$ar['err'] = "Captain not selected";
				}
				if(strpos($this->mysqli->error, "Duplicate entry") !==false && strpos($this->mysqli->error, "steam_id") !==false){
					$ar['err'] = "Steam ID already registered";
				}
			}
			$this->mysqli->rollback();
			return $ar;
		}

		public function confirmReg($mail, $code){
			if(!$this->createConn())
				return false;
			if(($mail = $this->sanitize($mail, 'email')) && ($code = $this->sanitize($code, ''))){
				$qry = "UPDATE teams SET status='1' WHERE email='$mail' AND confId='$code'";
				$result = $this->mysqli->query($qry);
				if ($result && $this->mysqli->affected_rows>0) {
					return true;
				}
			}
			return false;
		}
	}
?>