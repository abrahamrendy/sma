<?php

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

Route::get('/info', function () {
    return view('welcome');
});

Route::get('/', 'HomeController@index');
Route::get('/index', 'HomeController@index');
Route::get('/search', 'HomeController@search_404');
Route::get('/privacypolicy', 'HomeController@privacypolicy');
Route::get('/termsofservice', 'HomeController@termsofservice');
Route::get('/contactus', 'HomeController@contactus');
Route::get('/register/{output?}', 'HomeController@register')->name('register');
Route::post('/register_submit', 'HomeController@register_submit')->name('register_submit');
Route::get('/confirmation/{output?}', 'HomeController@confirm_payment')->name('confirm_payment');
Route::post('/confirmation_submit', 'HomeController@submit_confirm_payment')->name('submit_confirm_payment');
Route::post('/contactus_submit', 'HomeController@contactus_submit');
Route::get('/aboutus', 'HomeController@aboutus');
Route::get('/lecturers', 'HomeController@aboutus');
Route::get('/faq', 'HomeController@helpfaq');
Route::get('/accountinfo', 'HomeController@accountinfo');
Route::get('/accountinfo', 'HomeController@accountinfo');
Route::get('/curriculum', 'HomeController@curriculum');
Route::get('/pricingplans', 'HomeController@pricingplans');

Route::get('/dashboard', 'DashboardController@index');
Route::get('/seemore/{offset}/{limit}/{ispostcourse}/{type}', 'DashboardController@getCourses');
Route::get('/seemoreowned/{offset}/{limit}/{ispostcourse}/{type}', 'DashboardController@getOwnCreatedCourses');
Route::get('/seemorewishlist/{offset}/{user_id}', 'DashboardController@getWishlist');
Route::post('/addwishlist', 'DashboardController@addWishlist');
Route::post('/removewishlist', 'DashboardController@removeWishlist');
Route::post('/add_email','DashboardController@addEmail');

Route::prefix('dashboard')->group(function () {
    Route::get('/mycourse', 'DashboardController@mycourse');
    Route::get('/postcourse', 'DashboardController@postcourse');
    Route::post('/postcourse/submit', 'DashboardController@submitCourse');
	Route::get('/settings', 'DashboardController@settings');
	Route::post('/settings/change', 'DashboardController@changeSettings');
	Route::get('/settings/deleteaccount', 'DashboardController@deleteAccount');
	Route::get('/myachievement', 'DashboardController@myachievement');
	Route::get('/billing', 'BillingController@index');
	Route::get('/getpaymenthistory/{user_id}/{datefrom}/{dateto}', 'BillingController@getAllPaymentHistory');
	Route::get('/employeelist', 'EmployeeController@index');
	Route::get('/employeelist/{criteria}', 'EmployeeController@show_sorting');
	Route::get('/employeelist/{functionality}/{user_id}', 'EmployeeController@modifyEmployee');
	Route::post('/employeelist/invite','EmployeeController@inviteEmployee');
	Route::get('/customizedcourse', 'CourseController@customized');
	Route::get('/getotherrequest/{user_id}/{offset}/{limit}/{area}/{country}', 'CourseController@getOtherRequestsFiltered');
	Route::post('/submitproposal', 'CourseController@submitProposal');
	Route::get('/removerejectedproposal/{user_id}/{cpid}/{crid}', 'CourseController@removeRejectedProposal');
	Route::get('/countallproposal/{user_id}', 'CourseController@getAllProposalCount');
	Route::get('/approveproposal/{pid}', 'CourseController@approveProposal');
	Route::post('/rejectproposal', 'CourseController@rejectProposal');
	Route::post('/scheduleappointment/', 'CourseController@addAppointmentProposal');
	Route::get('/deletecustomizedcourse/{crid}', 'CourseController@deleteCustomizedCourse');
	Route::get('/coursemanager', 'AdministratorController@coursemanager');
	Route::post('/editcourse', 'AdministratorController@editCourse');
	Route::get('/getmodules/{cid}', 'AdministratorController@getModules');
	Route::post('/deletecourse', 'AdministratorController@deleteCourse');
	Route::post('/edituserstatus', 'AdministratorController@editStatusUser');
	Route::get('/courserequestmanager', 'AdministratorController@courserequestmanager');
	Route::get('/deletecourserequest/{cid}/{title}', 'AdministratorController@deleteCustomizedCourse');
	Route::get('/network', 'DashboardController@network');
	Route::get('/getcurrentcourses/{user_id}', 'AdministratorController@getAllCurrentCourses');
	Route::get('/removeuserenrollment/{uid}/{cid}', 'AdministratorController@removeEnrolledUser');
	Route::get('/transactionmanager','BillingController@transactionmanager');
	Route::post('/edittransactionstatus', 'BillingController@editStatusTransaction');
	Route::get('/courseoverview/{code}', 'AdministratorController@getCourseOverview');
	Route::get('/getuser/{email}', 'DashboardController@getUser');
	Route::get('/gettransactionstatus/{user}/{course}', 'BillingController@getTransactionStatus');
});
//Testing routes email to course creator
//Route::get('/getcreator/{courseid}', 'CourseController@getCreatorEmail');
//end of testing
Route::get('/browsecourses', 'CourseController@browse_all');
Route::get('/sort_by_country/{area}/{category}', 'CourseController@sort_by_country');
Route::get('/searchcourses', 'CourseController@search');
Route::get('/coursedetail/{courseid?}', 'CourseController@detail');
Route::get('/enroll/{code?}','CourseController@enroll');
Route::post('/submit_enrollment','CourseController@submitEnrollment');
Route::get('/new_employee_invite','CourseController@employeeSignUpEnroll');
Route::get('/getm/{cid}/{module}','CourseController@getModule');
Route::get('/updateprogress/{cid}/{percentage}','CourseController@updateCourseProgress');
Route::get('/getcurrentprogress/{cid}','CourseController@getCurrentProgress');

Route::post('/requestcustomizedcourse', 'CourseController@request_customized_courses');
Route::post('/updatecustomizedcourse', 'CourseController@update_customized_courses');

Route::post('/login_user', 'AuthController@login');
Route::post('/register', 'AuthController@register_individual');
Route::get('/logout_user', 'AuthController@logout');
Route::post('/resetpassword', 'AuthController@reset_password');
Route::get('/reset_password_form', 'AuthController@reset_password_form');
Route::post('/reset_password_confirm', 'AuthController@reset_password_confirm');

Route::get('/fb_redirect', 'SocialAuthController@fb_redirect');
Route::get('/fb_callback', 'SocialAuthController@fb_callback');

Route::get('/confirm_invitation','EmployeeController@existInvitation');
Route::get('/invitation_sign_up','EmployeeController@newInvitation');
Route::post('/employee_invitation_sign_up','AuthController@employeeSignUp');
Route::post('pdf','PdfController@getpdf');
Route::get('/pdf/{invoice}','PdfController@getpdfParam');
Route::get('/listusercourse', 'DashboardController@viewEnrolledUser');
Route::get('/investment',function(){
	return redirect()->away('http://www.stada.org.sg/lad-investment');
});

// Download Route
Route::get('/download/{filename}', function($filename)
{
    // Check if file exists in app/storage/file folder
    $file_path = storage_path() .'/file/'. $filename;
    if (file_exists($file_path))
    {
        // Send Download
        return Response::download($file_path, $filename, [
            'Content-Length: '. filesize($file_path)
        ]);
    }
    else
    {
        // Error
        exit('Requested file does not exist on our server!');
    }
});

//OBSOLETE
// Route::get('/mycourse', 'DashboardController@mycourse');
// Route::get('/postcourse', 'DashboardController@postcourse');
// Route::get('/settings', 'DashboardController@settings');
// Route::get('/myachievement', 'DashboardController@myachievement');
// Route::get('/billing', 'BillingController@index');
// Route::get('/employeelist', 'EmployeeController@index');
// Route::get('/customizedcourse', 'CourseController@customized');
//OBSOLETE

Auth::routes();

Route::get('/admin', 'BackOfficeController@index')->name('bo');
Route::post('/admin_login', 'BackOfficeController@index')->name('bo_login');
Route::get('/admin/details/{id}/{page?}', 'BackOfficeController@details')->name('registrant_details');
Route::get('/admin/edit/{id}/{page?}', 'BackOfficeController@edit')->name('registrant_edit');
Route::post('/admin/submit_edit}', 'BackOfficeController@submit_edit')->name('submit_edit');
Route::post('/admin/approve}', 'BackOfficeController@approve_user')->name('approve');
Route::post('/admin/reject}', 'BackOfficeController@reject_user')->name('reject');

Route::get('/admin/bukti_bayar', 'BackOfficeController@bukti_bayar')->name('bukti_bayar');

Route::get('/admin/materi', 'BackOfficeController@materi')->name('materi');


Route::get('download/akte/{file_name}', function($file_name = null)
{
    $path = storage_path().'/'.'app'.'/akte/'.$file_name;
    if (file_exists($path)) {
        return Response::download($path);
    }
})->name('dl_files_akte');

Route::get('download/ijazah/{file_name}', function($file_name = null)
{
    $path = storage_path().'/'.'app'.'/ijazah/'.$file_name;
    if (file_exists($path)) {
        return Response::download($path);
    }
})->name('dl_files_ijazah');

Route::get('download/ktp/{file_name}', function($file_name = null)
{
    $path = storage_path().'/'.'app'.'/ktp/'.$file_name;
    if (file_exists($path)) {
        return Response::download($path);
    }
})->name('dl_files_ktp');

Route::get('download/pasfoto/{file_name}', function($file_name = null)
{
    $path = storage_path().'/'.'app'.'/pasfoto/'.$file_name;
    if (file_exists($path)) {
        return Response::download($path);
    }
})->name('dl_files_pasfoto');

Route::get('download/bukti/{file_name}', function($file_name = null)
{
    $path = storage_path().'/'.'app'.'/bukti/'.$file_name;
    if (file_exists($path)) {
        return Response::download($path);
    }
})->name('dl_files_bukti');

Route::get('download/modul/{file_name}', function($file_name = null)
{
    $path = storage_path().'/'.'app'.'/modul/'.$file_name;
    if (file_exists($path)) {
        return Response::download($path);
    }
})->name('dl_files_modul');
