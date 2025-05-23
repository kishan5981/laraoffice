<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Review;

class DeleteUserReview extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:review';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete customer review';

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
        $date = date('Y-m-d H:i:s', strtotime('-360 minute'));
        $reviews = Review::where('created_at','<=',$date);
        if ($reviews->count() > 0) {
            $reviews->delete();
        }
    }
}
