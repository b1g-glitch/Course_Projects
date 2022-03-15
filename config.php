<?php
session_start();

$SERVER_NAME = 'localhost'; /* this is my server name */
$DB_USER ='root'; /* this is my database username */
$DB_PASSWORD = ''; /* this is my database password */

$conn = mysqli_connect($SERVER_NAME, $DB_USER, $DB_PASSWORD);

// Check connection to the database
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
