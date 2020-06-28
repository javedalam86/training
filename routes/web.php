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
/*
Route::get('/', function () {
    return view('welcome');
});
*/



Auth::routes();
Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/qms', 'QmsController@qms')->name('qms');

Route::get('/', 'FrontController@index')->name('index');
Route::resource('pages', 'PageController')->middleware('auth');

Route::post('registeruser', [ 'as' => 'registeruser', 'uses' => 'UserController@registeruser']);
Route::post('loginuserfrm', [ 'as' => 'loginuserfrm', 'uses' => 'UserController@loginuserfrm']);

Route::get('dashboard','DashboardController@dashboard')->name('dashboard')->middleware('auth');

Route::get('candidatedetail/{id}', [ 'as' => 'candidatedetail', 'uses' => 'UserController@candidatedetail'])->middleware('auth');

// Admin
Route::get('userslist', [ 'as' => 'userslist', 'uses' => 'UserController@index']);
Route::get('ajaxuserslist', [ 'as' => 'ajaxuserslist', 'uses' => 'UserController@ajaxuserslist']);
Route::post('createuser', [ 'as' => 'createuser', 'uses' => 'UserController@createuser']);
Route::post('edituser', [ 'as' => 'edituser', 'uses' => 'UserController@edituser']);
Route::post('deleteuser', [ 'as' => 'deleteuser', 'uses' => 'UserController@deleteuser']);


Route::get('myprofile', [ 'as' => 'myprofile', 'uses' => 'ProfileController@myprofile'])->middleware('auth');
Route::post('updateprofile', [ 'as' => 'updateprofile', 'uses' => 'ProfileController@updateprofile']);

Route::get('mycandidatedetail/{id}', [ 'as' => 'mycandidatedetail', 'uses' => 'MyUserController@mycandidatedetail'])->middleware('auth');
Route::get('myuserslist', [ 'as' => 'myuserslist', 'uses' => 'MyUserController@index']);
Route::get('ajaxmyuserslist', [ 'as' => 'ajaxmyuserslist', 'uses' => 'MyUserController@ajaxmyuserslist']);
Route::post('createmyuser', [ 'as' => 'createmyuser', 'uses' => 'MyUserController@createmyuser']);
Route::post('editmyuser', [ 'as' => 'editmyuser', 'uses' => 'MyUserController@editmyuser']);
Route::post('deletemyuser', [ 'as' => 'deletemyuser', 'uses' => 'MyUserController@deletemyuser']);

Route::get('companydetail/{id}','CompanyController@companydetail')->name('companydetail')->middleware('auth');
Route::get('companylist', [ 'as' => 'companylist', 'uses' => 'CompanyController@index']);
Route::get('ajaxcompanylist', [ 'as' => 'ajaxcompanylist', 'uses' => 'CompanyController@ajaxcompanylist']);
Route::post('createcompany', [ 'as' => 'createcompany', 'uses' => 'CompanyController@createcompany']);
Route::post('editcompany', [ 'as' => 'editcompany', 'uses' => 'CompanyController@editcompany']);
Route::post('deletecompany', [ 'as' => 'deletecompany', 'uses' => 'CompanyController@deletecompany']);

Route::get('trainerdetail/{id}','TrainerController@trainerdetail')->name('trainerdetail')->middleware('auth');

Route::get('trainerlist', [ 'as' => 'trainerlist', 'uses' => 'TrainerController@index']);
Route::get('ajaxtrainerlist', [ 'as' => 'ajaxtrainerlist', 'uses' => 'TrainerController@ajaxtrainerlist']);
Route::post('createtrainer', [ 'as' => 'createtrainer', 'uses' => 'TrainerController@createtrainer']);
Route::post('edittrainer', [ 'as' => 'edittrainer', 'uses' => 'TrainerController@edittrainer']);
Route::post('deletetrainer', [ 'as' => 'deletetrainer', 'uses' => 'TrainerController@deletetrainer']);


Route::get('candidatecourses','CourseController@candidatecourses')->name('candidatecourses')->middleware('auth');

Route::get('coursedetail/{id}','CourseController@coursedetail')->name('coursedetail')->middleware('auth');

Route::get('sitesetting','SettingController@sitesetting')->name('sitesetting')->middleware('auth');
Route::get('quizresult','QuizresultController@quizresult')->name('quizresult')->middleware('auth');
Route::get('ajaxquizeresultlist','QuizresultController@ajaxquizeresultlist')->name('ajaxquizeresultlist')->middleware('auth');
Route::get('ajaxquizeanswers','QuizresultController@ajaxquizeanswers')->name('ajaxquizeanswers')->middleware('auth');
Route::post('ajaxquizmarksupdate','QuizresultController@ajaxquizmarksupdate')->name('ajaxquizmarksupdate')->middleware('auth');
Route::post('ajaxreenablequizbtn','QuizresultController@ajaxreenablequizbtn')->name('ajaxreenablequizbtn')->middleware('auth');
Route::post('ajaxhtmltopdfview', 'QuizresultController@downloadQuizResult')->name('downloadQuizResult')->middleware('auth');




// ajaxquizeresultlist


Route::post('updatesetting','SettingController@updatesetting')->name('updatesetting')->middleware('auth');




Route::post('createcoursesection','CourseController@createcoursesection')->name('createcoursesection')->middleware('auth');
Route::post('deletesection','CourseController@deletesection')->name('deletesection')->middleware('auth');
Route::post('updatesection','CourseController@updatesection')->name('updatesection')->middleware('auth');


Route::post('createcoursequiz','CourseController@createcoursequiz')->name('createcoursequiz')->middleware('auth');



Route::post('updatecoursequiz','CourseController@updatecoursequiz')->name('updatecoursequiz')->middleware('auth');


Route::post('toggleQuizStatus','QuizeController@toggleQuizStatus')->name('toggleQuizStatus')->middleware('auth');
Route::get('quizdetaileditmodal/{id}','QuizeController@quizdetaileditmodal')->name('quizdetaileditmodal')->middleware('auth');

//Route::get('quizdetail/{id}','AuditController@auditdetail')->name('auditdetail')->middleware('auth');










Route::get('courselist','CourseController@courselist')->name('courselist')->middleware('auth');
Route::get('ajaxcourseslist','CourseController@ajaxcourselist')->name('ajaxcourselist')->middleware('auth');
Route::post('createcourse','CourseController@courseadd')->name('courseadd')->middleware('auth');
Route::post('editcourse','CourseController@editcourse')->name('editcourse')->middleware('auth');
Route::post('deletecourse','CourseController@deletecourse')->name('deletecourse')->middleware('auth');


Route::get('mycourselist','MyCourseController@mycourselist')->name('mycourselist')->middleware('auth');
Route::get('ajaxmycourseslist','MyCourseController@ajaxmycourselist')->name('ajaxmycourselist')->middleware('auth');
Route::post('createmycourse','MyCourseController@mycourseadd')->name('mycourseadd')->middleware('auth');
Route::post('editmycourse','MyCourseController@editmycourse')->name('editmycourse')->middleware('auth');
Route::post('deletemycourse','MyCourseController@deletemycourse')->name('deletemycourse')->middleware('auth');

Route::get('bookdetail/{id}','BookController@bookdetail')->name('bookdetail')->middleware('auth');
Route::get('booklist','BookController@booklist')->name('booklist')->middleware('auth');
Route::get('ajaxbookslist','BookController@ajaxbooklist')->name('ajaxbooklist')->middleware('auth');
Route::post('createbook','BookController@bookadd')->name('bookadd')->middleware('auth');
Route::post('editbook','BookController@editbook')->name('editbook')->middleware('auth');
Route::post('deletebook','BookController@deletebook')->name('deletebook')->middleware('auth');

Route::get('questiondetail/{id}','QuestionController@questiondetail')->name('questiondetail')->middleware('auth');

Route::get('questionlist','QuestionController@questionlist')->name('questionlist')->middleware('auth');
Route::get('ajaxquestionslist','QuestionController@ajaxquestionlist')->name('ajaxquestionlist')->middleware('auth');
Route::post('createquestion','QuestionController@questionadd')->name('questionadd')->middleware('auth');
Route::post('editquestion','QuestionController@editquestion')->name('editquestion')->middleware('auth');
Route::post('deletequestion','QuestionController@deletequestion')->name('deletequestion')->middleware('auth');


//Route::get('/', 'ImportController@getImport')->name('import');
Route::post('import_parse', 'QuestionController@parseImport')->name('import_parse');
Route::post('import_process', 'QuestionController@processImport')->name('import_process');


Route::get('couponlist','CouponController@couponlist')->name('couponlist')->middleware('auth');
Route::get('ajaxcouponslist','CouponController@ajaxcouponlist')->name('ajaxcouponlist')->middleware('auth');
Route::post('createcoupon','CouponController@couponadd')->name('couponadd')->middleware('auth');
Route::post('editcoupon','CouponController@editcoupon')->name('editcoupon')->middleware('auth');
Route::post('deletecoupon','CouponController@deletecoupon')->name('deletecoupon')->middleware('auth');

Route::get('generate-pdf','CertificateController@generatePDF');

Route::get('file-download/{bookpath}', 'BookController@bookdownload')->middleware('auth');

Route::get('policy-download/{policypath}', 'PolicyController@policydownload')->middleware('auth');


Route::get('quiz/{id}','QuizeController@quize')->name('quiz')->middleware('auth');
Route::post('ajaxgetquizequestion','QuizeController@ajaxgetquizequestion')->name('ajaxgetquizequestion')->middleware('auth');
Route::post('candidate-submit-quize', 'QuizeController@submitQuize')->name('candidate-submit-quize')->middleware('auth');




Route::get('policydetail/{id}','PolicyController@policydetail')->name('policydetail')->middleware('auth');
Route::get('policylist','PolicyController@policylist')->name('policylist')->middleware('auth');
Route::get('ajaxpolicyslist','PolicyController@ajaxpolicylist')->name('ajaxpolicylist')->middleware('auth');
Route::post('createpolicy','PolicyController@policyadd')->name('policyadd')->middleware('auth');
Route::post('editpolicy','PolicyController@editpolicy')->name('editpolicy')->middleware('auth');
Route::post('deletepolicy','PolicyController@deletepolicy')->name('deletepolicy')->middleware('auth');
Route::get('manualdetail/{id}','ManualController@manualdetail')->name('manualdetail')->middleware('auth');
Route::get('manuallist','ManualController@manuallist')->name('manuallist')->middleware('auth');
Route::get('ajaxmanualslist','ManualController@ajaxmanuallist')->name('ajaxmanuallist')->middleware('auth');
Route::post('createmanual','ManualController@manualadd')->name('manualadd')->middleware('auth');
Route::post('editmanual','ManualController@editmanual')->name('editmanual')->middleware('auth');
Route::post('deletemanual','ManualController@deletemanual')->name('deletemanual')->middleware('auth');



Route::get('auditdetail/{id}','AuditController@auditdetail')->name('auditdetail')->middleware('auth');
Route::get('auditlist','AuditController@auditlist')->name('auditlist')->middleware('auth');
Route::get('ajaxauditslist','AuditController@ajaxauditlist')->name('ajaxauditlist')->middleware('auth');
Route::post('createaudit','AuditController@auditadd')->name('auditadd')->middleware('auth');
Route::post('editaudit','AuditController@editaudit')->name('editaudit')->middleware('auth');
Route::post('deleteaudit','AuditController@deleteaudit')->name('deleteaudit')->middleware('auth');

Route::post('jquery-ajax-form-submit', 'ContactController@store');
Route::get('candidatecourselist','CandidateCourseController@candidatecourselist')->name('candidatecourselist')->middleware('auth');
Route::get('candidatecoursedetail/{id}','CandidateCourseController@candidatecoursedetail')->name('candidatecoursedetail')->middleware('auth');


Route::get('candidatetest','CandidateCourseController@candidatetest')->name('candidatetest')->middleware('auth');

Route::get('ajaxcandidatecourselist','CandidateCourseController@ajaxcandidatecourselist')->name('ajaxcandidatecourselist')->middleware('auth');

//Calender
Route::get('course-calendar', 'CourseCalenderController@index')->name('course-calendar');
Route::get('all-course', 'CourseCalenderController@getAllCourse')->name('get-all-calendar');
Route::get('course-by-id/{courseId}', 'CourseCalenderController@courseDetail')->name('course-by-id');
Route::get('book-course/{courseId}', 'CourseCalenderController@buyCourse')->name('buy-course');

// CMS PAGES FRONT
Route::get('audits-and-inspections', 'PageController@auditsandinspections')->name('audits-and-inspections');
Route::get('lng-specific', 'PageController@lngspecific')->name('lng-specific');
Route::get('core-values', 'PageController@corevalues')->name('core-values');
Route::get('vision', 'PageController@vision')->name('vision');
Route::get('mission', 'PageController@mission')->name('mission');

Route::post('getfilecontent', 'BookController@getfiledata')->middleware('auth');