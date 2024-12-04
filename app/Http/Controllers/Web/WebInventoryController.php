<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebInventoryController extends Controller
{
    public function getInventory(Request $request){
        $user = Auth::user();
    }

    public function addInventoryItem(Request $request){
        $user = Auth::user();
    }

    public function removeInventoryItem(Request $request){
        $user = Auth::user();
    }
}
