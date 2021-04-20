<?php

use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminSaleManagementComponent;
use App\Http\Livewire\Admin\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminCreateCategoryComponent;
use App\Http\Livewire\Admin\Category\AdminEditCategory;
use App\Http\Livewire\Admin\HomeSlider\AdminCreateHomeSliderComponent;
use App\Http\Livewire\Admin\HomeSlider\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\HomeSlider\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\Product\AdminCreateProductComponent;
use App\Http\Livewire\Admin\Product\AdminEditProductComponent;
use App\Http\Livewire\Admin\Product\AdminProductsComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ProductDetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\WishlistComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified', 'isAdmin'])->prefix('/admin')->name('admin.')->group(function () {
    Route::get('dashboard', AdminDashboardComponent::class)->name('dashboard');
    Route::get('categories', AdminCategoryComponent::class)->name('categories');
    Route::get('categories/create', AdminCreateCategoryComponent::class)->name('categories.create');
    Route::get('categories/{category:slug}/edit', AdminEditCategory::class)->name('categories.edit');
    Route::get('products', AdminProductsComponent::class)->name('products');
    Route::get('products/create', AdminCreateProductComponent::class)->name('products.create');
    Route::get('products/{product:slug}/edit', AdminEditProductComponent::class)->name('products.edit');
    Route::get('home-sliders', AdminHomeSliderComponent::class)->name('home-sliders');
    Route::get('home-sliders/create', AdminCreateHomeSliderComponent::class)->name('home-sliders.create');
    Route::get('home-sliders/{homeSlider}/edit', AdminEditHomeSliderComponent::class)->name('home-sliders.edit');
    Route::get('sale-management', AdminSaleManagementComponent::class)->name('sale-management');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('/user')->name('user.')->group(function () {
    Route::get('dashboard', UserDashboardComponent::class)->name('dashboard');
});
Route::get('/', HomeComponent::class);
Route::get('/shop', ShopComponent::class);
Route::get('/shop/categories/{slug}', ShopComponent::class)->name('shop.category');
Route::get('/cart', CartComponent::class)->name('cart');
Route::get('/wishlist', WishlistComponent::class)->name('wishlist');
Route::get('/checkout', CheckoutComponent::class);
Route::get('/products/search', SearchComponent::class)->name('products.search');
Route::get('/products/{slug}', ProductDetailsComponent::class)->name('products.details');
