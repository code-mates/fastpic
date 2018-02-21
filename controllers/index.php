<?php
require 'core/user.php';

$users = $database->selectAll('user', 'User');

require 'views/index.view.php';
