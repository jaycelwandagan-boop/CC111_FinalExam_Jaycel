<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $middlename = $_POST['middlename'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $sql = "UPDATE students 
            SET name = ?, surname = ?, middlename = ?, address = ?, contact_number = ?
            WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $surname, $middlename, $address, $contact, $id]);

    header("Location: ../public/index.php");
    exit();
}
?>