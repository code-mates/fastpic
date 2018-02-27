<?php
// Set error reporting for local debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Core\{Router, Request};

// Auto load the classes
require 'vendor/autoload.php';

// Import the bootstrap
require 'core/bootstrap.php';

Router::load('app/routes.php')
	->direct(Request::uri(), Request::method());
