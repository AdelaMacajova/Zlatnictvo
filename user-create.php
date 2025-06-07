<?php
include('partials/header.php');

$db = new Database();
$user = new User($db);

$role = $_SESSION['role'];
if ($role !== 0) {
  header('Location: login.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    if ($user->create($name, $surname, $email, $role, $password)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "<p>This email is already in use.</p>";
    }
}
?>

<section class="ml3">
    <h1>Add User</h1>
    <form class="contact-admin" id="user" action="" method="POST">
        <input type="text" placeholder="Name" id="name" name="name" required><br>
        <input type="text" placeholder="Surname" id="surname" name="surname" required><br>
        <input type="email" placeholder="Email" id="email" name="email" required><br>
        
        <select id="role" name="role" required>
            <option value="" disabled selected>Select role</option>
            <option value="0">Admin</option>
            <option value="1">User</option>
        </select><br>
        <input type="password" placeholder="Password" id="password" name="password" required><br>
        <input type="submit" value="Add">
    </form>
</section>
<br>
<?php
include('partials/footer.php');
?>