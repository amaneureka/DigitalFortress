<?php 

define('DB_HOST', 'localhost');
define('DB_USER', 'colleges_aman_p');
define('DB_PASS', 'ieee@amanp');
define('DB_NAME', 'colleges_ieeedigitalfortress');

$connection = NULL;

function db_query($query)
{
    global $connection;
    return mysqli_query($connection, $query);
}

function db_connection()
{
    global $connection;
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if((mysqli_connect_errno($connection)))
    {
        echo ("Could not connect to database");  
        exit;
    }
    db_create();
}

function db_create()
{       
    global $connection;
    $query="CREATE TABLE IF NOT EXISTS `users` (
            user_id int(4) NOT NULL AUTO_INCREMENT,
            name char(255) NOT NULL,
            fbid char(255) NOT NULL,
            emailid char(255) NOT NULL,
            innoid char(10) NOT NULL,
            score int(100) NOT NULL,
            PRIMARY KEY (user_id) );";
    if(db_query($query)){
        //do nothing
    }
    else{
        echo ("Could not create table"); 
    }
}
?>