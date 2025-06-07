<?php
include('partials/header.php');

$db = new Database();
$product = new Product($db);

$role = $_SESSION['role'];
if ($role !== 0) {
  header('Location: login.php');
  exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productData = $product->show($id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $url = $_POST['url'];
        $material = $_POST['material'];
        $type = $_POST['type'];
        $price = $_POST['price'];

        if ($product->edit($product_id, $name, $url, $material, $type, $price)) {
            header("Location: admin.php");
            exit;
        }else {
            echo "Error editing product.";
        }
    }
}
?>
<h1 class="ml3">Edit Product</h1>
<div class="product-edit-content">
    <?php 
    if (isset($productData['url'])) {
        echo '<div class="content-row"><div class="shop-item">'.'<img src="'.$productData["url"].'">'.
            '<label>'.$productData["name"].'<br>'.$productData['price'].'€ </label></div></div>';
    }
    ?>
    <br>
    <form class="contact-admin" method="POST">
        <input type="text" placeholder="Name" name="name" value="<?php echo($productData['name']);?>">
        <input type="text" placeholder="assets/images/" name="url" value="<?php echo($productData['url']);?>">
        <select id="material" name="material" required>
            <option value="" disabled selected>Select material</option>
            <option value="gemstone">Gemstone</option>
            <option value="diamond">Diamond</option>
            <option value="pearl">Pearl</option>
            <option value="other">Other</option>
        </select><br>
                <select id="type" name="type" required>
            <option value="" disabled selected>Select type</option>
            <option value="ring">Ring</option>
            <option value="bracelet">Bracelet</option>
            <option value="earrings">Earrings</option>
            <option value="necklace">Necklace</option>
        </select><br>
        <input type="text" placeholder="Price" name="price" value="<?php echo($productData['price']);?>">
        <button type="submit">Submit</button>
    </form>
    <br>
</div>

<?php
include('partials/footer.php');
?>