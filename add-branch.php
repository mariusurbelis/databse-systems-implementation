<?php
// Include the database connection
include "db.php";
// Check that a form has been submitted
if( isset($_POST['submit']) ){
    $stmt = $mysql->prepare("INSERT INTO Branch (BranchID, Address)
VALUE (:BranchID, :Address)");
    $stmt->bindParam(":BranchID", $firstname);
    $stmt->bindParam(":Address", $surname);
    // Insert one row
    $firstname = $_POST['branchid'];
    $surname = $_POST['address'];
    $stmt->execute();
    header("Location: branch.php");
} else {
    header("Location: branch.php");
    // Error handling
}
?>