<?php
session_start();

require('json-rpc.php');
require_once '../connection.php';

db_connection();

if (function_exists('xdebug_disable')) {
    xdebug_disable();
}

class DigitalFortress
{
    public function help()
    {
        $result = db_query("SELECT * FROM users WHERE fbid='" . $_SESSION['FBID'] . "'");
        if (mysqli_num_rows($result))
        {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $level = $row['lvl'];
            if ($level == 0)
            {
                return ("First Level is pretty simple, You just have to update profile by calling `uprofile` method!");
            }
        }
        else
            throw new Exception("Something went wrong!");
            
    }

    static $uprofile_documentation = "uprofile <YOUR_INNO_ID>";
    public function uprofile($inno_id)
    {
        
    }
}
handle_json_rpc(new DigitalFortress());
?>