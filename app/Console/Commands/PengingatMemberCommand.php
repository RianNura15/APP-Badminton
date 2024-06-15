<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Datauser;
use App\Models\User;

class PengingatMemberCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'member:reminder';

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
        $updatedMember = Datauser::where([
            ['pengingat', '<', Carbon::now()->format('Y-m-d H:i:s')],
        ])->get();

        foreach ($updatedMember as $member) {
            Datauser::where('user_id', $member->user_id)
                    ->update([
                        'status_perpanjang' => 1,
                    ]);
        }
    }
}
