<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Registration;
use App\Models\VaccineCenter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function create(){
        $vaccineCenters = VaccineCenter::all();
        return view('registration.create', compact('vaccineCenters'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'nid' => 'required|unique:users,nid',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'vaccine_center_id' => 'required|exists:vaccine_centers,id',
        ]);

        
        $user = User::create([
            'nid' => $request->nid,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        Registration::create([
            'user_id' => $user->id,
            'vaccine_center_id' => $request->vaccine_center_id,
        ]);

        
        return redirect()->route('registration.success');
    }

    public function success(){
        return view('registration.success');
    }
    
}
