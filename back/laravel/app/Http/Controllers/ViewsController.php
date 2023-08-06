<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $baby = Baby::orderBy('created_at', 'desc')->get();
        return WorkBabyResource::collection($baby);        
    }
    public function getNurse ()
    {        
        $nurse = Nurse::orderBy('created_at', 'desc')->get();
        return WorkNurseResource::collection($nurse);        
    }
    public function getKeeper ()
    {        
        $keeper = Keeper::orderBy('created_at', 'desc')->get();
        return WorkKeeperResource::collection($keeper);        
    }

    public function getClientBaby ()
    {  
        $client_baby = Client_baby::orderBy('created_at', 'desc')->get();
        return ClientBabyResource::collection($client_baby);        
    }
    public function getClientNurse ()
    {  
        $client_nurse = Client_nurse::orderBy('created_at', 'desc')->get();
        return ClientNurseResource::collection($client_nurse);        
    }
    public function getClientKeeper ()
    {  
        $client_keeper = Client_keeper::orderBy('created_at', 'desc')->get();
        return ClientKeeperResource::collection($client_keeper);        
    }
}
