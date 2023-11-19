<?php

use App\Http\Controllers\Account\AccountSetting;
use App\Http\Controllers\Account\LoginController;
use App\Http\Controllers\Account\LogoutController;
use App\Http\Controllers\Account\OrderTrackingController;
use App\Http\Controllers\Account\RegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DataBoardController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\ReviewController;
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

//Client
Route::prefix('bookstore')->group(function(){
    Route::get('index', [ClientController::class,'index'])->name('index');
    Route::get('category', [ClientController::class,'category'])->name('category');
    Route::get('book-detail/{id}', [ClientController::class,'bookDetail'])->name('bookdetail');
    Route::get('check-out', [ClientController::class,'checkOut'])->name('checkout');
    Route::get('wish-list', [ClientController::class,'wishList'])->name('wishlist');

    //Cart
    Route::get('/cart', [CartController::class,'index'])->name('Cart.index');
    Route::POST('/add-to-cart', [CartController::class,'addToCart'])->name('Cart.add');
    Route::delete('/remove-cart', [CartController::class,'remove'])->name('Cart.remove');
    Route::patch('/update-cart', [CartController::class,'update'])->name('Cart.update');


    //Checkout
    Route::post('/payment', [CheckoutController::class,'checkout'])->name('payment');
    Route::get('/handlePayment', [CheckoutController::class,'handlePayment'])->name('handlePayment');

    //Comment
    Route::post('/book-detail/comment', [ReviewController::class,'pushComment'])->name('pushComment');
    //End comment

    //Search
    Route::post('/search', [ClientController::class,'getBooksBySearch'])->name('Client.search');
    Route::post('/filter', [ClientController::class,'getBooksByFilter'])->name('Client.filter');
});

//Admin
Route::middleware(['auth'])->group(function(){
    Route::prefix('admin')->group(function(){
        Route::get('databoard',[DataBoardController::class,'databoard'])->name('adminDataboard');

        //Category
        Route::get('category',[CategoryController::class,'category'])->name('adminCategory');
        Route::get('remove-category/{id}',[CategoryController::class,'remove'])->name('remveCategory');
        Route::match(['GET','POST'], 'add-category',[CategoryController::class,'add'])->name('addCategory');
        Route::match(['GET','POST'], 'edit-category/{id}',[CategoryController::class,'edit'])->name('editCategory');

        //End Category

        //Authors
        Route::get('authors',[AuthorController::class,'author'])->name('adminAuthor');
        Route::get('author-remove/{id}',[AuthorController::class,'remove'])->name('removeAuthor');
        Route::match(['GET','POST'], 'authors-add',[AuthorController::class,'add'])->name('addAuthor');
        Route::match(['GET','POST'], 'authors-edit/{id}',[AuthorController::class,'edit'])->name('editAuthor');
        //End Authors

        //Books
        Route::get('books',[BooksController::class,'books'])->name('adminBooks');
        Route::get('books-remove/{id}',[BooksController::class,'remove'])->name('removeBook');
        Route::match(['GET','POST'],'books-add',[BooksController::class,'add'])->name('addBooks');
        Route::match(['GET','POST'],'books-edit/{id}',[BooksController::class,'edit'])->name('editBooks');
        //End Books

        //Banners
        Route::get('banners', [BannersController::class, 'banners'])->name('adminBanners');
        Route::get('banners-remove/{id}', [BannersController::class, 'remove'])->name('removeBanner');
        Route::match(['GET', 'POST'],'banners-add', [BannersController::class, 'add'])->name('addBanners');
        //End Banner

        //Orders
        Route::get('orders', [OrdersController::class,'index'])->name('Admin.orders');
        Route::get('orders-update/{id}', [OrdersController::class,'updateStatus'])->name('Admin.updateStatus');
        //End order

        //User
        Route::get('list-user',[UserController::class,'listUser'])->name('adminListUser');
        Route::post('user-update-status', [UserController::class,'updateUser'])->name('Admin.updateUser.status');
        Route::post('user-update-role', [UserController::class,'updateRole'])->name('Admin.updateUser.role');
        //End User


        //Comment
        Route::get('/comments', [ReviewController::class,'index'])->name('Admin.comments');
        Route::get('/comments-actions/{id}', [ReviewController::class,'actionComment'])->name('Admin.actionComment');
        //End comment
    });

    Route::get('profile-setting', [AccountSetting::class, 'profileSetting'])->name('profileSetting');
    Route::match(['GET','POST'],'profile-setting/change-password', [AccountSetting::class, 'changePassword'])->name('changePassword');

    Route::get('/orders-tracking', [OrderTrackingController::class,'index'])->name('orderTracking');

    Route::post('/person-profile', [AccountSetting::class,'updateProfile'])->name('updateProfile');
});

//Account
Route::match(['GET','POST'], 'login',[LoginController::class,'login'])->name('login');
Route::match(['GET','POST'], 'register',[RegisterController::class,'register'])->name('register');
Route::get('logout', [LogoutController::class,'logout'])->name('logout');



