<?php
include('partials/header.php');

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 0) {
    header('Location: login.php');
    exit;
}

$db = new Database();
$auth = new Auth($db);
$auth->requireLogin();

$userRole = $auth->getUserRole();

$product = new Product($db);
$products = $product->index();

$contact = new Contact($db);
$contacts = $contact->index();

if (isset($_GET['delete'])) {
    $contact->destroy($_GET['delete']);
    header("Location: admin.php");
    exit;
}

if (isset($_GET['delete_product'])) {
    $product->destroy($_GET['delete_product']);
    header("Location: admin.php");
    exit;
}

if ($userRole == 0) {
    $user = new User($db);
    $users = $user->index();
}
if (isset($_GET['delete_user'])) {
    $user->destroy($_GET['delete_user']);
    header("Location: admin.php");
    exit;
}
?>
<br>
<section class="ml3">
    <a href="product-create.php" class="new-contact ml3">+ New Product</a>
    <table>
        <tr>
            <th class="admin-table">Name</th>
            <th class="admin-table">URL</th>
            <th class="admin-table">Category</th>
            <th class="admin-table">Price</th>            
            <th class="admin-table">Delete</th>
            <th class="admin-table">Edit</th>
            <th class="admin-table">Show</th>
        </tr>
        <?php foreach($products as $pro){
            echo '<tr>';
            echo '<td class="admin-table">'.$pro['name'].'</td>';
            echo '<td class="admin-table">'.$pro['url'].'</td>';
            echo '<td class="admin-table">'.$pro['category'].'</td>';
            echo '<td class="admin-table">'.$pro['price'].'€ </td>';
            echo '<td class="admin-table"><a href="?delete_product='.$pro['id'].'" 
            onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a></td>';
            echo '<td class="admin-table"><a href="product-edit.php?id='.$pro['id'].'" ">Edit</a></td>';
            echo '<td class="admin-table"><a href="product-show.php?id='.$pro['id'].'" ">Show</a></td>';
            echo '</tr>';
        } 
?>

    </table>
    </table>
    <br>
</section>
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
<br>
<?php
include('partials/footer.php');
?>