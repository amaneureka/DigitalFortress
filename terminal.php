<?php
session_start();
?>
<!DOCTYPE html>
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]>
<!--><html class="no-js" lang="en"><!--<![endif]-->

<head>
	<meta charset="utf-8" />
    
    <!-- Website Title & Description -->
    <title>Digital Fortress : Hack your heart out!</title>
    <meta name="description" content="Digital Fortress : Hack your heart out!">
    
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width" />
    <meta name="HandheldFriendly" content="True" />
    <meta name="MobileOptimized" content="320" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/favicon/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/favicon/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/favicon/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="img/favicon/apple-touch-icon-57x57-precomposed.png">
    <link rel="shortcut icon" href="img/favicon/favicon.png" />
    
    <!-- Included CSS Files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style5.css">
    <link rel="stylesheet" href="css/supersized.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/supersized.shutter.css" type="text/css" media="screen" />
    
    <!-- Google Web Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Exo:100,200,300,400,600,700,800,900,200italic,300italic,400italic' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="styleswitcher/css/styleswitcher.css" /> 
    <link href="css/jquery.terminal-0.9.3.css" rel="stylesheet"/>
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
             <a class="button-switcher" href="terminal.php">Terminal</a>
             <a class="button-switcher" href="leaderboard.php">Leaderboard</a>
             </p>
            
        </div>
    </div>

	<!-- Loader -->
	<div id="loading">
    	<img src="img/loader.gif" alt="Website Loader"/>
    </div>
    
    <!-- Slideshow Pattern-->
    <div class="slideshow-pattern"></div>
    
    <div id="canvas" class="canvas"></div>
    
    <div class="container">
    <div class="row">
    <div class="span8 offset2" id="home2">
    	<div id="part1" class="fadeout_1" style="width: 500px; height: 230px;">
	        <h2 style="text-align: center;">Terminal</h2>
	        <div id="terminal" ></div>
	    </div>
	    </div>
    </div>
    </div>
    
	<!-- Javascript -->
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/device.min.js"></script>
	<script type="text/javascript" src="js/jquery.countdown.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/jquery.gmap.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script type="text/javascript" src="js/fss.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/canvas.js"></script>
  	<script src="styleswitcher/js/styleswitcher.js"></script>
    <script src="js/jquery.terminal-0.9.3.min.js"></script>
    <script src="js/jquery.mousewheel-min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('#terminal').terminal("src/json-terminal.php", {
                greetings: "Welcome!"
            });
        });
    </script>
</body>
</html>
