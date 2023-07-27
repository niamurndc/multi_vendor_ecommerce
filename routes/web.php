<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CurrierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\SmsItemController;
use App\Http\Controllers\SmsListController;
use App\Http\Controllers\WithdrawController;
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

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class, 'index']);
Route::get('/shop', [App\Http\Controllers\Frontend\HomeController::class, 'shop']);
Route::get('/product-campaign', [App\Http\Controllers\Frontend\HomeController::class, 'campaign']);
Route::get('/product-offer', [App\Http\Controllers\Frontend\HomeController::class, 'discount']);
Route::get('/product/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'details']);
Route::get('/category/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'category']);
Route::get('/brand/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'brand']);
Route::get('/search', [App\Http\Controllers\Frontend\HomeController::class, 'search']);

// user font auth route
//***************
Route::get('/review', [App\Http\Controllers\Frontend\HomeController::class, 'review'])->middleware('auth');
Route::get('/track-order', [App\Http\Controllers\Frontend\HomeController::class, 'trackorder'])->middleware('auth');
Route::post('/track-order', [App\Http\Controllers\Frontend\HomeController::class, 'trackorderpost']);
Route::get('/cart', [App\Http\Controllers\Frontend\HomeController::class, 'cart']);
Route::get('/add-cart/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'addcart']);
Route::get('/buy-now/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'buynow']);
Route::post('/add-cart/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'addcartpost']);
Route::post('/buy-now/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'buynowpost']);
Route::post('/cart/update/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'updatecart']);
Route::get('/cart/delete/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'deleteCart']);
Route::get('/page/{name}', [App\Http\Controllers\Frontend\HomeController::class, 'showPage']);

// auth user route
// *****************
Route::get('/checkout', [App\Http\Controllers\Frontend\HomeController::class, 'checkout'])->middleware('auth');
Route::get('/order', [App\Http\Controllers\Frontend\HomeController::class, 'order'])->middleware('auth');
Route::post('/order', [App\Http\Controllers\Frontend\HomeController::class, 'postorder'])->middleware('auth');
Route::get('/payment/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'payment'])->middleware('auth');
Route::post('/payment/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'givepayment'])->middleware('auth');
Route::get('/payment-method/{method}/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'paymentmethod'])->middleware('auth');
Route::post('/payment-method/{method}/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'postpaymentmethod'])->middleware('auth');
Route::get('/profile', [App\Http\Controllers\Frontend\HomeController::class, 'profile'])->middleware('auth');
Route::post('/profile', [App\Http\Controllers\Frontend\HomeController::class, 'updateprofile'])->middleware('auth');
Route::get('/save-later', [App\Http\Controllers\Frontend\HomeController::class, 'saveList'])->middleware('auth');
Route::get('/save-later/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'saveListId'])->middleware('auth');
Route::get('/save-later/delete/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'saveListDelete'])->middleware('auth');
Route::get('/address', [App\Http\Controllers\Frontend\HomeController::class, 'address'])->middleware('auth');
Route::get('/add-address', [App\Http\Controllers\Frontend\HomeController::class, 'addaddress'])->middleware('auth');
Route::post('/add-address', [App\Http\Controllers\Frontend\HomeController::class, 'addresspost'])->middleware('auth');
Route::post('/set-address', [App\Http\Controllers\Frontend\HomeController::class, 'setaddress'])->middleware('auth');
Route::post('/add-review', [App\Http\Controllers\Frontend\HomeController::class, 'reviewpost'])->middleware('auth');
Route::get('/review/delete/{id}', [App\Http\Controllers\Frontend\HomeController::class, 'deletereview'])->middleware('auth');


// auth routes
// **************

Route::get('/forgot', [\App\Http\Controllers\Auth\PasswordController::class, 'forgot']);
Route::post('/forgot', [\App\Http\Controllers\Auth\PasswordController::class, 'forgotpost']);
Route::get('/reset-pass', [\App\Http\Controllers\Auth\PasswordController::class, 'reset']);
Route::post('/reset-pass', [\App\Http\Controllers\Auth\PasswordController::class, 'resetpass']);

Route::get('/varify', [\App\Http\Controllers\Auth\PasswordController::class, 'varify'])->middleware('auth');
Route::post('/varify', [\App\Http\Controllers\Auth\PasswordController::class, 'varifypost']);

Auth::routes();

Route::get('/home', function(){return redirect('/order');})->name('home');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');

/*
|--------------------------------------------------------------------------
| Seller Routes
|--------------------------------------------------------------------------
|
| Here I put admin routes serially
|
*/

// seller auth
Route::get('/seller/login', [App\Http\Controllers\Frontend\SellerController::class, 'login']);
Route::get('/seller/register', [App\Http\Controllers\Frontend\SellerController::class, 'register']);
Route::post('/seller/register', [App\Http\Controllers\Frontend\SellerController::class, 'store']);


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here I put admin routes serially
|
*/

// Admin Brands Route
// ************************

Route::get('/admin/brands', [BrandController::class, 'index']);
Route::post('/admin/brand/create', [BrandController::class, 'store']);
Route::get('/admin/brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('/admin/brand/edit/{id}', [BrandController::class, 'update']);
Route::get('/admin/brand/delete/{id}', [BrandController::class, 'delete']);


// Admin Payment Route
// ************************

Route::get('/admin/payments', [PaymentController::class, 'index']);
Route::post('/admin/payment/create', [PaymentController::class, 'store']);
Route::get('/admin/payment/edit/{id}', [PaymentController::class, 'edit']);
Route::post('/admin/payment/edit/{id}', [PaymentController::class, 'update']);
Route::get('/admin/payment/delete/{id}', [PaymentController::class, 'delete']);

// Admin Category Route
// ************************

Route::get('/admin/categories', [CategoryController::class, 'index']);
Route::post('/admin/category/create', [CategoryController::class, 'store']);
Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/admin/category/edit/{id}', [CategoryController::class, 'update']);
Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete']);

// Admin Area Route
// ************************

Route::get('/admin/areas', [AreaController::class, 'index']);
Route::post('/admin/area/create', [AreaController::class, 'store']);
Route::get('/admin/area/edit/{id}', [AreaController::class, 'edit']);
Route::post('/admin/area/edit/{id}', [AreaController::class, 'update']);
Route::get('/admin/area/delete/{id}', [AreaController::class, 'delete']);

// Admin Product Route
// ************************

Route::get('/admin/products', [ProductController::class, 'index']);
Route::get('/admin/product/create', [ProductController::class, 'create']);
Route::post('/admin/product/create', [ProductController::class, 'store']);
Route::get('/admin/product/edit/{id}', [ProductController::class, 'edit']);
Route::post('/admin/product/edit/{id}', [ProductController::class, 'update']);
Route::get('/admin/product/delete/{id}', [ProductController::class, 'delete']);

// Admin Customer Route
// ************************

Route::get('/admin/customers', [CustomerController::class, 'index']);
Route::get('/admin/customer/edit/{id}', [CustomerController::class, 'edit']);
Route::post('/admin/customer/edit/{id}', [CustomerController::class, 'update']);
Route::get('/admin/customer/delete/{id}', [CustomerController::class, 'delete']);

// Admin Seller Route
// ************************

Route::get('/admin/sellers', [SellerController::class, 'index']);
Route::get('/admin/seller/edit/{id}', [SellerController::class, 'edit']);
Route::post('/admin/seller/edit/{id}', [SellerController::class, 'update']);
Route::get('/admin/seller/delete/{id}', [SellerController::class, 'delete']);


// Admin Withdraw Route
// ************************

Route::get('/admin/withdraws', [WithdrawController::class, 'index']);
Route::get('/admin/withdraw/add', [WithdrawController::class, 'create']);
Route::post('/admin/withdraw/add', [WithdrawController::class, 'store']);
Route::get('/admin/withdraw/view/{id}', [WithdrawController::class, 'view']);
Route::post('/admin/withdraw/edit/{id}', [WithdrawController::class, 'update']);


// Admin Category Route
// ************************

Route::get('/admin/curriers', [CurrierController::class, 'index']);
Route::post('/admin/currier/create', [CurrierController::class, 'store']);
Route::get('/admin/currier/edit/{id}', [CurrierController::class, 'edit']);
Route::post('/admin/currier/edit/{id}', [CurrierController::class, 'update']);
Route::get('/admin/currier/delete/{id}', [CurrierController::class, 'delete']);

// Admin Order Route
// ************************

Route::get('/admin/orders', [OrderController::class, 'index']);
Route::get('/admin/order/edit/{id}', [OrderController::class, 'edit']);
Route::post('/admin/order/edit/{id}', [OrderController::class, 'update']);
Route::get('/admin/order/delete/{id}', [OrderController::class, 'delete']);


// Admin Inventory Route
// ************************

Route::get('/admin/inventories', [InventoryController::class, 'index']);
Route::post('/admin/inventories', [InventoryController::class, 'filter']);
Route::get('/admin/inventories/category', [InventoryController::class, 'categoryindex']);
Route::post('/admin/inventories/category', [InventoryController::class, 'categoryfilter']);
Route::get('/admin/inventories/brand', [InventoryController::class, 'brandindex']);
Route::post('/admin/inventories/brand', [InventoryController::class, 'brandfilter']);
Route::post('/admin/inventory/edit/{id}', [InventoryController::class, 'update']);
Route::get('/admin/inventory/delete/{id}', [InventoryController::class, 'delete']);

// Admin Report Route
// ************************

Route::get('/admin/report/sell', [ReportController::class, 'sell']);
Route::post('/admin/report/sell', [ReportController::class, 'sellfilter']);
Route::get('/admin/report/due-sell', [ReportController::class, 'dueSell']);
Route::get('/admin/report/product-sell', [ReportController::class, 'product']);
Route::post('/admin/report/product-sell', [ReportController::class, 'productfilter']);
Route::get('/admin/report/purshace', [ReportController::class, 'purshace']);
Route::post('/admin/report/purshace', [ReportController::class, 'purshacefilter']);


// Admin Backup Route
// ************************

Route::get('/admin/backups', [BackupController::class, 'index']);
Route::get('/admin/backup/create', [BackupController::class, 'store']);
Route::get('/admin/backup/download/{file_name}', [BackupController::class, 'download']);
Route::get('/admin/backup/delete/{file_name}', [BackupController::class, 'delete']);

// Admin Review Route
// ************************

Route::get('/admin/reviews', [ProductReviewController::class, 'index']);
Route::get('/admin/review/delete/{id}', [ProductReviewController::class, 'delete']);

// Admin Slider Route
// ************************

Route::get('/admin/sliders', [SliderController::class, 'index']);
Route::post('/admin/slider/create', [SliderController::class, 'store']);
Route::get('/admin/slider/edit/{id}', [SliderController::class, 'edit']);
Route::post('/admin/slider/edit/{id}', [SliderController::class, 'update']);
Route::get('/admin/slider/delete/{id}', [SliderController::class, 'delete']);


// Admin Feature Route
// ************************

Route::get('/admin/feature', [FeatureController::class, 'index']);
Route::post('/admin/feature/edit/{id}', [FeatureController::class, 'edit']);

// Admin Setting Route
// ************************

Route::get('/admin/settings', [SettingController::class, 'index']);
Route::post('/admin/setting/edit', [SettingController::class, 'edit']);

// Admin Setting Route
// ************************

Route::get('/admin/seo', [SeoController::class, 'index']);
Route::post('/admin/seo/edit', [SeoController::class, 'edit']);

// Admin Page Route
// ************************

Route::get('/admin/pages', [PageController::class, 'index']);
Route::post('/admin/page/edit', [PageController::class, 'edit']);

// admin profile route
// ***********************
Route::get('/admin/profile', [App\Http\Controllers\ProfileController::class, 'profile']);
Route::post('/admin/profile', [App\Http\Controllers\ProfileController::class, 'update']);

// Admin SMS Setting Route
// ************************

Route::get('/admin/sms/setting', [App\Http\Controllers\SmsController::class, 'setting']);
Route::post('/admin/sms/setting', [App\Http\Controllers\SmsController::class, 'editSetting']);

// Admin Sms List Route
// ************************

Route::get('/admin/sms-lists', [SmsListController::class, 'index']);
Route::post('/admin/sms-list/create', [SmsListController::class, 'store']);
Route::get('/admin/sms-list/view/{id}', [SmsListController::class, 'view']);
Route::get('/admin/sms-list/edit/{id}', [SmsListController::class, 'edit']);
Route::post('/admin/sms-list/edit/{id}', [SmsListController::class, 'update']);
Route::get('/admin/sms-list/delete/{id}', [SmsListController::class, 'delete']);

// Admin Sms list item Route
// ************************

Route::post('/admin/sms-item/create/{id}', [SmsItemController::class, 'store']);
Route::get('/admin/sms-item/delete/{id}', [SmsItemController::class, 'delete']);

// Admin Sms send Route
// ************************

Route::get('/admin/sms-send', [SmsController::class, 'getsms']);
Route::post('/admin/sms-send', [SmsController::class, 'sendsms']);