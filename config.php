<?php

// difine a database in php 

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'logoapi');

// convert string to variabel

$server = constant('HOST');
$usernames = constant('USER');
$passwords = constant('PASS');
$dbnames = constant('DBNAME');

// connection to database

$con = mysqli_connect($server,$usernames,$passwords,$dbnames);

if(!$con){
   echo die("database not connect").mysqli_connect_error();
}

?>