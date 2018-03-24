<?php

// this file contains the information about the database

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="project3"; // Database name
$tbl_name="forum_answer"; // Table name

// Connect to server and select databse.
$con = mysqli_connect("$host", "$username", "$password");
mysqli_select_db($con, $db_name)or die("cannot select DB");