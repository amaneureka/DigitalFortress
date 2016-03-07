<?php
require('json-rpc.php');

if (function_exists('xdebug_disable')) {
    xdebug_disable();
}

class DigitalFortress
{
    
}
handle_json_rpc(new DigitalFortress());
?>