<?php

$app = [];

// Grab the config array
$app['config'] = require 'config.php';
// Get the routes
require 'core/router.php';
// Request
require 'core/request.php';
// Database connection
require 'database/connection.php';
// Helps to build SQL Queries
require 'database/query-builder.php';

// Initialize the QueryBuilder and pass it a DB connection
$app['database'] = new QueryBuilder(
  Connection::make($app['config']['database'])
);
