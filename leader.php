<html>
<head>
	<meta charset="utf-8" />
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
            <p class="info">Hi xyz! </p>
            <p>
     		<a class="button-switcher" href="#">Terminal</a>
     		<a class="button-switcher" href="#">Leaderboard</a>
     		</p>
            
        </div>
    </div>
<?php 

include 'connection.php';
?>
<div id="leaderwrap">

<div id="huge">Leaderboard
<?php if(isset($_GET['w']) && $_GET['w'] == 1) echo '<br>Congrats!'; ?></div>
<?php
$connection=connect();
$query="select * from users ORDER BY level DESC,timestamp ASC";
$check=mysqli_query($connection,$query) ;
echo '<table style="color:white;border-collapse:collapse" border="1" align="center"><thead><tr><th>Rank</th><th>Name</th><th>College</th><th>Level</th></tr></thead><tbody>';
$i=1;
while($result=mysqli_fetch_array($check,MYSQLI_ASSOC)) {
 echo '<tr><td>'.$i.'</td><td>'.htmlspecialchars($result['name']).'</td><td>'.htmlspecialchars($result['college']).'</td><td>'.htmlspecialchars($result['level']).'';
	$i++;
}
echo '</tbody></table>';
?>
</div>
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

  	<!-- DEMO Switcher
  	================================================== -->
  	<script src="styleswitcher/js/styleswitcher.js"></script>
</body>
</html>

