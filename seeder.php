<?php

$admins = [
    ['email' => 'levickaite.m@gmail.com', 'pass' => md5('123')],
    ['email' => 'varliukasm@gmail.com', 'pass' => md5('123')],
    ['email' => 'eziukas@gmail.com', 'pass' => md5('123')],
];

$users = [
    ['id' => rand(1000000, 9999999), 'name' => 'Agota', 'surname' => 'Kaminskaitė', 'personal-number' => '', 'iban' => 'LT' . rand(100000000000000000, 999999999999999999), 'balance' => 0],
    ['id' => rand(1000000, 9999999), 'name' => 'Martynas', 'surname' => 'Užubalis', 'personal-number' => '', 'iban' => 'LT' . rand(100000000000000000, 999999999999999999), 'balance' => 0],
    ['id' => rand(1000000, 9999999), 'name' => 'Liudmila', 'surname' => 'Krasovič', 'personal-number' => '', 'iban' => 'LT' . rand(100000000000000000, 999999999999999999), 'balance' => 0],
];

file_put_contents(__DIR__ . '/admins', serialize($admins));
file_put_contents(__DIR__ . '/users', serialize($users));