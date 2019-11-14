<?php
// Include the database connection
include "../db.php";
try{
    // Create the SQL Query
    $query = "INSERT INTO Service VALUES (" . 'NULL' . ',\'' .
        $_POST['ServiceStart'] . '\',\'' .
        $_POST['ServiceExpectedEnd'] . '\',\'' .
        $_POST['ServiceActualEnd'] . '\',' .
        $_POST['HoursDelayed'] . ',\'' .
        $_POST['Notes'] . '\',\'' .
        $_POST['Status'] . '\',' .
        $_POST['StaffID'] . ',\'' .
        $_POST['BranchID'] . '\',\'' .
        $_POST['RegNumber'] . '\'' .

        ");";
    echo $query;
    // Execute the query on the database
    $mysql->exec($query);
    header("Location: ../service.php");
} catch ( PDOException $e ) {
    // Any errors from the query are caught in this block
    echo $e->getMessage();
}
?>