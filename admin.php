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

$order = new Order($db);
$orders = $order->index();

if (isset($_GET['delete_order'])) {
    $order->destroy($_GET['delete_order']);
    header("Location: admin.php");
    exit;
}

if (isset($_GET['delete_contact'])) {
    $contact->destroy($_GET['delete_contact']);
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
<hr>
<div class="admin-nav">
    <a class="admin-nav-options" href="#products">Products</a>
    <a class="admin-nav-options" href="#users">Users</a>
    <a class="admin-nav-options" href="#orders">Orders</a>
    <a class="admin-nav-options" href="#contacts">Contacts</a>
</div>
<hr>
<br>
<section class="ml3">
    <a id="products" href="product-create.php" class="new-contact ml3">+ New Product</a>
    <table>
        <tr>
            <th class="admin-table">Name</th>
            <th class="admin-table">URL</th>
            <th class="admin-table">Material</th>
            <th class="admin-table">Type</th>
            <th class="admin-table">Price</th>            
            <th class="admin-table">Delete</th>
            <th class="admin-table">Edit</th>
            <th class="admin-table">Show</th>
        </tr>
        <?php foreach($products as $pro){
            echo '<tr>';
            echo '<td class="admin-table">'.$pro['name'].'</td>';
            echo '<td class="admin-table">'.$pro['url'].'</td>';
            echo '<td class="admin-table">'.$pro['material'].'</td>';
            echo '<td class="admin-table">'.$pro['type'].'</td>';
            echo '<td class="admin-table">'.$pro['price'].'€ </td>';
            echo '<td class="admin-table"><a href="?delete_product='.$pro['product_id'].'" 
            onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</a></td>';
            echo '<td class="admin-table"><a href="product-edit.php?product_id='.$pro['product_id'].'" ">Edit</a></td>';
            echo '<td class="admin-table"><a href="product-show.php?product_id='.$pro['product_id'].'" ">Show</a></td>';
            echo '</tr>';
        } 
?>

    </table>
    </table>
    <br>
</section>
<br>
<section class="ml3">
<?php if ($userRole == 0): ?>
        <a id="users" href="user-create.php" class="new-contact">+ New User</a>
        <table>
            <tr>
                <th class="admin-table">ID</th>
                <th class="admin-table">Name</th>
                <th class="admin-table">Surname</th>
                <th class="admin-table">Email</th>
                <th class="admin-table">Role</th>
                <th class="admin-table">Delete</th>
                <th class="admin-table">Edit</th>
                <th class="admin-table">Show</th>
            </tr>
            <?php foreach($users as $u): ?>
                <tr>
                    <td class="admin-table"><?= htmlspecialchars($u['user_id']) ?></td>
                    <td class="admin-table"><?= htmlspecialchars($u['name']) ?></td>
                    <td class="admin-table"><?= htmlspecialchars(string: $u['surname']) ?></td>
                    <td class="admin-table"><?= htmlspecialchars($u['email']) ?></td>
                    <td class="admin-table"><?= htmlspecialchars($u['role']) ?></td>
                    <td class="admin-table"><a href="?delete_user=<?= $u['user_id'] ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a></td>
                    <td class="admin-table"><a href="user-edit.php?user_id=<?= $u['user_id'] ?>">Edit</a></td>
                    <td class="admin-table"><a href="user-show.php?user_id=<?= $u['user_id'] ?>">Show</a></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</section>
<br>
<section class="ml3">
    <a id="orders" class="new-contact">Orders</a>
    <table>
        <tr>
            <th class="admin-table">Order ID</th>
            <th class="admin-table">User ID</th>
            <th class="admin-table">Payment Method</th>
            <th class="admin-table">Shipping Method</th>
            <th class="admin-table">Created At</th>            
            <th class="admin-table">Delete</th>
        </tr>
        <?php foreach($orders as $ord){
            echo '<tr>';
            echo '<td class="admin-table">'.$ord['order_id'].'</td>';
            echo '<td class="admin-table">'.$ord['user_id'].'</td>';
            echo '<td class="admin-table">'.$ord['payment_method'].'</td>';
            echo '<td class="admin-table">'.$ord['shipping_method'].'</td>';
            echo '<td class="admin-table">'.$ord['created_at'].'</td>';
            echo '<td class="admin-table"><a href="?delete_order='.$ord['order_id'].'" 
            onclick="return confirm(\'Are you sure you want to delete this order?\')">Delete</a></td>';
        } 
        ?>

    </table>
    </table>
    <br>
</section>
<section class="ml3">
    <a id="contacts" class="new-contact">Contacts</a>
    <table>
        <tr>
            <th class="admin-table">ID</th>
            <th class="admin-table">Name</th>
            <th class="admin-table">Email</th>
            <th class="admin-table">Subject</th>
            <th class="admin-table">Message</th>            
            <th class="admin-table">Delete</th>
        </tr>
        <?php foreach($contacts as $con){
            echo '<tr>';
            echo '<td class="admin-table">'.$con['ID'].'</td>';
            echo '<td class="admin-table">'.$con['name'].'</td>';
            echo '<td class="admin-table">'.$con['email'].'</td>';
            echo '<td class="admin-table">'.$con['subject'].'</td>';
            echo '<td class="admin-table">'.$con['message'].'</td>';
            echo '<td class="admin-table"><a href="?delete_contact='.$con['ID'].'" 
            onclick="return confirm(\'Are you sure you want to delete this message?\')">Delete</a></td>';
            echo '</tr>';
        } 
        ?>

    </table>
    </table>
    <br>
</section>
<?php
include('partials/footer.php');
?>