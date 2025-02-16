<?php

namespace App\Imports;

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
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Validators\Failure;

class CrawlerImport  implements ToModel, SkipsEmptyRows, WithHeadingRow, WithStartRow, WithValidation
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

        try {
            if (empty($row['keyword'])) {
                throw new \InvalidArgumentException('Empty keyword provided');
            }

            $title = ucfirst($row['keyword']);
            $slug = \Str::slug($title);

            DB::beginTransaction();

            // $key = DB::table('crawler')->where('keyword', "Ravintola sisään {$title}")->first();
            // if (empty($key)) {
            //     DB::table('crawler')->insert([
            //         'keyword' => "Ravintola sisään {$title}",
            //     ]);
            // }

            $post = Post::firstOrCreate(['slug' => $slug], [
                'slug' => $slug,
                'title' => $title,
                'is_status' => 3,
            ]);

            // $item = DB::table('crawler_map')->where('relate_id', $post->id)->first();
            // if (empty($item)) {
            //     DB::table('crawler_map')->insert([
            //         'key_word' => "{$title} restaurant France",
            //         'slug' => $slug,
            //         'is_crawler' => 0,
            //         'relate_id' => $post->id
            //     ]);
            // }

            DB::commit();
            echo "\n Success {$title} " . $this->importedCount;
            Log::info("SUCCESS {$title}");
            $this->importedCount++;
        } catch (\Exception $ex) {
            Log::error("ERROR processing {$row['keyword']}: " . $ex->getMessage());
            $this->failedCount++;
            DB::rollback();
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
}
