<?php
/**
*PHP version 5
*File doc comment
*@category Sniffer
*@package  Sniffer.Test
*@author   ANTON Maicmelan <maicmelan.anton@epitech.eu>
*@license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
*@link     http://intra.epitech.eu
*/
Route::get('/', 'UsersController@index');

Route::get('/login', 'UsersController@login');

Route::post('/login', 'UsersController@inputLogin');

Route::get('/inscription', 'UsersController@inscription');

Route::get('/photos', 'UploadsController@photos');

Route::get('/view', 'UploadsController@view');

Route::get('/text', 'UploadsController@text');

Route::get('/music', 'UploadsController@music');

Route::get('/videos', 'UploadsController@video');

Route::get('/delete', 'UploadsController@delete');

Route::get('/contact', 'UsersController@contact');

Route::post('/contact', 'UsersController@contactVerif');

Route::get('/compressed', 'UploadsController@compressed');

Route::post('/inscription', 'UsersController@inputInscription');

Route::get('/logout', 'UsersController@logout');

Route::get('/accueil', 'UsersController@accueil');

Route::get('/upload', 'UploadsController@index');

Route::post('/upload', 'UploadsController@fileCheck');