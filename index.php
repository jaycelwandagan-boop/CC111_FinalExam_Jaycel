<?php
require_once '../includes/db.php';

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar">
    <img src="../images/Logo.jpg" id="logo" onclick="goHome()">


    <button class="navbarbuttons" onclick="showSection('create')">Create</button>
    <button class="navbarbuttons" onclick="showSection('read')">Read</button>
    <button class="navbarbuttons" onclick="showSection('update')">Update</button>
    <button class="navbarbuttons" onclick="showSection('delete')">Delete</button>

</nav>
</nav>
</nav>

<!-- HOME -->
<section id="home" class="homecontent">
    <h1>Welcome to Student Management System</h1>
    <h2>A Project in Integrative Programming Technologies</h2>
</section>

<!-- CREATE -->
<section id="create" class="content">
    <h1>Insert New Student</h1>

    <form action="../includes/insert.php" method="POST">
        <input type="text" name="surname" placeholder="Surname" required><br>
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="text" name="middlename" placeholder="Middle Name"><br>
        <input type="text" name="address" placeholder="Address" required><br>
        <input type="text" name="contact_number" placeholder="Contact_number" required><br>

        <button type="reset">Clear Fields</button>
        <button type="submit">Save</button>
    </form>
</section>

<!-- READ -->
<section id="read" class="content">
    <h1>View Students</h1>

    <?php
    require_once '../includes/db.php';

    $stmt = $pdo->query("SELECT * FROM students");
    $students = $stmt->fetchAll();

    echo "Total students: " . count($students); // DEBUG
    ?>

    <?php if (count($students) > 0): ?>
    <table border="1" style="margin:auto;">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Address</th>
            <th>Contact_number</th>
        </tr>

        <?php foreach ($students as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= $s['name'] ?></td>
            <td><?= $s['surname'] ?></td>
            <td><?= $s['address'] ?></td>
            <td><?= $s['contact_number'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php else: ?>
        <p>No students found.</p>
    <?php endif; ?>

</section>

<!-- UPDATE -->
<section id="update" class="content">
    <h1>Update Student Records</h1>

    <form action="../includes/update.php" method="POST">
        <input type="number" name="id" placeholder="Enter Student ID" required><br>
        <input type="text" name="name" placeholder="New Name"><br>
        <input type="text" name="surname" placeholder="New Surname"><br>
        <input type="text" name="address" placeholder="New Address"><br>
        <input type="text" name="contact_number" placeholder="Contact_number"><br>
        <button type="submit">Update</button>
    </form>
</section>

<!-- DELETE -->
<section id="delete" class="content">
    <h1>Remove Student Records</h1>

    <form action="../includes/delete.php" method="POST">
        <input type="contact_number" name="id" placeholder="Enter Student ID" required><br>
        <button type="submit">Delete</button>
    </form>
</section>

<script src="script.js"></script>
</body>
</html>
