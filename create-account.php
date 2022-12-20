<?php



?>

<?php require __DIR__ . './inc/header.php'; ?>

<main class="main container">
  <div class="row w-100 justify-content-center">

    <div class="col- 10 col-lg-5">


      <form class="inner-form" action="http://localhost/smartmoney/login.php" method="post">

        <div class="form-group">
          <input type="text" class="form-control" id="name" placeholder="Vardas*" name="name" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="surname" placeholder="Pavardė*" name="surname" required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="personal-code" placeholder="Asmens kodas*" name="personal-code"
            required>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" id="iban" placeholder="IBAN*" name="iban" required>
        </div>

        <button type="submit" class="btn btn-main">Sukurti</button>
      </form>

      <?php if (isset($error)) : ?>
      <div class="alert alert-warning" role="alert"><?= $error ?></div>
      <?php endif ?>

    </div>


  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>