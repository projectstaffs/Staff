<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Models\Forms\Baby;
use App\Models\Forms\Nurse;
use App\Models\Forms\Keeper;

use App\Models\Client\ClientBaby;
use App\Models\Client\ClientNurse;
use App\Models\Client\ClientKeeper;

class UserBlockController extends Controller
{
    public function blockBaby (Request $request)
    { 
        $item = Baby::where('id', $request->id)->first();
        if ($item) {
            $item->confirmed = false;
            $item->save();
            
            Cache::put('babies', Baby::all());            
        }                      
    }
    public function blockNurse (Request $request)
    { 
                      
    }
    public function blockKeeper (Request $request)
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
}
