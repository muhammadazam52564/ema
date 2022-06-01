<?php
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=> 'sadmin', 'middleware'=>['IsSuperAdmin', 'auth', 'PreventBackHistory']], function()
{
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('sadmin.dashboard');
    Route::get('/branches', [SuperAdminController::class, 'branches'])->name('sadmin.branches');
    Route::get('/add-branch', [SuperAdminController::class, 'add_branch'])->name('sadmin.add-branch');
    Route::post('/add-branch', [SuperAdminController::class, 'save_branch'])->name('sadmin.add-branch');
    Route::get('/del-branch/{id}', [SuperAdminController::class, 'del_branch'])->name('sadmin.del-branch');
    Route::get('/block-branch/{id}/{status}', [SuperAdminController::class, 'block_branch'])->name('admin.block-branch');
    Route::get('/change-password', [SuperAdminController::class, 'change_password'])->name('sadmin.change-password');
    Route::post('/change-password', [SuperAdminController::class, 'update_password'])->name('sadmin.change-password');
    Route::get('/change-email', [SuperAdminController::class, 'change_email'])->name('sadmin.change-email');
    Route::post('/change-email', [SuperAdminController::class, 'update_email'])->name('sadmin.change-email');
});



























Route::group(['prefix'=> 'admin', 'middleware'=>['isAdmin', 'auth', 'PreventBackHistory']], function()
{
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    //
    // Product & Categories
    Route::get('/categories',               [MainController::class, 'category']             )->name('admin.categories');
    Route::get('/add-category',             [MainController::class, 'add_category']         )->name('admin.add-category');
    Route::post('/add-category',            [MainController::class, 'add_new_category']     )->name('admin.add-category');
    Route::get('/edit-category/{id}',       [MainController::class, 'edit_category']        )->name('admin.edit-category');
    Route::post('/update-category/{id}',    [MainController::class, 'update_category']      )->name('admin.update-category');
    Route::get('/delete-category/{id}',     [MainController::class, 'delete_category']      )->name('admin.delete-category');


    Route::get('/product/{id}',         [MainController::class, 'products']         )->name('admin.product');
    Route::get('/add-products/{id}',    [MainController::class, 'add_product']      )->name('admin.add-products');
    Route::post('/add-product',         [MainController::class, 'add_new_product']  )->name('admin.add-product');
    Route::get('/remove-product/{id}',  [MainController::class, 'remove_product']   )->name('admin.remove-product');

    //
    // Resturant Orders
    Route::get('/orders/', [MainController::class, 'orders'])->name('admin.orders');

    // 
    // promo routes 
    Route::get('/promo',                [MainController::class, 'promo']                )->name('admin.promo');
    Route::get('/add-promo',            [MainController::class, 'add_promo']            )->name('admin.add-promo');
    Route::post('/add-promo',           [MainController::class, 'add_new_promo']        )->name('admin.add-promo');
    Route::get('/edit-promo/{id}',      [MainController::class, 'edit_promo']           )->name('admin.edit-promo');
    Route::post('/update-promo/{id}',   [MainController::class, 'update_promo']         )->name('admin.update-promo');
    Route::get('/delete-promo/{id}',    [MainController::class, 'delete_promo']         )->name('admin.delete-promo');

    //
    // Sales Matrix
    Route::get('/sales',                [MainController::class, 'sale'] )->name('admin.sales');
    Route::get('/invoice',              [MainController::class, 'invoice'])->name('admin.invoice');
    
    //
    // Customers
    Route::get('/customers',                    [MainController::class, 'customers']        )->name('admin.customers');
    Route::get('//del-customer/{id}',           [MainController::class, 'del_customer']     )->name('admin.del-customer');
    Route::get('/block-customer/{id}/{status}', [MainController::class, 'block_customer']   )->name('admin.block-customer');

    //
    // Managers
    Route::get('/managers',                     [MainController::class, 'managers']     )->name('admin.managers');
    Route::get('/add-manager',                  [MainController::class, 'add_manager']  )->name('admin.add-manager');
    Route::post('/add-manager',                 [MainController::class, 'manager']      )->name('admin.add-manager');
    Route::get('/del-manager/{id}',             [MainController::class, 'del_manager']  )->name('admin.del-manager');
    Route::get('/edit-manager/{id}',            [MainController::class, 'edit_manager'] )->name('admin.edit-manager');
    Route::get('/block-manager/{id}/{status}',  [MainController::class, 'block_manager'])->name('admin.block-manager');

    //
    // Riders
    Route::get('/riders',                       [MainController::class, 'riders']       )->name('admin.riders');
    Route::get('/del-rider/{id}',               [MainController::class, 'del_rider']    )->name('admin.del-rider');
    Route::get('/block-rider/{id}/{status}',    [MainController::class, 'block_rider']  )->name('admin.block-rider');
    Route::get('/approve-rider/{id}',           [MainController::class, 'approve_rider'])->name('admin.approve-rider');

    //
    // Profile Settings
    Route::get('/change-password',  [AdminController::class, 'change_password'] )->name('admin.change-password');
    Route::post('/change-password', [AdminController::class, 'update_password'] )->name('admin.change-password');
    Route::get('/change-email',     [AdminController::class, 'change_email']    )->name('admin.change-email');
    Route::post('/change-email',    [AdminController::class, 'update_email']    )->name('admin.change-email');


});




























Route::group(['prefix'=> 'agent', 'middleware'=>['isAgent', 'auth', 'PreventBackHistory']], function()
{
    Route::get('/dashboard', [AgentController::class, 'index'])->name('agent.dashboard');
    //
    // Product & Categories
    //
    Route::get('/categories', [MainController::class, 'category'])->name('agent.categories');
    Route::get('/add-category', [MainController::class, 'addCategory'])->name('agent.add-category');
    Route::get('/product', [MainController::class, 'products'])->name('agent.product');
    Route::get('/add-product', [MainController::class, 'addProduct'])->name('agent.add-product');
    //
    // Managers
    //
    // Route::get('/managers', [MainController::class, 'managers'])->name('agent.managers');
    //
    // Customers
    //
    Route::get('/customers', [MainController::class, 'customers'])->name('agent.customers');
    Route::get('/del-customer/{id}', [MainController::class, 'del_customer'])->name('agent.del-customer');
    Route::get('/block-customer/{id}/{status}', [MainController::class, 'block_customer'])->name('agent.block-customer');
    //
    // Resturant Orders
    //
    Route::get('/orders', [MainController::class, 'orders'])->name('agent.orders');

    //
    // Resturant Sales Matrix
    //
    Route::get('/sales', [MainController::class, 'sale'])->name('agent.sales');

    Route::get('/invoice', [MainController::class, 'invoice'])->name('agent.invoice');


    //
    // Riders
    //
    Route::get('/riders', [MainController::class, 'riders'])->name('agent.riders');
    Route::get('/del-rider/{id}', [MainController::class, 'del_rider'])->name('agent.del-rider');
    Route::get('/block-rider/{id}/{status}', [MainController::class, 'block_rider'])->name('agent.block-rider');
    Route::get('/approve-rider/{id}', [MainController::class, 'approve_rider'])->name('agent.approve-rider');
    //
    // Profile Settings
    //
    Route::get('/change-password', [AgentController::class, 'change_password'])->name('agent.change-password');
    Route::post('/change-password', [AgentController::class, 'update_password'])->name('agent.change-password');
    Route::get('/change-email', [AgentController::class, 'change_email'])->name('agent.change-email');
    Route::post('/change-email', [AgentController::class, 'update_email'])->name('agent.change-email');

});






















Route::group(['prefix'=> 'user', 'middleware'=>['isUser', 'auth', 'PreventBackHistory']], function()
{

    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');

});

Route::group(['prefix'=> 'rider', 'middleware'=>['isRider', 'auth', 'PreventBackHistory']], function()
{
    Route::get('dashboard', [RiderController::class, 'index'])->name('rider.dashboard');
});
