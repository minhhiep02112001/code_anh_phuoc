<?php

namespace App\Console\Commands;

use App\Imports\CrawlerImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ReadingFileExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excel {--file=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $file = $this->option('file'); 
        
        try{
             
            Excel::import(new CrawlerImport, public_path($file));
        }catch(\Exception $e){
            dd($e);
        }

        $this->info('File imported successfully.');

        return Command::SUCCESS;
    }
}
