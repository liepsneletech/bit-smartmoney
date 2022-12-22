<?php

$users = unserialize(file_get_contents(__DIR__ . '/users'));

$id = (int) $_GET['id'];



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($users as $index => $value) {
    if ($value['id'] == $id) {
      $currentUser = $users[$index];
      print_r($currentUser);
    }
  }

  if (isset($_POST['balance'])) {
    $amount = $_POST['balance'];
    $currentUser['balance'] += (float) $amount;

    foreach ($users as $index => &$value) {
      if ($value['id'] == $id) {
        $users[$index] = $currentUser;
      }
    }
    file_put_contents(__DIR__ . '/users', serialize($users));
    header("Location:http://localhost/smartmoney/deposit.php?id=$id");
    die;
  }
}



require __DIR__ . './inc/header.php';
?>

<main class="container main-inner">
  <h1 class="main-title">Įnešti į sąskaitą</h1>
  <div>

    <div class="account-info-box">

      <div><?= $currentUser['name'] . ' ' . $currentUser['surname'] ?></div>
      <div><?= $currentUser['iban'] ?></div>
      <div><?= $currentUser['personal-number'] ?></div>
      <div><?= $currentUser['balance'] ?></div>

      <form action="http://localhost/smartmoney/deposit.php?id=<?= $id ?>" method="post">
        <input type="text" name="balance">
        <button type="submit" class="btn btn-main btn-green">ĮNEŠTI</button>
      </form>


    </div>
  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>