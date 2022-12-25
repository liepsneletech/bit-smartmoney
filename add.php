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
      $users[$index]['balance'] += (float) $_POST['balance'];
      break;
    }
  }
  file_put_contents(__DIR__ . '/users', serialize($users));
  header("Location: http://localhost/smartmoney/accounts.php");
  die;
}

require __DIR__ . './inc/header.php';
?>

<main class="container ">
  <div class="main-inner">
    <h1 class="main-title">Įnešti lėšų į sąskaitą</h1>

    <form action="http://localhost/smartmoney/add.php?id=<?= $id ?>" method="post" class="money-operation-box">
      <p class="full-name"><i class="fa-solid fa-user-large person-icon"></i>
        <?= $user['name'] . ' ' . $user['surname'] ?></p>
      <strong>Sąskaitos likutis: <?= number_format($user['balance'], 2, ',', ' ') ?> &euro;</strong>
      <input type="text" name="balance" placeholder="Įrašykite sumą">
      <button type="submit" class="btn btn-main btn-green">PATVIRTINTI</button>
      <div class="img-box"><img src="./assets/img/add-money-pic.png" alt="Add money" class="add-money-pic"></div>
    </form>
  </div>

</main>

<?php require __DIR__ . './inc/footer.php'; ?>