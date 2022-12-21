<?php

$admins = [
    ['email' => 'levickaite.m@gmail.com', 'pass' => md5('123')],
    ['email' => 'varliukasm@gmail.com', 'pass' => md5('123')],
    ['email' => 'eziukas@gmail.com', 'pass' => md5('123')],
];

$users = [
    ['id' => rand(1000000, 10000000), 'name' => 'Agota', 'surname' => 'Kaminskaitė', 'personal-number' => '', 'iban' => ''],
    ['id' => rand(1000000, 10000000), 'name' => 'Martynas', 'surname' => 'Užubalis', 'personal-number' => '', 'iban' => ''],
    ['id' => rand(1000000, 10000000), 'name' => 'Liudmila', 'surname' => 'Krasovič', 'personal-number' => '', 'iban' => ''],
];

file_put_contents(__DIR__ . '/admins', serialize($admins));
file_put_contents(__DIR__ . '/users', serialize($users));