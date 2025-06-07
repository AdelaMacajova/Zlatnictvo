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

    /*
    ine riesenie:
    class Menu{
        private $menuItems;

        public function __construct($menuItems = []){
            if(empty($menuItems)){
                $menuItems = [
                    ["label"=> "Domov","link"=> "index.php"],
                    ["label"=> "Details","link"=> "product-detail.php"],
                    ["label"=> "Contact","link"=> "contact.php"],
                    ["label"=> "Faqs","link"=> "faq.php"],
                    ["label"=> "About","link"=> "#about-us"],
                ];
            }
            $this->menuItems = $menuItems;
        }
        public function getMenuItems(){
            return $this->menuItems;
        }
    }*/

?>