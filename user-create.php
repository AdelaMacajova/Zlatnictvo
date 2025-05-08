<?php
include('partials/header.php');

$db = new Database();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];

    if ($user->create($name, $email, $role, $password)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "<p style='color: red;'>This email is already in use.</p>";
    }
}
?>

<section>
    <h1>Add User</h1>
    <form class="contact-admin" id="user" action="" method="POST">
        <input type="text" placeholder="Name" id="name" name="name" required><br>
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

<?php
include('partials/footer.php');
?>