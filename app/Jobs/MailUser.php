<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\User;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;

class MailUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var User
     */
    protected $user;

    /**
     * @var Mailable
     */
    protected $mail;

    /**
     * Create a new job instance.
     *
     * @param User $user
     * @param Mailable $mail
     */
    public function __construct(User $user, Mailable $mail)
    {
        $this->user = $user;
        $this->mail = $mail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send($this->mail);
    }
}
