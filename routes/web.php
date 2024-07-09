<?php



use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;

use App\Http\Middleware\CheckUserCart;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductsController;
use \App\Http\Middleware\CheckRole;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

    Route::get('/', [HomeController::class, 'index'])->name('home');
Auth::routes(['verify' => true]);
// Route::group(['middleware' => ['auth', 'verified']], function () {
//     // Các route yêu cầu người dùng phải đăng nhập và xác thực email
//     Route::get('/', [HomeController::class, 'index'])->name('home');
// });

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/user/{id}', [UserController::class, 'index'])->name('user');
Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('edit_user');
Route::post('/updateuser/{id}', [UserController::class, 'update'])->name('update_user');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/products', [ProductsController::class, 'list'])->name('products');
Route::get('/products/{id}', [ProductsController::class, 'detail'])->name('productsdetail');
Route::get('/categories/{category_id}', [ProductsController::class, 'getproductsBycategory'])->name('categories');
Route::get('/search', [ProductsController::class, 'search'])->name('search');


Route::group(['prefix' => 'cart', 'middleware' => CheckUserCart::class], function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/delete/{product}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
});
Route::group(['prefix' => 'order', 'middleware' => CheckUserCart::class], function () {
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('order.checkout');
    Route::get('/history', [CheckoutController::class, 'history'])->name('order.history');
    Route::get('/detail/{user_id}/{order}', [CheckoutController::class, 'detail'])->name('order.detail');
    Route::get('/verify/{token}', [CheckoutController::class, 'verify'])->name('order.verify');
    Route::post('/checkout', [CheckoutController::class, 'post_checkout'])->name('order.post_checkout');
    Route::get('/thank', [CheckoutController::class, 'thank'])->name('thank');
    Route::get('status/{order}', [CheckoutController::class, 'update_status'])->name('update_status');
});


// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', CheckRole::class]], function () {
    //sản phẩm
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/productlist', [ProductController::class, 'index'])->name('productlist');
    Route::get('/addproduct', [ProductController::class, 'add'])->name('addproduct');
    Route::post('/addproduct', [ProductController::class, 'store'])->name('addproduct');
    Route::get('/editproduct/{id}', [ProductController::class, 'edit'])->name('editproduct');
    Route::post('/updateproduct/{id}', [ProductController::class, 'update'])->name('updateproduct');
    Route::delete('/deleteproduct/{id}', [ProductController::class, 'delete'])->name('deleteproduct');
    Route::get('/delete-old-image/{id}', [ProductController::class, 'deleteOldImage'])->name('delete_old_image');

    //danh mục
    Route::get('/categorylist', [CategoryController::class, 'index'])->name('categorylist');
    Route::get('/addcategory', [CategoryController::class, 'add'])->name('addcategory');
    Route::post('/addcategory', [CategoryController::class, 'store'])->name('addcategory');
    Route::get('/editcategory/{id}', [CategoryController::class, 'edit'])->name('editcategory');
    Route::post('/updatecategory/{id}', [CategoryController::class, 'update'])->name('updatecategory');
    Route::delete('/deletecategory/{id}', [CategoryController::class, 'delete'])->name('deletecategory');

    //Đơn hàng
    Route::get('/order', [OrderController::class, 'index'])->name('orderlist');
    Route::get('/order/detail/{order}', [OrderController::class, 'detail'])->name('orderdetail');
    Route::get('/order/status/{order}', [OrderController::class, 'update'])->name('orderupdate');
});


