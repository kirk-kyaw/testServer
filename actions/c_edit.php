<?php
require "connect.php"; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $id = $_POST['id'];
    $name = $_POST['e_name'];
    $date = $_POST['date'];
    $cocktail = $_POST['cocktail'];
    $spy = $_POST['spy'];
    $ktv = $_POST['ktv'];
    $liquor = $_POST['liquor'];
    $flower = $_POST['flower'];

    // Prepare the SQL update statement
    $sql = "UPDATE commission SET 
                cocktail = ?, 
                spy = ?, 
                ktv = ?, 
                liquor = ?, 
                flower = ?, 
                date = ? 
            WHERE id = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("ssssssi", $cocktail, $spy, $ktv, $liquor, $flower, $date, $id);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the commissions page after successful update
            header("Location: ../pages/commissions.php?success=1");
            exit();
        } else {
            echo "Error updating record: " . $stmt->error; // Display error if execution fails
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error; // Display error if preparation fails
    }
} else {
    echo "Invalid request method."; // Handle invalid request method
}

// Close the database connection
$conn->close();
?>
