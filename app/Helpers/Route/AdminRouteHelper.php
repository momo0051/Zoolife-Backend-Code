<?php

namespace App\Helpers\Route;

use Illuminate\Support\Facades\Route;

class AdminRouteHelper
{
    public static function routes()
    {

        Route::group(['middleware' => 'auth'], function () {

            Route::group(['prefix' => 'admin'], function () {

                Route::get('/home', 'Admin\AdminController@index')->name('homePage');

                //   Route::get('/categories', 'Admin\CategoryController@index')->name('categories');

                Route::get('/profile', array('as' => 'admin.profile.showprofile', 'uses' => 'Admin\AdminController@showprofile'));

                Route::any('/profile/update/{id}', array('as' => 'admin.profile.update', 'uses' => 'Admin\AdminController@profileUpdate'));

                Route::get('payment', array('as' => 'admin.payment.show', 'uses' => 'Admin\PaymentController@index'));
                Route::post('charge', array('as' => 'admin.payment.charge', 'uses' => 'Admin\PaymentController@charge'));
                Route::get('paymentsuccess', array('as' => 'admin.payment.success', 'uses' => 'Admin\PaymentController@payment_success'));
                Route::get('paymenterror', array('as' => 'admin.payment.error', 'uses' => 'Admin\PaymentController@payment_error'));

                /*Route::get('products', array('as' => 'admin.product.show', 'uses' => 'Admin\ProductController@index'));
                Route::get('products/create', array('as' => 'admin.product.create', 'uses' => 'Admin\ProductController@create'));
                Route::post('products/store', array('as' => 'admin.product.store', 'uses' => 'Admin\ProductController@store'));
                Route::get('products/edit/{id}', array('as' => 'admin.product.edit', 'uses' => 'Admin\ProductController@show'));
                Route::post('products/update/{id}', array('as' => 'admin.product.update', 'uses' => 'Admin\ProductController@update'));
                Route::get('products/delete/{id}', array('as' => 'admin.product.delete', 'uses' => 'Admin\ProductController@destroy'));*/

                Route::get('about-us', array('as' => 'admin.aboutus', 'uses' => 'Admin\AdminController@aboutUsPage'));
                Route::post('about-us', array('as' => 'admin.aboutus.create', 'uses' => 'Admin\AdminController@createAboutUsPage'));
                Route::any('gallery', array('as' => 'admin.gallery', 'uses' => 'Admin\AdminController@galleryPage'));
                Route::any('services', array('as' => 'admin.services', 'uses' => 'Admin\AdminController@servicesPage'));
                Route::any('contact', array('as' => 'admin.contact', 'uses' => 'Admin\AdminController@contactUsPage'));
                Route::post('contact', array('as' => 'admin.contact.save', 'uses' => 'Admin\AdminController@contactUsStore'));

                /*Route::get('services', array('as' => 'admin.services.show', 'uses' => 'Admin\ServiceController@index'));
                Route::get('services/create', array('as' => 'admin.services.create', 'uses' => 'Admin\ServiceController@create'));
                Route::post('services/store', array('as' => 'admin.services.store', 'uses' => 'Admin\ServiceController@store'));
                Route::get('services/edit/{id}', array('as' => 'admin.services.edit', 'uses' => 'Admin\ServiceController@show'));
                Route::post('services/update/{id}', array('as' => 'admin.services.update', 'uses' => 'Admin\ServiceController@update'));
                Route::get('services/delete/{id}', array('as' => 'admin.services.delete', 'uses' => 'Admin\ServiceController@destroy'));*/

                Route::get('slider', array('as' => 'admin.slider.show', 'uses' => 'Admin\SliderController@index'));
                Route::get('slider/create', array('as' => 'admin.slider.create', 'uses' => 'Admin\SliderController@create'));
                Route::post('slider/store', array('as' => 'admin.slider.store', 'uses' => 'Admin\SliderController@store'));
                Route::get('slider/edit/{id}', array('as' => 'admin.slider.edit', 'uses' => 'Admin\SliderController@show'));
                Route::post('slider/update/{id}', array('as' => 'admin.slider.update', 'uses' => 'Admin\SliderController@update'));
                Route::get('slider/delete/{id}', array('as' => 'admin.slider.delete', 'uses' => 'Admin\SliderController@destroy'));
                Route::get('slider/activate', array('as' => 'admin.slider.activate', 'uses' => 'Admin\SliderController@activate'));
                Route::get('slider/deactivate', array('as' => 'admin.slider.deactivate', 'uses' => 'Admin\SliderController@deactivate'));

                Route::group(['prefix' => 'home-page/cms'], function () {
                    Route::get('/', array('as' => 'admin.home.show', 'uses' => 'Admin\HomeController@show'));
                    Route::post('/', array('as' => 'admin.home.store', 'uses' => 'Admin\HomeController@store'));
                });

                Route::get('home-page/videos', array('as' => 'admin.videos.show', 'uses' => 'Admin\VideoController@index'));
                Route::get('home-page/videos/create', array('as' => 'admin.videos.create', 'uses' => 'Admin\VideoController@create'));
                Route::post('home-page/videos/store', array('as' => 'admin.videos.store', 'uses' => 'Admin\VideoController@store'));
                Route::get('home-page/videos/edit/{id}', array('as' => 'admin.videos.edit', 'uses' => 'Admin\VideoController@show'));
                Route::post('home-page/videos/update/{id}', array('as' => 'admin.videos.update', 'uses' => 'Admin\VideoController@update'));
                Route::get('home-page/videos/delete/{id}', array('as' => 'admin.videos.delete', 'uses' => 'Admin\VideoController@destroy'));

                Route::group(['prefix' => 'footer/cms'], function () {
                    Route::get('/', array('as' => 'admin.footer.show', 'uses' => 'Admin\AdminController@footer'));
                    Route::post('/', array('as' => 'admin.footer.store', 'uses' => 'Admin\AdminController@footerStore'));

                });

                /*Route::get('services/create/product/{id}', array('as' => 'admin.services.product.create', 'uses' => 'Admin\ServiceController@createProduct'));

                Route::post('services/create/product/{id}', array('as' => 'admin.services.product.save', 'uses' => 'Admin\ServiceController@storeProduct'));

                Route::get('services/product/', array('as' => 'admin.services.product.show', 'uses' => 'Admin\ServiceController@showProduct'));

                Route::get('services/product/edit/{id}', array('as' => 'admin.services.product.edit', 'uses' => 'Admin\ServiceController@editProduct'));

                Route::post('services/product/update/{id}', array('as' => 'admin.services.product.update', 'uses' => 'Admin\ServiceController@updateProduct'));

                Route::get('services/product/delete/{id}', array('as' => 'admin.services.product.delete', 'uses' => 'Admin\ServiceController@destroyProduct'));*/

                /*Route::get('gallery', array('as' => 'admin.gallery.show', 'uses' => 'Admin\GalleryController@index'));
                Route::get('gallery/create', array('as' => 'admin.gallery.create', 'uses' => 'Admin\GalleryController@create'));
                Route::post('gallery/store', array('as' => 'admin.gallery.store', 'uses' => 'Admin\GalleryController@store'));
                Route::get('gallery/edit/{id}', array('as' => 'admin.gallery.edit', 'uses' => 'Admin\GalleryController@show'));
                Route::post('gallery/update/{id}', array('as' => 'admin.gallery.update', 'uses' => 'Admin\GalleryController@update'));
                Route::get('gallery/delete/{id}', array('as' => 'admin.gallery.delete', 'uses' => 'Admin\GalleryController@destroy'));*/

                ///////////////////////////////////////////////////Esos Routes//////////////////////////////////////

                Route::get('account', array('as' => 'admin.account.show', 'uses' => 'Admin\AccountController@index'));
                Route::get('account/create', array('as' => 'admin.account.create', 'uses' => 'Admin\AccountController@create'));
                Route::post('account/store', array('as' => 'admin.account.store', 'uses' => 'Admin\AccountController@store'));
                Route::get('account/edit/{id}', array('as' => 'admin.account.edit', 'uses' => 'Admin\AccountController@show'));
                Route::post('account/update/{id}', array('as' => 'admin.account.update', 'uses' => 'Admin\AccountController@update'));
                Route::get('account/delete/{id}', array('as' => 'admin.account.delete', 'uses' => 'Admin\AccountController@destroy'));

                Route::get('article', array('as' => 'admin.article.show', 'uses' => 'Admin\ArticleController@index'));
                Route::get('article/create', array('as' => 'admin.article.create', 'uses' => 'Admin\ArticleController@create'));
                Route::post('article/store', array('as' => 'admin.article.store', 'uses' => 'Admin\ArticleController@store'));
                Route::get('article/edit/{id}', array('as' => 'admin.article.edit', 'uses' => 'Admin\ArticleController@show'));
                Route::post('article/update/{id}', array('as' => 'admin.article.update', 'uses' => 'Admin\ArticleController@update'));
                Route::get('article/delete/{id}', array('as' => 'admin.article.delete', 'uses' => 'Admin\ArticleController@destroy'));

                Route::get('ads', array('as' => 'admin.ads.show', 'uses' => 'Admin\AdsController@index'));
                Route::get('ads/create', array('as' => 'admin.ads.create', 'uses' => 'Admin\AdsController@create'));
                Route::post('ads/store', array('as' => 'admin.ads.store', 'uses' => 'Admin\AdsController@store'));
                Route::get('ads/edit/{id}', array('as' => 'admin.ads.edit', 'uses' => 'Admin\AdsController@show'));
                Route::post('ads/update/{id}', array('as' => 'admin.ads.update', 'uses' => 'Admin\AdsController@update'));
                Route::get('ads/delete/{id}', array('as' => 'admin.ads.delete', 'uses' => 'Admin\AdsController@destroy'));

                Route::get('reports', array('as' => 'admin.ads.reports', 'uses' => 'Admin\AdsController@reports'));
                Route::get('reports/reports/delete/{id}', array('as' => 'admin.reports.delete', 'uses' => 'Admin\AdsController@reports_delete'));

                Route::post('ads/subcategory', array('as' => 'admin.ads.getSubcats', 'uses' => 'Admin\AdsController@getSubcategory'));

                // umair tasks

                Route::get('ads/reports', 'Admin\AdsController@reports');
                //   Route::get('ads/reports/delete/{id}',  'Admin\AdsController@reports_delete');
                Route::get('/categories', array('as' => 'admin.categories.show', 'uses' => 'Admin\CategoryController@index'));
                Route::get('category/create', array('as' => 'admin.category.create', 'uses' => 'Admin\CategoryController@create'));
                Route::post('category/store', array('as' => 'admin.category.store', 'uses' => 'Admin\CategoryController@store'));
                Route::get('category/show/{id}', array('as' => 'admin.category.show', 'uses' => 'Admin\CategoryController@show'));
                Route::post('category/edit/{id}', array('as' => 'admin.category.update', 'uses' => 'Admin\CategoryController@update'));
                Route::get('ads/edit/{id}', array('as' => 'admin.ads.edit', 'uses' => 'Admin\AdsController@show'));
                Route::get('category/delete/{id}', array('as' => 'admin.category.delete', 'uses' => 'Admin\CategoryController@delete_category'));

                Route::post('save/per-page', array('as' => 'save.perpage', 'uses' => 'Admin\AdsController@savePerPage'));

            });

        });
    }
}
