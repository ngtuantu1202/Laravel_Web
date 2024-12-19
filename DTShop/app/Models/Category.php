<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories'; // Tên bảng
    protected $primaryKey = 'categories_id'; // Khóa chính
    protected $fillable = [
        'categories_name', 'categories_desc', 'categories_status'
    ]; // Các cột có thể điền

    public $timestamps = true; // Tự động cập nhật created_at và updated_at
}
