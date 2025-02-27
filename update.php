<?php
include 'db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Pengguna</title>
</head>
<body>
    <h2>Edit Pengguna</h2>
    <form method="post">
        Nama: <input type="text" name="name" value="<?= $row['name'] ?>" required><br>
        Email: <input type="email" name="email" value="<?= $row['email'] ?>" required><br>
        <button type="submit">Update</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
