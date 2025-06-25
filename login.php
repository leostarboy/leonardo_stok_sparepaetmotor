<?php
session_start();
include 'db/koneksi.php';

$msg = '';
if(isset($_POST['login'])){
  $user = $_POST['username'];
  $pass = $_POST['password'];

  $stmt = $koneksi->prepare("SELECT * FROM users WHERE username=? AND password=? LIMIT 1");
  $stmt->bind_param("ss", $user, $pass);
  $stmt->execute();
  $res = $stmt->get_result();
  if($res->num_rows){
     $row = $res->fetch_assoc();
     $_SESSION['user'] = ['id'=>$row['id'],'nama'=>$row['nama'],'username'=>$row['username']];
     header("Location: index.php");
     exit;
  }else{
     $msg = 'Username atau password salah!';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Login - NJM Sparepart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body{
      background: linear-gradient(135deg,#0d6efd 0%,#6610f2 100%);
      min-height:100vh;
      display:flex;
      align-items:center;
      justify-content:center;
      color:#fff;
    }
    .login-card{
      width:100%;
      max-width:380px;
      background:#fff;
      color:#000;
      border-radius:1rem;
      box-shadow:0 4px 12px rgba(0,0,0,.2);
      padding:2rem;
    }
  </style>
</head>
<body>
  <div class="login-card">
    <h4 class="text-center mb-4"><i class="bi bi-person-circle"></i> Login</h4>
    <?php if($msg): ?>
      <div class="alert alert-danger py-1"><?= $msg ?></div>
    <?php endif; ?>
    <form method="post">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required autofocus>
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
      </div>
      <button class="btn btn-primary w-100" name="login"><i class="bi bi-box-arrow-in-right"></i> Login</button>
    </form>
  </div>
</body>
</html>
