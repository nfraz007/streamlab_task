<?php

namespace App\Console\Commands;

use App\Models\StreamModel;
use Artisan;
use Exception;
use Illuminate\Console\Command;

class UpdateStreamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-stream';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for update the stream data';

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
            $streams = StreamModel::all();
            foreach($streams as $stream) {
                $stream->increment('viewer_count', rand(0,10));
            }

        }catch(Exception $e){
            $this->error($e->getMessage());
        }
    }
}
