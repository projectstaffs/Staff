<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Forms\Baby;
use App\Http\Resources\Views\WorkBabyResource;
use App\Models\Forms\Nurse;
use App\Http\Resources\Views\WorkNurseResource;
use App\Models\Forms\Keeper;
use App\Http\Resources\Views\WorkKeeperResource;

use App\Models\Client\ClientBaby;
use App\Http\Resources\Views\ClientBabyResource;
use App\Models\Client\ClientNurse;
use App\Http\Resources\Views\ClientNurseResource;
use App\Models\Client\ClientKeeper;
use App\Http\Resources\Views\ClientKeeperResource;

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
        if(!Cache::has('client_babies')) { Cache::put('client_babies', ClientBaby::all()); }
        $getItems = Cache::get('client_babies');
        return ClientBabyResource::collection($getItems);             
    }
    public function getClientNurse ()
    { 
        if(!Cache::has('client_nurses')) { Cache::put('client_nurses', ClientNurse::all()); }
        $getItems = Cache::get('client_nurses');
        return ClientNurseResource::collection($getItems);
    }
    public function getClientKeeper ()
    { 
        if(!Cache::has('client_keepers')) { Cache::put('client_keepers', ClientKeeper::all()); }
        $getItems = Cache::get('client_keepers');
        return ClientKeeperResource::collection($getItems);        
    }

    public function blockBaby (Request $request)
    { 
                      
    }
    public function blockNurse (Request $request)
    { 
                      
    }
    public function blockKeeper (Request $request)
    { 
                      
    }
    public function restoreBaby (Request $request)
    { 
                      
    }
    public function restoreNurse (Request $request)
    { 
                      
    }
    public function restoreKeeper (Request $request)
    { 
                      
    }

    public function blockClientBaby (Request $request)
    { 
                      
    }
    public function blockClientNurse (Request $request)
    { 
                      
    }
    public function blockClientKeeper (Request $request)
    { 
                      
    }
    public function restoreClientBaby (Request $request)
    { 
                      
    }
    public function restoreClientNurse (Request $request)
    { 
                      
    }
    public function restoreClientKeeper (Request $request)
    { 
                      
    }
}
