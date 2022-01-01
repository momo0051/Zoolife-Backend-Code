<?php

namespace App\Console\Commands;

use App\Models\Item;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class BidWinner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bid:winner';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Declare bid winner';

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
     * @return int
     */
    public function handle()
    {
        ## get all future post auctions.
        Item::declarePostWinner();
    }
}
