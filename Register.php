<?php

    require("password.php");

    $con=mysqli_connect("localhost", $mojlogin, $mojehaslo, $db_name);
    
    // Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $username = $_POST["username"];
    $password = $_POST["password"];
   $hash = password_hash($password, PASSWORD_DEFAULT);
    $statement = mysqli_prepare($con,"INSERT INTO User(name,surname, username, password) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($statement,"ssss", $name, $surname, $username, $hash);
    mysqli_stmt_execute($statement);
    
    $response = array();
    $response["success"] = true;

    echo json_encode($response);
   
?>
