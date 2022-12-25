<?php

session_start();

$users = unserialize(file_get_contents(__DIR__ . '/users'));

$id = (int) $_GET['id'];

foreach ($users as $index => $user) {
  if ($user['id'] == $id && $user['balance'] == 0) {
    unset($users[$index]);
    break;
  } else if (($user['id'] == $id && $user['balance'] > 0)) {
    $_SESSION['warning'] = "Negalima ištrinti sąskaitos, kurioje yra lėšų!";
    break;
  }
}

file_put_contents(__DIR__ . '/users', serialize($users));

header('Location: http://localhost/smartmoney/accounts.php');