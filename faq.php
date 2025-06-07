<?php
    include('partials/header.php');

    $faq = new Faq();
    $faqItems = $faq->addFaq();

    echo '<h1 class="ml3">Frequently Asked Questions</h1>';
    foreach($faqItems as $item){
        echo('<div class="accordion">'.
            '<div class="question">'.$item['question'].'</div>'.
            '<div class="answer">'.$item['answer'].'</div></div>');
    }

include('partials/footer.php');
?>