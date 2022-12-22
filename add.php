<?php

$users = unserialize(file_get_contents(__DIR__ . '/users'));

$id = (int) $_GET['id'];

foreach ($users as $index => $user) {
  if ($user['id'] == $id) {
    $users[$index]['balance'] += (int) $_POST['balance'];
    break;
  }
}

file_put_contents(__DIR__ . '/users', serialize($users));

header('Location: http://localhost/smartmoney/add-page.php/');