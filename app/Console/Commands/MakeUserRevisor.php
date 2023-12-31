<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:makeUserRevisor {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make user revisor';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', $this->argument('email'))->first();

        if(!$user) {
            $this->error('utente non trovato');
            return;
        }

        $user->role = 'revisor';
        $user->save();
        $this->info("L'utente {$user->name} è un revisore");
    }
}
