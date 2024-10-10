<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VaccinationSchedule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\VaccinationReminder;

class SendVaccinationReminders extends Command{

    protected $signature = 'vaccinations:send-reminders';
    protected $description = 'Send vaccination reminders to users';

    public function handle(){
        $tomorrow = Carbon::tomorrow()->toDateString();
        $schedules = VaccinationSchedule::where('scheduled_date', $tomorrow)->get();

        foreach ($schedules as $schedule) {
            $user = $schedule->registration->user;
            Mail::to($user->email)->send(new VaccinationReminder($user, $schedule->scheduled_date));
        }

        $this->info('Vaccination reminders sent successfully.');
    }
}