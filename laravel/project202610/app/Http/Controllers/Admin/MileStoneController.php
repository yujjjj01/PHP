<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MileStone\MileStone;
use Illuminate\Http\Request;

class MileStoneController extends Controller
{
    //大事記列表
    public function list()
    {

        $list = MileStone::paginate(10); //每頁顯示10筆資料
        return view("admin.milestone.list", compact("list"));
    }
    public function add()
    {
        return view("admin.milestone.add");
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        MileStone::create($data);
        return redirect("/admin/milestone/list");
    }
}
