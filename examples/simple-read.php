<?php
$con=mysqli_connect("silva.computing.dundee.ac.uk","19ac3u18","a1bc23","19ac3d18");
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Perform queries
$result = mysqli_query($con,"SELECT * FROM branch WHERE BranchID = 876;");

while ($row = $result->fetch_assoc()) {
    echo $row['Address']."<br>";
}

mysqli_close($con);
?>

<!-- Usage of this file -->
<?php // include 'simple-read.php';?>
<!-- ------------------ -->