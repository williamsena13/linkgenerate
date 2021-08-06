<?php
$router->get('/', function ()  {
    return view('app');
});
$router->get('/', 'HomeController@index');
$router->get('links' , 'LinksController@index');

$router->get('redirections' , 'RedirectionsController@index@index');

//$router->group(['prefix' => 'api'], function ($router) {
//



