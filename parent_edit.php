<?php

$customerID = $_POST['customerID'];
$customername = $_POST['customername'];

$sql = "UPDATE customers SET customername=? WHERE customerID=?";

if ($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $stmt->error;
}

// Close the statement and the database connection
$stmt->close();
$link->close();
?>
