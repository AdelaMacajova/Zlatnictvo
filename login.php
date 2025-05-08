<?php
session_start();
include('partials/header.php');

$db = new Database();
$auth = new Auth($db);

if($_SERVER['REQUEST_METHOD']==='POST'){
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    if($auth->login($email,$password)){
        header('Location: admin.php');
        exit;
    }else{
        $error = 'Incorrect name or password.';
    }
}
?>
<section class="ml3 contact-admin">
    <h2>Login</h2>
    <?php if(isset($error)):?>
        <div>
            <?php echo $error; ?>
        </div>
    <?php endif;?>

    <form method="POST" >
        <input type="email" id="email" placeholder="Email" name="email" required><br>
        <input type="password" id="password" placeholder="Password" name="password" required><br>
        <button type="submit" class="">Login</button>
    </form>

</section>
<?php
include('partials/footer.php');
?>