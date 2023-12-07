<?php

$router->get('/login', 'user@index');
$router->get('/register', 'user@show');
$router->post('/register', 'user@register');
$router->post('/login', 'user@login');
$router->get('/logout', 'user@logout');

$router->get('/list', 'product@index');
$router->get('/add', 'product@create');
$router->post('/add', 'product@store');
$router->get('/update/:id', 'product@show');
$router->post('/update/:id', 'product@edit');
$router->delete('/destroy/:id', 'product@delete');

$router->get('/api/v1/product/list', 'product@list');
$router->post('/api/v1/product/update/:id', 'product@update');
$router->delete('/api/v1/product/delete/:id', 'product@delete');


$router->post('/upload', 'home@upload');

$router->get('/', function() {
    echo 'Welcome ';
});