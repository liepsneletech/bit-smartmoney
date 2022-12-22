<?php

$users = unserialize(file_get_contents(__DIR__ . '/users'));

$id = (int) $_GET['id'];

foreach ($users as $user) {
  if ($user['id'] == $id) {
    break;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user['balance'] += $_POST['balance'];
  file_put_contents(__DIR__ . '/users', serialize($users));
}



require __DIR__ . './inc/header.php';
?>

<main class="container main-inner">
  <h1 class="main-title">Įnešti į sąskaitą</h1>
  <div>

    <div class="account-info-box">
      <p>Dabartinis likutis: <?= $user['balance'] ?></p>
      <form action="http://localhost/smartmoney/deposit.php?id=<?= $id ?>" method="post">
        <input type="text" name="balance">
        <button type="submit" class="btn btn-main btn-green">ĮNEŠTI LĖŠŲ</button>
      </form>

    </div>

  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>