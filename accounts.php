<?php

session_start();
if (!isset($_SESSION['admin'])) {
  header('Location: http://localhost/smartmoney/login.php?error');
  die;
};
?>

<?php require __DIR__ . './inc/header.php'; ?>



<?php require __DIR__ . './inc/footer.php'; ?>