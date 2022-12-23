<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartMoney</title>
  <link href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/custom.css">
</head>

<body>

  <header class="header">
    <div class="container d-flex justify-content-between">
      <a href="#"><img src="./assets/img/logo-dark.png" alt="SmartMoney logo" class="header-logo"></a>
      <nav class="navbar navbar-light ">
        <nav class="navbar navbar-expand-lg navbar-dark justify-content-center">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="http://localhost/smartmoney/accounts.php">Sąskaitos</a>
              <a class="nav-item nav-link" href="http://localhost/smartmoney/create-account.php">Sukurti sąskaitą</a>
              <form method="post" action="http://localhost/smartmoney/login.php?logout" class="d-flex">
                <button type="submit" class="btn-green logout-btn">Atsijungti<i
                    class="fa-solid fa-arrow-right-from-bracket ms-1"></i></button>
              </form>
            </div>
          </div>
        </nav>
      </nav>
    </div>
  </header>