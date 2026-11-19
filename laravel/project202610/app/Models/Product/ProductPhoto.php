<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductPhoto extends Model
{
    public $timestamps = false;
    protected $table = "product_photo";
    protected $primaryKey = 'id';
    protected $fillable = ["id", "productId", "photo", "createTime"];

    //商品圖資料夾
    const path ="product";

    //大圖
    public function big()
    {
        return "/" .self::path ."/".$this->photo;
    }

    //小圖
    public function small()
    {
        return "/" .self::path ."/S/".$this->photo;
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, "productId","id");
    }
}
