<?php

namespace App\Http\Resources\Views;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Cache;

use App\Models\Forms\Nurse;
use App\Models\Forms\FormNurseEducation;
use App\Http\Resources\Forms\Nurse\FormNurseEducationResource;
use App\Models\Forms\FormDiagnose;
use App\Http\Resources\Forms\Nurse\FormDiagnoseResource;
use App\Models\Forms\FormNurseDutie;
use App\Http\Resources\Forms\Nurse\FormNurseDutieResource;
use App\Models\Forms\FormNurseTypeWork;
use App\Http\Resources\Forms\Nurse\FormNurseTypeWorkResource;
use App\Models\User;
use App\Http\Resources\UserResource;

use App\Models\Data\WorkPeriod;
use App\Models\Data\MonthlyPayment;
use App\Models\Data\HourlyPayment;
use App\Models\Data\Experience;
use Illuminate\Support\Carbon;

class WorkNurseResource extends JsonResource
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
        

        if(!Cache::has('formnurseeducations')) { Cache::put('formnurseeducations', FormNurseEducation::all()); }
        $FormNurseeducation = Cache::get('formnurseeducations');
        $education = array();
        foreach ($FormNurseeducation as $item) {
            if($item->form_id == $this->id) {
                array_push($education, $item);
            }                           
        }

        if(!Cache::has('formnursetypeworks')) { Cache::put('formnursetypeworks', FormNurseTypeWork::all()); }
        $FormNurseeducation = Cache::get('formnursetypeworks');
        $typework = array();
        foreach ($FormNurseeducation as $item) {
            if($item->form_id == $this->id) {
                array_push($typework, $item);
            }                           
        }

        if(!Cache::has('formnurseduties')) { Cache::put('formnurseduties', FormNurseDutie::all()); }
        $FormNursedutie = Cache::get('formnurseduties');
        $dutie = array();
        foreach ($FormNursedutie as $item) {
            if($item->form_id == $this->id) {
                array_push($dutie, $item);
            }                           
        }

        if(!Cache::has('formdiagnoses')) { Cache::put('formdiagnoses', FormDiagnose::all()); }
        $FormDiagnose = Cache::get('formdiagnoses');
        $diagnose = array();
        foreach ($FormDiagnose as $item) {
            if($item->form_id == $this->id) {
                array_push($diagnose, $item);
            }                           
        }

        if(!Cache::has('workperiods')) { Cache::put('workperiods', WorkPeriod::all()); }
        $WorkPeriod = Cache::get('workperiods');
        $workPeriod = '';
        foreach ($WorkPeriod as $item) {
            if($item->id == $this->workperiod_id) {
                $workPeriod = $item;                
                break;
            }                           
        }

        if(!Cache::has('hourlypayments')) { Cache::put('hourlypayments', HourlyPayment::all()); }
        $HourlyPayment = Cache::get('hourlypayments');
        $hourpay = '';
        foreach ($HourlyPayment as $item) {
            if($item->id == $this->hourpay_id) {
                $hourpay = $item;                
                break;
            }                           
        }

        if(!Cache::has('monthlypayments')) { Cache::put('monthlypayments', MonthlyPayment::all()); }
        $MonthlyPayment = Cache::get('monthlypayments');
        $monthpay = '';
        foreach ($MonthlyPayment as $item) {
            if($item->id == $this->monthpay_id) {
                $monthpay = $item;                
                break;
            }                           
        }

        if(!Cache::has('experiences')) { Cache::put('experiences', Experience::all()); }
        $Experience = Cache::get('experiences');
        $experience = '';
        foreach ($Experience as $item) {
            if($item->id == $this->experience_id) {
                $experience = $item;                
                break;
            }                           
        }

        $Date = Carbon::parse($this->created_at)->format('d.m.Y');
        
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'nurse_exp' => $this->getTranslations('nurse_exp'),
            'experience' => $experience,
            'workperiod' => $workPeriod,            
            'hourpay' => $hourpay,
            'monthpay' => $monthpay,
            'confirmed' => $this->confirmed,
            'date' => $Date,
            
            'Educations' => FormNurseEducationResource::collection($education),            
            'Typeworks' => FormNurseTypeWorkResource::collection($typework),
            'Duties' => FormNurseDutieResource::collection($dutie),
            'Diagnoses' => FormDiagnoseResource::collection($diagnose),            
            'User' => $USER,            
            
            'experience_id' => $this->experience_id,
            'workperiod_id' => $this->workperiod_id,            
            'hourpay_id' => $this->hourpay_id,
            'monthpay_id' => $this->monthpay_id,            
        ];
    }
}
