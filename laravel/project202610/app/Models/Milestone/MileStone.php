<?php

namespace App\Models\Milestone;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

// 大事記
class MileStone extends Model
{
    public $timestamps = false;
    protected $table = "milestone";
    protected $primaryKey = 'id';
    protected $fillable = ["id", "typeId", "years", "months", "title", "content", "point", "createTime"];

    public function types(): BelongsTo
    {
        /*
         typeId: milestone資料表的外來鍵
         id: milestone_type的主鍵
         等同於
         SELECT a.*, b.* FROM milestone a INNER JOIN milestsone_type b ON a.typeId = b.id

         也可以用(DB要use Illuminate\Support\Facades\DB)
         DB::table("milestone as a")->selectRaw("a.*, b.*")->join("milestone_type as b", "a.typeId", "b.id")->get()
         或
         DB::table("milestone as a")->join("milestone_type as b", "a.typeId", "b.id")->selectRaw("a.*, b.*")->get()
         只是順序不同,結果相同, 順序不會影響
         DB:資料庫  table:資料表  join:inner join 二邊都有資料  selectRaw:查詢欄位  get:取全部資料
         selectRaw("a.*, b.*")也可改用select("a.*", "b.*")
        */
        return $this->belongsTo(MileStoneType::class, "typeId", "id");
    }
}
