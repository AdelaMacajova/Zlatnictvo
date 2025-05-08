<?php
include('partials/header.php');

$db = new Database();
$user = new User($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $userData = $user->show($id);
}
?>

<section>
    <h1>User</h1>
    <?php if ($userData): ?>
        <p>Name: <?= htmlspecialchars($userData['name']) ?></p>
        <p>Email: <?= htmlspecialchars($userData['email']) ?></p>
        <p>Role: <?= $userData['role'] == 0 ? 'Admin' : 'User' ?></p>
        <a style="text-decoration:underline!important;" href="admin.php">Return</a>
    <?php else: ?>
        <p>User not found.</p>
        <a style="text-decoration:underline!important;" href="admin.php">Return</a>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>