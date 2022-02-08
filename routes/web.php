<?php

use Illuminate\Support\Facades\Route;

use App\Models\Article;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


\App\Helpers\Route\AdminRouteHelper::routes();

Route::get('change-locale/{locale}', ['as' => 'site.change-locale', 'uses' => 'Site\HomeController@changeLocale']);

Route::get('/', array('as' => 'home', 'uses' => 'Site\HomeController@index'));

Route::get('posts/{type?}', array('as' => 'posts', 'uses' => 'Site\PostController@index'));
Route::get('post/{slug}', array('as' => 'post_detail', 'uses' => 'Site\PostController@postShow'));

Route::get('auction/{slug}', array('as' => 'auction_detail', 'uses' => 'Site\PostController@auctionShow'));

Route::get('explores', array('as' => 'articles', 'uses' => 'Site\ArticleController@index'));
Route::get('explore/{slug}', array('as' => 'article_detail', 'uses' => 'Site\ArticleController@show'));

 // Route::any('/', array('as' => 'home', 'uses' => 'Site\HomeController@homePage'));
 // Route::any('/about-us', array('as' => 'aboutus', 'uses' => 'Site\HomeController@aboutUsPage'));
 // Route::any('/gallery', array('as' => 'gallery', 'uses' => 'Site\HomeController@galleryPage'));
 // Route::any('/services', array('as' => 'services', 'uses' => 'Site\HomeController@servicesPage'));
 // Route::any('/services/{slug}', array('as' => 'services.detail', 'uses' => 'Site\HomeController@servicesDetail'));
 // Route::any('/contact', array('as' => 'contact', 'uses' => 'Site\HomeController@contactUsPage'));

 // Route::post('/send', array('as' => 'contact.sendemail', 'uses' => 'Site\HomeController@emailSendToAdmin'));
 
 // Route::get('/thankyou', array('as' => 'contact.thankyou', 'uses' => 'Site\HomeController@thankyou'));
