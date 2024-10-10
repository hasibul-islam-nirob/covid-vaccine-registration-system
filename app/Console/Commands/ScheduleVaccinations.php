<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\VaccinationScheduler;

class ScheduleVaccinations extends Command{
    protected $signature = 'vaccinations:schedule';
    protected $description = 'Schedule vaccinations for registered users';

    public function handle(VaccinationScheduler $scheduler){
        $scheduler->schedule();
        $this->info('Vaccinations scheduled successfully.');
    }
}