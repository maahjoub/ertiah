<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\studentLoginController;
use App\Http\Controllers\Students\StudentController;
use App\Http\Controllers\Video\VideoController;
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
//Auth::routes();

//==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


//        Route::get('/', [ StudentController::class, 'create'])->name('selection');
        Route::group(['namespace' => 'Students'], function () {
            Route::get('/Get_classrooms/{id}', 'StudentController@Get_classrooms');
            Route::get('/Get_Sections/{id}', 'StudentController@Get_Sections');
        });
        Route::get('/', [ LoginController::class, 'loginForm'])->name('selection');
        Route::get('/admin/login', [ LoginController::class, 'loginAdmin'])->name('admin.login');
        Route::group(['namespace' => 'Auth'], function () {
            Route::post('/login', [ LoginController::class, 'login'])->name('login');

            Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest')->name('std.register');
            Route::post('/register', [RegisterController::class, 'create'])->name('register');
            Route::get('/logout/', 'LoginController@logout')->name('logout');
        });
        Route::group(
            [
                'middleware' => ['auth']
            ],
            function () {
                //==============================dashboard============================
                Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
                //==============================dashboard============================
                Route::group(['namespace' => 'Grades'], function () {
                    Route::resource('Grades', 'GradeController');
                });
                //==============================Classrooms============================
                Route::group(['namespace' => 'Classrooms'], function () {
                    Route::resource('Classrooms', 'ClassroomController');
                    Route::post('delete_all', 'ClassroomController@delete_all')->name('delete_all');
                    Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');
                });
                Route::group(['namespace' => 'Sections'], function () {
                    Route::resource('Sections', 'SectionController');
                    Route::get('/classes/{id}', 'SectionController@getclasses');
                });
                Route::view('add_parent', 'livewire.show_Form')->name('add_parent');
                Route::group(['namespace' => 'Teachers'], function () {
                    Route::resource('Teachers', 'TeacherController');
                });
                Route::group(['namespace' => 'Students'], function () {
                    Route::resource('Students', 'StudentController');
                    Route::resource('online_classes', 'OnlineClasseController');
                    Route::get('/indirect', 'OnlineClasseController@indirectCreate')->name('indirect.create');
                    Route::post('/indirect', 'OnlineClasseController@storeIndirect')->name('indirect.store');
                    Route::resource('Graduated', 'GraduatedController');
                    Route::resource('Promotion', 'PromotionController');
                    Route::resource('Fees_Invoices', 'FeesInvoicesController');
                    Route::resource('Fees', 'FeesController');
                    Route::resource('receipt_students', 'ReceiptStudentsController');
                    Route::resource('ProcessingFee', 'ProcessingFeeController');
                    Route::resource('Payment_students', 'PaymentController');
                    Route::resource('Attendance', 'AttendanceController');
                    Route::resource('library', 'LibraryController');

                    Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
                    Route::get('download_file/{filename}', 'LibraryController@downloadAttachment')->name('downloadAttachment');
                    Route::get('Download_attachment/{studentsname}/{filename}', 'StudentController@Download_attachment')->name('Download_attachment');
                    Route::post('Delete_attachment', 'StudentController@Delete_attachment')->name('Delete_attachment');
                });
                //==============================Subjects============================
                Route::group(['namespace' => 'Subjects'], function () {
                    Route::resource('subjects', 'SubjectController');
                });

                Route::group(['namespace' => 'Exams'], function () {
                    Route::resource('Exams', 'ExamController');
                });
                //==============================Quizzes============================
                Route::group(['namespace' => 'Quizzes'], function () {
                    Route::resource('Quizzes', 'QuizzController');
                });
                //==============================questions============================
                Route::resource('settings', 'SettingController');
                Route::resource('questions', 'QuestionsController');
                Route::post('question', 'QuestionsController@storeAnswer')->name('store_answer');
                Route::get('chois', 'QuestionsController@chois')->name('choose');
                Route::get('quiz', 'QuestionsController@quizes')->name('quiz');

                //========================== Video ======================================
                Route::resource('video', 'VideoController')->middleware('auth:web');
                Route::resource('category', 'CategoryController')->middleware('auth:web');
                Route::resource('type', 'TypeController')->middleware('auth:web');
            }
        );
    }
);
