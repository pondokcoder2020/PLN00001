<?php 
 
 $host = "localhost";
 $port = "5432";
 $dbname = "outside_plnsidak";
 $user = "postgres";
 $password = "jbl123456";
 $pg_options = "--client_encoding=UTF8";
 
 $connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} options='{$pg_options}'";
 $conn = pg_connect($connection_string);
 
 
 if($conn){
   //echo "Connected to ". pg_host($dbconn); 
 }else{
	 echo "Error in connecting to database BO";
	 die();
 }
?>