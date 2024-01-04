<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Counter;
use Carbon\Carbon;

class UpdateCounters extends Command
{
    protected $signature = 'counters:update';
    protected $description = 'Update counters every 7 days';

    public function handle()
    {
        // Get all counters
        $counters = Counter::all();

        foreach ($counters as $counter) {
            if ($counter->title === 'Refractive Patient Screened') {
                // $sevenDaysAgo = Carbon::now()->subDays(7);

                // if ($counter->updated_at >= $sevenDaysAgo) {
                    $counter->number += 46;
                    $counter->save();
                }
            // }
        }

        dd('saved');
    }
}
