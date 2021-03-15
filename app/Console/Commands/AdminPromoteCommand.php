<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminPromoteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:promote {user : ID or email of user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Promote a user as admin using ID or email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $userArg = $this->argument('user');

        if ($userArg) {
            $this->findUser($userArg);

            return 0;
        }

        $this->info('No arguments found. Type php artisan make:admin -h for help');

        return 0;
    }

    public function findUser($id)
    {
        $user = User::where('id', $id)
            ->orWhere('email', $id)
            ->first();

        if ($user) {
            $user->is_admin = true;
            $user->save();

            $this->info('Successfully set user as admin');
        } else {
            $this->error('User not found.');
        }
    }
}
