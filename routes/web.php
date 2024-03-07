<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppoinmentController;

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
Route::post('/postratings/{id}', [HomeController::class, 'postRatings'])->name('postratings');
Route::get('/placeappoinmentview', [HomeController::class, 'placeAppoinmentView'])->name('placeappoinmentview');
Route::post('/placeappoinment', [HomeController::class, 'placeAppoinment'])->name('placeappoinment');
Route::post('/letstalk', [HomeController::class, 'letStalk'])->name('letstalk');
Route::get('/letstalkscontacts', [HomeController::class, 'letsTalksContacts'])->name('letstalkscontacts');


Route::get('/alluseradmin', [HomeController::class, 'alluseradmin'])->name('alluseradmin');


Route::get('/dashboard', function () {
    return view('pages.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/viewproducts', [ProductController::class, 'viewProduct'])->name('pages.productview');
Route::get('/addproduct', [ProductController::class, 'addProduct'])->name('pages.addproduct');
Route::post('/addnewproduct', [ProductController::class, 'addNewProduct'])->name('addnewproduct');
Route::post('/services/destroy', [ProductController::class, 'destroyService'])->name('services.destroy');
Route::post('/services/active', [ProductController::class, 'activeService'])->name('services.active');
Route::get('/editservice/{id}', [ProductController::class, 'editService'])->name('page.editservice');
Route::put('/updateservice/{id}', [ProductController::class, 'updateService'])->name('updateservice');

Route::get('/viewemploye', [EmployeeController::class, 'viewEmploye'])->name('pages.viewemploye');
Route::get('/addemployee', [EmployeeController::class, 'addEmployee'])->name('pages.addemployee');
Route::get('/editemployee/{id}', [EmployeeController::class, 'editEmploy'])->name('page.editemployee');
Route::post('/employee/destroy', [EmployeeController::class, 'deleteEmployee'])->name('employee.destroy');
Route::post('/employee/activate', [EmployeeController::class, 'activateEmployee'])->name('employee.activate');
Route::post('addnewemployee', [EmployeeController::class, 'addNewEmployee'])->name('addnewemployee');
Route::put('/updateemployee/{id}', [EmployeeController::class, 'updateEmployee'])->name('updateemployee');
Route::post('/addserviceToEmployee', [EmployeeController::class, 'addServiceToEmployee'])->name('addserviceToEmployee');
Route::post('/removeemployeeinservice', [EmployeeController::class, 'removeEmployeeInService'])->name('removeemployeeinservice');
Route::get('/viewemployeinfo/{id}', [EmployeeController::class, 'viewemployeinfo'])->name('viewemployeinfo');

Route::get('/appoinmentadmin', [AppoinmentController::class, 'appoinmentadmin'])->name('appoinmentadmin');
Route::post('/appoinmentaccept', [AppoinmentController::class, 'appoinmentAccept'])->name('appoinmentaccept');
Route::post('/appoinmentreject', [AppoinmentController::class, 'appoinmentReject'])->name('appoinmentreject');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
