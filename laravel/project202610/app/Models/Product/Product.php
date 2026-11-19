<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "product";
    protected $primaryKey = 'id';
    protected $fillable = [
        "id", "label_id", "type_id", "product_name", "title", "product_no",
        "price", "sale_price", "qty", "content", "create_time"
    ];

    public function types(): BelongsTo
    {
        return $this->belongsTo(ProductType::class, "type_id", "id");
    }

    public function labels(): BelongsTo
    {
        return $this->belongsTo(ProductLabel::class, "label_id", "id");
    }

    // 商品圖
    public function photos(): HasMany
    {
        return $this->hasMany(ProductPhoto::class, "productId", "id");
    }

    // 商品規格
    public function specs(): HasMany
    {
        return $this->hasMany(ProductSpec::class, "productId", "id");
    }

    //取第一張圖
    public function firstPhoto()
    {
        return $this->photos->first();
    }
}
