<?php
    class Menu{
        private $lowerMenuItems;
        private $upperMenuItems;

    public function getLowerMenuItems(){
        return [
            ["label"=> "Home","url"=> "index.php"],
            ["label"=> "Shop","url"=> "shop.php"],
            ["label"=> "Contact","url"=> "contact.php"]
        ];
    }
    public function getUpperMenuItems(){
        return [
            ["label"=> "Home","url"=> "index.php"],
            ["label"=> "FAQ","url"=> "faq.php"],
            ["label"=> "About Us","url"=> "#about-us"],
            ["label"=> "Cart","url"=> "cart.php"]
        ];
    } 
}
?>