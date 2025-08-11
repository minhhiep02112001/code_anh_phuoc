<?php

namespace App\Imports;

use App\Models\Crawler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CrawlerImport implements ToCollection, WithChunkReading, WithHeadingRow
{
    use Importable;

    private int $importedCount = 0;
    private int $failedCount   = 0;

    // Nếu header ở dòng 1:
    public function headingRow(): int
    {
        return 1;
    }

    public function collection(\Illuminate\Support\Collection $rows)
    { 
        try {
            DB::beginTransaction();
            foreach ($rows as $row) {
                // $row là array với key đã chuẩn hoá: key_word, link_google_map, ...
                $keyWord = trim((string)($row['key_word'] ?? ''));
                if ($keyWord === '') continue;

                $slug = \Str::slug($keyWord);

                $collect = collect($row)->only([
                    'key_word', 'link_google_map', 'iframe_map', 'address', 'phone', 'email'
                ])->toArray();

                $params = array_merge($collect, [
                    'is_status'  => 0,
                    'slug'       => $slug,
                    'is_crawler' => 0,
                ]);
                
                Crawler::firstOrCreate(['slug' => $slug], $params);
                $this->importedCount++;
                Log::info("SUCCESS {$keyWord}");
            }
            DB::commit();
        } catch (\Throwable $ex) {
            DB::rollBack();
            $this->failedCount++;
            Log::error("ERROR in chunk: " . $ex->getMessage());
        }
    }

    public function chunkSize(): int
    {
        return 100;
    }

    public function getImportResults(): array
    {
        return [
            'importedCount' => $this->importedCount,
            'failedCount'   => $this->failedCount,
        ];
    }
}