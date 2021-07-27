<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Mail;
use App\Mail\TestMailConfigs;

class TestMailConfig implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $testEmail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($testEmail)
    {
        $this->testEmail = $testEmail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->testEmail)->send(new TestMailConfigs());
    }
}
