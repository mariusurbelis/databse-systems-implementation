<?php
// Include the database connection
include "db.php";
// Check that a form has been submitted
if( isset($_POST['submit']) ){
    $stmt = $mysql->prepare("INSERT INTO Branch (ID, Address)
VALUE (:ID, :Address)");
    $stmt->bindParam(":ID", $firstname);
    $stmt->bindParam(":Address", $surname);
    // Insert one row
    $firstname = $_POST['id'];
    $surname = $_POST['address'];
    $stmt->execute();
    header("Location: branch.php");
} else {
    header("Location: branch.php");
    // Error handling
}
?>