<?php

$app['database']->insert('user', [
	'email_address' => $_POST['email_address'],
	'user_name' => $_POST['user_name']
]);

header('Location: /');
