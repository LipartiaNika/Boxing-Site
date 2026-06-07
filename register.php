<?php include 'header.php'; include 'config/db.php'; $msg=''; $err='';
if(isset($_POST['register'])){
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $check=mysqli_query($conn,"SELECT id FROM users WHERE email='$email'");
    if(mysqli_num_rows($check)>0){ $err='ეს Email უკვე რეგისტრირებულია'; }
    else{
        mysqli_query($conn,"INSERT INTO users(username,email,password,role) VALUES('$username','$email','$password','user')");
        $msg='რეგისტრაცია წარმატებით დასრულდა. ახლა შედი სისტემაში.';
    }
}
?>
<div class="container"><h1>რეგისტრაცია</h1>
<form class="form" method="POST">
<?php if($msg): ?><div class="alert"><?= $msg ?></div><?php endif; ?>
<?php if($err): ?><div class="alert error"><?= $err ?></div><?php endif; ?>
<input name="username" placeholder="მომხმარებელი" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="პაროლი" required>
<button class="btn" name="register">რეგისტრაცია</button>
</form></div>
<?php include 'footer.php'; ?>
