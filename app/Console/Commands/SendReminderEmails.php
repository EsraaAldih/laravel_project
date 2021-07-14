<?php

namespace App\Console\Commands;

use App\Mail\ReminderEmail;
use App\Student;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to students not logged-in for month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $limit=Carbon::now()->submonth(1);
        //get all reminders for today
        $reminders = Student::get()
        ->where('last_login_at', '<=',$limit);
    //get inactive users and send email
    foreach ($reminders as $reminder){

    Mail::to($reminder->email)->send(new ReminderEmail($reminder));
    }
}
}
