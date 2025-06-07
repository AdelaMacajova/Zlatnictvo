<?php
include('partials/header.php');

$db = new Database();
$product = new Product($db);

$role = $_SESSION['role'];
if ($role !== 0) {
  header('Location: login.php');
  exit;
}

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $productData = $product->show($product_id);

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

<?php 
if (isset($productData['url'])) {
    echo '<div class="product-show"><div class="shop-item">'.'<img src="'.$productData["url"].'">'.
        '<label>'.$productData["name"].'<br>'.$productData['price'].'€ </label></div></div>';
}
?>
<a class="product-show-return underline" href="admin.php">Return</a>
<br>
</div>
<?php
include('partials/footer.php');
?>