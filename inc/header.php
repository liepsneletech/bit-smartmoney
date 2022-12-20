<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/custom.css">
</head>

<body>

  <header class="header">
    <nav class="navbar navbar-light container">
      <nav class="navbar navbar-expand-lg navbar-dark ">
        <a href="#"><img src="./assets/img/logo-dark.png" alt="SmartMoney logo" class="header-logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Accounts</a>
            <a class="nav-item nav-link" href="#">Create account</a>
            <a class="nav-item nav-link" href="#">Deposit</a>
            <a class="nav-item nav-link" href="#">Withdrawal</a>
            <a class="nav-item nav-link" href="#">Logout</a>
          </div>
        </div>
      </nav>
    </nav>
  </header>