<?php
	session_start();

	require_once('connection.php');

	if (isset($_GET["iamadmin"]))
	{
		db_connection();

		echo ($_SESSION['FBID']);
		$function = $_GET["iamadmin"];
		if ($function == "drop")
		{
			//var_dump(db_query("DROP TABLE IF EXISTS `users`"));
		}
		else if ($function == "promote")
		{
			var_dump(db_query("UPDATE users SET score=450,lvl=" . $_GET['level'] . " WHERE fbid='" . $_SESSION['FBID'] . "'"));
		}
	}
?>