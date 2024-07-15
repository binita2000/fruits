<?php
include '../config/config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM settings WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Show Setting</title>
</head>
<body>
    <h1>Setting Details</h1>
    <p><strong>Site Key:</strong> <?php echo $row['site_key']; ?></p>
    <p><strong>Site Value:</strong> <?php echo $row['site_value']; ?></p>
    <p><strong>Status:</strong> <?php echo $row['status']; ?></p>
    <a href="index.php">Back to list</a>
</body>
</html>
