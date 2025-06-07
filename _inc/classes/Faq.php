<?php

class Faq{

    private $faqItems = [
        ["question" => "Are our products - crafted with real gold and genuine gemstones - truly authentic?", "answer" => "Yes, absolutely. Every piece of jewelry we offer is made using only pure gold and carefully selected natural gemstones. We are committed to quality, and that means no imitations, no shortcuts — just real, beautiful materials you can trust. Whether it's a gift or a personal treasure, you're getting something authentic, valuable, and made to last."],
        ["question" => "Is our jewelry suitable for special occasions and everyday elegance?", "answer" => "Definitely. Whether you're celebrating a milestone or simply adding a touch of luxury to your daily look, our pieces are designed to shine in every moment — timeless, elegant, and versatile."],
        ["question" => "Do we use ethical and responsibly sourced materials?", "answer" => "Yes, we care deeply about where our materials come from. All our gold and gemstones are ethically sourced from trusted suppliers, so you can wear your jewelry with pride and peace of mind."]
    ];

    public function addFaq(){
        return $this->faqItems;
    }
}
?>
