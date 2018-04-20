<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;
class InstallProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates every required file or dependency for the project';

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
     * @return mixed
     */
    public function handle()
    {
        Artisan::call('storage:link');
        Artisan::call('migrate:refresh', [
            '--seed' =>true,
        ]);
    }
}
