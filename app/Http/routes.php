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

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/* Admin */
Route::resource('/secret/feed/csv', 'FeedController');
Route::get('/secret/fixfeed', 'FeedController@getFixFeed');

Route::resource('/admin/tags', 'AdminTagsController');
Route::resource('/admin/categories', 'AdminCategoriesController');
Route::resource('/admin/subcategories', 'AdminSubCategoriesController');
Route::resource('/admin/companies', 'AdminCompaniesController');
Route::get('/admin/home', 'AdminController@index');

/* Ajax */
Route::get('/api/companies/{limit}', 'AjaxController@getCompanies');
Route::post('/api/companies/{limit}', 'AjaxController@getCompanies');
Route::get('/api/subcategories/{category_id}', 'AjaxController@getSubcategories');
Route::post('/api/subcategories/{category_id}', 'AjaxController@getSubcategories');


Route::resource('/contact', 'ContactController');
Route::resource('/privacy', 'PrivacyController');
Route::resource('/about', 'AboutController');
Route::post('/clansearch', 'AboutController@ajaxClanSearch');
Route::resource('/login', 'LoginController');
Route::resource('/register', 'RegistrationController');

Route::get('/submit', 'SubmitController@index');
Route::post('/submit', 'SubmitController@submit');

Route::get('/search/{search}', 'SearchController@index');
Route::get('/addcompany', 'CompanyController@add');
Route::get('/category', 'CategoryController@index');
Route::get('/category/{slug}', 'CategoryController@getCategories');
Route::get('/subcategory', 'SubCategoryController@index');
Route::get('/subcategory/{slug}', 'SubCategoryController@getCategories');
Route::get('/company-details/{slug}', 'CompanyController@index');
Route::get('/', 'HomeController@index');
