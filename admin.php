<?php
	require_once('connection.php');

	if (isset($_GET["iamadmin"]))
	{
		$function = $_GET["iamadmin"];
		if ($function == "drop")
		{
			db_connection();
			//var_dump(db_query("DROP TABLE IF EXISTS `users`"));
		}
	}
?>