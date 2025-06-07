<?php
include('partials/header.php');

$db = new Database();
$auth = new Auth($db);
$auth->requireLogin();

$product = new Product($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $url = $_POST['url'] ?? '';
    $category = $_POST['category'] ?? '';
    $price = $_POST['price'] ?? '';

    if ($name && $url && $category && $price) {
        $product->store($name, $url, $category, $price);
        header("Location: admin.php");
        exit;
    } else {
        echo "<p>All fields are required.</p>";
    }
}
?>

<form class="contact-admin" method="POST">
    <input type="text" placeholder="Name" name="name">
    <input type="text" placeholder="assets/images/" name="url">
    <input type="text" placeholder="Categories" name="category" title="e.g. ring, diamond, gemstone...">
    <input type="text" placeholder="Price" name="price">
    <button type="submit">Submit</button>
</form>
<br>
<?php include('partials/footer.php'); ?>