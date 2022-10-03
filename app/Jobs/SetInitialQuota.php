<?php

namespace App\Jobs;

use App\Models\Quota;
use AWS\CRT\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SetInitialQuota implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $vehicleId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(int $vehicleId)
    {
        $this->vehicleId = $vehicleId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Quota::create([
            "vehicle_id" => $this->vehicleId,
            "quota" => config("app.initial_quota"),
        ]);
    }
}
