<?php 
function connect() {
    $connection = mysqli_connect("localhost","colleges","5*Tusharg","colleges_ieeewp");
    if(mysqli_connect_errno($connection)) { 
        return false;
    } else {
        return $connection;
    }
}
?>