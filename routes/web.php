<?php

use Illuminate\Support\Facades\Route;

// front ( landing )
use App\Http\Controllers\Landing\LandingController;

// member ( dashboard )
use App\Http\Controllers\Dashboard\MemberController;
use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\RequestController;
use App\Http\Controllers\Dashboard\MyOrderController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Reputation\ReputationController;


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









Route::middleware(['auth'])->group(function () {
    Route::get('detail_booking/{id}', [LandingController::class, 'detail_booking'])->name('detail.booking.landing');
	Route::get('booking/{id}', [LandingController::class, 'booking'])->name('booking.landing');
	Route::get('detail/{id}', [LandingController::class, 'detail'])->name('detail.landing');
	Route::get('explore', [LandingController::class, 'explore'])->name('explore.landing');
	Route::post('detail/{id}/offer', [LandingController::class, 'store'])->name('offer.landing');
	//Route::get('explore', [LandingController::class, 'index'])->name('explore.landing');
	Route::get('member/request/reputation', [RequestController::class, 'reputation'])->name('reputation.create');
	Route::post('member/request/reputation', [RequestController::class, 'reputation_store'])->name('reputation.add');

});



Route::resource('/', LandingController::class);

Route::post('accept/order/{id}', [MyOrderController::class, 'accepted'])->name('accept.order');
Route::post('reject/order/{id}', [MyOrderController::class, 'rejected'])->name('reject.order');

Route::post('accept/service/{id}', [ServiceController::class, 'accepted'])->name('accept.service');

Route::group(['prefix' => 'member', 'as' => 'member.', 'middleware' => ['auth:sanctum', 'verified']], function () {

	// dashboard
	Route::resource('dashboard', MemberController::class);

	// service
	Route::resource('service', ServiceController::class);

	// request
	//Route::get('approve_request/{id}', [RequestController::class, 'approve'])->name('approve.request');
	Route::resource('request', RequestController::class);
	
	//reputation
	//Route::resource('reputation', ReputationController::class);
	

	// my order
	
	Route::resource('order', MyOrderController::class);

	// profile
	Route::get('delete_photo', [ProfileController::class, 'delete'])->name('delete.photo.profile');
	Route::resource('profile', ProfileController::class);
});

Route::group(['prefix' => 'reputation', 'as' => 'reputations.', 'middleware' => 'auth'], function () {
    Route::get('/show', [ReputationController::class, 'index'])->name('index');
    Route::get('taking/{id}', [ReputationController::class, 'taking'])->name('get');
    Route::post('taking/{id}/get/money', [ReputationController::class, 'store'])->name('money');
    // Diğer rotalar...
});





// Route::get('/', function () {
// 	return view('welcome');
// });

// Route::middleware([
// 	'auth:sanctum',
// 	config('jetstream.auth_session'),
// 	'verified'
// ])->group(function () {
// 	Route::get('/dashboard', function () {
// 		return view('dashboard');
// 	})->name('dashboard');
// });
