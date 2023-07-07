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
use Illuminate\Http\Request;
use App\Api;
use App\Http\Controllers\Panel\SliderController;

function callAPI($method, $url, $data){
    $curl = curl_init();
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'APIKEY: lmro3ykaiJeqxU8Tz7gVh1bMw6RXOptd',
        'Content-Type: application/json',
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
}
Route::get('sss', function () {
    $get_data = callAPI('GET', 'http://api.navasan.tech/latest/?api_key=lmro3ykaiJeqxU8Tz7gVh1bMw6RXOptd', false);
    $response = json_decode($get_data, true);
    echo
        'یورو به تومان : '.$response["eur"]['value'].'<br/> تغییر نسبت به دیروز : '.$response["eur"]['change'].'<br/> زمان بروزرسانی : '.$response["eur"]['date']
        .'</br></br></br> دلار آمریکا به تومان : '.$response["usd"]['value'].'<br/> تغییر نسبت به دیروز : '.$response["usd"]['change'].'<br/> زمان بروزرسانی : '.$response["usd"]['date']
        .'</br></br></br> لیر ترکیه به تومان : '.$response["try"]['value'].'<br/> تغییر نسبت به دیروز : '.$response["try"]['change'].'<br/> زمان بروزرسانی : '.$response["try"]['date']
        .'</br></br></br> درهم امارات به تومان : '.$response["aed"]['value'].'<br/> تغییر نسبت به دیروز : '.$response["aed"]['change'].'<br/> زمان بروزرسانی : '.$response["aed"]['date'];
//    $errors = $response['response']['errors'];
//    $data = $response['response']['data'][0];
//    dd($data);
});

Route::get('fake/{id}', function ($id) {
    Auth::loginUsingId($id);
    return redirect('panel');
});

Auth::routes(['register' => false]);
Route::get('lang/{locale}', function ($locale) {
    \Illuminate\Support\Facades\App::setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang_set');


Route::post('filemanager/upload',function (Request $request ){
    if(isset($_FILES['upload']['name'])) {
        $file=$_FILES['upload']['name'];
        $filetmp=$_FILES['upload']['tmp_name'];
        $file_pas=explode('.',$file);
        $file_n='check_editor_'.time().'_'.$file_pas[0].'.'.end($file_pas);
        $photo=move_uploaded_file($filetmp,'assets/uploads/editor/'.$file_n);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        $url = url('assets/uploads/editor/'.$file_n);
        $msg = 'Image uploaded successfully';
        $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

        @header('Content-type: text/html; charset=utf-8');
        echo $response;
    }
})->name('filemanager_upload');
Route::get('filemanager',function (Request $request ){
    $paths=glob('assets/uploads/editor/*');
    $fileNames=array();
    foreach ($paths as $path)
    {
        array_push($fileNames,basename($path));
    }
    $data=array(
        'fileNames'=>$fileNames
    );
    return view('file_manager')->with($data);
})->name('filemanager');




Route::post('request_expert', 'Auth\RegisterController@request_expert')->name('request_expert');

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
    Route::get('slider-create', [SliderController::class,'create'])->name('slider-create');
    Route::put('slider-store', [SliderController::class,'store'])->name('slider-store');
    Route::get('slider-list', [SliderController::class,'index'])->name('slider-list');
    Route::delete('slider-destroy/{id}', [SliderController::class,'destroy'])->name('slider-destroy');
    Route::get('slider-edit/{id}', [SliderController::class,'edit'])->name('slider-edit');
    Route::patch('slider-update', [SliderController::class,'update'])->name('slider-update');

    // slider
    Route::get('menu-create', 'MenuController@create')->name('menu-create');
    Route::put('menu-store', 'MenuController@store')->name('menu-store');
    Route::get('menu-list', 'MenuController@index')->name('menu-list');
    Route::delete('menu-destroy/{id}', 'MenuController@destroy')->name('menu-destroy');
    Route::get('menu-edit/{id}', 'MenuController@edit')->name('menu-edit');
    Route::post('menu-update/{id}', 'MenuController@update')->name('menu-update');

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
    Route::get('user-refer-report-list', 'UserController@refer_report_list')->name('user-refer-report-list');
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
    Route::get('post-category-create/{type?}', 'PostCategoryController@create')->name('post-category-create');
    Route::put('post-category-store', 'PostCategoryController@store')->name('post-category-store');
    Route::get('post-category-list/{type?}', 'PostCategoryController@index')->name('post-category-list');
    Route::get('post-category-edit/{id}', 'PostCategoryController@edit')->name('post-category-edit');
    Route::patch('post-category-update/{id}', 'PostCategoryController@update')->name('post-category-update');
    Route::delete('post-category-destroy/{id}', 'PostCategoryController@destroy')->name('post-category-destroy');
    Route::post('post-category-sort', 'PostCategoryController@sort_item')->name('post-category-sort');

    // posts
//    Route::get('post-create/{type?}', 'PostController@create')->name('post-create');
//    Route::put('post-store', 'PostController@store')->name('post-store');
//    Route::get('post-list/{type?}', 'PostController@index')->name('post-list');
//    Route::get('post-show/{id}', 'PostController@show')->name('post-show');
//    Route::get('post-edit/{id}', 'PostController@edit')->name('post-edit');
//    Route::patch('post-update/{id}', 'PostController@update')->name('post-update');
//    Route::delete('post-dviestroy/{id}', 'PostController@destroy')->name('post-destroy');
//    Route::post('post-list', 'PostController@search')->name('post-search');

    // Article
    Route::get('post-create/{type?}', 'ArticleController@create')->name('article-create');
    Route::put('post-store', 'ArticleController@store')->name('article-store');
    Route::get('post-list/{type?}', 'ArticleController@index')->name('article-list');
    Route::get('post-show/{id}', 'ArticleController@show')->name('article-show');
    Route::get('post-edit/{id}', 'ArticleController@edit')->name('article-edit');
    Route::patch('post-update/{id}', 'ArticleController@update')->name('article-update');
    Route::delete('post-destroy/{id}', 'ArticleController@destroy')->name('article-destroy');
    Route::post('post-list', 'ArticleController@search')->name('article-search');

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
    // consulting
    Route::get('consulting-list', 'ContactController@index1')->name('consulting-list');

    // question
    Route::get('question-list', 'QuestionController@index')->name('question-list');
    Route::delete('question-destroy/{id}', 'QuestionController@destroy')->name('question-destroy');

    // categories
    Route::get('villa-category-create', 'VillaCategoryController@create')->name('villa-category-create');
    Route::post('villa-category-store', 'VillaCategoryController@store')->name('villa-category-store');
    Route::get('villa-category-list', 'VillaCategoryController@index')->name('villa-category-list');
    Route::get('villa-category-edit/{id}', 'VillaCategoryController@edit')->name('villa-category-edit');
    Route::patch('villa-category-update/{id}', 'VillaCategoryController@update')->name('villa-category-update');
    Route::delete('villa-category-destroy/{id}', 'VillaCategoryController@destroy')->name('villa-category-destroy');
    Route::post('villa-category-sort', 'VillaCategoryController@sort_item')->name('villa-category-sort');
    Route::post('villa-category-update-count/{id}', 'VillaCategoryController@update_count')->name('villa-category-update-count');
    Route::get('villa-category-photo-destroy/{id}', 'VillaCategoryController@photo_destroy')->name('villa-category-photo-destroy');
    Route::get('villa-category-active/{id}/{type}', 'VillaCategoryController@active')->name('villa-category-active');


    Route::get('villa-meterage/{id}', 'MeterageController@index')->name('meterage.index');
    Route::get('villa-meterage/create/{id}', 'MeterageController@create')->name('meterage.create');
    Route::post('villa-meterage/{id}', 'MeterageController@store')->name('meterage.store');
    Route::get('villa-meterage/edit/{project}/{id}', 'MeterageController@edit')->name('meterage.edit');
    Route::put('villa-meterage/edit/{project}/{id}', 'MeterageController@update')->name('meterage.update');
    Route::delete('villa-meterage/{id}', 'MeterageController@update')->name('meterage.destroy');


    // villa
    Route::get('districts/{id}', 'VillaController@districts')->name('districts');
    Route::get('villa-create', 'VillaController@create')->name('villa-create');
    Route::put('villa-store', 'VillaController@store')->name('villa-store');
    Route::get('villa-list/{type?}', 'VillaController@index')->name('villa-list');
    Route::get('villa-list-indexByUserId/{id}/{from?}/{to?}', 'VillaController@indexByUserId')->name('villa-list-indexByUserId');
    Route::get('villa-search-index', 'VillaController@search_index')->name('villa-search-index');
    Route::get('villa-show/{id}', 'VillaController@show')->name('villa-show');
    Route::get('villa-edit/{id}', 'VillaController@edit')->name('villa-edit');
    Route::patch('villa-update/{id}', 'VillaController@update')->name('villa-update');
    Route::delete('villa-destroy/{id}', 'VillaController@destroy')->name('villa-destroy');
    Route::get('villa-search/{type?}', 'VillaController@search')->name('villa-search');
    Route::get('villa-find/{type?}', 'VillaController@find')->name('villa-find');
    Route::post('villa-verify', 'VillaController@verify')->name('villa-verify');
    Route::post('villa-status/{villa}', 'VillaController@status')->name('villa-status');
    Route::get('villa-active/{id}/{type}', 'VillaController@active')->name('villa-active');
    Route::get('villa-active-sale/{id}/{type}', 'VillaController@active_sale')->name('villa-active-sale');

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

    // project-category
    Route::get('project-category-list', 'ProjectCategoryController@index')->name('project-category-list');
    Route::get('project-category-create', 'ProjectCategoryController@create')->name('project-category-create');
    Route::post('project-category-save', 'ProjectCategoryController@store')->name('project-category-save');
    Route::get('project-category-edit/{id}', 'ProjectCategoryController@edit')->name('project-category-edit');
    Route::get('project-category-show/{id}', 'ProjectCategoryController@show')->name('project-category-show');
    Route::post('project-category-update/{id}', 'ProjectCategoryController@update')->name('project-category-update');
    Route::delete('project-category-delete/{id}', 'ProjectCategoryController@destroy')->name('project-category-delete');


    Route::resource('agent', 'AgentController');


  // Cities
    Route::get('city-list', 'CityController@index')->name('city-list');
    Route::get('city-create', 'CityController@create')->name('city-create');
    Route::post('city-save', 'CityController@store')->name('city-save');
    Route::get('city-edit/{id}', 'CityController@create')->name('city-edit');
    Route::post('city-update', 'CityController@update')->name('city-update');
    Route::get('city-delete/{id}', 'CityController@destory')->name('city-delete');
    Route::get('city/{id}', 'PanelController@city')->name('city');

    // locations
//    Route::get('location-create', 'LocationController@create')->name('location-create');
//    Route::put('location-store', 'LocationController@store')->name('location-store');
    Route::get('location-list', 'LocationController@index')->name('location-list');
    Route::get('location-edit/{id}', 'LocationController@edit')->name('location-edit');
    Route::patch('location-update/{id}', 'LocationController@update')->name('location-update');
//    Route::delete('location-destroy/{id}', 'LocationController@destroy')->name('location-destroy');
//    Route::post('location-list', 'LocationController@search')->name('location-search');
    Route::get('location-active/{id}/{type}', 'LocationController@active')->name('location-active');
    Route::get('location-pupular/{id}/', 'LocationController@pupular')->name('location-pupular');

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




    // abouts
    Route::get('about-list', 'AboutController@index')->name('about-list');
    Route::get('about-create', 'AboutController@create')->name('about-create');
    Route::post('about-store', 'AboutController@store')->name('about-store');
    Route::get('about-edit/{id}', 'AboutController@edit')->name('about-edit');
    Route::post('about-update/{id}', 'AboutController@update')->name('about-update');
    Route::get('about-destroy/{id}', 'AboutController@destroy')->name('about-destroy');
    Route::get('about-active/{id}/{type}/{item_type}', 'AboutController@active')->name('about-active');

    // contact list
    Route::get('contact-list', 'ContactController@index')->name('contact-list');
    Route::delete('contact-destroy', 'ContactController@destroy')->name('contact-destroy');

    // contact info
    Route::get('contact-info-list', 'ContactInfoController@index')->name('contact-info-list');
    Route::get('contact-info-create', 'ContactInfoController@create')->name('contact-info-create');
    Route::post('contact-info-store', 'ContactInfoController@store')->name('contact-info-store');
    Route::get('contact-info-edit/{id}', 'ContactInfoController@edit')->name('contact-info-edit');
    Route::post('contact-info-update/{id}', 'ContactInfoController@update')->name('contact-info-update');
    Route::get('contact-info-destroy/{id}', 'ContactInfoController@destroy')->name('contact-info-destroy');
    Route::get('contact-info-active/{id}/{type}/{item_type}', 'ContactInfoController@active')->name('contact-info-active');

    // meta
    Route::get('meta-list', 'MetaController@index')->name('meta-list');
    Route::get('meta-create', 'MetaController@create')->name('meta-create');
    Route::post('meta-store', 'MetaController@store')->name('meta-store');
    Route::get('meta-edit/{id}', 'MetaController@edit')->name('meta-edit');
    Route::post('meta-update/{id}', 'MetaController@update')->name('meta-update');
    Route::get('meta-destroy/{id}', 'MetaController@destroy')->name('meta-destroy');
    Route::get('meta-active/{id}/{type}', 'MetaController@active')->name('meta-active');

    Route::resource('settings', 'SettingController');

    // price list
    Route::get('price-convert', 'PanelController@price_index')->name('price-convert');
    Route::post('price-convert-update', 'PanelController@price_update')->name('price-convert-update');


});
