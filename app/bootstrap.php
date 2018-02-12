<?php

// Grab the config array
$config = require '../config.php';
// Database connection
require('database/Connection.php');
// Helps to build SQL Queries
require('database/QueryBuilder.php');

// Initialize the QueryBuilder and pass it a DB connection
return new QueryBuilder(
  Connection::make($config)
);
