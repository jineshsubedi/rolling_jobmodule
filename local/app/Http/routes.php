<?php
session_start();
 use Carbon\Carbon;

Carbon::setWeekendDays([Carbon::SATURDAY]);
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        Carbon::setWeekEndsAt(Carbon::SATURDAY);

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//URL::forceSchema('https');



    
Route::group(['prefix' => 'supervisor', 'middleware' => ['web']], function () {
    
});

Route::group(['prefix' => 'branchadmin', 'middleware' => ['web']], function () {

    Route::post('/getfaculty', 'branchadmin\BranchAdminController@getFaculty');

    Route::group(['middleware' =>['branchadmin']], function(){
        //jobs
        Route::resource('job_level','branchadmin\JobLevelController');
        Route::resource('calendar','branchadmin\CalendarController');
        Route::get('oauth2callback', 'branchadmin\CalendarController@oauth2callback')->name('oauth2callback');
        Route::resource('job_location','branchadmin\JobLocationController');
        Route::resource('recruitment_process','branchadmin\RprocessController');

    });

    
    Route::get('/jobs', 'branchadmin\JobController@index')->name('branchadmin.jobs.index');

    Route::get('/jobs/addnew', 'branchadmin\JobController@addnew');
    Route::post('/jobs/save', 'branchadmin\JobController@save');
    Route::get('/jobs/delete/{id}', 'branchadmin\JobController@delete');
    Route::get('/jobs/edit/{id}', 'branchadmin\JobController@edit');
    Route::post('/jobs/update', 'branchadmin\JobController@update');
    Route::get('/jobs/view/{id}', 'branchadmin\JobController@jobView');
    Route::get('/jobs/source/{id}', 'branchadmin\JobController@sourceView');
    Route::get('/jobs/application/{id}', 'branchadmin\JobController@Applications');
    Route::post('/jobs/update_application', 'branchadmin\JobController@updateApplication');
    Route::get('/jobs/written/{id}', 'branchadmin\JobController@writtenExam');
    Route::get('/jobs/application/view/{id}', 'branchadmin\JobController@applicationView');
    Route::get('/jobs/application/printprofile/{id}', 'branchadmin\JobController@applicationPrint');
    Route::get('/jobs/application/makepdf/{id}', 'branchadmin\JobController@applicationPdf');
    Route::get('/jobs/written_exam/delete/{id}', 'branchadmin\JobController@writtenDelete');
    Route::get('/jobs/written/view/{id}', 'branchadmin\JobController@writtenView');
    Route::get('/jobs/written/printprofile/{id}', 'branchadmin\JobController@writtenPrint');
    Route::get('/jobs/written/makepdf/{id}', 'branchadmin\JobController@writtenPdf');
    Route::get('/jobs/generate_symbol/{id}/{type}', 'branchadmin\JobController@generateSymbol');

    //    zoom work
//    Route::get('/jobs/application/meeting/{id}', 'branchadmin\JobController@meetingView');
    Route::get('/jobs/tab{tab_id}/{job_id}/callmeeting/{id}', 'branchadmin\JobController@meetingCallView');
    Route::post('/jobs/application/meeting', 'branchadmin\JobController@meetingView');
    Route::post('/jobs/application/groupMeeting', 'branchadmin\JobController@groupMeetingView');
    Route::post('/jobs/application/callGroupMeeting', 'branchadmin\JobController@callGroupMeeting');



    Route::post('/jobs/uploadwritten', 'branchadmin\JobController@uploadXlwritten');
    Route::get('/jobs/exportCsv/{id}', 'branchadmin\JobController@exportCsv');
    
    Route::post('/jobs/exportCsvfile', 'branchadmin\excelController@exportCsvfile');
     
    Route::get('/jobs/exportResultCsv/{id}', 'branchadmin\excelController@exportResultCsv');
    Route::post('/jobs/update_written', 'branchadmin\JobController@updateWritten');
    Route::post('/jobs/update_discussion', 'branchadmin\JobController@updateDiscussion');
    Route::post('/jobs/update_interview', 'branchadmin\JobController@updateInterview');
    Route::post('/jobs/reset_token', 'branchadmin\JobController@ResetToken');
    Route::get('/jobs/discussion/{id}', 'branchadmin\JobController@discussion');
    Route::get('/jobs/discussion/delete/{id}', 'branchadmin\JobController@discussionDelete');
    Route::get('/jobs/discussion/view/{id}', 'branchadmin\JobController@discussionView');
    Route::get('/jobs/discussion/printprofile/{id}', 'branchadmin\JobController@discussionPrint');
    Route::get('/jobs/discussion/makepdf/{id}', 'branchadmin\JobController@discussionPdf');
    Route::post('/jobs/uploaddiscussion', 'branchadmin\JobController@uploadXldiscussion');
    Route::get('/jobs/interview/{id}', 'branchadmin\JobController@interview');
    Route::get('/jobs/interview/delete/{id}', 'branchadmin\JobController@interviewDelete');
    Route::get('/jobs/interview/view/{id}', 'branchadmin\JobController@interviewView');
    Route::get('/jobs/interview/printprofile/{id}', 'branchadmin\JobController@interviewPrint');
    Route::get('/jobs/interview/makepdf/{id}', 'branchadmin\JobController@interviewPdf');
    Route::post('/jobs/uploadinterview', 'branchadmin\JobController@uploadXlinterview');
    Route::get('/jobs/selected/{id}', 'branchadmin\JobController@selected');
    Route::get('/jobs/selected/delete/{id}', 'branchadmin\JobController@selectedDelete');
    Route::get('/jobs/selected/view/{id}', 'branchadmin\JobController@selectedView');
    Route::get('/jobs/selected/printprofile/{id}', 'branchadmin\JobController@selectedPrint');
    Route::get('/jobs/selected/makepdf/{id}', 'branchadmin\JobController@selectedPdf');
    Route::post('/jobs/uploadselected', 'branchadmin\JobController@uploadXlselected');
    Route::get('/jobs/autocomplete', 'branchadmin\JobController@autocomplete');
    Route::get('/jobs/autocompleteJobs', 'branchadmin\JobController@autocompleteJobs');
    Route::get('/jobs/autoJobs', 'branchadmin\JobController@autoJobs');
    Route::post('/jobs/addJobForm', 'branchadmin\JobController@addJobForm');
    Route::post('/jobs/addJobFormData', 'branchadmin\JobController@addJobFormData');
    Route::post('/jobs/deleteTempJobForm', 'branchadmin\JobController@deleteTempJobForm');
    Route::post('/jobs/deleteJobForm', 'branchadmin\JobController@deleteJobForm');
    Route::post('/jobs/editJobForm', 'branchadmin\JobController@editJobForm');
    Route::post('/jobs/updateJobForm', 'branchadmin\JobController@updateJobForm');
    
    Route::get('/jobs/downloadCV/{id}', 'branchadmin\JobController@downloadCV');
    Route::get('/jobs/downloadCoverletter/{id}', 'branchadmin\JobController@downloadCoverletter');
    Route::get('/jobs/report/{id}', 'branchadmin\JobController@Report');
    Route::post('/jobs/report/update', 'branchadmin\JobController@updateReport');
    Route::post('/jobs/report/deleteFile', 'branchadmin\JobController@deleteFile');
    
    Route::get('/jobs/detail/{id}', 'branchadmin\JobController@detail');
    Route::post('/jobs/detail/update', 'branchadmin\JobController@updateDetail');

    Route::get('/jobs/verification/{id}', 'branchadmin\JobController@DocumentVerification');
    Route::post('/jobs/update_verification', 'branchadmin\JobController@updateVerification');
    Route::get('/jobs/verification/delete/{id}', 'branchadmin\JobController@verificationDelete');
    Route::get('/jobs/verification/view/{id}', 'branchadmin\JobController@verificationView');
    Route::post('/jobs/upload_verification', 'branchadmin\JobController@uploadXlverification');
    Route::post('/jobs/delete_selected', 'branchadmin\JobController@deleteSelected');

    Route::post('/jobs/updatestatus', 'branchadmin\JobController@updateStatus');
    Route::post('/jobs/eventupdate', 'branchadmin\JobController@eventUpdate');
    Route::post('/jobs/upload_written', 'branchadmin\JobController@uploadXlwritten');
    Route::get('/jobs/written/delete/{id}', 'branchadmin\JobController@writtenDelete');
    Route::post('/jobs/upload_discussion', 'branchadmin\JobController@uploadXldiscussion');
    Route::post('/jobs/upload_interview', 'branchadmin\JobController@uploadXlinterview');
    Route::post('/jobs/upload_selected', 'branchadmin\JobController@uploadXlselected');
    Route::get('/jobs/file_upload/{id}/{job_id}', 'branchadmin\JobController@uploadFile');
    Route::post('/jobs/file_upload/save', 'branchadmin\JobController@saveFile');
    Route::post('/jobs/documents/delete', 'branchadmin\JobController@deleteEmployerFile');
    Route::get('/jobs/application/delete/{id}', 'branchadmin\JobController@applicationDelete');

    

});

Route::group(['prefix' => 'staffs', 'middleware' => ['web']], function () {
            

}); 

    
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('staffs/login', 'staffs\StaffLoginController@getLogin');
    Route::post('staffs/login', 'staffs\StaffLoginController@staffAuth');
    Route::post('staffs/logout', 'staffs\StaffLoginController@logout');
    Route::get('/', 'staffs\StaffLoginController@getLogin');
});