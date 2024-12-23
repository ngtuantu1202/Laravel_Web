<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products'; // Tên bảng
    protected $primaryKey = 'product_id'; // Khóa chính
    protected $fillable = [
        'product_name',
        'product_price',
        'product_desc',
        'product_content',
        'categories_id',
        'brand_id',
        'product_status',
        'product_image',
    ]; // Các cột có thể điền

    public $timestamps = true; // Tự động cập nhật created_at và updated_at

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}

