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
        throw new Exception("Contest is over!");

        global $level;
        if ($level == 0)
            return ("First Level is pretty simple, You just have to update profile by calling 'uprofile' method! 'Command: METHOD_NAME [help|Args]'");
        else
            return ("uprofile := Update your profile\nwhoami := Information about user\nquestion := Question related stuffs\nsubmit := To Submit answer!");
    }

    public function uprofile($inno_id)
    {
        throw new Exception("Contest is over!");
        
        global $level;
        if ($inno_id == "help")
            return ("uprofile <YOUR_INNO_ID>");
        if ($level == 0)
            db_query("UPDATE users SET lvl=1,score=10 WHERE fbid='" . $_SESSION['FBID'] . "'");
        return db_query("UPDATE users SET innoid='" . $inno_id . "' WHERE fbid='" . $_SESSION['FBID'] . "'");
    }

    public function whoami()
    {
        throw new Exception("Contest is over!");

        global $score, $level;
        return array("Name" => $_SESSION['FULLNAME'],
                 "ID" => $_SESSION['FBID'],
                 "Score" => $score,
                 "Level" => $level);
    }

    public function hint()
    {
        throw new Exception("Contest is over!");

        global $level;
        if ($level == 0)
            return ("No Hints :p");
        else if ($level == 1)
            return ("It's a standard encryption method");
        else if ($level == 2)
            return ("Admin loves cookie!");
        else if ($level == 3)
            return ("RegEx it is! Either crack or exploit.");
        else if ($level == 4)
            return ("Only time can save you!");
        else if ($level == 5)
            return ("Password is stored in plain text on server!");
        else if ($level == 6)
            return ("Sometimes you don't have to follow the rules given in instructions.");
        else if ($level == 7)
            return ("Recursion! huh!");
        else if ($level == 8)
            return ("You can use symlink to fool the sandbox!");
        else
            return ("No hints for now");
    }

    public function question()
    {
        throw new Exception("Contest is over!");
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
        else if ($level == 6)
            return ("You are trying to get access of your friend's computer, It says please enter 10 digit password");
        else if ($level == 7)
            return ("You are trying to gain access into pentagon network, but seems like they have password key encrpted several times\nPassword: /question/tmp7546789.txt \nHint: Password contains only digits!");
        else if ($level == 8)
            return ("Pentagon network in on the way! You have successfully accessed the vault but it is locked\nVault a software running on Linux distro, whenever you enter password it checks if your password is correct (believe me you can't hack this algorithm)\n1. Correct password := It opens (creates if does not exist) and write '0' in file HTTP_RESPONSE.JSON and then send it to the server\n2. Incorrect password := It simply send error report to server.\nYou have shell access in sandboxed environment, You could create FS entries only! Come up with a single line linux command to hack this system and send empty file to server.\nAssume You can't access server info, sandbox hijacking is not possible.");
        else if ($level == 9)
            return ("Play with 'admin' method");
        else
            return ("We are in progress of cooking more questions for you!");
    }

    public function admin($arg1, $arg2)
    {
        throw new Exception("Contest is over!");
        global $level;
        if ($level == 9)
        {
            if ($arg1 != $_SESSION['FBID'])
                throw new Exception("Your arg1 should be your facebook profile id.");
            if ($arg2 == md5($arg1))
                throw new Exception("Invalid entry found at 'arg2', " . $arg2 . " != " . md5($arg1));
            return ("Your token '" . md5($arg1 . "iamadmin") . "'\nuse 'foo <FBID> <token> <function>' to access panel.\n Use 'help' as function");
        }
        else
            throw new Exception("Command 'admin' Not Found!");
    }

    public function foo($arg1, $arg2, $agr3)
    {
        throw new Exception("Contest is over!");
        if ($arg2 != md5($arg1 . "iamadmin"))
            throw new Exception("Invalid access token.");
        if ($agr3 == "help")
            return ("getfile := download file\ngethash := get Your session hash\nYou can submit your answer as third argument");
        else if ($agr3 == "gethash")
            return md5($arg2 . "iamidiot");
        else if ($agr3 == "getfile")
            return ("(Windows Binary) Run it as, question/crack.exe <token> <hash> <password>");
        else
        {
            $hash = md5($arg2 . "iamidiot") . "abc";
            if ($agr3 == strrev($hash))
            {
                db_query("UPDATE users SET lvl=10,score=550 WHERE fbid='" . $_SESSION['FBID'] . "'");
                return ("Correct Answer!");
            }
            throw new Exception("Unknow command!");
        }
    }

    public function submit($answer)
    {
        throw new Exception("Contest is over!");
        
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
        else if ($level == 6)
        {
            if (strlen($answer) > 10)
            {
                db_query("UPDATE users SET lvl=7,score=280 WHERE fbid='" . $_SESSION['FBID'] . "'");
                return ("Correct! You exploited a buffer overflow.");
            }
            throw new Exception("Wrong Answer!");       
        }
        else if ($level == 7)
        {
            if ($answer == "9871")
            {
                db_query("UPDATE users SET lvl=8,score=360 WHERE fbid='" . $_SESSION['FBID'] . "'");
                return ("true");
            }
            throw new Exception("Wrong Answer!");
        }
        else if ($level == 8)
        {
            if ($answer == "ln -s HTTP_RESPONSE.JSON /dev/null")
            {
                db_query("UPDATE users SET lvl=9,score=450 WHERE fbid='" . $_SESSION['FBID'] . "'");
                return ("true");   
            }
            throw new Exception("Wrong Answer!");
        }
        else if ($level == 9)
        {
            throw new Exception("Play with admin method only");
        }
    }
}
handle_json_rpc(new DigitalFortress());
?>