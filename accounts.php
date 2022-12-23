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
  foreach ($arr as $user) {
    $arrOfSurnames[] = $user['surname'];
  }
  array_multisort($arrOfSurnames, SORT_ASC, $arr,);
}

require __DIR__ . './inc/header.php';
?>

<main class="container main-inner">
  <h1 class="main-title">Sąskaitos</h1>
  <div>
    <?php foreach ($arr as $user) : ?>

    <div class="account-info-box">
      <div><?= $user['id'] ?></div>
      <div><?= $user['name'] . ' ' . $user['surname'] ?></div>
      <div><?= $user['personal-number'] ?></div>
      <div><?= $user['balance'] ?></div>
      <div><?= $user['iban'] ?></div>

      <a href="http://localhost/smartmoney/add.php?id=<?= $user['id'] ?>" class="btn btn-main btn-green">ĮNEŠTI</a>

      <a href="http://localhost/smartmoney/withdrawal.php?id=<?= $user['id'] ?>" class=" btn btn-main
        btn-yellow">IŠIMTI</a>

      <form action="http://localhost/smartmoney/delete.php?id=<?= $user['id'] ?>" method="post">
        <button type="submit" class="btn btn-main btn-red"><i class="fa-solid fa-x"></i></button>
      </form>


    </div>

    <?php endforeach ?>
  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>