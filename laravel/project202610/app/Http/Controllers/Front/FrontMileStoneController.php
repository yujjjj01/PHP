<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Milestone\MileStone;
use Illuminate\Http\Request;

class FrontMileStoneController extends Controller
{
    public function list()
    {
        // distinct:去除重複資料
        // pluck:取出指定欄位的值
        // orderByDesc:從大到小, 也可以用orderby("years", "desc")
        $years = MileStone::distinct()->orderByDesc("years")->pluck("years");
        /*
            // 這種查詢會包含欄位名稱,要取值時要加上 ->, 例如: $years[0]->years
            // 如果用pluck, 則取值用 $years[0]
            $years = MileStone::selectRaw("years)->distinct()->orderByDesc("years");
            範例
            foreach($years as $data)
            {
                // 欄位名稱
                echo $data->years;
                // 如果是用pluck, 則直接取值 echo $data
            }
        */
        
        $list = MileStone::get();
        return view("front.milestone.list", compact("list", "years"));
    }
}
