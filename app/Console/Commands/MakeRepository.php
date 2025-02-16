<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Create a repository interface and Eloquent implementation, along with a model if it doesn\'t exist';

    public function handle()
    {
        $name = $this->argument('name');

        // Tạo Model nếu chưa tồn tại
        if (!class_exists("App\\Models\\{$name}")) {
            Artisan::call('make:model', ['name' => "{$name}"]);
            $this->info("Model {$name} created successfully.");
        } else {
            $this->info("Model {$name} already exists.");
        }

        // Đường dẫn đến Contracts và Eloquent với tên file mới
        $contractsPath = app_path("Repositories/Contracts/{$name}Contracts.php");
        $eloquentPath = app_path("Repositories/Eloquent/{$name}Repository.php");

        // Kiểm tra và tạo thư mục nếu chưa tồn tại
        if (!File::exists(dirname($contractsPath))) {
            File::makeDirectory(dirname($contractsPath), 0777, true);
        }

        if (!File::exists(dirname($eloquentPath))) {
            File::makeDirectory(dirname($eloquentPath), 0777, true);
        }

        // Nội dung của Interface
        $contractContent = <<<EOT
<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

interface {$name}Contracts extends RepositoryInterface
{
    // Define custom methods for the repository
}
EOT;

        // Nội dung của Repository Eloquent
        $eloquentContent = <<<EOT
<?php

namespace App\Repositories\Eloquent;

use App\Models\\{$name};
use App\Repositories\Contracts\\{$name}Contracts;
use App\Repositories\Repository;

class {$name}Repository extends Repository implements {$name}Contracts
{
    public function model()
    {
        return {$name}::class;
    }
}
EOT;

        // Tạo file Interface và Eloquent Repository
        File::put($contractsPath, $contractContent);
        File::put($eloquentPath, $eloquentContent);

        $this->info("{$name}Contracts Interface and {$name}Repository Eloquent created successfully.");

        // Tự động đăng ký vào AppServiceProvider
        $this->registerInAppServiceProvider($name);
    }

    protected function registerInAppServiceProvider($name)
    {
        $providerPath = app_path('Providers/AppServiceProvider.php');
        $bindStatement = "\$this->app->bind(\\App\\Repositories\\Contracts\\{$name}Contracts::class, \\App\\Repositories\\Eloquent\\{$name}Repository::class);";

        if (File::exists($providerPath)) {
            $providerContent = File::get($providerPath);

            // Kiểm tra xem binding đã tồn tại chưa
            if (strpos($providerContent, $bindStatement) === false) {
                // Thêm binding vào phương thức register()
                $providerContent = preg_replace(
                    '/public function register\(\)\n\s*\{/',
                    "public function register()\n    {\n        {$bindStatement}",
                    $providerContent
                );

                File::put($providerPath, $providerContent);
                $this->info("Registered {$name}Contracts in AppServiceProvider.");
            } else {
                $this->info("{$name}Contracts is already registered in AppServiceProvider.");
            }
        }
    }
}
