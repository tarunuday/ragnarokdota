$(function(){
	var team="Team Name";
	var nick="Team";
	var none="Player 1";
	var ione="Player 1"
	var ntwo="Player 2";
	var itwo="Player 2"
	var nthr="Player 3";
	var ithr="Player 3"
	var nfou="Player 4";
	var ifou="Player 4"
	var nfiv="Player 5";
	var ifiv="Player 5"
	var nsix="";
	var isix="";
	var nsev="";
	var isev="";
	displayTeam();
	$(".stnd").hide();
	function displayTeam()
	 {
	 	$("#pone").html("<h4 style=\"cursor:pointer\" title=\""+none+"\">"+nick+"."+ione+"</h4>");
	 	$("#ptwo").html("<h4 style=\"cursor:pointer\" title=\""+ntwo+"\">"+nick+"."+itwo+"</h4>");
	 	$("#pthr").html("<h4 style=\"cursor:pointer\" title=\""+nthr+"\">"+nick+"."+ithr+"</h4>");
	 	$("#pfou").html("<h4 style=\"cursor:pointer\" title=\""+nfou+"\">"+nick+"."+ifou+"</h4>");
	 	$("#pfiv").html("<h4 style=\"cursor:pointer\" title=\""+nfiv+"\">"+nick+"."+ifiv+"</h4>");
	 	if((isix!="")||(nsix!=""))
	 		$("#psix").html("Standin."+isix);
	 	if((isev!="")||(nsev!=""))
	 		$("#psev").html("Standin."+isix);
	 }

	$("input[class*=t-name]").keyup(function()
	 {
	 	team=($(this).val());
	 	$(".t-name>.pure-u-1>h2").html(team);
	 });

	$("input[class*=t-nick]").keyup(function()
	 {
	 	nick=($(this).val());
	 	displayTeam();
	 });

	$("input[class*=one]").keyup(function()
	 {
	 	if(($("input[name=p_name_1]").val())!="")
	 		none=($("input[name=p_name_1]").val());
	 	if(($("input[name=p_nick_1]").val())!="")
	 		ione=($("input[name=p_nick_1]").val());
	 	$("#pone").html("<h4 style=\"cursor:pointer\" title=\""+none+"\">"+nick+"."+ione+"</h4>");
	 		ione=($("input[name=p_id_1]").val());
	 });
	$("input[class*=two]").keyup(function()
	 {
	 	if(($("input[name=p_name_2]").val())!="")
	 		ntwo=($("input[name=p_name_2]").val());
	 	if(($("input[name=p_nick_2]").val())!="")
	 		itwo=($("input[name=p_nick_2]").val());
	 	$("#ptwo").html("<h4 style=\"cursor:pointer\" title=\""+ntwo+"\">"+nick+"."+itwo+"</h4>");
	 });
	$("input[class*=thr]").keyup(function()
	 {
	 	if(($("input[name=p_name_3]").val())!="")
	 		nthr=($("input[name=p_name_3]").val());
	 	if(($("input[name=p_nick_3]").val())!="")
	 		ithr=($("input[name=p_nick_3]").val());
	 	$("#pthr").html("<h4 style=\"cursor:pointer\" title=\""+nthr+"\">"+nick+"."+ithr+"</h4>");
	 });
	$("input[class*=fou]").keyup(function()
	 {
	 	if(($("input[name=p_name_4]").val())!="")
	 		nfou=($("input[name=p_name_4]").val());
	 	if(($("input[name=p_nick_4]").val())!="")
	 		ifou=($("input[name=p_nick_4]").val());
	 	$("#pfou").html("<h4 style=\"cursor:pointer\" title=\""+nfou+"\">"+nick+"."+ifou+"</h4>");
	 });
	$("input[class*=fiv]").keyup(function()
	 {
	 	if(($("input[name=p_name_5]").val())!="")
	 		nfiv=($("input[name=p_name_5]").val());
	 	if(($("input[name=p_nick_5]").val())!="")
	 		ifiv=($("input[name=p_nick_5]").val());
	 	$("#pfiv").html("<h4 style=\"cursor:pointer\" title=\""+nfiv+"\">"+nick+"."+ifiv+"</h4>");
	 });
	$("input[class*=six]").keyup(function()
	 {
	 	if(($("input[name=p_name_6]").val())!="")
	 		nsix=($("input[name=p_name_6]").val());
	 	if(($("input[name=p_nick_6]").val())!="")
	 		{
				$(".stnd").show();
				isix=($("input[name=p_nick_6]").val());
	 			$("#psix").html("<h4 style=\"cursor:pointer\" title=\""+nsix+"\">"+"Standin."+isix+"</h4>");
	 		}
	 });
	$("input[class*=sev]").keyup(function()
	 {
	 	if(($("input[name=p_name_7]").val())!="")
	 		nsev=($("input[name=p_name_7]").val());
	 	if(($("input[name=p_nick_7]").val())!="")
	 	{
			$(".stnd").show();
	 		isev=($("input[name=p_nick_7]").val());
	 		$("#psev").html("<h4 style=\"cursor:pointer\" title=\""+nsev+"\">"+"Standin."+isev+"</h4>");
	 	}
	 });
	/*$("input[class*=p-id]").keyup(function()
	 {
	 	if((($(this).val())!="")){	
	 		var steamID=$(this).val();
	 		var user;
	 		user=getSteamDetails(steamID);
			if(user)
			{
				$(this).addClass("gudInput");
			}
		}
	 });*/



	var capt="0";
	$("input[type=radio]").click(function()
	 {
	 	capt=($(this).attr('class'));
	 	valid($(".sev"));
	 });
/**********Validation*****************/
	function valid(value)
	 {
		$(value).css("border","2px solid green");
		$(value).animate(normal(value),5000);
	 }
	function normal(value)
	 {
		$(value).css("border","2px solid #ccc");
	 }
	function invalid(value)
	 {
		$(value).css("border","2px solid red");
	 }

	 $("#registerTeam").submit(function(event) {
	 	event.preventDefault();
	 	registerTeamSubmit();
	 });

})
 /************************Akash's work*************************/
var registerTeam = $("#registerTeam"), registerTeamButton = $("#registerTeamButton");
function enableSubmit() {
registerTeamButton.removeAttr('disabled');
}
function disableSubmit() {
registerTeamButton.attr('disabled', 'true');
}
function IsEmail(email) {
          var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          return regex.test(email);
}
function IsMobileNumber(num) {
          var regex = /^([0-9\+\(\-\)])+$/;
          return regex.test(num);
}
function IsNumber(num) {
          var regex = /^([0-9\.])+$/;
          return regex.test(num);
}
function IsText(text) {
          var regex = /^(.)+$/;
          return regex.test(text);
}
function ValidateInputs (ele) {
        	if (ele.attr('name') == "g-recaptcha-response") {
        		if(ele.val()==""){
        			//enter captcha
	        		return false;
        		}
        	}
        	else if(ele.attr('type') == 'email'){
        		if(!IsEmail(ele.val())){
	        		ele.css('border-color', 'red');
        			return false;
        		}
        	}
        	else if(ele.attr('type') == 'number'){
        		if(!IsNumber(ele.val())){
	        		ele.css('border-color', 'red');
        			return false;
        		}
        	}
        	else if(ele.attr('name') == 'teamnumber'){
        		if(!IsMobileNumber(ele.val())){
	        		ele.css('border-color', 'red');
        			return false;
        		}
        	}
        	else{
        		if(!IsText(ele.val())){
	        		ele.css('border-color', 'red');
        			return false;
        		}
        	}
            // add validation here
            return true;
}
function registerTeamSubmit () {
            var teamData = {}, fl = true;
            inp = $("#registerTeam :input");
            $.each(inp, function(index, val) {
            	val.value = val.value.trim();
                if (val.value!= "" && val.value!= undefined) {
                	if(ValidateInputs($(val))){
	                	if ($(val).attr('type') == 'radio') {
	                		if ($(val).is(':checked')) {
	                			teamData[$(val).attr('name')] = val.value;
	                		}
	                	}
	                	else if($(val).attr('name') != undefined)
		                    teamData[$(val).attr('name')] = val.value;
	                }
	                else{
	                	fl = false;
	                }
                }
            });
            if (fl == true){
	            $.ajax({
	                url: 'register.php',
	                type: 'POST',
	                dataType: 'json',
	                data: teamData,
	                success: function(data){
	                	var msgerr="";
	                    if (data.ret == false) {
	                        if (data.key != undefined) {
	                            registerTeam.find(' :input[name='+data.key+']').css('border-color', 'red');
	                            msgerr=data.key;
	                            if(msgerr=="p_id_1")
	                            	msgerr="Player 1";
	                            else if(msgerr=="p_id_2")
	                            	msgerr="Player 2";
	                            else if(msgerr=="p_id_3")
	                            	msgerr="Player 3";
	                            else if(msgerr=="p_id_4")
	                            	msgerr="Player 4";
	                            else if(msgerr=="p_id_5")
	                            	msgerr="Player 5";
	                            else if(msgerr=="p_id_6")
	                            	msgerr="Player 6";
	                            else if(msgerr=="p_id_7")
	                            	msgerr="Player 7";
	                            
	                        }
	                        if(data.err != ''){
	                            $("#status").html(data.err+" : "+msgerr);
	                        }
	                    }
	                    else{
	                        registerTeam[0].reset();
	                        window.location = "upandaway.php";
	                    }
	                },
	                error: function(xhr, status, error){
	                    $("#status").html("<h4>Out of my way!</h4> Somethin seems to be wrong. Can you reload and try again?");
	                    
	                }
	            });
	            grecaptcha.reset();
	            disableSubmit();
            }
            return false;
}

function getSteamDetails (steamid, ele) {
$.ajax({
    url: 'getSteamDetails.php',
    type: 'GET',
    dataType: 'json',
    data: {id: steamid},
    success: function(data){
    	if (data.response==undefined || data.response.players == undefined || data.response.players[0] == undefined || data.response.players[0].personaname == undefined){
    		// print incorrect steamID
    		steamCheckAr[ele.attr('name')] = false;
    		ele.css('border-color', 'red');
    	}
		var res =data.response.players[0].personaname;
        if (res == undefined) {
            // print incorrect steamID
            steamCheckAr[ele.attr('name')] = false;
            ele.css('border-color', 'red');
        }
        else{
    		steamCheckAr[ele.attr('name')] = true;
           console.log("Current username:"+res);
        }
    },
    error: function(xhr, status, error){
           console.log("There is an error, please retry this field.");
        // show the err in error field
    }
});
}