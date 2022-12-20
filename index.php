<?php require __DIR__ . './inc/header.php'; ?>

<main class="main container">
  <div class="row w-100 justify-content-center">
    <div class="col- 10 col-lg-6">
      <form class="login-form">
        <div class="form-group">
          <label for="exampleInputEmail1">El. paštas</label>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Įrašykite el. paštą">

        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Slaptažodis</label>
          <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Įrašykite slaptažodį">
          <small id="emailHelp" class="form-text text-muted">Slaptažodžio ilgis 8-20 simbolių</small>
        </div>
        <button type="submit" class="btn btn-main">Submit</button>
      </form>
    </div>
  </div>
</main>

<?php require __DIR__ . './inc/footer.php'; ?>