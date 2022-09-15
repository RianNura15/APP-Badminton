<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Jadwal;

class ExpjadwalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jadwal:exp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set jadwal to expired based on time';

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
        $data_jadwal_list = Jadwal::where([
            ['keterangan', '=', '-'],
            ['expired', '<', Carbon::now()->toTimeString()],
        ])->update(['keterangan' => 'Expired', 'status' => '0']);
    }
}
