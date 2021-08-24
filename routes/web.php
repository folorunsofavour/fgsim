<?php

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


Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/about_details', 'WelcomeController@about_details')->name('about_details');
Route::post('/message/store',  'WelcomeController@storeMessage')->name('message.store');

Route::prefix('/auth')->name('auth.')->group(function () {
    #Admin Login Routes
    Route::get('/admin_login',  'Auth\Admin\LoginController@showLoginPage')->name('admin_login_form');
    Route::post('/login_admin',  'Auth\Admin\LoginController@login')->name('admin_login');
    Route::get('/logout_admin',  'Auth\Admin\LoginController@logout')->name('logout_admin');
    #End of Admin Login Routes

});

Route::prefix('/admin')->name('admin.')->group(function () {

    #Dashboard Routes
    Route::get('/dashboard',  'Admin\DashboardController@dashboard')->name('dashboard');
    #End of Dashboard Routes

    #Confession Of Faith Routes
    Route::get('/confession',  'Admin\Home\ConfessionController@index')->name('confession');
    Route::post('/confession/store',  'Admin\Home\ConfessionController@store')->name('confession.store');
    Route::post('/confession/update',  'Admin\Home\ConfessionController@updateConfession')->name('confession.update');
    Route::get('/confession/status/{id}',  'Admin\Home\ConfessionController@confessionStatus')->name('confession.status');
    #End of Confession Of Faith Routes

    # Announcement Routes
    Route::get('/announcement',  'Admin\Home\AnnouncementController@index')->name('announcement');
    Route::post('/announcement/store',  'Admin\Home\AnnouncementController@store')->name('announcement.store');
    Route::post('/announcement/update',  'Admin\Home\AnnouncementController@updateannouncement')->name('announcement.update');
    Route::get('/announcement/status/{id}',  'Admin\Home\AnnouncementController@announcementStatus')->name('announcement.status');
    #End of Announcement Routes

    // Media Routes
    Route::get('/media',  'Admin\MediaController@index')->name('media');
    Route::post('/media/store',  'Admin\MediaController@storeMedia')->name('media.store');
    Route::get('/media/edit/{id}',  'Admin\MediaController@editMedia')->name('media.edit');
    Route::post('/media/update',  'Admin\MediaController@updateMedia')->name('media.update');
    Route::get('/media/delete/{id}',  'Admin\MediaController@deleteMedia')->name('media.delete');
    // End of Media Routes

    #About Us Routes

    #About Routes
    Route::get('/about',  'Admin\About\AboutController@index')->name('about');
    Route::post('/about/store',  'Admin\About\AboutController@store')->name('about.store');
    Route::post('/about/update',  'Admin\About\AboutController@updateAbout')->name('about.update');
    Route::get('/about/status/{id}',  'Admin\About\AboutController@aboutStatus')->name('about.status');
    #End of About Routes

    #History Routes
    Route::get('/history',  'Admin\About\HistoryController@index')->name('history');
    Route::post('/history/store',  'Admin\About\HistoryController@store')->name('history.store');
    Route::post('/history/update',  'Admin\About\HistoryController@updateHistory')->name('history.update');
    Route::get('/history/status/{id}',  'Admin\About\HistoryController@historyStatus')->name('history.status');
    #End of History Routes

    // Minister Routes
    Route::get('/minister',  'Admin\About\MinisterController@index')->name('minister');
    Route::post('/minister/store',  'Admin\About\MinisterController@storeMinister')->name('minister.store');
    Route::get('/minister/edit/{id}',  'Admin\About\MinisterController@editMinister')->name('minister.edit');
    Route::post('/minister/update',  'Admin\About\MinisterController@updateMinister')->name('minister.update');
    Route::get('/minister/status/{id}',  'Admin\About\MinisterController@ministerStatus')->name('minister.status');
    Route::get('/minister/delete/{id}',  'Admin\About\MinisterController@deleteMinister')->name('minister.delete');
    // End of Minister Routes

    #End of About Us Routes

    #Role Routes
    // Route::get('/role',  'Admin\Administrative\RoleController@index')->name('role');
    // Route::post('/role/store',  'Admin\Administrative\RoleController@store')->name('role.store');
    // Route::post('/role/update',  'Admin\Administrative\RoleController@updateRole')->name('role.update');
    // Route::get('/role/status/{id}',  'Admin\Administrative\RoleController@roleStatus')->name('role.status');

    
    Route::get('/roles',  'Admin\Administrative\RoleController@roles')->name('roles');
    Route::post('/roles/create',  'Admin\Administrative\RoleController@add_role')->name('role.create');
    Route::get('/roles/update_status/{id}',  'Admin\Administrative\RoleController@update_role_status')->name('role.update_status');
    Route::get('/roles/edit/{id}',  'Admin\Administrative\RoleController@edit_role')->name('role.edit');
    Route::post('/roles/update',  'Admin\Administrative\RoleController@update_role')->name('role.update');
    #End of Role Routes

    #Administrative Routes
    Route::get('/administrative',  'Admin\Administrative\AdminController@index')->name('administrative');
    Route::post('/administrative/store',  'Admin\Administrative\AdminController@storeAdministrative')->name('administrative.store');
    Route::get('/administrative/edit/{id}',  'Admin\Administrative\AdminController@editAdministrative')->name('administrative.edit');
    Route::post('/administrative/update',  'Admin\Administrative\AdminController@updateAdministrative')->name('administrative.update');
    Route::get('/administrative/status/{id}',  'Admin\Administrative\AdminController@administrativeStatus')->name('administrative.status');
    #End of Administrative Routes

    // Admin Profile Routes
    Route::get('/profile',  'Admin\Administrative\AdminController@profile')->name('profile');
    Route::post('/profile/update',  'Admin\Administrative\AdminController@updateProfile')->name('profile.update');
    Route::post('/password/update',  'Admin\Administrative\AdminController@updatePassword')->name('password.update');
    // End of Admin Profile Routes

    // Messages Routes

    Route::get('/testimony',  'Admin\TestimonyController@index')->name('testimony');
    Route::post('/testimony/store',  'Admin\TestimonyController@store')->name('testimony.store');
    Route::get('/testimony/edit/{id}',  'Admin\TestimonyController@editTestimony')->name('testimony.edit');
    Route::post('/testimony/update',  'Admin\TestimonyController@updateTestimony')->name('testimony.update');
    Route::get('/testimony/delete/{id}',  'Admin\TestimonyController@deleteTestimony')->name('testimony.delete');
    
    Route::get('/prayer_request',  'Admin\MessageController@prayer_request')->name('prayer_request');

    Route::get('/counselling',  'Admin\MessageController@counselling_index')->name('counselling');
    // End of Messages Routes

    #Branch Routes
    Route::post('/branch/store',  'Admin\BranchController@storeBranch')->name('branch.store');
    Route::post('/branch/update',  'Admin\BranchController@updateBranch')->name('branch.update');
    Route::get('/branch/status/{id}',  'Admin\BranchController@branchStatus')->name('branch.status');
    #End of Branch Routes

    #Branch Service Routes
    Route::get('/branch_service',  'Admin\BranchController@index')->name('branch_service');
    Route::post('/branch_service/store',  'Admin\BranchController@storeBranchService')->name('branch_service.store');
    Route::get('/branch_service/edit/{id}',  'Admin\BranchController@editBranchService')->name('branch_service.edit');
    Route::post('/branch_service/update',  'Admin\BranchController@updateBranchService')->name('branch_service.update');
    Route::get('/branch_service/delete/{id}',  'Admin\BranchController@deleteBranchService')->name('branch_service.delete');
    #End of Branch Service Routes
    
});