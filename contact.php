<?php include 'header.php'; include 'config/db.php'; $msg='';
if(isset($_POST['send'])){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $message=mysqli_real_escape_string($conn,$_POST['message']);
    mysqli_query($conn,"INSERT INTO contacts(name,email,message) VALUES('$name','$email','$message')");
    $msg='შეტყობინება წარმატებით გაიგზავნა';
}
?>
<div class="container">
    <h1>კონტაქტი</h1>
    <form class="form" method="POST">
        <?php if($msg): ?><div class="alert"><?= $msg ?></div><?php endif; ?>
        <input name="name" placeholder="სახელი" required>
        <input type="email" name="email" placeholder="Email" required>
        <textarea name="message" placeholder="შეტყობინება" required></textarea>
        <button class="btn" name="send">გაგზავნა</button>
    </form>
</div>
<?php include 'footer.php'; ?>
