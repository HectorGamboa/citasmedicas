<?php



use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Administrador
Route::middleware(['auth','admin'])->namespace('App\Http\Controllers\Admin')->group(function(){

//Specialty
Route::get('specialties',[App\Http\Controllers\Admin\SpecialtyController::class, 'index']);//redirigir a pagina  principal
Route::get('specialties/getschedule', [App\Http\Controllers\Admin\SpecialtyController::class, 'getschedule']);//obtener listado de especialidades
Route::get('specialties/create', [App\Http\Controllers\Admin\SpecialtyController::class, 'create']);//form de register
Route::get('specialties/edit', [App\Http\Controllers\Admin\SpecialtyController::class, 'edit']);
Route::put('specialties/update', [App\Http\Controllers\Admin\SpecialtyController::class, 'update']);//actualizar
Route::delete('specialties/{specialty}', [App\Http\Controllers\Admin\SpecialtyController::class, 'destroy']);//eliminar
Route::post('specialties',[App\Http\Controllers\Admin\SpecialtyController::class, 'store']);//envio del form
Route::post('specialties/get-campos-tabla',[App\Http\Controllers\Admin\SpecialtyController::class, 'getCamposTabla']);//envio del form

//Doctors
Route::get('doctors',[App\Http\Controllers\Admin\DoctorController::class, 'index']);
Route::get('doctors/getmedicos',[App\Http\Controllers\Admin\DoctorController::class, 'getmedicos']);
Route::get('doctors/create',[App\Http\Controllers\Admin\DoctorController::class, 'create']);
Route::post('doctors',[App\Http\Controllers\Admin\DoctorController::class, 'store']);
Route::post("doctors/{id}/edit",[App\Http\Controllers\Admin\DoctorController::class, 'edit']);
Route::post('doctors/get-campos-tabla',[App\Http\Controllers\Admin\DoctorController::class, 'getCamposTabla']);
Route::put('doctors/update/',[App\Http\Controllers\Admin\DoctorController::class, 'update']);
Route::delete('doctors/{doctor}', [App\Http\Controllers\Admin\DoctorController::class, 'destroy']);//eliminar


Route::get('patients',[App\Http\Controllers\Admin\PatientController::class, 'index']);
Route::get('patients/getPatients',[App\Http\Controllers\Admin\PatientController::class, 'getPatients']);
Route::get('patients/create',[App\Http\Controllers\Admin\PatientController::class, 'create']);
Route::post('patients',[App\Http\Controllers\Admin\PatientController::class, 'store']);
Route::post("patients/{id}/edit",[App\Http\Controllers\Admin\PatientController::class, 'edit']);
Route::put('patients/update/',[App\Http\Controllers\Admin\PatientController::class, 'update']);
Route::delete('patients/{patient}', [App\Http\Controllers\Admin\DoctorController::class, 'destroy']);//eliminar






//Patient
Route::resource('patients',PatientController::class);
//reports
Route::get('reports/appointments/line', [App\Http\Controllers\Admin\ChartController::class, 'appointments']);
Route::get('reports/doctors/column', [App\Http\Controllers\Admin\ChartController::class, 'doctors']);
Route::get('reports/doctors/column/data', [App\Http\Controllers\Admin\ChartController::class, 'doctorsJson']);


});

// Doctor
Route::middleware(['auth','doctor'])->namespace('Doctor')->group(function(){

    Route::get('schedule',[App\Http\Controllers\Doctor\ScheduleController::class, 'edit']);
    Route::post('schedule',[App\Http\Controllers\Doctor\ScheduleController::class, 'store']);


    });

Route::middleware('auth')->group(function(){

Route::get('appointments/create',[App\Http\Controllers\AppointmentController::class,'create']);
Route::post('appointments/{appointment}',[App\Http\Controllers\AppointmentController::class,'show']);


Route::get('appointments',[App\Http\Controllers\AppointmentController::class,'index']);
Route::post('appointments',[App\Http\Controllers\AppointmentController::class,'store']);
Route::get('appointments/{appointment}',[App\Http\Controllers\AppointmentController::class,'show']);
Route::get('appointments/{appointment}/cancel',[App\Http\Controllers\AppointmentController::class,'showCancelForm']);
Route::post('appointments/{appointment}/cancel',[App\Http\Controllers\AppointmentController::class,'postCancel']);
Route::post('appointments/{appointment}/confirm',[App\Http\Controllers\AppointmentController::class,'postConfirm']);


//JSOn
Route::get('specialties/{specialtyId}/doctors',[App\Http\Controllers\Api\SpecialtyController::class,'doctors']);
Route::get('schedule/hours',[App\Http\Controllers\Api\ScheduleController::class,'hours']);


});


