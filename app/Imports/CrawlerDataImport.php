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

class CrawlerDataImport implements ToCollection, WithChunkReading, WithHeadingRow, WithStartRow
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
                    $key_word = $row['key_word'];
                    if(empty($key_word)) continue;
                    $slug = \Str::slug($row['key_word']);
                    $key = DB::table('crawler_data')->where('slug', $slug)->first();

                    if (empty($key)) {
                        DB::table('crawler_data')->insert([
                            'key_word' => $key_word,
                            'slug' => $slug,
                            'status' => 2,
                            'link_google_map' => $row['link_google_map']
                        ]);
                    } else {
                        DB::table('crawler_data')->where('id', $key->id)->update([
                            'status' => 2,
                            'link_google_map' => $row['link_google_map']
                        ]);
                    }

                    $this->importedCount++;
                    echo "\n Done {$key_word} - " . $this->importedCount;
                    Log::info("SUCCESS {$key_word}");
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
