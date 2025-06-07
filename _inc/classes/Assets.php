<?php
class Assets{

    public function add_scripts(){
        echo('<script src="assets/js/vendor/jquery-1.10.1.min.js"></script>'.
             '<script src="assets/js/accordion.js"></script>'.
             '<script src="assets/js/bootstrap.js"></script>'.
             '<script src="assets/js/jquery.easing-1.3.js"></script>'.
             '<script src="assets/js/main.js"></script>'.
             '<script src="assets/js/plugins.js"></script>'.
             '<script src="assets/js/filter.js"></script>');
    }
    public function add_stylesheets(){
        echo('<link rel="stylesheet" href="assets/css/accordion.css">'.
             '<link rel="stylesheet" href="assets/css/animate.css">'.
             '<link rel="stylesheet" href="assets/css/banner.css">'.
             '<link rel="stylesheet" href="assets/css/bootstrap.css">'.
             '<link rel="stylesheet" href="assets/css/font-awesome.min.css">'.
             '<link rel="stylesheet" href="assets/css/normalize.min.css">'.
             '<link rel="stylesheet" href="assets/css/misc.css">'.
             '<link rel="stylesheet" href="assets/css/style.css">');

    }
}
?>