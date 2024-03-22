<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\AppoinmentCustomerController;
use App\Http\Controllers\MainServiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\itemsController;

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

Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('aboutus');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/services', [HomeController::class, 'services'])->name('ourservices');
Route::get('/appointment/{id}', [HomeController::class, 'appointment'])->name('service.appoinment');
Route::get('/subservice/{id}', [HomeController::class, 'subService'])->name('service.subservice');
Route::post('/addsubservice', [HomeController::class, 'addSubService'])->name('addsubservice');
Route::post('/clearallservices', [HomeController::class, 'clearAllServices'])->name('clearallservices');
Route::post('/deleteselectservice', [HomeController::class, 'deleteSelectedService'])->name('deleteselectservice');
Route::post('/addemtoservice', [HomeController::class, 'addEmToService'])->name('addemtoservice');
Route::post('/addtimetoservice', [HomeController::class, 'addTimetoService'])->name('addtimetoservice');
Route::post('/makeappointment/{id}', [HomeController::class, 'makeAppointment'])->name('makeappointment');
Route::post('/postratings/{id}', [HomeController::class, 'postRatings'])->name('postratings');
Route::get('/placeappoinmentview', [HomeController::class, 'placeAppoinmentView'])->name('placeappoinmentview');
Route::post('/placeappoinment', [HomeController::class, 'placeAppoinment'])->name('placeappoinment');
Route::post('/letstalk', [HomeController::class, 'letStalk'])->name('letstalk');
Route::get('/letstalkscontacts', [HomeController::class, 'letsTalksContacts'])->name('letstalkscontacts');
Route::get('/employeeview/{id}', [HomeController::class, 'employeeView'])->name('employeeview');
Route::get('/viewgallery', [HomeController::class, 'viewGallery'])->name('pages.viewgallery');
Route::get('/viewproductcategory', [HomeController::class, 'viewProductCategory'])->name('viewproductcategory');
Route::get('/viewproducts/{id}', [HomeController::class, 'viewProducts'])->name('page.viewproducts');
Route::get('/oneitemview/{id}', [HomeController::class, 'oneItemView'])->name('page.oneitemview');
Route::get('/viewcart', [HomeController::class, 'viewCart'])->name('pages.viewcart');
Route::get('/addcart/{id}', [HomeController::class, 'addCart'])->name('addcart');
Route::post('/deletecart', [HomeController::class, 'deleteCart'])->name('deleteCart');
Route::get('/viewemployeprofile/{id}', [HomeController::class, 'viewEmployeProfile'])->name('pages.viewemployeprofile');

Route::get('/alluseradmin', [HomeController::class, 'alluseradmin'])->name('alluseradmin');

Route::get('/dashboard', function () {
    return view('pages.dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/viewmainservices', [MainServiceController::class, 'viewMainServices'])->name('pages.viewmainservices');
Route::get('/viewaddnewservices', [MainServiceController::class, 'viewAddNewServices'])->name('pages.viewaddnewservices');
Route::post('/addnewservices', [MainServiceController::class, 'addNewServices'])->name('addnewservices');
Route::get('/viewsubproducts/{id}', [MainServiceController::class, 'viewSubProducts'])->name('pages.viewsubproducts');
Route::post('/services/destroy', [MainServiceController::class, 'destroyService'])->name('services.destroy');
Route::post('/services/active', [MainServiceController::class, 'activeService'])->name('services.active');
Route::post('/mainservice/deactive', [MainServiceController::class, 'mainServiceDeactive'])->name('mainservice.deactive');
Route::post('/mainservice/active', [MainServiceController::class, 'mainServiceActive'])->name('mainservice.active');

Route::get('/addproduct/{mId}', [ProductController::class, 'addProduct'])->name('pages.addproduct');
Route::post('/addnewproduct', [ProductController::class, 'addNewProduct'])->name('addnewproduct');
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
Route::post('/appoinmentconfirm', [AppoinmentController::class, 'appoinmentConfirm'])->name('appoinmentconfirm');

Route::get('/appoinmentcustomer', [AppoinmentCustomerController::class, 'appoinmentCustomer'])->name('appoinmentcustomer');

Route::get('/viewsettings', [SettingsController::class, 'viewSettings'])->name('pages.viewsettings');
Route::get('/gallerysetting', [SettingsController::class, 'gallerySetting'])->name('gallerysetting');
Route::post('/addgalleryimage', [SettingsController::class, 'addGalleryImgage'])->name('addgalleryimage');
Route::post('/gallery/deactive', [SettingsController::class, 'deactiveGallery'])->name('gallery.deactive');
Route::post('/gallery/active', [SettingsController::class, 'activeGallery'])->name('gallery.active');

Route::get('/viewmainitemcategory', [itemsController::class, 'index'])->name('pages.viewMainItemCategory');
Route::get('/addmainitemcategory', [itemsController::class, 'addMainItemCategory'])->name('pages.addMainItemCategory');
Route::post('/addmaincat', [itemsController::class, 'addMainCatItems'])->name('addmaincatitems');
Route::get('/viewitems/{id}', [itemsController::class, 'viewItems'])->name('pages.viewItems');
Route::post('/mainitemdeactive', [itemsController::class, 'mainItemDeactive'])->name('mainitem.deactive');
Route::post('/mainitemactive', [itemsController::class, 'activeMainItem'])->name('mainitem.active');
Route::get('/editmainitem/{id}', [itemsController::class, 'editMainItem'])->name('page.editmainitem');
Route::post('/updatemainitem/{id}', [itemsController::class, 'updateMainItem'])->name('updatemainitem');

Route::get('/addnewitems/{id}', [itemsController::class, 'addnewItems'])->name('page.addnewitems');
Route::post('/additems', [itemsController::class, 'addItems'])->name('additems');
Route::get('/edititems/{id}', [itemsController::class, 'editItems'])->name('page.edititems');
Route::post('/updateitems/{id}', [itemsController::class, 'updateItems'])->name('updateitems');
Route::post('/deactiveitems', [itemsController::class, 'deactiveItems'])->name('deactiveItems');
Route::post('/activeitems', [itemsController::class, 'activeItems'])->name('activeItems');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
