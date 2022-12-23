<?php

$users = unserialize(file_get_contents(__DIR__ . '/users'));

$ibanValue = 'LT' . ' ' . rand(0, 9) . rand(0, 9) . ' ' . '0014' . ' ' . '7' . rand(0, 9) . rand(0, 9) . rand(0, 9) . ' ' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9)  . ' ' . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (preg_match('/[a-ząčęėįšųū\s]{4,}/i', $_POST['name'])) {
    $name = $_POST['name'];
  } else {
    echo 'Vardas turi būti ilgesnis nei 3 simboliai.';
  }
  if (preg_match('/[a-ząčęėįšųū\s]{4,}/i', $_POST['surname'])) {
    $surname = $_POST['surname'];
  } else {
    echo 'Pavardė turi būti ilgesnė nei 3 simboliai.';
  }

  if (preg_match('/^[1-6]\d{2}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])\d{4}$/', $_POST['personal-number'])) {
    $personalNumber = $_POST['personal-number'];
  } else {
    echo 'Neteisingas asmens kodas.';
  }



  $newUser = ['id' => rand(1000000, 9999999), 'name' => $name, 'surname' => $surname, 'personal-number' => $personalNumber, 'iban' => $ibanValue, 'balance' => 0];

  $users[] = $newUser;

  file_put_contents(__DIR__ . '/users', serialize($users));

  header("Location: http://localhost/smartmoney/accounts.php");
  die;
}

require __DIR__ . './inc/header.php';

?>

<main class="main-inner container">
  <div class="row w-100 justify-content-center">

    <div class="col- 10 col-lg-5">


      <form class="registration-form" action="http://localhost/smartmoney/create-account.php" method="post">

        <div class="form-group">
          <input type="text" class="form-control" id="name" placeholder="Vardas*" name="name" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="surname" placeholder="Pavardė*" name="surname" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="personal-number" placeholder="Asmens kodas*"
            name="personal-number" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="iban" placeholder="IBAN*" name="iban" value="<?= $ibanValue ?>"
            readonly>
        </div>

        <button type="submit" class="btn btn-main btn-green">Sukurti</button>
      </form>

      <?php if (isset($error)) : ?>
      <div class="alert alert-warning" role="alert"><?= $error ?></div>
      <?php endif ?>

    </div>

    <?php require __DIR__ . './inc/footer.php';
    ?>