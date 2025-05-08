<?php
    class Menu{
        
    public function getLowerMenuItems(){
        return [
            ["label"=> "Home","url"=> "index.php"],
            ["label"=> "Details","url"=> "product-detail.php"],
            ["label"=> "Contact","url"=> "contact.php"],
        ];
    }
    public function getUpperMenuItems(){
        return [
            ["label"=> "Home","url"=> "index.php"],
            ["label"=> "FAQ","url"=> "faq.php"],
            ["label"=> "About Us","url"=> "#about-us"],
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