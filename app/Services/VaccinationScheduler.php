<?php

namespace App\Services;

use App\Models\Registration;
use App\Models\VaccineCenter;
use App\Models\VaccinationSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VaccinationScheduler{

    public function schedule(){
        $registrations = Registration::where('status', 'Not scheduled')->orderBy('created_at')->get();

        foreach ($registrations as $registration) {
            $center = $registration->vaccineCenter;

            $nextAvailableDate = $this->getNextAvailableDate($center);

            // Schedule the vaccination
            DB::transaction(function () use ($registration, $nextAvailableDate) {
                $registration->update(['status' => 'Scheduled']);
                VaccinationSchedule::create([
                    'registration_id' => $registration->id,
                    'scheduled_date' => $nextAvailableDate->toDateString(),
                ]);
            });
        }
    }

    private function getNextAvailableDate(VaccineCenter $center){
        $date = Carbon::today();

        while (true) {
            // Skip date is not Sunday to Thursday
            if (!in_array($date->dayOfWeek, [0,1,2,3,4])) {
                $date->addDay();
                continue;
            }

            // Check count of scheduled vaccinations, this date for this center
            $count = VaccinationSchedule::whereHas('registration', function($query) use ($center) {
                $query->where('vaccine_center_id', $center->id);
            })->where('scheduled_date', $date->toDateString())->count();

            if ($count < $center->daily_limit) {
                return $date;
            } else {
                $date->addDay();
            }
        }
    }
}