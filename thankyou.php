<?php
        include('partials/header.php');
    ?>

    <main>
        <div class="thankyou">
        <?php
              if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $contact_name = $_POST['name'];
                if (empty($contact_name)) {
                  echo"Empty contact name";
                }else {
                  echo "<h2>$contact_name Thank You!</h2>";
                }
              }
            ?>
        </div>
    </main>
<?php
        include('partials/footer.php');
    ?>