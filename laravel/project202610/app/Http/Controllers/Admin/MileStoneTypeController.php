<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MileStoneType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MileStoneTypeController extends Controller
{
    public function list()
    {
        $list = MileStoneType::get();
        return view("admin.milestone.types.list",compact("list"));

    }

    //新增
    public function create()
    {

    return view("admin.milestone.types.create");

    }

    //儲存
    public function store(Request $req)
    {

        $types = new MileStoneType();
        $types->label = $req->label;
        $types->title = $req->title;
        $types->save();

        Session::flash("message","已新增");

        return redirect("/admin/milestone/types/list");

    }

    //修改
    public function edit(Request $req)
    {
        $types = MileStoneType::find($req->id);
        return view("admin.milestone.types.edit",compact("types"));
    }
}
