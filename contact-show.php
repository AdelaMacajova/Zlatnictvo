<?php
include('partials/header.php');
$db = new Database();
$contact = new Contact($db);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contactData = $contact->show($id);
}

?>

<section>
    <h1>Contact</h1>
    <p>Name: <?php echo($contactData['name']);?></p>
    <p>Email: <?php echo($contactData['email']);?></p>
    <p>Subject: <?php echo($contactData['subject']);?></p>
    <p>Message: <?php echo($contactData['message']);?></p>
    <a style="text-decoration:underline!important;" href="admin.php"><strong>Return</strong></a>
</section>
<?php
include('partials/footer.php');
?>