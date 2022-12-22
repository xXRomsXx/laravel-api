<?php

namespace App\Console\Commands\Fixtures\Users;

use App\Models\User;
use Illuminate\Console\Command;

class Purge extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fixtures:users:purge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Purge random users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        User::whereNotNull('id')->forceDelete();

        return Command::SUCCESS;
    }
}