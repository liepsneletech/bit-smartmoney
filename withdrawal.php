<?php

$users = unserialize(file_get_contents(__DIR__ . '/users'));

$id = (int) $_GET['id'];

foreach ($users as $index => $user) {
  if ($user['id'] == $id) {
    $users[$index]['balance'];
  }
}

file_put_contents(__DIR__ . '/users', serialize($users));
require __DIR__ . './inc/header.php';
?>

<main class="container main-inner">
  <h1 class="main-title">Išimti iš sąskaitos</h1>
  <div>
    <?php foreach (unserialize(file_get_contents(__DIR__ . '/users')) as $user) : ?>

    <div class="account-info-box">

      <div><?= $user['name'] . ' ' . $user['surname'] ?></div>
      <div><?= $user['iban'] ?></div>
      <div><?= $user['personal-number'] ?></div>

      <form action="http://localhost/smartmoney/deposit.php?id=<?= $user['id'] ?>" method="post">
        <input type="text" name="balance">
        <button type="submit" class="btn btn-main btn-green">IŠSIIMTI</button>
      </form>


    </div>

    <?php endforeach ?>
  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>