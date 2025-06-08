<?php
    include('partials/header.php');
        
    $db = new Database();
    $contact = new Contact($db);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        if ($contact->create($name, $email, $subject, $message)) {
        header('Location: thankyou.php');
        exit;
        } else {
            echo "Error: Contact Error";
        }
    }
?>
    <div class="content-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    <h3>Contact Us</h3>
                    <div>
                        <form name="contactform" id="contactform" action="" method="POST">
                            <p><input type="text" id="name" name="name" placeholder="Your Name" required></p>
                            <p><input type="email" id="email" name="email" placeholder="Your Email" required></p>
                            <p><input type="text" id="subject" name="subject" placeholder="Subject" required></p>
                            <p><textarea type="text" id="message" name="message"  placeholder="Message" required></textarea></p>
                            <input type="submit" class="mainBtn" id="submit" name="submit" value="Send Message">
                        </form>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 map-wrapper">
                    <h3 class="widget-title">Our Location</h3>
                    <div class="map-holder"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1589.7061644651753!2d17.112410023786463!3d48.129838880956555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c89360aca6197%3A0x631f9b82fd884368!2sBratislava!5e0!3m2!1ssk!2ssk!4v1741629750609!5m2!1ssk!2ssk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php
   include('partials/footer.php')
   ?>