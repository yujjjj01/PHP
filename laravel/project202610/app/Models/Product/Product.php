<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    public $timestamps = false;
    protected $table = "product";
    protected $primaryKey = 'id';
    protected $fillable = ["id","product_name","title","product_no","price","sale_price","qty","content","create_time","type_id","label_id"];

    public function types():BelongsTo
    {
        return $this->belongsTo(ProductType::class,"type_id","id");
    }
    public function labels():BelongsTo
    {
        return $this->belongsTo(ProductType::class,"label_id","id");
    }
}
