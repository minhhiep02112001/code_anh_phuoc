<?php

namespace App\Exports;

use App\Repositories\Eloquent\CrawlerRepository;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CrawleExport implements FromCollection, WithHeadings, WithMapping
{
    private $filter;
    private $option;

    public function __construct(public CrawlerRepository $crawlerRepository, $filter = [], $option = [])
    {
        $this->filter = $filter;
        $this->option = $option;
    }

    // Lấy dữ liệu từ repository với bộ lọc và tùy chọn
    public function collection()
    {
        $option = $this->option;
        $option['with'] = ['keyword'];  // Mối quan hệ với 'keyword'
        $option['limit'] = $this->crawlerRepository->count_customer($this->filter);
        return $this->crawlerRepository->getAll($this->filter, $option);
    }

    // Đặt tiêu đề cột cho Excel
    public function headings(): array
    {
        return [
            'Key Word',
            'Title',
            'Link Google Map',
            'Iframe',
            'Address',
            'Phone',
            'Email',
            'Website',
            'Google Review',
            'Created At',
        ];
    }

    // Mapping dữ liệu cho từng hàng trong Excel
    public function map($item): array
    {
        return [
            $item->keyword?->key_word,  // Nếu 'keyword' tồn tại, lấy 'key_word'
            $item->key_word,            // Tên từ khóa
            $item->link_google_map,     // Liên kết Google Map
            $item->iframe_map,          // Iframe bản đồ
            $item->address,             // Địa chỉ
            $item->phone,               // Số điện thoại
            $item->email,               // Email
            $item->website,       // Đánh giá trên Google
            $item->google_review,       // Đánh giá trên Google
            $item->created_at->format('Y-m-d H:i'), // Thời gian tạo
        ];
    }
}
