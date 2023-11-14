<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\forms\Baby;
use App\Http\Resources\views\WorkBabyResource;
use App\Models\forms\Nurse;
use App\Http\Resources\views\WorkNurseResource;
use App\Models\forms\Keeper;
use App\Http\Resources\views\WorkKeeperResource;

use App\Models\client\Client_baby;
use App\Http\Resources\views\ClientBabyResource;
use App\Models\client\Client_nurse;
use App\Http\Resources\views\ClientNurseResource;
use App\Models\client\Client_keeper;
use App\Http\Resources\views\ClientKeeperResource;

class ViewsController extends Controller
{
    public function getBaby ()
    { 
        if(!Cache::has('babies')) { Cache::put('babies', Baby::all()); }
        $getItems = Cache::get('babies');
        return WorkBabyResource::collection($getItems);               
    }
    public function getNurse ()
    { 
        if(!Cache::has('nurses')) { Cache::put('nurses', Nurse::all()); }
        $getItems = Cache::get('nurses'); 
        return WorkNurseResource::collection($getItems);        
    }
    public function getKeeper ()
    { 
        if(!Cache::has('keepers')) { Cache::put('keepers', Keeper::all()); }
        $getItems = Cache::get('keepers');
        return WorkKeeperResource::collection($getItems);        
    }

    public function getClientBaby ()
    { 
        if(!Cache::has('client_babies')) { Cache::put('client_babies', Client_baby::all()); }
        $getItems = Cache::get('client_babies');
        return ClientBabyResource::collection($getItems);             
    }
    public function getClientNurse ()
    { 
        if(!Cache::has('client_nurses')) { Cache::put('client_nurses', Client_nurse::all()); }
        $getItems = Cache::get('client_nurses');
        return ClientNurseResource::collection($getItems);
    }
    public function getClientKeeper ()
    { 
        if(!Cache::has('client_keepers')) { Cache::put('client_keepers', Client_keeper::all()); }
        $getItems = Cache::get('client_keepers');
        return ClientKeeperResource::collection($getItems);        
    }
}
