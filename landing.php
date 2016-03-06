<?php
session_start(); 
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html class="no-js" lang="en"><!--<![endif]-->

<head xmlns:fb="http://www.facebook.com/2008/fbml">
    <meta charset="utf-8" />
    <title>Digital Fortress : Hack your heart out!</title>
    <meta name="description" content="Digital Fortress : Hack your heart out!">
   
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicon/apple-touch-icon-57x57-precomposed.png">
     <link rel="shortcut icon" href="img/favicon.ico">
    
    <!-- Included CSS Files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style3.css">
   
    <!-- Google Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Exo:100,200,300,400,600,700,800,900,200italic,300italic,400italic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="styleswitcher/css/styleswitcher.css" /> 
</head>
<body>

    <div id="ut_styleswitcher">
        <div style="position: relative;">
            <a href="#" class="toggle"></a>
            <h1>Control Panel</h1>
            <?php if ($_SESSION['FBID']): ?> 
                <p class="info">Hi <?php echo $_SESSION['FULLNAME']; ?>! </p>
            <?php else: ?>
                <p class="info">Hi Guest! </p>
            <?php endif ?>
            <p>
             <a class="button-switcher" href="#">Terminal</a>
             <a class="button-switcher" href="#">Leaderboard</a>
             </p>
            
        </div>
    </div>
    
    <div id="loading">
        <img src="img/loader.gif" alt="Website Loader"/>
    </div>
    <div id="bgimg"></div>
    <div class="slideshow-pattern"></div>
    
    <div class="container">
    <div class="row">
    <div class="span8 offset2" id="home">

        <div id="part1" class="fadeout_1">
            <a class="a-rounded" href="#" title=""><h2>Hack your ❤ out</h2></a>
            <h3>IEEE NSIT presents to you, Digital Fortress - The Online Hacking Event!</h3>
            <p class="timer">
                  <span class="days"></span><span class="daysText"></span><span class="separate">/</span> 
                  <span class="hours"></span><span class="hoursText"></span><span class="separate">/</span>
                  <span class="minutes"></span><span class="minutesText"></span><span class="separate">/</span>
                  <span class="seconds"></span><span class="secondsText"></span> 
            </p>
        </div>    
        
        <div id="part2" class="fadeout_2">
            <div class="row">
            <div class="span8 links">
                <div class="row">
                    <div id="part2" class="fadeout_2_1">
                        <div class="span2 offset2">
                            <?php if (!$_SESSION['FBID']): ?> 
                                <a href="fbconfig.php">LOGIN</a>
                            <?php else: ?> 
                                <a href="logout.php">LOGOUT</a>
                            <?php endif ?> 
                        </div>
                    </div>
                    <div id="part2" class="fadeout_2_2">        
                        <div class="span2">
                            <a id="link-map" href="#map">CONTACT US</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div id="part3" class="fadeout_2_1">        
                        <div class="span2 offset2">
                            <a href="#rules" data-toggle="modal">RULES</a>
                        </div>
                    </div>
                    <div id="part4" class="fadeout_2_2">
                        <div class="span2">
                            <a href="https://www.facebook.com/DigitalFortressNSITInnovision/app/202980683107053/">Forum</a>
                        </div>
                    </div>
                </div>
            </div>
            </div> 
        </div>
        </div>
    </div>
    </div>
                    <!-- rules-->
        <div id="rules" class="modal hide fade meet-us" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-header">
                <a href="#" class="close" data-dismiss="modal" aria-hidden="true"><img class="close-1" src="img/team/close2.png" alt="Close" /><img class="close-2" src="img/team/close1.png" alt="Close" /></a>
            </div>
            <div class="modal-body">
                <h2 id="myModalLabel" class="meet-us-title">Rules</h2>
                
                <p>1.This event consists of various levels of varying difficulty. You are supposed to solve each level step by step and proceed to next level for which you need answer for the current level. The participant who finishes the game earliest or who reaches up to the highest level till the game is closed, will be declared as winner.</br>
                2.This is an event for individual and Playing in groups is not allowed. The persons attempting to do so will be disqualified from the game.</br>
                3.No spoilers will be entertained. Posting an answer (or anything close to it) on the forum is not allowed, anyone attempting to do so will be banned from the game.</br>
                4.Do not share the answers on personal blogs/websites or other forums. It is quite possible that the other person may finish before you. And if found sharing the answers to other competitors he/she may be banned from the event.</br>
                5.Anybody can play this game but participants having a valid college and school ID only are entitled for Prizes.</br>
                6.In case of any conflict or situation of ambiguity, decision taken by the organizing committee will be final.</br>
                7.Unethical activities wont be entertained.
                </p>

                
            </div>
            
        </div>
        

    
    <div class="map-content">
    
    <div class="slideshow-pattern-map"></div>
    
    <div id="map"></div>
    
    <div class="container">
    <div class="row">
        <div class="span6 offset3 contact">    
        
        <div id="part4">
            <h2>CONTACT US</h2>
            <h4>Doubts and Suggestions are welcome</h4>
        </div>
            <form action="#" id="contactform">
                <p id="part5_1">
                    <input type="text" name="name" class="input" placeholder="Name">
                </p>
                <p id="part5_2">
                    <input type="text" name="email" class="input" placeholder="Email">
                </p>
                <p id="part5_3">
                    <textarea name="message" cols="35" rows="5" class="textarea" placeholder="Message"></textarea>
                </p>
                <p id="part5_4">
                    <button class="button" type="submit" value="Send"><span class="singup-image"><img src="img/send.png" alt="send email" /></span><span class="singup-text">Send</span></button>
                </p>
            </form>
            <div class="success-message-2"></div>
            <div class="error-message-2"></div> 
        </div>                
    </div> 
    </div>       
    
    
    <div class="footer">
    <div id="part6">
	<div class="container">
		<div class="span12 back-to-top">
			<a href="#home" id="home-top"><img class="back-to-top-1" src="img/back-to-top.png" alt="Go back to top" /><img class="back-to-top-2" src="img/back-to-top-hover.png" alt="Go back to top" /></a>
		</div>
		<div class="row">
			<div class="span12">
			<p class="footer-social">				
				<a href="https://www.facebook.com/ieeensit/?fref=ts" target="_blank" title="Facebook" data-gal="tooltip" data-placement="top" data-original-title="Facebook"><span class='symbol'>&#xe227;</span></a>
				<a href="https://twitter.com/ieee_nsit"  target="_blank" title="Twitter" data-gal="tooltip" data-placement="top" data-original-title="Twitter"><span class='symbol'>&#xe286;</span></a>
				<a href="http://ieeensit.org/" target="_blank" title="IeeeNSIT" data-gal="tooltip" data-placement="top" data-original-title="Google Plus"><span class='symbol'>&#xe231;</span></a>
				
				
			</p>
			</div>
		</div>
	</div>
	</div>
	</div>
    </div> <!-- /map-content -->
     
     <a id="bgndVideo"  data-property="{videoURL:'#',containment:'body',autoPlay:true, mute:false, startAt:0,opacity:1,ratio:'4/3', addRaster:true}">My video</a>
      
    <!-- Javascript -->
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/device.min.js"></script>
    <script type="text/javascript" src="js/jquery.countdown.js"></script>
    <script type="text/javascript" src="js/jquery.ajaxchimp.js"></script>
    <script type="text/javascript" src="js/ajaxchimp.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/jquery.gmap.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/jquery.mb.YTPlayer.js"></script>
    <script type="text/javascript" src="js/video_youtube.js"></script>
      <script src="styleswitcher/js/styleswitcher.js"></script>
      <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-74754564-1', 'auto');
          ga('send', 'pageview');
    </script>
</body>
</html>
