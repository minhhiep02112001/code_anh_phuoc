<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class CrawlerImport implements ToCollection, WithChunkReading, WithHeadingRow, WithStartRow
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
        DB::beginTransaction();

        try {
            foreach ($rows as $row) {
                if (!empty($row['key_word'])) {
                    $keyword = ucfirst("Nails in {$row['key_word']}");
                    $key = DB::table('crawler')->where('keyword', $keyword)->first();

                    if (empty($key)) {
                        DB::table('crawler')->insert(['keyword' => $keyword, 'status' => 0, 'count' => 1]);
                    } else {
                        DB::table('crawler')->where('id', $key->id)->update([
                            'status' => 0,
                            'count' => 1
                        ]);
                    }

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
