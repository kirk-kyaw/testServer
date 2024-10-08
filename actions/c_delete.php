<?php
require "connect.php"; // Include your database connection

if (isset($_GET['id'])) {
    $e_id = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM your_table_name WHERE e_id='$e_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../index.php"); // Redirect after successful deletion
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close(); // Close the connection
?>