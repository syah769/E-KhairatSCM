<?php
session_start();
include_once 'database/connection.php';

if(isset($_POST['add'])){
    $database = new Connection();
    $db = $database->open();
    try{
        //make use of prepared statement to prevent sql injection
        $stmt = $db->prepare("INSERT INTO penama (kariah_id, firstname, lastname, address) VALUES (:kariah_id, :firstname, :lastname, :address)");
        //if-else statement in executing our prepared statement
        $_SESSION['message'] = ( $stmt->execute(array(':kariah_id' => $_POST['kariah_id'], ':firstname' => $_POST['firstname'] , ':lastname' => $_POST['lastname'] , ':address' => $_POST['address'])) ) ? 'Member added successfully' : 'Something went wrong. Cannot add member';

    }
    catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }

    //close connection
    $database->close();
}

else{
    $_SESSION['message'] = 'Fill up add form first';
}

header('location: senarai-yuran.php');

