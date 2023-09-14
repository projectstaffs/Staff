<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\user\UserController;

use App\Http\Controllers\data\LanguageController;
use App\Http\Controllers\data\AgeGroupController;
use App\Http\Controllers\data\AlcoholController;
use App\Http\Controllers\data\BabysittingDutieController;
use App\Http\Controllers\data\CityController;
use App\Http\Controllers\data\CountryController;
use App\Http\Controllers\data\CriminalController;
use App\Http\Controllers\data\DiagnoseController;
use App\Http\Controllers\data\EducationController;
use App\Http\Controllers\data\EmploymentController;
use App\Http\Controllers\data\ExperienceController;
use App\Http\Controllers\data\HourlyPaymentController;
use App\Http\Controllers\data\HousekeeperDutieController;
use App\Http\Controllers\data\HousekeeperPreferenceController;
use App\Http\Controllers\data\HousekeeperTypeOfWorkController;
use App\Http\Controllers\data\JobOptionController;
use App\Http\Controllers\data\MonthlyPaymentController;
use App\Http\Controllers\data\MovingController;
use App\Http\Controllers\data\NurseDutieController;
use App\Http\Controllers\data\NurseTypeOfWorkController;
use App\Http\Controllers\data\NursingSkillController;
use App\Http\Controllers\data\RecommendationController;
use App\Http\Controllers\data\ReligionController;
use App\Http\Controllers\data\ScheduleController;
use App\Http\Controllers\data\SmokingController;
use App\Http\Controllers\data\StatusController;
use App\Http\Controllers\data\TypeOfWorkController;
use App\Http\Controllers\data\WorkLocationController;
use App\Http\Controllers\data\WorkPeriodController;
use App\Http\Controllers\data\ChildrenController;
use App\Http\Controllers\forms\UserLanguagesController;
use App\Http\Controllers\user\ImageController;
use App\Http\Controllers\forms\CredentialController;
use App\Http\Controllers\message\MessageController;
use App\Http\Controllers\message\ReviewController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\ViewsController;

use App\Http\Controllers\forms\FormAgegroupController;
use App\Http\Controllers\forms\FormDutieController;
use App\Http\Controllers\forms\FormEducationController;
use App\Http\Controllers\forms\FormJoboptionController;
use App\Http\Controllers\forms\FormTypeworkController;
use App\Http\Controllers\forms\BabyController;

use App\Http\Controllers\forms\NurseController;
use App\Http\Controllers\forms\FormDiagnoseController;
use App\Http\Controllers\forms\FormNursedutieController;
use App\Http\Controllers\forms\FormNurseskillController;
use App\Http\Controllers\forms\FormNursetypeworkController;
use App\Http\Controllers\forms\FormNurseworklocationController;
use App\Http\Controllers\forms\FormNurseeducationController;
use App\Http\Controllers\forms\FormNursejoboptionController;

use App\Http\Controllers\forms\KeeperController;
use App\Http\Controllers\forms\KeeperdutieController;
use App\Http\Controllers\forms\KeeperjoboptionController;
use App\Http\Controllers\forms\KeeperpreferenceController;
use App\Http\Controllers\forms\KeepertypeworkController;

use App\Http\Controllers\client\ClientBabyController;
use App\Http\Controllers\client\ClientBabyagegroupController;
use App\Http\Controllers\client\ClientBabydutieController;
use App\Http\Controllers\client\ClientBabyjoboptionController;

use App\Http\Controllers\client\ClientNurseController;
use App\Http\Controllers\client\ClientNursedutieController;
use App\Http\Controllers\client\ClientNursejoboptionController;

use App\Http\Controllers\client\ClientKeeperController;
use App\Http\Controllers\client\ClientKeeperdutieController;
use App\Http\Controllers\client\ClientKeeperjoboptionController;


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
        Route::resource('/credential', CredentialController::class);
        Route::resource('/photo', ImageController::class);
        Route::resource('/language', LanguageController::class);
        Route::resource('/children', ChildrenController::class);
        Route::resource('/agegroup', AgeGroupController::class);        
        Route::resource('/babysittingdutie', BabysittingDutieController::class);        
        Route::resource('/diagnose', DiagnoseController::class);
        Route::resource('/education', EducationController::class);
        Route::resource('/employment', EmploymentController::class);
        Route::resource('/experience', ExperienceController::class);
        Route::resource('/hourlypayment', HourlyPaymentController::class);
        Route::resource('/housekeeperdutie', HousekeeperDutieController::class);
        Route::resource('/housekeeperpreference', HousekeeperPreferenceController::class);
        Route::resource('/housekeepertypeofwork', HousekeeperTypeOfWorkController::class);
        Route::resource('/joboption', JobOptionController::class);
        Route::resource('/monthlypayment', MonthlyPaymentController::class);        
        Route::resource('/nursedutie', NurseDutieController::class);
        Route::resource('/nursetypeofwork', NurseTypeOfWorkController::class);
        Route::resource('/nursingskill', NursingSkillController::class);
        Route::resource('/recommendation', RecommendationController::class);        
        Route::resource('/schedule', ScheduleController::class);        
        Route::resource('/typeofwork', TypeOfWorkController::class);
        Route::resource('/worklocation', WorkLocationController::class);
        Route::resource('/workperiod', WorkPeriodController::class);

        Route::resource('/userlanguages', UserLanguagesController::class);
        Route::resource('/formagegroup', FormAgegroupController::class);
        Route::resource('/formdutie', FormDutieController::class);
        Route::resource('/formeducation', FormEducationController::class);
        Route::resource('/formjoboption', FormJoboptionController::class);
        Route::resource('/formtypework', FormTypeworkController::class);
        Route::resource('/baby', BabyController::class); 
        
        Route::resource('/nurse', NurseController::class);
        Route::resource('/formdiagnose', FormDiagnoseController::class);
        Route::resource('/formnursedutie', FormNursedutieController::class);
        Route::resource('/formnurseskill', FormNurseskillController::class);
        Route::resource('/formnursetypework', FormNursetypeworkController::class);
        Route::resource('/formnurseworklocation', FormNurseworklocationController::class);
        Route::resource('/formnurseeducation', FormNurseeducationController::class);
        Route::resource('/formnursejoboption', FormNursejoboptionController::class);

        Route::resource('/keeper', KeeperController::class);
        Route::resource('/keeperdutie', KeeperdutieController::class);
        Route::resource('/keeperjoboption', KeeperjoboptionController::class);
        Route::resource('/keeperpreference', KeeperpreferenceController::class);
        Route::resource('/keepertypework', KeepertypeworkController::class);

        Route::resource('/clientagegroup', ClientBabyagegroupController::class);
        Route::resource('/clientjoboption', ClientBabyjoboptionController::class);
        Route::resource('/clientdutie', ClientBabydutieController::class);
        Route::resource('/clientbaby', ClientBabyController::class);

        Route::resource('/clientnursejoboption', ClientNursejoboptionController::class);
        Route::resource('/clientnursedutie', ClientNursedutieController::class);
        Route::resource('/clientnurse', ClientNurseController::class);

        Route::resource('/clientkeeperjoboption', ClientKeeperjoboptionController::class);
        Route::resource('/clientkeeperdutie', ClientKeeperdutieController::class);
        Route::resource('/clientkeeper', ClientKeeperController::class);
    });    
});

Route::resource('/user', UserController::class);
Route::resource('/country', CountryController::class);
Route::resource('/city', CityController::class);
Route::resource('/criminal', CriminalController::class);
Route::resource('/moving', MovingController::class);
Route::resource('/smoking', SmokingController::class);
Route::resource('/alcohol', AlcoholController::class);
Route::resource('/status', StatusController::class);
Route::resource('/religion', ReligionController::class);

Route::post('/forgot_password', [HelpController::class, 'forgotPassword']);
//Route::get('/redis', [HelpController::class, 'redisAll']);
//Route::get('/minio', [HelpController::class, 'minio']);