<?php
	
	$connect = "host='". $db['host'] ."' port='" . $db['port']  ."' user='". $db['user'] ."' password='". $db['pass'] ."' dbname='". $db['dbname'] ."'";
	
	$dbConnect = pg_connect ($connect);
	
	pg_query ("SET search_path = '" . $db ['schema'] ."'");
	