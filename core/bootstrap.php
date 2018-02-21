<?php

// Grab the config array
$config = require 'config.php';
// Get the routes
require 'core/router.php';
// Database connection
require 'database/connection.php';
// Helps to build SQL Queries
require 'database/query-builder.php';

// Initialize the QueryBuilder and pass it a DB connection
return new QueryBuilder(
  Connection::make($config['database'])
);
