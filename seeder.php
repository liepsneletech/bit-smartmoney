<?php

$admins = [
    ['email' => 'levickaite.m@gmail.com', 'pass' => md5('123')],
    ['email' => 'varliukasm@gmail.com', 'pass' => md5('123')],
    ['email' => 'eziukas@gmail.com', 'pass' => md5('123')],
];

file_put_contents(__DIR__ . '/admins', serialize($admins));