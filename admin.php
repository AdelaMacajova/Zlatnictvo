<?php
session_start();
include('partials/header.php');

$db = new Database();
$auth = new Auth($db);
$auth->requireLogin();

$userRole = $auth->getUserRole();

$contact = new Contact($db);
$contacts = $contact->index();

if (isset($_GET['delete'])) {
    $contact->destroy($_GET['delete']);
    header("Location: admin.php");
    exit;
}

if ($userRole == 0) {
    $user = new User($db);
    $users = $user->index();
}
?>

<br>
<section class="ml3">
    <a href="contact-create.php" class="new-contact ml3">+ New Contact</a>
    <table>
        <tr>
            <th class="admin-table">ID</th>
            <th class="admin-table">Name</th>
            <th class="admin-table">Email</th>
            <th class="admin-table">Subject</th>
            <th class="admin-table">Message</th>            
            <th class="admin-table">Delete</th>
            <th class="admin-table">Edit</th>
            <th class="admin-table">Show</th>
        </tr>
        <?php foreach($contacts as $con){
            echo '<tr>';
            echo '<td class="admin-table">'.$con['ID'].'</td>';
            echo '<td class="admin-table">'.$con['name'].'</td>';
            echo '<td class="admin-table">'.$con['email'].'</td>';
            echo '<td class="admin-table">'.$con['subject'].'</td>';
            echo '<td class="admin-table">'.$con['message'].'</td>';
            echo '<td class="admin-table"><a href="?delete='.$con['ID'].'" 
            onclick="return confirm(\'Are you sure you want to delete this message?\')">Delete</a></td>';
            echo '<td class="admin-table"><a href="contact-edit.php?id='.$con['ID'].'" ">Edit</a></td>';
            echo '<td class="admin-table"><a href="contact-show.php?id='.$con['ID'].'" ">Show</a></td>';
            echo '</tr>';
        } 
        ?>

    </table>
    </table>
    <br>
</section>

<section class="ml3">
<?php if ($userRole == 0): ?>
        <a href="user-create.php" class="new-contact">+ New User</a>
        <table>
            <tr>
                <th class="admin-table">ID</th>
                <th class="admin-table">Name</th>
                <th class="admin-table">Email</th>
                <th class="admin-table">Role</th>
                <th class="admin-table">Delete</th>
                <th class="admin-table">Edit</th>
                <th class="admin-table">Show</th>
            </tr>
            <?php foreach($users as $u): ?>
                <tr>
                    <td class="admin-table"><?= htmlspecialchars($u['id']) ?></td>
                    <td class="admin-table"><?= htmlspecialchars($u['name']) ?></td>
                    <td class="admin-table"><?= htmlspecialchars($u['email']) ?></td>
                    <td class="admin-table"><?= htmlspecialchars($u['role']) ?></td>
                    <td class="admin-table"><a href="?delete_user=<?= $u['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
                    <td class="admin-table"><a href="user-edit.php?id=<?= $u['id'] ?>">Edit</a></td>
                    <td class="admin-table"><a href="user-show.php?id=<?= $u['id'] ?>">Show</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</section>

<?php
include('partials/footer.php');
?>