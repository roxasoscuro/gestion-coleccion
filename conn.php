<?php
	$conn=new SQLite3('poimycoleccion/uxjcrxskusjz.db') or die("Unable to open database!");
	$query="CREATE TABLE IF NOT EXISTS `user`(user_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username TEXT, password TEXT, name TEXT)";	
	$conn->exec($query);
?>