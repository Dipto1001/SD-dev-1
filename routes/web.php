<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
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

Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

//admin panel route
Route::group(['middleware'=>'admin_auth'],function(){
    //Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    
    //for employee route
    Route::get('admin/employee',[EmployeeController::class,'index']);
    Route::get('admin/employee/manage_employee',[EmployeeController::class,'manage_employee']);
    Route::get('admin/employee/manage_employee/{id}',[EmployeeController::class,'manage_employee']);

    Route::post('admin/employee/manage_employee_process',[EmployeeController::class,'manage_employee_process'])->name('employee.manage_employee_process');
    Route::get('admin/employee/delete/{id}',[EmployeeController::class,'delete']);
    Route::get('admin/employee/status/{status}/{id}',[EmployeeController::class,'status']);

    //for logout and accout option
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout succesfully');
        return redirect('admin');
    });

});



