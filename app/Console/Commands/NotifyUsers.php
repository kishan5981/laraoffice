<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;

class NotifyUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Notification to user on daily basis';

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
        //mails
        sendMailMeetingRemainder();
        // badgeMailAlerts();
        commitmentMailRemainder();
        sendBirthdayMailRemainder();


        //notifications
        sendMeetingRemainder();
        sendBirthdayRemainder();
        \Log::info(sendBirthdayRemainder());
        //badgeAlerts();
        commitmentRemainder();
        \Log::info("Notification successfully sent");
    }
}
