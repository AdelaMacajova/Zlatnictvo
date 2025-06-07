<?php
include ("partials/header.php");
if (empty($_SESSION['cart'])) {
    header('Location: shop.php');
    exit;
}
//TODO Nedokoncene (pridat tabulku orders a ukladat ich)
$_SESSION['cart'] = [];
?>
<body>
    <h1>Thank you for your purchase!</h1>
    <a style="text-decoration:underline!important;" href="shop.php">Return</a>
</body>
<?php
include ("partials/footer.php");
?>