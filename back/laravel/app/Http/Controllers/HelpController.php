<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// For Redis
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Models\message\Message;
use App\Models\user\Image;
use App\Models\forms\Credential;

use App\Models\forms\Baby;
use App\Models\forms\FormAgegroup;
use App\Models\forms\FormDiagnose;
use App\Models\forms\FormDutie;
use App\Models\forms\FormEducation;
use App\Models\forms\FormJoboption;
use App\Models\forms\UserLanguages;
use App\Models\forms\FormTypework;

use App\Models\forms\Keeper;
use App\Models\forms\FormKeeperdutie;
use App\Models\forms\FormKeeperjoboption;
use App\Models\forms\FormKeeperpreference;
use App\Models\forms\FormKeepertypework;

use App\Models\forms\Nurse;
use App\Models\forms\FormNursedutie;
use App\Models\forms\FormNurseeducation;
use App\Models\forms\FormNursejoboption;
use App\Models\forms\FormNurseskill;
use App\Models\forms\FormNursetypework;
use App\Models\forms\FormNurseworklocation;

use App\Models\client\Client_baby;
use App\Models\client\Client_agegroup;
use App\Models\client\Client_dutie;
use App\Models\client\Client_joboption;

use App\Models\client\Client_keeper;
use App\Models\client\Client_keeperdutie;
use App\Models\client\Client_keeperjoboption;

use App\Models\client\Client_nurse;
use App\Models\client\Client_nursedutie;
use App\Models\client\Client_nursejoboption;

use App\Models\data\AgeGroup;
use App\Models\data\Alcohol;
use App\Models\data\BabysittingDutie;
use App\Models\data\Children;
use App\Models\data\City;

use App\Models\data\Country;
use App\Models\data\Criminal;
use App\Models\data\Diagnose;
use App\Models\data\Education;
use App\Models\data\Employment;

use App\Models\data\Experience;
use App\Models\data\HourlyPayment;
use App\Models\data\HousekeeperDutie;
use App\Models\data\HousekeeperPreference;
use App\Models\data\HousekeeperTypeOfWork;

use App\Models\data\JobOption;
use App\Models\data\Language;
use App\Models\data\MonthlyPayment;
use App\Models\data\Moving;
use App\Models\data\NurseDutie;

use App\Models\data\NurseTypeOfWork;
use App\Models\data\NursingSkill;
use App\Models\data\Recommendation;
use App\Models\data\Religion;
use App\Models\data\Schedule;

use App\Models\data\Smoking;
use App\Models\data\Status;
use App\Models\data\TypeOfWork;
use App\Models\data\WorkLocation;
use App\Models\data\WorkPeriod;

class HelpController extends Controller
{
    public function getAdmin ()
    {
        if(!Cache::has('users')) { Cache::put('users', User::all()); }
        $getItems = Cache::get('users'); 

        foreach ($getItems as $item) {
            if($item->role = 'Администратор') {
                return $item->id;
            }                           
        }        
    }
    public function getMessage_in (Request $request)
    {
        if(!Cache::has('messages')) { Cache::put('messages', Message::all()); }
        $getItems = Cache::get('messages');
        $messages = array();

        foreach ($getItems as $item) {
            if($item->recipient == $request["data"]) {
                array_push($messages, $item);
            }                           
        }
        return $messages;
    }
    public function redisAll ()
    {
        Cache::put('smokings', Smoking::all());
        Cache::put('statuses', Status::all());
        Cache::put('typeofworks', TypeOfWork::all());
        Cache::put('workLocations', WorkLocation::all());
        Cache::put('workperiods', WorkPeriod::all());

        Cache::put('nursetypeofworks', NurseTypeOfWork::all());
        Cache::put('nursingskills', NursingSkill::all());
        Cache::put('recommendations', Recommendation::all());
        Cache::put('religions', Religion::all());
        Cache::put('schedules', Schedule::all());

        Cache::put('joboptions', JobOption::all());
        Cache::put('languages', Language::all());
        Cache::put('monthlypayments', MonthlyPayment::all());
        Cache::put('movings', Moving::all());
        Cache::put('nurseduties', NurseDutie::all());

        Cache::put('experiences', Experience::all());
        Cache::put('hourlypayments', HourlyPayment::all());
        Cache::put('housekeeperduties', HousekeeperDutie::all());
        Cache::put('housekeeperpreferences', HousekeeperPreference::all());
        Cache::put('housekeepertypeofworks', HousekeeperTypeOfWork::all());

        Cache::put('countries', Country::all());
        Cache::put('criminals', Criminal::all());
        Cache::put('diagnoses', Diagnose::all());
        Cache::put('educations', Education::all());
        Cache::put('employments', Employment::all());

        Cache::put('agegroups', AgeGroup::all());
        Cache::put('alcohols', Alcohol::all());
        Cache::put('babysittingduties', BabysittingDutie::all());
        Cache::put('childrens', Children::all());
        Cache::put('cities', City::all());

        Cache::put('client_nurses', Client_nurse::all());
        Cache::put('client_nurseduties', Client_nursedutie::all());
        Cache::put('client_nursejoboptions', Client_nursejoboption::all());

        Cache::put('client_keepers', Client_keeper::all());
        Cache::put('client_keeperduties', Client_keeperdutie::all());
        Cache::put('client_keeperjoboptions', Client_keeperjoboption::all());

        Cache::put('client_babies', Client_baby::all());
        Cache::put('client_agegroups', Client_agegroup::all());
        Cache::put('client_duties', Client_dutie::all());
        Cache::put('client_joboptions', Client_joboption::all());

        Cache::put('nurses', Nurse::all());
        Cache::put('formdiagnoses', FormDiagnose::all());
        Cache::put('formnurseduties', FormNursedutie::all());
        Cache::put('formnurseeducations', FormNurseeducation::all());
        Cache::put('formnursejoboptions', FormNursejoboption::all());
        Cache::put('formnurseskills', FormNurseskill::all());
        Cache::put('formnursetypeworks', FormNursetypework::all());
        Cache::put('formnurseworklocations', FormNurseworklocation::all());

        Cache::put('keepers', Keeper::all());
        Cache::put('formkeeperduties', FormKeeperdutie::all());
        Cache::put('formkeeperjoboptions', FormKeeperjoboption::all());
        Cache::put('formkeeperpreferences', FormKeeperpreference::all());
        Cache::put('formkeepertypeworks', FormKeepertypework::all());

        Cache::put('formtypeworks', FormTypework::all());
        Cache::put('userlanguages', UserLanguages::all());
        Cache::put('formagegroups', FormAgegroup::all());        
        Cache::put('formduties', FormDutie::all());
        Cache::put('formeducations', FormEducation::all());
        Cache::put('formjoboptions', FormJoboption::all());
        Cache::put('babies', Baby::all());        
        
        Cache::put('credentials', Credential::all());
        Cache::put('users', User::all()); 
        Cache::put('images', Image::all());
        Cache::put('messages', Message::all());        
    }
    
    public function redisShow ()
    {  
        $getUsers = Cache::get('users');
        
        foreach ($getUsers as $user) {
            if($user->name = 'Дима') {
                return $user;
            }                           
        }        
    }

    public function RedisOne ($id)
    { 
        //$user = Cache::get('users:all');
        //return $user;

        // Добавление либо изменение одного обьекта
        //$newuser = 'Созданный обьект';
        //Cache::put('users:' . $id, $newuser);

        // Удаление одного обьекта
        //Cache::forget('users:' . $id);

        // Получение одного обьекта
        //$user = Cache::get('users:' . $id);
        //return $user;
    } 

    public function test(Request $request)
    {
        $page = $request->input('page', 0);
        $perPage = $request->input('per_page', 10);

        $cacheTag = 'users';
        $cacheKey = 'users.all.page' . $page . 'per_page' . $perPage;
        $cacheTTL = 3600;

        if (Cache::tags($cacheTag)->has($cacheKey)) {
            $jsonData = Cache::tags($cacheTag)->get($cacheKey);
            Log::debug("Get From Cache");
            return response()->json($jsonData);
            }
        else {
            $usersPaginator = User::paginate($perPage);
            Log::debug("Put to Cache");
            Log::debug($usersPaginator);
            Cache::tags($cacheTag)->put($cacheKey, $usersPaginator, $cacheTTL);
            return response()->json($usersPaginator);
        }
    }
}
