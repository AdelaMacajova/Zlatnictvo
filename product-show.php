<?php
include('partials/header.php');

$db = new Database();
$product = new Product($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $productData = $product->show($id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $url = $_POST['url'];
        $category = $_POST['category'];
        $price = $_POST['price'];

        if ($product->edit($id, $name, $url, $category, $price)) {
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
<a class="product-show-return" href="admin.php">Return</a>
<br>
</div>
<?php
include('partials/footer.php');
?>