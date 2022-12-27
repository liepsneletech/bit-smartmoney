<?php

session_start();

$users = unserialize(file_get_contents(__DIR__ . '/users'));

$id = (int) $_GET['id'];

if (isset($_SESSION['error-amount'])) {
  $errorAmount = $_SESSION['error-amount'];
  unset($_SESSION['error-amount']);
}

foreach ($users as $index => $user) {
  if ($user['id'] == $id) {
    $currentUser = $users[$index];
    break;
  }
}

if (isset($_POST['add'])) {
  if ((float) $_POST['balance'] < 0.01) {
    $_SESSION['error-amount'] = 'Įveskite validžią sumą.';
    header("Location: http://localhost/smartmoney/add.php?id=$id");
    die;
  }

  foreach ($users as $index => $user) {
    if ($user['id'] == $id) {
      $users[$index]['balance'] += (float) $_POST['balance'];
      $_SESSION['success-add'] = 'Sėkmingai pridėjote lėšų.';
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
      <?= isset($errorAmount) ? "<p class='error-red'>$errorAmount</p>" : '' ?>

      <p class="full-name"><i class="fa-solid fa-user-large person-icon"></i>
        <?= $user['name'] . ' ' . $user['surname'] ?></p>
      <strong>Sąskaitos likutis: <?= number_format($user['balance'], 2, ',', ' ') ?> &euro;</strong>
      <input type="text" name="balance" placeholder="Įrašykite sumą">
      <button type="submit" class="btn-main btn-green" name="add">PATVIRTINTI</button>
      <div class="img-box"><img src="./assets/img/add-money-pic.png" alt="Add money" class="add-money-pic"></div>
    </form>
  </div>

</main>

<?php require __DIR__ . './inc/footer.php'; ?>