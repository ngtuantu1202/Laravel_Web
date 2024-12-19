<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brand'; // Tên bảng
    protected $primaryKey = 'brand_id'; // Khóa chính
    protected $fillable = [
        'brand_name', 'brand_desc', 'brand_status'
    ]; // Các cột có thể điền

    public $timestamps = true; // Tự động cập nhật created_at và updated_at
}
