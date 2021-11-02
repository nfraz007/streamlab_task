<?php

namespace App\Console\Commands;

use Artisan;
use Exception;
use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Application installation command';

    /**
     * Create a new command instArtisanance.
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
        try{
            $this->info("Started...");

            Artisan::call('migrate:fresh', ['--force' => true]);

            $this->info("migration done.");
            Artisan::call('db:seed', ['--class' => 'TwitchSeeder']);
            $this->info("seeder done.");
            
            $this->info("finished...");
            $this->info("successfully installed");
        }catch(Exception $e){
            $this->error($e->getMessage());
        }
    }
}
