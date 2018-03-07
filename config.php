<?php

return [
  'database' => [
    'dbname'    => 'fastpic',
    'username'  => 'vagrant',
    'password'  => 'vagrant',
    'host'      => 'mysql:host=localhost',
    'options'   => [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  ],
  'site' => [
    'title' => 'Fastpic'
  ]
];
