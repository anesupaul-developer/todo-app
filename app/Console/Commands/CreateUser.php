<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {

        $input['name'] = $this->ask('Please enter user full name');
        $input['email'] = $this->ask('Please enter user email address');
        $input['password'] = $this->secret('Please enter user password');
        $input['is_admin'] = $this->choice('Is user an admin ?', ['no', 'yes']);

        $input = [
            ...$input, 'password' => Hash::make($input['password']), 'is_admin' => $input['is_admin'] === 'yes'
        ];

        $user = User::create($input);

        $this->info("User ".$user->name. " with email ".$user->email." has been created successfully");

        return self::SUCCESS;
    }
}
