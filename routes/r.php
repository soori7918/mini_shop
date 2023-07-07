<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;
use App\Api;

Route::get('p_t', function ($slug) {
    $project=Category::where('slug',$slug)->get();
    return view('project.test',compact('project'));


});
Route::get('edition', function () {

    $user=\App\User::find(197);
    //$user->givePermissionTo('edit_users');
    return $user->getDirectPermissions();


});
Route::get('roles/{id}', function ($id) {

    $user= \App\User::find($id);
//
    $user->removeRole('call center(sales)');
    $user->assignRole('call center');
    return $user->getRoleNames();
    return 'done';

});
Route::get('fake/{id}', function ($id) {
    Auth::loginUsingId($id, true);
    return redirect()->route('front-index');
});
Route::get('opt', function () {
    App\Optimizer::saveAs('source/assets/uploads/sliders/1399-07-06/photos/photo-240145c377b06c24d5b2ef6bd9704f00.jpg');
    dd('ok');
});

Route::get('login_office', function () {
    return view('auth.login_office');
})->name('login_office');
Auth::routes();
Route::get('lang/{locale}', function ($locale) {
    \Illuminate\Support\Facades\App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang_set');

// index
Route::get('/', 'HomeController@index')->name('front-index');
Route::get('/new', 'HomeController@index1')->name('front-index1');
Route::get('reset/{token?}', 'PasswordController@resetIndex')->name('user-reset');
Route::get('resetPassword-index/{token?}', 'PasswordController@reset_index')->name('resetPassword-index');
Route::post('resetPassword', 'PasswordController@reset')->name('resetPassword');
Route::post('resetPassword-update', 'PasswordController@reset_update')->name('resetPassword-update');
Route::get('complete', 'Auth\RegisterController@complete')->name('front.complete');
Route::post('complete-store', 'Auth\RegisterController@complete_store')->name('front.complete-store');
Route::get('register_office', 'Auth\RegisterController@register_office')->name('front.register.office');
Route::get('email_active/{id}/{code}', 'Auth\RegisterController@email_active')->name('front.email.active');
Route::get('projects', 'ProjectController@index')->name('front.projects.index');
Route::get('projects/{slug}', 'ProjectController@show')->name('front.projects.show');
Route::get('property/{type?}', 'VillaController@index')->name('front.villas.index');
Route::get('villa/search', 'VillaController@search')->name('front.villas.search');
Route::get('filter/property/{type}', 'VillaController@filter')->name('front.villas.filter');
Route::get('properties/{slug}', 'VillaController@show')->name('front.villas.show');
Route::get('villa/preview/{slug}/{user_id}', 'VillaController@preview')->name('front.villas.preview');
Route::get('add_fav/{id}/{type}', 'VillaController@add_fav')->name('add_fav');
Route::get('locations', 'VillaController@locations')->name('front.villas.locations');
Route::get('search_project', 'HomeController@search_project')->name('search_project');
//Route::get('test', 'HomeController@index')->name('front-index');
Route::get('contact-us', 'HomeController@contact')->name('front-contact');
Route::get('terms-and-Conditions', 'HomeController@role')->name('front-role');
Route::get('travel-insurance', 'HomeController@bime')->name('front-bime');
Route::get('insurance/{slug}', 'HomeController@bime_show')->name('front-bime-show');
Route::get('about-us', 'HomeController@about')->name('front.about');
Route::get('map', 'HomeController@map')->name('front.map');
Route::get('company-registration', 'HomeController@company_registration')->name('front.company_registration');
Route::get('faq', 'HomeController@faq')->name('front.faq');
Route::get('blogs', 'BlogController@index')->name('front-blog');
Route::get('blogs', 'BlogController@index')->name('front.blog.index');
Route::get('blogs/search', 'BlogController@search')->name('front-blog-search');
Route::get('blog/{slug}', 'BlogController@show')->name('front-blog-show');
Route::get('article/search', 'ArticleController@index')->name('front-article-search');
Route::get('article', 'ArticleController@index')->name('front-article');
Route::get('article/{slug}', 'ArticleController@show')->name('front-article-show');
Route::get('passports', 'PassportController@create')->name('front.passports.create');
Route::post('passports', 'PassportController@store')->name('front.passports.save');


Route::get('category/{slug}', 'BlogController@cat')->name('front-blog-cat');
//Route::get('&#1608;&#1740;&#1604;&#1575;/{slug}', 'VillaController@show')->name('front-villa-show');
Route::get('property/{slug}', 'VillaController@show')->name('front-villa-show');



Route::get('villa-holiday-destinations', 'LocationController@index')->name('front-location-index');
Route::get('villa-holiday-destinations/{url}', 'LocationController@show')->name('front-location-show');
Route::post('filter/{id}', 'LocationController@filter')->name('front-location-filter');
Route::post('location-filter', 'LocationController@sort')->name('front-location-sort');

// comment
Route::put('post-comment-store', 'CommentController@post_store')->name('post-comment-store');
Route::put('villa-comment-store', 'CommentController@villa_store')->name('villa-comment-store');
Route::put('location-comment-store', 'CommentController@location_store')->name('location-comment-store');

Route::post('villa-reserve-store', 'VillaController@reserve_store')->name('villa-reserve-store');

Route::put('newsletter-store', 'NewsletterController@store')->name('newsletter-store');
Route::put('contact-store', 'ContactController@store')->name('contact-store');
Route::post('contact-save', 'ContactController@save')->name('front.contact.save');

// like
Route::post('villa-like', 'VillaController@like')->name('villa-like');
Route::get('favorites', 'VillaController@favorites')->name('front-favorites-list');
Route::get('del_favorites/{id}', 'VillaController@del_favorites')->name('front-favorites-del');

Route::post('question-store','VillaController@question_store')->name('question-store');

Route::post('passwordreset', 'PasswordController@reset')->name('passwordreset');

Route::post('share', 'HomeController@share')->name('share');

Route::group(['prefix' => 'panel', 'namespace' => 'Panel', 'middleware' => ['auth']], function () {

    // index
    Route::get('/', 'PanelController@index')->name('index');
    Route::get('arz-list', 'PanelController@arz')->name('arz-list');
    Route::post('arz-update/{slug}', 'PanelController@arz_u')->name('arz-update');
    Route::get('/dashboard', 'PanelController@dashboard')->name('dashboard');
    Route::get('city/{id}', 'PanelController@city')->name('city');
    Route::get('properties/{id}', 'PanelController@properties')->name('properties');

    // re
    Route::get('re/list', 'ReController@list')->name('re-list');

    // upload file
    Route::any('/uploads/{folder}/{waterMark}/{height}/{width}', 'PanelController@upload')->name('index-upload');
    Route::post('/uploads/file/delete', 'PanelController@deleteUpload')->name('index-files-delete');

    //share
    Route::get('share/list', 'ShareController@index')->name('share-list');
    Route::get('share/edit/{id}', 'ShareController@edit')->name('share-edit');
    Route::patch('share/update', 'ShareController@update')->name('share-update');

    // upload-list
    Route::get('upload/list', 'ReController@upload')->name('upload-list');
    Route::post('upload/store', 'ReController@upload_store')->name('upload-store');

    // slider
    Route::get('slider-create', 'SliderController@create')->name('slider-create');
    Route::put('slider-store', 'SliderController@store')->name('slider-store');
    Route::get('slider-list', 'SliderController@index')->name('slider-list');
    Route::delete('slider-destroy/{id}', 'SliderController@destroy')->name('slider-destroy');
    Route::get('slider-edit/{id}', 'SliderController@edit')->name('slider-edit');
    Route::patch('slider-update', 'SliderController@update')->name('slider-update');

    // faq
    Route::get('faq-create', 'FaqController@create')->name('faq-create');
    Route::put('faq-store', 'FaqController@store')->name('faq-store');
    Route::get('faq-list', 'FaqController@index')->name('faq-list');
    Route::delete('faq-destroy/{id}', 'FaqController@destroy')->name('faq-destroy');
    Route::get('faq-edit/{id}', 'FaqController@edit')->name('faq-edit');
    Route::patch('faq-update', 'FaqController@update')->name('faq-update');

    // notification
    Route::get('notification-list', 'NotificationController@index')->name('notification-list');
    Route::get('notification-show/{id}', 'NotificationController@show')->name('notification-show');

    // transaction
    Route::get('transaction-list', 'TransactionController@index')->name('transaction-list');

    // travel
    Route::get('travel-create', 'TravelController@create')->name('travel-create');
    Route::put('travel-store', 'TravelController@store')->name('travel-store');
    Route::get('travel-list', 'TravelController@index')->name('travel-list');
    Route::delete('travel-destroy/{id}', 'TravelController@destroy')->name('travel-destroy');
    Route::get('travel-edit/{id}', 'TravelController@edit')->name('travel-edit');
    Route::patch('travel-update/{id}', 'TravelController@update')->name('travel-update');

    // profile
    Route::get('profile-show/{id}', 'ProfileController@show')->name('profile-show');
    Route::get('profile-edit/{id}', 'ProfileController@edit')->name('profile-edit');
    Route::get('profile-password-change/{id}', 'ProfileController@password')->name('profile-password');
    Route::get('profile-info/{id}', 'ProfileController@info')->name('profile-info');
    Route::patch('profile-update/{id}', 'ProfileController@update')->name('profile-update');
    Route::patch('profile-password-update/{id}', 'ProfileController@password_update')->name('profile-password-update');
    Route::patch('profile-info-update/{id}', 'ProfileController@info_update')->name('profile-info-update');

    // users
    Route::get('user-create', 'UserController@create')->name('user-create');
    Route::put('user-store', 'UserController@store')->name('user-store');
    Route::post('user-store', 'UserController@store')->name('user-store-save');
    Route::post('user-reagent-description-store', 'UserController@reagent_description_store')->name('user-reagent-description-store');
    Route::get('user-list', 'UserController@index')->name('user-list');
    Route::get('customersByUserId-list/{id}/{from?}/{to?}', 'UserController@customersByUserId')->name('customersByUserId-list');
    Route::get('subsetsByUserId-list/{id}/{from?}/{to?}', 'UserController@subsetsByUserId')->name('subsetsByUserId-list');
    Route::get('user-questionnaire/{id}', 'UserController@questionnaire')->name('user-questionnaire');
    Route::post('user-questionnaire-store', 'UserController@questionnaire_store')->name('user_questionnaire_store');
    Route::get('user-questionnaire-list', 'UserController@questionnaire_list')->name('user_questionnaire_list');
    Route::post('user-refer', 'UserController@refer')->name('user-refer');
    Route::get('user-refer-list', 'UserController@refer_list')->name('user-refer-list');
    Route::get('user-sign-in/{id}', 'UserController@sign_in')->name('user-sign-in');
    Route::get('user-sign-in-back/{id}', 'UserController@sign_in_back')->name('user-sign-in-back');
    Route::post('user-refer-deny', 'UserController@refer_deny')->name('user-refer-deny');
    Route::post('user-refer-report', 'UserController@refer_report')->name('user-refer-report');
    Route::get('user-show/{id}', 'UserController@show')->name('user-show');
    Route::get('customer-show/{id}', 'UserController@customer_show')->name('customer-show');
    Route::get('user-edit/{id}', 'UserController@edit')->name('user-edit');
    Route::get('user-report', 'UserController@report_index')->name('user-report');
    Route::get('user-report-search', 'UserController@report_search')->name('user-report-search');
    Route::get('raise_hand/{id}', 'UserController@raise_hand')->name('raise_hand');
    Route::get('raisedUsers/{id}', 'UserController@raisedUsers')->name('raisedUsers');
    Route::get('user-permissions/{id}', 'UserController@permissions')->name('user-permissions');
    Route::post('user-permissions-update/{id}', 'UserController@permissions_update')->name('user-permissions-update');
    Route::patch('user-update/{id}', 'UserController@update')->name('user-update');
    Route::put('user-update/{id}', 'UserController@update')->name('user-update-save');
    Route::delete('user-destroy/{id}', 'UserController@destroy')->name('user-destroy');
    Route::post('user-remove', 'UserController@remove')->name('user-remove');
    Route::post('user-status-update/{id}', 'UserController@status_update')->name('user-status-update');
    Route::post('user-block/{id}', 'UserController@block')->name('user-block');
    Route::post('user-list', 'UserController@search')->name('user-search');

    // Contract
    Route::post('contract-store', 'ContractController@store')->name('contract-store');
    Route::post('contract-reserve-store', 'ContractController@reserve_store')->name('contract-reserve-store');
    Route::get('contract-list', 'ContractController@index')->name('contract-list');
    Route::get('contract-customers/{id}', 'ContractController@customers')->name('contract-customers');
    Route::get('contract-canceled-list', 'ContractController@canceled_index')->name('contract-canceled-list');
    Route::get('contract-deny', 'ContractController@deny')->name('contract-deny');
    Route::post('contract-cancel', 'ContractController@cancel')->name('contract-cancel');
    Route::get('contract-show/{id}', 'ContractController@show')->name('contract-show');

    // user properties
    Route::get('user-property-create', 'UserPropertyController@create')->name('user-property-create');
    Route::put('user-property-store', 'UserPropertyController@store')->name('user-property-store');
    Route::get('user-property-list', 'UserPropertyController@index')->name('user-property-list');
    Route::get('user-property-pending-list', 'UserPropertyController@pending')->name('user-pending-list');
    Route::get('user-property-rejected-list', 'UserPropertyController@rejected')->name('user-rejected-list');
    Route::get('user-property-show/{id}', 'UserPropertyController@show')->name('user-property-show');
    Route::get('user-property-edit/{id}', 'UserPropertyController@edit')->name('user-property-edit');
    Route::patch('user-property-update/{id}', 'UserPropertyController@update')->name('user-property-update');
    Route::post('user-property-block/{id}', 'UserPropertyController@block')->name('user-property-block');
    Route::post('user-property-list', 'UserPropertyController@search')->name('user-property-search');

    // categories
    Route::get('post-category-create', 'PostCategoryController@create')->name('post-category-create');
    Route::put('post-category-store', 'PostCategoryController@store')->name('post-category-store');
    Route::get('post-category-list', 'PostCategoryController@index')->name('post-category-list');
    Route::get('post-category-edit/{id}', 'PostCategoryController@edit')->name('post-category-edit');
    Route::patch('post-category-update/{id}', 'PostCategoryController@update')->name('post-category-update');
    Route::delete('post-category-destroy/{id}', 'PostCategoryController@destroy')->name('post-category-destroy');
    Route::post('post-category-sort', 'PostCategoryController@sort_item')->name('post-category-sort');

    // posts
    Route::get('post-create', 'PostController@create')->name('post-create');
    Route::put('post-store', 'PostController@store')->name('post-store');
    Route::get('post-list', 'PostController@index')->name('post-list');
    Route::get('post-show/{id}', 'PostController@show')->name('post-show');
    Route::get('post-edit/{id}', 'PostController@edit')->name('post-edit');
    Route::patch('post-update/{id}', 'PostController@update')->name('post-update');
    Route::delete('post-dviestroy/{id}', 'PostController@destroy')->name('post-destroy');
    Route::post('post-list', 'PostController@search')->name('post-search');

    // Article
    Route::get('article-create', 'ArticleController@create')->name('article-create');
    Route::put('article-store', 'ArticleController@store')->name('article-store');
    Route::get('article-list', 'ArticleController@index')->name('article-list');
    Route::get('article-show/{id}', 'ArticleController@show')->name('article-show');
    Route::get('article-edit/{id}', 'ArticleController@edit')->name('article-edit');
    Route::patch('article-update/{id}', 'ArticleController@update')->name('article-update');
    Route::delete('article-dviestroy/{id}', 'ArticleController@destroy')->name('article-destroy');
    Route::post('article-list', 'ArticleController@search')->name('article-search');

    // Complain
    Route::get('complain-create', 'ComplainController@create')->name('complain-create');
    Route::put('complain-store', 'ComplainController@store')->name('complain-store');
    Route::get('complain-list', 'ComplainController@index')->name('complain-list');
    Route::get('complain-show/{id}', 'ComplainController@show')->name('complain-show');
    Route::get('complain-edit/{id}', 'ComplainController@edit')->name('complain-edit');
    Route::patch('complain-update/{id}', 'ComplainController@update')->name('complain-update');
    Route::delete('complain-dviestroy/{id}', 'ComplainController@destroy')->name('complain-destroy');
    Route::post('complain-list', 'ComplainController@search')->name('complain-search');

    Route::get('passports', 'PassportController@index')->name('passports.index');
    Route::get('passports/{passport}', 'PassportController@show')->name('passports.show');

    //insurance
    Route::get('insurance-create', 'InsuranceController@create')->name('insurance-create');
    Route::put('insurance-store', 'InsuranceController@store')->name('insurance-store');
    Route::get('insurance-list', 'InsuranceController@index')->name('insurance-list');
    Route::get('insurance-edit/{id}', 'InsuranceController@edit')->name('insurance-edit');
    Route::patch('insurance-update/{id}', 'InsuranceController@update')->name('insurance-update');
    Route::delete('insurance-destroy/{id}', 'InsuranceController@destroy')->name('insurance-destroy');

    // newsletters
    Route::get('newsletter-list-home', 'NewsletterController@home')->name('newsletter-list-home');
    Route::get('newsletter-list-location', 'NewsletterController@location')->name('newsletter-list-location');
    Route::get('newsletter-list-villa', 'NewsletterController@villa')->name('newsletter-list-villa');
    Route::get('newsletter-list-blog', 'NewsletterController@blog')->name('newsletter-list-blog');
    Route::delete('newsletter-destroy/{id}', 'NewsletterController@destroy')->name('newsletter-destroy');

    // contacts
    Route::get('contacts-list', 'ContactController@index')->name('contacts-list');
    Route::delete('contacts-destroy/{id}', 'ContactController@destroy')->name('contacts-destroy');

    // question
    Route::get('question-list', 'QuestionController@index')->name('question-list');
    Route::delete('question-destroy/{id}', 'QuestionController@destroy')->name('question-destroy');

    // categories
    Route::get('villa-category-create', 'VillaCategoryController@create')->name('villa-category-create');
    Route::put('villa-category-store', 'VillaCategoryController@store')->name('villa-category-store');
    Route::get('villa-category-list', 'VillaCategoryController@index')->name('villa-category-list');
    Route::get('villa-category-edit/{id}', 'VillaCategoryController@edit')->name('villa-category-edit');
    Route::patch('villa-category-update/{id}', 'VillaCategoryController@update')->name('villa-category-update');
    Route::delete('villa-category-destroy/{id}', 'VillaCategoryController@destroy')->name('villa-category-destroy');
    Route::post('villa-category-sort', 'VillaCategoryController@sort_item')->name('villa-category-sort');

    // villa
    Route::get('districts/{id}', 'VillaController@districts')->name('districts');
    Route::get('villa-create', 'VillaController@create')->name('villa-create');
    Route::put('villa-store', 'VillaController@store')->name('villa-store');
    Route::get('villa-list/{type}', 'VillaController@index')->name('villa-list');
    Route::get('villa-list-indexByUserId/{id}/{from?}/{to?}', 'VillaController@indexByUserId')->name('villa-list-indexByUserId');
    Route::get('villa-search-index', 'VillaController@search_index')->name('villa-search-index');
    Route::get('villa-show/{id}', 'VillaController@show')->name('villa-show');
    Route::get('villa-edit/{id}', 'VillaController@edit')->name('villa-edit');
    Route::patch('villa-update/{id}', 'VillaController@update')->name('villa-update');
    Route::delete('villa-destroy/{id}', 'VillaController@destroy')->name('villa-destroy');
    Route::get('villa-search/{type?}', 'VillaController@search')->name('villa-search');
    Route::post('villa-verify', 'VillaController@verify')->name('villa-verify');
    Route::post('villa-status/{villa}', 'VillaController@status')->name('villa-status');

    // ical
    Route::get('ical-create/{id}', 'IcalController@create')->name('ical-create');
    Route::get('ical-list', 'IcalController@index')->name('ical-list');
    Route::put('ical-store', 'IcalController@store')->name('ical-store');
    Route::get('ical-destroy/{id}', 'IcalController@destroy')->name('ical-destroy');
    Route::post('ical-list', 'IcalController@search')->name('ical-search');


    // properties
    Route::get('property-create', 'PropertyController@create')->name('property-create');
    Route::put('property-store', 'PropertyController@store')->name('property-store');
    Route::get('property-list', 'PropertyController@index')->name('property-list');
    Route::get('property-edit/{id}', 'PropertyController@edit')->name('property-edit');
    Route::patch('property-update/{id}', 'PropertyController@update')->name('property-update');
    Route::delete('property-destroy/{id}', 'PropertyController@destroy')->name('property-destroy');
    Route::post('property-list', 'PropertyController@search')->name('property-search');

    // Cities
    Route::get('city-list', 'CityController@index')->name('city-list');
    Route::get('city-create', 'CityController@create')->name('city-create');
    Route::post('city-save', 'CityController@store')->name('city-save');
    Route::get('city-edit/{id}', 'CityController@create')->name('city-edit');
    Route::post('city-update', 'CityController@update')->name('city-update');
    Route::get('city-delete/{id}', 'CityController@destory')->name('city-delete');
    Route::get('city/{id}', 'PanelController@city')->name('city');

    // locations
    Route::get('location-create', 'LocationController@create')->name('location-create');
    Route::put('location-store', 'LocationController@store')->name('location-store');
    Route::get('location-list', 'LocationController@index')->name('location-list');
    Route::get('location-edit/{id}', 'LocationController@edit')->name('location-edit');
    Route::patch('location-update/{id}', 'LocationController@update')->name('location-update');
    Route::delete('location-destroy/{id}', 'LocationController@destroy')->name('location-destroy');
    Route::post('location-list', 'LocationController@search')->name('location-search');

    // galleries
    Route::get('gallery-create', 'GalleryController@create')->name('gallery-create');
    Route::put('gallery-store', 'GalleryController@store')->name('gallery-store');
    Route::get('gallery-list', 'GalleryController@index')->name('gallery-list');
    Route::get('gallery-show/{id}', 'GalleryController@show')->name('gallery-show');
    Route::put('gallery-photo-store', 'GalleryController@photo_store')->name('gallery-photo-store');
    Route::get('gallery-edit/{id}', 'GalleryController@edit')->name('gallery-edit');
    Route::patch('gallery-update/{id}', 'GalleryController@update')->name('gallery-update');
    Route::delete('gallery-destroy/{id}', 'GalleryController@destroy')->name('gallery-destroy');
    Route::delete('gallery-photo-destroy/{id}', 'GalleryController@photo_destroy')->name('gallery-photo-destroy');
    Route::post('gallery-list-search', 'GalleryController@search')->name('gallery-search');

    Route::get('/set-photo-sort', 'PanelController@setPhotoSort')->name('set-photo-sort');
    Route::get('/set-photo-delete', 'PanelController@setPhotoDelete')->name('set-photo-delete');

    // locations galleries
    Route::get('location-gallery-create', 'LocationGalleryController@create')->name('location-gallery-create');
    Route::put('location-gallery-store', 'LocationGalleryController@store')->name('location-gallery-store');
    Route::get('location-gallery-list', 'LocationGalleryController@index')->name('location-gallery-list');
    Route::get('location-gallery-show/{id}', 'LocationGalleryController@show')->name('location-gallery-show');
    Route::put('location-gallery-photo-store', 'LocationGalleryController@photo_store')->name('location-gallery-photo-store');
    Route::get('location-gallery-edit/{id}', 'LocationGalleryController@edit')->name('location-gallery-edit');
    Route::patch('location-gallery-update/{id}', 'LocationGalleryController@update')->name('location-gallery-update');
    Route::delete('location-gallery-destroy/{id}', 'LocationGalleryController@destroy')->name('location-gallery-destroy');
    Route::delete('location-gallery-photo-destroy/{id}', 'LocationGalleryController@photo_destroy')->name('location-gallery-photo-destroy');
    Route::post('location-gallery-list', 'LocationGalleryController@search')->name('location-gallery-search');

    // visitlog
    Route::get('visitlogs', 'VisitlogController@index')->name('visitlogs');

    // comments
    Route::get('comment-list', 'CommentController@index')->name('comment-list');
    Route::get('comment-show/{id}', 'CommentController@show')->name('comment-show');
    Route::get('comment-edit/{id}', 'CommentController@edit')->name('comment-edit');
    Route::patch('comment-update/{id}', 'CommentController@update')->name('comment-update');
    Route::delete('comment-destroy/{id}', 'CommentController@destroy')->name('comment-destroy');
    Route::patch('comment-status/{id}', 'CommentController@status')->name('comment-status');
    Route::get('comment-status2/{id}', 'CommentController@status2')->name('comment-status2');


    // settings
    Route::get('settings', 'SettingController@index')->name('settings-list');
    Route::patch('settings/{id}', 'SettingController@update')->name('settings-update');

    // abouts
    Route::get('abouts', 'AboutController@index')->name('abouts-list');
    Route::patch('abouts/{id}', 'AboutController@update')->name('abouts-update');

    // meta
    Route::get('meta-list', 'MetaController@index')->name('meta-list');
    Route::get('meta-create', 'MetaController@create')->name('meta-create');
    Route::post('meta-store', 'MetaController@store')->name('meta-store');
    Route::get('meta-edit/{id}', 'MetaController@edit')->name('meta-edit');
    Route::post('meta-update/{id}', 'MetaController@update')->name('meta-update');
    Route::get('meta-destroy/{id}', 'MetaController@destroy')->name('meta-destroy');
    Route::get('meta-active/{id}/{type}', 'MetaController@active')->name('meta-active');
});
