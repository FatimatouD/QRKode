<?php 
define('DB_NAME', 'phpmyadmin');
define('DB_USER', 'phpmyadmin');
define('DB_PASSWORD', 'abbajunior');
define('DB_HOST', 'localhost');
$mysqli= new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// if($mysqli->connect_error){
//     echo 'Errno: '.$mysqli->connect_errno;
//     echo'<br>';
//     echo 'Error: '.$mysqli->connect_error;
//     exit();
// }

// echo 'Succes: A proper connection to MySQL was made.';
// $mysqli->close();




?>