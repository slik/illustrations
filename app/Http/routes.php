<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$router->get('/', array(
	'as' => 'illustrations.index',
	'uses' => 'UploadController@index'
));

$router->post('/', array(
	'as' => 'illustrations.upload',
	'uses' => 'UploadController@upload'
));

$router->get('/{id}', array(
	'as' => 'illustrations.show',
	'uses' => 'UploadController@show'
));

/*
|--------------------------------------------------------------------------
| Authentication & Password Reset Controllers
|--------------------------------------------------------------------------
|
| These two controllers handle the authentication of the users of your
| application, as well as the functions necessary for resetting the
| passwords for your users. You may modify or remove these files.
|
*/

$router->controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
