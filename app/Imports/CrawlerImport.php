<?php

namespace App\Imports;

use App\Models\Crawler;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Validators\Failure;

class CrawlerImport  implements ToModel, SkipsEmptyRows, WithHeadingRow, WithStartRow, WithValidation, WithChunkReading
{
    use Importable;

    private $key_code = '';

    private $importedCount = 0;
    private $failedCount = 0;


    private $errors = [];
    private $success = [];
    public $rowCount = 0;
    public function startRow(): int
    {
        return 2;  // Bắt đầu xử lý từ dòng 5
    }


    public function model(array $row)
    {
        if (!empty($row['key_word'])) {
            try {
            
                $keyword = $row['key_word'];
                
                
                 
                Crawler::updateOrCreate(['slug' => \Str::slug($keyword)], [
                    'slug' => \Str::slug($keyword),
                    'keyword' => $keyword,
                    'is_status' => 2,
                    'link_google_map' => $row['link_google_map'] ?? ''
                ]);
                // $keyword = ucfirst("Nails In {$row['key_word']}, United Kingdom");
                // $key = DB::table('crawler')->where('keyword', $keyword)->first();
                // if (empty($key)) {
                //     DB::table('crawler')->insert(['keyword' => $keyword, 'is_status' => 2, 'link_google_map' => $row['link_google_map'] ?? '']);
                // } else {
                //     DB::table('crawler')->where('id', $key->id)->update([
                //         'is_status' => 2,
                //         'link_google_map' => $row['link_google_map'] ?? ''
                //     ]);
                // }
    
                
                echo "\n Success {$keyword} " . $this->importedCount;
                Log::info("SUCCESS {$keyword}");
                $this->importedCount++;
            } catch (\Exception $ex) {
            dd($ex);
                Log::error("ERROR processing {$row['key_word']}: " . $ex->getMessage());
                $this->failedCount++; 
            }
        } 
    }


    public function getRowCount()
    {
        return $this->rowCount;
    }

    public function rules(): array
    {
        $validate = [];
        return $validate;
    }


    public function getImportResults()
    {
        return [
            'importedCount' => $this->importedCount,
            'failedCount' => $this->failedCount
        ];
    }

    public function getDataImport()
    {
        return [
            'data_success' => $this->success,
            'data_errors' => $this->errors
        ];
    }


    public function getImportedCount()
    {
        return $this->importedCount;
    }

    public function getFailedCount()
    {
        return $this->failedCount;
    }
    public function chunkSize(): int
    {
        return 100; // xử lý 100 dòng mỗi lần (bạn có thể điều chỉnh)
    }
}
