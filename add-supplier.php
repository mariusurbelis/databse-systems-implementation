<?php
// Include the database connection
include "db.php";
// Check that a form has been submitted
if( isset($_POST['submit']) ){
    $stmt = $mysql->prepare("INSERT INTO Supplier (ID, ContactNumber, Address)
VALUE (:ID, :ContactNumber, :Address)");
    $stmt->bindParam(":ID", $id);
    $stmt->bindParam(":ContactNumber", $contactnumber);
    $stmt->bindParam(":Address", $address);
    // Insert one row
    $id = $_POST['id'];
    $contactnumber = $_POST['contactnumber'];
    $address = $_POST['address'];
    $stmt->execute();
    header("Location: supplier.php");
} else {
    header("Location: supplier.php");
    // Error handling
}
?>