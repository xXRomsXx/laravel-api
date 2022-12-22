<?php

namespace App\Console\Commands\Fixtures\Users;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Generate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fixtures:users:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate random users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        foreach ($this->getFixtures() as $fixture) {
            User::create($fixture);
        }

        return Command::SUCCESS;
    }

    /**
     * Generate fxtures to push
     *
     * @return array
     */
    private function getFixtures(): array
    {
        return [
            [
                'lastname'  => 'Admin',
                'firstname' => 'Superman',
                'email'     => 'admin@fixture.lan',
                'password'  => bcrypt(User::ROLE_ADMIN),
                'role'      => User::ROLE_ADMIN
            ],
            [
                'lastname'  => 'Doe',
                'firstname' => 'John',
                'email'     => 'jdoe@fixture.lan',
                'password'  => bcrypt(User::ROLE_LANDLORD),
                'role'      => User::ROLE_LANDLORD
            ],
            [
                'lastname'  => 'Morane',
                'firstname' => 'Bob',
                'email'     => 'bmorane@fixture.lan',
                'password'  => bcrypt(User::ROLE_LANDLORD),
                'role'      => User::ROLE_LANDLORD
            ]
        ];
    }
}