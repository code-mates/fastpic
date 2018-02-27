<?php

// Grab the config array
$config = require 'config.php';
// Database connection
require('connection.php');
// Helps to build SQL Queries
require('query-builder.php');

// Initialize the QueryBuilder and pass it a DB connection
return new QueryBuilder(
  Connection::make($config)
);
