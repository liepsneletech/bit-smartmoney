<?php

session_start();

$currentPage = 'accounts';

if (!isset($_SESSION['admin'])) {
  header('Location: http://localhost/smartmoney/login.php?error');
  die;
};

if (isset($_SESSION['success-new-account'])) {
  $successNewAccount = $_SESSION['success-new-account'];
  unset($_SESSION['success-new-account']);
}

if (!file_exists(__DIR__ . '/users') || $arrOfSurnames = []) {
  $arr = [];
} else {
  $arr = unserialize(file_get_contents(__DIR__ . '/users'));
  foreach ($arr as $user) {
    $arrOfSurnames[] = $user['surname'];
  }
  array_multisort($arrOfSurnames, SORT_ASC, $arr,);
}


if (isset($_SESSION['error-delete'])) {
  $errorDelete = $_SESSION['error-delete'];
  unset($_SESSION['error-delete']);
}

if (isset($_SESSION['success-delete'])) {
  $successDelete = $_SESSION['success-delete'];
  unset($_SESSION['success-delete']);
}

if (isset($_SESSION['success-add'])) {
  $successAdd = $_SESSION['success-add'];
  unset($_SESSION['success-add']);
}

if (isset($_SESSION['success-withdraw'])) {
  $successWithdraw = $_SESSION['success-withdraw'];
  unset($_SESSION['success-withdraw']);
}

require __DIR__ . './inc/header.php';
?>

<main class="container">
  <div class="main-inner">
    <h1 class=" main-title">Sąskaitų sąrašas</h1>

    <?= isset($successNewAccount) ? "<p class='success-green'>$successNewAccount</p>" : '' ?>
    <?= isset($errorDelete) ? "<p class='error-red'>$errorDelete</p>" : '' ?>
    <?= isset($successDelete) ? "<p class='success-green'>$successDelete</p>" : '' ?>
    <?= isset($successAdd) ? "<p class='success-green'>$successAdd</p>" : '' ?>
    <?= isset($successWithdraw) ? "<p class='success-green'>$successWithdraw</p>" : '' ?>

    <div>
      <?php foreach ($arr as $user) : ?>

        <div class="account-info-box">
          <p class="id-number">&#35;<?= $user['id'] ?></p>
          <p class="full-name"><i class="fa-solid fa-user-large person-icon"></i>
            <?= $user['name'] . ' ' . $user['surname'] ?></p>
          <div>
            <p><span class="personal-number-abbr">A.k.: </span><?= $user['personal-number'] ?></p>
            <p class="iban"><span class="iban-lt-chars">LT </span><?= $user['iban'] ?></p>
          </div>

          <div class="accounts-right-box">
            <p class="balance"><?= number_format($user['balance'], 2, ',', ' ') ?> &euro;</p>
            <div class="accounts-btns">
              <a href="http://localhost/smartmoney/add.php?id=<?= $user['id'] ?>" class="accounts-btn btn-green"><i class="fa-solid fa-plus"></i><i class="fa-solid fa-circle-dollar"></i></a>

              <a href="http://localhost/smartmoney/withdrawal.php?id=<?= $user['id'] ?>" class="accounts-btn
            btn-yellow"><i class="fa-solid fa-minus"></i></a>

              <form action="http://localhost/smartmoney/delete.php?id=<?= $user['id'] ?>" method="post">
                <button type="submit" class="accounts-btn btn-red"><i class="fa-solid fa-x"></i></button>
              </form>
            </div>

          </div>

        </div>

      <?php endforeach ?>
    </div>

  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>