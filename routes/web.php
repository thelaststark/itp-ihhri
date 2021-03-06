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
Route::get('/AdminHome', 'PagesController@adhome');
Route::get('/admin', 'PostsController@admhome')->middleware('auth_admin');
Route::get('/ServiceTest', 'PostsController@index');
Route::get('/AdminServ', 'PostsController@serv');
Route::get('/gallery', 'PostsController@media');


// Route::post('/ServiceTest', 'PostsController@store');
// Route::put('/ServiceTest/{post}', 'PostsController@update');
// Route::get('/ServiceTest/create', 'PostsController@create');
// Route::get('/ServiceTest/{post}/edit', 'PostsController@edit');
// Route::delete('/ServiceTest/{post}', 'PostsController@destroy');

Route::get('/gallery', 'ArticlesController@index');
Route::post('/gallery', 'ArticlesController@store');
Route::put('/gallery/{article}', 'ArticlesController@update');
Route::get('/gallery/create', 'ArticlesController@create');
Route::get('/gallery/{article}/edit', 'ArticlesController@edit');
Route::delete('/gallery/{article}', 'ArticlesController@destroy');

Route::get('/aboutus', 'NoticesController@index');
Route::post('/aboutus', 'NoticesController@store');
Route::put('/aboutus/{article}', 'NoticesController@update');
Route::get('/aboutus/create', 'NoticesController@create');
Route::get('/aboutus/{article}/edit', 'NoticesController@edit');
Route::delete('/aboutus/{article}', 'NoticesController@destroy');

Route::get('/adminfeedback', 'FeedbackController@index');

Route::get('/feedback', 'FeedbackController@fed');
Route::post('/feedbacktest','FeedbackController@store');
Route::delete('/feedback/{feedback}', 'FeedbackController@destroy');

Route::resource('ServiceTest', 'PostsController');

Route::get('/Services', 'ServicesController@index')->name('Services');

Auth::routes();


Route::view('/', 'main.index');
Route::get('/about', 'NoticesController@index');
Route::get('/ServiceTest', 'PostsController@index');
Route::get('/gallery', 'ArticlesController@index');
Route::get('/feedback', 'FeedbackController@fed');
Route::view('/contact', 'main.about');
Route::view('/contact', 'main.contact');
Route::view('/signin', 'main.login');

Route::view('/search', 'PatientManagement.search');
Route::view('/registerp', 'auth.registerp');
Route::view('/dashboard', 'PatientManagement.patientDashboard');

Route::view('/show', 'PatientManagement.showDoc');
Auth::routes();

Route::get('/usermanager', 'UserTypeController@manage');
Route::resource('supplier', 'SupplierManagerController')->middleware('auth_supp');

// for patients dashboard
Route::resource('patient', 'PatientDashboardController');
Route::resource('search', 'SearchController');

//payment routes
Route::get('/paymentHome', function () {
    return view('payment.paymentHome');
});

Route::get('/paymentCard', function () {
    return view('payment.paymentCard');
});

Route::get('/paymentSlip', function () {
    return view('payment.paymentSlip');
});

Route::get('/paymentRefund', function () {
    return view('payment.paymentRefund');
});

Route::get('/paymentSearch', function () {
    return view('payment.paymentSearch');
});
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail', 'CardController@show');
Route::get('/search1', 'PaymentController@search');
Route::resource('payment', 'PaymentController');
Route::get('/card', 'CardController@index');
Route::resource('card', 'CardController');
Route::get('/slip', 'BankSlipController@index');
Route::resource('slip', 'BankSlipController');
// to search doctor
//Route::resource('search', 'SearchController');

// to display doctor
Route::post('showdoctor','ShowDoctorController@search');

// to delete a user
Route::delete('/userdelete/{id}', 'UserProfileController@destroy');



//order managemet system

Route::get('/shoppingcart', function () {
    return view('product_order_system.ShoppingCart');
});

Route::get('/search-product', 'ProductSearchController@index');
Route::get('/viewproduct/{id}', 'ProductSearchController@show');
Route::get('/productshow','ProductViewController@index');
Route::post('search-product','ProductSearchController@search');
Route::get('/order-admindash','ProductAdminDashController@index')->middleware('auth');
Route::post('order-admindash','ProductAdminDashController@search');
Route::post('admindash_status','ProductAdminDashController@updatesatus');
Route::get('/paitientorderdash','PaitientOrderDashController@indexpaitent')->middleware('auth');
Route::post('/paitientorderdash','PaitientOrderDashController@searchgeneral');
Route::post('/paitientorderdash','PaitientOrderDashController@searchmedical');
Route::post('paitientorderdash/edit','PaitientOrderDashController@showedit');
Route::post('paitientorderdash/updateorder','PaitientOrderDashController@updates');
Route::resource('paitintorder','PaitientOrderDashController');

Route::get('/user-prescriptions','PatientPriscriptionOrderController@show')->middleware('auth');
Route::post('/user-prescriptions','PatientPriscriptionOrderController@search');
Route::get('/add-to-cart/{id}',[
    'uses'=>'ProductController@getAddToCart',
    'as'=>'product.addToCart'
]);

Route::get('/reduce-product/{id}',[
    'uses'=>'ProductController@getReduceByone',
    'as'=>'product.reducedbyone'
]);
//Route::get('show-cart','ProductController@getCart');
Route::get('/show-cart',[
    'uses'=>'ProductController@getCart',
    'as'=>'product.show-cart'
])->middleware('auth');
Route::get('/getcheckout',[
    'uses'=>'ProductController@getcheckout',
    'as'=>'product-chek-out'
]);
Route::get('go-to-cart','ShoppingCartController@index');



//Product Management

Route::get('/landingpage', 'ProductManagementController@landpage');

Route::get('/product', 'ProductManagementController@index');

Route::resource('product', 'ProductManagementController');

Route::delete('/productdelete/{id}', 'ProductManagementController@destroy');

Route::post('/store', 'ProductManagementController@store');

//Record Management

//1.Personal Record
Route::get('/home_per', function(){
    return view('home_per');
});

Route::get('/home_per', 'PersonalRecordsController@index');

Route::get('/create_per', function(){
    return view('create_per');
});

Route::post('/insert', 'PersonalRecordsController@add0'); 

Route::put('/update_per/{id}', 'PersonalRecordsController@update0');
Route::post('/edit/{id}', 'PersonalRecordsController@edit0');

Route::get('/read_per/{id}', 'PersonalRecordsController@read0');

Route::get('/delete/{id}', 'PersonalRecordsController@delete0');


//2.Treatment Record
Route::get('/home_treat', function(){
    return view('home_treat');
});

Route::get('/home_treat', 'TreatmentController@home1');

Route::get('/create_treat', function(){
    return view('create_treat');
});

Route::post('/insert_treatment', 'TreatmentController@add1'); 

Route::put('/update_treat/{id}', 'TreatmentController@update1');
Route::post('/edit/{id}', 'TreatmentController@edit1');

Route::get('/read_treat/{id}', 'TreatmentController@read1');

Route::get('/delete/{id}', 'TreatmentController@delete1');

//3.Prescription
Route::get('/home_treat', function(){
    return view('home_prescription');
});

Route::get('/home_prescription', 'PrescriptionController@home2');

Route::get('/create_prescription', function(){
    return view('create_prescription');
});

Route::post('/insert_prescription', 'PrescriptionController@add2'); 

Route::put('/update_prescription/{id}', 'PrescriptionController@update2');
Route::post('/edit/{id}', 'PrescriptionController@edit2');

Route::get('/read_prescription/{id}', 'PrescriptionController@read2');

Route::get('/delete/{id}', 'PrescriptionController@delete2');

