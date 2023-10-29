<?php

namespace App\Http\Resources\Views;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\Forms\Baby;
use App\Models\Forms\UserLanguages;
use App\Http\Resources\Forms\UserLanguagesResource;
use App\Models\Forms\FormAgeGroup;
use App\Http\Resources\Forms\FormAgeGroupResource;
use App\Models\Forms\FormEducation;
use App\Http\Resources\Forms\FormEducationResource;
use App\Models\Forms\FormTypeWork;
use App\Http\Resources\Forms\FormTypeWorkResource;
use App\Models\Forms\FormJobOption;
use App\Http\Resources\Forms\FormJobOptionResource;
use App\Models\Forms\FormDutie;
use App\Http\Resources\Forms\FormDutieResource;
use App\Models\User;
use App\Http\Resources\UserResource;

use App\Models\Data\Children;
use App\Models\Data\WorkPeriod;
use App\Models\Data\Employment;
use App\Models\Data\MonthlyPayment;
use App\Models\Data\HourlyPayment;
use App\Models\Data\Recommendation;
use App\Models\Data\Experience;
use App\Models\Forms\Credential;

class WorkBabyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        if(!Cache::has('users')) { Cache::put('users', User::all()); }
        $Users = Cache::get('users');
        $user = null;
        foreach ($Users as $item) {
            if($item->id == $this->user_id) {
                $user = $item;
                break;
            }                           
        }
        $USER = new UserResource($user);

        if(!Cache::has('babies')) { Cache::put('babies', Baby::all()); }
        $Baby = Cache::get('babies');
        $additional = '';
        foreach ($Baby as $item) {
            if($item->user_id == $this->user_id) {
                $additional = $item->additional;
            }                           
        }

        if(!Cache::has('credentials')) { Cache::put('credentials', Credential::all()); }
        $Credentials = Cache::get('credentials');
        $credentials = array();
        foreach ($Credentials as $item) {
            if($item->user_id == $this->user_id) {
                array_push($credentials, $item);
            }                           
        }

        if(!Cache::has('userlanguages')) { Cache::put('userlanguages', UserLanguages::all()); }
        $Userlanguages = Cache::get('userlanguages');
        $lang = array();
        foreach ($Userlanguages as $item) {
            if($item->user_id == $this->user_id) {
                array_push($lang, $item);
            }                           
        }

        if(!Cache::has('formagegroups')) { Cache::put('formagegroups', FormAgeGroup::all()); }
        $FormAgegroup = Cache::get('formagegroups');
        $agegroup = array();
        foreach ($FormAgegroup as $item) {
            if($item->form_id == $this->id) {
                array_push($agegroup, $item);
            }                           
        }

        if(!Cache::has('formeducations')) { Cache::put('formeducations', FormEducation::all()); }
        $FormEducation = Cache::get('formeducations');
        $education = array();
        foreach ($FormEducation as $item) {
            if($item->form_id == $this->id) {
                array_push($education, $item);
            }                           
        }

        if(!Cache::has('formtypeworks')) { Cache::put('formtypeworks', FormTypeWork::all()); }
        $FormTypework = Cache::get('formtypeworks');
        $typework = array();
        foreach ($FormTypework as $item) {
            if($item->form_id == $this->id) {
                array_push($typework, $item);
            }                           
        }

        if(!Cache::has('formjoboptions')) { Cache::put('formjoboptions', FormJobOption::all()); }
        $FormJoboption = Cache::get('formjoboptions');
        $joboption = array();
        foreach ($FormJoboption as $item) {
            if($item->form_id == $this->id) {
                array_push($joboption, $item);
            }                           
        }

        if(!Cache::has('formduties')) { Cache::put('formduties', FormDutie::all()); }
        $FormDutie = Cache::get('formduties');
        $dutie = array();
        foreach ($FormDutie as $item) {
            if($item->form_id == $this->id) {
                array_push($dutie, $item);
            }                           
        }

        if(!Cache::has('childrens')) { Cache::put('childrens', Children::all()); }
        $Children = Cache::get('childrens');
        $children = '';
        foreach ($Children as $item) {
            if($item->id == $this->childrencount_id) {
                $children = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('workperiods')) { Cache::put('workperiods', WorkPeriod::all()); }
        $WorkPeriod = Cache::get('workperiods');
        $workPeriod = '';
        foreach ($WorkPeriod as $item) {
            if($item->id == $this->workperiod_id) {
                $workPeriod = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('employments')) { Cache::put('employments', Employment::all()); }
        $Employment = Cache::get('employments');
        $employment = '';
        foreach ($Employment as $item) {
            if($item->id == $this->employment_id) {
                $employment = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('hourlypayments')) { Cache::put('hourlypayments', HourlyPayment::all()); }
        $HourlyPayment = Cache::get('hourlypayments');
        $hourpay = '';
        foreach ($HourlyPayment as $item) {
            if($item->id == $this->hourpay_id) {
                $hourpay = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('monthlypayments')) { Cache::put('monthlypayments', MonthlyPayment::all()); }
        $MonthlyPayment = Cache::get('monthlypayments');
        $monthpay = '';
        foreach ($MonthlyPayment as $item) {
            if($item->id == $this->monthpay_id) {
                $monthpay = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('recommendations')) { Cache::put('recommendations', Recommendation::all()); }
        $Recommendation = Cache::get('recommendations');
        $recommendation = '';
        foreach ($Recommendation as $item) {
            if($item->id == $this->recommendation_id) {
                $recommendation = $item->title;                
                break;
            }                           
        }

        if(!Cache::has('experiences')) { Cache::put('experiences', Experience::all()); }
        $Experience = Cache::get('experiences');
        $experience = '';
        foreach ($Experience as $item) {
            if($item->id == $this->experience_id) {
                $experience = $item->title;                
                break;
            }                           
        }
        
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'baby_exp' => $this->baby_exp,
            'experience' => $experience,
            'recommendation' => $recommendation,            
            'education_about' => $this->education_about,
            'workperiod' => $workPeriod,
            'employment' => $employment,
            'childrencount' => $children,
            'children_invalid' => $this->children_invalid,
            'hourpay' => $hourpay,
            'monthpay' => $monthpay,
            'additional' => $additional,         
            'confirmed' => $this->confirmed,

            'Languages' => UserLanguagesResource::collection($lang),
            'Agegroups' => FormAgeGroupResource::collection($agegroup),
            'Credentials' => $credentials,            
            'Educations' => FormEducationResource::collection($education),
            'Typeworks' => FormTypeWorkResource::collection($typework),
            'Joboptions' => FormJobOptionResource::collection($joboption),
            'Duties' => FormDutieResource::collection($dutie),
            'User' => $USER,
            
            'experience_id' => $this->experience_id,
            'recommendation_id' => $this->recommendation_id,
            'workperiod_id' => $this->workperiod_id,
            'employment_id' => $this->employment_id,
            'childrencount_id' => $this->childrencount_id,
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
