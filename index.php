<?php

$conn = mysqli_connect("localhost", "root", "", "crud_app");

if (!$conn) {
    die("Connection Failed");
}

/* CREATE */
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn, "INSERT INTO students(name,email)
                         VALUES('$name','$email')");
    header("Location:index.php");
    exit;
}

/* DELETE */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM students WHERE id=$id");
    header("Location:index.php");
    exit;
}

/* UPDATE */
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    mysqli_query($conn, "UPDATE students
                         SET name='$name',
                             email='$email'
                         WHERE id=$id");

    header("Location:index.php");
    exit;
}

$editData = null;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];

    $result = mysqli_query(
        $conn,
        "SELECT * FROM students WHERE id=$id"
    );

    $editData = mysqli_fetch_assoc($result);
}

$students = mysqli_query(
    $conn,
    "SELECT * FROM students ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Student Management System</h2>

<form method="POST">

<?php if($editData){ ?>

    <input
        type="hidden"
        name="id"
        value="<?= $editData['id']; ?>"
    >

    <input
        type="text"
        name="name"
        value="<?= $editData['name']; ?>"
        required
    >

    <input
        type="email"
        name="email"
        value="<?= $editData['email']; ?>"
        required
    >

    <button name="update">
        Update Student
    </button>

<?php } else { ?>

    <input
        type="text"
        name="name"
        placeholder="Name"
        required
    >

    <input
        type="email"
        name="email"
        placeholder="Email"
        required
    >

    <button name="add">
        Add Student
    </button>

<?php } ?>

</form>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($students)){ ?>

    <tr>
        <td><?= $row['id']; ?></td>
        <td><?= $row['name']; ?></td>
        <td><?= $row['email']; ?></td>

        <td>
            <a href="?edit=<?= $row['id']; ?>">
                Edit
            </a>

            <a
              href="?delete=<?= $row['id']; ?>"
              onclick="return confirm('Delete Record?')"
            >
              Delete
            </a>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>