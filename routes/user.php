<?php
Route::get('/', 'HomeController@index')->name('index');
Route::get('/search', 'HomeController@search')->name('search');

Route::get('/faq', 'FaqController@show')->name('faq');


Route::get('/contact-us', 'ContactController@show')->name('contact');
Route::get('/consulting', 'ContactController@show1')->name('consulting');
Route::post('/contact-post', 'ContactController@store')->name('contact.post');
Route::post('/consulting-post', 'ContactController@store1')->name('consulting.post');

//Route::get('projects/{id?}', 'ProjectController@index')->name('project.index');
Route::get('properties/{id}', 'ProjectController@show')->name('project.show');
Route::get('agent/{slug}', 'AgentController@show')->name('agent.show');

//Route::get('/villas/{id?}', 'VillaController@index')->name('villa.index');
//Route::get('/villa/{id}', 'VillaController@show')->name('villa.show');
//Route::get('/villas-search/{type}', 'VillaController@search')->name('villas.search');

Route::get('blog/{id?}', 'BlogController@show')->name('blog.show');

Route::get('/services/{slug?}', 'ServiceController@index')->name('service.index');
Route::get('/service/{id}', 'ServiceController@show')->name('service.show');


Route::get('خرید-خانه-در-استانبول', 'HomeController@conseling')->name('conseling');
Route::get('شهروندی-ترکیه', 'HomeController@citizenship')->name('citizenship');
Route::get('پروژه-ها', 'HomeController@projects')->name('projects');
Route::get('listings/office', 'HomeController@office')->name('projects.office');
Route::get('listings/villa', 'HomeController@villa')->name('projects.villa');
Route::get('listings/consept', 'HomeController@consept')->name('projects.consept');
Route::get('listings/installments', 'HomeController@installments')->name('projects.installments');

Route::get('درباره-ما', 'HomeController@about_us')->name('about_us');
Route::get('اخبار-و-مقالات-به-روز-ترکیه', 'BlogController@index')->name('articles.index');
Route::get('تماس-با-ما', 'HomeController@contact_us')->name('contact_us');


