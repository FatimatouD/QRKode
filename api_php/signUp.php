<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: POST, GET, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With, Access-Control-Allow-Origin');
header('Content-Type: application/json; charset=UTF-8');

include "server.php";
// Assuming this is the correct path to your server.php file

$json_data = file_get_contents('php://input');
// Decode JSON
$data = json_decode($json_data);

// Get the post record
$firstname = $data->nom;
$lastname = $data->prenom;
$username = $data->username;
$password = md5($data->password);
$email = $data->email;
$phone = $data->phone;
$emergencyphone1 = $data->emergencyphone1;
$emergencyphone2 = $data->emergencyphone2;
$birth = $data->birth;
$gender = $data->gender;


// Database insert SQL code
$sql = "INSERT INTO `user`(`id`, `firstname`, `lastname`, `username`,`email`,  `birth`,`password`, `emergencyphone1`,`emergencyphone2`,`gender`,`phone`) 
        VALUES (NULL, '$firstname', '$lastname', '$username', '$email', '$birth','$password','$emergencyphone1','$emergencyphone2','$gender','$phone')";

// Insert into the database
$result = mysqli_query($mysqli, $sql);

if ($result) {

    echo json_encode(
        array(
            "message" => 'Votre compte a été créé avec succès'
        )
    );
}
else{

     echo json_encode(
        array(
            "message" => "Une erreur est survenue!".mysqli_error($mysqli)
        )
    );
}
?>
