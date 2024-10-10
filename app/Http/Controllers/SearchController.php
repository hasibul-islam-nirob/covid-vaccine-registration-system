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
        $status = "";
        $scheduledDate = "";

        $user = User::where('nid', $nid)->first();
        if (!$user) {
            $status = 'Not registered';
            return view('search.index', compact('status','scheduledDate','nid'));

        }

        $registration = $user->registration;
        if (!$registration) {
            $status = 'Not registered';
            return view('search.index', compact('status','scheduledDate','nid'));

        }

        $status = $registration->status;
        if ($status == 'Scheduled') {
            $schedule = $registration->vaccinationSchedule;
            $scheduledDate = $schedule->scheduled_date;

            if (Carbon::parse($scheduledDate)->isPast()) {
                $status = 'Vaccinated';
                $registration->update(['status' => 'Vaccinated']);
            }

            $status = 'Scheduled';
            $scheduledDate = $scheduledDate;
            return view('search.index', compact('status','scheduledDate','nid'));


        } elseif ($status == 'Not scheduled') {
            $status = 'Not scheduled';
            return view('search.index', compact('status','scheduledDate','nid'));

        } elseif ($status == 'Vaccinated') {
            $status = 'Vaccinated';
            return view('search.index', compact('status','scheduledDate','nid'));

        }

    }

}
