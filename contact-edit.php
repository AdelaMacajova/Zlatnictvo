<?php
include('partials/header.php');
$db = new Database();
$contact = new Contact($db);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contactData = $contact->show($id);
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        if ($contact->edit($id,$name, $email, $subject, $message)) {
          header("Location: admin.php");
          exit;
        } else {
            echo "Error editing contact.";
        }
      }
}
?>
<section>
    <h1>Edit Contact</h1>
    <form class="contact-admin" id="contact" action="" method="POST">
        <input type="text" id ="name" name="name" value="<?php echo($contactData['name']);?>" required><br>
        <input type="email" id="email" name="email" value="<?php echo($contactData['email']);?>"required><br>
        <input type="text" id="subject" name="subject" value="<?php echo($contactData['subject']);?>"required><br>
        <textarea id="message" name="message"><?php echo($contactData['message']);?></textarea><br>
        <input type="submit" value="Send">
    </form>
</section>
<br>

<?php
include('partials/footer.php');
?>