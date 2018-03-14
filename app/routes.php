<?php

/**
 * Routes for the application
 */

$router->get('', 'PagesContoller@home');
$router->get('about', 'PagesContoller@about');
$router->get('contact', 'PagesContoller@contact');

$router->get('users', 'UsersController@index');
$router->get('users/{id}', 'UsersController@show');
$router->post('users', 'UsersController@store');

$router->get('profile/{username}', 'ProfileController@show');

$router->get('photo/{id}', 'PhotoController@show');

$router->get('register', 'UsersController@register');
