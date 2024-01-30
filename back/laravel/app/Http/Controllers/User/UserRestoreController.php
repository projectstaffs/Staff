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

class UserRestoreController extends Controller
{
    public function restoreBaby (Request $request)
    { 
        $item = Baby::where('id', $request->id2)->first();
        if ($item) {
            $item->confirmed = true;
            $item->save();
            
            Cache::put('babies', Baby::all());            
        }              
    }
    public function restoreNurse (Request $request)
    { 
        $item = Nurse::where('id', $request->id2)->first();
        if ($item) {
            $item->confirmed = true;
            $item->save();
            
            Cache::put('nurses', Nurse::all());            
        }              
    }
    public function restoreKeeper (Request $request)
    { 
        $item = Keeper::where('id', $request->id2)->first();
        if ($item) {
            $item->confirmed = true;
            $item->save();
            
            Cache::put('keepers', Keeper::all());            
        }             
    }
    
    public function restoreClientBaby (Request $request)
    { 
        $item = ClientBaby::where('id', $request->id2)->first();
        if ($item) {
            $item->confirmed = true;
            $item->save();
            
            Cache::put('client_babies', ClientBaby::all());            
        }             
    }
    public function restoreClientNurse (Request $request)
    { 
        $item = ClientNurse::where('id', $request->id2)->first();
        if ($item) {
            $item->confirmed = true;
            $item->save();
            
            Cache::put('client_nurses', ClientNurse::all());            
        }             
    }
    public function restoreClientKeeper (Request $request)
    { 
        $item = ClientKeeper::where('id', $request->id2)->first();
        if ($item) {
            $item->confirmed = true;
            $item->save();
            
            Cache::put('client_keepers', ClientKeeper::all());            
        }             
    }
}
