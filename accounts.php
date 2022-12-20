<?php

session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: http://localhost/smartmoney/login.php?error');
  die;
};

if (!file_exists(__DIR__ . '/users')) {
  $arr = [];
} else {
  $arr = unserialize(file_get_contents(__DIR__ . '/users'));
}
?>

<?php require __DIR__ . './inc/header.php'; ?>

<main class="container main-inner">
  <h1 class="main-title">Sąskaitos</h1>
  <div>
    <?php foreach ($arr[0] as $accountDetails) : ?>

    <span><?= $accountDetails ?></span>

    <?php endforeach ?>
  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>