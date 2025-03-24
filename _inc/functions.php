<?php

function get_menu(array $pages){
    $menuItems = '';
    foreach($pages as $page_name => $page_url){
        //Pre každú stránku pridá odkaz do navigačného menu
        $menuItems .='<li><a href="' . $page_url . '">' . $page_name . '</a></li>';

    }
    // Vráti vygenerovaný HTML kód pre navigačné menu
    return $menuItems;

}

function add_scripts(){
    echo '<script src ="js/vendor/jquery-1.10.1.min.js"></script>';
    echo '<script src ="js/bootstrap.js"></script>';
    echo '<script src ="js/jquery.easing-1.3.js"></script>';
    echo '<script src ="js/plugins.js"></script>';
    echo '<script src ="js/main.js"></script>';
    
    $page_name = basename($_SERVER["SCRIPT_NAME"],'.php');
    switch($page_name){
        case 'faq':
            echo('<script src ="js/accordion.js"></script>');
            break;
    }

}

function add_stylesheets(){
    echo '<link rel="stylesheet" href="css/bootstrap.css">';
    echo '<link rel="stylesheet" href="css/normalize.min.css">';
    echo '<link rel="stylesheet" href="css/font-awesome.min.css">';
    echo '<link rel="stylesheet" href="css/animate.css">';
    echo '<link rel="stylesheet" href="css/templatemo-misc.css">';
    echo '<link rel="stylesheet" href="css/templatemo-style.css">';
    echo '<link rel="stylesheet" href="css/banner.css">';
    echo '<link rel="stylesheet" href="css/accordion.css">';
    
    $page_name = basename($_SERVER["SCRIPT_NAME"],'.php');
    switch($page_name){
        case 'index':
            echo '<link rel="stylesheet" href="css/banner.css">';
            break;
        case 'faq':
            echo '<link rel="stylesheet" href="css/accordion.css">';
            break;
    }
}


?>