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


$password = md5($data->password);
$email = $data->email;



// Database insert SQL code
$sql = "SELECT * FROM user WHERE email='$email' AND password='$password' ";// check login data

// Insert into the database
$result = mysqli_query($mysqli, $sql);// execute function
$numrow=mysqli_num_rows($result); //get numrows
if ($numrow>0) {//user exist 
    $user = mysqli_fetch_assoc($result);

    echo json_encode(
        array(
        'data'=> $user
    ));
}
else
{

     echo json_encode(['error'=> 'utilisateur introuvable']);
}
mysqli_error($mysqli);
?>
