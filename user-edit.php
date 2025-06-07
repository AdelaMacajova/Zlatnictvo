<?php
include('partials/header.php');

$db = new Database();
$user = new User($db);

$role = $_SESSION['role'];
if ($role !== 0) {
  header('Location: login.php');
  exit;
}

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $userData = $user->show($user_id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        if ($user->edit($user_id, $name, $surname, $email, null, $role)) {
            header("Location: admin.php");
            exit;
        } else {
            echo "<p>Email already in use.</p>";
        }
    }
}
?>

<section class="ml3">
    <h1>Edit User</h1>
    <form class="contact-admin" id="user" action="" method="POST">
        <input type="text" id="name" name="name" value="<?php echo $userData['name'];?>" required><br>
        <input type="text" id="surname" name="surname" value="<?php echo $userData['surname'];?>" required><br>
        <input type="email" id="email" name="email" value="<?php echo $userData['email'];?>" required><br>

        <select id="role" name="role" required>
            <option value="0" <?= $userData['role'] == 0 ? 'selected' : '' ?>>Admin</option>
            <option value="1" <?= $userData['role'] == 1 ? 'selected' : '' ?>>User</option>
        </select><br>

        <input type="submit" value="Submit">
    </form>
</section>
<br>
<?php
include('partials/footer.php');
?>