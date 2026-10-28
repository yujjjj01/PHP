<?php

namespace App\Models;

use App\Models\Milestone\MileStone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

//大事記類別
class MileStoneType extends Model
{
    public $timestamps = false;
    protected $table = "milestone_type";
    protected $primaryKey = 'id';
    protected $fillable = ["id","label","title"];

    public function milestone():HasMany
    {

        //每一個類別可能有多筆大事紀
        return $this->hasMany(
            MileStone::class,
            "typeId",//大事記資料表的外來鍵
            "id"//milestone_type的主鍵
        );
    }
}
