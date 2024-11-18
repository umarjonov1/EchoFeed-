<?php

namespace App\Jobs;

use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreUserJob implements ShouldQueue
{
    use Queueable;

    private $data;

    /**
     * Create a new job instance.
     * @param $data
     */
    public function __construct($data)
    {

        $this->data = $data;
    }
    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $password = Str::random(10);
        $this->data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $this->data['email']], $this->data);
        Mail::to($this->data['email'])->send(new PasswordMail($password));
        event(new Registered($user));
    }
}
