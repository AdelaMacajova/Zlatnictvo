<?php 
include ("partials/header.php");

$db = new Database();
$pdo = $db->getConnection();

$stmt = $pdo->prepare("SELECT * FROM products");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['add_to_cart'])) {
    $productId = $_GET['add_to_cart'];
    $_SESSION['cart'][$productId] = ($_SESSION['cart'][$productId] ?? 0) + 1;
    header('Location: shop.php');
    exit;
}
?>

<h1 class="ml3" style="text-align: center;">Browse Products</h1>

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
    <div class="shop-item" data-category="<?php echo $pro['category']; ?>">
        <img src="<?php echo $pro['url']; ?>">
        <label><?php echo $pro['name']."<br>".$pro['price']."€"; ?></label><br>
        <!--Pridanie produktu do košíka-->
        <form action="add_to_cart.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $pro['id']; ?>">
        <button type="submit" class="add-to-cart-button">+ Add to cart</button>
        </form>
    </div>
<?php endforeach; ?>
</div>

<!--
<body>
    <h1 class="ml3" style="text-align: center;">Browse Products</h1>

    <div class="filter-box">
        <label class="filter-label">Filter by category</label>
        <div class="filter-row">
            <button class="filter-button" data-category="all">All</button>
            <button class="filter-button" data-category="rings">Rings</button>
            <button class="filter-button" data-category="bracelets">Bracelets</button>
            <button class="filter-button" data-category="earrings">Earrings</button>
            <button class="filter-button" data-category="earrings">Necklaces</button>
        </div>
        <label class="filter-label">Filter by material</label>
        <div class="filter-row">
            <button class="filter-button" data-category="dia">Diamond</button>
            <button class="filter-button" data-category="gem">Gemstone</button>
            <button class="filter-button" data-category="pearl">Pearl</button>
            <button class="filter-button" data-category="other">Other</button>
        </div>
    </div>
    <br>
    <div style="margin: 0% 21% 0% 21%">
        <h3 style="text-align: center; border-bottom: 2px solid rgb(225, 190, 125);">
            Rings
        </h3>
    </div>
    <div class="content-row">
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/amethyst.png">
            <label>Amethyst</label>
        </div>
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/sapphire.png">
            <label>Sapphire</label>
        </div>
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/aquamarine.png">
            <label>Aquamarine</label>
        </div>
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/jade.png">
            <label>Jade</label>
        </div>
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/emerald.png">
            <label>Emerald</label>
        </div>
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/peridot.png">
            <label>Peridot</label>
        </div>
    </div>
    <div class="content-row">
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/onyx.png">
            <label>Onyx</label>
        </div>
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/quartz.png">
            <label>Quartz</label>
        </div>
        <div class="shop-item" data-category="rings pearl">
            <img src="assets/images/gemstoned_rings/pearl.png">
            <label>Pearl</label>
        </div>
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/ruby.png">
            <label>Ruby</label>
        </div>
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/citrine.png">
            <label>Citrine</label>
        </div>
        <div class="shop-item" data-category="rings gem">
            <img src="assets/images/gemstoned_rings/amber.png">
            <label>Amber</label>
        </div>
    </div>
    <div class="content-row">
        <div class="shop-item" data-category="rings dia">
            <img src="assets/images/diamond_rings/dia1.png">
            <label>Diamond</label>
        </div>
        <div class="shop-item" data-category="rings dia">
            <img src="assets/images/diamond_rings/dia2.png">
            <label>Diamond</label>
        </div>
        <div class="shop-item" data-category="rings dia">
            <img src="assets/images/diamond_rings/dia3.png">
            <label>Diamond</label>
        </div>
        <div class="shop-item" data-category="rings dia">
            <img src="assets/images/diamond_rings/dia4.png">
            <label>Diamond</label>
        </div>
        <div class="shop-item" data-category="rings dia">
            <img src="assets/images/diamond_rings/dia5.png">
            <label>Diamond</label>
        </div>
        <div class="shop-item" data-category="rings dia">
            <img src="assets/images/diamond_rings/dia6.png">
            <label>Diamond</label>
        </div>
    </div>

    <br>
    <div style="margin: 0% 21% 0% 21%">
        <h3 style="text-align: center; border-bottom: 2px solid rgb(225, 190, 125);">
            Bracelets
        </h3>
    </div>

    <br>
    <div style="margin: 0% 21% 0% 21%">
        <h3 style="text-align: center; border-bottom: 2px solid rgb(225, 190, 125);">
            Earrings
        </h3>
    </div>

    <br>
    <div style="margin: 0% 21% 0% 21%">
        <h3 style="text-align: center; border-bottom: 2px solid rgb(225, 190, 125);">
            Necklaces
        </h3>
    </div>
</body>
-->
<?php 
include ("partials/footer.php");
?>