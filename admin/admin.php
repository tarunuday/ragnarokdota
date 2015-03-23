<?php
	require_once '../include/dbconfig.php';
	$conn = new connDota();
	if($row = $conn->getTeamList()){ ?>
<!DOCTYPE html>
<html>
<head>
	<title>DotaAdmin</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="dotaadmin.css">
</head>
<body>
	<div class="pure-g">
<?php
	$i=0;
	foreach ($row as $key => $value) { 
		$i++;
		?>
		<div class=" pure-u-1 content">
		<div id="team_<?php echo $value['id'];?>" class="team">
			<h2 class=" <?php echo($value['status']=='1'?"":"dis");?>"><?php echo $i.". ".$value['name'];?><br></h2>
			PhNo : <?php echo $value['phnumber'];?><br>
			Email : <?php echo $value['email'];?><br>
			<div class="err"></div>
			<input type="button" class="enable" value="Enable" <?php echo($value['status']=='0'?"":"disabled");?>>&nbsp;<input type="button" class="disable" value="Disable" <?php echo($value['status']!='0'?"":"disabled");?>>
			<table>
				<thead>
					<th>RealName</th>
					<th>GameName</th>
				</thead>
				<tbody>
				<?php
					foreach ($value['players'] as $key1 => $value1) { ?>
					<tr><td><a href="http://steamcommunity.com/profiles/<?php echo $value1['steam_id'];?>"><?php echo $value1['name_real'];?></a></td><td><?php echo $value1['name_game'];?></td></tr>
				<?php }
				?>
				</tbody>
			</table>
		</div>
	</div>
<?php }
?>
</div>
<?php }
?>
<script type="text/javascript">
$(document).ready(function() {
	$(document).on('click', '.enable', function(event) {
		event.preventDefault();
		team_id = $(this).parent('div').attr('id').split("_")[1];
		errDiv = $(this).siblings('div.err');
		enBt = $(this);
		disBt = $(this).siblings('.disable');
		enableTeam (team_id, '1', errDiv, enBt, disBt);
	});
	$(document).on('click', '.disable', function(event) {
		event.preventDefault();
		team_id = $(this).parent('div').attr('id').split("_")[1];
		errDiv = $(this).siblings('div.err');
		enBt = $(this).siblings('.enable');
		disBt = $(this);
		enableTeam (team_id, '0', errDiv, enBt, disBt);
	});
});
function enableTeam (team_id, enb, errDiv, enBt, disBt) {
	$.ajax({
	    url: 'enableTeam.php',
	    type: 'POST',
	    dataType: 'json',
	    data: {
	    	team_id: team_id,
	    	enb: enb
	    },
	    username: "dotaRagam",
	    password: "dotaRagam",
	    success: function(data){
	        if (data.ret == false) {
	            if(data.err != ''){
	                errDiv.html(data.err);
		            errDiv.css('color', 'red');
	            }
	        }
	        else{
	            errDiv.css('color', 'green');
	            if (enb=='0') {
		            errDiv.html('Disabled Successfully');
	            	enBt.removeAttr('disabled');
	            	disBt.attr('disabled', "disabled");
	            }
	            else{
		            errDiv.html('Enabled Successfully');
	            	enBt.attr('disabled', "disabled");
	            	disBt.removeAttr('disabled');
	            }
	        }
	    },
	    error: function(xhr, status, error){
	        errDiv.html(data.err);
            errDiv.css('color', 'red');
	    }
	});
}
</script>
</body>
</html>