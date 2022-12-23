<?php

$users = unserialize(file_get_contents(__DIR__ . '/users'));

$id = (int) $_GET['id'];

foreach ($users as $index => $user) {
  if ($user['id'] == $id) {
    $currentUser = $users[$index];
    break;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($users as $index => $user) {
    if ($user['id'] == $id) {
      $users[$index]['balance'] -= (float) $_POST['balance'];
      break;
    }
  }
  file_put_contents(__DIR__ . '/users', serialize($users));
  header("Location: http://localhost/smartmoney/withdrawal.php?id=$id");
  die;
}

require __DIR__ . './inc/header.php';
?>

<main class="container main-inner">
  <h1 class="main-title">Įnešti į sąskaitą</h1>
  <div>

    <div class="account-info-box">
      <p>Dabartinis likutis: <?= $currentUser['balance'] ?></p>
      <form action="http://localhost/smartmoney/withdrawal.php?id=<?= $id ?>" method="post">
        <input type="text" name="balance">
        <button type="submit" class="btn btn-main btn-green">ĮNEŠTI LĖŠŲ</button>
      </form>

    </div>

  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>