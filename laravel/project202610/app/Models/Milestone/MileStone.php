<?php

namespace App\Models\Milestone;

use App\Models\MileStoneType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MileStone extends Model
{
    public $timestamps = false;
    protected $table = "milestone";
    protected $primaryKey = 'id';
    protected $fillable = ["id","typeId","years","months","title","content","createTime"];

    public function types():BelongsTo
    {
        /*
        typeId: milestone資料表的外來鍵
        id:milestone_type的主鍵
        等同於SELECT a.*,b.*FROM milestone a LEFT JOIN milestone_type b ON a.typeId = b.id
        */
        return $this->belongsTo(MileStoneType::class, "typeId","id");
    }
}
