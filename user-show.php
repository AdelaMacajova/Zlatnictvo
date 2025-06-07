<?php
include('partials/header.php');

$db = new Database();
$user = new User($db);

$userData = null;

$role = $_SESSION['role'];
if ($role !== 0) {
  header('Location: login.php');
  exit;
}

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $userData = $user->show($user_id);
}
?>
<section class="ml3 show">
    <h1>User</h1>
    <?php if ($userData): ?>
        <table>
            <tr>
                <th class="admin-table">Name</th>
                <th class="admin-table">Surname</th>
                <th class="admin-table">Email</th>
                <th class="admin-table">Role</th>
            </tr>
            <tr>
                <td class="admin-table"><?= htmlspecialchars($userData['name']) ?></td>
                <td class="admin-table"><?= htmlspecialchars($userData['surname']) ?></td>
                <td class="admin-table"><?= htmlspecialchars($userData['email']) ?></td>
                <td class="admin-table"><?= $userData['role'] == 0 ? 'Admin' : 'User' ?></td>
            </tr>
        </table>
        <br>
        <a class="underline" href="admin.php">Return</a>
    <?php else: ?>
        <p>User not found.</p>
        <br>
        <a class="underline" href="admin.php">Return</a>
    <?php endif; ?>
</section>
<br>

<?php
include('partials/footer.php');
?>