<?php
include('partials/header.php');

$db = new Database();
$auth = new Auth($db);
$auth->requireLogin();

$product = new Product($db);

$role = $_SESSION['role'];
if ($role !== 0) {
  header('Location: login.php');
  exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $url = $_POST['url'] ?? '';
    $material = $_POST['material'] ?? '';
    $type = $_POST['type'] ?? '';
    $price = $_POST['price'] ?? '';

    if ($name && $url && $material && $type && $price) {
        $product->store($name, $url, $material, $type, $price);
        header("Location: admin.php");
        exit;
    } else {
        echo "<p>All fields are required.</p>";
    }
}
?>

<h1 class="ml3">New Product</h1>
<form class="contact-admin ml3" method="POST">
    <input type="text" placeholder="Name" name="name">
    <input type="text" placeholder="assets/images/" name="url">
    <select id="material" name="material" required>
        <option value="" disabled selected>Select material</option>
        <option value="gemstone">Gemstone</option>
        <option value="diamond">Diamond</option>
        <option value="pearl">Pearl</option>
        <option value="other">Other</option>
    </select>
    <br>
    <select id="type" name="type" required>
        <option value="" disabled selected>Select type</option>
        <option value="ring">Ring</option>
        <option value="bracelet">Bracelet</option>
        <option value="earrings">Earrings</option>
        <option value="necklace">Necklace</option>
    </select>
    <br>
    <input type="text" placeholder="Price" name="price">
    <button type="submit">Submit</button>
</form>
<br>
<?php include('partials/footer.php'); ?>