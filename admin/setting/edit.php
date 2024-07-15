<?php
include '../config/config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM settings WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $site_key = $_POST['site_key'];
    $site_value = $_POST['site_value'];
    $status = $_POST['status'];

    $sql = "UPDATE settings SET site_key='$site_key', site_value='$site_value', status='$status' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Setting</title>
</head>
<body>
    <h1>Edit Setting</h1>
    <form method="POST">
        <label>Site Key: </label>
        <input type="text" name="site_key" value="<?php echo $row['site_key']; ?>" required><br>
        <label>Site Value: </label>
        <textarea name="site_value" required><?php echo $row['site_value']; ?></textarea><br>
        <label>Status: </label>
        <input type="number" name="status" value="<?php echo $row['status']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
