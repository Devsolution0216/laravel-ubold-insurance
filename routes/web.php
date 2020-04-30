<?php
Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
});

Route::middleware(['auth'])->group(function(){
    //customers
    Route::resource('customers', 'Admin\CustomersController');
    Route::post('customers/destroy/{id}', 'Admin\CustomersController@destroy');
    Route::get('inquiry', 'Admin\CustomersController@indexInquiry');
    Route::get('inquiry/excel', 'Admin\CustomersController@excel');

    //online quotation
    Route::resource('quotations', 'QuotationsController');
    Route::post('quotations/destroy/{id}', 'QuotationsController@destroy');

    //quote parameters-list type of products
    Route::resource('tproducts', 'Admin\Parameters\TproductsController');
    Route::post('tproducts/destroy/{id}', 'Admin\Parameters\TproductsController@destroy');

    //quote parameters-list of brands
    Route::resource('brands', 'Admin\Parameters\BrandsController');
    Route::post('brands/destroy/{id}', 'Admin\Parameters\BrandsController@destroy');

    //quote parameters-list of models
    Route::resource('models', 'Admin\Parameters\ModelsController');
    Route::post('models/destroy/{id}', 'Admin\Parameters\ModelsController@destroy');
    Route::post('models/products', 'Admin\Parameters\ModelsController@productStore');
    Route::post('models/products/{id}', 'Admin\Parameters\ModelsController@productUpdate');
    Route::post('models/products/destroy/{id}', 'Admin\Parameters\ModelsController@productDestroy');

    //quote parameters-list insurers
    Route::resource('insurers', 'Admin\Parameters\InsurersController');
    Route::post('insurers/destroy/{id}', 'Admin\Parameters\InsurersController@destroy');

    //quote parameters-list list of type use
    Route::resource('uses', 'Admin\Parameters\UsesController');
    Route::post('uses/destroy/{id}', 'Admin\Parameters\UsesController@destroy');

    //quote parameters-list quotation status
    Route::resource('statuses', 'Admin\Parameters\StatusesController');
    Route::post('statuses/destroy/{id}', 'Admin\Parameters\StatusesController@destroy');

    //quote parameters-list type of insurers
    Route::resource('tinsurers', 'Admin\Parameters\TinsurersController');
    Route::post('tinsurers/destroy/{id}', 'Admin\Parameters\TinsurersController@destroy');

    //quote parameters-quote escenaries
    Route::resource('escenaries', 'Admin\Parameters\EscenariesController');
    Route::get('escenaries/getProducts/{id}', 'Admin\Parameters\EscenariesController@getProducts');
    Route::get('escenaries/getAbbreviation/{id}', 'Admin\Parameters\EscenariesController@getAbbreviation');
    Route::get('escenaries/getModels/{id}', 'Admin\Parameters\EscenariesController@getModels');
    Route::get('escenaries/getYear/{id}', 'Admin\Parameters\EscenariesController@getYear');

    //policies portfolio
    Route::resource('policies', 'Admin\PoliciesController');
    Route::post('policies/destroy/{id}', 'Admin\PoliciesController@destroy');
    Route::get('policies/getCustomer/{id}', 'Admin\PoliciesController@getCustomer');
    Route::get('policies/getTproducts/{id}', 'Admin\PoliciesController@getTproducts');
    Route::post('policies/saveDocument/{id}', 'Admin\PoliciesController@saveDocument');
    Route::post('policies/updateDocument/{id}/{pid}', 'Admin\PoliciesController@updateDocument');
    Route::post('policies/deleteDocument/{id}', 'Admin\PoliciesController@deleteDocument');
    Route::post('policies/saveComments/{id}', 'Admin\PoliciesController@saveComments');
    Route::post('policies/updateComment/{id}/{pid}', 'Admin\PoliciesController@updateComment');
    Route::post('policies/deleteComment/{id}', 'Admin\PoliciesController@deleteComment');
    Route::post('policies/savePlan/{id}', 'Admin\PoliciesController@savePlan');
    Route::post('policies/updatePlan/{id}/{pid}', 'Admin\PoliciesController@updatePlan');
    Route::post('policies/deletePlan/{id}', 'Admin\PoliciesController@deletePlan');
    Route::post('policies/savePayment/{id}', 'Admin\PoliciesController@savePayment');
    Route::post('policies/updatePayment/{id}/{pid}', 'Admin\PoliciesController@updatePayment');
    Route::post('policies/deletePayment/{id}', 'Admin\PoliciesController@deletePayment');
    Route::get('policies/addpaymentExcel/{id}', 'Admin\PoliciesController@addpaymentExcel');
    Route::get('policies/paymentplanExcel/{id}', 'Admin\PoliciesController@paymentplanExcel');
    Route::post('policies/policiesExcel', 'Admin\PoliciesController@policiesExcel');
    Route::post('policies/getSearch/{type}/{dates}', 'Admin\PoliciesController@getSearch');

    //configuration-type of people
    Route::resource('peoples', 'Admin\Configuration\PeoplesController');
    Route::post('peoples/destroy/{id}', 'Admin\Configuration\PeoplesController@destroy');
    //configuration-type of document
    Route::resource('documents', 'Admin\Configuration\DocumentsController');
    Route::post('documents/destroy/{id}', 'Admin\Configuration\DocumentsController@destroy');
    //configuration-type of profession
    Route::resource('professions', 'Admin\Configuration\ProfessionsController');
    Route::post('professions/destroy/{id}', 'Admin\Configuration\ProfessionsController@destroy');
    //configuration-type of provinces
    Route::resource('provinces', 'Admin\Configuration\ProvincesController');
    Route::post('provinces/destroy/{id}', 'Admin\Configuration\ProvincesController@destroy');
    //configuration-type of subagents
    Route::resource('subagents', 'Admin\Configuration\SubagentsController');
    Route::post('subagents/destroy/{id}', 'Admin\Configuration\SubagentsController@destroy');
});
