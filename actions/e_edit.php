<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['e_name'];
    $salary = $_POST['e_salary'];
    $days = $_POST['e_days'];
    $leave = $_POST['e_leave'];
    $ot = $_POST['ot'];
    $date = $_POST['date'];

    $sql = "UPDATE employee SET e_name=?, e_salary=?, e_days=?, e_leave=?, ot=?, date=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siisiis", $name, $salary, $days, $leave, $ot, $date, $id);

    if ($stmt->execute()) {
        header("Location: ../pages/employees.php?message=Employee updated successfully");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>