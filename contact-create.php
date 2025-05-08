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
      header("Location: admin.php");
      exit;
    } else {
        echo "Error: Error creating contact.";
    }
  }
?>

<section>
<h1>New Contact</h1>
    <form class="contact-admin" id="contact" action="" method="POST">
        <input type="text" placeholder="Name" id ="name" name="name" required><br>
        <input type="email" placeholder="Email" id="email" name="email" required><br>
        <input type="text" placeholder="Subject" id="subject" name="subject" required><br>
        <textarea placeholder="Message" id="message" name="message" ></textarea><br>
        <input type="submit" value="Send">
    </form>

</section>
<br>

<?php
include('partials/footer.php');
?>