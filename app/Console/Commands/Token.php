<?php

namespace App\Console\Commands;
 
use App\Services\JwtService; 
use Illuminate\Console\Command; 

class Token extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:render';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $token = JwtService::createToken(['user_id' => 1]);
        dd($token);
    }

    
}
