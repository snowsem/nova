<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web', 'auth']], function () {


    Route::get('/', 'UserController@index');
    Route::post('/search', 'SearchController@search');
    Route::get('/admin/add_ticket','AdminController@addTicket');
    Route::get('ajax', 'UserController@ajax');

    //Client route
    Route::get('clients', 'ClientController@index');
    Route::get('clients/add', 'ClientController@addClient');
    Route::post('clients/add', 'ClientController@addClientPost');
    //Client route Card
    Route::get('client/{id}', 'ClientCardController@index');
    Route::get('client/{id}/add_telephone', 'ClientCardController@addTelephone');
    Route::post('client/{id}/add_telephone', 'ClientCardController@addTelephonePost');
    Route::get('remove_telephone/{id}', 'RemoveController@telephone');
    Route::get('edit_telephone/{id}', 'RemoveController@editTelephone');
    Route::post('edit_telephone/{id}', 'RemoveController@editTelephonePost');

    Route::get('client/{id}/add_email', 'ClientCardController@addEmail');
    Route::post('client/{id}/add_email', 'ClientCardController@addEmailPost');

    Route::get('remove_email/{id}', 'RemoveController@email');
    Route::get('edit_email/{id}', 'RemoveController@editEmail');
    Route::post('edit_email/{id}', 'RemoveController@editEmailPost');


    Route::get('client/{id}/add_link', 'ClientCardController@addLink');
    Route::post('client/{id}/add_link', 'ClientCardController@addLinkPost');
    Route::get('remove_link/{id}', 'RemoveController@link');
    Route::get('edit_link/{id}', 'RemoveController@editLink');
    Route::post('edit_link/{id}', 'RemoveController@editLinkPost');

    Route::get('client/{id}/edit_name', 'ClientCardController@editName');
    Route::post('client/{id}/edit_name', 'ClientCardController@editNamePost');

    Route::get('client/{id}/edit_info', 'ClientCardController@editInfo');
    Route::post('client/{id}/edit_info', 'ClientCardController@editInfoPost');

    Route::get('client/{id}/add_contact', 'ClientCardController@addContact');
    Route::post('client/{id}/add_contact', 'ClientCardController@addContactPost');
    //связи
    Route::get('client/{id}/add_relation', 'ClientCardController@addRelation');
    Route::post('client/{id}/add_relation', 'ClientCardController@addRelationPost');




    Route::get('client/{id}/add_address', 'ClientCardController@addAddress');
    Route::post('client/{id}/add_address', 'ClientCardController@addAddressPost');

    Route::get('client/{id}/edit_address', 'ClientCardController@editAddress');
    Route::post('client/{id}/edit_address', 'ClientCardController@editAddressPost');

    //Contact route
    Route::get('contacts', 'ContactController@index');

    Route::get('contacts/add', 'ContactController@addContact');
    Route::post('contacts/add_contact', 'ContactController@addContactPost');
    Route::get('contact/{id}', 'ContactCardController@index');


    Route::get('contact/{id}/add_telephone', 'ContactCardController@addTelephone');
    Route::post('contact/{id}/add_telephone', 'ContactCardController@addTelephonePost');




    Route::get('contact/{id}/add_email', 'ContactCardController@addEmail');
    Route::post('contact/{id}/add_email', 'ContactCardController@addEmailPost');
    Route::get('contact/{id}/add_link', 'ContactCardController@addLink');
    Route::post('contact/{id}/add_link', 'ContactCardController@addLinkPost');

    Route::get('contact/{id}/edit_name', 'ContactCardController@editName');
    Route::post('contact/{id}/edit_name', 'ContactCardController@editNamePost');
    Route::get('contact/{id}/edit_info', 'ContactCardController@editInfo');
    Route::post('contact/{id}/edit_info', 'ContactCardController@editInfoPost');

    Route::get('contact/{id}/add_workplace', 'ContactCardController@addWorkplace');
    Route::post('contact/{id}/add_workplace', 'ContactCardController@addWorkplacePost');
    Route::get('contact/{id}/edit_workplace', 'ContactCardController@editWorkplace');
    Route::post('contact/{id}/edit_workplace', 'ContactCardController@editWorkplacePost');
    Route::post('ajax/select_client/{name?}', 'ContactCardController@ajaxGetClient');
    Route::post('ajax/select_wp/{name?}', 'ContactCardController@ajaxGetWP');
    Route::post('ajax/select_relation/{name?}', 'ClientCardController@ajaxGetRelation');


    //Bill
    Route::get('bills', 'BillController@index');
    Route::get('bill/add/{id}', 'BillController@addBill');
    Route::post('bill/add/{id}', 'BillController@addBillPost');

    // ID = ID Bill Table
    Route::get('bill/edit/{id}', 'BillController@editBill');
    Route::post('bill/edit/{id}', 'BillController@editBillPost');

    //Purchase
    Route::get('purchase', 'PurchaseController@index');
    Route::get('purchase/add/{id}', 'PurchaseController@add');
    Route::post('purchase/add/{id}', 'PurchaseController@addPost');
    Route::get('purchase/edit/{id}', 'PurchaseController@edit');
    Route::post('purchase/edit/{id}', 'PurchaseController@editPost');

    //Call
    Route::get('calls', 'CallController@index');
    Route::get('call/add/{param}/{id}', 'CallController@add');
    Route::post('call/add/{param}/{id}', 'CallController@addPost');
    Route::get('call/edit/{param}/{id}/{cid}', 'CallController@edit');
    Route::post('call/edit/{param}/{id}', 'CallController@editPost');
   // Route::post('purchase/edit/{id}', 'PurchaseController@editPost');

    //File Controller
    Route::get('file/add/{param}/{id}', 'FileController@add');
    Route::get('file/get/{filename}/', 'FileController@get');
    Route::post('file/add', 'FileController@addPost');

    //Mails
    Route::get('mail', 'MailController@index');
    Route::get('mail/get/{id}/', 'MailController@readMessage');
    Route::get('mail/renderMessage/{id}/', 'MailController@renderMessage');

});

Route::group(['middleware' => ['web']], function () {

Route::get('login', 'UserController@login');
Route::get('reg', 'UserController@reg');
Route::get('logout', 'UserController@logout');
Route::post('login', 'UserController@loginPost');
Route::post('reg', 'UserController@regPost');

});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


