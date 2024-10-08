<?php
require "connect.php"; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $e_name = $_POST['e_name'];
    $e_salary = $_POST['e_salary'];
    $e_days = $_POST['e_days'];
    $e_leave = $_POST['e_leave'];
    $ot = $_POST['ot'];
    $date = $_POST['date'];

    // Prepare the SQL insert statement
    $sql = "INSERT INTO employee (e_name, e_salary, e_days, e_leave, ot, date) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("siisss", $e_name, $e_salary, $e_days, $e_leave, $ot, $date);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to the employees page after successful insertion
            header("Location: ../pages/employees.php?success=1");
            exit();
        } else {
            echo "Error creating record: " . $stmt->error; // Display error if execution fails
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