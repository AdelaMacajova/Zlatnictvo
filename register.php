<?php
include('partials/header.php');

$db = new Database();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirm'] ?? '';

    if (empty($name) || empty($surname) || empty($email) || empty($password) || empty($confirm)) {
        $error = 'Please fill in all fields.';
    } elseif ($password !== $confirm) {
        $error = 'Passwords do not match.';
    } elseif (!$user->create($name, $surname, $email, $password, 1)) {
        $error = 'Email already exists.';
    } else {
        header("Location: login.php");
        exit;
    }
}
?>

<section class="ml3 contact-admin">
    <h2>Register</h2>
    <?php if (isset($error)): ?>
        <div><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="text" placeholder="Name" name="name" required><br>
        <input type="text" placeholder="Surname" name="surname" required><br>
        <input type="email" placeholder="Email" name="email" required><br>
        <input type="password" placeholder="Password" name="password" required><br>
        <input type="password" placeholder="Confirm Password" name="confirm" required><br>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</section>

<?php
include('partials/footer.php');
?>