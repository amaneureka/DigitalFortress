<?php
session_start();

require_once 'autoload.php';
require_once 'connection.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookHttpable;

FacebookSession::setDefaultApplication( '1555553761440354','ec5f83552ad58fdce517301b3bd8c59d' );
$helper = new FacebookRedirectLoginHelper('http://ieeensit.org/digitalfortress/fbconfig.php' );

try 
{
  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
} catch( Exception $ex ) {
}

if (isset($session)) {
    $request = new FacebookRequest( $session, 'GET', '/me' );
    $response = $request->execute();
    $graphObject = $response->getGraphObject();
    $fbid = $graphObject->getProperty('id');
    $fbfullname = $graphObject->getProperty('name'); // To Get Facebook full name
	$femail = $graphObject->getProperty('email');    // To Get Facebook email ID
	/* ---- Session Variables -----*/
	$_SESSION['FBID'] = $fbid;           
    $_SESSION['FULLNAME'] = $fbfullname;
    $_SESSION['EMAIL'] =  $femail;

    db_connection();
    $result = db_query("SELECT * FROM users WHERE fbid='" . $fbid . "';");

    if (!mysqli_num_rows($result))
    {
        /* New User */
        db_query("INSERT INTO users VALUES(NULL, '" . $fbfullname . "', '" . $fbid . "', '" . $femail . "', 'NULL', 0);");

        //swagat karo user kar :D !
        header("Location: landing.php?welcome");
    }
    else
        header("Location: landing.php");
    
} else {
  $loginUrl = $helper->getLoginUrl();
    header("Location: ".$loginUrl);
}
?>