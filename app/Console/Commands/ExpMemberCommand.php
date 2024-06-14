<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Datauser;
use App\Models\User;

class ExpMemberCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'member:exp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Member sudah expired';

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
        $updatedMember = Datauser::where([
            ['status_bayar', '=', 'Terbayar'],
            ['jangka_waktu', '<', Carbon::now()->format('Y-m-d H:i:s')],
        ])->get();

        foreach ($updatedMember as $member) {
            User::where('id', $member->user_id)
                ->update([
                    'pengajuan_member' => 0,
                    'member' => 0,
                ]);
            
            Datauser::where('user_id', $member->user_id)
                    ->update([
                        'opsi_bayar' => NULL,
                        'id_bayar' => NULL,
                        'snap_token' => NULL,
                        'status_bayar' => NULL,
                        'jangka_waktu' => NULL,
                    ]);
        }
    }
}
