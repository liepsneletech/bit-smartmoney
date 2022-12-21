<?php

$users = unserialize(file_get_contents(__DIR__ . '/users'));

$id = $_GET['id'];

foreach ($users as $index => $user) {
  if ($user['id'] == $id) {
    unset($user[$index]);
  }
}

header('Location: http://localhost/smartmoney/accounts.php');
exit;