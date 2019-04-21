<?php

require("password.php");


$con=mysqli_connect("localhost", $mojlogin, $mojehaslo, $db_name);
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$username = $_POST["username"];
$password = $_POST["password"];


$statement = mysqli_prepare($con, 'SELECT user_id, name, surname, username, password FROM User WHERE username =?');
mysqli_stmt_bind_param($statement, "s", $username);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $colUserID, $colName, $colSurname, $colUsername, $colPassword);
$response = array();
$response["success"] = false;


while(mysqli_stmt_fetch($statement)){
        if (password_verify($password, $colPassword)) {
            $response["success"] = true;  
           $response["name"] = $colName;
       }
    
   }

echo json_encode($response);

?>
