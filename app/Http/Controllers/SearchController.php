<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SearchController extends Controller
{
    public function index(){
        return view('search.index');
    }


    public function search(Request $request){
        
        $nid = $request->input('nid');

        $user = User::where('nid', $nid)->first();
        if (!$user) {
            $status = 'Not registered';
            return view('search.result', compact('status'));
        }

        $registration = $user->registration;
        if (!$registration) {
            $status = 'Not registered';
            return view('search.result', compact('status'));
        }

        $status = $registration->status;
        if ($status == 'Scheduled') {
            $schedule = $registration->vaccinationSchedule;
            $scheduledDate = $schedule->scheduled_date;

            if (Carbon::parse($scheduledDate)->isPast()) {
                $status = 'Vaccinated';
                $registration->update(['status' => 'Vaccinated']);
            }

            return view('search.result', compact('status', 'scheduledDate'));
        } elseif ($status == 'Not scheduled') {
            return view('search.result', compact('status'));
        } elseif ($status == 'Vaccinated') {
            return view('search.result', compact('status'));
        }
    }

}
