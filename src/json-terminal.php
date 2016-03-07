<?php
session_start();

require('json-rpc.php');
require_once '../connection.php';

db_connection();
$result = db_query("SELECT * FROM users WHERE fbid='" . $_SESSION['FBID'] . "'");

$level = 0;
$score = 0;
if (mysqli_num_rows($result))
{
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $level = $row['lvl'];
    $score = $row['score'];
}

if (function_exists('xdebug_disable')) {
    xdebug_disable();
}

class DigitalFortress
{
    public function help()
    {
        global $level;
        if ($level == 0)
        {
            return ("First Level is pretty simple, You just have to update profile by calling 'uprofile' method! 'Command: METHOD_NAME [help|Args]'");
        }
        else
            return ("uprofile := Update your profile\nwhoami := Information about user\nquestion := Question related stuffs\nsubmit := To Submit answer!");
    }

    public function uprofile($inno_id)
    {
        global $level;
        if ($inno_id == "help")
            return ("uprofile <YOUR_INNO_ID>");
        if ($level == 0)
            db_query("UPDATE users SET lvl=1,score=10 WHERE fbid='" . $_SESSION['FBID'] . "'");
        return db_query("UPDATE users SET innoid='" . $inno_id . "' WHERE fbid='" . $_SESSION['FBID'] . "'");
    }

    public function whoami()
    {
        global $score, $level;
        return array("Name" => $_SESSION['FULLNAME'],
                 "Email ID" => $_SESSION['EMAIL'],
                 "Score" => $score,
                 "Level" => $level);
    }

    public function question()
    {
        global $level;
        if ($level == 0)
            return ("Are you kidding?");
        else if ($level == 1)
            return ("Today my friend 'dhruv' recieved a letter on unknown saying 'SEFDS0VEIQ=='. Can you help him to figure out the message?\submit <YOUR_ANSWER>");
        else if ($level == 2)
            return ("We all love 'free' cookies, right? Even Admin too!");
        else if ($level == 3)
            return ("Aman is really bad at webD could you help him to figure out this? /question/tmp9876.txt");
        else if ($level == 4)
        {
            $date = new DateTime();
            return ("Password is '" . ($date->getTimestamp() + 10) . "'!");
        }
        else if ($level == 5)
            return ("Sometimes passwords are saved in plain text on server without your knowledge. Search engine won't able to help you :)");
        else
            return ("We are in progress of cooking more questions for you!");
    }

    public function submit($answer)
    {
        global $level;
        if ($level == 1)
        {
            if ($answer == "HACKED!")
            {
                db_query("UPDATE users SET lvl=2,score=30 WHERE fbid='" . $_SESSION['FBID'] . "'");
                return ("true");
            }
            throw new Exception("Wrong Answer!");
        }
        else if ($level == 2)
        {
            if(isset($_COOKIE['free']))
            {
                db_query("UPDATE users SET lvl=3,score=60 WHERE fbid='" . $_SESSION['FBID'] . "'");
                return ("true");
            }
            throw new Exception("Wrong Answer!");
        }
        else if ($level == 3)
        {
            if ($answer == "break")
            {
                db_query("UPDATE users SET lvl=4,score=100 WHERE fbid='" . $_SESSION['FBID'] . "'");
                return ("true");
            }
            throw new Exception("Wrong Answer!");       
        }
        else if ($level == 4)
        {
            return ("this time you have to submit your answer to /terminal.php?answer=<PASSWORD>");
        }
        else if ($level == 5)
        {
            if ($answer == "6160fe2b34fdb6")
            {
                db_query("UPDATE users SET lvl=6,score=210 WHERE fbid='" . $_SESSION['FBID'] . "'");
                return ("true");
            }
            throw new Exception("Wrong Answer!");       
        }
    }
}
handle_json_rpc(new DigitalFortress());
?>