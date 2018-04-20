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
        echo "Checking folders... \n";

        if(!is_dir(storage_path('app').'/public')) {
            mkdir(storage_path('app').'/public');
            mkdir(storage_path('app').'/public/vendors');
            mkdir(storage_path('app').'/public/items');
        }
        Artisan::call('storage:link');
        echo "Creating test data... please wait. \n";
        Artisan::call('key:generate');
        Artisan::call('migrate:refresh', [
            '--seed' =>true,
        ]);
        echo "All done, enjoy! \n";
    }
}
