<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $admins = unserialize(file_get_contents(__DIR__ . './admins'));
  foreach ($admins as $admin) {
    if ($admin['email'] === $_POST['email']) {
      if ($admin['pass'] === md5($_POST['pass'])) {
        $_SESSION['admin'] = $admin;
        header('Location: http://localhost/smartmoney/accounts.php');
        die;
      }
    }
  }
  header('Location: http://localhost/smartmoney/login.php?error');
  die;
}

if (isset($_GET['error'])) {
  $error = 'Email or password error! Please try again.';
}

?>

<?php require __DIR__ . './inc/header.php'; ?>

<main class="main container">
  <div class="row w-100 justify-content-center">

    <div class="col- 10 col-lg-5">

      <img src="./assets/img/logo.png" alt="SmartMoney logo" class="logo-img ms-4">
      <form class="login-form" action="http://localhost/smartmoney/login.php" method="post">
        <div class="form-group">

          <input type="email" class="form-control" id="email" placeholder="Įrašykite el. paštą" name="email">

        </div>
        <div class="form-group">

          <input type="password" class="form-control" id="pass" placeholder="Įrašykite slaptažodį" name="pass">
        </div>
        <button type="submit" class="btn btn-main">Prisijungti</button>
      </form>
      <p class="bank-name">SmartMoney</p>

      <?php if (isset($error)) : ?>
      <div class="alert alert-warning" role="alert"><?= $error ?></div>
      <?php endif ?>

    </div>


  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>