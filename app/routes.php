<?php

$router->get('', 'PagesContoller@home');
$router->get('about', 'PagesContoller@about');
$router->get('contact', 'PagesContoller@contact');

$router->get('users', 'UsersController@index');
$router->get('users/{id}', 'UsersController@show');

$router->post('users', 'UsersController@store');
