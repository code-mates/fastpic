<?php
require 'core/user.php';

$users = $app['database']->selectAll('user', 'User');

require 'views/index.view.php';
