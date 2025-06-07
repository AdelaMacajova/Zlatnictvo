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
<h1 class="ml3">Edit Product</h1>
<div class="product-edit-content">
    <?php 
    if (isset($productData['url'])) {
        echo '<div class="content-row"><div class="shop-item">'.'<img src="'.$productData["url"].'">'.
            '<label>'.$productData["name"].'<br>'.$productData['price'].'€ </label></div></div>';
    }
    ?>

    <form style="margin-top:12px;" class="contact-admin" method="POST">
        <input type="text" placeholder="Name" name="name" value="<?php echo($productData['name']);?>">
        <input type="text" placeholder="assets/images/" name="url" value="<?php echo($productData['url']);?>">
        <input type="text" placeholder="Categories" name="category" title="e.g. ring, diamond, gemstone..." value="<?php echo($productData['category']);?>">
        <input type="text" placeholder="Price" name="price" value="<?php echo($productData['price']);?>">
        <button type="submit">Submit</button>
    </form>
    <br>
</div>
<?php
include('partials/footer.php');
?>