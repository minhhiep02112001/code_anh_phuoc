<?php

namespace App\Console\Commands;

use App\Imports\CrawlerImport;
use App\Imports\CrawlerDataImport;
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
    // php artisan import:excel --file=Nails.xlsx
    public function handle()
    {
        $file = $this->option('file'); 

         if (!file_exists(public_path($file))) {
            $this->error('File not found: ' . $file);
            return 1;
        }
      
        try{
            echo "Reading file: \n";
            Excel::import(new CrawlerDataImport, public_path($file));
        }catch(\Exception $e){ 
        }

        $this->info('File imported successfully.');

        return Command::SUCCESS;
    }
}
