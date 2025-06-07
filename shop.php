<?php 
include ("partials/header.php");

$db = new Database();
$conn = $db->getConnection();

$stmt = $conn->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1 class="ml3 center">Browse Products</h1>

<div class="filter-box">
    <label class="filter-label">Filter by category</label>
    <div class="filter-row">
        <button class="filter-button" data-category="all">All</button>
        <button class="filter-button" data-category="ring">Rings</button>
        <button class="filter-button" data-category="bracelet">Bracelets</button>
        <button class="filter-button" data-category="earrings">Earrings</button>
        <button class="filter-button" data-category="necklace">Necklaces</button>
    </div>
    <label class="filter-label">Filter by material</label>
    <div class="filter-row">
        <button class="filter-button" data-category="diamond">Diamond</button>
        <button class="filter-button" data-category="gemstone">Gemstone</button>
        <button class="filter-button" data-category="pearl">Pearl</button>
        <button class="filter-button" data-category="other">Other</button>
    </div>
</div>
<hr>
<div class="content-row">
<?php foreach ($products as $pro): ?>
    <div class="shop-item" data-category="<?php echo $pro['material'].' '.$pro['type']; ?>">
        <img src="<?php echo $pro['url']; ?>">
        <label><?php echo $pro['name']."<br>".$pro['price']."€"; ?></label><br>
        <!--Pridanie produktu do košíka-->
        <form action="add_to_cart.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $pro['product_id']; ?>">
        <button type="submit" class="add-to-cart-button">+ Add to cart</button>
        </form>
    </div>
<?php endforeach; ?>
</div>
<?php 
include ("partials/footer.php");
?>