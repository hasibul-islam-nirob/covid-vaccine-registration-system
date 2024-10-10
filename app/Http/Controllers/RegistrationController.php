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

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        
        DB::beginTransaction();
        try {

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
            DB::commit();

            return redirect()->back()->with('success', 'Registration successfully.');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
        
    }

    public function success(){
        return view('registration.success');
    }
    
}
