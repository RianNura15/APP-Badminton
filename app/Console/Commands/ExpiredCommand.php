<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Data_sewa;

class ExpiredCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sewa:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set booking to expired based on time';

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
        $data_booking_list = Data_sewa::where([
            ['keterangan', '=', '-'],
            ['bukti_tf', '=', 'Belum di Bayar'],
            ['tempo', '<', Carbon::now()->toTimeString()],
        ])->update(['keterangan' => 'Expired']);

    }
}
