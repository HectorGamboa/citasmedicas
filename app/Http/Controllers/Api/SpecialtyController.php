<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialty ;
use Illuminate\Http\Request;


class SpecialtyController extends Controller
{
    //
    public function doctors(Specialty $specialtyId){
        return $specialtyId -> users()->get(['users.id','users.name']);
    }
}
