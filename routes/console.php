<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Configuration\ScheduledTasks;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

return function (ScheduledTasks $schedule) {
    $schedule->command('monitor:ping-devices')->everyFiveMinutes();
};
