<?php

session_start();

	try {
		$db = new PDO("mysql:host=127.0.0.1;dbname=iformat", "root", "123");
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->exec('SET CHARACTER SET utf8');
	} catch (PDOException $e) {
		echo $e->getMessage();
	}

?>
