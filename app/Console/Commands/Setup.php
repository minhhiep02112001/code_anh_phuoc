<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

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
        $this->info('🔄 Đang xóa storage link cũ (nếu có)...');
        if (is_link(public_path('storage'))) {
            unlink(public_path('storage'));
        }

        $this->info('🔗 Tạo storage link mới...');
        Artisan::call('storage:link');
        $this->line(Artisan::output());

        $this->info('🛠 Set quyền thư mục...');
        try {
            // Chown cho web server user
            @chown(storage_path(), 'www-data');
            @chgrp(storage_path(), 'www-data');

            @chown(public_path('storage'), 'www-data');
            @chgrp(public_path('storage'), 'www-data');

            // Set permission
            @chmod(storage_path(), 0775);
            @chmod(public_path('storage'), 0775);

            $this->info('✅ Quyền thư mục đã được set.');
        } catch (\Throwable $e) {
            $this->error('⚠ Không set được quyền thư mục: ' . $e->getMessage());
        }

        $this->info('🧹 Clear cache...');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        $this->info('🎉 Hoàn tất setup storage!');
        return 0;
    }
}
