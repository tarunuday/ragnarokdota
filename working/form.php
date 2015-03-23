<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Registration">
        <title>Registration</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/forms-min.css">
        <!--[if lte IE 8]>  
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
        <!--<![endif]-->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.cs">
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/layouts/marketing-old-ie.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
            <link rel="stylesheet" href="css/layouts/marketing.css">
            <link rel="stylesheet" href="css/layouts/style.css">
            <link rel="stylesheet" href="css/layouts/form.css">
        <!--<![endif]-->
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
        <style type="text/css">
        .errInput{
            border-color: red;
        }
        .chkInput{
            border-color: #D8C452;
        }
        .gudInput{
            border-color: green;
        }
        </style>
    </head>
    <body>
        <?php include 'header.php' ?>
        <div class="splash-container">
            <div class="splash">
                <h1 class="splash-head">Ragnarok Dota 2 Championship</h1>
                <p class="splash-subhead">
                    Online Dota 2 Tournament held as a part of <a style="color:white; text-decoration:none" href="http://www.ragam.org.in">Ragam</a>.
                </p>
            </div>
        </div>
        <div class="content-wrapper">       
            <div class="ribbon l-box-lrg pure-g">
                <div class="l-box-lrg is-center pure-u-1 pure-u-md-1-2 pure-u-lg-2-5">
                    <img class="pure-img-responsive" title="Image Courtesy: http://cyberneticcupcake.deviantart.com/" alt="Image Courtesy: http://cyberneticcupcake.deviantart.com/" width="300" src="img/common/puj.png">
                </div>
                <div class="pure-u-1 pure-u-md-1-2 pure-u-lg-3-5">
        
                    <h2 class="content-head content-head-ribbon is-center" style="text-decoration:none">Look who's comin' for dinner!</h2>
        
                    <p>
                        <ul class="">
                            <li>Before you start registering, make sure you've read our <a href="rules.php"  style="color:white">Rules and Regulations</a> thoroughly.</li>
                            <li>A team may be registered by one person only, preferably by team captain/manager.</li>
                            <li>A player can play only in one team, including Standin players.</li>
                            <li>All communication to the team will be done by the email and phone number provided by the team</li>
                        </ul>
                    </p>
                </div>
            </div>     
            <div class="content">
                <h2 class="content-head is-center blank-up-5 blank-down-5" style="text-decoration:none">Let's get intimate</h2>
                <form class="pure-form" id="registerTeam">
                    <div class="pure-g">
                        <div class="pure-u-2-3 pure-u-md-1-1 pure-u-lg-2-3">
                            <fieldset>
                                <legend>
                                    <div class="pure-u-11-24"><input class="team t-name" name="teamname" type="text" placeholder="Team Name (complete with sponsors names, if any)" value="rusts"  required></div>
                                    <div class="pure-u-1-4"><input class="team t-nick" name="teamnick" type="text" placeholder="Team Tag/Abbreviation" value="rusts"  required></div>
                                    <div class="pure-u-11-24"><input class="team t-mail" name="teammail" type="email" placeholder="Email (required)" value="tarunuday@gmail.com"  required></div>
                                    <div class="pure-u-11-24"><input class="team t-number" name="teamnumber" type="text" placeholder="Phone Number (required)" value="+919633258889"  required></div>
                                </legend>
                                <legend>
                                <div class="pure-u-1 blank-up-1 blank-down-1">
                                    <span style="font-size:0.8em">
                                    <h4>How to enter the "Steam ID" field</h4>
                                    For each player, go to the player's Steam Profile, copy the profile number or custom name and paste it in the field.</br>
                                    For eg.
                                    </br> "http://steamcommunity.com/id/robinwalker/" should enter "robinwalker" without the quotes.</br>
                                        "http://steamcommunity.com/profiles/76561197960435530" should enter "76561197960435530" without the quotes.</span>
                                </div>
                                </legend>
                                <div class="pure-u-1-24 blank-up-1" style="font-size:0.8em;text-align:center;">Captain</div>
                                <section class="p-one">
                                    <div class="pure-u-1-24"><input name="team_captain" value="p_1" type="radio"></div>
                                    <div class="pure-u-3-24">Player 1:</div>
                                    <div class="pure-u-6-24"><input class="one p-id" type="text" name="p_id_1" placeholder="Steam ID" value="rusts" required></div>
                                    <div class="pure-u-6-24"><input class="one p-name" type="text" name="p_name_1" placeholder="Full Name"  value="rusts"  required></div>
                                    <div class="pure-u-5-24"><input class="one p-nick" type="text" name="p_nick_1" placeholder="In-game Nickname" value="rusts"  required></div>
                                    <div class="pure-u-1-24 chk">
                                        </div>
                                </section>
                                <section class="p-two">
                                    <div class="pure-u-1-24"><input name="team_captain" value="p_2" type="radio"></div>
                                    <div class="pure-u-3-24">Player 2:</div>
                                    <div class="pure-u-6-24"><input class="two p-id" type="text" name="p_id_2" placeholder="Steam ID" value="plungehead"  required></div>
                                    <div class="pure-u-6-24"><input class="two p-name" type="text" name="p_name_2" placeholder="Full Name" value="rusts"  required></div>
                                    <div class="pure-u-5-24"><input class="two p-nick" type="text" name="p_nick_2" placeholder="In-game Nickname" value="rusts"  required></div>
                                    <div class="pure-u-1-24 chk">
                                        </div>
                                </section>
                                <section class="p-thr">
                                    <div class="pure-u-1-24"><input name="team_captain" value="p_3" type="radio"></div>
                                    <div class="pure-u-3-24">Player 3:</div>
                                    <div class="pure-u-6-24"><input class="thr p-id" type="text" name="p_id_3" placeholder="Steam ID" value="famousvk" required></div>
                                    <div class="pure-u-6-24"><input class="thr p-name" type="text" name="p_name_3" placeholder="Full Name" value="rusts"  required></div>
                                    <div class="pure-u-5-24"><input class="thr p-nick" type="text" name="p_nick_3" placeholder="In-game Nickname" value="rusts"  required></div>
                                    <div class="pure-u-1-24 chk">
                                        </div>
                                </section>
                                <section class="p-fou">
                                    <div class="pure-u-1-24"><input name="team_captain" value="p_4" type="radio"></div>
                                    <div class="pure-u-3-24">Player 4:</div>
                                    <div class="pure-u-6-24"><input class="fou p-id" type="text" name="p_id_4" placeholder="Steam ID" value="volscente"  required></div>
                                    <div class="pure-u-6-24"><input class="fou p-name" type="text" name="p_name_4" placeholder="Full Name" value="rusts"  required></div>
                                    <div class="pure-u-5-24"><input class="fou p-nick" type="text" name="p_nick_4" placeholder="In-game Nickname" value="rusts"  required></div>
                                    <div class="pure-u-1-24 chk">
                                        </div>
                                </section>
                                <section class="p-fiv">
                                    <div class="pure-u-1-24"><input name="team_captain" value="p_5" type="radio"></div>
                                    <div class="pure-u-3-24">Player 5:</div>
                                    <div class="pure-u-6-24"><input class="fiv p-id" type="text" name="p_id_5" placeholder="Steam ID" value="76561197996207926" required></div>
                                    <div class="pure-u-6-24"><input class="fiv p-name" type="text" name="p_name_5" placeholder="Full Name" value="rusts"  required></div>
                                    <div class="pure-u-5-24"><input class="fiv p-nick" type="text" name="p_nick_5" placeholder="In-game Nickname" value="rusts"  required></div>
                                    <div class="pure-u-1-24 chk">
                                        </div>
                                </section>
                                <section class="p-six">
                                    <div class="pure-u-1-24"></div>
                                    <div class="pure-u-3-24">Standin 1:</div>
                                    <div class="pure-u-6-24"><input class="six p-id" type="text" name="p_id_6" placeholder="Steam ID"></div>
                                    <div class="pure-u-6-24"><input class="six p-name" type="text" name="p_name_6" placeholder="Full Name"></div>
                                    <div class="pure-u-5-24"><input class="six p-nick" type="text" name="p_nick_6" placeholder="In-game Nickname"></div>
                                    <div class="pure-u-1-24 chk">
                                        </div>
                                </section>
                                <section class="p-sev">
                                    <div class="pure-u-1-24"></div>
                                    <div class="pure-u-3-24">Standin 2:</div>
                                    <div class="pure-u-6-24"><input class="sev p-id" type="text" name="p_id_7" placeholder="Steam ID"></div>
                                    <div class="pure-u-6-24"><input class="sev p-name" type="text" name="p_name_7" placeholder="Full Name"></div>
                                    <div class="pure-u-5-24"><input class="sev p-nick" type="text" name="p_nick_7" placeholder="In-game Nickname"></div>
                                    <div class="pure-u-1-24 chk">
                                        </div>
                                </section>
                            </fieldset>
                        </div>
        
                    <div class="pure-u-1-4 pure-u-md-1-1 pure-u-lg-1-4" id="preview">
                        <div class="pure-u-1" id="preview-container">
                            <div class="pure-g">
                                <div class="pure-u-1" style="border-bottom:3px solid gray;">
                                    <h1 style="color:#B0F1FD;">Team Preview</h1>
                                </div>
                            </div>
                            <div class="pure-g t-name">
                                <div class="pure-u-1">
                                    <h2>Team Name</h2>
                                </div>
                            </div>
                            <div class="pure-g plyr bottom-border">
                                <div class="pure-u-1" id="pone">
                                </div>
                                <div class="pure-u-1" id="ptwo">
                                </div>
                                <div class="pure-u-1" id="pthr">
                                </div>
                                <div class="pure-u-1" id="pfou">
                                </div>
                                <div class="pure-u-1" id="pfiv">
                                </div>
                            </div>
                            <div class="pure-g stnd bottom-border">
                                <div class="pure-u-1" id="psix">
                                    <h3></h3>
                                </div>
                                <div class="pure-u-1" id="psev">
                                    <h3></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="pure-g blank-down">
                        <div class="pure-u-3-5 pure-g">
                            <div class="pure-u-1 is-center" id="status">
                            </div>
                            <div class="pure-u-1 is-center" style="margin:auto;width:100%;">
                                <div class="pure-u-1-2 is-center" style="margin:auto 0;width:100%;">
                                    <div class="g-recaptcha" data-sitekey="6LftVAMTAAAAAClTeAdqe0IYI-qfdaJYYW3zTLqA" data-callback="enableSubmit" data-expired-callback="disableSubmit"></div>
                                </div>
                            </div>
                            <div class="pure-u-1 is-center">
                                <button type="submit" id="registerTeamButton" class="pure-button pure-button-primary" style="width:95%;background-color:#14A76C;" disabled><h3 style="color:#D9CF1A">Submit!</h3><h4 style="color:#D9CF1A">To the Wraith King's rule!</h4></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php include 'footer.php' ?>

        </div>
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <script type="text/javascript" src="js/form.js"></script>
    </body>
</html>