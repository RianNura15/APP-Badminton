<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Jadwal;
use App\Models\Data_sewa;

class MulaiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jadwal:mulai';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set jadwal to start based on time';

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
            ['keterangan', '=', 'Aktif'],
            ['tanggalmain', '=', Carbon::today()->toDateString()],
            ['jam_mulai', '<', Carbon::now()->toTimeString()],
            ['jam_selesai', '>', Carbon::now()->toTimeString()],
        ]);

        $booking_list_status['keterangan'] = 'Mulai';

        if($data_booking_list->update($booking_list_status))
            $this->info('Start booking-an selesai');
    }
}
