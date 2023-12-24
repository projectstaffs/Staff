<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserController;

use App\Http\Controllers\Data\LanguageController;
use App\Http\Controllers\Data\AgeGroupController;
use App\Http\Controllers\Data\BabysittingDutieController;
use App\Http\Controllers\Data\CityController;
use App\Http\Controllers\Data\CountryController;
use App\Http\Controllers\Data\DiagnoseController;
use App\Http\Controllers\Data\EducationController;
use App\Http\Controllers\Data\ExperienceController;
use App\Http\Controllers\Data\HourlyPaymentController;
use App\Http\Controllers\Data\HouseKeeperDutieController;
use App\Http\Controllers\Data\HouseKeeperPreferenceController;
use App\Http\Controllers\Data\HouseKeeperTypeOfWorkController;
use App\Http\Controllers\Data\MonthlyPaymentController;
use App\Http\Controllers\Data\NurseDutieController;
use App\Http\Controllers\Data\NurseTypeOfWorkController;
use App\Http\Controllers\Data\NursingSkillController;
use App\Http\Controllers\Data\ScheduleController;
use App\Http\Controllers\Data\TypeOfWorkController;
use App\Http\Controllers\Data\WorkLocationController;
use App\Http\Controllers\Data\WorkPeriodController;
use App\Http\Controllers\Data\ChildrenController;
use App\Http\Controllers\Forms\UserLanguagesController;
use App\Http\Controllers\User\ImageController;
use App\Http\Controllers\Forms\CredentialController;
use App\Http\Controllers\Message\MessageController;
use App\Http\Controllers\Message\ReviewController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\ViewsController;

use App\Http\Controllers\Forms\FormAgeGroupController;
use App\Http\Controllers\Forms\FormDutieController;
use App\Http\Controllers\Forms\FormEducationController;
use App\Http\Controllers\Forms\FormTypeWorkController;
use App\Http\Controllers\Forms\BabyController;

use App\Http\Controllers\Forms\NurseController;
use App\Http\Controllers\Forms\FormDiagnoseController;
use App\Http\Controllers\Forms\FormNurseDutieController;
use App\Http\Controllers\Forms\FormNurseSkillController;
use App\Http\Controllers\Forms\FormNurseTypeWorkController;
use App\Http\Controllers\Forms\FormNurseWorkLocationController;
use App\Http\Controllers\Forms\FormNurseEducationController;

use App\Http\Controllers\Forms\KeeperController;
use App\Http\Controllers\Forms\KeeperDutieController;
use App\Http\Controllers\Forms\KeeperPreferenceController;
use App\Http\Controllers\Forms\KeeperTypeWorkController;

use App\Http\Controllers\Client\ClientBabyController;
use App\Http\Controllers\Client\ClientBabyAgeGroupController;
use App\Http\Controllers\Client\ClientBabyDutieController;

use App\Http\Controllers\Client\ClientNurseController;
use App\Http\Controllers\Client\ClientNurseDutieController;

use App\Http\Controllers\Client\ClientKeeperController;
use App\Http\Controllers\Client\ClientKeeperDutieController;

use App\Http\Controllers\Watch\WatchWorkerBabyController;
use App\Http\Controllers\Watch\WatchWorkerNurseController;
use App\Http\Controllers\Watch\WatchWorkerKeeperController;
use App\Http\Controllers\Watch\WatchClientBabyController;
use App\Http\Controllers\Watch\WatchClientNurseController;
use App\Http\Controllers\Watch\WatchClientKeeperController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([ 'middleware' => 'api', 'prefix' => 'auth'], 
function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

    Route::group(['middleware' => 'jwt.auth'], function(){
        Route::resource('/w_w_baby', WatchWorkerBabyController::class);
        Route::resource('/w_w_nurse', WatchWorkerNurseController::class);
        Route::resource('/w_w_keeper', WatchWorkerKeeperController::class);
        Route::resource('/w_c_baby', WatchClientBabyController::class);
        Route::resource('/w_c_nurse', WatchClientNurseController::class);
        Route::resource('/w_c_keeper', WatchClientKeeperController::class);

        Route::get('/w_baby', [ViewsController::class, 'getBaby']);        
        Route::get('/w_nurse', [ViewsController::class, 'getNurse']);
        Route::get('/w_keeper', [ViewsController::class, 'getKeeper']);
        Route::get('/c_baby', [ViewsController::class, 'getClientBaby']);
        Route::get('/c_nurse', [ViewsController::class, 'getClientNurse']);
        Route::get('/c_keeper', [ViewsController::class, 'getClientKeeper']);

        Route::get('/admin', [HelpController::class, 'getAdmin']);
        Route::get('/message_in', [HelpController::class, 'getMessage_in']);
        Route::resource('/message', MessageController::class); //message out
        Route::resource('/review', ReviewController::class);
        
        Route::resource('/photo', ImageController::class);
        Route::resource('/language', LanguageController::class);
        Route::resource('/children', ChildrenController::class);
        Route::resource('/agegroup', AgeGroupController::class);        
        Route::resource('/babysittingdutie', BabysittingDutieController::class);        
        Route::resource('/diagnose', DiagnoseController::class);
        Route::resource('/education', EducationController::class);
        Route::resource('/experience', ExperienceController::class);
        Route::resource('/hourlypayment', HourlyPaymentController::class);
        Route::resource('/housekeeperdutie', HouseKeeperDutieController::class);
        Route::resource('/housekeeperpreference', HouseKeeperPreferenceController::class);
        Route::resource('/housekeepertypeofwork', HouseKeeperTypeOfWorkController::class);
        Route::resource('/monthlypayment', MonthlyPaymentController::class);        
        Route::resource('/nursedutie', NurseDutieController::class);
        Route::resource('/nursetypeofwork', NurseTypeOfWorkController::class);
        Route::resource('/nursingskill', NursingSkillController::class);        
        Route::resource('/schedule', ScheduleController::class);        
        Route::resource('/typeofwork', TypeOfWorkController::class);
        Route::resource('/worklocation', WorkLocationController::class);
        Route::resource('/workperiod', WorkPeriodController::class);

        Route::resource('/userlanguages', UserLanguagesController::class);
        Route::resource('/formagegroup', FormAgeGroupController::class);
        Route::resource('/formdutie', FormDutieController::class);
        Route::resource('/formeducation', FormEducationController::class);
        Route::resource('/formtypework', FormTypeWorkController::class);
        Route::resource('/baby', BabyController::class); 
        
        Route::resource('/nurse', NurseController::class);
        Route::resource('/formdiagnose', FormDiagnoseController::class);
        Route::resource('/formnursedutie', FormNurseDutieController::class);
        Route::resource('/formnurseskill', FormNurseSkillController::class);
        Route::resource('/formnursetypework', FormNurseTypeWorkController::class);
        Route::resource('/formnurseworklocation', FormNurseWorkLocationController::class);
        Route::resource('/formnurseeducation', FormNurseEducationController::class);

        Route::resource('/keeper', KeeperController::class);
        Route::resource('/keeperdutie', KeeperDutieController::class);
        Route::resource('/keeperpreference', KeeperPreferenceController::class);
        Route::resource('/keepertypework', KeeperTypeWorkController::class);

        Route::resource('/clientagegroup', ClientBabyAgeGroupController::class);
        Route::resource('/clientdutie', ClientBabyDutieController::class);
        Route::resource('/clientbaby', ClientBabyController::class);

        Route::resource('/clientnursedutie', ClientNurseDutieController::class);
        Route::resource('/clientnurse', ClientNurseController::class);

        Route::resource('/clientkeeperdutie', ClientKeeperDutieController::class);
        Route::resource('/clientkeeper', ClientKeeperController::class);
    });    
});

Route::resource('/user', UserController::class);
Route::resource('/country', CountryController::class);
Route::resource('/city', CityController::class);
Route::resource('/credential', CredentialController::class);

Route::post('/forgot_password', [HelpController::class, 'forgotPassword']);
Route::post('/changelang', [HelpController::class, 'changeLang']);
//Route::get('/redis', [HelpController::class, 'redisAll']);
//Route::get('/minio', [HelpController::class, 'minio']);