<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('aboutus');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/services', [HomeController::class, 'services'])->name('ourservices');
Route::get('/appointment/{id}', [HomeController::class, 'appointment'])->name('service.appoinment');
Route::post('/makeappointment/{id}', [HomeController::class, 'makeAppointment'])->name('makeappointment');


Route::get('/dashboard', function () {
    return view('pages.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/viewproducts', [ProductController::class, 'viewProduct'])->name('pages.productview');
Route::get('/addproduct', [ProductController::class, 'addProduct'])->name('pages.addproduct');
Route::post('/addnewproduct', [ProductController::class, 'addNewProduct'])->name('addnewproduct');
Route::delete('/services/{item}/destroy', [ProductController::class, 'destroyService'])->name('services.destroy');
Route::get('/editservice/{id}', [ProductController::class, 'editService'])->name('page.editservice');
Route::put('/updateservice/{id}', [ProductController::class, 'updateService'])->name('updateservice');

Route::get('/viewemploye', [EmployeeController::class, 'viewEmploye'])->name('pages.viewemploye');
Route::get('/addemployee', [EmployeeController::class, 'addEmployee'])->name('pages.addemployee');
Route::get('/editemployee/{id}', [EmployeeController::class, 'editEmploy'])->name('page.editemployee');
Route::delete('/employee/{item}/destroy', [EmployeeController::class, 'deleteEmployee'])->name('employee.destroy');
Route::post('addnewemployee', [EmployeeController::class, 'addNewEmployee'])->name('addnewemployee');
Route::put('/updateemployee/{id}', [EmployeeController::class, 'updateEmployee'])->name('updateemployee');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
