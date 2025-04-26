<?php
    require_once('_inc/functions.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<!-- 
Kool Store Template
http://www.templatemo.com/preview/templatemo_428_kool_store
-->
    <meta charset="utf-8">
    <title>LUXGOLD</title>

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="gold, diamond, ruby, emerald, citrine, rings, bracelet, jewelery, earrings, gemstone, luxury, luxgold, rich">

    <!--POVODNA NEFUNKCNA MAPA<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet">-->

    <!--CSS LINKY KTORE MOZEM VYMAZAT, JE TO CEZ FUNKCIU
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/templatemo-misc.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/accordion.css">-->
    <?php
        add_stylesheets();
    ?>

    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

</head>
<body>
    <!--[if lt IE 7]>
    <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->

    
    <header class="site-header">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="top-header-left">
                            <a href="#">Sign Up</a>
                            <a href="#">Log In</a>
                        </div> <!-- /.top-header-left -->
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-6">
                        <div class="social-icons">
                            <ul>
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
                                    $pages = array('Home'=> 'index.php', 'FAQs'=>'faq.php', 'About'=>'#about-us');
                                    echo (get_menu($pages));
                                ?>
                                <!--<li><a href="#">Home</a></li>
                                <li><a href="#">Catalogs</a></li>
                                <li><a href="#">FAQs</a></li>
                                <li><a href="#">Policies</a></li>
                                <li><a href="#">About</a></li>-->
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
                                    $pages = array('Shop'=> 'index.php', 'Details' => 'product-detail.php', 'Contact'=>'contact.php');
                                    echo (get_menu($pages));
                                ?>
                                <!--<li><a href="index.php">Shop</a></li>
                                <li><a href="product-detail.php">Details</a></li>
                                <li><a href="contact.php">Contact</a></li>-->
                            </ul>
                        </div> <!-- /.list-menu -->
                    </div> <!-- /.col-md-6 -->
                    <div class="col-md-6 col-sm-5">
                        <div class="notification">
                            <span>Free Shipping on any order above 950€</span>
                        </div>
                    </div> <!-- /.col-md-6 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.main-nav -->
    </header> <!-- /.site-header -->