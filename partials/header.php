<?php
    session_start();
    include("_inc/autoload.php");
    $date = new Date();

    $cart_num = 0;
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $quantity) {
        $cart_num += $quantity;
    }
}
?>
<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title>LUXGOLD</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="gold, diamond, ruby, emerald, citrine, rings, bracelet, jewelery, earrings, gemstone, luxury, luxgold, rich">
    <?php
        $assets = new Assets();
        $assets->add_stylesheets();
    ?>
    <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
    <header class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="top-header-left">
                            <a href="login.php">Log In</a>
                            <a href="logout.php">Log Out</a>
                        </div> <!-- /.top-header-left -->
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-6">
                        <div class="social-icons">
                            <ul>
                                <li><a href="cart.php" class="cart-num"><?php echo '🛒'.$cart_num; ?></a></li>
                                <li><a href="https://www.facebook.com" class="fa fa-facebook"></a></li>
                                <li><a href="https://x.com/" class="fa fa-twitter"></a></li>
                                <li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div> <!-- /.social-icons -->
                    </div> <!-- /.col-md-6 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.top-header -->
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-8">
                        <div class="logo">
                            <h1><a href="#">LUXGOLD</a></h1>
                        </div> <!-- /.logo -->
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-8 col-sm-6 col-xs-4">
                        <div class="main-menu">
                            <a href="#" class="toggle-menu">
                                <i class="fa fa-bars"></i>
                            </a>
                            <ul class="menu">
                            <?php
                                $upperMenu = new Menu();
                                $upperMenuItems = $upperMenu->getUpperMenuItems();
                                foreach ($upperMenuItems as $umi) {
                                echo '<li><a href="' . $umi['url'] . '">' . $umi['label'] . '</a></li>';
                                }
                            ?>

                            </ul>
                        </div> <!-- /.main-menu -->
                    </div> <!-- /.col-md-8 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-header -->
        <div class="main-nav">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="list-menu">
                            <ul>
                            <?php
                                $lowerMenu = new Menu();
                                $lowerMenuItems = $lowerMenu->getLowerMenuItems();
                                foreach ($lowerMenuItems as $lmi) {
                                echo '<li><a href="' . $lmi['url'] . '">' . $lmi['label'] . '</a></li>';
                                }
                                ?>
                            </ul>
                        </div> <!-- /.list-menu -->
                    </div> <!-- /.col-md-6 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-nav -->
    </header> <!-- /.site-header -->