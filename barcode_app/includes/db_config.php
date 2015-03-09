<?php

$host = "10.20.100.46"; 
$user = "postgres"; 
$db = "servicedesk"; 
$port = "65432";

$con = pg_connect("host=$host dbname=$db user=$user port=$port")
    or die ("Could not connect to server\n"); 

 


