<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Jadwal;
Use App\Models\Data_sewa;

class SelesaiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jadwal:selesai';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set jadwal to finish based on time';

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
        $data_booking_list = Jadwal::where([
            ['keterangan', '=', 'Mulai'],
            ['status', '=', '1'],
            ['tanggalmain', '=', Carbon::today()->toDateString()],
            ['jam_selesai', '<', Carbon::now()->toTimeString()],
        ])->update(['keterangan' => 'Selesai', 'status' => '0']);
    }
}
