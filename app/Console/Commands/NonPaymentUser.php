<?php

namespace App\Console\Commands;

use App\Models\Bill;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Console\Command;

class NonPaymentUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:time';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $now = Carbon::now();
        $bills = Bill::where('status',Bill::BILLPRIVATE)->get();
        foreach ($bills as $bill) {
            $time = $bill->created_at;
            if ($now->diffInMinutes($time) >= 2){
                Ticket::where('bill_id',$bill->id)->delete();
                $bill->delete();
            }
        }
    }
}
