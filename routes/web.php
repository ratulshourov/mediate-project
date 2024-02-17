<?php

use App\Http\Controllers\Admin\EventControlController;
use App\Http\Controllers\Admin\ProductControlController;
use App\Http\Controllers\Admin\userControlController;
use App\Http\Controllers\Admin\TextControlController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoChatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/calender-event', function () {
    return view('calender-event');
});
Route::get('/front', function () {
    return view('layouts.frontend');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/charge', function () {
    return view('charge');
});

Route::post('/charge', function (Request $request) {
    // Set your Stripe API key.
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    // Get the payment amount and email address from the form.
    $amount = $request->input('amount') * 100;
    $email = $request->input('email');

    // Create a new Stripe customer.
    $customer = \Stripe\Customer::create([
        'email' => $email,
        'source' => $request->input('stripeToken'),
    ]);
    
    // Create a new Stripe charge.
    $charge = \Stripe\Charge::create([
        'customer' => $customer->id,
        'amount' => $amount,
        'currency' => 'usd',
    ]);

    // Display a success message to the user.
    return 'Payment successful!';
});
Route::group(['middleware' => 'auth'], function(){
    Route::get('video_chat', [VideoChatController::class,'index']);
    Route::post('auth/video_chat',[VideoChatController::class,'auth']);

    Route::post('/save-event', [EventController::class,'saveEvent'])->name('save.event');
    Route::post('/edit-event/{id}', [EventController::class,'editEvent'])->name('edit.event');
    Route::get('/delete-event/{id}', [EventController::class,'deleteEvent'])->name('delete.event');

});

Route::group(['middleware' => ['auth','is_admin']], function () {

    Route::get('/admin/dashboard',[HomeController::class, 'adminIndex'])->name('admin.dashboard');

    //======================= User Routes =======================//
    Route::get('/admin/view-users',[userControlController::class, 'viewUsers'])->name('admin.users');
    // Route::post('/admin/add-user',[userControlController::class, 'saveUser'])->name('save.user');
    // Route::get('/admin/edit-user/{id}',[userControlController::class, 'editUser'])->name('edit.user');
    // Route::post('/admin/update-user/{id}',[userControlController::class, 'updateUser'])->name('update.user');
    // Route::get('/admin/delete-user/{id}',[userControlController::class, 'deleteUser'])->name('delete.user');
    Route::get('/admin/make-user-active/{id}', [userControlController::class, 'activeUser'])->name('active.user');
    Route::get('/admin/make-user-deactive/{id}', [userControlController::class, 'deactiveUser'])->name('deactive.user');

    //======================= Text Routes =======================//
    Route::get('/admin/view-texts',[TextControlController::class, 'viewTexts'])->name('admin.texts');
    Route::post('/admin/add-text',[TextControlController::class, 'saveText'])->name('save.text');
    Route::get('/admin/edit-text/{id}',[TextControlController::class, 'editText'])->name('edit.text');
    Route::post('/admin/update-text/{id}',[TextControlController::class, 'updateText'])->name('update.text');
    Route::get('/admin/delete-text/{id}',[TextControlController::class, 'deleteText'])->name('delete.text');
    Route::get('/admin/make-text-active/{id}', [TextControlController::class, 'activeText'])->name('active.text');
    Route::get('/admin/make-text-deactive/{id}', [TextControlController::class, 'deactiveText'])->name('deactive.text');

    //======================= Events Routes =======================//
    Route::get('/admin/view-bookings',[EventControlController::class, 'viewBookings'])->name('admin.bookings');
    // Route::post('/admin/add-user',[userControlController::class, 'saveUser'])->name('save.user');
    // Route::get('/admin/edit-user/{id}',[userControlController::class, 'editUser'])->name('edit.user');
    // Route::post('/admin/update-user/{id}',[userControlController::class, 'updateUser'])->name('update.user');
    // Route::get('/admin/delete-user/{id}',[userControlController::class, 'deleteUser'])->name('delete.user');
    Route::get('/admin/make-booking-active/{id}', [userControlController::class, 'activeBooking'])->name('active.booking');
    Route::get('/admin/make-booking-deactive/{id}', [userControlController::class, 'deactiveBooking'])->name('deactive.booking');
});