<?php

namespace App\Jobs\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use Illuminate\Support\Facades\Mail;
use App\Mail\UserForgotPasswordMail;

class UserForgotPasswordJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $name;
    protected $lang;

    /**
     * Create a new job instance.
     */
    public function __construct($name, $lang)
    {
        $this->name = $name;
        $this->lang = $lang;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new UserForgotPasswordMail($this->email, $this->lang));
    }
}
