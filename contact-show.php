<?php
include('partials/header.php');
$db = new Database();
$contact = new Contact($db);

$role = $_SESSION['role'];
if ($role !== 0) {
  header('Location: login.php');
  exit;
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $contactData = $contact->show($id);
}

?>

<section class="ml3 show">
    <h1>Contact</h1>
    
    <table>
        <tr>
            <th class="admin-table">Name</th>
            <th class="admin-table">Email</th>
            <th class="admin-table">Subject</th>
            <th class="admin-table">Message</th>
        </tr>
        <tr>
            <td class="admin-table"><?= $contactData['name'] ?></td>
            <td class="admin-table"><?= $contactData['email'] ?></td>
            <td class="admin-table"><?= $contactData['subject'] ?></td>
            <td class="admin-table"><?= $contactData['message'] ?></td>
        </tr>
    </table>
    <br>
    <a class="underline" href="admin.php"><strong>Return</strong></a>
</section>
<br>
<?php
include('partials/footer.php');
?>