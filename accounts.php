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

require __DIR__ . './inc/header.php';
?>

<main class="container main-inner">
  <h1 class="main-title">Sąskaitos</h1>
  <div>
    <?php foreach (unserialize(file_get_contents(__DIR__ . '/users')) as $user) : ?>

    <div class="d-flex gap-3">
      <div><?= $user['id'] ?></div>
      <div><?= $user['name'] ?></div>
      <div><?= $user['surname'] ?></div>
      <div><?= $user['iban'] ?></div>
    </div>
    <form action="http://localhost/smartmoney/accounts.php/delete.php?id=<?= $user['name'] ?>" method="post">
      <button type="submit">DELETE</button>
    </form>


    <?php endforeach ?>
  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>