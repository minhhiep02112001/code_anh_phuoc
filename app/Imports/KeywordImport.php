<?php

namespace App\Imports;

use App\Models\Keyword;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class KeywordImport implements ToCollection, WithChunkReading, WithHeadingRow, WithStartRow
{
    use Importable;

    private $importedCount = 0;
    private $failedCount = 0;

    public function startRow(): int
    {
        return 2; // bắt đầu từ dòng 2 (header ở dòng 1)
    }

    public function collection(Collection $rows)
    {
        try {
            DB::beginTransaction();
            foreach ($rows as $row) {
                if (!empty($row['key_word']) && $keyword = $row['key_word']) {
                    Keyword::updateOrCreate([
                        'key_word' =>  $keyword,
                        'domain' => env('APP_URL'),
                    ], [
                        'key_word' =>  $keyword,
                        'status' => 0,
                        'domain' => env('APP_URL'),
                        'count' => 1,
                        'type' => env('APP_TYPE', 'nail')
                    ]);
                    $this->importedCount++;
                    Log::info("SUCCESS {$keyword}");
                }
            }
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            $this->failedCount++;
            Log::error("ERROR in chunk: " . $ex->getMessage());
        }
    }

    public function chunkSize(): int
    {
        return 100; // xử lý 100 dòng mỗi chunk
    }

    public function getImportResults()
    {
        return [
            'importedCount' => $this->importedCount,
            'failedCount' => $this->failedCount,
        ];
    }
}
