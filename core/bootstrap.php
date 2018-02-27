<?php

$app = [];

// Grab the config array
$app['config'] = require 'config.php';

// Initialize the QueryBuilder and pass it a DB connection
$app['database'] = new QueryBuilder(
  Connection::make($app['config']['database'])
);
