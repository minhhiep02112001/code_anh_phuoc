<?php

namespace App\Console\Commands;

use App\Imports\CrawlerImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ReadExcelFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'excel:read {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to read an Excel file';

    /**
     * Execute the console command.
     *
     * @return int
     */
    // php artisan excel:read Fi
    public function handle()
    {
        $filePath = $this->argument('file');
        if (!file_exists(public_path($filePath))) {
            $this->error('File not found: ' . $filePath);
            return 1;
        }


        try {
            echo 'Excel file read successfully!';
            Excel::import(new CrawlerImport, public_path($filePath));
            $this->info("\n=>Excel file read and processed successfully!");
        } catch (\Exception $e) {
            $this->error('Error reading file: ' . $e->getMessage());
        }

        return 0;
    }
}
