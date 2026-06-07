<?php include 'header.php'; include 'config/db.php'; $err='';
if(isset($_POST['login'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=$_POST['password'];
    $result=mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $user=mysqli_fetch_assoc($result);
    if($user && password_verify($password,$user['password'])){
        $_SESSION['user']=$user['username'];
        $_SESSION['role']=$user['role'];
        header('Location: index.php'); exit;
    } else { $err='Email ან პაროლი არასწორია'; }
}
?>
<div class="container"><h1>შესვლა</h1>
<form class="form" method="POST">
<?php if($err): ?><div class="alert error"><?= $err ?></div><?php endif; ?>
<p class="small">Admin: admin@boxing.ge / admin123</p>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="პაროლი" required>
<button class="btn" name="login">შესვლა</button>
</form></div>
<?php include 'footer.php'; ?>
